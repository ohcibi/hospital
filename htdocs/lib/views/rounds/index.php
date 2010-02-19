<h2>Roundn von <?php echo $patient['Patients']['first_name'] . ' ' . $patient['Patients']['last_name']; ?></h2>
<?php if (!empty($patient['Rounds'])): ?>
    <table>
        <tr><th>Arzt</th><th>Visitendatum</th><th>Temperatur</th><th>Gewicht</th><th>Puls</th><th>Blutdruck</th></tr>
        <?php foreach($patient['Rounds'] as $round): ?>
            <tr>
                <td><?php echo $round['Doctors']['title'] . ' ' . $round['Doctors']['first_name'] . ' ' . $round['Doctors']['last_name']; ?></td>
                <td><?php echo $round['Rounds']['created']; ?></td>
                <td><?php echo $round['Rounds']['temperature']; ?> °C</td>
                <td><?php echo $round['Rounds']['weight']; ?> g</td>
                <td><?php echo $round['Rounds']['pulse']; ?></td>
                <td><?php echo $round['Rounds']['blood_pressure_systolic'] . '/' . $round['Rounds']['blood_pressure_diastolic']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <em>Noch keine Visite vorhanden</em>
<?php endif; ?>
