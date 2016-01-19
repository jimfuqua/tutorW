<?php
use tutor\src\classes;

/*
    * AssignmentsClass.inc File Doc Comment
    *
    * AssignmentsClass manipulates MySQL table tAssignments in jlfEDU DB
    *
    * PHP version 5+
    *
    * @package    TutorMio
    * @subpackage Tutor
    * @author     Squiz Pty Ltd <products@squiz.net>
    * @copyright  2015 Squiz Pty Ltd (ABN 77 084 670 600)
    * @category   Manipulates_Db
    * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License V3+
    * @link       http://www.jimfuqua.com/
*/

namespace tutor\src\classes;
require_once '/var/www/html/jimfuqua/tutor/src/classes/AssignmentsClass.inc';
require_once '/var/www/html/jimfuqua/tutor/src/classes/GenericAClass.inc';

    /**
     * Assignment.class.php
     *
     * A warning will be raised, saying that to document the define, use
     * another DocBlock
     **/
class AssignmentsClass
{


    /**
     *  Set session variables from lesson.
     *
     * Retrieve a row from tPersons by linking tA_S_ID from lessons and
     * "Person_ID" from tPersons. Use retrieved data to set person's name.
     *
     * @param array $lesson It is a row from tAssignments.
     *
     * @return void
     */
    public function setSessionVariablesFromLesson(array $lesson)
    {
        // Set session variables.
        $_SESSION['lesson_id']            = $lesson['tA_id'];
        $_SESSION['tA_id']                = $lesson['tA_id'];
        $_SESSION['tA_StudentName']       = $lesson['tA_StudentName'];
        $_SESSION['tG_AssignmentName']    = $lesson['tG_AssignmentName'];
        $_SESSION['tA_StartRec']          = $lesson['tA_StartRec'];
        $_SESSION['tA_Parameter']         = $lesson['tA_Parameter'];
        $_SESSION['tA_Immediate_Loops']   = $lesson['tA_Immediate_Loops'];
        $_SESSION['tA_StartRec']          = $lesson['tA_StartRec'];
        $_SESSION['tA_StopRec']           = $lesson['tA_StopRec'];
        $_SESSION['tG_Reps_to_master']    = $lesson['tG_Reps_to_master'];
        $_SESSION['tA_RepsTowardM']       = $lesson['tA_RepsTowardM'];
        $_SESSION['tG_Errors_Allowed']    = $lesson['tG_Errors_Allowed'];
        $_SESSION['tA_RepsTowardM']       = $lesson['tA_RepsTowardM'];
        $_SESSION['tA_ErrorsMade']        = $lesson['tA_ErrorsMade'];
        $_SESSION['tC_ServerTimeStarted'] = time();

    }//end setSessionVariablesFromLesson()


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
        $sql       = 'INSERT INTO tAssignments (';
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
     *  Select a lesson.
     *
     * From the lesson array select an individual lesson.
     *
     * @param array  $valueArray     The source of the lessons.
     * @param array  $whereArray     Name of the generic assignment.
     * @param string $PDO_Connection The connextion to the database.
     *
     * @return $assignmentFields
     */
    private function _arrayToUpdateSQL(array $valueArray, array $whereArray, $PDO_Connection)
    {
        $sql = '';
        $sql = 'UPDATE tAssignments SET ';
        foreach ($valueArray as $key => $value) {
                $sql = $sql.$key.' = '.$value.', ';
        }

        $sql = trim($sql);
        $sql = rtrim($sql);
        $sql = substr($sql, 0, -1);

        $whereSQL = '';
        $sql      = $sql.' WHERE ';
        $whereSQL = '';
        reset($whereArray);
        foreach ($whereArray as $key => $value) {
            $whereSQL = $whereSQL.$key.' = "';
            $whereSQL = $whereSQL.$value.'" AND ';
        }

        $whereSQL = rtrim($whereSQL);
        $whereSQL = substr($whereSQL, 0, -3);
        $sql      = $sql.$whereSQL;
        return $sql;

    }//end _arrayToUpdateSQL()


    /**
     *  Select a lesson.
     *
     * From the lesson array select an individual lesson.
     *
     * @return $PDO_Connection
     */
    private function _connectToDb()
    {
        include '/var/www/html/jimfuqua/tutor/src/classes/db_include.php';
        try {
            // Our new PDO Object.
            $con = new \PDO($dbDSN,
                            $dbUser,
                            $dbPassword,
                            array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION)
                            );
                //die(json_encode(array('outcome' => true)));
            // Catch and show the error.
        }
        catch (PDOException $ex) {
            die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
        }

        return $con;

    }//end _connectToDb()

