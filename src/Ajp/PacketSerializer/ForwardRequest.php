<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;
use Ajp\PacketSerializer;

class ForwardRequest extends PacketSerializer
{
    public function serialize(PacketInterface $packet)
    {
        $headers = $packet->getHeaders();
        $attributes = $packet->getAttributes();
        
        if(!isset($headers[$packet::HEADER_REQ_CONTENT_LENGTH])) {
            throw new \RuntimeException('The content-length header must be specified, otherwise the behaviour is unknown');
        }
        
        $packetBody = pack('C', $packet->getMethod())
                      .$this->packString($packet->getProtocol())
                      .$this->packString($packet->getRequestUri())
                      .$this->packString($packet->getRemoteAddress())
                      .$this->packString($packet->getRemoteHost())
                      .$this->packString($packet->getServerName())
                      .pack('nC', $packet->getServerPort(), $packet->getIsSsl())
                      .$this->packHeaders($headers)
                      .$this->packAttributes($attributes);
        
        $length = 1 + strlen($packetBody);
    
        return pack('nnC', $packet->getHeaderCode(), $length, $packet->getType()).$packetBody;
              
    }
}
