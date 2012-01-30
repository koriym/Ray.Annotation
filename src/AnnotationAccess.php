<?php
/**
 * Ray
 *
 * @package Ray.Annotation
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ray\Annotation;

trait AnnotationAccess
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
        $cacheId = 'rayanno' . $this->class . $this->name;
        if (0 && apc_exists($cacheId)) {
            return apc_fetch($cacheId);
        }
        $doc = $this->getDocComment();
        $result = $match = array();
        preg_match_all('/@([A-Z][A-Za-z]+)(\("(.+)"\))*/', $doc, $match);
        $keys = $match[1];
        $values = $match[3];
        $i = 0;
        foreach ($keys as $key) {
            $member = $this->getMember($values[$i++]);
            $result[$key] = $member;
//             $result[$key] = $values[$i++];
        }
        apc_store($cacheId, $result);
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
    
    /**
    * Get member
    *
    * @param string $member "value" or "key1=value1,ke2=value2"
    *
    * @return mixed string or [$paramName => $named][]
    */
    private function getMember($member)
    {
        // signle annotation @Named($annotation)
        if (preg_match("/^[a-zA-Z0-9_]+$/", $member)) {
            return $member;
        }
        // multi annotation @Multi(memberKey1=memberVal1,memberKey2=memberVal2)
        // http://stackoverflow.com/questions/168171/regular-expression-for-parsing-name-value-pairs
        preg_match_all('/([^=,]*)=("[^"]*"|[^,"]*)/', $member, $matches);
        if ($matches[0] === array()) {
            return null;
        }
        $result = array();
        $count = count($matches[0]);
        for ($i = 0; $i < $count; $i++) {
            $result[$matches[1][$i]] = $matches[2][$i];
        }
        list($key, $value) = each($result);
        if (count($result) === 1 && $key === 'value') {
            $result = $value;
        }
        return $result;
    }
    
}