<?php
namespace Ajp;

class PacketStream implements \Iterator
{
    protected $typeMap = array(
        PacketInterface::TYPE_FORWARD_REQUEST => '\Ajp\Packet\ForwardRequest',
        PacketInterface::TYPE_SEND_BODY_CHUNK => '\Ajp\Packet\SendBodyChunk',
        PacketInterface::TYPE_SEND_HEADERS => '\Ajp\Packet\SendHeaders',
        PacketInterface::TYPE_END_RESPONSE => '\Ajp\Packet\EndResponse',
        PacketInterface::TYPE_GET_BODY_CHUNK => '\Ajp\Packet\GetBodyChunk',
        PacketInterface::TYPE_SHUTDOWN => '\Ajp\Packet\Shutdown',
        PacketInterface::TYPE_PING => '\Ajp\Packet\Ping',
        PacketInterface::TYPE_CPONG => '\Ajp\Packet\CPong',
        PacketInterface::TYPE_CPING => '\Ajp\Packet\CPing',
    );
    
    protected $stream;
    
    protected $packetNumber = 0;
    
    protected $currentPacket;
    
    public function __construct($stream)
    {
        $this->setStream($stream);
    }
    
    public function current()
    {
        return $this->currentPacket;
    }
    
    public function key()
    {
        return $this->packetNumber;
    }
    
    public function next()
    {
        $this->currentPacket = null;
    
        $headerCode = fread($this->stream, 2);
        if($headerCode === false || empty($headerCode)) {
            return;
        }
    
        list(,$headerCode) = unpack('n', $headerCode);
        if(($headerCode !== PacketInterface::REQUEST_CODE) && ($headerCode !== PacketInterface::RESPONSE_CODE)) {
            throw new \RuntimeException('First two bytes of packet don\'t match a request or response code');
        }
        
        $dataLength = fread($this->stream, 2);
        if($dataLength === false) {
            throw new \RuntimeException('No data');
        }
        
        list(,$dataLength) = unpack('n', $dataLength);
        $packetBody = ($dataLength > 0)?fread($this->stream, $dataLength):null;
        
        $this->currentPacket = $this->parsePacket($packetBody);
        
        $this->packetNumber++;
    }
    
    /**
     * rewind
     *
     * @param bool $really = false Whether to seek the underlying stream back to its start
     * @return void
     */
    public function rewind($really = false)
    {
        if($really) {
            fseek($this->stream, 0);
        }
        
        $this->next();
        $this->packetNumber = 0;
    }
    
    public function valid()
    {
        return $this->currentPacket instanceof PacketInterface;
    }
    
    protected function parsePacket($packetBody)
    {
        if(is_null($packetBody)) {
            $typeCode = null;
        } else {
            list(,$typeCode) = unpack('C', $packetBody[0]);
        }
        
        $packetType = isset($this->typeMap[$typeCode])?$this->typeMap[$typeCode]:'\Ajp\Packet\Data';
        
        $packet = new $packetType;
        $parser = $packet->getParser();
        
        return $parser->parse($packet, $packetBody);
    }
    
    public function getTypeMap()
    {
        return $this->typeMap;
    }
    
    public function setTypeMap($typeMap)
    {
        $this->typeMap = $typeMap;
        return $this;
    }
    
    public function addTypeMapping($code, $type)
    {
        $this->typeMap[$code] = $type;
        return $this;
    }
    
    public function getStream()
    {
        return $this->stream;
    }
    
    public function setStream($stream)
    {
        $this->stream = $stream;
        return $this;
    }
}
