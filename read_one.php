<!DOCTYPE HTML>
<html>
<head>
    <title>Job</title>
 
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
 
</head>
<body>
 
    <div class="container">
 
        <div class="page-header">
            <h1>Информации о сотруднике</h1>
        </div>
 
        <?php

$id=isset($_GET['id']) ? $_GET['id'] : die('ОШИБКА: номер записи не найден.');
 
include 'config/database.php';
 
try {
    
    $query = "SELECT id, name, email, age, experience, average, image FROM workers WHERE id = ? LIMIT 0,1";

    $stmt = $con->prepare( $query );
 
    $stmt->bindParam(1, $id);
 
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    $name = $row['name'];
    $email = $row['email'];
    $age = $row['age'];
	$experience = $row['experience'];
	$average = $row['average'];
    $image = htmlspecialchars($row['image'], ENT_QUOTES);

}
 
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
 
<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>ФИО</td>
        <td><?php echo htmlspecialchars($name, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo htmlspecialchars($email, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Возраст</td>
        <td><?php echo htmlspecialchars($age, ENT_QUOTES);  ?></td>
    </tr>
	<tr>
        <td>Стаж работы</td>
        <td><?php echo htmlspecialchars($experience, ENT_QUOTES);  ?></td>
    </tr>
	<tr>
        <td>Средняя з/п</td>
        <td><?php echo htmlspecialchars($average, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
    <td>Фотография</td>
    <td>
    <?php echo $image ? "<img src='uploads/{$image}' style='width:300px;' />" : "Нет изображения.";  ?>
    </td>
</tr>
<tr>
        <td></td>
        <td>
            <a href='list.php' class='btn btn-danger'>Вернуться к списку сотрудников</a>
        </td>
    </tr>
</table>
 
    </div>
 
</body>
</html>