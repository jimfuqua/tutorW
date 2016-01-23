<?php
/**
 * GenericAClass File Doc Comment
 * File GenericAClass, Base class for utilizing the tGenericAssignments MySQL table.
 *
 * PHP versions 5
 *
 * @package    Tutor
 * @subpackage GenericAClass
 * @author     Jim Fuqua <jimfuqua@gmail.com>
 * @copyright  Jim Fuqua 2010
 * @category   Manipulates_Db
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
 * @license    GPL v 3
 * @version    SVN: <svn_id>
 * @link       http://wwww.jim-fuqua.com
 */

namespace tutor\src\classes;

/*
    ToDo:
    1.   Add docbook type comments to each function and internal comments in
         each function.
    See SimpleTest 'GenericA_class_simpletest.php' in 'test' folder
    for more documentation.
*/

$require_path = "/hsphere/local/home/jimfuqua/jim-fuqua.com/tutorW";
//require_once $require_path . '/src/classes/AssignmentsClass.inc';
$url = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$url);
$dir = $_SERVER['SERVER_NAME'];
for ($i = 0; $i < count($parts) - 1; $i++) {
 $dir .= $parts[$i] . "/";
}
//echo '$url = '.$url . "<br/>";
//echo '$dir = '.$dir . "<br/>";
//echo get_include_path () . "<br/>";
require '../../src/classes/db_include.php';
require '../../src/classes/generalDbFunctions.php';
require '../../src/classes/GeneralClassFunctions.php';

/**
 *  Take data from a Generic Assignments are the root or basic assignments.
 *  This class manipulates the tGenericAssignments table in MySQL.
 */
class GenericAClass
{

/**
 *  Set session variables from Generic assignment..
 *
 * Retrieve a row from tGentericAssignments and set session variables.
 *
 * @param string $tG_AssignmentName From tAssignments.
 *
 * @return void
 */
public function setSessionVariablesFromTGAssignmentName($tG_AssignmentName)
{
    $logFile = fopen('../../logs/cAssignment_get_next_lesson_set_gA_variables.log', 'a');
    fwrite($logFile, __LINE__.' microtime(TRUE) = '.microtime(TRUE)."\n\n");
    $string = "\n".__LINE__.' $tG_AssignmentName = '.$tG_AssignmentName."\n";
    fwrite($logFile, $string);
    // Get the tG_Assignment data based upon lesson selected.
    $NextLesson = new GenericAClass;
    fwrite($logFile, __LINE__.' microtime(TRUE) = '.microtime(TRUE)."\n\n");
    $lesson = $NextLesson->getRowFromDbAsArray($tG_AssignmentName);
    $v      = var_export($lesson, TRUE);
    $string = "\n".__LINE__.' $lesson = '.$v."\n\n";
    fwrite($logFile, $string."\n");
    fwrite($logFile, __LINE__.' microtime(TRUE) = '.microtime(TRUE)."\n\n");
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

}//end setSessionVariablesFromTGAssignmentName()

    /**
     *  Select a lesson.
     *
     * From the lesson array select an individual lesson.
     *
     * @return void
     */
    private function _logMyMethods()
    {
        $genericAClassSample = new GenericAClass();
        $classMethods        = get_class_methods($genericAClassSample);
        // Creates an array.
        foreach ($classMethods as $methodName) {
            fwrite($logFile, $methodName."\n");
        }

    }//end _logMyMethods()


    /**
     *  Prepare sql for update..
     *
     *  Connact to a mySQL database.
     *
     * @param array $myArray An array of parameters.
     *
     * @return string.
     */
    private function _arrayToSqlUpdate(array $myArray)
    {
        $sql = 'UPDATE tGenericAssignments SET ';
        foreach ($myArray as $key => $value) {
            if ($key === 'id') {
                $id = $value;
            } else {
                $sql = trim($sql).' '.trim($key);
                $sql = $sql."='".trim($value)."',";
            }
        }

        // Remove trailing comma.
        $sql = rtrim($sql, ',');
        $sql = $sql.' WHERE ';
        $sql = $sql."id='".$id."'";
        return $sql;

    }//end _arrayToSqlUpdate()


