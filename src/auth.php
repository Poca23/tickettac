<?php
function connecter(string $identifiant, string $mot_de_passe): bool
{
    $compte = executerRequete('recuperer-compte-par-identifiant', ['identifiant' => $identifiant]);
    if (empty($compte) || !password_verify($mot_de_passe, $compte['mot_de_passe'])) {
        return false;
    }
    session_regenerate_id(true);
    $_SESSION['compte_id'] = $compte['id'];
    $_SESSION['identifiant'] = $compte['identifiant'];
    $_SESSION['role'] = $compte['role'];
    return true;
}

function rediriger(string $page): void
{
    header('Location: /' . $page);
    exit;
}

function redirigerselonrole(): void
{
    rediriger('dashboard_' . $_SESSION['role'] . '.php');
}

function exigerrole(string $role): void
{
    if (!isset($_SESSION['role'])) {
        rediriger('index.php');
    }
    if ($_SESSION['role'] !== $role) {
        afficherErreur(403);
        exit;
    }
}

function deconnecter(): void
{
    session_destroy();
    rediriger('index.php');
}