<?php
require dirname(__DIR__) . '/vendor/Doctrine/Common/lib/Doctrine/Common/ClassLoader.php';

$commonLoader = new \Doctrine\Common\ClassLoader('Doctrine\Common', dirname(__DIR__) . '/vendor/Doctrine/Common/lib');
$commonLoader->register();

require __DIR__ . '/Mock/Annotation/Bar.php';
require __DIR__ . '/Mock/Annotation/Foo.php';
require __DIR__ . '/Mock/Class/User.php';