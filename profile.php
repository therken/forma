<?php
include 'settings.php';

// переменные
function escapeInput($conn, $input) {
    if(is_array($input)) {
        foreach($input as $key => $value) {
            $input[$key] = mysqli_real_escape_string($conn, $value);
        }
    } else {
        $input = mysqli_real_escape_string($conn, $input);
    }
    return $input;
}

// переменные
$name = escapeInput($conn, $_POST['name']);
$sec = escapeInput($conn, $_POST['secondname']);
$last = escapeInput($conn, $_POST['lastname']);
$mail = escapeInput($conn, $_POST['mail']);
$about = escapeInput($conn, $_POST['about']);
$edate = strtotime($_POST['date']); 
$edate = date("Y-m-d", $edate);
$startDate = date('Y-m-d', strtotime("01/01/1900"));
$endDate = date('Y-m-d', strtotime("01/10/2024"));

// проверка существования email-адреса
$stmt = $conn->prepare("SELECT mail FROM user_form WHERE mail = ?");
$stmt->bind_param("s", $mail);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $errorMessage = "Этот email уже используется";
    echo $errorMessage;
} else {
    // проверка даты
    if (($edate >= $startDate) && ($edate <= $endDate)) {
        echo "";
    } else {
        $errorMessage = "некорректная дата";
        echo $errorMessage; 
        die();
    }

    // загрузка файла 
    $uploaddir = 'uploads/';
    $tempFilePath = $_FILES['image']['tmp_name']; 
    $fileName = $_FILES['image']['name']; 
    $uploadFile = $uploaddir . uniqid() . '-' . basename($fileName); 

    if(!is_uploaded_file($_FILES['image']['tmp_name'])) {
        $errorMessage = "Выберите изображение";
        echo $errorMessage;
        die();
    } 

    // Проверка что это картинка
    if (!getimagesize($_FILES["image"]["tmp_name"])) {
        $errorMessage = "Это не картинка...";
        echo $errorMessage;
        die();
    }

    if (move_uploaded_file($tempFilePath, $uploadFile)) {
        $successMessage = "Файл корректен и был успешно загружен.";
        echo $successMessage;
    } else {
        $errorMessage = "Возможная атака с помощью файловой загрузки!";
        echo $errorMessage;
    }

    $photo_link = $uploadFile; 
    // добавление значений в бд
    $stmt = $conn->prepare("INSERT INTO user_form (firstname, secondname, lastname, mail, about, date, img) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $sec, $last, $mail, $about, $edate, $photo_link);
    
    // вывод сообщения о том что данные добавлены
    if($stmt->execute()){
        $successMessage= "Информация добавлена.";  
        echo $successMessage;
    } else{
        $errorMessage= "Ошибка $stmt->error. ";
        echo $errormeMessage;
    }
}

mysqli_close($conn);
?>
