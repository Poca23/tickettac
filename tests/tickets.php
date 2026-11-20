<?php
require_once __DIR__ . '/../inc/main-fonctions.php';

$echecs = 0;

function verifier(string $nom, $obtenu, $attendu): void
{
    global $echecs;
    if ($obtenu === $attendu) {
        echo "OK     $nom\n";
        return;
    }
    $echecs++;
    echo "ECHEC  $nom\n";
}

verifier('titre vide', validerticket('', 'desc') !== '', true);
verifier('description vide', validerticket('titre', '') !== '', true);
verifier('titre trop long', validerticket(str_repeat('a', 101), 'desc') !== '', true);
verifier('ticket valide', validerticket('titre', 'desc'), '');

verifier('usager NOUVEAU', actionspossibles('usager', 'NOUVEAU'), ['cloturer']);
verifier('usager RESOLU', actionspossibles('usager', 'RESOLU'), ['repondre', 'cloturer']);
verifier('usager NONRESOLU', actionspossibles('usager', 'NONRESOLU'), ['cloturer']);
verifier('usager CLOS', actionspossibles('usager', 'CLOS'), []);

verifier('dev NOUVEAU', actionspossibles('dev', 'NOUVEAU'), ['repondre']);
verifier('dev NONRESOLU', actionspossibles('dev', 'NONRESOLU'), ['repondre']);
verifier('dev RESOLU', actionspossibles('dev', 'RESOLU'), []);
verifier('dev CLOS', actionspossibles('dev', 'CLOS'), []);

echo $echecs === 0 ? "\nTous les tests passent.\n" : "\n$echecs échec(s).\n";