<?php
namespace Ajp\Packet;

use Ajp\Packet as AbstractPacket;

class Ping extends AbstractPacket
{
    protected $headerCode = self::REQUEST_CODE;
    protected $type = self::TYPE_PING;
}
