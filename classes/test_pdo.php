<?php

$dbUser = 'root';
$dbPassword = 'pasword';
$dbDSN = "mysql:host=localhost;dbname=jlfEDU;";

try {
            // Our new PDO Object.
            $dbh = new \PDO($dbDSN, $dbUser, $dbPassword);
            //$con = $this->_connectToDb();
            // Catch and show the error.
        } catch (PDOException $pe) {
            die('Error occurred:'.$pe->getMessage());
        }

$studentID ='Abcdxyz';
echo "<br/>";
echo $studentID."<br/>.";
//echo $con;
$dbh = new \PDO($dbDSN, $dbUser, $dbPassword);
$stmt = $dbh->prepare("INSERT INTO REGISTRY (name, value) VALUES (:name, :value)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':value', $value);

// insert one row
$name = 'one';
$value = 1;
$stmt->execute();

// insert another row with different values
$name = 'two';
$value = 2;
$stmt->execute();

//$stmt = $dbh->prepare('SELECT * FROM REGISTRY');
$var = "one";
$sql = 'SELECT * FROM REGISTRY WHERE name = "'.$var.'"';
$results =  $dbh->query($sql);
foreach($results as $row){
    echo $row['name'] . "<br>";
}
print_r("\n".$sql."\n\n<br />");
print_r($results);
