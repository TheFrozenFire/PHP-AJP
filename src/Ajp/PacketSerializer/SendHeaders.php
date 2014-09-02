<?php
namespace Ajp\PacketSerializer;

use Ajp\Packet;
use Ajp\PacketSerializer;

class SendHeaders extends PacketSerializer
{
    public function serialize(Packet\SendHeaders $packet)
    {
        $packetBody = pack('n', $packet->getHttpStatusCode())
                      .$this->packString($packet->getHttpStatusMessage())
                      .$this->packHeaders($packet->getHeaders());
        
        $length = 3 + strlen($packetBody);
    
        return pack('nnC', $packet->getHeaderCode(), $length, $packet->getType()).$packetBody;
    }
}
