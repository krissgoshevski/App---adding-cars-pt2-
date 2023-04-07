<?php 
require_once __DIR__ . "/connectiondb.php";
require_once __DIR__ . "/functions.php";

 
//$sqls = "SELECT * FROM  cars WHERE id = :id";
$sqls = "SELECT cars.*, brands.name as brand_name
FROM cars INNER JOIN brands ON cars.brand_id_fk = brands.id
WHERE cars.id = :id";

$id_decrypt = decrypt($_GET['id']); // ja koristam f-jata od functions

$statement = $pdoconn->prepare($sqls);
$statement->execute(['id' => $id_decrypt]); // odve treba da se DEKRIPTIRA ID-to za da me nosi na VIEW od indexlist.php 
//  $id = encrypt($rowcar['id']); -> indexlist.php
// <a href='view.php?id={$id}'>View</a> 

//  ako ne postoi takva kola nosi go na index.php 
if($statement->rowCount() == 0){
    header("Location: indexlist.php");
    die();
}

$car = $statement->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" type="text/css" href="cssfiles/view.css"> 
</head>
<body>
    <?php require_once __DIR__ . "/menu.php"?>
<div class="view">
    <h1 class="overview">Car overview</h1>

    <h3>Brand: <?= $car['brand_name'] ?> </h3>
    <h3>Model: <?= $car['model'] ?> </h3>
    <h3>Year: <?= $car['year'] ?> </h3>
</div>  
</body>
</html>