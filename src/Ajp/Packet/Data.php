<?php
namespace Ajp\Packet;

use Ajp\Packet as AbstractPacket;

class Data extends AbstractPacket
{
    protected static $serializerClass = '\Ajp\PacketSerializer\Data';
    protected static $parserClass = '\Ajp\PacketParser\Data';
    
    protected $headerCode = self::REQUEST_CODE;
    protected $type = null;
    
    protected $body;
    
    public function getBody()
    {
        return $this->body;
    }
    
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }
    
}
