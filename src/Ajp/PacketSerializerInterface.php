<?php
namespace Ajp;

interface PacketSerializerInterface
{
    public function serialize(PacketInterface $packet);
}
