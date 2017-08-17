<?php
require __DIR__ . '/../vendor/autoload.php';

session_start();

// instantiate the app
$settings = require __DIR__ . '/../config/settings.php';
// $app = new \Slim\App(['settings' => $settings]);
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../config/dependencies.php';

// Register middleware
// require __DIR__ . '/../config/middleware.php';

// Register routes
require __DIR__ . '/../config/routes.php';

// Run app
$app->run();
