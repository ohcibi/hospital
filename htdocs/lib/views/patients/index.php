<table>
    <tr>
        <th>ID</th><th>Vorname</th><th>Name</th><th>Raum</th><th class="actions">Actions</th>
    </tr>
<?php foreach($patients as $patient): ?>
    <tr>
        <td><?php echo $patient['Patients']['id']; ?></td>
        <td><?php echo $patient['Patients']['first_name']; ?></td>
        <td><?php echo $patient['Patients']['last_name']; ?></td>
        <td><?php echo $patient['Rooms']['title']; ?></td>
        <td class="actions">
    </tr>
<?php endforeach; ?>
</table>

<ul class="actions">
    <li><a href="add">Patient hinzufügen</a></li>
    <li><a href="/rooms/add">Raum hinzufügen</a></li>
</ul>
