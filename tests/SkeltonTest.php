<?php

namespace Ray\Annotation;

/**
 * Test class for Ray.Annotation.
 */
class SkeltonTest extends \PHPUnit_Framework_TestCase
{
    protected $skelton;

    protected function setUp()
    {
        parent::setUp();
        $this->skelton = new Skelton;
    }

    public function test_New()
    {
        $actual = $this->skelton;
        $this->assertInstanceOf('\Ray\Annotation\Skelton', $this->skelton);
    }

    /**
     * @expectedException Ray\Annotation\Exception
     */
    public function test_Exception()
    {
        throw new Exception;
    }
}