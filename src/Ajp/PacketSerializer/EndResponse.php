<?php
namespace Ajp\PacketSerializer;

use Ajp\Packet;
use Ajp\PacketSerializer;

class EndResponse extends PacketSerializer
{
    public function serialize(Packet\EndResponse $packet)
    {
        return pack('nnCC', $packet->getHeaderCode(), 2, $packet->getType(), $packet->getReuse());
    }
}
