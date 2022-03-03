<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("models/");
$isDevMode = false;

$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => $app['config']['database']['username'],
    'password' => $app['config']['database']['password'],
    'dbname'   => $app['config']['database']['dbname'],
);


$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

$entityManager = EntityManager::create($dbParams, $config);
