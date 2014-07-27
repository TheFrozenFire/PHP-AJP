<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;
use Ajp\PacketSerializerInterface;

class EndResponse implements PacketSerializerInterface
{
    public function serialize(PacketInterface $packet)
    {
        return pack('nnCC', $packet->getHeaderCode(), 2, $packet->getType(), $packet->getReuse());
    }
}
