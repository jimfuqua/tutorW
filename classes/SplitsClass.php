<?php
namespace jimfuqua\tutorW;
/**
 * Manage MySQL table Splits
 *
 * Manage database table Splits
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @package    jimfuqua
 * @subpackage tutor
 * @author     Original Author <jimfuqua@jim-fuqua.com>
 * @copyright  2014 Jim Fuqua
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License V3+
 */


/**
 * Short description for class
 *
 * Long description for class
 */
class SplitsClass
{

  public function __construct()
  {
      //echo "I am a SplitsClass object.<br/>";
  }

    /**
     * Logs all methods.
     *
     * @return void
     */
    public function logMyMethods()
    {
        $classInstance = new SplitsClass();
        $class_methods = get_class_methods($classInstance);
        foreach ($class_methods as $method_name) {
            echo '<br />'.$method_name;
            fwrite($logFile, $method_name."\n");
        }

    }//end logMyMethods()


    /**
     *  Create a sql string to create a row in the database.
     *
     * @param array $myArray Values for a sql query.
     *
     * @return $sql
     */
    public function arrayToInsertSQL(array $myArray)
    {
        $sql        = 'INSERT INTO tSplits (';
        $sql_values = ' ) VALUES ( ';
        foreach ($myArray as $key => $value) {
            $sql        = $sql.$key.', ';
            $sql_values = $sql_values.':'.$key.', ';
        }

        $sql        = trim($sql);
        $sql        = rtrim($sql, ',');
        $sql_values = trim($sql_values);
        $sql_values = rtrim($sql_values, ',');
        $sql        = $sql.$sql_values;
        $sql        = $sql.');';
        return $sql;

    }//end arrayToInsertSQL()


    /**
     *  Create a sql string to update a row in the database.
     *
     * @param array $valueArray Values for a sql query.
     * @param array $whereArray Data to identify a row for a sql query.
     *
     * @return $sql
     */
    public function arrayToUpdateSQL(array $valueArray, array $whereArray)
    {
        $str = '';
        $sql = 'UPDATE tSplits SET ';
        foreach ($valueArray as $key => $value) {
            $sql = $sql.$key." = '".$value."', ";
        }

        $sql      = trim($sql);
        $sql      = rtrim($sql);
        $sql      = substr($sql, 0, -1);
        $whereSQL = '';
        $sql      = $sql.' WHERE ';
        $whereSQL = '';
        reset($whereArray);
        foreach ($whereArray as $key => $value) {
            $whereSQL = $whereSQL.$key." = '";
            $whereSQL = $whereSQL.$value."' AND ";
        }

        $whereSQL = rtrim($whereSQL);
        $whereSQL = substr($whereSQL, 0, -3);
        $sql      = $sql.$whereSQL;
        return $sql;

    }//end arrayToUpdateSQL()


    /**
     *  Select a lesson.
     *
     * From the lesson array select an individual lesson.
     *
     * @return $mysqli_connection
     */
    private function _connectToDb()
    {
        include 'db_include2.php';
        try {
            $con = new \PDO($db_dsn, 'root', $db_password);
            // Our new PDO Object.
        } catch (PDOException $e) {
              echo $e->getMessage();
            // Catch and show the error.
              $logFile = fopen('/var/www/html/jimfuqua/tutor/logs/SplitsClass.php.log', 'w');
            ;
              $string = __LINE__.' PDOException = '.$e->getMessage();
              fwrite($logFile, $string."\n");
        }

        return $con;

    }//end _connectToDb()


