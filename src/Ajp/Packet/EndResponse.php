<?php
namespace Ajp\Packet;

use Ajp\Packet as AbstractPacket;

class EndResponse extends AbstractPacket
{
    protected $headerCode = self::RESPONSE_CODE;
    protected $type = self::TYPE_END_RESPONSE;
}
