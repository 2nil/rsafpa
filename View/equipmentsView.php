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
        <td>
            <form method="post" action="index.php?action=addQuantity">
                <input id="<?= $equipment['name'] ?>" name="quantity" type="text" placeholder="<?= $equipment['quantity'] ?>"/>
                <input type="submit" value="Modifier"/>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
