<?php
namespace Ajp;

use \RuntimeException;

abstract class Packet implements PacketInterface
{
    protected $headerCode;

    protected $type;
    
    protected $serializer;
    
    public function __construct(PacketSerializerInterface $serializer = null)
    {
        $this->setSerializer(isset($serializer)?$serializer:new PacketSerializer\Packet);
    }
    
    public function getHeaderCode()
    {
        return $this->headerCode;
    }
    
    public function getType()
    {
        return $this->type;
    }
    
    public function getSerializer()
    {
        return $this->serializer;
    }
    
    public function setSerializer(PacketSerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        return $this;
    }
}
