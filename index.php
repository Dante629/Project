<!DOCTYPE HTML>
<html>
<head>
    <title>Job</title>
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
 
</head>
<body>
 
    <div class="container">
 
        <div class="page-header">
            <h1>Анкета сотрудника</h1>
        </div>
 
    <?php
if($_POST){
 
    include 'config/database.php';
 
    try{
 
$query = "INSERT INTO workers
            SET name=:name, email=:email,
                age=:age, experience=:experience, average=:average, image=:image";
 
$stmt = $con->prepare($query);
 
$name=htmlspecialchars(strip_tags($_POST['name']));
$email=htmlspecialchars(strip_tags($_POST['email']));
$age=htmlspecialchars(strip_tags($_POST['age']));
$experience=htmlspecialchars(strip_tags($_POST['experience']));
$average=htmlspecialchars(strip_tags($_POST['average']));
 
$image=!empty($_FILES["image"]["name"])
        ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"])
        : "";
$image=htmlspecialchars(strip_tags($image));
 
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':age', $age);
$stmt->bindParam(':experience', $experience);
$stmt->bindParam(':average', $average);
$stmt->bindParam(':image', $image);
 

 
        if($stmt->execute()){
if($image){
 
    $target_directory = "uploads/";
    $target_file = $target_directory . $image;
    $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
 
    $file_upload_error_messages="";
$check = getimagesize($_FILES["image"]["tmp_name"]);
if($check!==false){
}else{
    $file_upload_error_messages.="<div>Переданный файл не является изображением.</div>";
}
$allowed_file_types=array("jpg", "jpeg", "png", "gif");
if(!in_array($file_type, $allowed_file_types)){
    $file_upload_error_messages.="<div>Разрешены только файлы JPG, JPEG, PNG, GIF.</div>";
}
if(file_exists($target_file)){
    $file_upload_error_messages.="<div>Изображение с таким именем уже имеется. Попробуйте изменить имя файла.</div>";
}
if($_FILES['image']['size'] > (1024000)){
    $file_upload_error_messages.="<div>Размер изображения должен быть не более 1 МБ.</div>";
}
if(!is_dir($target_directory)){
    mkdir($target_directory, 0777, true);
}
if(empty($file_upload_error_messages)){
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
    }else{
        echo "<div class='alert alert-danger'>
            <div>Не удалось загрузить фотографию.</div>
            <div>Обновите запись, чтобы загрузить фотографию.</div>
        </div>";
    }
}
 
else{
    echo "<div class='alert alert-danger'>
        <div>{$file_upload_error_messages}</div>
        <div>Обновите запись, чтобы загрузить фотографию.</div>
    </div>";
}
}
            echo "<div class='alert alert-success'>Запись была сохранена.</div>";
        }else{
            echo "<div class='alert alert-danger'>Не удалось сохранить запись.</div>";
        }
 
    }
 
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
 
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>ФИО</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Email </td>
            <td><input type='email' name='email' class='form-control'/></td>
        </tr>
        <tr>
            <td>Возраст</td>
            <td><input type='number' name='age' class='form-control' /></td>
        </tr>
		<tr>
            <td>Стаж работы</td>
            <td><input type='text' name='experience' class='form-control'/></td>
        </tr>
		<tr>
            <td>Средняя з/п</td>
            <td><input type='text' name='average' class='form-control'/></td>
        </tr>
        <tr>
    <td>Фотография</td>
    <td><input type="file" name="image" /></td>
</tr>
                <input type='submit' value='Сохранить' class='btn btn-primary' />
                <a href='list.php' class='btn btn-danger'>Список сотрудников</a>
            </td>
        </tr>
    </table>
</form>
 
    </div>
 

</body>
</html>