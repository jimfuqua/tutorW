<?php

function GCFarrayToSQLstring($tName, array $myParametersArray)
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
