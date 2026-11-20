<?php
require_once __DIR__ . '/../inc/main-fonctions.php';

session_start();
if (isset($_SESSION['role'])) {
    redirigerselonrole();
}
$erreur = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifiant = trim($_POST['identifiant'] ?? '');
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';
    if (connecter($identifiant, $mot_de_passe)) {
        redirigerselonrole();
    }
    $erreur = 'Identifiant ou mot de passe incorrect.';
}
afficherPage('connexion', ['erreur' => $erreur]);