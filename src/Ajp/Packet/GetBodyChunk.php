<?php
namespace Ajp\Packet;

use Ajp\Packet as AbstractPacket;

class GetBodyChunk extends AbstractPacket
{
    protected static $serializerClass = '\Ajp\PacketSerializer\GetBodyChunk';

    protected $headerCode = self::RESPONSE_CODE;
    protected $type = self::TYPE_GET_BODY_CHUNK;
    
    protected $requestedLength;
    
    public function getRequestedLength()
    {
        return $this->requestedLength;
    }
    
    public function setRequestedLength($requestedLength)
    {
        $this->requestedLength = $requestedLength;
        return $this;
    }
    
}
