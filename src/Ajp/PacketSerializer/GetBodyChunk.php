<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;
use Ajp\PacketSerializer;

class GetBodyChunk extends PacketSerializer
{
    public function serialize(PacketInterface $packet)
    {
        return pack('nnCn', $packet->getHeaderCode(), 3, $packet->getType(), $packet->getRequestedLength());
    }
}
