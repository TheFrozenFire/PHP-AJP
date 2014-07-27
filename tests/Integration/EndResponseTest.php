<?php
namespace Ajp;

class EndResponseTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\EndResponse';
    protected static $serialized = "\x41\x42\x00\x02\x05\x01";
    
    public function provideSerializablePacket()
    {
        $packet = (new static::$packetType)
            ->setReuse(true);
    
        return array(
            array($packet, static::$serialized),
        );
    }
}
