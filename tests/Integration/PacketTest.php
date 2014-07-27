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
}
