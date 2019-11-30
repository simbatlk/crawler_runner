<?php
/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\ErrorHandler\ErrorHandler;
use Symfony\Component\ErrorHandler\DebugClassLoader;

if (env('APP_DEBUG') && env('ENVIRONMENT') === 'development') {
    Debug::enable();
    ErrorHandler::register();
    DebugClassLoader::enable();
}