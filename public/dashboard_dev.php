<?php
require_once __DIR__ . '/../inc/main-fonctions.php';

session_start();
exigerrole('dev');
afficherPage('dashboard-dev', [
    'tickets' => ticketsencours(),
    'lien' => 'voir_ticket_dev.php',
]);