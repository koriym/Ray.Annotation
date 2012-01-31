Ray.Annotation - Annotations support for PHP.
================================================

ReflectionClass, ReflectionMethod, and ReflectionProperty having methods to access annotations.</p>

Features
--------

- Inherited PHP Reflection class.
- 'Doctrine-Annotation(2.2)' inside.

Annotation Classes
-----------

```php
<?php
namespace MyCompany\Entity;

/** @Annotation */
class Bar
{
    public $foo;
}
```

Usage
-----------
you can now annotate other classes with your annotations:
```php
<?php
namespace MyCompany\Entity;

use MyCompany\Annotations\Foo;
use MyCompany\Annotations\Bar;

/**
 * @Foo(bar="foo")
 * @Bar(foo="bar")
 */
class User
{
}
```
Now we can write a script to get the annotations above:

```php
<?php
use Ray\Annotation\ReflectionClass;

$reflection = new ReflectionClass('User');
var_dump($reflection->getAnnotation('MyCompany\Annotations\Foo')); // prints "foo";
var_dump($reflection->isAnnotationPresent('MyCompany\Annotations\Foo')); // prints true

$r$classAnnotations = eflection->getAnnotations();
foreach ($classAnnotations as $annot) {
    if ($annot instanceof \MyCompany\Annotations\Foo) {
        echo $annot->bar; // prints "foo";
    } else if ($annot instanceof \MyCompany\Annotations\Bar) {
        echo $annot->foo; // prints "bar";
    }
}

```

Testing Ray.Annotation
--------------

Here's how to install Ray.Annotation from source to run the unit tests:

```
git clone git@github.com:koriym/Ray.Annotation.git
cd ray.annotation
git submodule update --init
phpunit
```
