<?php
require __DIR__ . '/src/Exception.php';

require __DIR__ . '/src/AnnotatedElement.php';
require __DIR__ . '/src/AnnotationAccess.php';
require __DIR__ . '/src/ReflectionMethod.php';
require __DIR__ . '/src/ReflectionClass.php';
require __DIR__ . '/src/ReflectionProperty.php';

require __DIR__ . '/vendor/Doctrine/Common/lib/Doctrine/Common/ClassLoader.php';
$commonLoader = new \Doctrine\Common\ClassLoader('Doctrine\Common', __DIR__ . '/vendor/Doctrine/Common/lib');
$commonLoader->register();

