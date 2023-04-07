<?php 
require_once __DIR__ . "/connectiondb.php";
require_once __DIR__ . "/functions.php";

//$sqls = "SELECT * FROM cars"; kako bese
$sqls = "SELECT cars.*, brands.name as brand_name
FROM cars INNER JOIN brands ON cars.brand_id_fk = brands.id";

$statement = $pdoconn->query($sqls);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>indexlist</title>
    <!-- za ukl od folder css files -->
    <link rel="stylesheet" type="text/css" href="cssfiles/indexlist.css">
</head>
<body>
    <?php require_once __DIR__ . "/menu.php";?>
    <div class="listtabela"> 
    <table>
        <th>
           <tr>
                <td>#</td>
                <td>Brand</td>
                <td>Model</td>
                <td>Year</td>
                <td>Action</td> <!-- ova ke ni bide button za edit,delete,update itn -->
            </tr>
        </th>

<tbody>
<?php 
if($statement->rowCount() == 0){
           echo "<tr>
                <td colspan='5'>No added cars yet </td>
                </tr>"; // <td colspan='5'></td> za 5 koloni da se vo edna 
} else {
    $counter = 1; // za da mi pocnuva od 1, primer za prviot car
    while($rowcar = $statement->fetch()){
        $id = encrypt($rowcar['id']);
        $id = urlencode($id); // za +,space,& da go zameni so drug znak vo URL // za da nemam problemi so view 
        /**<td>{$rowcar['brand_id_fk']}</td>
                <td>{$rowcar['model']}</td>
                <td>{$rowcar['year']}</td> ovie podatoci site se od baza !!!  
                
                <td>{$rowcar['name']}</td> ovde menuvam so name zatoa so imam napravneo inner join i vo name od brands e imeto na brendot
                */ 
        
        echo "<tr>
                <td>{$counter}</td>
                <td>{$rowcar['brand_name']}</td>
                <td>{$rowcar['model']}</td>
                <td>{$rowcar['year']}</td>
                <td>
                <a href='view.php?id={$id}'>View</a> 
                <a href='edit.php?id={$id}'>Edit</a>
                <a href='delete.php?id={$id}'>Delete</a>  
                </td>
                </tr>";
                $counter++;
    }
}

// <a href='delete.php?id={$rowcar['id']}'>Delete</a> 
// so ova me nosi na delete.php failot i go zimam toa id so e stiklirano t.e. toj row i vo
// delete.php pravam logika za delete na toj row 
?>
</tbody>
</table>
</div>
  
</body>
</html>