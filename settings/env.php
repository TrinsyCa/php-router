<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

function env($key, $default = null) {
    return $_ENV[$key] ?? $default;
}

$directory = env("DIRECTORY", "");
if (!empty(trim($directory))) {
    if (substr($directory, -1) !== '/') {
        $directory .= "/";
    }
    $_ENV['DIRECTORY'] = $directory;
}

include(__DIR__ . '/../routes/settings.php');
