<?php 
 //error_reporting(0);

require_once __DIR__ . "/connectiondb.php";
require_once __DIR__ . "/functions.php";


$id_decrypt = decrypt($_GET['id']);

$sqls = "SELECT * FROM cars WHERE id =:id";
$statement = $pdoconn->prepare($sqls);
$statement->execute(['id' => $id_decrypt]);

/*
if($statement->rowCount() == 0){
    header("Location: indexlist.php");
    die();
} */

$car = $statement->fetch();

$sqlselectBrand = "SELECT * FROM brands";
$stmtBrand = $pdoconn->query($sqlselectBrand);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit form</title>
    <link rel="stylesheet" type="text/css" href="cssfiles/create.css">
    <link rel="stylesheet" type="text/css" href="cssfiles/menu.css">
    <link rel="stylesheet" type="text/css" href="cssfiles/edit.css">
    
</head>
<body>
<?php require_once __DIR__ . "/menu.php";?>
<div class="formone"> 
    <form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?= encrypt($car['id'])?>"> 

    <label for="brand">Brand</label>                       
    <select name="brand_id_fk" class="brand_id_fk">
        <?php 
        while ($brand = $stmtBrand->fetch())
        {
            $selected_attr = '';
            if($brand['id'] == $car['brand_id_fk']){
                $selected_attr = 'selected';
            }
            $id_encrypt = encrypt($brand['id']);
            echo "<option $selected_attr value='{$id_encrypt}'>{$brand['name']}</option>";
        }
        ?>
    </select> <br>
    <label for="model">Model</label>
    <input type="text" name="model" placeholder="enter another model..." id="model" class="model" value="<?= $car['model']?>"> <br>
    <label for="year">Year</label>
   
    <select name="year" class="year" value="<?= $car['year'] ?>">
    <?php 
    for($i = 2000; $i<=2023; $i++) // kod za preselektiranje na godinite od option set za edit formata 
    {
        $selected_value = '';
        if($car['year'] == $i){
            $selected_value = 'selected';
            echo "<option $selected_value value='$i'>$i</option>"; // za gi lista od 0 do 23ta 
        }
        
    }
    ?>
    </select> <br>
    <button class="btnupdate">Update car</button>

    </form>
    </div>
</body>
</html>

