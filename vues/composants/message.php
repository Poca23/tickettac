<article>
    <p><strong>Compte <?= (int) $message['compte_id'] ?></strong> le <?= htmlspecialchars($message['date_creation']) ?>
    </p>
    <p><?= nl2br(htmlspecialchars($message['contenu'])) ?></p>
</article>