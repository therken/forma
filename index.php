<?php
include ("settings.php");
$conn = mysqli_connect($host , $user , $pass , $db);
$name = $_POST['name'];
$sec = $_POST['secondname'];
$last = $_POST['lastname'];
$ma = $_POST['mail'];
$me = $_POST['about'];
$data = $_POST['data'];

$sql = "INSERT INTO user_form (firstname, secondname, lastname, mail, about, dendata)
VALUES ('$name', '$sec', '$last', '$ma', '$me', '$data')";

 if ($conn->query($sql) === TRUE){
    echo "Пользователь добавлен";
 } else {
    echo "Ошибка:" . $sql . "<br>" . $conn->error;
 }

 ?>

