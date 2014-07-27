<?php
namespace Ajp;

class CPingPacketTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\CPing';
    protected static $serialized = "\x12\x34\x00\x01\x0A";
}
