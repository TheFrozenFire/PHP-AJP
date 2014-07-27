<?php
namespace Ajp;

class PingPacketTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\Ping';
    protected static $serialized = "\x12\x34\x00\x01\x08";
}
