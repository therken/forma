<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>trytodie</title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"><link rel="stylesheet" href="style.css">
<link href='bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="./script.js"></script> 
</head>
<body>
<form id="form"action="profile.php" method="POST" enctype="multipart/form-data"  >
<div class="wrapper">
<div class="avatar-wrapper">
<img class="profile-pic" src="https://preview.redd.it/imrpoved-steam-default-avatar-v0-ffxjnceu7vf81.png?width=640&crop=smart&auto=webp&s=0f8cbc4130a94fc83f19418f1a734209108c2a4b" />
<div class="upload-button">
</div>
<input class="file-upload" type="file" accept="image/*" name="image"/>
</div>
<input type="text" class="form-control input-xs" name="name" placeholder="Имя" required>
<input type="text" class="form-control input-xs"  name="secondname" placeholder="Фамилия" required>
<input type="text" class="form-control input-xs"  name="lastname" placeholder="Отчество" required>
<input type="email" name="mail" placeholder="Введите почту">
<textarea maxlength = "1000" name="about" placeholder="о себе" required></textarea>
<input type='date' name="date" class="form-control" data-provide="datepicker" placeholder='Select Date' style='width: 300px;' required> <br>
<input type="submit" placeholder="Отправить" value="Сохранить">
</div> 
</form>
</body>
</html>
