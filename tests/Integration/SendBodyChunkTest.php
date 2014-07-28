<?php
namespace Ajp;

class SendBodyChunkTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\SendBodyChunk';
    protected static $serialized = "\x41\x42\x00\x03\x03\x00\x00";
    
    public function provideSerializablePacket()
    {
        $data = array(
            array(new static::$packetType, static::$serialized),
        );
    
        $chunk = bin2hex(openssl_random_pseudo_bytes(50));
    
        $packet = (new static::$packetType)
            ->setChunk($chunk);
        
        $data[] = array($packet, "\x41\x42\x00\x67\x03\x00\x64".$chunk);
    
        return $data;
    }
}
