<?php


class Listas {

    var $id_lista;
    var $titulo;
    var $archivada;

	 	
	public function __construct($id_lista='',$titulo='',$archivada=''){ 
      	 $this->id_lista=$id_lista; 
      	 $this->titulo=$titulo;
	     $this->archivada=$archivada;
   	} 

	public function add_lista($titulo){
	include 'conexion.php';
        $stmt = $pdo->prepare ("INSERT INTO listas (titulo) VALUES(:titulo)");
	$stmt->execute(array("titulo" => $titulo));
	//$stmt->execute();
    }
}

?>
