<?php
try{
    
   $pdo = new PDO("mysql:host=localhost;dbname=todoapp",'root', ''); 
   
} catchcatch(PDOException $e) {
    echo $e->getMessage();
}

?>
