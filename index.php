<?php
// Error reporting untuk debugging saat development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoload manual controller & model
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/src/controllers/' . $class . '.php',
        __DIR__ . '/src/models/' . $class . '.php',
    ];

    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});


// Autoload 
require_once __DIR__ . '/src/utils/Route.php';
require_once __DIR__ . '/src/utils/Controller.php';
require_once __DIR__ . '/src/utils/Model.php';
require_once __DIR__ . '/src/utils/View.php';

// Routes
require_once __DIR__ . '/src/routes/web.php';

// Jalankan router
Route::dispatch($_SERVER['REQUEST_URI']);
