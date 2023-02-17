<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>;(</title>
</head>
<body>

<h1>:(</h1>



<?php
include 'connection.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

$sql = "DELETE FROM `fetch` WHERE `fetch`.`id` = $id";

mysqli_query($con,$sql);

header("Location:/info-fetch/");


}













?>
    
</body>
</html>