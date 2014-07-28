<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;
use Ajp\PacketSerializerInterface;

class Packet implements PacketSerializerInterface
{
    public function serialize(PacketInterface $packet)
    {
        return pack('nnC', $packet->getHeaderCode(), 1, $packet->getType());
    }
    
    protected function packString($string) {
        $length = strlen($string);
        if($length == 0) {
            return pack('n', 65535);
        }
    
        return pack('n', $length).$string."\0";
    }
    
    protected function packHeaders(array $headers) {
        $result = '';
        ksort($headers);
        
        foreach($headers as $type => $value) {
            if(is_int($type)) {
                $result .= pack('n', $type).$this->packstring($value);
            } elseif(is_string($type)) {
                $result .= $this->packString($type).$this->packString($value);
            } else {
                throw new \RuntimeException('Header type must be an integer or a string, '.gettype($type).' given');
            }
        }
        
        return $result;
    }
    
    protected function packAttributes(array $attributes) {
        $result = '';
        
        foreach($attributes as $type => $value) {
            if(is_int($type) && $type === PacketInterface::ATTRIBUTE_REQUEST_ATTRIBUTE) {
                if(is_array($value) && count($value) == 2) {
                    $result .= pack('c', $type).$this->packString($value[0]).$this->packString($value[1]);
                } else {
                    throw new \RuntimeException('Custom request attributes must be passed as array(name, value)');
                }
            } elseif(is_int($type)) {
                $result .= pack('C', $type).$this->packString($value);
            } else {
                throw new \RuntimeException('Attribute type must be an integer, '.gettype($type).' given');
            }
        }
        
        $result .= pack('C', PacketInterface::REQUEST_TERMINATOR);
        
        return $result;
    }
}
