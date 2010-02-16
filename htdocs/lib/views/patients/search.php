<?php if (!empty($patients)): ?>
Gefundene Patienten:
    <ul>
    <?php foreach($patients as $patient): ?>
        <li><?php 
            echo $html->link(
                $patient['Patients']['first_name'] . ' ' . $patient['Patients']['last_name'], 
                array('controller' => 'patients', 'action' => 'edit', $patient['Patients']['id'])
            ); 
        ?></li>
    <?php endforeach; ?>
    </ul>
<?php else: ?>
    <em>Keine Patienten mit dem Namen <strong><?php echo $first_name . ' ' . $last_name; ?></strong> vorhanden</em>
<?php endif; ?>
