<?php

namespace TheTestCoder\PhpPackageStructure\Tests;

use neha0921\SubstrateInterfacePackage\SubstrateInterface;
use PHPUnit\Framework\TestCase;

class SubstrateInterfaceTest extends TestCase
{
    /** @test */
    public function testSystemName()
    {

        $obj = new SubstrateInterface("http://127.0.0.1:8000");

        $expectedResultContainsPartial = 'Parity Polkadot';
        $actualResult = $obj->rpc->system->name();

        $this->assertContains($expectedResultContainsPartial, $actualResult);
    }
}
