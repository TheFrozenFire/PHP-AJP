<?php
namespace Ajp\Packet;

use Ajp\Packet as AbstractPacket;

class GetBodyChunk extends AbstractPacket
{
    protected $headerCode = self::RESPONSE_CODE;
    protected $type = self::TYPE_GET_BODY_CHUNK;
}
