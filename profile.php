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
///переменные
$name = mysqli_real_escape_string($conn ,$_POST['name']);
$sec = mysqli_real_escape_string($conn,$_POST['secondname']);
$last = mysqli_real_escape_string($conn,$_POST['lastname']);
$mail = mysqli_real_escape_string($conn,$_POST['mail']);
$about = mysqli_real_escape_string($conn,$_POST['about']);
$edate=strtotime($_POST['date']); 
$edate=date("Y-m-d",$edate);
$startDate = date('Y-m-d', strtotime("01/01/1900"));
$endDate = date('Y-m-d', strtotime("01/10/2024"));

///проверка существования email-адреса
$sql = "SELECT mail FROM user_form WHERE mail='$mail'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$errorMessage = "Этот email уже используется";
echo "<script>alert('$errorMessage');</script>";
} else {
  ///проверка даты
if (($edate >= $startDate) && ($edate <= $endDate)) {
  echo "";
} else {
  $errorMessage = "некорректная дата";
  echo "<script>alert('$errorMessage');</script>"; 

}
///загрузка файла 
$uploaddir = 'uploads/';
$tempFilePath = $_FILES['image']['tmp_name']; 
$fileName = $_FILES['image']['name']; 
$uploadFile = $uploaddir . uniqid() . '-' . basename($fileName); 

if(!is_uploaded_file($_FILES['image']['tmp_name'])) {
     $errorMessage = "Выберите изображение";
     echo "<script>alert('$errorMessage');</script>";
} 

//Проверка что это картинка
if (!getimagesize($_FILES["image"]["tmp_name"])) {
     $errorMessage = "Это не картинка...";
     echo "<script>alert('$errorMessage');</script>";
}

if (move_uploaded_file($tempFilePath, $uploadFile)) {
    $successMessage = "Файл корректен и был успешно загружен.";
    echo "<script>alert('$successMessage');</script>";
} else {
    $errorMessage = "Возможная атака с помощью файловой загрузки!";
    echo "<script>alert('$errorMessage');</script>";
}
$photo_link = $uploadFile; 
///добавление значений в бд
  $sql = "INSERT INTO user_form (firstname, secondname, lastname, mail, about, dendata,img)
  VALUES ('$name', '$sec', '$last', '$mail', '$about', '$edate','$photo_link')";
  ///вывод сообщения о том что данные добавлены
  if(mysqli_query($conn, $sql)){
    $successMessage= "Информация добавлена.";  
    echo "<script>alert('$successMessage');</script>";
  } else{
    $errorMessage= "Ошибка $sql. "
        . mysqli_error($conn);
        echo "<script>alert('$errormeMessage');</script>";
  }
}
mysqli_close($conn);
?>
