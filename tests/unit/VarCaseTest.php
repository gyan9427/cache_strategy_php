<?php

use PHPUnit\Framework\TestCase;
use App\Utilities\VarCache;

class VarCaseTest extends TestCase{

    function testUnsetValueIsValid(){
        $cache = new VarCache('foo');
        $this->assertFalse($cache->isValid());
    }
}