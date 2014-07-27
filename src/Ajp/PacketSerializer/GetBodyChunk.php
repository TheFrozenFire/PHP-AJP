<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;
use Ajp\PacketSerializerInterface;

class GetBodyChunk implements PacketSerializerInterface
{
    public function serialize(PacketInterface $packet)
    {
        return pack('nnCn', $packet->getHeaderCode(), 3, $packet->getType(), $packet->getRequestedLength());
    }
}
