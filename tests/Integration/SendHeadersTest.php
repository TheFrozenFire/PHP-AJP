<?php
namespace Ajp;

class SendHeadersTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\SendHeaders';
    protected static $serialized = "\x0A\x0B....\x04";
    
    public function provideSerializablePacket()
    {
        $headers = array();
        
        $packet = (new static::$packetType)
            ->setHttpStatusCode(200)
            ->setHttpStatusMessage('Found')
            ->setHeaders($headers);
    
        return array(
            array($packet, static::$serialized),
        );
    }
}
