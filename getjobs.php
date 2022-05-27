<?php 
//MySQL username.
$dbUser = 'root';
 
//MySQL password.
$dbPassword = '';
 
//MySQL host / server.
$dbServer = 'localhost';
 
//The MySQL database your table is located in.
$dbName = 'management';
 
//Connect to MySQL database using PDO.
$pdo = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPassword);
 
//Get the name that is being searched for.
$titlesearch = isset($_GET['titlesearch']) ? trim($_GET['titlesearch']) : '';
$location = isset($_GET['location']) ? trim($_GET['location']) : '';
 
//The simple SQL query that we will be running.
$sql = "SELECT * FROM `jobs` WHERE `title` LIKE :titlesearch and `location` LIKE :location  ";
 
//Add % for wildcard search!
$titlesearch = "%$titlesearch%";

//Add % for wildcard search!
$location = "%$location%";
 
//Prepare our SELECT statement.
$statement = $pdo->prepare($sql);
 
//Bind the $name variable to our :name parameter.
$statement->bindValue(':titlesearch', $titlesearch);

//Bind the $name variable to our :name parameter.
$statement->bindValue(':location', $location);
 
//Execute the SQL statement.
$statement->execute();
 
//Fetch our result as an associative array.
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
 
//Echo the $results array in a JSON format so that we can
//easily handle the results with JavaScript / JQuery
echo json_encode($results);
?>