<?php
/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

$dbConfig = require_once __DIR__ . '/../config/database.php';

$bindings = [];
$bindings[] = require_once __DIR__ . '/bindings/doctrine.php';
$bindings[] = require_once __DIR__ . '/bindings/entities.php';
$bindings[] = require_once __DIR__ . '/bindings/repositories.php';

return array_merge(...$bindings);