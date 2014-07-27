<?php
namespace Ajp\Packet;

use Ajp\Packet as AbstractPacket;

class ForwardRequest extends AbstractPacket
{
    protected $headerCode = self::REQUEST_CODE;
    protected $type = self::TYPE_FORWARD_REQUEST;

    protected $method;
    
    protected $protocol;
    
    protected $requestUri;
    
    protected $remoteAddress;
    
    protected $remoteHost;
    
    protected $serverName;
    
    protected $serverPort;
    
    protected $isSsl = false;
    
    protected $headers = array();
    
    protected $attributes = array();
    
    protected $data;
    
    public function getMethod()
    {
        return $this->method;
    }
    
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }
    
    public function getProtocol()
    {
        return $this->protocol;
    }
    
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }
    
    public function getRequestUri()
    {
        return $this->requestUri;
    }
    
    public function setRequestUri($requestUri)
    {
        $this->requestUri = $requestUri;
        return $this;
    }
    
    public function getRemoteAddress()
    {
        return $this->remoteAddress;
    }
    
    public function setRemoteAddress($remoteAddress)
    {
        $this->remoteAddress = $remoteAddress;
        return $this;
    }
    
    public function getRemoteHost()
    {
        return $this->remoteHost;
    }
    
    public function setRemoteHost($remoteHost)
    {
        $this->remoteHost = $remoteHost;
        return $this;
    }
    
    public function getServerName()
    {
        return $this->serverName;
    }
    
    public function setServerName($serverName)
    {
        $this->serverName = $serverName;
        return $this;
    }
    
    public function getServerPort()
    {
        return $this->serverPort;
    }
    
    public function setServerPort($serverPort)
    {
        $this->serverPort = $serverPort;
        return $this;
    }
    
    public function getIsSsl()
    {
        return $this->isSsl;
    }
    
    public function setIsSsl($isSsl)
    {
        $this->isSsl = $isSsl;
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
    
    public function getAttributes()
    {
        return $this->attributes;
    }
    
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }
    
    public function addAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
        return $this;
    }
    
    public function getData()
    {
        return $this->data;
    }
    
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
