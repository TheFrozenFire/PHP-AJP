<?php
namespace Ajp\PacketParser;

use Ajp\PacketInterface;
use Ajp\Packet;
use Ajp\PacketParser;

class Generic extends PacketParser
{
    public function parse(PacketInterface $packet)
    {
        return $packet;
    }
}
