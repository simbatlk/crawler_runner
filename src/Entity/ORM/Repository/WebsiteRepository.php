<?php
declare(strict_types = 1);

/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

namespace Entity\ORM\Repository;

use Doctrine\ORM\EntityRepository;
use Entity\WebsiteInterface;

class WebsiteRepository extends EntityRepository implements WebsiteRepositoryInterface
{
    /**
     * @param \Entity\WebsiteInterface $website
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(WebsiteInterface $website): void
    {
        $this->_em->persist($website);
        $this->_em->flush();
    }
}