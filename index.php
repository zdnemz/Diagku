<?php
// Error reporting untuk debugging saat development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoload (jika tidak pakai Composer, load manual)
require_once __DIR__ . '/src/utils/Route.php';
require_once __DIR__ . '/src/utils/Controller.php';
require_once __DIR__ . '/src/utils/Model.php';
require_once __DIR__ . '/src/utils/View.php';

// Routes
require_once __DIR__ . '/src/routes/web.php';

// Jalankan router
Route::dispatch($_SERVER['REQUEST_URI']);
