<?php
/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

use DI\ContainerBuilder;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/environment.php';
require __DIR__ . '/debug.php';

$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions(__DIR__ . '/bindings.php');

$container = $containerBuilder->build();
return $container;