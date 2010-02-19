<?php if (!empty($specials)): ?>
    <table>
        <tr>
            <th>ID</th><th>Titel</th><th class="actions">Actions</th>
        </tr>
    <?php foreach($specials as $special): ?>
        <tr>
            <td><?php echo $special['Specials']['id']; ?></td>
            <td><?php echo $special['Specials']['title']; ?></td>
            <td class="actions">
                <ul>
                    <li><?php echo $html->link('Bearbeiten', array('controller' => 'specials', 'action' => 'edit', $special['Specials']['id'])); ?></li>
                    <li><?php echo $html->link('Löschen', array('controller' => 'specials', 'action' => 'delete', $special['Specials']['id']), array(), sprintf('Sicher, dass sie %s löschen wollen?', $special['Specials']['title'])); ?></li>
                </ul>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php else: ?>
    <em>Noch keine Spezialgebiete vorhanden</em>
<?php endif; ?>

<ul class="actions">
    <li><?php echo $html->link('Spezialgebiet hinzufügen', array('controller' => 'specials', 'action' => 'add')); ?></li>
</ul>