public function removeUnneededColumns($inArray) {
// what happens to loose a column?

  $ok_array = array(
    1 => "tA_id",
    2 => "tA_S_ID",
    3 => "tA_StudentName",
    4 => "tG_AssignmentName",
    5 => "tA_Consecutive_Reps_OK",
    6 => "tA_Parameter",
    7 => "tA_Immediate_Loops",
    8 => "tA_StartRec",
    9 => "tA_StopRec",
    10 => "tG_Reps_to_master",
    11 => "tG_Errors_Allowed",
    12 => "tA_RepsTowardM",
    13 => "tA_ErrorsMade",
    14 => "tA_PercentTime",
    15 => "tA_SumPercent",
    16 => "tA_QueOrder",
    17 => "tA_SavedAssignmen",
    18 => "tA_SavedStartRec",
    19 => "tA_PostDateIncrement",
    20 => "tA_Post_date",
    21 => "tA_iterations_to_do",
    22 => "tA_OriginalTimestamp",
    23 => "tA_LastModifiedDateTime",
    24 => "tA_LocalDateTime",
  );
  // $v = var_export($ok_array, true);
  // $string  = __LINE__.' $ok_array = '.$v."\n\n";
  // fwrite($log_file, $string);

  $outArray = array();

  foreach($ok_array as $key => $value){
    // fwrite($log_file, '$key = ' . $key . "\n");
    // fwrite($log_file, '$value = ' . $value . "\n");
    if (array_key_exists($value , $inArray )){
      $outArray[$value] = $inArray[$value];
      // fwrite($log_file, 'Row added.' . "\n\n");
    }
    else {
      // fwrite($log_file, 'array_key_exists($value , $inArray ) = false' . "\n\n");
    }
  }
  // $v = var_export($outArray, true);
  // $string  = __LINE__.' $outArray = '.$v."\n\n";
  // fwrite($log_file, $string);
  return $outArray;
}

    /**
     *  Insert record in database..
     *
     * Gets its variables from nine mandatory parameters and remaining optional
     *   parameters contained in an associative array which is an array of
     *   arrays of key=>value pairs.  It records the data in tAssignments.
     *
     * @param array $pramArray The source of the lessons.
     *
     * @return $assignmentFields
     */
    public function insertRecord(array $pramArray)
    {
        //$log_file = fopen('/var/www/html/jimfuqua/tutor/logs/AssignmentsClass-insertRecord.log', 'w');
        //$v       = var_export($pramArray, true);
        //$string  = __LINE__.' AC $result = '.$v."\n\n";
        //fwrite($log_file, $string);
// one record dropped
        $pramArrayProcessed = $this->removeUnneededColumns($pramArray);
        //$v       = var_export($pramArrayProcessed, true);
        //$string  = __LINE__.' $pramArrayProcessed = '.$v."\n\n";
        //fwrite($log_file, $string);
        $PDO_Connection = $this->_connectToDb();
        $sql            = $this->_arrayToSQLstring($pramArrayProcessed);
        //$string         = __LINE__.' AC $sql = '.$sql."\n\n";
        //fwrite($log_file, $string);
        $result = $PDO_Connection->exec($sql);
        // Warning This function may return Boolean FALSE,
        // but may also return a non-Boolean value which evaluates to FALSE.
        // Returns number of rows affected.  If that is 0 affected it will be seen as FALSE.
        return $result;

    }//end insertRecord()


    /**
     *  Get column names.
     *
     * Query the table tAssignments to get an array of column names.
     *
     * @return an array of column names;
     */
    public function returnColumnsNamesInArray()
    {
        $PDO_Connection = $this->_connectToDb();
        $sql            = 'SELECT * FROM  `tAssignments` LIMIT 1';
        $result         = $PDO_Connection->query($sql);
        $row            = $result->fetch(\PDO::FETCH_ASSOC);
        $colnames       = array_keys($row);
        return $colnames;

    }//end returnColumnsNamesInArray()


    /**
     *  Get last lesson.
     *
     * Get the last lesson assigned to a particular student. Use order of
     *    tA_S_ID to determine last.  Check this to see if it always returns
     *    same record as the next method that uses tA_LastModifiedDateTime.
     *
     * @param string $studentID The student.
     *
     * @return The_last_lesson as an array.
     */
    public function getLastDbEntryAsArray($studentID)
    {
        $PDO_Connection = $this->_connectToDb();
        $sql            = 'SELECT * FROM tAssignments WHERE tA_S_ID = :studentID
                            ORDER BY tA_id DESC LIMIT 1';
        $stmt           = $PDO_Connection->prepare($sql);
        $stmt->bindParam('studentID', $studentID, \PDO::PARAM_INT);
        $stmt->execute();
        $row     = $stmt->fetch(\PDO::FETCH_ASSOC);
        $log_file = fopen('/var/www/html/jimfuqua/tutor/logs/getLastDbEntryAsArray.log', 'w');
        $v       = var_export($row, true);
        $string  = __LINE__.' AC $row = '.$v."\n\n";
        fwrite($log_file, $string);
        return $row;

    }//end getLastDbEntryAsArray()


    /**
     *  Get  newest db entry assigned to a student..
     *
     * Get the last lesson assigned to a particular student by timestamp.
     *
     * @param string $studentID The student.
     *
     * @return $theLastLesson
     */
    public function getNewestDbEntry($studentID)
    {
        $PDO_Connection = $this->_connectToDb();
        $sql            = 'SELECT * FROM tAssignments
                WHERE tA_S_ID = :studentID
                ORDER BY tA_LastModifiedDateTime
                DESC LIMIT 1';
        $stmt           = $PDO_Connection->prepare($sql);
        $stmt->bindParam('studentID', $studentID, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row;

    }//end getNewestDbEntry()


    /**
     *  Get one row for a particular student.
     *
     * Get a row for a student - computer chooses order.
     *
     * @param string $studentID The student.
     *
     * @return $row
     */
    public function getOneRowFromDbAsArrayID($studentID)
    {
        $PDO_Connection = $this->_connectToDb();
        $sql            = "SELECT * FROM tAssignments WHERE tA_S_ID = '".$studentID."' LIMIT 1";
        $PDO_Object     = $PDO_Connection->query($sql);
        $row            = $PDO_Object->fetch(\PDO::FETCH_ASSOC);
        return $row;

    }//end getOneRowFromDbAsArrayID()


    /**
     * Get assignment with the same name for a particular student.
     *
     * Get an assignment for a particular student by the generic assignment name.
     * There could be multiple records with the same generic assignment name.
     *
     * @param string  $studentID        The student.
     * @param string  $tgAssignmentName The assignment to get.
     * @param integer $taStartRec       Get the assignment with this start rec.
     *
     * @return $result
     */
    public function getSpecificStudentAssignmentFromDbAsArray(
      $studentID,
      $tgAssignmentName,
      $taStartRec
      )
    {
        // Gets a specific row and return mysql_results.
          $PDO_Connection = $this->_connectToDb();
          $sql            = "SELECT * FROM tAssignments
                  WHERE ((tA_S_ID = '".$studentID."') && (tG_AssignmentName =
                                '".$tgAssignmentName."') &&
                  (tA_StartRec = '".$taStartRec."'))";
            $PDO_Object   = $PDO_Connection->query($sql);
            $row          = $PDO_Object->fetch(\PDO::FETCH_ASSOC);
            return $row;

    }//end getSpecificStudentAssignmentFromDbAsArray()


    /**
     *  Get all rows assigned to a student by the student's id.
     *
     * Get rows by student id.
     *
     * @param string $studentID The ID.
     *
     * @return array of $rows. Base array is numeric. Rows are relational.
     */
    public function getAssignmentsByStudentID($studentID)
    {
$log_file = fopen("/var/www/html/jimfuqua/tutor/logs/getAssignmentsByStudentI.log", "w");
//$v = var_export($result, true);
//$string = __LINE__.' AC $result = '.$v."\n\n";
//fwrite($log_file, $string);
        $PDO_Connection = $this->_connectToDb();
        $stmt = $PDO_Connection->prepare('SELECT * FROM tAssignments WHERE tA_S_ID = :tA_S_ID');
    if (!$stmt) {
        $string = __LINE__." \nPDO::errorInfo():\n";
        fwrite($log_file, $string);
        fwrite($log_file, "$dbh->errorInfo()");
        fwrite($log_file, "\n ". '$stmt = '.$stmt);
    }
        $stmt->bindParam(':tA_S_ID', $studentID, \PDO::PARAM_STR, 80);
        $stmt->execute();
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
        // Did ok

    }//end getAssignmentsByStudentID()

    /**
     *  Get row by the id.
     *
     * Get row by id.
     *
     * @param string $id Is the row index.
     *
     * @return array of $columns
     */
    public function getRowByIndexId($id)
    {
        $PDO_Connection = $this->_connectToDb();
        $stmt           = $PDO_Connection->prepare('SELECT * FROM tAssignments WHERE tA_id = :id');
        $stmt->bindParam('id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row;

    }//end getRowByIndexId()


    /** Duplicate of above
     *  Get one row by id.
     *
     * Get a row by its id.
     *
     * @param string $tA_id The index for the table tAssignments.
     *
     * @return $row
     */
    public function getAssignmentByAssignmentID($tA_id)
    {
        $PDO_Connection = $this->_connectToDb();
        $stmt           = $PDO_Connection->prepare('SELECT * FROM tAssignments WHERE tA_id = :id');
        $stmt->bindParam(':id', $tA_id, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row;

    }//end getAssignmentByAssignmentID()


    /**
     *  Delete the last row.
     *
     * Delete the newest row assigned to a student.
     *
     * @param string $studentID The student.
     *
     * @return $result
     */
    public function deleteLastRow($studentID)
    {
        // Should get newest row.  Test to make sure it does not get oldest row.
        $PDO_Connection = $this->_connectToDb();
        $stmt           = $PDO_Connection->prepare(
            'DELETE FROM tAssignments
                                                    WHERE (tA_S_ID = :studentID)
                                                    ORDER BY tA_id DESC
                                                    LIMIT 1'
        );
        $stmt->bindParam(':studentID', $studentID, \PDO::PARAM_STR, 80);
        $result = $stmt->execute();
        // Returns TRUE on success or FALSE on failure.
        $count = $stmt->rowCount();
        return $count;

    }//end deleteLastRow()

    /**
     *  Delete all of a student's assignments.
     *
     * Delete all lessons assigned by name and student's ID.
     *
     * @param string $studentID Identifies the student.

     * @param string $tG_AssignmentName
     *
     * @return $numRowsChanged
     */
    public function delRowsByStudentId_AssignmentName($studentID, $tG_AssignmentName)
    {
        $PDO_Connection = $this->_connectToDb();
        $stmt = $PDO_Connection->prepare('DELETE FROM tAssignments WHERE (tA_S_ID = :studentID && tG_AssignmentName = :tG_AssignmentName)');
        //$stmt = $PDO_Connection->prepare('DELETE FROM tAssignments WHERE (tA_S_ID = :studentID)');
        $logFile=fopen("/var/www/html/jimfuqua/tutor/logs/ACdelLessons.php.log", "w");

        $stmt->bindParam(':studentID', $studentID, \PDO::PARAM_STR, 80);
        $stmt->bindParam(':tG_AssignmentName', $tG_AssignmentName, \PDO::PARAM_STR, 80);
        $result = $stmt->execute();
        $count  = $stmt->rowCount();
        fwrite($logFile, __LINE__ .  ' $studentID = ' . $studentID . "\n");
        fwrite($logFile, __LINE__ .  ' $tG_AssignmentName = ' . $tG_AssignmentName. "\n");
        //$v = var_export($_GET, true);
        $logFile=fopen("/var/www/html/jimfuqua/tutor/logs/delRows.log", "w");
        fwrite($logFile, __LINE__ .  ' $count = ' . $count . "\n");
        return $count;

    }//end delRowsByStudentId()

    /**
     *  Delete all of a student's assignments.
     *
     * Delete all lessons assigned to a particular student.
     *
     * @param string $studentID Identifies the student.
     *
     * @return $numRowsChanged
     */
    public function delRowsByStudentId($studentID)
    {
        $PDO_Connection = $this->_connectToDb();
        $stmt = $PDO_Connection->prepare('DELETE FROM tAssignments WHERE (tA_S_ID = :studentID)');
        $stmt->bindParam(':studentID', $studentID, \PDO::PARAM_STR, 80);
        $result = $stmt->execute();
        $count  = $stmt->rowCount();
        return $count;

    }//end delRowsByStudentId()

    /**
     *  Delete a particular row.
     *
     * Delete one row identified by its id.
     *
     * @param integer $id The student.
     *
     * @return $result
     */
    public function deleteRowByRowId($id)
    {
        $PDO_Connection = $this->_connectToDb();
        $del            = $PDO_Connection->prepare('SELECT * FROM tAssignments WHERE tA_id = :id');
        $del->bindParam(':id', $id, \PDO::PARAM_INT);
        $del->execute();
        $count = $del->rowCount();
        return $count;

    }//end deleteRowByRowId()

    /**
     *  Update fields.
     *
     * Update particular fields.
     *
     * @param array $valueArray Values for the changes.
     * @param array $whereArray Fields to change.
     *
     * @return $result
     */
    public function updateFields(array $valueArray, array $whereArray)
    {
        $log_file = fopen('/var/www/html/jimfuqua/tutor/logs/AC updateFields.log', 'w');
        $v       = var_export($valueArray, true);
        $string  = __LINE__.' AC $valueArray = '.$v."\n\n";
        fwrite($log_file, $string);
        $v      = var_export($whereArray, true);
        $string = __LINE__.' AC $whereArray = '.$v."\n\n";
        fwrite($log_file, $string);
        $PDO_Connection = $this->_connectToDb();
        $sql            = $this->_arrayToUpdateSQL(
            $valueArray,
            $whereArray,
            $PDO_Connection
        );
        $string         = __LINE__.' AC $sql = '."$sql\n\n";
        fwrite($log_file, $string);
        $affectedRows = $PDO_Connection->exec($sql);
        return $affectedRows;

    }//end updateFields()

    /**
     *  Update tA_RepsTowardM.
     *
     * Update the database field.
     *
     * @param integer $taRepsTowardM  New value for the column.
     * @param integer $tgRepsToMaster Required reps.
     * @param integer $lessonID       Time change was made.
     *
     * @return $result
     */
    /*
        public function updateTaRepsTowardM($taRepsTowardM, $tgRepsToMaster, $lessonID)
        {
        // Check RepsTowardM to see if === or > Reps_to_master.
        $row = $this->getRowByIndexId($lessonID);
        // Next commands increment RepsTowardM.
        if (is_numeric($taRepsTowardM) === TRUE) {
            $PDO_Connection = $this->_connectToDb();
            $sql            = 'UPDATE tAssignments SET tA_RepsTowardM = "'.$taRepsTowardM.';
                              "WHERE tA_id = "'.$lessonID.'"';
            $affectedRows   = $PDO_Connection->exec($sql);

            // Get assignment back and check for tA_RepsTowardM equal of greater than tG_Reps_To_Master.
            $result         = $this->getAssignmentByAssignmentID($lessonID);
            $taRepsTowardM  = $result['tA_RepsTowardM'];
            $tgRepsToMaster = $result['tG_Reps_to_master'];
            $returnArray    = [
                               'affected_rows'     => $affectedRows,
                               'tA_RepsTowardM'    => $taRepsTowardM,
                               'tG_Reps_to_master' => $tgRepsToMaster,
                              ];
            return $returnArray;
        } else if ($taRepsTowardM === 'lesson_if_error') {
            $this->transformAssignmentToNextLesson($lessonID, $taRepsTowardM);
        } else if ($taRepsTowardM === 'lesson_if_correct') {
            $this->transformAssignmentToNextLesson($lessonID, $taRepsTowardM);
        } else {
            trigger_error("Improper call to 'AC updateTaRepsTowardM'", E_USER_ERROR);
        }//end if

        }//end updateTaRepsTowardM()
    */

     /**
      * IncrementErrorsMade.
      *
      * Update field tA_StartRec.
      *
      * @param integer $lessonID Index of lesson.
      *
      * @return $result
      */
    /*
        public function incrementErrorsMade($lessonID)
        {
        $PDO_Connection = $this->_connectToDb();
        $row            = $this->getRowByIndexId($lessonID);
        // Returns array.
        $errorsMade = ($row['tA_ErrorsMade'] + 1);
        $errorsMade = intval($errorsMade);
        $sql        = 'UPDATE tAssignments SET tA_ErrorsMade=tA_ErrorsMade+1  WHERE id='.$lessonID;
        $result     = $PDO_Connection->query($sql);
        $PDO_Connection->close();
        return $result;

        }//end incrementErrorsMade()
    */


    /**
     *  Update field tA_StartRec.
     *
     * Update field tA_StartRec.
     *
     * @param integer $taStartRec          The record to change.
     * @param string  $studentID           The student.
     * @param integer $tAoriginalTimestamp Time record changed.
     *
     * @return $result
     */
    public function updateTaStartRec($taStartRec, $studentID, $tAoriginalTimestamp)
    {
        $PDO_Connection = $this->_connectToDb();
        $sql            = "UPDATE  tAssignments
                SET     tA_StartRec = '".$taStartRec."'
                WHERE   tA_S_ID   = '".$studentID."' AND
                tA_OriginalTimestamp = '".$tAoriginalTimestamp."'";
        $affectedRows   = $PDO_Connection->exec($sql);
        return $affectedRows;

    }//end updateTaStartRec()

    /**
     *  Sum assigned time.
     *
     * Get the sum of the time assigned from an array of lessons assigned.
     *
     * @param array $lessonsArray All of the lessons assigned to this student.
     *
     * @return $result
     */
    public function getSumOfAssignedTimeFromArray(array $lessonsArray)
    {
        $sum = 0;
        foreach ($lessonsArray as $k => $row) {
            // Sum 'tA_PercentTime' in each row.
            $sum += $row['tA_PercentTime'];
            // This calculates the total for all assignments.
        }

        return $sum;

    }//end getSumOfAssignedTimeFromArray()


    /**
     *  Select the student assignments that are ready for administration
     *
     * From the lesson array select all lessons that are ready.  Should not
     * return post dated lessons.
     *
     * @param string  $studentID The student.
     *
     * @return $assignmentFields
     */
    public function getCurrentStudentAssignmentsInAnArray($studentID)
    {
        $result         = NULL;
        $PDO_Connection = $this->_connectToDb();
        // Variable $studentID must never contain spaces.
        trim($studentID);
$dbUser = 'root';
$dbPassword = 'pasword';
$dbDSN = "mysql:host=localhost;dbname=jlfEDU;";

try {
            // Our new PDO Object.
            $con = new \PDO($dbDSN, $dbUser, $dbPassword);
            //$con = $this->_connectToDb();
            // Catch and show the error.
        } catch (PDOException $pe) {
            die('Error occurred:'.$pe->getMessage());
        }

$stmt = $con->prepare('SELECT * FROM tAssignments
                 WHERE tA_S_ID = :studentID && tA_Post_date < UNIX_TIMESTAMP()
                 ORDER BY tA_PercentTime
                 DESC');
        $stmt->bindParam(':studentID', $studentID, \PDO::PARAM_STR, 12);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        /*$stmt = $PDO_Connection->prepare('SELECT * FROM tAssignments
                 WHERE tA_S_ID = :studentID && tA_Post_date < UNIX_TIMESTAMP()
                 ORDER BY tA_PercentTime
                 DESC');
        $stmt->bindParam(':studentID', $studentID, \PDO::PARAM_STR, 12);
        $stmt->execute();*/

       // $rows = $stmt->fetchAll();

        $log_file = fopen("/var/www/html/jimfuqua/tutor/logs/getCurrentStudentAssignmentsInAnArray.log", "w");
        $string = __LINE__.'  $studentID = ' . $studentID ."\n";
        fwrite($log_file, $string);
        $v = var_export($rows, true);
        $string = __LINE__.' AC $rows = '.$v."\n\n";
        fwrite($log_file, $string);

        // Eliminate duplicate numberic keys.
        foreach ($rows as $key => $value) {
            foreach ($value as $key2 => $singleAssignment) {
                if (is_numeric($key2) === TRUE) {
                    unset($rows[$key][$key2]);
                }
            }
        }

        $v = var_export($rows, true);
        $string = __LINE__.' AC $rows = '.$v."\n\n";
        fwrite($log_file, $string);

    return $rows;

    }//end getCurrentStudentAssignmentsInAnArray()

    /**
     * RepairRowIfStartRecIsLlargerThanStopRec.
     *
     * StartRec should be less than or equal to StopRec.  Fix it if this is not TRUE.
     *
     * @param string  $studentID        The source of the lessons.
     * @param string  $tgAssignmentName The assignment to do.
     * @param integer $taStartRec       The assignment start position.
     *
     * @return $assignmentFields or NULL
     */
    public function repairRowIfStartRecIsLargerThanStopRec($studentID, $tgAssignmentName, $taStartRec)
    {
        $currentRow = $this->getSpecificStudentAssignmentFromDbAsArray(
            $studentID,
            $tgAssignmentName,
            $taStartRec
        );

        $returnArray = array();
        if ($currentRow === NULL) {
            $returnArray['NULL_input'] = TRUE;
        }

        if (array_key_exists('NULL_input', $returnArray) === FALSE) {
            if ($taStartRec > $currentRow['tA_StopRec']) {
                $returnArray['tA_StartRecWasGreater'] = TRUE;
                // Update the tAssignment row by adding a new row based upon
                // the gA and deleting the current row.
                // Get tG_Lesson_if_Correct in this assignment's tG_AssignmentName.
                // Get the name of the next lesson which is tG_Lesson_if_Correct
                // column in the current tG_AssignmentName.
                $classInstance = new GenericAClass;
                // Get the row of the current lesson's tG_AssignmentName
                // Then get the name of the new gA.
                // Then get the row of the new gA.
                $thisGAname = $classInstance->getRowFromDbAsArray(
                    $currentRow['tG_AssignmentName']
                );
                $nextGAname = $thisGAname['tG_Lesson_if_Correct'];
                // This is the name of the next gA.
                $nextGA = $classInstance->getRowFromDbAsArray($nextGAname);
                // Now we replace the current tA row with a new tA row with the new gA.
                $x         = $currentRow['tA_StudentName'];
                $pramArray = array(
                // For a new tA row.
                              'tA_S_ID'                => $studentID,
                              'tA_StudentName'         => $currentRow['tA_StudentName'],
                              'tG_AssignmentName'      => $nextGA['tG_AssignmentName'],
                              'tA_Consecutive_Reps_OK' => 'tA_Consecutive_Reps_OK',
                              'tA_StartRec'            => $nextGA['tG_StartRec'],
                              'tA_StopRec'             => $nextGA['tG_StopRec'],
                              'tA_Immediate_Loops'     => $nextGA['tG_Immediate_Loops'],
                              'tG_Reps_to_master'      => $nextGA['tG_Reps_to_master'],
                              'tA_RepsTowardM'         => '0',
                              'tA_ErrorsMade'          => '0',
                              'tA_PercentTime'         => $currentRow['tA_PercentTime'],
                              'tA_SumPercent'          => '0',
                              'tA_QueOrder'            => $currentRow['tA_QueOrder'],
                              'tA_SavedAssignment'     => '',
                              'tA_SavedStartRec'       => '',
                              'tA_Post_date'           => '',
                              'tA_iterations_to_do'    => '',
                              'tG_Errors_Allowed '     => '',
                             );
                $result = $this->insertRecord($pramArray);
                // FALSE for failure or TRUE for success.
                $returnArray['tA_subsequentAssignmentInserted'] = TRUE;
                // Now delete the current assignment.
                $row = $this->getSpecificStudentAssignmentFromDbAsArray(
                    $studentID,
                    $tgAssignmentName,
                    $taStartRec
                );

                if ($result === 1) {
                    $returnArray['tA_ErroneousAssignmentDeleted'] = TRUE;
                } else {
                    $returnArray['tA_ErroneousAssignmentDeleted'] = FALSE;
                }
            } else {
                $returnArray['tA_StartRecWasGreater'] = FALSE;
            }//end if
        }//end if

            return $returnArray;

    }//end repairRowIfStartRecIsLargerThanStopRec()


    public function removeLastLessonFromArrayIfRequired(array $lessonArray)
    {
        // Variable $lessonArray is an array of arrays.  The interior arrays are specific
        // assignments.
        if (count($lessonArray) > 0) {
            // Remove last lesson  and duplicates of last lesson if
            // tA_Consequtive_Reps_OK = 0  -- In MySQL 0 is FALSE.
            $removeLastAssignmentFromResultArray = TRUE;
            while ($removeLastAssignmentFromResultArray === TRUE) {
                $removeLastAssignmentFromResultArray = FALSE;
                // Limit to one pass unless last lesson was removed.
                foreach ($lessonArray as $k1 => $assignmentFields) {
                    if (($assignmentFields['tG_AssignmentName'] === $tgAssignmentName)
                        && ($assignmentFields['tA_StartRec'] === $taStartRec)
                    ) {
                        unset($lessonArray[$k1]);
                        $removeLastAssignmentFromResultArray = TRUE;
                        // Make one more pass.
                    }
                }//end foreach
            }//end while
        }

        return $lessonArray;

    }//end removeLastLessonFromArrayIfRequired()


    /**
     * Compare two numbers.
     *
     * Compare two numbers and return a number indicating which is larger.
     *
     * @param integer $x The first of two numbers to compare.
     * @param integer $y The second of two numbers to compare.
     *
     * @return $assignmentFields
     */
    public function compare($x, $y)
    {
        if ($x === $y) {
            return 0;
        } else if ($x > $y) {
            return -1;
        } else {
            return 1;
        }

    }//end compare()


    /**
     *  Normalize array of arrays to sum 100% time assigned.
     *
     * Normalizes the lessons array so that time assigned is 100.
     * Does not change the sum assigned in the database.
     *
     * @param array $lessonsArray The array of lesson arrays.
     *
     * @return $assignmentFields
     */
    public function normalizePercentTimeTo100Percent(array $lessonsArray)
    {
        // Run through array calculating the sum of tA_PercentTime assigned.
        // May be more or less than 100%.
        $sum = 0;
        foreach ($lessonsArray as $k => $assignmentFields) {
            // Loop through the list of all assignments for this student.
            $sum = ($sum + $assignmentFields['tA_PercentTime']);
        }

        // Variable $sum should now have the total of all the time assigned
        // For each lesson, $sum may be more or less than 100 percent.
        reset($lessonsArray);
        $runningSum = 0;
        // The & is necessary or it returns NULL.
        foreach ($lessonsArray as $k => &$assignmentFields) {
            // Each field in an individual assignment.
            // normalize this lesson so all assigned PercentTime will total
            // exactly 100%.
            $assignmentFields['tA_PercentTime'] = ($assignmentFields['tA_PercentTime'] * 100 / $sum);
            // Now the tA_PercentTime is normalized.
            // Now let's adjust the sum % time.
            $assignmentFields['tA_SumPercent'] = ($runningSum + $assignmentFields['tA_PercentTime']);
            $runningSum = ($runningSum + $assignmentFields['tA_PercentTime']);
        }

        // Next line sorts the $resultArray by using the function compare.
        // Sorts this student's assignments in order of assigned time.
        // The problem is here.  Check if usort handles numbers with decimals.
        // check if array_reverse works.  There does not seem to be a
        // local function by that name.
        return $lessonsArray;

    }//end normalizePercentTimeTo100Percent()


    /**
     *  Select a lesson.
     *
     * From the array of lessons select an individual lesson.
     *
     * @param array  $lessonsArray The source of the lessons.
     * @param string $lastLessonId Identifies the previous lesson.
     *
     * @return $assignmentFields
     */
    public function selectALesson(array $lessonsArray, $lastLessonId)
    {
        if (count($lessonsArray) === 0) {
            // Count must be at least 1.  Empty not allowed.
            return NULL;
        }//end if

        if (count($lessonsArray) === 0) {
            // Count must be at least 1.  Empty not allowed.
            return NULL;
        }

        // Assignments are a collection of fields in the db.
        // One field is tA_PercentTime.  Another is tA_SumPercent.
        // tA_QueOrder is not considered here yet.  May remove QueOrder.
        // Copy input array and remove post-dated assignments from copy.
        // If count is 0 revert to input array.
        // Objective is to select a lesson at random based upon its % time.
        // Will return lesson tA_id in tAssignments.
        // First step is to normalize lessons to 100% and calculate the
        // running sum that totals 100.
        // Then calcualte a random number between 1 and 100.
        $normalizedArray = $this->normalizePercentTimeTo100Percent($lessonsArray);
        // The $normalized array is an array of all lessons for this
        // student with the time assigned
        // normalized to 100%.  May have started more or less than 100%.
        // Use a the random number to select the lesson based on 100%.
        // Pick a random integer between 1 and 100000.
        // Divide by 100000 minimize chance of boundary of 1 or 100.
            $targetPercent = mt_rand(1, 100000);
        if ($targetPercent === 0) {
            // Avoid 0%.
            $targetPercent = 1;
        }//end if
        if ($targetPercent === 100000) {
            // Avoid 100%.
            $targetPercent = 99999;
        }//end if
        $targetPercent = ($targetPercent / 1000);
        // Same as dividing by 100000 then multiplying by 100 to get %;
        // Cycle through each of the student's assignments and select
        // the first assignment where tA_SumPercent is less than or =
        // to $targetPercent.
        foreach ($normalizedArray as $assignmentFields) {
            // Loop thru all assignments.
            if ($targetPercent <= $assignmentFields['tA_SumPercent']) {
                // Found the assignment.
                return $assignmentFields;
            }
        }

    }//end selectALesson()


    /**
     *  Return NULL.
     *
     * Check to see if a variable is NULL.  If so return "NULL".
     *
     * @param string $varable The variable to check..
     *
     * @return Number_Of_Rows
     */
    public function printNullIfNull($varable)
    {
        if ($varable === NULL) {
            return 'NULL';
        } else {
            return $varable;
        }

    }//end printNullIfNull()


    /**
     *  Insert a single split in tA.
     *
     * Take one tA split assignment and read the tSplit it refers to.
     * Then insert into tA new assignments specified by the tSplits.
     *
     * @param string $onetAAssignmentSplit The split to process.
     *
     * @return Number_Of_Rows
     */
    public function insertTaSplitIntoTa($onetAAssignmentSplit)
    {
        // $log_file = fopen("/var/www/html/jimfuqua/tutor/logs/insertTaSplitIntoTa.log", "w");
        // $v = var_export($onetAAssignmentSplit, true);
        // $string = __LINE__.' $onetAAssignmentSplit = '.$v."\n";
        // fwrite($log_file, $string);
        include_once 'SplitsClass.inc';
        // Must get an array of the splits; make assignments of them insert
        // assignments into tA.
        $studentName = $onetAAssignmentSplit[0]['tA_StudentName'];
        $studentID   = $onetAAssignmentSplit[0]['tA_S_ID'];
        // This assignment should be a split.
        if (substr($onetAAssignmentSplit[0]['tG_AssignmentName'], 0, 3) === 'tS_') {
            // Now get an array of all of the tSplits with that name.
            // add assignment info not in tSplits.
            $insertionArray = array(
                               'tA_StudentName' => $studentName,
                               'tA_S_ID'        => $studentID,
                              );
            include_once 'SplitsClass.inc';
            $splitsClassInstance = new SplitsClass;
            // The $splitsArray is an array of the relevant tSplits splits with
            // this name.  There may be many.
            $splitsArray = $splitsClassInstance->getSplitByName(
                $onetAAssignmentSplit[0]['tG_AssignmentName']
            );
            // The $splitsArray keys are numeric & $values are associative arrays.
            // Keys are id, tS_Name, tS_tA_Parameter, tSplit_gA,
            // tS_gA_Parameter, tSplit_PercentageTime.
            // foreach ($splitsArray as $key => $value) {
                // Is an array of arrays.
                // Add field to $insertionArray.
            // $insertionArray['tG_AssignmentName'] = $value['tSplit_gA'];
                // Now insert the content of the insertion_Array into the tA.
            // $result = $this->insertRecord($insertionArray);
            // }
        }//end if

    }//end insertTaSplitIntoTa()


    /**
     *  Manage assignments that split..
     *
     * Check assignment array for splits.  A split is designed to split into two
     *  or more assignments and is not an assignment to an individual lesson.
     *  If splits are found modify the database by converting the splits to
     *  multiple individual lesson assignments.  Then delete the split
     *  assignment.
     *
     * @param string $singleAssignmentArray One assignment for a student..
     *
     * @return Number_Of_Rows
     */
    public function checkAndProcessSplits($singleAssignmentArray)
    {
        // $log_file = fopen("/var/www/html/jimfuqua/tutor/logs/AC checkAndProcessSplits.log", "w");
        // $v = var_export($singleAssignmentArray, true);
        // $string = __LINE__.' AC $singleAssignmentArray = '.$v."\n";
        // fwrite($log_file, $string);
        // $singleAssignmentArray contains both numeric and relational keys.
        if (is_array($singleAssignmentArray === FALSE)) {
            $dataToReturn = 'Error at '.__LINE__.'Ac';
        }

        if (is_array($singleAssignmentArray) === TRUE) {
            // All of a student's assignments.
            foreach ($singleAssignmentArray as $key => $singleAssignment) {
                $v = var_export($singleAssignment, TRUE);
                // An individual assignment array.
                foreach ($singleAssignmentArray as $key2 => $value) {
                    if (is_array($value) === FALSE) {
                        $dataToReturn = __LINE__.'Error AC checkAndProcessSplits';
                        break;
                    } else {
                        if (substr($value['tG_AssignmentName'], 0, 3) === 'tS_') {
                            $this->insertTaSplitIntoTa($value);
                            $dataToReturn = TRUE;
                        } else {
                            $dataToReturn = FALSE;
                        }//end if
                    }//end if
                }//end foreach
            }//end foreach
        }

        $dataToReturn = NULL;
        return $dataToReturn;

    }//end checkAndProcessSplits()


    public function removeNumericKeys(array $inputArray)
    {
        foreach ($inputArray as $key => $singleAssignment) {
            if (is_numeric($key) === TRUE) {
                unset($inputArray[$key]);
            }
        }

    }//end removeNumericKeys()


     /**
      *  Gets the next lesson for a student.
      *
      * Find the identified student's next lesson.
      *
      * @param string $studentID    Identifies the student who will do the next lesson.
      * @param string $lastLessonId Make sure lesson is not repeated unles OK.
      *
      * @return Number_Of_Rows
      */
    public function getNextAssignmentToDo($studentID, $lastLessonId)
    {
    $log_file = fopen("/var/www/html/jimfuqua/tutor/logs/AC_getNextAssignmentToDo.log", "w");
    //$v = var_export($result, true);
    $string = __LINE__.' AC $studentID = '.$studentID."\n\n";
    fwrite($log_file, $string);
    $string = __LINE__.' AC $lastLessonId = '.$lastLessonId."\n\n";
    fwrite($log_file, $string);
        do {
            // End is while ($lookingForLesson === TRUE).
            // Must resolve all splits before can process results.
            $lookingForLesson = FALSE;
            // Get an array of arrays. Numeric outer. Relational inner.
            $resultArray = $this->getCurrentStudentAssignmentsInAnArray($studentID);
            // Variable $resultArray is an array of arrays.
            $v = var_export($resultArray, true);
            $string = __LINE__.' AC $resultArray = '.$v."\n\n";
            fwrite($log_file, $string);
            if ($resultArray === NULL) {
                // This student has no lessons.
                return NULL;
            } else {
                // NOT NULL.
                foreach ($resultArray as $key => $singleAssignment) {
                    // Verified above line sends a single assignment 10Jan15
                    // Next command may modify the database.
                    // Should return TRUE if it did.
                    $result = FALSE;
                    $result = $this->checkAndProcessSplits($singleAssignment);
                    if ($result === TRUE) {
                        // Must go around again because a split may contain a split.
                        $lookingForLesson = TRUE;
                    } else {
                        $lookingForLesson = FALSE;
                    }
                }//end foreach
            }//end if
        } while ($lookingForLesson === TRUE);
        reset($resultArray);
        $v = var_export($resultArray, true);
        $string = __LINE__.' AC $resultArray = '.$v."\n\n";
        fwrite($log_file, $string);
        if (count($resultArray) > 0) {
            // Takes an array of lessons and returns a lesson id.
            $lesson = $this->selectALesson($resultArray, $lastLessonId);
            // Should always return array but does not sometimes.
            $str = __LINE__.' AC   count($resultArray) = '.count($resultArray)."\n";
        $v = var_export($lesson, true);
        $string = __LINE__.' AC $lesson = '.$v."\n\n";
        fwrite($log_file, $string);
            return $lesson;
        } else {
            return "error";
        }

}//end getNextAssignmentToDo()


}//end class
