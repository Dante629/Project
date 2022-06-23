<!DOCTYPE HTML>
<html>
<head>
    <title>Job</title>
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
 
    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    </style>
 
</head>
<body>
 
    <div class="container">
 
        <div class="page-header">
            <h1>Список сотрудников</h1>
        </div>
 
        <?php
include 'config/database.php';
 
$query = "SELECT id, name FROM workers ORDER BY id ASC";
$stmt = $con->prepare($query);
$stmt->execute();
 
$num = $stmt->rowCount();
 
echo "<a href='index.php' class='btn btn-primary m-b-1em'>Заполнить анкету</a>";
 
if($num>0){
 
echo "<table class='table table-hover table-responsive table-bordered'>";
 
    echo "<tr>
        <th>№</th>
        <th>ФИО</th>
        <th>Информации о сотруднике</th>
        
    </tr>";
 
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    
    extract($row);
 
    echo "<tr>
        <td>{$id}</td>
        <td>{$name}</td>
        
        <td>";
            echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Открыть</a>";
        echo "</td>";
    echo "</tr>";
}
 
echo "</table>";
 
}
 
else{
    echo "<div class='alert alert-danger'>Записей не найдено.</div>";
}
?>
 
    </div> 
 
</body>
</html>