    /**
     *  This function gets its variables from nine mandatory parameters.
     *
     * @param array $pramArray Data array.
     *
     * @count Returns number of rows inserted.
     *
     * @return $count.
     */
    public function insertRow(array $pramArray)
    {
      /***********
      tSp_id
      tSp_GroupID
      tSp_GroupDescription
      tSp_LessonName
      tSp_tA_Parameter
      tSp_gA
      tSp_gA_Parameter
      tSp_PercentTime
      tSp_TimeRelativeOrAbsolute
      //*************/
        if (is_array($pramArray) === FALSE) {
                return FALSE;
        } else {
            $PDO_Connection = $this->_connectToDb();
            $sql            = $this->arrayToInsertSQL($pramArray);
            $stmt           = $PDO_Connection->prepare($sql);
            if (strrpos($sql, ':tSp_id', 0) > 0) {
                $stmt->bindParam(':tSp_id', $pramArray['tSp_id'], \PDO::PARAM_INT);
            }

            if (strrpos($sql, ':tSp_GroupID') > 0) {
                $stmt->bindParam(':tSp_GroupID', $pramArray['tSp_GroupID'], \PDO::PARAM_STR, 80);
            }

            if (strrpos($sql, ':tSp_GroupDescription') > 0) {
                $stmt->bindParam(':tSp_GroupDescription', $pramArray['tSp_GroupDescription'], \PDO::PARAM_STR);
            }

            if (strrpos($sql, ':tSp_LessonName') > 0) {
                $stmt->bindParam(':tSp_LessonName', $pramArray['tSp_LessonName'], \PDO::PARAM_STR);
            }

            if (strrpos($sql, ':tSp_tA_Parameter') > 0) {
                $stmt->bindParam(':tSp_tA_Parameter', $pramArray['tSp_tA_Parameter'], \PDO::PARAM_STR);
            }

            if (strrpos($sql, ':tSp_gA') > 0) {
                $stmt->bindParam(':tSp_gA', $pramArray['tSp_gA'], \PDO::PARAM_STR);
            }

            if (strrpos($sql, ':tSp_gA_Parameter') > 0) {
                $stmt->bindParam(':tSp_gA_Parameter', $pramArray['tSp_gA_Parameter'], \PDO::PARAM_STR);
            }

            if (strrpos($sql, ':tSp_PercentTime') > 0) {
                $stmt->bindParam(':tSp_PercentTime', $pramArray['tSp_PercentTime'], \PDO::PARAM_INT);
            }

            if (strrpos($sql, ':tSp_TimeRelativeOrAbsolute') > 0) {
                $stmt->bindParam(
                    ':tSp_TimeRelativeOrAbsolute',
                    $pramArray['tSp_TimeRelativeOrAbsolute'],
                    \PDO::PARAM_STR
                );
            }
            $stmt->execute();
            $count = $stmt->rowCount();
            return $count;
        }//end if

    }//end insertRow()


    /**
     *  Gets the last entry in the database in the form of an array.
     *
     * @return Returns a row.
     */
    public function getLastDbEntryAsArray()
    {
        $PDO_Connection = $this->_connectToDb();
        $sql            = 'SELECT * FROM tSplits ORDER BY "tS_id" DESC LIMIT 1';
        $stmt           = $PDO_Connection->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll();
        foreach ($row as $key => $value) {
            foreach ($value as $key2 => $value2) {
                if (is_numeric($key2) === TRUE) {
                    unset($value[$key2]);
                }
            }

            $row[$key] = $value;
        }

        return $row[0];

    }//end getLastDbEntryAsArray()


    /**
     * Get one rows identified by id.
     *
     * @param string $tSp_id The id column entry to identify the row.
     *
     * @return Returns number of rows affected.
     */
    public function getSplitByPrimaryKey($tSp_id)
    {
        $PDO_Connection = $this->_connectToDb();
        $sql            = 'SELECT * FROM tSplits WHERE tSp_id = :tSp_id';
        $stmt           = $PDO_Connection->prepare($sql);
        $stmt->bindParam(':tSp_id', $tSp_id, \PDO::PARAM_STR);
        $result = $stmt->execute();
        $row    = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row;

    }//end getSplitByPrimaryKey()


    /**
     *  Get all splits.
     *
     * @return Returns result.
     */
    public function getAllSplits()
    {
        $result         = NULL;
        $PDO_Connection = $this->_connectToDb();
        $sql            = 'SELECT * FROM tSplits ORDER BY tSp_id ASC';
        $stmt           = $PDO_Connection->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        foreach ($rows as $key => $value) {
            foreach ($value as $key2 => $value2) {
                if (is_numeric($key2) === TRUE) {
                    unset($value[$key2]);
                }
            }

            $rows[$key] = $value;
        }

        return $rows;

    }//end getAllSplits()


