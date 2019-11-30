<?php
/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

use Entity\Website;
use Entity\WebsiteInterface;
use function DI\autowire;
use function DI\get;

return [
    Website::class => autowire(),
    WebsiteInterface::class => get(Website::class),
];