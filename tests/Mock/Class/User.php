<?php

use MyCompany\Annotations\Foo,
    MyCompany\Annotations\Bar;

/**
 * @Foo(bar="foo")
 * @Bar(foo="bar")
 */
class User
{
    /**
     * @Foo(bar="foo_name")
     * @Bar(foo="bar_name")
     */
    public $name;

    /**
     * @Foo(bar="foo_method")
     * @Bar(foo="bar_method")
     */
    public function register()
    {
    }
}