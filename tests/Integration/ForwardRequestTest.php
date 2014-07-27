<?php
namespace Ajp;

class ForwardRequestTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\ForwardRequest';
    protected static $serialized = "\x41\x42\x00\x01\x02...";
}
