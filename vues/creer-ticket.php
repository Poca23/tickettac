<h2>Nouveau ticket</h2>
<?php if ($erreur !== ''): ?>
    <p role="alert"><?= htmlspecialchars($erreur) ?></p>
<?php endif; ?>
<form method="post" action="/creer_ticket.php">
    <label for="titre">Titre</label>
    <input type="text" id="titre" name="titre" maxlength="100" value="<?= htmlspecialchars($titre) ?>" required>
    <label for="description">Description</label>
    <textarea id="description" name="description" rows="6" required><?= htmlspecialchars($description) ?></textarea>
    <button type="submit">Créer le ticket</button>
</form>
<p><a href="/dashboard_usager.php">Retour</a></p>