<h2>Connexion</h2>
<?php if ($erreur !== ''): ?>
    <p role="alert"><?= htmlspecialchars($erreur) ?></p>
<?php endif; ?>
<form method="post" action="/index.php">
    <label for="identifiant">Identifiant</label>
    <input type="text" id="identifiant" name="identifiant" required>
    <label for="mot_de_passe">Mot de passe</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required>
    <button type="submit">Se connecter</button>
</form>