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
$edate=date("Y-m-d",$edate);

$folder ="./uploads/";
$file_ext =  strtolower(strrchr($_FILES['image']['name'],'.'));
$file_name = "file".uniqid(rand(10000,99999));
move_uploaded_file($tmp_name, "$uploads_dir/$name")
$uploadedFile  = $folder.$file_name.$file_ext;
$sql = "INSERT INTO user_form (firstname, secondname, lastname, mail, about, dendata,img)
VALUES ('$name', '$sec', '$last', '$mail', '$about', '$edate','$file_name')";

if(mysqli_query($conn, $sql)){
  echo "<h3>Информация добавлена.</h3>";  
} else{
  echo "Ошибка $sql. "
      . mysqli_error($conn);
}

mysqli_close($conn);
?>
