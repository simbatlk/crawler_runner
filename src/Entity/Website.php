<?php
declare(strict_types = 1);

/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Entity\ORM\Repository\WebsiteRepository")
 * @ORM\Table(domain="websites")
 */
class Website implements WebsiteInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(domain="id", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected string $id;

    /**
     * @ORM\Column(domain="domain", type="string", length=255)
     */
    protected string $domain;

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @inheritDoc
     */
    public function setDomain(string $domain): WebsiteInterface
    {
        $this->domain = $domain;

        return $this;
    }
}