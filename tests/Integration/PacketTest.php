<?php
namespace Ajp;

use PHPUnit_Framework_TestCase as TestCase;

abstract class PacketTest extends TestCase
{
    protected static $packetType;
    
    protected static $serialized;
    
    public function provideSerializablePacket()
    {
        return array(
            array(new static::$packetType, static::$serialized),
        );
    }
    
    public function provideParsablePacket()
    {
        $stream = fopen('php://memory', 'r+');
        fwrite($stream, static::$serialized);
        fseek($stream, 0);
    
        return array(
            array($stream, static::$packetType),
        );
    }
    
    /**
     * Test packet serialization
     * 
     * @dataProvider provideSerializablePacket
     *
     * @param Packet $packet
     * @return void
     */
    public function testPacketSerialization($packet, $serializedExpectation)
    {
        $serializer = $packet->getSerializer();
        
        $serialized = $serializer->serialize($packet);
        
        $this->assertEquals($serializedExpectation, $serialized);
    }
    
    /**
     * Test packet parsing
     *
     * @dataProvider provideParsablePacket
     * 
     * @param resource $stream
     * @param string $typeExpectation
     * @return void
     */
    public function testPacketParsing($stream, $typeExpectation)
    {
        $packetStream = new PacketStream($stream);
        
        foreach($packetStream as $packet) {
            $this->assertInstanceOf($typeExpectation, $packet);
        }
    }
}
