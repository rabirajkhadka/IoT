<?php
//insert.php

if(isset($_POST["name"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=iot", "root", "");
 $query = "
 UPDATE led_one SET status = :status WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':status'  => $_POST['hidden_status'],
   ':id' => 0
  )
 );

 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'done';
 }
}
/* INSERT INTO led_one (status) 
 VALUES(:status)*/
?>