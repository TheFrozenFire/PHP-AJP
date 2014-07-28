<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;

class SendBodyChunk extends Packet
{
    public function serialize(PacketInterface $packet)
    {
        $chunk = $packet->getChunk();
        $length = strlen($chunk)+3;
    
        return pack('nnCn', $packet->getHeaderCode(), $length, $packet->getType(), strlen($chunk)).$chunk;
    }
}