    /**
     *  Get one split identified by name.
     *
     * @param string $tSp_LessonName The name to identify the row.
     *
     * @return Returns result.
     */
    public function getSplitByName($tSp_LessonName)
    {
        $result         = NULL;
        $PDO_Connection = $this->_connectToDb();
        $sql            = 'SELECT * FROM tSplits WHERE tS_Name  = :tSp_LessonName ORDER BY tS_id ASC';
        $stmt           = $PDO_Connection->prepare($sql);
        $stmt->bindParam(':tSp_LessonName', $tSp_LessonName, \PDO::PARAM_STR, 80);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row;

    }//end getSplitByName()


    /**
     * Delete the last row..
     *
     * From the database delete one row.
     *
     * @return Returns number of rows affected..
     */
    public function deleteLastRow()
    {
        // Should get newest row.
        // Test to make sure it does not get oldest row.
        $PDO_Connection = $this->_connectToDb();
        $sql            = 'DELETE FROM tSplits ORDER BY tSp_id DESC LIMIT 1';
        $stmt           = $PDO_Connection->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;

    }//end deleteLastRow()


    /**
     * Delete one rows identified by GroupID.
     *
     * From the database delete one row.
     *
     * @param $tSp_GroupID The col to identify the group.
     *
     * @return Returns number of rows affected..
     */
    public function deleteByGroupID($tSp_GroupID)
    {
        $result         = NULL;
        $PDO_Connection = $this->_connectToDb();
        $sql            = 'SELECT * FROM tSplits WHERE tSp_GroupID  = :tSp_GroupID';
        $stmt           = $PDO_Connection->prepare($sql);
        $stmt->bindParam(':tSp_GroupID', $tSp_GroupID, \PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;

    }//end deleteByGroupID()


    /**
     * Delete one rows identified by id.
     *
     * From the database delete one row.
     *
     * @param $tSp_id The primary key column entry to identify the row.
     *
     * @return Returns number of rows affected..
     */
    public function deleteRowId($tSp_id)
    {
        if (($tSp_id === NULL) || (is_numeric($tSp_id) === FALSE)) {
            return FALSE;
        } else {
            $PDO_Connection = $this->_connectToDb();
            $sql            = 'DELETE FROM `jlfEDU`.`tSplits` WHERE `tSplits`.`tSp_id` = :tSp_id';
            $stmt           = $PDO_Connection->prepare($sql);
            $stmt->bindParam(':tSp_id', $tSp_id, \PDO::PARAM_STR, 80);
            $stmt->execute();
            $count = $stmt->rowCount();
            return $count;
        }

    }//end deleteRowId()


    /**
     * Delete all rows containing a given name.
     *
     * From the database get column names.
     *
     * @param string $tSp_LessonName The name column entry to identify the row.

     * @return Returns TRUE or FALSE.
     */
    public function deleteSplitLessonName($tSp_LessonName)
    {
        if ($tSp_LessonName === NULL) {
            return FALSE;
        } else {
            $PDO_Connection = $this->_connectToDb();
            $sql            = 'DELETE FROM `jlfEDU`.`tSplits` WHERE `tSplits`.`tSp_LessonName` = :tSp_LessonName';
            $stmt           = $PDO_Connection->prepare($sql);
            $stmt->bindParam(':tSp_LessonName', $tSp_LessonName, \PDO::PARAM_STR, 80);
            $stmt->execute();
            $count = $stmt->rowCount();
            return $count;
        }

    }//end deleteSplitLessonName()


    /**
     * Get Column names in an array.
     *
     * From the database get column names.
     *
     * @return $column_name_array
     */
    public function getArrayOfColumnNames()
    {
        $PDO_Connection = $this->_connectToDb();
        $sql            = 'SHOW COLUMNS FROM tSplits';
        // SHOW COLUMNS FROM my_table.
        $stmt = $PDO_Connection->prepare($sql);
        $stmt->execute();
        $column_name_array = $stmt->fetchAll(\PDO::FETCH_COLUMN);
        // Return an array.
        return $column_name_array;

    }//end getArrayOfColumnNames()


}//end class
