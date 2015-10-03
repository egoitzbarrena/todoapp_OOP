<?php
echo "<html>";
echo "<head>";
echo "<title>PAGINA PRINCIPAL TODOAPP</title>";
echo "<link rel='stylesheet' type='text/css' href='paginaPrincipal.css'/>";
echo "</head>";
echo "<body>";
echo "<div align='right'>
      <a href='archivadas.php'><img id='archivadas'src='archivadas.png'></a>
      <a href='index.html'><img  id='index'src='index.png'></a>
      </div>";


include "conexion.php";

//copiar select iker
// $stmt = $pdo->prepare ("SELECT l.id_lista, l.titulo FROM listas l left join lista_usuario u on l.id_lista = u.id_lista WHERE u.id_usuario='1' and l.archivada='1';");

$stmt = $pdo->prepare ("SELECT titulo,id_lista FROM listas where archivada = '0'");
$stmt->execute();


foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
{
 echo "<table id='tabla'border=0>";	
 //ARCHIVAR LISTA
 echo"<tr>
 		<td><form method='post' action='archivarLista.php'>
 			<input type='image' id='archivar'  src='archivar.png' name='id_lista' value=$row[id_lista] ></a>
 			</form></td>";
 	//AGREGAR LISTA	
 		echo"	<th>$row[titulo]</th>
 		<td><a href='agregarLista.html'><img id='agregar'src='agregar.png'></a></td>";
 		//MODIFICAR LIsTA
 		echo"<td> 
 			<form method='post' action='modificarLista.php'>
 			<input type='image' id='modificarLista' src='modificarlista.png' name='id_lista' value=$row[id_lista] ></a>
 			</form>
 		</td>
 		
 	 </tr>";

$stmt2 = $pdo->prepare ("SELECT id_tarea, descripcion FROM tareas where id_lista = $row[id_lista] and archivada='0'");
$stmt2->execute();

foreach($stmt2->fetchAll(PDO::FETCH_ASSOC) as $row2){
	//ARCHIVAR TAREA
 echo"<tr>
 		<td><form method='post' action='archivarTarea.php'>
 			<input type='image' id='archivar' src='archivar.png' name='id_tarea' value=$row2[id_tarea] >
 			</form></td>";
 //MODIFICAR TAREA
 echo"<td>$row2[descripcion]</td>
 		<td><form method='post' action='modificarTarea.php'>
 		 <input type='hidden' name='id_lista' value='$row[id_lista]'>
 			<input type='image' id='modificarTarea' src='modificartarea.png' name='id_tarea' value=$row2[id_tarea] >
 			</form></td>
 	 </tr>";

}

//AGREGAR TAREA
 echo "<tr>
 			<td></td>
 			
 			<td><form method='post' action='agregarTarea.php'>
 		 
 			<input type='image' id='agregarTarea' src='agregar.png' name='id_lista' value=$id_lista>
 			</form></td>
 	   </tr>";
 echo "</table>";
 echo "<br>";
 echo "<br>";
 echo "<br>";
}

echo "</body>";
echo "</html>";
?>
