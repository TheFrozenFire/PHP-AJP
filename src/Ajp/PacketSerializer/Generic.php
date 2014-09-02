<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;
use Ajp\PacketSerializer;

class Generic extends PacketSerializer
{
    public function serialize(PacketInterface $packet)
    {
        return pack('nnC', $packet->getHeaderCode(), 1, $packet->getType());
    }
}
