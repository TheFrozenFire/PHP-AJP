<?php
namespace Ajp;

use \RuntimeException;

abstract class Packet implements PacketInterface
{
    protected static $serializerClass = '\Ajp\PacketSerializer\Generic';
    
    protected static $parserClass = '\Ajp\PacketParser\Generic';

    protected $headerCode;

    protected $type;
    
    protected $serializer;
    
    protected $parser;
    
    public function __construct(PacketSerializerInterface $serializer = null, PacketParserInterface $parser = null)
    {
        $this->setSerializer(isset($serializer)?$serializer:new static::$serializerClass);
        $this->setParser(isset($parser)?$parser:new static::$parserClass);
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
    
    public function getParser()
    {
        return $this->parser;
    }
    
    public function setParser($parser)
    {
        $this->parser = $parser;
        return $this;
    }
}
