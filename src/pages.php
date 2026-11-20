<?php
function afficherPage(string $vue, array $donnees = [], int $code = 200): void
{
    try {
        http_response_code($code);
        extract($donnees);
        require base('vues/composants/entete.php');
        require base('vues/' . $vue . '.php');
        require base('vues/composants/pied.php');
    } catch (Exception $erreur) {
        afficherErreur(500);
    }
}

function afficherErreur(int $code): void
{
    http_response_code($code);
    require base('vues/' . $code . '.php');
}