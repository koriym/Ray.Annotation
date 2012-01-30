<?php

namespace Ray\Annotation\Tests;

/**
 *
 * Enter description here ...
 * @author kooriyama
 *
 * @Marking
 * @SingleValuedAnnotation("abc")
 * @SingleValuedAnnotation("value=abc")
 * @SingleValuedAnnotationWithArray("[1,2,3]")
 * @MultiValuedAnnotation("country=Japan,city=tokyo")
 */
class Mock
{
    /**
     * @Marking
     * @SingleValuedAnnotation("abc")
     * @SingleValuedAnnotationValue("value=xyz")
     * @MultiValuedAnnotation("country=Japan,city=tokyo")
     */
    public function method()
    {
    }
}