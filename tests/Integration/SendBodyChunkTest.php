<?php
namespace Ajp;

class SendBodyChunkTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\SendBodyChunk';
    protected static $serialized = "\x41\x42\x20\x01\x03";
    
    public function provideSerializablePacket()
    {
        $chunk = base64_encode(openssl_random_pseudo_bytes(50));
    
        $packet = (new static::$packetType)
            ->setChunk($chunk);
    
        return array(
            array($packet, static::$serialized.$chunk),
        );
    }
}
