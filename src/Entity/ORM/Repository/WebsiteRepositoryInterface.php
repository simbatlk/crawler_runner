<?php
/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

namespace Entity\ORM\Repository;

use Doctrine\Common\Collections\Selectable;
use Doctrine\Common\Persistence\ObjectRepository;
use Entity\WebsiteInterface;

interface WebsiteRepositoryInterface extends ObjectRepository, Selectable
{
    public function save(WebsiteInterface $website): void;
}