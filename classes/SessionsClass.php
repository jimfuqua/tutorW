<?php
namespace jimfuqua\tutorW;
//include_once('trait_UpdateTable.php');
//use tutor\classes;
// Sessions Class
/**********************************************************************
*  Manage the sessions database.

ToDo:
    3.   Add docbook type comments to each function and internal comments.
    */
    require "db_include2.php";
date_default_timezone_set('UTC');
    //$logFile = fopen("/var/www/html/jimfuqua/tutor/logs/Sessions_log.txt", "a");
    //$string = "Sessions.class.php";
    //fwrite($logFile, $string . "\n");

class SessionsClass {

  public function __construct()
  {
      //echo "I am a SessionsClass object.<br/>";
  }

// some of the next few methods are from Session class by Stephen McIntyre
//  http://stevedecoded.com  At this stage I am studying them but not using them.
    private $alive = true;
    private $dbc = NULL;


  function __destruct()
  {
    if($this->alive)
    {
      session_write_close();
      $this->alive = false;
    }
  }

  function delete()
  {
    if(ini_get('session.use_cookies'))
    {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
        $params['path'], $params['domain'],
        $params['secure'], $params['httponly']
      );
    }
    session_destroy();
    $this->alive = false;
  }

    private function open()
  {
    $this->dbc = new MYSQLi($host,
            $db_user,
            $db_password,
            $database)
      OR die('Could not connect to database.');

    return true;
  }

  private function close()
  {
    return $this->dbc->close();
  }

  private function read($sid)
  {
    $q = "SELECT `data` FROM `sessions` WHERE `id` = '".$this->dbc->real_escape_string($sid)."' LIMIT 1";
    $r = $this->dbc->query($q);

    if($r->num_rows == 1)
    {
      $fields = $r->fetch_assoc();

      return $fields['data'];
    }
    else
    {
      return '';
    }
  }


  private function write($sid, $data)
  {
    $q = "REPLACE INTO `sessions` (`id`, `data`) VALUES ('".$this->dbc->real_escape_string($sid)."', '".$this->dbc->real_escape_string($data)."')";
    $this->dbc->query($q);

    return $this->dbc->affected_rows;
  }

  private function destroy($sid)
  {
    $q = "DELETE FROM `sessions` WHERE `id` = '".$this->dbc->real_escape_string($sid)."'";
    $this->dbc->query($q);

    $_SESSION = array();

    return $this->dbc->affected_rows;
  }

  private function clean($expire)
  {
    $q = "DELETE FROM `sessions` WHERE DATE_ADD(`last_accessed`, INTERVAL ".(int) $expire." SECOND) < NOW()";
    $this->dbc->query($q);

    return $this->dbc->affected_rows;
  }

