<?php
function ticketsusager(int $compte_id): array
{
    return executerRequete('voir-tickets-par-compte', ['compte' => $compte_id]);
}

function ticketsencours(): array
{
    return executerRequete('voir-tickets-en-cours', []);
}

function validerticket(string $titre, string $description): string
{
    if ($titre === '' || $description === '') {
        return 'Le titre et la description sont obligatoires.';
    }
    if (strlen($titre) > 100) {
        return 'Le titre est trop long (100 caractères maximum).';
    }
    return '';
}

function creernouveauticket(int $compte_id, string $titre, string $description): bool
{
    return executerRequete('creer-ticket', [
        'compte' => $compte_id,
        'titre' => $titre,
        'description' => $description,
        'statut' => 'NOUVEAU',
        'date_creation' => date('Y-m-d H:i:s'),
    ]);
}


function ticketvisible(int $id, string $role, int $compte_id): ?array
{
    $ticket = executerRequete('voir-ticket-par-id', ['ticket' => $id]);
    if ($ticket === null) {
        return null;
    }
    if ($role === 'usager' && (int) $ticket['compte_id'] !== $compte_id) {
        return null;
    }
    return $ticket;
}

function actionspossibles(string $role, string $statut): array
{
    if ($role === 'usager') {
        $actions = $statut === 'CLOS' ? [] : ['cloturer'];
        return $statut === 'RESOLU' ? ['repondre', 'cloturer'] : $actions;
    }
    return in_array($statut, ['NOUVEAU', 'NONRESOLU']) ? ['repondre'] : [];
}

function traiteraction(array $ticket, string $role, int $compte_id, string $action, string $contenu): string
{
    if (!in_array($action, actionspossibles($role, $ticket['statut']))) {
        return 'Action non autorisée.';
    }
    if ($action === 'repondre' && $contenu === '') {
        return 'La réponse ne peut pas être vide.';
    }
    $statut = 'CLOS';
    if ($action === 'repondre') {
        ajoutermessage($compte_id, $ticket['id'], $contenu);
        $statut = $role === 'dev' ? 'RESOLU' : 'NONRESOLU';
    }
    executerRequete('modifier-statut-ticket', ['statut' => $statut, 'ticket' => $ticket['id']]);
    return '';
}