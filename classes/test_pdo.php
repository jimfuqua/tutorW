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
/*
$stmt = $con->prepare('SELECT * FROM tAssignments
                 WHERE tA_S_ID = :studentID && tA_Post_date < UNIX_TIMESTAMP()
                 ORDER BY tA_PercentTime
                 DESC');

$stmt->bindParam(':studentID', $studentID, \PDO::PARAM_STR, 12);
$stmt->debugDumpParams();
echo "<br/>";echo "<br/>";
$stmt->execute();
$rows = $stmt->fetchAll();


foreach ($rows as $key => $value) {
    echo $key;
    echo "<br/>";
    foreach ($value as $key2 => $singleAssignment) {
        if (is_numeric($key2) === TRUE) {
            unset($rows[$key][$key2]);
        } else {
            echo $key2; echo " --- "; echo $singleAssignment;
            echo "<br/>";
        }
    }
echo "<br/>";echo "<br/>";
}


foreach ($rows as $key => $value) {
    echo $key;
    echo "<br/>";
        foreach ($value as $key2 => $singleAssignment) {
            echo $key2."____".$singleAssignment."<br/>";
        }
        //$rows[$key] = $value;
    echo "<br/>";echo "<br/>";
    }