    /**
     *  Connect to database.
     *
     *  Connact to a mySQL database.
     *
     * @return connection
     */
    private function _connectToDb()
    {
        require '../../src/classes/db_include.php';
        try {
            $con = new \PDO('mysql:host=mysql507.ixwebhosting.com;dbname=JimFuqu_jlfEDU', 'JimFuqu_jim', 'Carbon3');
            // Our new PDO Object.
        } catch (PDOException $e) {
              echo $e->getMessage();
              $logFile = fopen('/var/www/jimfuqua/tutor/logs/SplitsClass.php.log', 'w');
              $string  = __LINE__.' PDOException = '.$e->getMessage();
              fwrite($logFile, $string."\n");
        }

        return $con;

    }//end _connectToDb()


    /**
     *  Array to database table row.
     *
     * Take an array and insert it into tGenericAssignment
     *
     * @param array $paramArray An array of parameters.
     *
     * @return string Count of number of rows added. Should be 1.
     */
    public function insertRecord(array $paramArray)
    {
        $PDO_connection = $this->_connectToDb();
        $sql            = GCFarrayToSQLstring('tGenericAssignments', $paramArray);
        $count          = $PDO_connection->exec($sql);
        $PDO_connection = NULL;
        return $count;

    }//end insertRecord()


    /**
     *  Array of changes to existing database table row.
     *
     * Take an array and insert it into an existing row.
     *
     * @param array $pramArray An array of parameters.
     *
     * @return string
     */
    public function editRow(array $pramArray)
    {
        $sql            = $this->_arrayToSqlUpdate($pramArray);
        $PDO_connection = $this->_connectToDb();
        $query          = $PDO_connection->exec($sql);
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
     **/
    public function testAccessibilityOfAllForms()
    {
        $logFile = fopen('/var/www/jimfuqua/tutor/logs/testAccessibilityOfAllForms.log', 'w');
        $string  = "\n".'testAccessibilityOfAllForms'."\n";
        fwrite($logFile, $string);
        $PDO_connection = $this->_connectToDb();
        $sql            = 'SELECT id, tG_AssignmentName, tG_path_to_lesson, tG_FormName FROM tGenericAssignments';
        $result         = $PDO_connection->exec($sql);
        $v      = var_export($result, TRUE);
        $string = "\n".'$result = '.$v."\n";
        fwrite($logFile, $string);
        // Put $result in an array.
        $stmt = $PDO_connection->query($sql);
        $numberOfGAssignments = count($row);
        $returnArray          = NULL;
        $index = 0;
        // Now itterate through $row checking if lesson exists.
        foreach ($row as $key => $value) {
            $lessonPath   = $value['tG_path_to_lesson'];
            $lesson       = $value['tG_FormName'];
            $searchString = $lessonPath.$lesson;
            $searchString = '/var/www'.$searchString;
            $ok           = file_exists($searchString);
            if ($ok === FALSE) {
                $returnArray[$index]    = array();
                $returnArray[$index][0] = $ok;
                $returnArray[$index][1] = $value;
            }
        }

            return $returnArray;

    }//end testAccessibilityOfAllForms()


     /**
      *  Get the last row in tGenericAssignments.
      *
      * Returns last row without keys.  Access the data with numeric keys.
      *
      * @return string
      */
    public function getLastDbEntryAsArray()
    {
        $PDO_connection = $this->_connectToDb();
        $sql            = 'SELECT * FROM tGenericAssignments ORDER BY id DESC LIMIT 1';
        $stmt           = $PDO_connection->query($sql);
        $row            = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row;

    }//end getLastDbEntryAsArray()


     /**
      *  Pick a row from tGenericAssignment by its name.
      *
      * Supply name get row.
      *
      * @param string $tGAssignmentName A string that identifies the name
      *   of an assignment..
      *
      * @return array
      */
    public function getRowFromDbAsArray($tGAssignmentName)
    {
        $PDO_connection = $this->_connectToDb();
        $sql            = "SELECT * FROM tGenericAssignments WHERE (tG_AssignmentName='".$tGAssignmentName."')";
        $stmt           = $PDO_connection->query($sql);
        $row            = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row;

    }//end getRowFromDbAsArray()


     /**
      *  Get all GenericAssgignment names.
      *
      * Get all the tGenericAssignment names and put them in json format.
      *
      * @return object.
      */
    public function getAllGenericAssgignmentNamesFromDbJson()
    {
        $PDO_connection = $this->_connectToDb();
        $sql            = 'SELECT tG_AssignmentName FROM tGenericAssignments ORDER BY id DESC';
        $stmt           = $PDO_connection->query($sql);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        $obj = json_encode($row);
        return $obj;

    }//end getAllGenericAssgignmentNamesFromDbJson()


    /**
     *  Get all assignment names from tGenericAssignements.
     *
     * Get assignement names.
     *
     * @return array
     */
    public function getAllAssignmentNamesFromDbArray()
    {
        $PDO_connection = $this->_connectToDb();
                $sql    = 'SELECT * FROM `tGenericAssignments`';
                $stmt   = $PDO_connection->query($sql);
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
     * @param string $alphaFilter Filter for query result.
     *
     * @return array
     */
    public function getGAssignmentNamesFilteredByStartingLettersToJson($alphaFilter)
    {
        $PDO_connection      = $this->_connectToDb();
        $queryFilteredGAdata = "SELECT * FROM tGenericAssignments
                WHERE locate('".$alphaFilter."',tG_AssignmentName,'1')!= 0 ";
        $result = $PDO_connection->exec($queryFilteredGAdata);
        $index  = 0;
        while ($result) {
            $index++;
            if ($row['id'] > 0) {
                $rowArray[$index]['id'] = $row['id'];
                $rowArray[$index]['tG_AssignmentName']
                    = $row['tG_AssignmentName'];
            }
        }

        if (isset($rowArray) === TRUE) {
            if ($index > 0) {
                $ret = json_encode($rowArray);
                return $ret;
            }
        } else {
            return NULL;
        }

    }//end getGAssignmentNamesFilteredByStartingLettersToJson()


    /**
     *  Delete last assignement with specified name.
     *
     * Supply name delete last row with that name.
     *
     * @return array
     */
    public function deleteLastRowInserted()
    {
        $PDO_connection = $this->_connectToDb();
        $sql            = 'SELECT id FROM tGenericAssignments ORDER BY id DESC LIMIT 1';
        $stmt           = $PDO_connection->query($sql);
        $row            = $stmt->fetch(\PDO::FETCH_ASSOC);
        $sql            = "DELETE FROM tGenericAssignments
                WHERE ( id ='".$row['id']."' ) LIMIT 1";
        $count          = $PDO_connection->exec($sql);
        $return_value   = $count;
        return $return_value;

    }//end deleteLastRowInserted()


    /**
     *   Deletes all rows with the specified assignment name.
     *
     * Supply name delete row..
     *
     * @param string $tGAssignmentName A string that identifies the
     * name of an assignment..
     *
     * @return array
     */
    public function deleteRowsNamed($tGAssignmentName)
    {
        $PDO_connection = $this->_connectToDb();
        $sql            = "DELETE FROM tGenericAssignments
                WHERE ( tG_AssignmentName = '".$tGAssignmentName."' )";
        $result         = $PDO_connection->exec($sql);
        return $result;

    }//end deleteRowsNamed()


    /**
     *   Make JSON list of all generic assignments.
     *
     * @return JSON
     */
    public function getAllAssignmentNamesToJSON()
    {
        $PDO_connection = $this->_connectToDb();
        $sql            = 'SELECT tG_AssignmentName FROM tGenericAssignments ORDER BY id DESC';
        $stmt           = $PDO_connection->query($sql);
        $row            = $stmt->fetch(\PDO::FETCH_ASSOC);
        $jsonEncodedArray = json_encode($row);
        return $jsonEncodedArray;

    }//end getAllAssignmentNamesToJSON()


    /**
     *  Delete row with specified id.
     *
     * Supply id delete row with that id.
     *
     * @param string $tGid A string that identifies the id
     * of an assignment..
     *
     * @return number of rows deleted or -1 on error.
     */
    public function deleteRowById($tGid)
    {
        if ($tGid === TRUE) {
            $tGid = 1;
        }

        $PDO_connection = $this->_connectToDb();
        $sql            = "DELETE FROM tGenericAssignments WHERE ( id ='".$tGid."' ) LIMIT 1";
        $count          = $PDO_connection->exec($sql);
        $PDO_connection = NULL;
        return $count;

    }//end deleteRowById()


     /**
      *  Pick a row from tGenericAssignment by its id.
      *
      * Supply id get row.
      *
      * @param string $id A string that identifies the name of an assignment.
      *
      * @return row as an array or ? if no row exists with that id.
      */
    public function getRowFromDbAsArrayById($id)
    {
        $PDO_connection = $this->_connectToDb();
        $sql            = "SELECT * FROM tGenericAssignments WHERE (id ='".$id."')";
        $stmt           = $PDO_connection->query($sql);
        $row            = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row;

    }//end getRowFromDbAsArrayById()


}//end class
