<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;

class GetBodyChunk extends Packet
{
    public function serialize(PacketInterface $packet)
    {
        return pack('nnCn', $packet->getHeaderCode(), 3, $packet->getType(), $packet->getRequestedLength());
    }
}
