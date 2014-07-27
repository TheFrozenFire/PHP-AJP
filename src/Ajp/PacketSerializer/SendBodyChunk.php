<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;
use Ajp\PacketSerializerInterface;

class SendBodyChunk implements PacketSerializerInterface
{
    public function serialize(PacketInterface $packet)
    {
        $chunk = $packet->getChunk();
        $length = strlen($chunk)+1;
    
        return pack('nnC', $packet->getHeaderCode(), $length, $packet->getType()).$chunk;
    }
}
