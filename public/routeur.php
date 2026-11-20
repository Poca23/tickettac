<?php
require_once __DIR__ . '/../inc/main-fonctions.php';

$fichier = __DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (is_file($fichier)) {
    return false;
}
afficherErreur(404);