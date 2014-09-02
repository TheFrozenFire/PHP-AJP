<?php
namespace Ajp\PacketParser;

use Ajp\Packet;
use Ajp\PacketParser;

class EndResponse extends PacketParser
{
    public function parse(Packet\EndResponse $packet, $packetBody)
    {
        list(,$packetType, $reuse) = unpack('CC', $packetBody);
        
        $packet->setReuse($reuse);
    
        return $packet;
    }
}
