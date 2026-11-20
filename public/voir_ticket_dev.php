<?php
require_once __DIR__ . '/../inc/main-fonctions.php';

session_start();
exigerrole('dev');
$ticket = ticketvisible((int) ($_GET['id'] ?? 0), 'dev', $_SESSION['compte_id']);
if ($ticket === null) {
    afficherErreur(404);
    exit;
}
$erreur = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $erreur = traiteraction($ticket, 'dev', $_SESSION['compte_id'], $_POST['action'] ?? '', trim($_POST['contenu'] ?? ''));
    if ($erreur === '') {
        rediriger('voir_ticket_dev.php?id=' . $ticket['id']);
    }
}
afficherPage('voir-ticket-dev', [
    'ticket' => $ticket,
    'messages' => messagesticket($ticket['id']),
    'actions' => actionspossibles('dev', $ticket['statut']),
    'erreur' => $erreur,
    'page' => 'voir_ticket_dev.php',
    'retour' => 'dashboard_dev.php',
]);