<?php

namespace Ray\Annotation;

/**
 * Test class for Ray.Annotation.
 */
class ReflectionClassTest extends \PHPUnit_Framework_TestCase
{
    protected $mock;

    protected function setUp()
    {
        parent::setUp();
        if (function_exists('apc_clear_cache')) {
            apc_clear_cache('user');
        }
        $this->reflection = new ReflectionClass('User');
    }

    public function test_New()
    {
        $actual = $this->reflection;
        $this->assertInstanceOf('\Ray\Annotation\ReflectionClass', $this->reflection);
    }

    public function test_getAnnotations()
    {
        $actual = $this->reflection->getAnnotations();
        $foo = $actual[0];
        $bar = $actual[1];
        $this->assertSame('MyCompany\Annotations\Foo', get_class($foo));
        $this->assertSame('foo', $foo->bar);
        $this->assertSame('MyCompany\Annotations\Bar', get_class($bar));
        $this->assertSame('bar', $bar->foo);
    }

    public function test_getAnnotation()
    {
        $foo = $this->reflection->getAnnotation('MyCompany\Annotations\Foo');
        $actual = $foo->bar;
        $this->assertSame('foo', $actual);
    }


    public function test_isAnnotationPresent()
    {
        $actual = $this->reflection->isAnnotationPresent('MyCompany\Annotations\Foo');
        $this->assertSame(true, $actual);
    }

    public function test_getAnnotationResultNonExists()
    {
        $foo = $this->reflection->getAnnotation('MyCompany\Annotations\Invalid');
        $this->assertSame(null, $foo);
    }

    public function test_isAnnotationPresenNonExists()
    {
        $actual = $this->reflection->isAnnotationPresent('MyCompany\Annotations\Invalid');
        $this->assertSame(false, $actual);
    }

    public function test_getAnnotationsWithCache()
    {
        $actual = $this->reflection->getAnnotations();
        $actual = $this->reflection->getAnnotations();
        $foo = $actual[0];
        $bar = $actual[1];
        $this->assertSame('MyCompany\Annotations\Foo', get_class($foo));
        $this->assertSame('foo', $foo->bar);
        $this->assertSame('MyCompany\Annotations\Bar', get_class($bar));
        $this->assertSame('bar', $bar->foo);
    }
}