<?php
namespace Ajp\PacketParser;

use Ajp\Packet;
use Ajp\PacketParser;

class Data extends PacketParser
{
    public function parse(Packet\Data $packet, $packetBody)
    {
        if(!is_null($packetBody)) {
            $packet->setBody($packetBody);
        }
    
        return $packet;
    }
}
