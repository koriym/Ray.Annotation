<?php

namespace Ray\Annotation;

/**
 * Test class for Ray.Annotation.
 */
class mockTest extends \PHPUnit_Framework_TestCase
{
    protected $mock;

    protected function setUp()
    {
        parent::setUp();
        $this->mock = new \Ray\Annotation\Tests\Mock;
    }

    public function test_New()
    {
        $actual = $this->mock;
        $this->assertInstanceOf('\Ray\Annotation\Tests\Mock', $this->mock);
    }

    /**
     * @expectedException Ray\Annotation\Exception
     */
    public function test_Exception()
    {
        throw new Exception;
    }
}