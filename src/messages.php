<?php
function messagesticket(int $ticket_id): array
{
    return executerRequete('voir-responses-par-ticket', ['ticket' => $ticket_id]);
}

function ajoutermessage(int $compte_id, int $ticket_id, string $contenu): bool
{
    return executerRequete('creer-reponse', [
        'compte' => $compte_id,
        'ticket' => $ticket_id,
        'contenu' => $contenu,
        'date_creation' => date('Y-m-d H:i:s'),
    ]);
}