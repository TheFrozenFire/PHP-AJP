<?php
namespace Ajp;

class GetBodyChunkTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\GetBodyChunk';
    protected static $serialized = "\x0A\x0B\x00\x03\x06\xAA\xAA";
    
    public function provideSerializablePacket()
    {
        $packet = (new static::$packetType)
            ->setRequestedLength(43690);
    
        return array(
            array($packet, static::$serialized),
        );
    }
}
