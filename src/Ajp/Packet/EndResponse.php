<?php
namespace Ajp\Packet;

use Ajp\Packet as AbstractPacket;

class EndResponse extends AbstractPacket
{
    protected static $serializerClass = '\Ajp\PacketSerializer\EndResponse';

    protected $headerCode = self::RESPONSE_CODE;
    protected $type = self::TYPE_END_RESPONSE;
    
    protected $reuse;
    
    public function getReuse()
    {
        return $this->reuse;
    }
    
    public function setReuse($reuse)
    {
        $this->reuse = $reuse;
        return $this;
    }
    
}
