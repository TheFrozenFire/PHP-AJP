<?php
namespace Ajp;

class ForwardRequestTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\ForwardRequest';
    protected static $serialized = "\x0A\x0B\x00\x01\x02...";
}
