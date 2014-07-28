<?php
namespace Ajp;

class SendHeadersTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\SendHeaders';
    protected static $serialized = "\x41\x42\x00\x09\x04\x00\x00\xff\xff\x00\x00";
    
    public function provideSerializablePacket()
    {
        $data = array(
            array(new static::$packetType, static::$serialized),
        );
    
        $headers = array();
        
        $packet = (new static::$packetType)
            ->setHttpStatusCode(200)
            ->setHttpStatusMessage('Found')
            ->setHeaders($headers);
        
        $serialized = "\x41\x42\x00\x0f\x04\x00\xc8\x00\x05\x46\x6f\x75\x6e\x64\x00\x00\x00";
        
        $data[] = array($packet, $serialized);
    
        return $data;
    }
}
