<table>
    <tr>
        <th>#</th>
        <th>Titre</th>
        <th>Statut</th>
        <th>Date</th>
        <th></th>
    </tr>
    <?php foreach ($tickets as $ticket): ?>
        <tr>
            <td><?= (int) $ticket['id'] ?></td>
            <td><?= htmlspecialchars($ticket['titre']) ?></td>
            <td><span
                    class="statut statut-<?= strtolower(htmlspecialchars($ticket['statut'])) ?>"><?= htmlspecialchars($ticket['statut']) ?></span>
            </td>
            <td><?= htmlspecialchars($ticket['date_creation']) ?></td>
            <td><a href="/<?= htmlspecialchars($lien) ?>?id=<?= (int) $ticket['id'] ?>">Voir</a></td>
        </tr>
    <?php endforeach; ?>
</table>