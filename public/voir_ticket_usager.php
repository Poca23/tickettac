<?php
require_once __DIR__ . '/../inc/main-fonctions.php';

session_start();
exigerrole('usager');
$ticket = ticketvisible((int) ($_GET['id'] ?? 0), 'usager', $_SESSION['compte_id']);
if ($ticket === null) {
    afficherErreur(404);
    exit;
}
$erreur = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $erreur = traiteraction($ticket, 'usager', $_SESSION['compte_id'], $_POST['action'] ?? '', trim($_POST['contenu'] ?? ''));
    if ($erreur === '') {
        rediriger('voir_ticket_usager.php?id=' . $ticket['id']);
    }
}
afficherPage('voir-ticket-usager', [
    'ticket' => $ticket,
    'messages' => messagesticket($ticket['id']),
    'actions' => actionspossibles('usager', $ticket['statut']),
    'erreur' => $erreur,
    'page' => 'voir_ticket_usager.php',
    'retour' => 'dashboard_usager.php',
]);