<?php

define('SITE_DIR', __DIR__ . '/../');
define('CONFIG_DIR', SITE_DIR . 'config/');
define('DATA_DIR', SITE_DIR . 'data/');
define('ENGINE_DIR', SITE_DIR . 'engine/');
define('WWW_DIR', SITE_DIR . 'public/');
define('TEMPLATES_DIR', SITE_DIR . 'templates/');

define('CSS',  '/css/style.css');

define('DB_HOST', 'localhost');
define('DB_USER', 'geek_brains');
define('DB_PASS', '789');
define('DB_NAME', 'geek_brains_shop');


require_once ENGINE_DIR . 'functions.php';
require_once ENGINE_DIR . 'db.php';
require_once ENGINE_DIR . 'news.php';
require_once DATA_DIR . 'menu.php';
require_once ENGINE_DIR . 'images.php';
require_once ENGINE_DIR . 'calc.php';
require_once ENGINE_DIR . 'reviews.php';