public function logMyMethods()
    {
        // File handle used for debugging messages.
        $logFile = fopen("/var/www/tutor/methods_in_person.class.txt", "w");
        //$string = "Assignment.class.php"; fwrite($logFile, $string . "\n");
        $class_methods = get_class_methods(new PersonClass());
        // Creates an array.
        foreach ($class_methods as $method_name) {
            echo "<br />$method_name";
            //fwrite($logFile, $method_name . "\n");
            }
    }

    private $Session = array();

    public function emptyPerson()
    {
        // unset($GLOBALS['this->person']);
        //$GLOBALS['person'] = array();
        $this->Session = null;
    }

    public function getResidenceZip()
    {
        return $this->person['residenceZip'];
    }

    /**
     *  Array to SQL.
     *
     * Take an array and convert it into a SQL INSERT statement
     *
     * @param array $myParametersArray An array to insert into
     * tGenericAssignment table.
     *
     * @return sql string
     */
    private function _arrayToSQLstring(array $myParametersArray)
    {
        $sql       = 'INSERT INTO tSessions (';
        $sqlValues = ') VALUES (';
        foreach ($myParametersArray as $key => $value) {
            $sql       = $sql.$key.', ';
            $sqlValues = $sqlValues."'".$value."', ";
        }

        $sql       = trim($sql);
        $sql       = rtrim($sql, ',');
        $sqlValues = trim($sqlValues);
        $sqlValues = rtrim($sqlValues, ',');
        $sql       = $sql.$sqlValues;
        $sql       = $sql.');';
        return $sql;

    }//end _arrayToSQLstring()


   /**
    *  Open a connection to the MySQL database.
    *
    *  Using global data about the database create a connection.
    * @return $PDO_Connection
    */
    private function _connectToDb()
    {
        include '/var/www/html/jimfuqua/tutor/src/db_include.php';
        try {
            // Our new PDO Object.
            $con = new \PDO($dbDSN, $dbUser, $dbPassword);
            // Catch and show the error.
        } catch (PDOException $pe) {
            die('Error occurred:'.$pe->getMessage());
        }

        return $con;

    }//end _connectToDb()

    /**
    *  Insert record in database..
    *
    * Gets its variables from mandatory parameters.
    * Records the data in tSessions.
    *
    * @param array $pramArray The source of the person.
    * $pramArray['id'] = '';
    * $pramArray['prefix'] = 'Mr.';
    * $pramArray['nickName'] = 'Jim';
    * $pramArray['firstName'] = 'James'; // mandatory value
    * $pramArray['middleName'] = 'Louis';
    * $pramArray['lastName'] = 'xxxFuquaxxx'; // mandatory value
    * $pramArray['suffix'] = 'Jr.';
    * $pramArray['permanent_id'] = 'UPH-B41'; //  mandatory value
    * $pramArray['phoneNumber'] = '615.822.4400';
    * $pramArray['residenceCity'] = 'Hendersonville';
    * $pramArray['residenceState'] = 'TN';
    * $pramArray['residenceZip'] = '37075';
    * $pramArray['passwd'] = 'pasword';  // mandatory value
    * $this->$pramArray['DateTimeModified'] = "";
    *
    * @return boolean.  Success = true.  Failure = false.
    */
    public function insertRecord( array $pramArray)
    {
        $PDO_Connection = $this->_connectToDb();
        $sql            = $this->_arrayToSQLstring($pramArray);
        $result         = $PDO_Connection->exec($sql);
        // Warning This function may return Boolean FALSE,
        // but may also return a non-Boolean value which evaluates to FALSE.
        // Returns number of rows affected.  If that is 0 affected it will be seen as FALSE.
        return $result;
    }

    public function personToDb()
    {
        $connection = $this->connectToDb();
        $sql = $this->arrayToInsertSQL($this->sessions, $mysqli_connection);
        $result = $mysqli_connection->query($sql) or die(mysql_error());
        mysqli_close($mysqli_connection);
        return $result;
    }

    /**
    *  Get last student db entry.
    *
    * Get the last record added to tSessions database for a particular student.
    *
    * @return $the_last_lesson
    */
    public function getStudentLastDbEntryAsArray($Student_ID)
    {
        $PDO_Connection = $this->_connectToDb();
        $sql            = 'SELECT * FROM tSessions WHERE tA_S_ID = :studentID
                            ORDER BY id DESC LIMIT 1';
        $stmt           = $PDO_Connection->prepare($sql);
        $stmt->bindParam('studentID', $studentID, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row;

    }

    /**
    *  Get particular student.
    *
    * Get an assignment for a particular student by the generic assignment name.
    * There could be multiple records with the same generic assignment name.
    *
    * @param string  $tS_S_ID           The student.
    * @param string  $tG_AssignmentName The assignment to get.
    * @param integer $tA_StartRec       Get the assignment with this start rec.
    *
    * @return $result
    */
    public function getSpecificSessionFromDB($tS_SessionID)
    {
        //Gets a specific row and return mysql_results.
        $mysqli_connection = $this->connectToDb();
        $sql = "SELECT * FROM tSessions
        WHERE (tS_SessionID = '$tS_SessionID')";
        $result = $mysqli_connection->query($sql) or die(mysql_error());
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row;
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
    public function deleteRowTSSID($tS_S_ID)
    {
        $logFile = fopen("/var/www/html/jimfuqua/tutor/logs/SC-deleteRowTSSID.log", "w");
        $v = var_export($tS_S_ID, true);
        $string = __LINE__.' SessC $tS_S_ID = '.$v."\n\n";
        fwrite($logFile, $string);
        $PDO_Connection = $this->_connectToDb();
        $stmt           = $PDO_Connection->prepare(
            'DELETE FROM tSessions WHERE ( tS_S_ID = :studentID)
                                      ORDER BY id DESC LIMIT 1'
        );
        $stmt->bindParam(':studentID', $studentID, \PDO::PARAM_STR, 80);
        $v = var_export($stmt, true);
        $string = __LINE__.' $stmt = '.$v."\n\n";
        fwrite($logFile, $string);
        $result = $stmt->execute();
        $string = __LINE__.' $result = '.$result."\n\n";
        fwrite($logFile, $string);
        // Returns number of deleted rows.
        $count = $stmt->rowCount();
        $string = __LINE__.' $count = '.$count."\n\n";
        fwrite($logFile, $string);
        return $count;
    }

    /**
     *  Delete a particular row.
     *
     * Delete one row identified by its id.
     *
     * @param integer $id The student.
     *
     * @return $result
     */
    public function deleteRowBySessionID($tS_SessionID)
    {
        $PDO_Connection = $this->_connectToDb();
        $del            = $PDO_Connection->prepare('SELECT * FROM tSessions WHERE tS_SessionID = :id');
        $del->bindParam(':id', $id, \PDO::PARAM_INT);
        $del->execute();
        $count = $del->rowCount();
        return $count;

    }//end deleteRowByRowId()

    public function readTSSessionID($tS_SessionID) {
        $mysqli_connection = $this->_connectToDb();
        $sql = "SELECT `data` FROM `tSessions` WHERE `id` = '".$this->$mysqli_connection->real_escape_string($sid)."' LIMIT 1";
        $row = $mysqli_connection->query($sql);
        if($row->num_rows == 1){
            $fields = $row->fetch_assoc();
            return $fields;
        } else {
            return '';
        }
    }

    /**
    *  Generic trait to update any database table.
    *
    * From the lesson array select an individual lesson.
    *
    * @param string $tableToUpdate     The table to update.
    * @param array  $valueArray        The source of the update.
    * @param array  $whereArray        Limitations of the update.
    * @param string $mysqli_connection The connextion to the database.
    *
    * @return $assignment_fields
    */
    private function UpdateTable(
        $tableToUpdate,
        array $valueArray,
        array $whereArray,
        $mysqli_connection
    ) {
        $sql = "UPDATE " . $tableToUpdate . " SET ";
        foreach ($valueArray as $key => $value) {
                $sql = $sql . $key . " = '" . $value . "', ";
        }
        $sql = trim($sql);
        $sql = rtrim($sql);
        $sql = substr($sql, 0, -1);

        $whereSQL = "";
        $sql = $sql . " WHERE ";
        $whereSQL = "";
        reset($whereArray);
        foreach ($whereArray as $key => $value) {
            $whereSQL = $whereSQL . $key . " = '";
            $whereSQL = $whereSQL . $value . "' AND ";
        }
        $whereSQL = rtrim($whereSQL);
        $whereSQL = substr($whereSQL, 0, -3);
        $sql = $sql.$whereSQL;
        //error_log ( $sql );  // for debugging
        $mysqli_connection = $this->connectToDb();
        $sql = $this->$mysqli_connection->real_escape_string($sql);
        //error_log ( $sql );  // for debugging
        $result = $mysqli_connection->query($sql) or die(mysql_error());
        if (mysql_error()) {
           return mysql_error();
        } else {
            return $mysqli_connection->affected_rows;
        }
    }

    public function upDatetA_LastModifiedDateTime($tS_SessionID) {
        return $this->UpdateTable(`tSessions`,'',array('tS_SessionID'=> $tS_SessionID));
    }

}// class
