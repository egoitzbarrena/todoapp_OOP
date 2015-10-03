<?php

class Tareas {

    var $id_tarea;
    var $descripcion;
    var $id_lista;
    var $archivada;


	 	
	public function __construct($id_tarea='',$descripcion='',$id_lista='',$archivada=''){ 
      	 $this->id_tarea=$id_tarea; 
      	 $this->descripcion=$descripcion;
	     $this->id_lista=$id_lista;
	     $this->archivada=$archivada;
   	} 

	public function add_tarea($descripcion,$id_lista){
	include 'conexion.php';
        $stmt = $pdo->prepare ("INSERT INTO tareas (descripcion,id_lista) VALUES(:descripcion, :id_lista)");
	$stmt->execute(array("descripcion" => $descripcion, "id_lista" => $id_lista));
    }
}

?>
