<?php 

require_once __DIR__ . "/connectiondb.php";
require_once __DIR__ . "/functions.php";

$brand = $_POST['brand_id_fk'];
$model = $_POST['model'];
$year = $_POST['year'];

$sqliud = "INSERT INTO cars (brand_id_fk, model, year) 
                    VALUES(:brand_param, :model, :year)";

$statement = $pdoconn->prepare($sqliud); // za da ne dozvolime SQL injection

$data = ['brand_param' => decrypt($brand),
         'model' => $model,
         'year'  => $year]; 

if($statement->execute($data)) // za da ne dozvolime SQL injection
{
    header("Location: indexlist.php?status=success");
    die();
}

header("Location: index.php?status=error");
    die();
?>
