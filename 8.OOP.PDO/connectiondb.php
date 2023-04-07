<?php 

require_once __DIR__ . "/constsdb.php"; // include consts for db

try{
    $pdoconn = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
}catch(PDOException $ex){
    file_put_contents("pdoEx.txt", $ex->getMessage());
    header("Location: 404.php");
    die();
}

?>