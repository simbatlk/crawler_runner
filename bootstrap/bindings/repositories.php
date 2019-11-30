<?php
/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

use Entity\ORM\Repository\WebsiteRepository;
use Entity\ORM\Repository\WebsiteRepositoryInterface;
use Entity\ORM\RepositoryFactory;
use Entity\Website;
use function DI\factory;
use function DI\get;

return [
    WebsiteRepository::class => factory(RepositoryFactory::class)->parameter('entity', Website::class),
    WebsiteRepositoryInterface::class => get(WebsiteRepository::class)
];