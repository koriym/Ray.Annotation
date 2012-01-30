<?php

namespace Ray\Annotation;

/**
 * Test class for Ray.Annotation.
 */
class AnnotationElementTest extends \PHPUnit_Framework_TestCase
{
    protected $mock;

    protected function setUp()
    {
        parent::setUp();
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
        $expected = array (
  'MethodAnnotationA' => '',
  'MethodAnnotationB' => 'value=abc',
  'MethodAnnotationC' => 'country=Japan,city=tokyo',
);
        $this->assertSame($expected, $actual);
    }
}