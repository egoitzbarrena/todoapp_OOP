<?php

class Usuarios {

    var $id_usuario;
    var $nombre;
    var $password;
    var $tipo;


	 	
	public function __construct($id_usuario='',$nombre='',$password='',$tipo=''){ 
      	 $this->id_usuario=$id_usuario; 
      	 $this->nombre=$nombre;
	     $this->password=$password;
	     $this->tipo=$tipo;
   	} 

	public function add_user($nombre,$password){
	include 'conexion.php';
        $stmt = $pdo->prepare ("INSERT INTO usuarios (nombre, password) VALUES(:nombre , :password)");
	$stmt->execute(array("nombre" => $nombre,"password" => $password));
	//$stmt->execute();
    }
}

?>
