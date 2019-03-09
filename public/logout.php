<?php

require_once __DIR__ . '/../config/config.php';

session_destroy();

header("Location: /index.php"); /* Перенаправление браузера */

/* Убедиться, что код ниже не выполнится после перенаправления .*/
exit;