<?php
use tutor\classes;
require '../classes/Sessionsclass.php';
//$logFile = fopen("/var/www/tutor/php_log.txt", "a"); // File handle used for debugging messages.
//$string = "Assignment.class.php"; fwrite($logFile, $string . "\n");

class SessionsClassSimpletest extends PHPUnit_Framework_TestCase {

    public function testbuildArray()
    {
        //$mySessionsArray is in db order but that does not make a difference when you use the function to create SQL.
        $this->mySessionsArray['id'] = '';
        $this->mySessionsArray['tS_SessionID'] = '123456';
        $this->mySessionsArray['tS_S_ID'] = 'xxx-yyy';
        $this->mySessionsArray['tS_TimeAssigned'] = '1200';  // seconds
        $this->mySessionsArray['tS_TimeIn'] = '01-24-45 02:02:02';
        $this->mySessionsArray['tS_TimeOut'] = '01-24-45 02:22:02';
        $this->mySessionsArray['tS_WorkingTime'] = '1200';
        $this->mySessionsArray['tS_SystemDeadTime'] = '200';
        $this->mySessionsArray['tS_LessonsCompleted'] = '66';
        $this->mySessionsArray['tS_ErrorsToday'] = '16';
        $this->mySessionsArray['tS_GenericAssignmentsCompleted'] = '12';
        //$this->mySessionsArray['tS_CumulativeTime'] = 1095;
        //$this->mySessionsArray['tS_TimeStamp'] = date('Y-m-d H:i:s');;
        $this->assertTrue(count($this->mySessionsArray) === 11);
        return($this->mySessionsArray);
    }

    public function testinsertRecord()
    {
        // does not increment cumulative time for student.
        $this->testbuildArray(); // This resets the array to orignial values.
        $classInstance = new tutor\classes\SessionsClass;
        $classInstance ->deleteRowTSSID($this -> mySessionsArray['tS_S_ID']);
        $result = $classInstance->insertRecord($this->mySessionsArray);
        $this->assertTrue($result === true );
        // Clean Up
        $classInstance ->deleteRowTSSID($this -> mySessionsArray['tS_S_ID']);
        $this->testbuildArray(); // This resets the array to orignial values.
        unset($classInstance);
    }

public function testcompareClassMethodsToTests()
    {
        //$log_file = fopen("/var/www/tutor/logs/compareClassMethodsToTests.log", "w");
        //$string='43 compareClassMethodsToTests' . "\n";
        //fwrite  (  $log_file, $string);
        // Create an array.of test methods.
        $tests_class_methods = get_class_methods(new SessionsClassSimpletest());
        // Remove methods not starting with 'test'/
        foreach ($tests_class_methods as $key => $value) {
            if (substr($value, 0, 4)!=='test') {
                unset($tests_class_methods[$key]);
            }
        }
        // Create an array.of methods from the tested class.
        $class_methods = get_class_methods(new \tutor\classes\SessionsClass());
        // add 'test' to start of each class method before compare.
        foreach ($class_methods as $key => $value) {
            $class_methods[$key] = "test" . $value;
        }
        // Return an array containing all the entries from $class_methods that are not present
        // in  $tests_class_methods.
        $missing_tests = array_diff( $class_methods, $tests_class_methods );
        foreach($missing_tests as $key => $value) {
            // remove tests that don't test a method in tested class
            if ($value === "testcompareClassMethodsToTests") {
                    unset($missing_tests[$key]);
            }
            if ($value === "testbuildArray") {
                    unset($missing_tests[$key]);
            }
            if ($value === "testfieldsInDbVsMyArray")  {
                    unset($missing_tests[$key]);
            }
        };
        $i = 1;
        $count = count($missing_tests);
        if ($count > 0){
            foreach ($missing_tests as $key => $value) {
                $string = $i . ' Missing:  ' . $value;
                echo $string;
                if ($i < $count) {
                    echo "<br />";
                }
                $i++;
            }
        }
    }

    public function testdeleteRowTSSID()
    {
        $this->testbuildArray(); // This resets the array to orignial values.
        $classInstance = new tutor\classes\SessionsClass;
        $this->assertTrue(isset($classInstance));
        $classInstance ->deleteRowTSSID($this -> mySessionsArray['tS_S_ID']);
        $result = $classInstance -> insertRecord($this -> mySessionsArray);  // Returns true or false
        $this->assertTrue($result === true );
        $result=$classInstance->deleteRowTSSID($this -> mySessionsArray['tS_S_ID']);
        $this->assertTrue( $result === 1 );
        // Clean Up
        $classInstance ->deleteRowTSSID($this -> mySessionsArray['tS_S_ID']);
        $this->testbuildArray(); // This resets the array to orignial values.
        unset($classInstance);
    }

