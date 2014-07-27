<?php
namespace Ajp;

class ShutdownPacketTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\Shutdown';
    protected static $serialized = "\x12\x34\x00\x01\x07";
}
