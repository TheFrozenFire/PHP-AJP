<?php
namespace Ajp;

class EndResponseTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\EndResponse';
    protected static $serialized = "\x0A\x0B\x00\x02\x05\x01";
    
    public function provideSerializablePacket()
    {
        $packet = (new static::$packetType)
            ->setReuse(true);
    
        return array(
            array($packet, static::$serialized),
        );
    }
}
