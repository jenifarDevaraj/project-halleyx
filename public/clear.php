<?php

// Enable full error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Load Composer autoload
require __DIR__.'/../vendor/autoload.php';

// Boot Laravel app
$app = require_once __DIR__.'/../bootstrap/app.php';

// Bootstrap the application
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('route:clear');
    \Artisan::call('view:clear');
    \Artisan::call('config:cache');

    echo "<h3 style='color: green'>✅ Laravel cache cleared successfully.</h3>";
} catch (Throwable $e) {
    echo "<h3 style='color: red'>❌ Error:</h3>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}
