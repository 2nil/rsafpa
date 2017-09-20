<?php $this->title='Gestion des salle'; ?>

<h2>Batiment C / 2ème étage</h2>
<?php foreach($salles as $salle):?>
    <a href="<?= "index.php?controller=equipments&action=salle&id=".$this->clean($salle['id_room']) ?>"><div class="buttonSalle"><h3><?= $salle['name'] ?></h3></div></a>
<?php endforeach; ?>
