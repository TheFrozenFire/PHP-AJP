<?php
namespace Ajp;

class PacketParser implements PacketParserInterface
{
    public function parse(PacketInterface $packet, $packetBody)
    {
        return $packet;
    }
}
