<?php
require_once __DIR__ . '/../inc/main-fonctions.php';

$chemin = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($chemin === '/') {
    require __DIR__ . '/index.php';
    return true;
}
if (is_file(__DIR__ . $chemin)) {
    return false;
}
afficherErreur(404);