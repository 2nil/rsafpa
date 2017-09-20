<?php

require_once '/Framework/Model.php';

class Equipment extends Model {

    public function getEquipments($idSalle) {
        $sql = (" 
                  SELECT rooms.id_room, equipment_quantity.quantity, equipments.name, equipments.id_equipment 
                  FROM `rooms` 
                  LEFT JOIN equipment_quantity ON rooms.id_room = equipment_quantity.id_room 
                  LEFT JOIN equipments ON equipment_quantity.id_equipment = equipments.id_equipment 
                  WHERE equipment_quantity.quantity IS NOT NULL AND rooms.id_room = $idSalle
                          ");
        $equipments = $this->executeRequest($sql);
        return $equipments;
    }

    public function updateQuantity($quantity, $idSalle, $equipmentName) {
        $sql = ("UPDATE equipment_quantity SET quantity=$quantity
                 WHERE equipment_quantity.id_equipment IN
                (SELECT equipments.id_equipment FROM equipments 
                 where equipment_quantity.id_room=$idSalle AND equipments.name='$equipmentName');
                 ");
        $this->executeRequest($sql, array($quantity, $idSalle, $equipmentName));
    }
}