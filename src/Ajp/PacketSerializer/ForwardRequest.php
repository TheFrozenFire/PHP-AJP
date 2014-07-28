<?php
namespace Ajp\PacketSerializer;

use Ajp\PacketInterface;

class ForwardRequest extends Packet
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
                      .pack('nCn', $packet->getServerPort(), $packet->getIsSsl(), count($headers))
                      .$this->packHeaders($headers)
                      .$this->packAttributes($attributes);
        
        $length = 1;
        $length += strlen($packetBody);
    
        return pack('nnC', $packet->getHeaderCode(), $length, $packet->getType()).$packetBody;
              
    }
}