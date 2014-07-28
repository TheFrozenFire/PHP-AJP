<?php
namespace Ajp\Packet;

use Ajp\Packet as AbstractPacket;

class SendHeaders extends AbstractPacket
{
    protected static $serializerClass = '\Ajp\PacketSerializer\SendHeaders';

    protected $headerCode = self::RESPONSE_CODE;
    protected $type = self::TYPE_SEND_HEADERS;
    
    protected $httpStatusCode;
    
    protected $httpStatusMessage;
    
    protected $headers = array();
    
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }
    
    public function setHttpStatusCode($httpStatusCode)
    {
        $this->httpStatusCode = $httpStatusCode;
        return $this;
    }
    
    public function getHttpStatusMessage()
    {
        return $this->httpStatusMessage;
    }
    
    public function setHttpStatusMessage($httpStatusMessage)
    {
        $this->httpStatusMessage = $httpStatusMessage;
        return $this;
    }
    
    public function getHeaders()
    {
        return $this->headers;
    }
    
    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }
    
    public function addHeader($name, $value)
    {
        $this->headers[$name] = $value;
        return $this;
    }
}
