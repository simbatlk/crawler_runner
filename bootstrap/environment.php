<?php
/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

$env = Dotenv\Dotenv::create(__DIR__ . '/..');
$env->load();

if(!function_exists('env')) {
    function env($key, $default = null)
    {
        $value = getenv($key);
        if ($value === false) {
            return $default;
        }
        return $value;
    }
}