<?php
/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use function DI\factory;
use function DI\get;

return [
    EntityManager::class => factory([EntityManager::class, 'create'])
        ->parameter('connection', $dbConfig['connection'])
        ->parameter('config', $dbConfig['config']),
    EntityManagerInterface::class => get(EntityManager::class)
];