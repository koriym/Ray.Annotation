<?php

namespace Ray\Annotation\Tests;

/**
 *
 * Enter description here ...
 * @author kooriyama
 *
 * @ClassAnnotationA
 * @ClassAnnotationB("value=abc")
 * @ClassAnnotationC("country=Japan,city=tokyo")
 */
class Mock
{
    /**
     * @MethodAnnotationA
	 * @MethodAnnotationB("value=abc")
 	 * @MethodAnnotationC("country=Japan,city=tokyo")
     */
    public function method()
    {
    }
}