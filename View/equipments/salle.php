<?php foreach ($salles as $salle) {
    $this->title = 'Salle '.intval($_GET['id']);
}
?>
<table>
    <tr>
        <th>Matériel</th>
        <th>Quantité</th>
    </tr>
    <?php foreach ($equipments as $equipment) : ?>
    <tr>
        <td><?= $this->clean($equipment['name']) ?></td>
        <td>
            <form method="post" action="index.php?controller=equipments&action=addQuantity&id=<?= intval($_GET['id']) ?>">
                <input type="hidden" name="equipName" value="<?= $this->clean($equipment['name']) ?>"/>
                <input id="<?= $this->clean($equipment['name']) ?>" name="quantity" type="number" placeholder="<?= $this->clean($equipment['quantity']) ?>"/>
                <input type="submit" value="Modifier"/>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
