<?php
namespace Ajp;

interface PacketParserInterface
{
    public function parse(PacketInterface $packet, $packetBody);
}
