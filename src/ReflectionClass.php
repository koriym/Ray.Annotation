<?php
/**
 * Ray
 *
 * @package Ray.Annotation
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ray\Annotation;

/**
 * The ReflectionClass class reports information about a class, and annotation
 * 
 * @author Akihito.Koriyama
 */
class ReflectionClass extends \ReflectionClass implements AnnotatedElement
{
    use AnnotationAccess;
}