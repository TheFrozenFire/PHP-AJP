<?php
namespace Ajp\PacketSerializer;

use Ajp\Packet;
use Ajp\PacketSerializer;

class GetBodyChunk extends PacketSerializer
{
    public function serialize(Packet\GetBodyChunk $packet)
    {
        return pack('nnCn', $packet->getHeaderCode(), 3, $packet->getType(), $packet->getRequestedLength());
    }
}
