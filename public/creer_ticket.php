<?php
require_once __DIR__ . '/../inc/main-fonctions.php';

session_start();
exigerrole('usager');
$titre = '';
$description = '';
$erreur = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = trim($_POST['titre'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $erreur = validerticket($titre, $description);
    if ($erreur === '') {
        creernouveauticket($_SESSION['compte_id'], $titre, $description);
        header('Location: /dashboard_usager.php');
        exit;
    }
}
afficherPage('creer-ticket', [
    'titre' => $titre,
    'description' => $description,
    'erreur' => $erreur,
]);