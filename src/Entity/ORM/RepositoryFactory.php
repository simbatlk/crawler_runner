<?php
/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

namespace Entity\ORM;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;

class RepositoryFactory
{
    public function __invoke(ContainerInterface $container, string $entity): ObjectRepository
    {
        $entityManager = $container->get(EntityManagerInterface::class);
        return $entityManager->getRepository($entity);
    }
}