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