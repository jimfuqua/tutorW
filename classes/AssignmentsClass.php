<?php
/**
 * @file
 * This file manages a connection to tAssignments.
 */

namespace jimfuqua\tutorW;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// echo "<br  />" . __LINE__ ;
/*
 * AssignmentsClass.php File Doc Comment
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
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License V3+
 * @link    http://www.jimfuqua.com/
 */

// In left_right_blocks.  Must go up to lessons then up to tutorW
// before going down to src.
// echo "<br  />" . __LINE__ . "<br  />";.
/**
 * Assignment.class.php.
 *
 * A warning will be raised, saying that to document the define, use
 * another DocBlock.
 */
class AssignmentsClass {

  /**
   * The constructor prints a statement for debugging.
   */
  public function __construct() {

    // Echo "I am an AssignmentClass object.<br/>";.
  }

  /**
   * Set session variables from lesson.
   *
   * Retrieve a row from tPersons by linking tA_S_ID from lessons and
   * "Person_ID" from tPersons. Use retrieved data to set person's name.
   *
   * @param array $lesson
   *   It is a row from tAssignments.
   */
  public function setSessionVariablesFromLesson(array $lesson) {

    echo "<br  />" . __LINE__ . "<br  />";
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
    echo "<br  />" . __LINE__ . "<br  />";
  }//end setSessionVariablesFromLesson()

  /**
   * Array to SQL.
   *
   * Take an array and convert it into a SQL INSERT statement.
   *
   * @param array $my_parameters_array
   *   An array to insert into
   *   tGenericAssignment table.
   *
   * @return sql string
   *   Returns a SQL string.
   */
  private function arrayToSqlString(array $my_parameters_array) {

    // Echo "<br  />" . __LINE__ ;.
    $sql       = 'INSERT INTO tAssignments (';
    $sql_values = ') VALUES (';
    foreach ($my_parameters_array as $key => $value) {
      $sql       = $sql . $key . ', ';
      $sql_values = $sql_values . "'" . $value . "', ";
    }

    $sql       = trim($sql);
    $sql       = rtrim($sql, ',');
    $sql_values = trim($sql_values);
    $sql_values = rtrim($sql_values, ',');
    $sql       = $sql . $sql_values;
    $sql       = $sql . ');';
    return $sql;

  }//end arrayToSqlString()

  /**
   * Select a lesson.
   *
   * From the lesson array select an individual lesson.
   *
   * @param array $value_array
   *   The source of the lessons.
   * @param array $where_array
   *   Name of the generic assignment.
   * @param string $pdo_connection
   *   The connextion to the database.
   *
   * @return sql
   *   Returns a SQL string.
   */
  private function arrayToUpdateSql(array $value_array, array $where_array, $pdo_connection) {
    // Echo "<br  />" . __LINE__;.
    $sql = '';
    $sql = 'UPDATE tAssignments SET ';
    foreach ($value_array as $key => $value) {
      $sql = $sql . $key . ' = ' . $value . ', ';
    }
    // Echo "<br  />" . __LINE__;.
    $sql = trim($sql);
    $sql = rtrim($sql);
    $sql = substr($sql, 0, -1);

    $where_sql = '';
    $sql      = $sql . ' WHERE ';
    $where_sql = '';
    reset($where_array);
    foreach ($where_array as $key => $value) {
      $where_sql = $where_sql . $key . ' = "';
      $where_sql = $where_sql . $value . '" AND ';
    }

    $where_sql = rtrim($where_sql);
    $where_sql = substr($where_sql, 0, -3);
    $sql      = $sql . $where_sql;
    return $sql;

  }//end arrayToUpdateSql()