    public function testgetStudentLastDbEntryAsArray()
    {
        $this->testbuildArray(); // This resets the array to orignial values.
        $this->mySessionsArray['tS_TimeAssigned'] = '1234';  // seconds
        $classInstance = new tutor\classes\SessionsClass;
        $classInstance ->deleteRowTSSID($this -> mySessionsArray['tS_S_ID']);
        $this->assertTrue(isset($classInstance));
        $result = $classInstance->insertRecord($this->mySessionsArray);
        $result = $classInstance ->getStudentLastDbEntryAsArray($this -> mySessionsArray['tS_S_ID']);
        $this->assertTrue(is_array($result));
        $this->assertTrue($result['tS_TimeAssigned'] === '1234');  // seconds
        // Clean Up
        $classInstance ->deleteRowTSSID($this -> mySessionsArray['tS_S_ID']);
        $this->testbuildArray(); // This resets the array to orignial values.
        unset($classInstance);
    }

        //     function testinsert_with_cumulative_adjustment(){
        //         $this->testbuildArray(); // This resets the array to orignial values.
        //         $this->mySessionsArray['tS_CumulativeTime'] = '6666';  // seconds
        //         $classInstance = new tutor\classes\SessionsClass;
        //         $classInstance ->deleteRowTSSID($this -> mySessionsArray['tS_S_ID']);
        //         $this->assertTrue(isset($classInstance));
        //         $result = $classInstance -> insertRecord($this -> mySessionsArray);  // Returns true or false
        //         $this->assertTrue($result === true);
        //         $this->mySessionsArray['tS_CumulativeTime'] = '3333';  // seconds
        //         $this->mySessionsArray['tS_SessionID'] = '9876';
        //         $result = $classInstance ->insert_with_cumulative_adjustment($this -> mySessionsArray);
        // Returns true or false
        //         $this->assertTrue($result === true);
        //         $result = $classInstance -> getStudentLastDbEntryAsArray($this -> mySessionsArray['tS_S_ID']);
        //         $this->assertTrue($result['tS_CumulativeTime'] === '9999');
        //     }

    public function testCreation()
    {
        $this->testbuildArray(); // This resets the array to orignial values.
        $classInstance = new tutor\classes\SessionsClass;
        $classInstance ->deleteRowTSSID($this ->mySessionsArray['tS_S_ID']);
        $result = $classInstance->insertRecord($this->mySessionsArray);
        // This inserts data into array but does not have a remaining value.
        $this->assertTrue(isset($classInstance));
        $this->assertTrue($result === true );
        $return_value = $classInstance ->
                getStudentLastDbEntryAsArray($this->
                mySessionsArray['tS_S_ID']);
        //         echo 36;
        //         var_dump($return_value);
        //         $row = mysqli_fetch_array($return_value,  MYSQLi_ASSOC);
        //         echo 39;
        //         var_dump($row);
        //$this->assertTrue(count($row) === count($this->mySessionsArray));
        $this->assertTrue($result === true);
        //exit('38');
        $classInstance ->deleteRowTSSID($this -> mySessionsArray['tS_S_ID']);
    }

    public function testfieldsInDbVsMySessionsArray()
    {
        //get a list of fields in the db
        $this->testbuildArray(); // This resets the array to orignial values.
        $classInstance = new tutor\classes\SessionsClass;
        $classInstance ->deleteRowTSSID($this ->mySessionsArray['tS_S_ID']);
        $result=$classInstance->insertRecord($this -> mySessionsArray);
        //$result=$classInstance->get_student_last_db_entry($this->
                //mySessionsArray['tS_S_ID']);
        //$row = mysqli_fetch_array($result,  MYSQLI_ASSOC);
        //$this->assertTrue(count($row)==count($this->mySessionsArray));
        //  Put all of the column names from the returned row in an array.
        //         $num_columns=mysqli_num_fields( $result );
        //         for($i=0; $i<$num_columns; $i++){
        //           $column_name_array[$i]=mysqli_field_name($result, $i);
        //         }
        // Put all of the key names is mySessionsArray into an array.
        $mySessionsArray_num_columns=count($this->mySessionsArray);
        $i=0;
        foreach ($this -> mySessionsArray as $key => $value) {
            $mySessionsArray_key_array[$i]=$key;
            $i++;
        }
        //  Compare the two arrays key by key.
        //         for($i=0; $i<$num_columns; $i++){
        //             $this->assertTrue($column_name_array[$i]==$mySessionsArray_key_array[$i]);
        //         }
        $classInstance ->deleteRowTSSID($this -> mySessionsArray['tS_S_ID']);
    }

