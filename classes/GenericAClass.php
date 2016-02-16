<?php
/**
 * @file
 * File GenericAClass, Base class for MySQL table tG_Assignments.
 *
 * PHP versions 5
 *
 * @package Tutor
 *
 * @subpackage GenericAClass
 *
 * @author Jim Fuqua <jimfuqua@gmail.com>
 *
 * @copyright Jim Fuqua 2010
 *
 * @category Manipulates_Db
 *
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @license GPL v 3
 *
 * @version SVN: <svn_id>
 * @link http://wwww.jim-fuqua.com
 */

namespace jimfuqua\tutorW;

/*
ToDo:
1.   Add docbook type comments to each function and internal comments in
each function.
See SimpleTest 'GenericA_class_simpletest.php' in 'test' folder
for more documentation.
 */

// returns the current URL.
//$url = $_SERVER['REQUEST_URI'];
//$parts = explode('/', $url);
//$dir = $_SERVER['SERVER_NAME'];
//for ($i = 0; $i < count($parts) - 1; $i++) {
//  $dir .= $parts[$i] . "/";
//}
require 'db_include2.php';
require 'generalDbFunctions.php';
require 'GeneralClassFunctions.php';

/**
 * Generic Assignments are the root or basic assignments.
 *
 *  This class manipulates the tGenericAssignments table in MySQL. This
 *  table is associated with lessons.  Not student.
 */
class GenericAClass {

  /**
   * The constructor. Operates on instantination.
   */
  public function __construct() {

    //echo "I am a GenericAClass instance.<br/>";
  }

  /**
   * Set session variables from Generic assignment..
   *
   * Retrieve a row from tGentericAssignments and set session variables.
   *
   * @param string $tg_assignment_name
   *   From tAssignments.
   */
  public function setSessionVariablesFromTblGenerAssignmentName($tg_assignment_name) {

    $log_file = fopen('../logs/cAssignment_get_next_lesson_set_gA_variables.log', 'a');
    fwrite($log_file, __LINE__ . ' microtime(TRUE) = ' . microtime(TRUE) . "\n\n");
    $string = "\n" . __LINE__ . ' $tg_assignment_name = ' . $tg_assignment_name . "\n";
    fwrite($log_file, $string);
    // Get the tG_Assignment data based upon lesson selected.
    $next_lesson = new GenericAClass();
    fwrite($log_file, __LINE__ . ' microtime(TRUE) = ' . microtime(TRUE) . "\n\n");
    $lesson = $next_lesson->getRowFromDbAsArray($tg_assignment_name);
    $v      = var_export($lesson, TRUE);
    $string = "\n" . __LINE__ . ' $lesson = ' . $v . "\n\n";
    fwrite($log_file, $string . "\n");
    fwrite($log_file, __LINE__ . ' microtime(TRUE) = ' . microtime(TRUE) . "\n\n");
    if ($lesson === NULL) {
      trigger_error($string, E_USER_ERROR);
    }

    $_SESSION['tG_StartStop']      = $lesson['tG_StartStop'];
    $_SESSION['tG_Split']          = $lesson['tG_Split'];
    $_SESSION['tG_ThreadName']     = $lesson['tG_ThreadName'];
    $_SESSION['tG_AssignmentName'] = $lesson['tG_AssignmentName'];
    $_SESSION['tG_path_to_lesson'] = $lesson['tG_path_to_lesson'];
    $_SESSION['tG_FormName']       = $lesson['tG_FormName'];
    $_SESSION['tG_DataFile']       = $lesson['tG_DataFile'];
    $_SESSION['tG_Parameters']     = $lesson['tG_Parameters'];
    $_SESSION['tG_Consequtive_Reps_OK']     = $lesson['tG_Consequtive_Reps_OK'];
    $_SESSION['tG_Reps_to_master']          = $lesson['tG_Reps_to_master'];
    $_SESSION['tG_Errors_Allowed']          = $lesson['tG_Errors_Allowed'];
    $_SESSION['tG_Minimum_completion_time'] = $lesson['tG_Minimum_completion_time'];
    $_SESSION['tG_Maximum_completion_time'] = $lesson['tG_Maximum_completion_time'];
    $_SESSION['tG_StartRec']          = $lesson['tG_StartRec'];
    $_SESSION['tG_StopRec']           = $lesson['tG_StopRec'];
    $_SESSION['tG_Immediate_Loops']   = $lesson['tG_Immediate_Loops'];
    $_SESSION['tG_RepsPerRecord']     = $lesson['tG_RepsPerRecord'];
    $_SESSION['tG_RecordsPerSet']     = $lesson['tG_RecordsPerSet'];
    $_SESSION['tG_Lesson_if_Correct'] = $lesson['tG_Lesson_if_Correct'];
    $_SESSION['tG_Record_if_Correct'] = $lesson['tG_Record_if_Correct'];
    $_SESSION['tG_Lesson_if_Error']   = $lesson['tG_Lesson_if_Error'];
    $_SESSION['tG_Record_if_Error']   = $lesson['tG_Record_if_Error'];

  }//end setSessionVariablesFromTblGenerAssignmentName()

