<?php
try{
    
   $pdo = new PDO("mysql:host=localhost;dbname=todoapp",'root', ''); 
   
} catch(PDOException $e) {
    echo $e->getMessage();
}

?>
