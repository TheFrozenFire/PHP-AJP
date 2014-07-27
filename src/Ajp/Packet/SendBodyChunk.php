<?php
namespace Ajp\Packet;

use Ajp\Packet as AbstractPacket;

class SendBodyChunk extends AbstractPacket
{
    protected $headerCode = self::RESPONSE_CODE;
    protected $type = self::TYPE_SEND_BODY_CHUNK;
    
    protected $chunk;
    
    public function getChunk()
    {
        return $this->chunk;
    }
    
    public function setChunk($chunk)
    {
        $this->chunk = $chunk;
        return $this;
    }
    
}
