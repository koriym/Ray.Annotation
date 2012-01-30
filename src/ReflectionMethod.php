<?php
/**
 * Ray
 *
 * @package Ray.Annotation
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ray\Annotation;

class ReflectionMethod extends \ReflectionMethod implements AnnotatedElement
{
    /**
     * (non-PHPdoc)
     * @see Ray\Annotation.AnnotatedElement::getAnnotation()
     */
    public function getAnnotation($annotation)
    {
        $annotations = $this->getAnnotations();
        $annotation = isset($annotations[$annotation]) ? $annotations[$annotation] : null;
        return $annotation;

    }

    /**
     * (non-PHPdoc)
     * @see Ray\Annotation.AnnotatedElement::getAnnotations()
     */
    public function getAnnotations()
    {
        $doc = $this->getDocComment();
        $result = $match = array();
        preg_match_all('/@([A-Z][A-Za-z]+)(\("(.+)"\))*/', $doc, $match);
        $keys = $match[1];
        $values = $match[3];
        $i = 0;
        foreach ($keys as $key) {
            $result[$key] = $values[$i];
            $i++;
        }
        return $result;
    }

    /**
     * (non-PHPdoc)
     * @see Ray\Annotation.AnnotatedElement::isAnnotationPresent()
     */
    public function isAnnotationPresent($annotation)
    {
        $annotations = $this->getAnnotations();
        $isAnnotationPresent = isset($annotations[$annotation]) ? true : null;
        return $isAnnotationPresent;
    }
}