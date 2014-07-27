<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;
use Ajp\PacketSerializerInterface;

class Packet implements PacketSerializerInterface
{
    public function serialize(PacketInterface $packet)
    {
        return pack('nnC', $packet->getHeaderCode(), 1, $packet->getType());
    }
}