  /**
   * Select a lesson.
   *
   * From the lesson array select an individual lesson.
   */
  private function logMyMethods() {

    $generic_ass_class_sample = new GenericAClass();
    $class_methods        = get_class_methods($generic_ass_class_sample);
    // Creates an array.
    foreach ($class_methods as $method_name) {
      fwrite($log_file, $method_name . "\n");
    }

  }//end logMyMethods()


  /**
   * Prepare sql for update..
   *
   *  Connact to a mySQL database.
   *
   * @param array $my_array
   *   An array of parameters.
   *
   * @return string.
   *   Returns a sql string.
   */
  private function arrToSqlUpdate(array $my_array) {

    $sql = 'UPDATE tGenericAssignments SET ';
    foreach ($my_array as $key => $value) {
      if ($key === 'id') {
        $id = $value;
      }
      else {
        $sql = trim($sql) . ' ' . trim($key);
        $sql = $sql . "='" . trim($value) . "',";
      }
    }

    // Remove trailing comma.
    $sql = rtrim($sql, ',');
    $sql = $sql . ' WHERE ';
    $sql = $sql . "id='" . $id . "'";
    return $sql;

  }//end arrToSqlUpdate()


  /**
   * Connect to database.
   *
   *  Connact to a mySQL database.
   *
   * @return connection
   *   PDO connection object.
   */
  private function connectToDb() {

    require 'db_include2.php';
    try {
      $con = new \PDO('mysql:host=mysql507.ixwebhosting.com;dbname=JimFuqu_jlfEDU', 'JimFuqu_jim', 'Carbon3');
      // Our new PDO Object.
    }
    catch (PDOException $e) {
      echo $e->getMessage();
      $log_file = fopen('/var/www/jimfuqua/tutor/logs/SplitsClass.php.log', 'w');
      $string  = __LINE__ . ' PDOException = ' . $e->getMessage();
      fwrite($log_file, $string . "\n");
    }

    return $con;

  }//end connectToDb()


  /**
   * Array to database table row.
   *
   * Take an array and insert it into tGenericAssignment.
   *
   * @param array $param_array
   *   An array of parameters.
   *
   * @return int
   *   Count of number of rows added. Should be 1.
   */
  public function insertRecord(array $param_array) {

    $pdo_connection = $this->connectToDb();
    $sql            = GCFarrayToSQLstring('tGenericAssignments', $param_array);
    $count          = $pdo_connection->exec($sql);
    $pdo_connection = NULL;
    return $count;

  }//end insertRecord()


  /**
   * Array of changes to existing database table row.
   *
   * Take an array and insert it into an existing row.
   *
   * @param array $pram_array
   *   An array of parameters.
   *
   * @return boolval
   *   Should return true.
   */
  public function editRow(array $pram_array) {

    $sql            = $this->arrToSqlUpdate($pram_array);
    $pdo_connection = $this->connectToDb();
    $query          = $pdo_connection->exec($sql);
    if ($query === NULL) {
      return FALSE;
    }

    // Return should be TRUE.
    return $query;

  }//end editRow()


