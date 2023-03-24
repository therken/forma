<?php
$host= 'localhost';
$user = 'root';
$pass = '';
$db = 'form'; 
$conn = mysqli_connect($host , $user , $pass , $db);
// Check connection
if($conn === false){
  die("ERROR: Невозможно подключиться. "
      . mysqli_connect_error());
}
?>