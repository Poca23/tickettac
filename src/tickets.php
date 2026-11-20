<?php
function ticketsusager(int $compte_id): array
{
    return executerRequete('voir-tickets-par-compte', ['compte' => $compte_id]);
}

function ticketsencours(): array
{
    return executerRequete('voir-tickets-en-cours', []);
}