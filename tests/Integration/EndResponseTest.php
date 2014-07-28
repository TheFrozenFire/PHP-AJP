<?php
namespace Ajp;

class EndResponseTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\EndResponse';
    protected static $serialized = "\x41\x42\x00\x02\x05\x00";
    
    public function provideSerializablePacket()
    {
        return array(
            array(new static::$packetType, static::$serialized),
        );
    }
}
