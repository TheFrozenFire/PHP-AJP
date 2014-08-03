<?php
namespace Ajp;

class Data extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\Data';
    protected static $serialized = "\x12\x34\x00\x00";
    
    public function provideSerializablePacket()
    {
        $packetType = static::$packetType;
        $data = array(
            array(new $packetType, static::$serialized),
        );
    
        return $data;
    }
}
