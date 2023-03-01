<?php
include ("settings.php");
$conn = mysqli_connect($host , $user , $pass , $db);
$name = mysqli_real_escape_string($conn ,$_POST['name']);
$sec = mysqli_real_escape_string($conn,$_POST['secondname']);
$last = mysqli_real_escape_string($conn,$_POST['lastname']);
$mail = mysqli_real_escape_string($conn,$_POST['mail']);
$about = mysqli_real_escape_string($conn,$_POST['about']);
$edate=strtotime($_POST['date']); 
$edate=date("Y-m-d",$edate);

$folder = '/uploads/';
$file_ext =  strtolower(strrchr($_FILES['image']['name'],'.'));
$file_name = "file".uniqid(rand(10000,99999));
$uploadedFile  = $folder.$file_name.$file_ext;

if(is_uploaded_file($_FILES['image']['tmp_name']))
{
if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile))
{ echo "<p>Файл загружен</p>"; }
 }

$sql = "INSERT INTO user_form (firstname, secondname, lastname, mail, about, dendata,img)
VALUES ('$name', '$sec', '$last', '$mail', '$about', '$edate','$file_name')";
 ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>trytodie</title>
  
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"><link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="input.css">
  <script src="script.js"></script>
 <!-- jQuery -->
 <script src="jquery-3.1.1.min.js" type='text/javascript'></script>

 <!-- Bootstrap -->
 <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
 <script src='bootstrap/js/bootstrap.min.js' type='text/javascript'></script>

 <!-- Datepicker -->
 <link href='bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
 <script src='bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="./script.js"></script>
</head>
<body>
	<div class="wrapper">
		<form action="index.php" method="post" >
<!-- partial:index.partial.html -->
<div class="avatar-wrapper">
	<img class="profile-pic" src="" />
	<div class="upload-button">
		<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
	</div>
	<input class="file-upload" type="file" accept="image/*"/>
</div>

<!-- partial -->
  <input type="text" class="form-control input-xs" name="name" placeholder="Имя">
  <!--2-->
    <input type="text" class="form-control input-xs"  name="secondname" placeholder="Фамилия">
 <!--3-->
    <input type="text" class="form-control input-xs"  name="lastname" placeholder="Отчество">
  <!--4-->
	  <!--5--> 
	<input type="email" name="mail" placeholder="Введите почту">
	  <!--6-->
	<textarea maxlength = "1000" name="about" placeholder="о себе"></textarea>
	<input type='date' name="date" class="form-control" data-provide="datepicker" placeholder='Select Date' style='width: 300px;' > <br>
   <input id="submit" name="submit" type="submit" value="Отправить данные"><br/>
 </div> 
</form>
</body>
</html>
<?php
if ($conn->query($sql) === TRUE){
  echo "Пользователь добавлен";
} else {
  echo "Ошибка:" . $sql . "<br>" . $conn->error;
}
?>