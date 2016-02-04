<?php
namespace jimfuqua\tutorW;
//use tutor\src\classes;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**
 * CompletedClass.inc File Doc Comment
 *
 * CompletedClass manipulates MySQL table tAssignments in jlfEDU DB
 *
 * PHP version 5+
 *
 * @package    TutorMio
 * @subpackage Tutor
 * @author     Jim Fuqua <jimfuqua@gmail.com>
 * @copyright  Jim Fuqua 2010
 * @category   Manipulates_Db
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License V3+
 * @link       http://www.jimfuqua.com/
 */

//echo 19;
        /**
         * CompletedClass.php
         **/
class CompletedClass
{

  public function __construct()
  {
      echo "I am a CompletedClass object.<br/>";
  }

    /**
     *    This function takes an array and converts it to a MySQL
     *    insertion query for PHP.
     *
     * @param array $myArray Data for database.
     *
     * @return string $sql The SQL string for use in a query.
     */
    private function _arrayToSQL(array $myArray)
    {
      $sql        = 'INSERT INTO tCompleted (';
        $sql_values = ' ) VALUES ( ';
        foreach ($myArray as $key => $value) {
            $sql        = $sql.$key.', ';
            $sql_values = $sql_values."'".$value."', ";
        }

        $sql        = trim($sql);
        $sql        = rtrim($sql, ',');
        $sql_values = trim($sql_values);
        $sql_values = rtrim($sql_values, ',');
        $sql        = $sql.$sql_values;
        $sql        = $sql.')';
        return $sql;

    }//end _arrayToSQL()

    /**
     *  Connect to the database.
     *
     * @return Connection.
     */
    private function _connectToDb()
    {
        include './db_include.php';
        try {
          $con = new \PDO( $dbDSN, $dbUser, $dbPassword ); //our new PDO Object
        } catch (PDOException $e) {
              echo $e->getMessage(); //catch and show the error
              $logFile = fopen("../../logs/SplitsClass.php.log", "w");;
              $string = __LINE__.' PDOException = '.$e->getMessage();
              fwrite($logFile, $string . "\n");
        }
        return $con;

    }//end _connectToDb()


    /**
     *  Create SQL string to insert a row.
     *
     * @param array $pramArray Contains the data for the row.
     *
     * @return TRUE or FALSE.
     */
    public function recordData(array $pramArray)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $pramArray['tC_CompletedTimestamp'] = $currentDateTime;
        $sql = $this->_arrayToSQL($pramArray);
        $PDO_connection = $this->_connectToDb();
        $count      = $PDO_connection->exec($sql);
        $PDO_connection = NULL;
$logFile = fopen("../../logs/recordData.log", "w");
$v = var_export($pramArray, true);
$string = __LINE__.' $pramArray = '.$v."\n\n";
fwrite($logFile, $string. "\n\n");
$string = __LINE__.' $currentDateTime = '.$currentDateTime."\n\n";
fwrite($logFile, $string. "\n\n");
fwrite($logFile, $sql. "\n\n");
$string = __LINE__.' $count = '.$count."\n\n";
fwrite($logFile, $string);
        return $count;

}//end recordData()

    /**
     *  Create SQL string to insert a row.
     *
     * @param array  $myArray           Contains the data for the row.
     * @param string $PDO_connection Identifies the connection. Not realy string.  phpcs objected to other type hints.
     *
     * @return A SQL string.
     */
    private function _arrayToInsertSQL(array $myArray, $PDO_connection)
    {
        $sql        = 'INSERT INTO tCompleted (';
        $sql_values = ' ) VALUES ( ';
        foreach ($myArray as $key => $value) {
            $sql        = $sql.$key.', ';
            //$value      = $mysqli_connection->real_escape_string($value);
            $sql_values = $sql_values."'".$value."', ";
        }

        $sql        = trim($sql);
        $sql        = rtrim($sql, ',');
        $sql_values = trim($sql_values);
        $sql_values = rtrim($sql_values, ',');
        $sql        = $sql.$sql_values;
        $sql        = $sql.');';
        return $sql;

    }//end _arrayToInsertSQL()


    /**
     *  Insert one row.
     *
     * @param array $pramArray Contains the data for the row.
     *
     * @return TRUE or FALSE.
     */
    public function insertRecord(array $pramArray)
    {
        $PDO_connection = $this->_connectToDb();
        $sql            = $this->_arrayToInsertSQL($pramArray, $PDO_connection);
        $count          = $PDO_connection->exec($sql);
        $PDO_connection = NULL;

    }//end insertRecord()


    /**
     *  Get the last DB entry in a row.
     *
     * @return Result.
     */
    public function getLastDbEntry()
    {
        $PDO_connection = $this->_connectToDb();
        $sql    = 'SELECT * FROM tCompleted ORDER BY id DESC LIMIT 1';
        $result     = $PDO_connection->query($sql);
        $row = $result->fetch(\PDO::FETCH_ASSOC);
        $PDO_connection = NULL;
        return $row;

    }//end getLastDbEntry()


    /**
     *  Select one of a student's rows.
     *
     * Take a student id and get all completed lessons.
     *
     * @param string $tA_S_ID Identifies the student.
     *
     * @return Row.
     */
    public function getCompletedByID($tA_S_ID)
    {
        $PDO_connection = $this->_connectToDb();
        $sql      = "SELECT * FROM tCompleted WHERE tA_S_ID='".$tA_S_ID."' LIMIT 1";
        $result     = $PDO_connection->query($sql);
        $row = $result->fetch(\PDO::FETCH_ASSOC);
        return $row;

    }//end getRowFromDB()


    /**
     *  Delete last of a student's rows.
     *
     * Take a student id and delete last record of completion.
     *
     * @param string $tA_S_ID Identifies the student.
     *
     * @return Result of TRUE or FALSE.
     */
    public function deleteLastRow($tA_S_ID)
    {
        $PDO_connection = $this->_connectToDb();
        $sql      = "DELETE FROM tCompleted
                WHERE (tA_S_ID= '".$tA_S_ID."' )
                ORDER BY tC_CompletedTimestamp LIMIT 1";
        $count = $PDO_connection->exec($sql);
        return $count;

    }//end deleteLastRow()


    /**
     *  Delete all of a student's rows.
     *
     * Take a student id and delete all records of completion.
     *
     * @param string $tA_S_ID Identifies the student.
     *
     * @return Result of TRUE or FALSE.
     */
    public function deleteStudentRows($tA_S_ID)
    {
        $PDO_connection = $this->_connectToDb();
        $sql      = "DELETE FROM tCompleted WHERE ( tA_S_ID= '".$tA_S_ID."' )";
        $count = $PDO_connection->exec($sql);
        return $count;

    }//end deleteStudentRows()
}//end class
