<h2>Ticket n°<?= (int) $ticket['id'] ?> : <?= htmlspecialchars($ticket['titre']) ?></h2>
<p>Statut : <strong><?= htmlspecialchars($ticket['statut']) ?></strong> | Créé le
    <?= htmlspecialchars($ticket['date_creation']) ?></p>
<p><?= nl2br(htmlspecialchars($ticket['description'])) ?></p>
<h3>Échanges</h3>
<?php foreach ($messages as $message): ?>
    <?php require base('vues/composants/message.php'); ?>
<?php endforeach; ?>
<?php if ($erreur !== ''): ?>
    <p role="alert"><?= htmlspecialchars($erreur) ?></p>
<?php endif; ?>
<?php if (in_array('repondre', $actions)): ?>
    <form method="post" action="/<?= htmlspecialchars($page) ?>?id=<?= (int) $ticket['id'] ?>">
        <label for="contenu">Votre réponse</label>
        <textarea id="contenu" name="contenu" rows="4" required></textarea>
        <button type="submit" name="action" value="repondre">Répondre</button>
    </form>
<?php endif; ?>
<?php if (in_array('cloturer', $actions)): ?>
    <form method="post" action="/<?= htmlspecialchars($page) ?>?id=<?= (int) $ticket['id'] ?>">
        <button type="submit" name="action" value="cloturer">Clôturer le ticket</button>
    </form>
<?php endif; ?>
<p><a href="/<?= htmlspecialchars($retour) ?>">Retour</a></p>