    public function testemptySessions()
    {
        //         $result = NULL;
        //         $this->testbuildArray(); // This resets the array to orignial values.
        //         $classInstance = new tutor\classes\SessionsClass;
        //         $classInstance ->deleteRowTSSID($this -> mySessionsArray['tS_S_ID']);
        //         $this->assertTrue($classInstance->getFirstName() === NULL);
        //         $firstName = "JohnJohn";
        //         $classInstance->setFirstName($firstName);
        //         $this->assertTrue($classInstance->getFirstName() == $firstName);
        //         $classInstance->empty_sessions();
        //         $this->assertTrue($classInstance->getFirstName() === NULL);
        //         $classInstance->setFirstName($firstName);
        //         $this->assertTrue($classInstance->getFirstName() == $firstName);
        //         $classInstance ->deleteRowTSSID($this -> mySessionsArray['tS_S_ID']);
    }

        //     function test_get_last_db_entry(){
        //         $result='';
        //         $this->testbuildArray(); // This resets the array to orignial values.
        //         $classInstance = new tutor\classes\SessionsClass;
        //         $classInstance ->deleteRowTSSID($this -> mySessionsArray[''tS_S_ID'']);
        //         $this->assertTrue(isset($classInstance));
        //         $result = $classInstance ->deleteRowTSSID($this -> mySessionsArray[''tS_S_ID'']);
        //         $this->assertTrue( mysqli_affected_rows() === 0); should be done in the class and returned
        //         //Only false if another function failed to clean up.
        //         $result = $classInstance->insertRecord($this->mySessionsArray);
        //         $this->assertTrue($result === true);
        //         $this->mySessionsArray['lastName'] = 'xxx';
        //         $this->mySessionsArray[''tS_S_ID''] = 'xxx-yyy';
        //         $this->mySessionsArray['userName'] = 'xxx-yyy';
        //         $result = $classInstance->insertRecord($this->mySessionsArray);
        //         $this->assertTrue($result === true);
        //         $result=$classInstance->get_last_db_entry($this->mySessionsArray['lastName']);
        //         $row = mysqli_fetch_array($result);
        //         $this->assertTrue($row[5] === 'xxx');
        //         $this->assertTrue($row[2] === 'Jim');
        //         $this->assertTrue($row[11] === '37075');
        //         // Clean Up
        //         $this->testbuildArray(); // This resets the array to orignial values.
        //         $classInstance ->deleteRowTSSID('xxx-yyy');
        //         $classInstance ->deleteRowTSSID($this ->
                        //mySessionsArray[''tS_S_ID'']);
        //     }

    public function testgetSpecificSession()
    {
        // add a specific assignment;
        // retrieve the specific assignment;
        // test the specific assignment;
        $classInstance =  new tutor\classes\SessionsClass;
        $this->testbuildArray(); // This resets the array to orignial values.
        $this -> assertTrue(isset($classInstance));
        $classInstance ->deleteRowTSSessionID($this ->
                        mySessionsArray['tS_SessionID']);
        // Make sure no lessons exist for this student.
        $result = $classInstance -> insertRecord($this -> mySessionsArray);
        // Returns true or false
        $this -> assertTrue( $result === true );
        if ($result === true) {
            // Success in insertion into db.
            // retrieve the lesson;
            $retrieved_result = $classInstance ->
                getSpecificSessionFromDB($this->
                mySessionsArray['tS_SessionID'] );
            $this -> assertTrue(is_array($retrieved_result) === true);
            $this -> assertTrue(count($retrieved_result) === 11 );
            $this -> assertTrue($retrieved_result['tS_S_ID'] === $this->mySessionsArray['tS_S_ID']) ;
            $result_array = array();
        }
        $classInstance ->deleteRowTSSessionID($this -> mySessionsArray['tS_SessionID']);
    }

    public function testdeleteRowTSSessionID()
    {
        $classInstance = new tutor\classes\SessionsClass;
        $this->assertTrue(isset($classInstance));
        $this->testbuildArray(); // This resets the array to orignial values.
        $classInstance ->deleteRowTSSessionID($this -> mySessionsArray['tS_SessionID']);
        $result = $classInstance -> insertRecord($this -> mySessionsArray);  // Returns true or false
        $this->assertTrue( $result === true );
        $result=$classInstance->deleteRowTSSessionID($this -> mySessionsArray['tS_SessionID']);
        $this->assertTrue( $result === 1 );
        $classInstance -> deleteRowTSSessionID($this -> mySessionsArray['tS_SessionID']);
    }


} // class
