<?php
/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

use FastRoute\RouteCollector;

return FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/api/v1/abc', ['Api\Controller\Abc', 'get']);
    $r->addRoute('GET', '/', ['App\Controller\Home', 'index']);
});