  /**
   * Select a lesson.
   *
   * From the lesson array select an individual lesson.
   *
   * @return pdo_connection
   *   Return a pdo connection to the database.
   */
  private function connectToDb() {
    require 'db_include2.php';
    try {
      // Our new PDO Object.
      $con = new \PDO($db_dsn,
                        $db_user,
                        $db_password,
                        array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION)
                      );
    }
    catch (PDOException $ex) {
      die(json_encode(array('outcome' => FALSE, 'message' => 'Unable to connect')));
    }
    return $con;
  } // End connectToDb().


  public function removeUnneededColumns($in_array) {
    // What happens to loose a column?
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
    $out_array = array();

    foreach ($ok_array as $key => $value) {
      // fwrite($log_file, '$key = ' . $key . "\n");
      // fwrite($log_file, '$value = ' . $value . "\n");.
      if (array_key_exists($value, $in_array)) {
        $out_array[$value] = $in_array[$value];
        // fwrite($log_file, 'Row added.' . "\n\n");.
      }
      else {
        // fwrite($log_file, 'array_key_exists($value,
        // $in_array ) = false' . "\n\n");.
      }
    }
    // $v = var_export($out_array, true);
    // $string  = __LINE__.' $out_array = '.$v."\n\n";
    // fwrite($log_file, $string);.
    return $out_array;
  }


  /**
   * Insert record in database..
   *
   * Gets its variables from nine mandatory parameters and remaining optional
   *   parameters contained in an associative array which is an array of
   *   arrays of key=>value pairs.  It records the data in tAssignments.
   *
   * @param array $pram_array
   *   The source of the lessons.
   *
   * @return assignment_fields
   *   Returns boolean.
   */
  public function insertRecord(array $pram_array) {
    $pram_array_processed = $this->removeUnneededColumns($pram_array);
    $pdo_connection = $this->connectToDb();
    $sql            = $this->arrayToSqlString($pram_array_processed);
    $result = $pdo_connection->exec($sql);
    // Warning This function may return Boolean FALSE,
    // but may also return a non-Boolean value which evaluates to FALSE.
    // Returns number of rows affected.
    // If that is 0 affected it will be seen as FALSE.
    return $result;

  }//end insertRecord()


  /**
   * Get column names.
   *
   * Query the table tAssignments to get an array of column names.
   *
   * @return array
   *    An array of column names.
   */
  public function returnColumnsNamesInArray() {

    $pdo_connection = $this->connectToDb();
    $sql            = 'SELECT * FROM  `tAssignments` LIMIT 1';
    $result         = $pdo_connection->query($sql);
    $row            = $result->fetch(\PDO::FETCH_ASSOC);
    $colnames       = array_keys($row);
    return $colnames;

  }//end returnColumnsNamesInArray()


  /**
   * Get last lesson.
   *
   * Get the last lesson assigned to a particular student. Use order of
   *    tA_S_ID to determine last.  Check this to see if it always returns
   *    same record as the next method that uses tA_LastModifiedDateTime.
   *
   * @param string $student_id
   *   The student.
   *
   * @return row
   *   The_last_lesson as an array.
   */
  public function getLastDbEntryAsArray($student_id) {

    $pdo_connection = $this->connectToDb();
    $sql            = 'SELECT * FROM tAssignments WHERE tA_S_ID = :student_id
                            ORDER BY tA_id DESC LIMIT 1';
    $stmt           = $pdo_connection->prepare($sql);
    $stmt->bindParam('student_id', $student_id, \PDO::PARAM_INT);
    $stmt->execute();
    $row     = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $row;

  }//end getLastDbEntryAsArray()


  /**
   * Get  newest db entry assigned to a student..
   *
   * Get the last lesson assigned to a particular student by timestamp.
   *
   * @param string $student_id
   *   The student.
   *
   * @return theLastLesson
   *   Get last lesson added to the db.
   */
  public function getNewestDbEntry($student_id) {

    $pdo_connection = $this->connectToDb();
    $sql            = 'SELECT * FROM tAssignments
                WHERE tA_S_ID = :student_id
                ORDER BY tA_LastModifiedDateTime
                DESC LIMIT 1';
    $stmt           = $pdo_connection->prepare($sql);
    $stmt->bindParam('student_id', $student_id, \PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $row;

  }//end getNewestDbEntry()


  /**
   * Get one row for a particular student.
   *
   * Get a row for a student - computer chooses order.
   *
   * @param string $student_id
   *   The student.
   *
   * @return row
   *   Returns one row.
   */
  public function getOneRowFromDbAsArrayId($student_id) {

    $pdo_connection = $this->connectToDb();
    $sql            = "SELECT * FROM tAssignments WHERE tA_S_ID = '" . $student_id . "' LIMIT 1";
    $pdo_object     = $pdo_connection->query($sql);
    $row            = $pdo_object->fetch(\PDO::FETCH_ASSOC);
    return $row;

  }//end getOneRowFromDbAsArrayId()


  /**
   * Get assignment with the same name for a particular student.
   *
   * Get an assignment for a particular student by the generic assignment name.
   * There could be multiple records with the same generic assignment name.
   *
   * @param string $student_id
   *   Thestudent.
   * @param string $tg_assignment_name
   *   The assignment to get.
   * @param int $ta_start_rec
   *   Get the assignment with this start rec.
   *
   * @return result
   *   Get one specific assignment.
   */
  public function getSpecificStudentAssignmentFromDbAsArray(
      $student_id,
      $tg_assignment_name,
      $ta_start_rec
      ) {

    // Gets a specific row and return mysql_results.
    $pdo_connection = $this->connectToDb();
    $sql = <<<EOD
SELECT *
FROM tAssignments
WHERE ((tA_S_ID = "$student_id")
&& (tG_AssignmentName =  "$tg_assignment_name")
&& (tA_StartRec = "$ta_start_rec"))
EOD;
    // Echo $sql;.
    $pdo_object   = $pdo_connection->query($sql);
    // Echo $pdo_object;.
    $row = $pdo_object->fetch(\PDO::FETCH_ASSOC);
    return $row;

  }//end getSpecificStudentAssignmentFromDbAsArray()


  /**
   * Get all rows assigned to a student by the student's id.
   *
   * Get rows by student id.
   *
   * @param string $student_id
   *   The ID.
   *
   * @return array of $rows.
   *   Base array is numeric. Rows are relational.
   */
  public function getAssignmentsByStudentId($student_id) {
    $pdo_connection = $this->connectToDb();
    $stmt = $pdo_connection->prepare('SELECT * FROM tAssignments WHERE tA_S_ID = :tA_S_ID');
    if (!$stmt) {
      // $string = __LINE__." \nPDO::errorInfo():\n";
      // fwrite($log_file, $string);
      // fwrite($log_file, "$dbh->errorInfo()");
      // fwrite($log_file, "\n ". '$stmt = '.$stmt);.
    }
    $stmt->bindParam(':tA_S_ID', $student_id, \PDO::PARAM_STR, 80);
    $stmt->execute();
    $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $rows;
    // Did ok.
  }//end getAssignmentsByStudentId()

  /**
   * Get row by the id.
   *
   * Get row by id.
   *
   * @param string $id
   *   Is the row index.
   *
   * @return row
   *   Returns one lesson.
   */
  public function getRowByIndexId($id) {

    $pdo_connection = $this->connectToDb();
    $stmt           = $pdo_connection->prepare('SELECT * FROM tAssignments WHERE tA_id = :id');
    $stmt->bindParam('id', $id, \PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $row;

  }//end getRowByIndexId()


  /**
   * Duplicate of above.
   *
   * Get a row by its id.
   *
   * @param string $ta_id
   *   The index for the table tAssignments.
   *
   * @return row
   *   Returns a single row.
   */
  public function getAssignmentByAssignmentId($ta_id) {

    $pdo_connection = $this->connectToDb();
    $stmt           = $pdo_connection->prepare('SELECT * FROM tAssignments WHERE tA_id = :id');
    $stmt->bindParam(':id', $ta_id, \PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $row;

  }//end getAssignmentByAssignmentId()


  /**
   * Delete the last row.
   *
   * Delete the newest row assigned to a student.
   *
   * @param string $student_id
   *   The student.
   *
   * @return result
   *   Returns the count of rows deleted.
   */
  public function deleteLastRow($student_id) {

    // Should get newest row.  Test to make sure it does not get oldest row.
    $pdo_connection = $this->connectToDb();
    $stmt           = $pdo_connection->prepare(
          'DELETE FROM tAssignments
                                                    WHERE (tA_S_ID = :student_id)
                                                    ORDER BY tA_id DESC
                                                    LIMIT 1'
      );
    $stmt->bindParam(':student_id', $student_id, \PDO::PARAM_STR, 80);
    $result = $stmt->execute();
    // Returns TRUE on success or FALSE on failure.
    $count = $stmt->rowCount();
    return $count;

  }//end deleteLastRow()



  /**
   * Delete all of a student's assignments.
   *
   * Delete all lessons assigned by name and student's ID.
   *
   * @param string $student_id
   *   Identifies the student.
   *      * @param string $tg_assignment_name.
   *
   * @return numRowsChanged
   *   Number of rows changed.
   */
  public function delRowsByStudentIdAndAssignmentName($student_id, $tg_assignment_name) {

    $pdo_connection = $this->connectToDb();
    $stmt = $pdo_connection->prepare('DELETE FROM tAssignments WHERE (tA_S_ID = :student_id && tG_AssignmentName = :tG_AssignmentName)');
    $stmt->bindParam(':student_id', $student_id, \PDO::PARAM_STR, 80);
    $stmt->bindParam(':tG_AssignmentName', $tg_assignment_name, \PDO::PARAM_STR, 80);
    $result = $stmt->execute();
    $count  = $stmt->rowCount();
    return $count;

  }//end delRowsByStudentId()


  /**
   * Delete all of a student's assignments.
   *
   * Delete all lessons assigned to a particular student.
   *
   * @param string $student_id
   *   Identifies the student.
   *
   * @return numRowsChanged
   *   Returns the number of rows changed.
   */
  public function delRowsByStudentId($student_id) {

    $pdo_connection = $this->connectToDb();
    $stmt = $pdo_connection->prepare('DELETE FROM tAssignments WHERE (tA_S_ID = :student_id)');
    $stmt->bindParam(':student_id', $student_id, \PDO::PARAM_STR, 80);
    $result = $stmt->execute();
    $count  = $stmt->rowCount();
    return $count;
  }//end delRowsByStudentId()


  /**
   * Delete a particular row.
   *
   * Delete one row identified by its id.
   *
   * @param int $id
   *   The student.
   *
   * @return result
   *   Deletes a row and returns the count of rows affected.
   */
  public function deleteRowByRowId($id) {

    $pdo_connection = $this->connectToDb();
    $del            = $pdo_connection->prepare('SELECT * FROM tAssignments WHERE tA_id = :id');
    $del->bindParam(':id', $id, \PDO::PARAM_INT);
    $del->execute();
    $count = $del->rowCount();
    return $count;

  }//end deleteRowByRowId()

  /**
   * Update fields.
   *
   * Update particular fields.
   *
   * @param array $value_array
   *   Values for the changes.
   * @param array $where_array
   *   Fields to change.
   *
   * @return result
   *   Updates an array with new data.
   */
  public function updateFields(array $value_array, array $where_array) {
    $pdo_connection = $this->connectToDb();
    $sql            = $this->arrayToUpdateSql(
          $value_array,
          $where_array,
          $pdo_connection
      );
    // $string         = __LINE__.' AC $sql = '."$sql\n\n";
    // fwrite($log_file, $string);.
    $affected_rows = $pdo_connection->exec($sql);
    return $affected_rows;

  }//end updateFields()


  /**
   * Update tA_RepsTowardM.
   *
   * Update the database field.
   *
   * @param int $ta_reps_toward_m
   *   New value for the column.
   * @param int $tg_reps_to_master
   *   Required reps.
   * @param int $lesson_id
   *   Time change was made.
   *
   * @return return_array
   *   Returns an array containing 'affected_rows',
   *   'tA_RepsTowardM' and 'tG_Reps_to_master'.
   */
  public function updateTaRepsTowardM(
      $ta_reps_toward_m,
      $tg_reps_to_master,
      $lesson_id
      ) {

    // Check RepsTowardM to see if === or > Reps_to_master.
    $row = $this->getRowByIndexId($lesson_id);
    // Next commands increment RepsTowardM.
    if (is_numeric($ta_reps_toward_m) === TRUE) {
      $pdo_connection = $this->connectToDb();
      $sql = 'UPDATE tAssignments SET tA_RepsTowardM = "' . $ta_reps_toward_m . ';
      "WHERE tA_id = "' . $lesson_id . '"';
      $affected_rows   = $pdo_connection->exec($sql);

      // Get assignment back and check for tA_RepsTowardM
      // equal of greater than tG_Reps_To_Master.
      $result         = $this->getAssignmentByAssignmentId($lesson_id);
      $ta_reps_toward_m  = $result['tA_RepsTowardM'];
      $tg_reps_to_master = $result['tG_Reps_to_master'];
      $return_array    = [
        'affected_rows'     => $affected_rows,
        'tA_RepsTowardM'    => $ta_reps_toward_m,
        'tG_Reps_to_master' => $tg_reps_to_master,
      ];
      return $return_array;
    }
    elseif ($ta_reps_toward_m === 'lesson_if_error') {
      $this->transformAssignmentToNextLesson($lesson_id, $ta_reps_toward_m);
    }
    elseif ($ta_reps_toward_m === 'lesson_if_correct') {
      $this->transformAssignmentToNextLesson($lesson_id, $ta_reps_toward_m);
    }
    else {
      trigger_error("Improper call to 'AC updateTaRepsTowardM'", E_USER_ERROR);
    }//end if

  }//end updateTaRepsTowardM()


  /**
   * IncrementErrorsMade.
   *
   * Update field tA_StartRec.
   *
   * @param int $lesson_id
   *   Index of lesson.
   *
   * @return rows_affected
   *   Returns 0 for none or number of rows affected.
   */
  public function incrementErrorsMade($lesson_id) {

    $pdo_connection = $this->connectToDb();
    $row            = $this->getRowByIndexId($lesson_id);
    // Returns array.
    $errors_made = ($row['tA_ErrorsMade'] + 1);
    $errors_made = intval($errors_made);
    $sql = <<<EOD
        UPDATE tAssignments
        SET tA_ErrorsMade=tA_ErrorsMade+1
        WHERE id= . $lesson_id;
EOD;
    $result = $pdo_connection->exec($sql);
    $pdo_connection->close();
    return $rows_affected;

  }//end incrementErrorsMade()


  /**
   * Update field tA_StartRec.
   *
   * @param int $ta_start_rec
   *   The record to change.
   * @param string $student_id
   *   The student.
   * @param int $ta_original_time_stamp
   *   Time record changed.
   *
   * @return result
   *   Returns the count of affected rows.
   */
  public function upDateTaStartRec($ta_start_rec, $student_id, $ta_original_time_stamp) {

    $pdo_connection = $this->connectToDb();
    $sql            = "UPDATE  tAssignments
                        SET     tA_StartRec = '" . $ta_start_rec . "'
                        WHERE   tA_S_ID   = '" . $student_id . "' AND
                        tA_OriginalTimestamp = '" . $ta_original_time_stamp . "'";
    // $string = __LINE__.' $sql = '.$sql."\n\n";
    // fwrite($log_file, $string);.
    $affected_rows   = $pdo_connection->exec($sql);
    // $string = __LINE__.' $affected_rows = '.$affected_rows."\n\n";
    // fwrite($log_file, $string);.
    return $affected_rows;

  }//end upDateTaStartRec()

  /**
   * Sum assigned time.
   *
   * Get the sum of the time assigned from an array of lessons assigned.
   *
   * @param array $lessons_array
   *   All of the lessons assigned to this student.
   *
   * @return result
   *   Returns the sum of all lesson times assigned.
   */
  public function getSumOfAssignedTimeFromArray(array $lessons_array) {

    $sum = 0;
    foreach ($lessons_array as $k => $row) {
      // Sum 'tA_PercentTime' in each row.
      $sum += $row['tA_PercentTime'];
      // This calculates the total for all assignments.
    }

    return $sum;

  }//end getSumOfAssignedTimeFromArray()


  /**
   * Select the student assignments that are ready for administration.
   *
   * From the lesson array select all lessons that are ready.  Should not
   * return post dated lessons.
   *
   * @param string $student_id
   *   The student.
   *
   * @return rows
   *   Returns an array of assignments.
   */
  public function getCurrentStudentAssignmentsInAnArray($student_id) {

    $result         = NULL;
    $pdo_connection = $this->connectToDb();
    // Variable $student_id must never contain spaces.
    trim($student_id);
    // $db_user = 'JimFuqu_jim';
    // $db_password = 'Carbon3';
    // $db_dsn = "mysql:host=mysql507.ixwebhosting.com;dbname=JimFuqu_jlfEDU;";.
    try {
      // Our new PDO Object.
      // $con = new \PDO($db_dsn, $db_user, $db_password);.
      $con = $this->connectToDb();
      // Catch and show the error.
    }
    catch (PDOException $pe) {
      die('Error occurred:' . $pe->getMessage());
    }

    $stmt = $con->prepare('SELECT * FROM tAssignments
                         WHERE tA_S_ID = :student_id && tA_Post_date < UNIX_TIMESTAMP()
                         ORDER BY tA_PercentTime
                         DESC');
    $stmt->bindParam(':student_id', $student_id, \PDO::PARAM_STR, 12);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    /*$stmt = $pdo_connection->prepare('SELECT * FROM tAssignments
    WHERE tA_S_ID = :student_id && tA_Post_date < UNIX_TIMESTAMP()
    ORDER BY tA_PercentTime
    DESC');
    $stmt->bindParam(':student_id', $student_id, \PDO::PARAM_STR, 12);
    $stmt->execute();*/

    // Eliminate duplicate numberic keys.
    foreach ($rows as $key => $value) {
      foreach ($value as $key2 => $single_assignment) {
        if (is_numeric($key2) === TRUE) {
          unset($rows[$key][$key2]);
        }
      }
    }

    // $v = var_export($rows, true);
    // $string = __LINE__.' AC $rows = '.$v."\n\n";
    // fwrite($log_file, $string);.
    return $rows;

  }//end getCurrentStudentAssignmentsInAnArray()


  /**
   * RepairRowIfStartRecIsLlargerThanStopRec.
   *
   * StartRec should be less than or equal to StopRec.
   * Fix it if this is not TRUE.
   *
   * @param string $student_id
   *   The source of the lessons.
   *   The source of the lessons.
   * @param string $tg_assignment_name
   *   The assignment to do.
   * @param int $ta_start_rec
   *   The assignment start position.
   *
   * @return return_array or NULL
   *   Returns null or an array of lessons.
   */
  public function repairRowIfStartRecIsLargerThanStopRec($student_id, $tg_assignment_name, $ta_start_rec) {

    $current_row = $this->getSpecificStudentAssignmentFromDbAsArray(
          $student_id,
          $tg_assignment_name,
          $ta_start_rec
      );

    $return_array = array();
    if ($current_row === NULL) {
      $return_array['NULL_input'] = TRUE;
    }

    if (array_key_exists('NULL_input', $return_array) === FALSE) {
      if ($ta_start_rec > $current_row['tA_StopRec']) {
        $return_array['tA_StartRecWasGreater'] = TRUE;
        // Update the tAssignment row by adding a new row based upon
        // the gA and deleting the current row.
        // Get tG_Lesson_if_Correct in this assignment's tG_AssignmentName.
        // Get the name of the next lesson which is tG_Lesson_if_Correct
        // column in the current tG_AssignmentName.
        $class_instance = new GenericAClass();
        // Get the row of the current lesson's tG_AssignmentName
        // Then get the name of the new gA.
        // Then get the row of the new gA.
        $this_ga_name = $class_instance->getRowFromDbAsArray(
              $current_row['tG_AssignmentName']
          );
        $next_ganame = $this_ga_name['tG_Lesson_if_Correct'];
        // This is the name of the next gA.
        $next_ga = $class_instance->getRowFromDbAsArray($next_ganame);
        // Now we replace the current tA row with a new tA row with the new gA.
        $x         = $current_row['tA_StudentName'];
        $pram_array = array(
          // For a new tA row.
          'tA_S_ID'                => $student_id,
          'tA_StudentName'         => $current_row['tA_StudentName'],
          'tG_AssignmentName'      => $next_ga['tG_AssignmentName'],
          'tA_Consecutive_Reps_OK' => 'tA_Consecutive_Reps_OK',
          'tA_StartRec'            => $next_ga['tG_StartRec'],
          'tA_StopRec'             => $next_ga['tG_StopRec'],
          'tA_Immediate_Loops'     => $next_ga['tG_Immediate_Loops'],
          'tG_Reps_to_master'      => $next_ga['tG_Reps_to_master'],
          'tA_RepsTowardM'         => '0',
          'tA_ErrorsMade'          => '0',
          'tA_PercentTime'         => $current_row['tA_PercentTime'],
          'tA_SumPercent'          => '0',
          'tA_QueOrder'            => $current_row['tA_QueOrder'],
          'tA_SavedAssignment'     => '',
          'tA_SavedStartRec'       => '',
          'tA_Post_date'           => '',
          'tA_iterations_to_do'    => '',
          'tG_Errors_Allowed '     => '',
        );
        $result = $this->insertRecord($pram_array);
        // FALSE for failure or TRUE for success.
        $return_array['tA_subsequentAssignmentInserted'] = TRUE;
        // Now delete the current assignment.
        $row = $this->getSpecificStudentAssignmentFromDbAsArray(
              $student_id,
              $tg_assignment_name,
              $ta_start_rec
          );

        if ($result === 1) {
          $return_array['tA_ErroneousAssignmentDeleted'] = TRUE;
        }
        else {
          $return_array['tA_ErroneousAssignmentDeleted'] = FALSE;
        }
      }
      else {
        $return_array['tA_StartRecWasGreater'] = FALSE;
      }//end if
    }//end if

    return $return_array;

  }/**
    * End repairRowIfStartRecIsLargerThanStopRec().
    */
  public function removeLastLessonFromArrayIfRequired(array $lesson_array) {

    // Variable $lesson_array is an array of arrays.
    // The interior arrays are specific assignments.
    if (count($lesson_array) > 0) {
      // Remove last lesson  and duplicates of last lesson if
      // tA_Consequtive_Reps_OK = 0  -- In MySQL 0 is FALSE.
      $remove_last_assignment_from_result_array = TRUE;
      while ($remove_last_assignment_from_result_array === TRUE) {
        $remove_last_assignment_from_result_array = FALSE;
        // Limit to one pass unless last lesson was removed.
        foreach ($lesson_array as $k1 => $assignment_fields) {
          if (($assignment_fields['tG_AssignmentName'] === $tg_assignment_name)
                && ($assignment_fields['tA_StartRec'] === $ta_start_rec)
            ) {
            unset($lesson_array[$k1]);
            $remove_last_assignment_from_result_array = TRUE;
            // Make one more pass.
          }
        }//end foreach
      }//end while
    }

    return $lesson_array;

  }//end removeLastLessonFromArrayIfRequired()


  /**
   * Compare two numbers.
   *
   * Compare two numbers and return a number indicating which is larger.
   *
   * @param int $x
   *   The first of two numbers to compare.
   * @param int $y
   *   The second of two numbers to compare.
   *
   * @return key
   *   Returns 0 for identical, -1 for > and 1 for <.
   */
  public function compare($x, $y) {

    if ($x === $y) {
      return 0;
    }
    elseif ($x > $y) {
      return -1;
    }
    else {
      return 1;
    }

  }//end compare()


  /**
   * Normalize array of arrays to sum 100% time assigned.
   *
   * Normalizes the lessons array so that time assigned is 100.
   * Does not change the sum assigned in the database.
   *
   * @param array $lessons_array
   *   The array of lesson arrays.
   *
   * @return lessons_array
   *   Lesson array PercentTime is normalized to 100.
   */
  public function normalizePercentTimeTo100Percent(array $lessons_array) {

    // Run through array calculating the sum of tA_PercentTime assigned.
    // May be more or less than 100%.
    $sum = 0;
    foreach ($lessons_array as $k => $assignment_fields) {
      // Loop through the list of all assignments for this student.
      $sum = ($sum + $assignment_fields['tA_PercentTime']);
    }

    // Variable $sum should now have the total of all the time assigned
    // For each lesson, $sum may be more or less than 100 percent.
    reset($lessons_array);
    $running_sum = 0;
    // The & is necessary or it returns NULL.
    foreach ($lessons_array as $k => &$assignment_fields) {
      // Each field in an individual assignment.
      // normalize this lesson so all assigned PercentTime will total
      // exactly 100%.
      $assignment_fields['tA_PercentTime'] = ($assignment_fields['tA_PercentTime'] * 100 / $sum);
      // Now the tA_PercentTime is normalized.
      // Now let's adjust the sum % time.
      $assignment_fields['tA_SumPercent'] = ($running_sum + $assignment_fields['tA_PercentTime']);
      $running_sum = ($running_sum + $assignment_fields['tA_PercentTime']);
    }

    // Next line sorts the $result_array by using the function compare.
    // Sorts this student's assignments in order of assigned time.
    // The problem is here.  Check if usort handles numbers with decimals.
    // check if array_reverse works.  There does not seem to be a
    // local function by that name.
    return $lessons_array;

  }//end normalizePercentTimeTo100Percent()


  /**
   * Select a lesson.
   *
   * From the array of lessons select an individual lesson.
   *
   * @param array $lessons_array
   *   The source of the lessons.
   * @param string $last_lesson_id
   *   Identifies the previous lesson.
   *
   * @return assignment_fields
   *   Return
   */
  public function selectOneLesson(array $lessons_array, $last_lesson_id) {

    if (count($lessons_array) === 0) {
      // Count must be at least 1.  Empty not allowed.
      return NULL;
    }//end if

    if (count($lessons_array) === 0) {
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
    $normalized_array = $this->normalizePercentTimeTo100Percent($lessons_array);
    // The $normalized array is an array of all lessons for this
    // student with the time assigned
    // normalized to 100%.  May have started more or less than 100%.
    // Use a the random number to select the lesson based on 100%.
    // Pick a random integer between 1 and 100000.
    // Divide by 100000 minimize chance of boundary of 1 or 100.
    $target_percent = mt_rand(1, 100000);
    if ($target_percent === 0) {
      // Avoid 0%.
      $target_percent = 1;
    }//end if
    if ($target_percent === 100000) {
      // Avoid 100%.
      $target_percent = 99999;
    }//end if
    $target_percent = ($target_percent / 1000);
    // Same as dividing by 100000 then multiplying by 100 to get %;
    // Cycle through each of the student's assignments and select
    // the first assignment where tA_SumPercent is less than or =
    // to $target_percent.
    foreach ($normalized_array as $assignment_fields) {
      // Loop thru all assignments.
      if ($target_percent <= $assignment_fields['tA_SumPercent']) {
        // Found the assignment.
        return $assignment_fields;
      }
    }

  }//end selectOneLesson()


  /**
   * Return NULL.
   *
   * Check to see if a variable is NULL.  If so return "NULL".
   *
   * @param string $varable
   *   The variable to check..
   *
   * @return Variable
   *   Returns the input variable or "NULL" string.
   */
  public function printNullIfNull($varable) {

    if ($varable === NULL) {
      return 'NULL';
    }
    else {
      return $varable;
    }

  }//end printNullIfNull()


  /**
   * Insert a single split in tA.
   *
   * Take one tA split assignment and read the tSplit it refers to.
   * Then insert into tA new assignments specified by the tSplits.
   *
   * @param string $one_ta_assignment_split
   *   The split to process.
   */
  public function insertTaSplitIntoTa($one_ta_assignment_split) {
    // Must get an array of the splits.
    // Make assignments of them  and insert the
    // assignments into tA.
    $student_name = $one_ta_assignment_split[0]['tA_StudentName'];
    $student_id   = $one_ta_assignment_split[0]['tA_S_ID'];
    // This assignment should be a split.
    if (substr($one_ta_assignment_split[0]['tG_AssignmentName'], 0, 3) === 'tS_') {
      // Now get an array of all of the tSplits with that name.
      // add assignment info not in tSplits.
      $insertion_array = array(
        'tA_StudentName' => $student_name,
        'tA_S_ID'        => $student_id,
      );
      // include_once 'SplitsClass.inc';.
      $splits_class_instance = new SplitsClass();
      // The $splits_array is an array of the relevant tSplits splits with
      // this name.  There may be many.
      $splits_array = $splits_class_instance->getSplitByName(
            $one_ta_assignment_split[0]['tG_AssignmentName']
        );
      // The $splits_array keys are numeric & $values are associative arrays.
      // Keys are id, tS_Name, tS_tA_Parameter, tSplit_gA,
      // tS_gA_Parameter, tSplit_PercentageTime.
      // foreach ($splits_array as $key => $value) {
      // Is an array of arrays.
      // Add field to $insertion_array.
      // $insertion_array['tG_AssignmentName'] = $value['tSplit_gA'];
      // Now insert the content of the insertion_Array into the tA.
      // $result = $this->insertRecord($insertion_array);
      // }
    }//end if

  }//end insertTaSplitIntoTa()


  /**
   * Manage assignments that split..
   *
   * Check assignment array for splits.  A split is designed to split into two
   *  or more assignments and is not an assignment to an individual lesson.
   *  If splits are found modify the database by converting the splits to
   *  multiple individual lesson assignments.  Then delete the split
   *  assignment.
   *
   * @param string $single_assignment_array
   *   One assignment for a student..
   *
   * @return Number_Of_Rows
   *   Count of rows returned.
   */
  public function checkAndProcessSplits($single_assignment_array) {
    if (is_array($single_assignment_array === FALSE)) {
      $data_to_return = 'Error at ' . __LINE__ . 'Ac';
    }

    if (is_array($single_assignment_array) === TRUE) {
      // All of a student's assignments.
      foreach ($single_assignment_array as $key => $single_assignment) {
        $v = var_export($single_assignment, TRUE);
        // An individual assignment array.
        foreach ($single_assignment_array as $key2 => $value) {
          if (is_array($value) === FALSE) {
            $data_to_return = __LINE__ . 'Error AC checkAndProcessSplits';
            break;
          }
          else {
            if (substr($value['tG_AssignmentName'], 0, 3) === 'tS_') {
              $this->insertTaSplitIntoTa($value);
              $data_to_return = TRUE;
            }
            else {
              $data_to_return = FALSE;
            }//end if
          }//end if
        }//end foreach
      }//end foreach
    }

    $data_to_return = NULL;
    return $data_to_return;

  }/**
    * End checkAndProcessSplits().
    */
  public function removeNumericKeys(array $input_array) {

    foreach ($input_array as $key => $single_assignment) {
      if (is_numeric($key) === TRUE) {
        unset($input_array[$key]);
      }
    }

  }//end removeNumericKeys()


  /**
   * Gets the next lesson for a student.
   *
   * Find the identified student's next lesson.
   *
   * @param string $student_id
   *   Identifies the student who will do the next lesson.
   * @param string $last_lesson_id
   *   Make sure lesson is not repeated unles OK.
   *
   * @return Number_Of_Rows
   *    Row count.
   */
  public function getNextAssignmentToDo($student_id, $last_lesson_id) {
    do {
      // End is while ($looking_for_lesson === TRUE).
      // Must resolve all splits before can process results.
      $looking_for_lesson = FALSE;
      // Get an array of arrays. Numeric outer. Relational inner.
      $result_array = $this->getCurrentStudentAssignmentsInAnArray($student_id);
      // Variable $result_array is an array of arrays.
      // $v = var_export($result_array, true);
      // $string = __LINE__.' AC $result_array = '.$v."\n\n";
      // fwrite($log_file, $string);.
      if ($result_array === NULL) {
        // This student has no lessons.
        return NULL;
      }
      else {
        // NOT NULL.
        foreach ($result_array as $key => $single_assignment) {
          // Verified above line sends a single assignment 10Jan15
          // Next command may modify the database.
          // Should return TRUE if it did.
          $result = FALSE;
          $result = $this->checkAndProcessSplits($single_assignment);
          if ($result === TRUE) {
            // Must go around again because a split may contain a split.
            $looking_for_lesson = TRUE;
          }
          else {
            $looking_for_lesson = FALSE;
          }
        }//end foreach
      }//end if
    } while ($looking_for_lesson === TRUE);
    reset($result_array);
    // $v = var_export($result_array, true);
    // $string = __LINE__.' AC $result_array = '.$v."\n\n";
    // fwrite($log_file, $string);.
    if (count($result_array) > 0) {
      // Takes an array of lessons and returns a lesson id.
      $lesson = $this->selectOneLesson($result_array, $last_lesson_id);
      // Should always return array but does not sometimes.
      $str = __LINE__ . ' AC   count($result_array) = ' . count($result_array) . "\n";
      // $v = var_export($lesson, true);
      // $string = __LINE__.' AC $lesson = '.$v."\n\n";
      // fwrite($log_file, $string);.
      return $lesson;
    }
    else {
      return "error";
    }

  }//end getNextAssignmentToDo()

}//end class

$test = new AssignmentsClass();
