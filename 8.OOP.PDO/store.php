<?php 

// validacii za doma 
// val dali e POST
// val za inputs, year etc.. 

require_once __DIR__ . "/connectiondb.php";
require_once __DIR__ . "/functions.php";

// za year podatocen tip u baza prima samo 4 cifri 
// 00-69 se posle 2000ta .. od 70-99 se do 2000ta 
// 50 --> 2050
// 80 --> 1980 
// za $brand i $model se vo '' bidejki se strings
$brand = $_POST['brand_id_fk'];
$model = $_POST['model'];
$year = $_POST['year'];

// REFACTOR --> DA SE VRAKAME CELO VREME NA KODOT DA GO NAPISEME PODOBRO, POOPTIMALNO 
$sqliud = "INSERT INTO cars (brand_id_fk, model, year) 
                    VALUES(:brand_param, :model, :year)";

$statement = $pdoconn->prepare($sqliud); // za da ne dozvolime SQL injection

$data = ['brand_param' => decrypt($_POST['brand_id_fk']),
         'model' => $model,
         'year'  => $year]; 

if($statement->execute($data)) // za da ne dozvolime SQL injection
{
    header("Location: indexlist.php?status=success");
    die();
}

header("Location: index.php?status=error");
    die();



// 36 : 00 


/*
if($pdoconn->exec($sqliud)) // vraka kolku redovi vnelo 
{
    header("Location: indexlist.php?status=success");
    die();
} 

    header("Location: index.php?status=error");
    die();

    */

// stigna do 32:00 min 


?>