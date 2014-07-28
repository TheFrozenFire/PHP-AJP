<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;
use Ajp\PacketSerializer;

class EndResponse extends PacketSerializer
{
    public function serialize(PacketInterface $packet)
    {
        return pack('nnCC', $packet->getHeaderCode(), 2, $packet->getType(), $packet->getReuse());
    }
}
