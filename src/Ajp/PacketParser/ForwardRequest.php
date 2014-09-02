<?php
namespace Ajp\PacketParser;

use Ajp\Packet;
use Ajp\PacketParser;

class ForwardRequest extends PacketParser
{
    public function parse(Packet\ForwardRequest $packet, $packetBody)
    {
        $position = 1;
    
        list(, $method) = unpack('C', substr($packetBody, $position++, 1));
                
        list($protocol, $position) = $this->unpackString($packetBody, $position);
        list($requestUri, $position) = $this->unpackString($packetBody, $position);
        list($remoteAddress, $position) = $this->unpackString($packetBody, $position);
        list($remoteHost, $position) = $this->unpackString($packetBody, $position);
        list($serverName, $position) = $this->unpackString($packetBody, $position);
        
        list(, $serverPort) = unpack('n', substr($packetBody, $position, 2));
        $position += 2;
        list(, $isSsl) = unpack('C', substr($packetBody, $position++, 1));
        
        list($headers, $position) = $this->unpackHeaders($packetBody, $position);
        list($attributes, $position) = $this->unpackAttributes($packetBody, $position);
        
        $packet->setProtocol($protocol);
        $packet->setRequestUri($requestUri);
        $packet->setRemoteAddress($remoteAddress);
        $packet->setRemoteHost($remoteHost);
        $packet->setServerName($serverName);
        $packet->setServerPort($serverPort);
        $packet->setIsSsl($isSsl);
        $packet->setHeaders($headers);
        $packet->setAttributes($attributes);
    
        return $packet;
    }
}
