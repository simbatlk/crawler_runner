<?php
/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

use Doctrine\ORM\Tools\Setup;

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;

return [
    'connection' => [
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/../database/db.sqlite'
    ],
    'config' => Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader)
];