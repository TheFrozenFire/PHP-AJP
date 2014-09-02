<?php
namespace Ajp\PacketSerializer;

use Ajp\Packet;
use Ajp\PacketSerializer;

class Data extends PacketSerializer
{
    public function serialize(Packet\Data $packet)
    {
        $packetBody = $packet->getBody();
        
        $length = strlen($packetBody);
    
        return pack('nn', $packet->getHeaderCode(), $length).$packetBody;
    }
}
