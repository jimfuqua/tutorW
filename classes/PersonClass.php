<?php
namespace jimfuqua\tutorW;
require 'db_include2.php';
error_reporting(E_ALL);
/**********************************************************************
*  Manage the person database.

ToDo:
    1.   Function to read db given a timestamp and return an array recordset.
    2.   Function to delete a record given a timestamp and userID.
    3.   Add docbook type comments to each function and internal comments.
    */

class PersonClass {

  public function __construct()
  {
      echo "I am a PersonClass object.<br/>";
  }

    public function logMyMethods()
    {
        // File handle used for debugging messages.
        //$logFile = fopen("/var/www/jimfuqua/tutor/logs/methods_in_person.class.txt", "w");
        //$string = "Assignment.class.php"; fwrite($logFile, $string . "\n");
        $class_methods = get_class_methods(new PersonClass());
        foreach ($class_methods as $method_name) {
            echo "<br />$method_name";
            //fwrite($logFile, $method_name . "\n");
            }
    }

    private $person = array();

    public function emptyPerson()
    {
        $this->person = null;
    }

    public function setPrefix($prefix)
    {
        $this->person['prefix'] = $prefix;
    }

    public function getPrefix()
    {
        return $this->person['prefix'];
    }

    public function setNickName($gn)
    {
        $this->person['nickName'] = $gn;
    }

    public function getNickName()
    {
        return $this->person['nickName'];
    }


    public function setFirstName($gn)
    {
        $this->person['firstName'] = $gn;
        }

    public function getFirstName()
    {
        if (isset($this->person['firstName'])) {
            return $this->person['firstName'];
        } else {
            return null;
         }
    }

    public function setMiddleName($mn)
    {
        $this->person['middleName'] = $mn;
    }

    public function getMiddleName()
    {
        return $this->person['middleName'];
    }

    public function setLastName($ln)
    {
        $this->person['lastName'] = $ln;
    }

    public function getLastName()
    {
        return $this->person['lastName'];
    }

    public function setSuffix($sf)
    {
        $this->person['suffix'] = $sf;
    }

    public function getSuffix()
    {
         return $this->person['suffix'];
    }

    public function setPhoneNumber($pn)
    {
         $this->person['phoneNumber'] = $pn;
    }

    public function getPhoneNumber()
    {
        return $this->person['phoneNumber'];
    }

    public function setResidenceCity($rc)
    {
        $this->person['residenceCity'] = $rc;
    }

    public function getResidenceCity()
    {
        return $this->person['residenceCity'];
    }

    public function setResidenceState($pn)
    {
        $this->person['residenceState'] = $pn;
    }

    public function getResidenceState()
    {
        return $this->person['residenceState'];
    }

    public function setResidenceZip($rz)
    {
        $this->person['residenceZip'] = $rz;
    }

    public function getResidenceZip()
    {
        return $this->person['residenceZip'];
    }

    private function arrayToSQLstring(array $myArray)
    {
        $sql = "INSERT INTO tPersons (";
        $sql_values = ") VALUES (";
        foreach ($myArray as $key => $value) {
            $sql = $sql . $key . ", ";
            $sql_values = $sql_values . "'" . $value . "', ";
        }
        $sql = trim($sql);
        $sql = rtrim($sql, ",");
        $sql_values = trim($sql_values);
        $sql_values = rtrim($sql_values, ",");
        $sql = $sql . $sql_values;
        $sql = $sql . ");";
        return $sql;
    }

    /**
    *  Create a connection to the database..
    *
    * Using global data about the database create a connection.
    *
    * @return $connection
    */
    private function _connectToDb()
    {
        include 'db_include.php';
        try {
            // Our new PDO Object.
            $con = new \PDO($dbDSN, $dbUser, $dbPassword);
            // Catch and show the error.
            } catch (PDOException $pe) {
            die("Error occurred:" . $pe->getMessage());
        }

        return $con;

    }//end _connectToDb()

        /**
        *  Insert record in database..
        *
        * Gets its variables from mandatory parameters. Records the data in
        * tPersons.
        *
        * @param array $pramArray The source of the person.
        * $pramArray['id'] = '';
        * $pramArray['prefix'] = 'Mr.';
        * $pramArray['nickName'] = 'Jim';
        * $pramArray['firstName'] = 'James'; // mandatory value
        * $pramArray['middleName'] = 'Louis';
        * $pramArray['lastName'] = 'xxxFuquaxxx'; // mandatory value
        * $pramArray['suffix'] = 'Jr.';
        * $pramArray['Person_ID'] = 'UPH-B41'; //  mandatory value
        * $pramArray['phoneNumber'] = '615.822.4400';
        * $pramArray['residenceCity'] = 'Hendersonville';
        * $pramArray['residenceState'] = 'TN';
        * $pramArray['residenceZip'] = '37075';
        * $pramArray['passwd'] = 'pasword';  // mandatory value
        * $this->$pramArray['DateTimeModified'] = "";
        *
        * @return boolean.  Success = true.  Failure = FALSE.
        */
    public function insertRecord( array $pramArray)
    {
        $PDO_Connection = $this->_connectToDb();
        $sql = $this->arrayToSQLstring($pramArray);
        $result = $PDO_Connection->exec($sql);
        $logFile = fopen("/var/www/html/jimfuqua/tutor/logs/PC insertRecord.log", "w");
        //  Warning This function may return Boolean FALSE, but may also return a non-Boolean value which evaluates to FALSE.
        //  Returns number of rows affected.  If that is 0 affected it will be seen as FALSE.
        return $result;
        }

