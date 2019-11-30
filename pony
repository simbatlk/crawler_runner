#!/usr/bin/env php

<?php
/**
 * @author   Ivan "Thunderlane" Atanasov <thunderlane@thewonderbolts.eu>
 */

$container = require __DIR__ . '/bootstrap/app.php';
$app = new Silly\Application();

$app->useContainer($container, $injectWithTypeHint = true);

$app->command('crawl', 'Command\Crawl')
    ->descriptions('Crawls websites')
;

$app->run();