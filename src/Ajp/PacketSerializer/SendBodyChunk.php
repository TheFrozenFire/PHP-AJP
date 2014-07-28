<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;
use Ajp\PacketSerializer;

class SendBodyChunk extends PacketSerializer
{
    public function serialize(PacketInterface $packet)
    {
        $chunk = $packet->getChunk();
        $length = strlen($chunk)+3;
    
        return pack('nnCn', $packet->getHeaderCode(), $length, $packet->getType(), strlen($chunk)).$chunk;
    }
}
