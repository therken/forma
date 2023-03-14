

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>trytodie</title>
  
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"><link rel="stylesheet" href="style.css">
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
		<form action="settings.php" method="POST" enctype="multipart/form-data" >
            <div class="wrapper">
              <!--image-->
<div class="avatar-wrapper">
	<img class="profile-pic" src="def.jpg" />
	<div class="upload-button">
	</div>
	<input class="file-upload" type="file" accept="image/*" name="image"/>
</div>
<!--1-->
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
  <input type="submit" placeholder="Отправить" value="Сохранить">
 </div> 
</form>
</body>
</html>
