<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;

class EndResponse extends Packet
{
    public function serialize(PacketInterface $packet)
    {
        return pack('nnCC', $packet->getHeaderCode(), 2, $packet->getType(), $packet->getReuse());
    }
}