  /**
   * See if the lesson exists and is accessible.
   *
   * Check to see if the lesson is availabe at the path specified.
   * Do this for every lesson.
   * Return array -
   *   [0] total number of lessons.
   *   [1] TRUE if yes and FALSE if no.
   *   [2] An array containing the lesson ids of lessons with
   *       inaccessable lesson files.
   *
   * @return array
   *   Checks to see if files exist for all lessons.
   */
  public function testAccessibilityOfAllForms() {

    $log_file = fopen('/var/www/jimfuqua/tutor/logs/testAccessibilityOfAllForms.log', 'w');
    $string  = "\n" . 'testAccessibilityOfAllForms' . "\n";
    fwrite($log_file, $string);
    $pdo_connection = $this->connectToDb();
    $sql            = 'SELECT id, tG_AssignmentName, tG_path_to_lesson, tG_FormName FROM tGenericAssignments';
    $result         = $pdo_connection->exec($sql);
    $v      = var_export($result, TRUE);
    $string = "\n" . '$result = ' . $v . "\n";
    fwrite($log_file, $string);
    // Put $result in an array.
    $stmt = $pdo_connection->query($sql);
    $number_of_gener_assignments = count($row);
    $return_array          = NULL;
    $index = 0;
    // Now itterate through $row checking if lesson exists.
    foreach ($row as $key => $value) {
      $lesson_path   = $value['tG_path_to_lesson'];
      $lesson       = $value['tG_FormName'];
      $search_string = $lesson_path . $lesson;
      $search_string = '/var/www' . $search_string;
      $ok           = file_exists($search_string);
      if ($ok === FALSE) {
        $return_array[$index]    = array();
        $return_array[$index][0] = $ok;
        $return_array[$index][1] = $value;
      }
    }

    return $return_array;

  }//end testAccessibilityOfAllForms()


  /**
   * Get the last row in tGenericAssignments.
   *
   * Returns last row without keys.  Access the data with numeric keys.
   *
   * @return array
   *   Returns a row as an array.
   */
  public function getLastDbEntryAsArray() {

    $pdo_connection = $this->connectToDb();
    $sql            = 'SELECT * FROM tGenericAssignments ORDER BY id DESC LIMIT 1';
    $stmt           = $pdo_connection->query($sql);
    $row            = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $row;

  }//end getLastDbEntryAsArray()


  /**
   * Pick a row from tGenericAssignment by its name.
   *
   * Supply name get row.
   *
   * @param string $t_g_assignment_name
   *   A string that identifies the name
   *   of an assignment..
   *
   * @return array
   *   row as an array
   */
  public function getRowFromDbAsArray($t_g_assignment_name) {

    $pdo_connection = $this->connectToDb();
    $sql            = "SELECT * FROM tGenericAssignments WHERE (tG_AssignmentName='" . $t_g_assignment_name . "')";
    $stmt           = $pdo_connection->query($sql);
    $row            = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $row;

  }//end getRowFromDbAsArray()


  /**
   * Get all GenericAssgignment names.
   *
   * Get all the tGenericAssignment names and put them in json format.
   *
   * @return array.
   *   json
   */
  public function getAllGenericAssgignmentNamesFromDbJson() {

    $pdo_connection = $this->connectToDb();
    $sql            = 'SELECT tG_AssignmentName FROM tGenericAssignments ORDER BY id DESC';
    $stmt           = $pdo_connection->query($sql);
    $row = $stmt->fetch(\PDO::FETCH_ASSOC);
    $obj = json_encode($row);
    return $obj;

  }//end getAllGenericAssgignmentNamesFromDbJson()


  /**
   * Get all assignment names from tGenericAssignements.
   *
   * Get assignement names.
   *
   * @return array
   *   Returns a double indexed array.
   */
  public function getAllAssignmentNamesFromDbArray() {

    $pdo_connection = $this->connectToDb();
    $sql    = 'SELECT * FROM `tGenericAssignments`';
    $stmt   = $pdo_connection->query($sql);
    $rows   = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $i     = 0;
    $names = [];
    foreach ($rows as $items) {
      $names[$i] = $rows[$i]['tG_AssignmentName'];
      $i++;
    }

    return $names;

  }//end getAllAssignmentNamesFromDbArray()


