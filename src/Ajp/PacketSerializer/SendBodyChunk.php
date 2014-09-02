<?php
namespace Ajp\PacketSerializer;

use Ajp\Packet;
use Ajp\PacketSerializer;

class SendBodyChunk extends PacketSerializer
{
    public function serialize(Packet\SendBodyChunk $packet)
    {
        $chunk = $packet->getChunk();
        $length = strlen($chunk)+3;
    
        return pack('nnCn', $packet->getHeaderCode(), $length, $packet->getType(), strlen($chunk)).$chunk;
    }
}
