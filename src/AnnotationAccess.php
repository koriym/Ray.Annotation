<?php
/**
 * Ray
 *
 * @package Ray.Annotation
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ray\Annotation;

use \Doctrine\Common\Annotations\AnnotationReader;

trait AnnotationAccess
{
    /**
     * (non-PHPdoc)
     * @see Ray\Annotation.AnnotatedElement::getAnnotations()
     */
    public function getAnnotations()
    {
        $hasApc = function_exists('apc_fetch');
        $cacheId = __NAMESPACE__ . $this->name;
        if ($hasApc && apc_exists($cacheId)) {
            $annotations = unserialize(apc_fetch($cacheId));
            return $annotations;
        }
        $read = [new AnnotationReader, self::GET_ANNOTATION_METHOD];
        $annotations = $read($this);
        if ($hasApc === true) {
            apc_store($cacheId, serialize($annotations), 0);
        }
        $annotations = unserialize(apc_fetch($cacheId));
        return $annotations;
    }

    /**
     * (non-PHPdoc)
     * @see Ray\Annotation.AnnotatedElement::getAnnotation()
     */
    public function getAnnotation($annotationName)
    {
        $annotations = $this->getAnnotations();

        foreach ($annotations as $annotation) {
            if ($annotation instanceof $annotationName) {
                return $annotation;
            }
        }
        return null;
    }

    /**
     * (non-PHPdoc)
     * @see Ray\Annotation.AnnotatedElement::isAnnotationPresent()
     */
    public function isAnnotationPresent($annotationName)
    {
        $annotations = $this->getAnnotations();

        foreach ($annotations as $annotation) {
            if ($annotation instanceof $annotationName) {
                return true;
            }
        }
        return false;
    }
}