<?php

require_once 'model.php';

class Equipment extends Model {

    public function getEquipments($idSalle)
    {
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
}