    public function checkForUserNameInDb($userName)
    {
        $PDO_Connection = $this->_connectToDb();
        $sql = "select * from tPersons where userName = '$userName' " ;
        $result = $PDO_Connection->query($sql) or die(mysql_error());
        if (mysql_num_rows($result)!= 0) {
            return "That user name is taken.  Please try another user name.";
        } else {
                    return 'OK';
                } // if else
    }

    public function personToDb()
    {
        $connection = $this->_connectToDb();
        $sql = $this->_arrayToInsertSQL($this->person, $connection);
        $result = $PDO_Connection->query($sql) or die(mysql_error());
        mysql_close($connection);
        return $result;
    }

    /**
    *  Get last person.
    *
    * Get the last person added to tPersons database..
    *
    * @return $the_last_lesson
    */
    public function getLastDbEntryArray()
    {
        $PDO_Connection = $this->_connectToDb();
        $sql = "SELECT * FROM tPersons ORDER BY id DESC LIMIT 1";
        $stmt = $PDO_Connection->prepare($sql);
        //$stmt           = $PDO_Connection->($sql);
        $results = $stmt->execute();//Returns TRUE on success or FALSE on failure.
        //$LastDbEntry = $stmt->fetchAll();
        $LastDbEntry = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $LastDbEntry;
    }

    public function logIn($name, $pw)
    {
        $sql = "select * from tPersons where userName='$name' ";
        $result = $PDO_Connection->query($sql);
        if (mysql_num_rows($result)!= 1) {
            $error = "Login failed";
            return $error;
        } else {
                    //$result_array =  mysqli_fetch_assoc ( $result );
                    $_SESSION['username'] = $result_array['userName'];
                    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                    $result_array['ip'] = $_SERVER['REMOTE_ADDR'];
                    return $result_array;
        }
    }

    /**
    *  Get particular student.
    *
    * Get an assignment for a particular student by the generic assignment name.
    * There could be multiple records with the same generic assignment name.
    *
    * @param string  $tA_S_ID           The student.
    * @param string  $tG_AssignmentName The assignment to get.
    * @param integer $tA_StartRec       Get the assignment with this start rec.
    *
    * @return $result
    */
    public function getSpecificStudentFromDbArray($lastName, $firstName, $Person_ID)
    {
        // Gets a specific row and return mysql_results.
        $PDO_Connection = $this -> _connectToDb();
        $sql = 'SELECT * FROM tPersons
                WHERE (lastName = :lastName && firstName = :firstName && Person_ID = :Person_ID)';
        $stmt = $PDO_Connection->prepare($sql);
        $stmt->bindParam(':lastName', $lastName, \PDO::PARAM_STR, 80);
        $stmt->bindParam(':firstName', $firstName, \PDO::PARAM_STR, 80);
        $stmt->bindParam(':Person_ID', $Person_ID, \PDO::PARAM_STR, 80);
        $result = $stmt->execute();//Returns TRUE on success or FALSE on failure.
        //$result_array =  mysqli_fetch_assoc ( $result );
        $result_array = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result_array;
        }

    /**
    *  Get particular student.
    *
    * Get an assignment for a particular student by the generic assignment name.
    * There could be multiple records with the same generic assignment name.
    *
    * @param string  $tA_S_ID           The student.
    * @param string  $tG_AssignmentName The assignment to get.
    * @param integer $tA_StartRec       Get the assignment with this start rec.
    *
    * @return $result
    */
    public function getLimitedStudentDataArray($Person_ID)
    {
        // Gets a specific row and return mysql_results.
        $PDO_Connection = $this->__connectToDb();
        $sql = 'SELECT StudentName, firstName, middleName, nickName
                FROM tPersons WHERE Person_ID="'. $Person_ID . '"' ;
        $result         = $PDO_Connection->query($sql);
        $row            = $result->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }

    /**
    *  Get student by Person_ID.
    *
    * Get an assignment for a particular student by the generic assignment name.
    * There could be multiple records with the same generic assignment name.
    *
    * @param string  $tA_S_ID           The student.
    * @param string  $tG_AssignmentName The assignment to get.
    * @param integer $tA_StartRec       Get the assignment with this start rec.
    *
    * @return $result
    */
    public function getPersonDataArray($Person_ID)
    {
        // Gets a specific row and return mysql_results.
        $PDO_Connection = $this->_connectToDb();
        $sql = 'SELECT userName, firstName, middleName, nickName, Person_ID
                FROM tPersons
                WHERE Person_ID = :Person_ID';
        $stmt = $PDO_Connection->prepare($sql);
        $stmt->bindParam(':Person_ID', $Person_ID, \PDO::PARAM_STR, 80);
        $result = $stmt->execute();//Returns TRUE on success or FALSE on failure.
        echo $result;
        if ($result === TRUE) {
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $row;
        } else {
            return $result;
        }
}
    /**
    *  Delete a particular row.
    *
    * Delete a row identified by its id.
    *
    * @param integer $id The student.
    *
    * @return $result
    */
    public function deleteAllRowsPerson_Id($Person_ID)
    {
        $PDO_Connection = $this->_connectToDb();
        $sql = "DELETE FROM tPersons WHERE (Person_ID = :Person_ID)";
        $stmt = $PDO_Connection->prepare($sql);
        $stmt->bindParam(':Person_ID', $Person_ID, \PDO::PARAM_STR, 80);
        // Returns TRUE for success. A query would return 1 for success.
        $result = $stmt->execute();//Returns TRUE on success or FALSE on failure.
        $affected_rows = $stmt->rowCount();
        $return_array = array(
            0 => $result,
            1 => $affected_rows
        );
        return $return_array;
        }
    }
