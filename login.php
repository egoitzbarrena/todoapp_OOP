<?php

session_start();
include("conexion.php");

$nombre=$_POST['nombre']; 
$password=$_POST['password']; 

    $stmt = $pdo->prepare("SELECT id_usuario,nombre,password,tipo FROM usuarios WHERE nombre = :nombre AND password = :password");

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':password', $password);

    $stmt->execute();
    $count = $stmt->rowCount();
    $row  = $stmt -> fetchAll(PDO::FETCH_ASSOC);

	if($count==0)
	
	{
    	
		$_SESSION[id_usuario]=$row[0];
		$_SESSION[tipo]=$row[3];
		$_SESSION[nombre]=$nombre;
		$_SESSION[password]=$password;

	}
	else 
	{
	header("location:paginaPrincipal.php");
	}

    $pdo = null;
?>