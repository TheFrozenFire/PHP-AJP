<?php
namespace Ajp;

class GetBodyChunkTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\GetBodyChunk';
    protected static $serialized = "\x41\x42\x00\x03\x06\xAA\xAA";
    
    public function provideSerializablePacket()
    {
        $packet = (new static::$packetType)
            ->setRequestedLength(43690);
    
        return array(
            array($packet, static::$serialized),
        );
    }
}
