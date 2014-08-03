<?php
namespace Ajp\PacketParser;

use Ajp\PacketInterface;
use Ajp\PacketParser;

class Data extends PacketParser
{
    public function parse(PacketInterface $packet, $packetBody)
    {
        if(!is_null($packetBody)) {
            $packet->setBody($packetBody);
        }
    
        return $packet;
    }
}
