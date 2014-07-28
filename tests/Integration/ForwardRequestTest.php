<?php
namespace Ajp;

class ForwardRequestTest extends PacketTest
{
    protected static $packetType = '\Ajp\Packet\ForwardRequest';
    protected static $serialized = "\x12\x34\x00\x18\x02\x00\xff\xff\xff\xff\xff\xff\xff\xff\xff\xff\x00\x00\x00\x00\x01\xa0\x08\x00\x01\x30\x00\xff";
    
    public function provideSerializablePacket()
    {
        $packetType = static::$packetType;
        $data = array(
            array(new $packetType, static::$serialized),
        );
        
        $packet = (new $packetType)
            ->setMethod($packetType::METHOD_GET)
            ->setProtocol('HTTP/1.1')
            ->setRequestUri('/')
            ->setRemoteAddress('127.0.0.1')
            ->setRemoteHost('localhost')
            ->setServerName('example.com')
            ->setServerPort(80)
            ->addHeader($packetType::HEADER_REQ_CONTENT_LENGTH, 0)
            ->addAttribute($packetType::ATTRIBUTE_QUERY_STRING, 'foo=bar&baz=baz')
            ->addAttribute($packetType::ATTRIBUTE_REQUEST_ATTRIBUTE, array('AJP_REMOTE_PORT', '80'));
        
        $serialized =  "\x12\x34\x00\x6e\x02\x02\x00\x08\x48\x54"
                      ."\x54\x50\x2f\x31\x2e\x31\x00\x00\x01\x2f"
                      ."\x00\x00\x09\x31\x32\x37\x2e\x30\x2e\x30"
                      ."\x2e\x31\x00\x00\x09\x6c\x6f\x63\x61\x6c"
                      ."\x68\x6f\x73\x74\x00\x00\x0b\x65\x78\x61"
                      ."\x6d\x70\x6c\x65\x2e\x63\x6f\x6d\x00\x00"
                      ."\x50\x00\x00\x01\xa0\x08\x00\x01\x30\x00"
                      ."\x05\x00\x0f\x66\x6f\x6f\x3d\x62\x61\x72"
                      ."\x26\x62\x61\x7a\x3d\x62\x61\x7a\x00\x0a"
                      ."\x00\x0f\x41\x4a\x50\x5f\x52\x45\x4d\x4f"
                      ."\x54\x45\x5f\x50\x4f\x52\x54\x00\x00\x02"
                      ."\x38\x30\x00\xff";
        
        $data[] = array($packet, $serialized);
    
        return $data;
    }
}
