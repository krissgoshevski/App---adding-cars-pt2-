<?php 

require_once __DIR__ . "/connectiondb.php";
require_once __DIR__ . "/functions.php";


$sqlu = "UPDATE cars SET brand_id_fk = :brand_param, model = :model, year = :year WHERE cars.id = :id";

$statement = $pdoconn->prepare($sqlu);
$statement->execute([
    // gi zemam od formata edit.php od name=""
    'brand_param' => decrypt($_POST['brand_id_fk']),
    'model' => $_POST['model'],
    'year'  => $_POST['year'],  
    'id'    => decrypt($_POST['id'])]);


header("Location: indexlist.php");
die();




?>