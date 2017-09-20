#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: rooms
#------------------------------------------------------------

CREATE TABLE rooms(
  id_room int (11) Auto_increment  NOT NULL ,
  name    Varchar (255) NOT NULL ,
  PRIMARY KEY (id_room )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reservations
#------------------------------------------------------------

CREATE TABLE reservations(
  id_reservation         int (11) Auto_increment  NOT NULL ,
  title                  Varchar (255) NOT NULL ,
  reservation_start_date Date NOT NULL ,
  reservation_end_date   Date NOT NULL ,
  note                   Text NOT NULL ,
  id_room                Int NOT NULL ,
  id_function            Int NOT NULL ,
  id_training            Int NOT NULL ,
  PRIMARY KEY (id_reservation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: trainers
#------------------------------------------------------------

CREATE TABLE trainers(
  id_former  int (11) Auto_increment  NOT NULL ,
  name       Varchar (255) NOT NULL ,
  first_name Varchar (255) NOT NULL ,
  PRIMARY KEY (id_former )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: equipments
#------------------------------------------------------------

CREATE TABLE equipments(
  id_equipment int (11) Auto_increment  NOT NULL ,
  name         Varchar (255) NOT NULL ,
  PRIMARY KEY (id_equipment )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: function
#------------------------------------------------------------

CREATE TABLE function(
  id_function int (11) Auto_increment  NOT NULL ,
  name        Varchar (255) NOT NULL ,
  PRIMARY KEY (id_function )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: training
#------------------------------------------------------------

CREATE TABLE training(
  id_training        int (11) Auto_increment  NOT NULL ,
  name               Varchar (255) NOT NULL ,
  start_date         Date NOT NULL ,
  end_date           Date NOT NULL ,
  pae_start_date     Date NOT NULL ,
  pae_end_date       Date NOT NULL ,
  certification_date Date NOT NULL ,
  id_group           Int NOT NULL ,
  PRIMARY KEY (id_training )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: groups
#------------------------------------------------------------

CREATE TABLE groups(
  id_group  int (11) Auto_increment  NOT NULL ,
  title     Varchar (255) NOT NULL ,
  id_former Int NOT NULL ,
  PRIMARY KEY (id_group )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: trainees
#------------------------------------------------------------

CREATE TABLE trainees(
  id_trainee int (11) Auto_increment  NOT NULL ,
  name       Varchar (25) NOT NULL ,
  first_name Varchar (25) NOT NULL ,
  id_group   Int NOT NULL ,
  PRIMARY KEY (id_trainee )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: equipment_quantity
#------------------------------------------------------------

CREATE TABLE equipment_quantity(
  quantity     Int NOT NULL ,
  id_equipment Int NOT NULL ,
  id_room      Int NOT NULL ,
  PRIMARY KEY (id_equipment ,id_room )
)ENGINE=InnoDB;

ALTER TABLE reservations ADD CONSTRAINT FK_reservations_id_room FOREIGN KEY (id_room) REFERENCES rooms(id_room);
ALTER TABLE reservations ADD CONSTRAINT FK_reservations_id_function FOREIGN KEY (id_function) REFERENCES function(id_function);
ALTER TABLE reservations ADD CONSTRAINT FK_reservations_id_training FOREIGN KEY (id_training) REFERENCES training(id_training);
ALTER TABLE training ADD CONSTRAINT FK_training_id_group FOREIGN KEY (id_group) REFERENCES groups(id_group);
ALTER TABLE groups ADD CONSTRAINT FK_groups_id_former FOREIGN KEY (id_former) REFERENCES trainers(id_former);
ALTER TABLE trainees ADD CONSTRAINT FK_trainees_id_group FOREIGN KEY (id_group) REFERENCES groups(id_group);
ALTER TABLE equipment_quantity ADD CONSTRAINT FK_equipment_quantity_id_equipment FOREIGN KEY (id_equipment) REFERENCES equipments(id_equipment);
ALTER TABLE equipment_quantity ADD CONSTRAINT FK_equipment_quantity_id_room FOREIGN KEY (id_room) REFERENCES rooms(id_room);