  /**
   * Get alpha filtered assignment from tGenericAssignements.
   *
   * Get assignements filtered by the fourth character in the
   * tG_AssignmentName.
   *
   * @param string $alpha_filter
   *   Filter for query result.
   *
   * @return array
   *   json array of rows
   */
  public function getGerAssignmentNamesFilteredByStartingLettersToJson($alpha_filter) {

    $pdo_connection      = $this->connectToDb();
    $query_filtered_tga_data = "SELECT * FROM tGenericAssignments
                WHERE locate('" . $alpha_filter . "',tG_AssignmentName,'1')!= 0 ";
    $result = $pdo_connection->exec($query_filtered_tga_data);
    $index  = 0;
    while ($result) {
      $index++;
      if ($row['id'] > 0) {
        $array_of_rows[$index]['id'] = $row['id'];
        $array_of_rows[$index]['tG_AssignmentName']
          = $row['tG_AssignmentName'];
      }
    }

    if (isset($array_of_rows) === TRUE) {
      if ($index > 0) {
        $ret = json_encode($array_of_rows);
        return $ret;
      }
    }
    else {
      return NULL;
    }

  }//end getGerAssignmentNamesFilteredByStartingLettersToJson()


  /**
   * Delete last assignement with specified name.
   *
   * Supply name delete last row with that name.
   *
   * @return array
   *    Count of rows deleted.
   */
  public function deleteLastRowInserted() {

    $pdo_connection = $this->connectToDb();
    $sql            = 'SELECT id FROM tGenericAssignments ORDER BY id DESC LIMIT 1';
    $stmt           = $pdo_connection->query($sql);
    $row            = $stmt->fetch(\PDO::FETCH_ASSOC);
    $sql            = "DELETE FROM tGenericAssignments
                WHERE ( id ='" . $row['id'] . "' ) LIMIT 1";
    $count          = $pdo_connection->exec($sql);
    $return_value   = $count;
    return $return_value;

  }//end deleteLastRowInserted()


  /**
   * Deletes all rows with the specified assignment name.
   *
   * Supply name delete row..
   *
   * @param string $t_g_assignment_name
   *   A string that identifies the
   *   name of an assignment..
   *
   * @return int
   *   rows deleted.
   */
  public function deleteRowsNamed($t_g_assignment_name) {

    $pdo_connection = $this->connectToDb();
    $sql            = "DELETE FROM tGenericAssignments
                WHERE ( tG_AssignmentName = '" . $t_g_assignment_name . "' )";
    $result         = $pdo_connection->exec($sql);
    return $result;

  }//end deleteRowsNamed()


  /**
   * Make JSON list of all generic assignments.
   *
   * @return string
   *   Json list.
   */
  public function getAllAssignmentNamesToJson() {

    $pdo_connection = $this->connectToDb();
    $sql            = 'SELECT tG_AssignmentName FROM tGenericAssignments ORDER BY id DESC';
    $stmt           = $pdo_connection->query($sql);
    $row            = $stmt->fetch(\PDO::FETCH_ASSOC);
    $json_encoded_array = json_encode($row);
    return $json_encoded_array;

  }//end getAllAssignmentNamesToJson()


  /**
   * Delete row with specified id.
   *
   * Supply id delete row with that id.
   *
   * @param string $t_g_id
   *   A string that identifies the id
   *   of an assignment..
   *
   * @return int
   *   number of rows deleted or -1 on error.
   */
  public function deleteRowById($t_g_id) {

    if ($t_g_id === TRUE) {
      $t_g_id = 1;
    }

    $pdo_connection = $this->connectToDb();
    $sql            = "DELETE FROM tGenericAssignments WHERE ( id ='" . $t_g_id . "' ) LIMIT 1";
    $count          = $pdo_connection->exec($sql);
    $pdo_connection = NULL;
    return $count;

  }//end deleteRowById()


  /**
   * Pick a row from tGenericAssignment by its id.
   *
   * Supply id get row.
   *
   * @param string $id
   *   A string that identifies the name of an assignment.
   *
   * @return array
   *   row as an array or ? if no row exists with that id.
   */
  public function getRowFromDbAsArrayById($id) {

    $pdo_connection = $this->connectToDb();
    $sql            = "SELECT * FROM tGenericAssignments WHERE (id ='" . $id . "')";
    $stmt           = $pdo_connection->query($sql);
    $row            = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $row;

  }//end getRowFromDbAsArrayById()


}//end class
