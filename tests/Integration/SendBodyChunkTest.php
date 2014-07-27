<?php
namespace Ajp;

class SendBodyChunkTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\SendBodyChunk';
    protected static $serialized = "\x0A\x0B\x20\x01\x03";
    
    public function provideSerializablePacket()
    {
        $chunk = openssl_random_pseudo_bytes(8192);
    
        $packet = (new static::$packetType)
            ->setChunk($chunk);
    
        return array(
            array($packet, static::$serialized.$chunk),
        );
    }
}
