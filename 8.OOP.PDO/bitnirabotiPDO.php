<?php 
/**
 * mysql_connect(); 
 * mysql_query(); 
 * mysqli_connect();
 * mysqli_query(); 

 izumreni */
// 127.0.0.1 === localhost

try{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=carmarket;", "root", "");
}
catch(PDOException $ex){
 echo "Can not connect with database, please visit args from pdo" . "<br>" . $ex->getMessage();
}



$pdo->exec($sqliud); // UPDATE,INSERT, DELETE // vraka integer value kolku redovi update,insert,delete
// $pdo->query($sqls); // SELECT, {PDOStatement}

$statement = $pdo->query($sqls); // SELECT, {PDOStatement}
//$statement->fetch();
//$statement->fetch();
// isto so while za da ne gi povikuvam 300 pati ako ima 300 korisnici
// zatoa so $statement->fetch() gi vraka site records from database, i koga ke prekine ke vrati false
// obicno koga ima false neso da vraka sekogas koristime WHILE loop 
while($row = $statement->fetch()){
echo $row;
}



$name = $_POST['name'];
$surname = $_POST['surname'];

// $sqliud = "INSERT INTO users(name, surname) VALUES (?, ?)"; // ako bese so prasalnici
$sqliud = "INSERT INTO users(name, surname) VALUES (:name, :surname)"; // so ASS ARRAY


// prepared statements for defense from SQL injection
$statement = $pdo->prepare($sqliud);
$statement->execute([$name, $surname]); //ako bese so prasalnici
$statement->execute(['name' => $name, 'surname' => $surname]); // so ASS_ARRAY



// ako e za SELECT prodolzuvame samo so sledniov kod , do tuka se e isto !!! 
$statement->fetch();
$statement->fetch();

while($row = $statement->fetch()){
    echo $row;
    }

?>