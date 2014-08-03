<?php
namespace Ajp\PacketParser;

use Ajp\PacketInterface;
use Ajp\PacketParser;

class EndResponse extends PacketParser
{
    public function parse(PacketInterface $packet, $packetBody)
    {
        list(,$packetType, $reuse) = unpack('CC', $packetBody);
        
        $packet->setReuse($reuse);
    
        return $packet;
    }
}
