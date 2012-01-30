<?php
/**
 * Ray
 *
 * @package Ray.Annotation
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ray\Annotation;

/**
 * The ReflectionMethod class reports information about a method, and annotation
 * 
 * @author Akihito.Koriyama
 */
class ReflectionMethod extends \ReflectionMethod implements AnnotatedElement
{
    use AnnotationAccess;
}