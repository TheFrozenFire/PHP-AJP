<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;
use Ajp\PacketSerializer;

class Data extends PacketSerializer
{
    public function serialize(PacketInterface $packet)
    {
        $packetBody = $packet->getBody();
        
        $length = strlen($packetBody);
    
        return pack('nn', $packet->getHeaderCode(), $length).$packetBody;
    }
}
