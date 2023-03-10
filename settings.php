<?php
$host= 'localhost';
$user = 'root';
$pass = '';
$db = 'form';
  
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
$edate=date("Y-m-d",$edate);



$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['image']['name']);

if(!is_uploaded_file($_FILES['image']['tmp_name']))  
{
     echo "Загрузка файла на сервер не удалась";
     die(); //or throw exception...
} 

//Проверка что это картинка

if (!getimagesize($_FILES["image"]["tmp_name"])) {
     echo "Это не картинка...";
     die(); //or throw exception...
}

if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}

$sql = "INSERT INTO user_form (firstname, secondname, lastname, mail, about, dendata,img)
VALUES ('$name', '$sec', '$last', '$mail', '$about', '$edate','$uploadfile')";

if(mysqli_query($conn, $sql)){
  echo "<h3>Информация добавлена.</h3>";  
} else{
  echo "Ошибка $sql. "
      . mysqli_error($conn);
}

mysqli_close($conn);
?>
