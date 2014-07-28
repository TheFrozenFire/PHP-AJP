<?php
namespace Ajp;

class PacketParser implements PacketParserInterface
{
    public function parse(PacketInterface $packet, $packetBody)
    {
        list(,$typeCode) = unpack('C', $packetBody[0]);
        if($typeCode !== $packet->getType()) {
            throw new \RuntimeException('Packet type code doesn\'t match expected code');
        }
    
        return $packet;
    }
}
