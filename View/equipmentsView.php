<?php
foreach ($salles as $salle) {
    $this->title = $salle['name'];
}
?>

<table>
    <tr>
        <th>Matériel</th>
        <th>Quantité</th>
    </tr>
    <?php foreach ($equipments as $equipment) : ?>
    <tr>
        <td><?= $equipment['name'] ?></td>
        <td><?= $equipment['quantity'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
