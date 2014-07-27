<?php
namespace Ajp;

class CPongPacketTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\CPong';
    protected static $serialized = "\x41\x42\x00\x01\x09";
}
