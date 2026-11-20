<?php
require_once __DIR__ . '/../inc/main-fonctions.php';

session_start();
exigerrole('usager');
afficherPage('dashboard-usager', [
    'tickets' => ticketsusager($_SESSION['compte_id']),
    'lien' => 'voir_ticket_usager.php',
]);