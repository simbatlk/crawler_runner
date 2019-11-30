<?php
/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

$container = require_once __DIR__ . "/../bootstrap/app.php";
return ConsoleRunner::createHelperSet($container->get(EntityManagerInterface::class));
