<?php
/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

namespace Entity;

/**
 * Interface ProductInterface
 *
 * @package Entity
 */
interface WebsiteInterface
{
    /**
     * @return string
     */
    public function getId(): string ;

    /**
     * @return string
     */
    public function getDomain(): string;

    /**
     * @param string $domain
     * @return \Entity\WebsiteInterface
     */
    public function setDomain(string $domain): WebsiteInterface;
}