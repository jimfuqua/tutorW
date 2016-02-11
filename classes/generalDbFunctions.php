<?php

function gDeleteByRowID($tName, $id) {
    if (($id === NULL) || (is_numeric($id) === FALSE)) {
            return FALSE;
    } else {
            $PDO_connection = $this->_connectToDb();
            $sql        = 'DELETE FROM `jlfEDU`.`'.$tName."` WHERE `tSplits`.`id` = '".$id."'";
            $count = $PDO_connection->exec($sql);
            return $count;
        }
}

function gArrayToSQLstringInsert($tName, array $myParametersArray)
    {
        //$logFile = fopen("/var/www/tutor/logs/GCF_arrayToSQL.log", "w");
        $sql = "INSERT INTO $tName (";
        $sql_values = ") VALUES (";
        foreach ($myParametersArray as $key => $value) {
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
     * Delete all rows containing a given name from designated database.
     *
     * @param string $rowName The target row..
     * @param string $tName The target table.
     * @return Returns TRUE or FALSE.
     */
    function gDeleteByRowName($tName, $rowName)
    {
        if ($name === NULL) {
            return FALSE;
        } else {
            $PDO_connection = $this->_connectToDb();
            $sql        = "DELETE FROM `jlfEDU`.`".$tName."` WHERE `".$tName."` = '".$rowName."'";
            $count = $PDO_connection->exec($sql);
            return $count;
        }

    }//end deleteRowName()
