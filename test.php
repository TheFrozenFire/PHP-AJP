<?php
require 'vendor/autoload.php';

$packetType = '\Ajp\Packet\ForwardRequest';

$packet = (new $packetType);
            
echo substr('\x'.chunk_split(bin2hex($packet->getSerializer()->serialize($packet)), 2, '\x'), 0, -2).PHP_EOL;
