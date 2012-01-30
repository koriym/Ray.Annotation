<?php

namespace Ray\Annotation;

/**
 * Test class for Ray.Annotation.
 */
class ReflectionMethodTest extends \PHPUnit_Framework_TestCase
{
    protected $mock;

    protected function setUp()
    {
        parent::setUp();
        apc_clear_cache('user');
        $this->reflection = new ReflectionMethod('\Ray\Annotation\Tests\Mock', 'method');
    }

    public function test_New()
    {
        $actual = $this->reflection;
        $this->assertInstanceOf('\Ray\Annotation\ReflectionMethod', $this->reflection);
    }

    public function test_getAnnotations()
    {
        $actual = $this->reflection->getAnnotations();
        $expected = array(
            'Marking' => null,
            'SingleValuedAnnotation' => 'abc',
        	'SingleValuedAnnotationValue' => 'xyz',
            'MultiValuedAnnotation' => Array (
                'country' => 'Japan',
                'city' => 'tokyo'
                )
        );
        $this->assertSame($expected, $actual);
    }
}