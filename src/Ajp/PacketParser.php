<?php
namespace Ajp;

class PacketParser implements PacketParserInterface
{
    public function parse(PacketInterface $packet, $packetBody)
    {
        return $packet;
    }
    
    protected function unpackString($packetBody, $position)
    {
        list(, $length) = unpack('n', substr($packetBody, $position, 2));
        if($length == 65535) {
            $length = 0;
        }

        $string = ($length)?substr($packetBody, $position+2, $length):null;
        $position += ($length)?$length + 3:2;
        
        return array($string, $position);
    }
    
    protected function unpackHeaders($packetBody, $position)
    {
        list(, $count) = unpack('n', substr($packetBody, $position, 2));
        $position += 2;
        
        $headers = array();
        for($i = 0; $i < $count; $i++) {
            list(, $firstByte) = unpack('C', substr($packetBody, $position, 1));
            if($firstByte == 0xA0) {
                list(, $headerName) = unpack('n', substr($packetBody, $position, 2));
                $position += 2;
            } else {
                list(, $headerName, $position) = $this->unpackString($packetBody, $position);
            }
            
            list($headerValue, $position) = $this->unpackString($packetBody, $position);
            
            $headers[$headerName] = $headerValue;
        }
        
        return array($headers, $position);
    }
    
    protected function unpackAttributes($packetBody, $position)
    {
        $attributes = array();
        
        do {
            list(, $attributeType) = unpack('C', substr($packetBody, $position++, 1));
            if($attributeType === PacketInterface::ATTRIBUTE_REQUEST_ATTRIBUTE) {
                list($attributeType, $position) = $this->unpackString($packetBody, $position);
                list($attributeValue, $position) = $this->unpackString($packetBody, $position);
                $attributes[$attributeType] = $attributeValue;
            } elseif($attributeType === PacketInterface::REQUEST_TERMINATOR) {
                // Done
            } else {
                list($attributeValue, $position) = $this->unpackString($packetBody, $position);
                $attributes[$attributeType] = $attributeValue;
            }
        } while($attributeType !== PacketInterface::REQUEST_TERMINATOR && $position < strlen($packetBody));
        
        return array($attributes, $position);
    }
}
