<?php

namespace Rmk\Tests\Container;

use PHPUnit\Framework\TestCase;
use Rmk\Container\Container;

class ContainerTest extends TestCase
{

    protected $container;

    protected $testValue;

    protected function setUp(): void
    {
        $this->container = new Container();
        $this->testValue = mt_rand();
    }

    public function testAdd(): void
    {
        $this->container->add($this->testValue, 'key');
        $this->assertTrue($this->container->offsetExists('key'));
        $v = 123;
        $this->container->add($v);
        $this->assertContains($v, $this->container->getArrayCopy());
    }

    /**
     * @depends testAdd
     */
    public function testHas(): void
    {
        $this->container->add($this->testValue, 'key');
        $this->assertTrue($this->container->has('key'));
    }

    /**
     * @depends testAdd
     */
    public function testContains(): void
    {
        $this->container->add($this->testValue, 'key');
        $this->assertTrue($this->container->contains($this->testValue));
    }

    /**
     * @depends testAdd
     */
    public function testGet(): void
    {
        $this->container->add($this->testValue, 'key');
        $this->assertSame($this->testValue, $this->container->get('key'));
    }

    public function testRemove(): void
    {
        $this->container->add($this->testValue, 'key');
        $this->container->remove('key');
        $this->assertFalse($this->container->has('key'));
    }

    /**
     * @depends testContains
     */
    public function testRemoveItem(): void
    {
        $this->container->add($this->testValue, 'key');
        $this->container->removeItem($this->testValue);
        $this->assertFalse($this->container->contains($this->testValue));
    }

    public function testToArray(): void
    {
        $this->container->add($this->testValue, 'key');
        $this->assertEquals(['key' => $this->testValue], $this->container->toArray());
    }
}
