<?php
$host= 'localhost';
$user = 'root';
$pass = '';
$db = 'forma';
  
$conn = mysqli_connect($host , $user , $pass , $db);
// Check connection
if($conn === false){
  die("ERROR: Could not connect. "
      . mysqli_connect_error());
}

$name = mysqli_real_escape_string($conn ,$_POST['name']);
$sec = mysqli_real_escape_string($conn,$_POST['secondname']);
$last = mysqli_real_escape_string($conn,$_POST['lastname']);
$mail = mysqli_real_escape_string($conn,$_POST['mail']);
$about = mysqli_real_escape_string($conn,$_POST['about']);
$edate=strtotime($_POST['date']); 
$curdate=strtotime('22-02-2011');
$edate=date("Y-m-d",$edate);


$startDate = date('Y-m-d', strtotime("01/01/1900"));

$endDate = date('Y-m-d', strtotime("01/10/2024"));

if (($edate >= $startDate) && ($edate <= $endDate)) {

    echo "";

} else {

    echo "<center>некорректная дата</center>"; 
    die(); 
}
$uploaddir = 'uploads/';
$tempFilePath = $_FILES['image']['tmp_name']; 
  $fileName = $_FILES['image']['name']; 
$uploadFile = $uploaddir . uniqid() . '-' . basename($fileName); 

if(!is_uploaded_file($_FILES['image']['tmp_name']))  
{
     echo "<center>Загрузка файла на сервер не удалась</center>";
     die(); //or throw exception...
} 

//Проверка что это картинка

if (!getimagesize($_FILES["image"]["tmp_name"])) {
     echo "<center>Это не картинка...</center>";
     die(); //or throw exception...
}

if (move_uploaded_file($tempFilePath, $uploadFile)) {
    echo "<center>Файл корректен и был успешно загружен.\n</center>";
} else {
    echo "<center>Возможная атака с помощью файловой загрузки!\n</center>";
}
$photo_link = $uploadFile; 
$sql = "INSERT INTO user_form (firstname, secondname, lastname, mail, about, dendata,img)
VALUES ('$name', '$sec', '$last', '$mail', '$about', '$edate','$photo_link')";

if(mysqli_query($conn, $sql)){
  echo "<center>Информация добавлена.</center>";  
} else{
  echo "Ошибка $sql. "
      . mysqli_error($conn);
}

mysqli_close($conn);
?>
