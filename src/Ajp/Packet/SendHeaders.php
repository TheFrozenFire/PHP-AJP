<?php
namespace Ajp\Packet;

use Ajp\Packet as AbstractPacket;

class SendHeaders extends AbstractPacket
{
    protected $headerCode = self::RESPONSE_CODE;
    protected $type = self::TYPE_SEND_HEADERS;
}
