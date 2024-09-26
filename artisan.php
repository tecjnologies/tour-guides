<?php

// Ensure we have access to the autoloaded classes
require __DIR__.'/vendor/autoload.php';

// Create an instance of the Laravel application
$app = require_once __DIR__.'/bootstrap/app.php';

// Create an instance of the Artisan console
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Boot the application
$kernel->bootstrap();

// Clear all caches
echo "Clearing all caches...\n";

// Clear application cache
echo "Clearing application cache...\n";
Artisan::call('cache:clear');
echo Artisan::output();

// Clear route cache
echo "Clearing route cache...\n";
Artisan::call('route:clear');
echo Artisan::output();

// Clear config cache
echo "Clearing config cache...\n";
Artisan::call('config:clear');
echo Artisan::output();

// Clear view cache
echo "Clearing view cache...\n";
Artisan::call('view:clear');
echo Artisan::output();

// Optionally, clear compiled files
echo "Clearing compiled files...\n";
Artisan::call('clear-compiled');
echo Artisan::output();

echo "All caches cleared successfully.\n";