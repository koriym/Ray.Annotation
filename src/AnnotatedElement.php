<?php
/**
 * Ray
 *
 * @package Ray.Annotation
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ray\Annotation;

/**
 * This interface represents an annotated element of the program.
 *
 * @package Ray.Annotation
 * @see Interceptor
 */
interface AnnotatedElement
{
    /**
     * Returns this element's annotation for the specified type if such an annotation is present, else null.
     *
     * @param string $annotation
     *
     * @return this element's annotation for the specified annotation type if present on this element, else null
     */
    public function getAnnotation($annotation);

    /**
     * Returns all annotations present on this element.
     *
     * (Returns an array of length zero if this element has no annotations.) The caller of this method is free to modify the returned array; it will have no effect on the arrays returned to other callers.
     *
     * @return all annotations present on this element
     */
    public function getAnnotations();

    /**
     * Returns true if an annotation for the specified type is present on this element, else false.
     *
     * This method is designed primarily for convenient access to marker annotations.
     *
     * @return true if an annotation for the specified annotation type is present on this element, else false
     */
    public function isAnnotationPresent($annotation);
}
