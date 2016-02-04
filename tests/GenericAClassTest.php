<?php
namespace jimfuqua\tutorW;
//require_once '/var/www/html/jimfuqua/tutor/src/classes/GenericAClass.inc';
/**********************************************************************
*  Test AssignmentsClass using PHP SimpleTest.

ToDo:
1.   Add docbook type comments to each function and internal comments in each
function.
2.  Check class function list against tests to see that all functions
are tested.
3.  Write a test to see if there is a test for every procedure in a class.
    Every class should have a function to return a list of the class functions.
    get_class_methods() will do this.and the class would not even need to
    return the list.

*/

// File handle used for debugging messages.
$logFile = fopen("/var/www/html/jimfuqua/tutorW/logs/GenericAClassTest.log", "w");
$string = __LINE__ . "\n";
fwrite  ($logFile, $string);
//echo __LINE__;
/*
class functions with no tests
arrayToSqlInsert no
connectToDb no
testGetGAssignmentsFilteredByALetterToArray no
testAllAssignmentNameToJSON no
testDisplayRow no
*/
    /**
    *    Test cases for the GenericA.class.php containing the GenericAClass
    */
class GenericATest extends \PHPUnit_Framework_TestCase {

    /**
    *    Function isplays title on the test results page.
    */

    public function testcompareClassMethodsToTests()
    {
        $logFile = fopen("/var/www/html/jimfuqua/tutorW/logs/compareClassMethodsToTests.log", "w");
        $string = __LINE__ . ' compareClassMethodsToTests'."\n";
        fwrite  ($logFile, $string);
        // Create an array.of test methods.
        $tests_class_methods = get_class_methods(new GenericATest());
        // Remove methods not starting with 'test'/
        foreach ($tests_class_methods as $key => $value) {
            if (substr($value, 0, 4)!=='test') {
                unset($tests_class_methods[$key]);
            }
        }
        // Create an array.of methods from the tested class.
        $classInstance = new tutor\src\classes\GenericAClass;
        $class_methods = get_class_methods(new tutor\src\classes\GenericAClass);
        $v = var_export($class_methods, true);
        $string = __LINE__ . ' $class_methods = ' . $v  . "\n";
        fwrite  ($logFile, $string);
        // add 'test' to start of each class method before compare.
        foreach ($class_methods as $key => $value) {
            $class_methods[$key] = "test".$value;
        }
        // Returns an array containing all the entries from $test_class_methods
        // that are not present in $class_methods.
        // Return an array containing all the entries from $class_methods that are not present
        //   $tests_class_methods.
        $missing_tests = array_diff($class_methods, $tests_class_methods );
        foreach($missing_tests as $key => $value) {
            // remove tests that don't test a method in tested class
            if ($value === "testcompareClassMethodsToTests") {
                    unset($missing_tests[$key]);
            }
            if ($value === "buildArray") {
                    unset($missing_tests[$key]);
            }
            if ($value === "testfieldsInDbVsMyArray")  {
                    unset($missing_tests[$key]);
            }
            if ($value === "testarrayToSqlUpdate")  {
                    unset($missing_tests[$key]);
            }
        };
        if (count($missing_tests)>0){
            //echo "Missing Tests or tests with no method to test:<br/>";
            foreach ($missing_tests as $key => $value) {
                $string = "\n".'Missing:  '.$value;
                echo $string;
            }
        } else {
            echo "<br />";
            $this->assertTrue(count($missing_tests) === 0);
        }
    }


    public function buildArray()
    {
      $logFile = fopen("/var/www/html/jimfuqua/tutorW/logs/buildArray.log", "w");
      $string = __LINE__ . ' compareClassMethodsToTests'."\n";
      fwrite  ($logFile, $string);
        //$myArray is in db order but that does not make a difference
        //when you use the function to create SQL.
        $this->myArray['id'] = null;
        $this->myArray['tG_StartStop']='NA';
        $this->myArray['tG_Split']='1';
        $this->myArray['tG_ThreadName']='TYPING JLF';
        $this->myArray['tG_AssignmentName']='Test';
        $this->myArray['tG_path_to_lesson']='/tutor/lessons/dummy_form_for_tests/';
        $this->myArray['tG_FormName']='my_form.php';
        $this->myArray['tG_DataFile']='my_form.php';
        $this->myArray['tG_Parameters'] = 'klm';
        $this->myArray['tG_Consequtive_Reps_OK'] = 'True';
        $this->myArray['tG_Reps_to_master'] = 20;
        $this->myArray['tG_Errors_Allowed'] = 5;
        $this->myArray['tG_Minimum_completion_time']='1'; // Seconds to prevent computer insertion of false data.
        $this->myArray['tG_Maximum_completion_time']='5'; // Just do it over if too slow;
        $this->myArray['tG_StartRec']='1';
        $this->myArray['tG_StopRec']='2';
        $this->myArray['tG_Immediate_Loops']='1';  // Some things should be done several times to make it sink in.
        $this->myArray['tG_RepsPerRecord']='1';
        $this->myArray['tG_RecordsPerSet']='1';
        $this->myArray['tG_Lesson_if_Correct']='Test2';    // Next gA lesson if correct.
        $this->myArray['tG_Record_if_Correct']='2';
        $this->myArray['tG_Parameter_if_Correct']='2';
        $this->myArray['tG_Delay_Repeat_Corr']='2';
        $this->myArray['tG_Lesson_if_Error']='Test1';
        $this->myArray['tG_Record_if_Error']='3';
        $this->myArray['tG_Parameter_if_Error']='4';
        $this->myArray['tG_Delay_Repeat_Err ']='2';
        $this->myArray['tG_Assignment_Creation_Date']='';
        $this->assertTrue(count($this->myArray) === 28);
        return($this->myArray);
    }

public function testbuildArray()
    {
        //$myArray is in db order but that does not make a difference
        //when you use the function to create SQL.
        $this->buildArray();
        $this->assertTrue(count($this->myArray) == 28);
    }

public function testinsertRecord()
{
    $this -> BuildArray();  // reset variables.
    $classInstance = new tutor\src\classes\GenericAClass;
    $this->assertTrue(isset($classInstance));
    $classInstance->deleteRowsNamed($this->myArray['tG_AssignmentName']);
    $result = $classInstance->insertRecord($this->myArray);
    $this->assertTrue($result === 1 );
    // Now test what happens when we add an identical row.
    $result = $classInstance->insertRecord($this->myArray);
    $this->assertTrue(is_int($result));
    $this->assertTrue(is_numeric($result));
    $this->assertTrue($result === 1);
    // Clean Up
    $result = $classInstance->deleteRowsNamed($this->myArray['tG_AssignmentName']);
    $this->assertTrue($result === 2 );
    $this -> BuildArray();  // reset variables.
}

    public function testdeleteRowsNamed()
    {
        //$logFile = fopen("/var/www/tutor/logs/testdeleteRowsNamed.log", "w");
        // Start with a clean db.
        $this->buildArray();
        $classInstance = new tutor\src\classes\GenericAClass;
        $classInstance->deleteRowsNamed($this->myArray['tG_AssignmentName']);
        // deleteRowsNamed returns number of affected rows.
        $test_assignment_name = 'Test_111';
        $this->myArray['tG_AssignmentName'] = $test_assignment_name;
        // Get a count of the rows with that generic assignment name.
        // assume this function works.
        $result = $classInstance->insertRecord($this->myArray);
        //$string= __LINE__.' gettype $result = '.gettype($result)."\n";
        //fwrite  ($logFile, $string);
        //$string= __LINE__.' $result = '.$result."\n";fwrite($logFile, $string);
        //$v = var_export($result, true);
        //$string = __LINE__.' gAC $result = '.$v."\n"; fwrite($logFile, $string);
        $this->assertTrue($result === 1);
        // getting false when should be getting true
        //$result = $classInstance->getGassignmentByNameToJson($test_assignment_name);
        //$this->assertTrue($result === null); // should be null but might not be.
        if ($result === null) {
            // Insert a record with that name.
            $result = $classInstance->insertRecord($this->myArray);
            $this->assertTrue($result === true);
            //now try to delete it.
            $result = $classInstance->deleteRowsNamed($test_assignment_name);
            $this->assertTrue($result === 1);
        } else {
            // we had one in the DB to start.  Should have not been there.
            // Try to delete it.
            $result = $classInstance->deleteRowsNamed($test_assignment_name);
            $this->assertTrue($result === 1 );
        }
        // Clean Up
        $result = $classInstance->deleteRowsNamed($test_assignment_name);
        $this -> BuildArray();  // reset variables.
    }


    public function testfieldsInDbVsMyArray()
    {
        // get a list of fields in the db
        $this -> BuildArray();  // reset variables.
        $classInstance = new tutor\src\classes\GenericAClass;
       $result=$classInstance->insertRecord($this->myArray);
        $row = $classInstance->getLastDbEntryAsArray();
        $this->assertTrue(count($row) === count($this->myArray));
        //  Put all of the column names from the returned row in an array.
        $num_columns = count($row );
        $i = 0;
        //$logFile = fopen("/var/www/tutor/logs/testfieldsInDbVsMyArray.log", "w");
        //$string='192 testdeleteRowsNamed'."\n"; fwrite  ($logFile, $string);
        //$string='193 $result = '."$result\n"; fwrite  ($logFile, $string);
        //$t = gettype($result);
        //$string='195 $result = '."$result\n"; fwrite  ($logFile, $string);

//$logFile = fopen("/var/www/tutor/logs/testfieldsInDbVsMyArray.log","w");
//$string = "198 testfieldsInDbVsMyArray"; fwrite($logFile, $string."\n");
//$s = var_export($row, true);
// $string='$row = '.$s."\n";fwrite($logFile, $string);
//     if (is_null($row){
//         $this->assertTrue(false);
//     } else {
//         foreach($row as $key => $value){
// $string='$key = '.$key."\n";fwrite($logFile, $string);
// $string='$value = '.$value."\n";fwrite($logFile, $string);
//             $row_key_array[$i] = $key;
//             $i++;
//         }
//         // Put all of the key names is myArray into an array.
//         $myArray_num_columns=count($this->myArray);
//         $i=0;
//         foreach ($this -> myArray as $key => $value) {
//             $myArray_key_array[$i] = $key;
//             $i++;
//         }
//         //  Compare the two arrays key by key.
//         for ($i=0; $i<$num_columns; $i++) {
//             $this->assertTrue($row_key_array[$i] === $myArray_key_array[$i]);
//         }
//     }
        $this -> BuildArray();  // reset variables.
    }

//     public function  testtestAccessibilityOfAllForms()
//     {
//         $this -> BuildArray();  // reset variables.
//         $classInstance = new tutor\src\classes\GenericAClass;
//         $classInstance->deleteRowsNamed("Test0"); // get rid of lessons generated with "Test0"
//         $result = $classInstance->testAccessibilityOfAllForms();
//         $this->assertNull(null); // Initial state of database. null if no problem.
//         $classInstance->deleteRowsNamed("Test0"); // get rid of lessons generated with "myArray"
//         $this->myArray['tG_AssignmentName'] = 'Test0';
//         $this->myArray['tG_path_to_lesson'] = '';
//         $classInstance->insertRecord($this->myArray);
//         // should fail because we have inserted a bad record.
//         $result = $classInstance->testAccessibilityOfAllForms();
//         $this->assertFalse($result[0][0]);
//         // Clean Up.
//         $classInstance->deleteRowsNamed("Test0"); // get rid of lessons generated with "Test0"
//         $this -> BuildArray();  // reset variables.
//     }

    pubLic function testgetLastDbEntryAsArray()
    {
        $this -> BuildArray();  // reset variables.
        $classInstance = new tutor\src\classes\GenericAClass;
        $this->assertTrue(isset($classInstance));
        $classInstance->deleteRowsNamed("Test0"); // get rid of lessons generated with "Test0"
        $this->myArray['tG_AssignmentName'] = 'Test0';
        $result = $classInstance->insertRecord($this->myArray);
        $row = $classInstance->getLastDbEntryAsArray();
        $this->assertTrue($row['tG_AssignmentName'] === 'Test0');
        $this->assertTrue($row['tG_Lesson_if_Error'] == 'Test1');
        $this -> BuildArray();  // reset variables.
      }

    /**
     *   Takes an assignment name and returns the row.
     */
    public function  testgetRowFromDbAsArray()
    {
        $this -> BuildArray();  // reset variables.
        $classInstance = new tutor\src\classes\GenericAClass;
        $this->assertTrue(isset($classInstance));
        $classInstance->deleteRowsNamed($this->myArray['tG_AssignmentName']);
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1 );
        $row = $classInstance->getRowFromDbAsArray($this ->
            myArray['tG_AssignmentName']);
        $this->assertTrue($row['tG_AssignmentName'] ===
            $this->myArray['tG_AssignmentName']);
        // Clean up.
        $classInstance->deleteRowsNamed("Test");
        $this -> BuildArray();  // reset variables.
    }

    /**
    *  Gets and returns all of the generic assignments.
    */
    public function testgetAllAssignmentNamesFromDbArray()
    {
        //$logFile = fopen("/var/www/jimfuqua/tutor/logs/testgetAllAssignmentNamesFromDbArray.log", "w");
        //$string = "\n".__LINE__.' testgetAllAssignmentNamesFromDbArray'."\n";
        //fwrite  ($logFile, $string);
        $this -> BuildArray();  // reset variables.
        $classInstance = new tutor\src\classes\GenericAClass;
        $classInstance->deleteRowsNamed($this->myArray['tG_AssignmentName']);
        $classInstance->deleteRowsNamed('Test0');
                // Add one row to insure at least one record.
        $this->myArray['tG_AssignmentName'] = 'Test22';
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1);
        // Get number of rows.  Then add two rows.
        // Get number of rows again and check for increase of two rows.
        //$string = "\n".__LINE__.' testgetAllAssignmentNamesFromDbArray'."\n";
        //fwrite  ($logFile, $string);
        $assignments = $classInstance->getAllAssignmentNamesFromDbArray();
        //echo var_export($assignments, true);
        $this->assertTrue(is_array($assignments));
        $count1 = count($assignments);
        $initial_count = $count1;
        $this->myArray['tG_AssignmentName'] = 'Test1';
        $result = $classInstance->insertRecord($this->myArray);
        $string = "\n".__LINE__.' testgetAllAssignmentNamesFromDbArray'."\n";
        $assignments2 = $classInstance->getAllAssignmentNamesFromDbArray();
        $count2 = count($assignments2);
        $count_after_adding_one = $count2;
        //echo "count1 =".$count1."\n";
        //echo "count2 =".$count2;
        $this->assertTrue(($count2 - $initial_count) === 1);
        $this->myArray['tG_AssignmentName'] = 'Test2';
        $this->myArray['id'] = '3';
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1);
        $result = $assignments3 = $classInstance->getAllAssignmentNamesFromDbArray();
        $count3 = count($assignments3);
        $this->assertTrue(($count3 - $initial_count) === 2);
        // Clean up.
        $classInstance->deleteRowsNamed("Test");
        $classInstance->deleteRowsNamed("Test0");
        $classInstance->deleteRowsNamed("Test1");
        $classInstance->deleteRowsNamed("Test2");
        $classInstance->deleteRowsNamed("Test3");
        $classInstance->deleteRowsNamed("Test22");
        //$classInstance->deleteRowsNamed("xx");
        $this -> BuildArray();  // reset variables.
    }

    public function testgetAllGenericAssgignmentNamesFromDbJson()
    {
        $logFile = fopen("/var/www/html/jimfuqua/tutor/logs/testgetAllGenericAssgignmentNamesFromDbJson", "w");
        $string = "\n".'testgetAllGenericAssgignmentNamesFromDbJson()'."\n";
        fwrite  ($logFile, $string);
        $this -> BuildArray();  // reset variables.
        $returned_json = null;
        $classInstance = new tutor\src\classes\GenericAClass;
        $r = $classInstance->deleteRowsNamed("xx");
        $r = $classInstance->deleteRowsNamed("xxy");
        $r = $classInstance->deleteRowsNamed("xxz");
        $r = $classInstance->deleteRowsNamed("Test");
        //get all records and count them.
        $result = $classInstance->insertRecord($this->myArray);
        $this->myArray['tG_AssignmentName']='Test2';
        $result2 = $classInstance->insertRecord($this->myArray);
        $result_json = $classInstance->getAllGenericAssgignmentNamesFromDbJson();
        $result_1 = json_decode($result_json, true);
        $v = var_export($result_json, true);
        $string = "\n".__LINE__.' $result_json = '."$v\n";
        fwrite  ($logFile, $string);
        $v = var_export($result_1, true);
        $string = "\n".__LINE__.' $result_1 = '."$v\n";
        fwrite  ($logFile, $string);
        $this->assertTrue(is_array($result_1));
        $this->myArray['tG_AssignmentName'] = 'xx';
        //$this->myArray['id'] = '';
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1);
        $result = $classInstance->getAllGenericAssgignmentNamesFromDbJson();
        $result_2 = json_encode($result_1);
        //$this->assertTrue($result_1 === $result_2);
        $this->myArray['tG_AssignmentName'] = 'xxy';
        //$this->myArray['id'] = '';
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1);
        $result = $classInstance->getAllGenericAssgignmentNamesFromDbJson();
        $result_3 = json_decode($result);
        //$this->assertTrue(count($result_3) === (count($result_1) + 2));
        switch(json_last_error())
        {
            case JSON_ERROR_DEPTH:
                $message="";
                $message=' - Maximum stack depth exceeded';echo $message;
                error_log  ($message, 0, '/var/www/tutor/logs/php_errors.log');
                break;
            case JSON_ERROR_CTRL_CHAR:
                $message="";echo $message;
                $message = ' - Unexpected control character found';
                break;
            case JSON_ERROR_SYNTAX:
                $message="";echo $message;
                $message=' - Syntax error, malformed JSON';
                break;
        }
        // clean up.
        // delete the records that were added.
        $r = $classInstance->deleteRowsNamed("xx");  // returns affected rows.
        $this->assertTrue($r === 1);
        $r = $classInstance->deleteRowsNamed("xxy");
        $this->assertTrue($r === 1);
        $r = $classInstance->deleteRowsNamed("xxz");
        $r = $classInstance->deleteRowsNamed("Test");
        $r = $classInstance->deleteRowsNamed('Test2');
        $this -> BuildArray();  // reset variables.
        }

        /**
    * Gets all of the generic assignments filtered by the fourth character in
    *   tG_AssignmentName.
    */
    public function testgetAllAssignmentNamesToJSON()
    {
        $logFile = fopen("/var/www/html/jimfuqua/tutor/logs/testgetAllAssignmentNamesToJSON.log", "w+");
        $classInstance = new tutor\src\classes\GenericAClass;
        $json_list_of_GenericAssignments = $classInstance->getAllAssignmentNamesToJSON();
        $v = var_export($json_list_of_GenericAssignments, true);
        fwrite($logFile, __LINE__.' $json_list_of_GenericAssignments = '. $v."\n \n");
        $msg1 = json_decode($json_list_of_GenericAssignments);
        fwrite($logFile, __LINE__.json_last_error_msg()." \n\n");
        $msg2 = json_last_error_msg();
        $this->assertTrue($msg2 === "No error");
    }

    /**
    * Gets all of the generic assignments filtered by the fourth character in
    *   tG_AssignmentName.
    */
    public function testgetGAssignmentNamesFilteredByStartingLettersToJson()
    {
        //$logFile = fopen("/var/www/tutor/logs/
        //testGetGAssignmentNamesFilteredByStartingLettersToJson", "w");
        //$string = "\n".
        //'testGetGAssignmentNamesFilteredByStartingLettersToJson'.
        //"\n"; fwrite  ($logFile, $string);
        $this -> BuildArray();  // reset variables.
        $classInstance = new tutor\src\classes\GenericAClass;
        $r = $classInstance->deleteRowsNamed("xx");
        // get all records filtered by y and count them.
        $result_json = $classInstance->
            getGAssignmentNamesFilteredByStartingLettersToJson('xx');
        $this->assertTrue(is_null($result_json)); // records start with 'tG_';
        // add a record with y.
        $this->myArray['tG_AssignmentName'] = 'xx';
        //$this->myArray['id'] = '6';
        $classInstance->insertRecord($this->myArray); //insert record with 'xx';
        $this->myArray['tG_AssignmentName'] = 'xxy';
        //$this->myArray['id'] = '7';
        // insert another record starting with 'xxy';
        $classInstance->insertRecord($this->myArray);
        $this->myArray['tG_AssignmentName'] = 'xxz';
        //$this->myArray['id'] = '8';
        // inserts another record starting with 'xxz';
        $classInstance->insertRecord($this->myArray);
        $result_json = $classInstance->
            getGAssignmentNamesFilteredByStartingLettersToJson('xx');
        //$s = var_export($result_json, true);
        //$string='$result_json = '.$s."\n"; fwrite  ($logFile, $string);
        // now evaluate the data in y as json.
        $returned_json = json_decode($result_json);
        //$this->assertTrue($returned_json->{'tG_AssignmentName'} = 'xx');
        //$s = var_export($returned_json, true);
        //$string='$returned_json = '.$s."\n";
        //fwrite  ($logFile, $string);
        $this->assertTrue(json_last_error() === JSON_ERROR_NONE);
        switch(json_last_error())
        {
            case JSON_ERROR_DEPTH:
                $message="";// inserts another record starting with 'xx';
                $message=' - Maximum stack depth exceeded';echo $message;
                error_log  ($message, 0, '/var/www/tutor/logs/php_errors.log' );
                break;
            case JSON_ERROR_CTRL_CHAR:
                $message="";echo $message;
                $message = ' - Unexpected control character found';
                break;
            case JSON_ERROR_SYNTAX:
                $message="";echo $message;
                $message=' - Syntax error, malformed JSON';
                break;
        }
        // clean up.
        // delete the record that was added.
        $r = $classInstance->deleteRowsNamed("xx");
        $this -> assertTrue($r === 1 );
        $r = $classInstance->deleteRowsNamed("xxy");
        $this -> assertTrue($r === 1 );
        $r = $classInstance->deleteRowsNamed("xxz");
        $this -> assertTrue($r === 1 );
        $this -> BuildArray();  // reset variables.
    }

    /**
    *    Deletes the last row.
    */
    public function testdeleteLastRowInserted()
    {
        $this -> BuildArray();  // reset variables.
        $classInstance = new tutor\src\classes\GenericAClass;
        $this->assertTrue(isset($classInstance));
        $result = $classInstance->insertRecord($this->myArray);
        $result = $classInstance->deleteLastRowInserted();
        $this->assertTrue($result === 1);
        // Clean up.
        // None should be needed.
    }


    /**
    *    Deletes the last row.
    */
    public function testeditRow()
    {
        // Insert a row.  Retrieve the row.
        // Modify the row.  Retrieve the row and compare.
        $this -> BuildArray();  // reset variables.
        $classInstance = new tutor\src\classes\GenericAClass;
        $this->assertTrue(isset($classInstance));
        $mylocalArray['tG_AssignmentName']='Test';
        $mylocalArray['tG_FormName']='479gAST dummy_form.php';
        $this->myArray['tG_AssignmentName'] = 'xx';
        $result = $classInstance->deleteRowsNamed($mylocalArray['tG_AssignmentName']);
        $this->assertTrue($result === 0); // check for accidental spurious row.
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1);
        $row = $classInstance->getLastDbEntryAsArray();
        $this->assertTrue($row['tG_AssignmentName'] === $this->myArray['tG_AssignmentName']);
        $mylocalArray['id']=$row['id'];
        $result = $classInstance->editRow($mylocalArray);
        $logFile = fopen("/var/www/html/jimfuqua/tutor/logs/testeditRow", "w");
        $s = var_export($result, true);
        $string='$result = '.$s."\n";
        fwrite  ($logFile, $string);
        $this->assertTrue($result === 1);
        // Now retrieve the row and check for updated fields.
        $row2 = $classInstance->getRowFromDbAsArrayById($row['id']);
        $this->assertTrue($row2['id'] === $row['id']);
        $this->assertFalse($row2['tG_AssignmentName'] === $this->myArray['tG_AssignmentName']);
        $this->assertTrue($row2['tG_AssignmentName'] === $mylocalArray['tG_AssignmentName']);
        // clean up.
        // delete the record that was added.
        $r = $classInstance->deleteRowsNamed("Test");
        $this -> assertTrue($r === 1 );
        $this -> BuildArray();  // reset variables.
    }

    /**
    *    Deletes row with specified id field.
    */
    public function testgetRowFromDbAsArrayById()
    {
        $this -> BuildArray();  // reset variables.
        $classInstance = new tutor\src\classes\GenericAClass;
        $result = $classInstance->deleteRowsNamed('Test');
        $mylocalArray['tG_AssignmentName']='Test';
        $mylocalArray['tG_FormName']='510dummy_form.php';
        $result = $classInstance->insertRecord($mylocalArray);
        $row = $classInstance->getLastDbEntryAsArray();
        $row2 = $classInstance->getRowFromDbAsArrayById($row['id']);
        $this->assertTrue($row2['id'] === $row['id']);
        $this->assertTrue($row2['tG_AssignmentName'] === $row['tG_AssignmentName']);
        $this->assertTrue($row2['tG_FormName'] === $row['tG_FormName']);
        $result = $classInstance->deleteRowById($row2['id']);
        $this->assertTrue($result === 1);
        // clean up.
        // delete the record that was added.
        $r = $classInstance->deleteRowsNamed('Test');
        $this -> assertTrue($r === 0 );
        $this -> BuildArray();  // reset variables.
    }

    /**
    *    Deletes row with specified id field.
    */
    public function testdeleteRowById()
    {
        $this -> BuildArray();  // reset variables.
        $classInstance = new tutor\src\classes\GenericAClass;
        $this->assertTrue(isset($classInstance));
        //Can't depend on the new record not supplying own id. Can't use line above.
        $mylocalArray['tG_AssignmentName']='Test';
        $mylocalArray['tG_FormName']='537dummy_form.php';
        $results = $classInstance->deleteRowsNamed($mylocalArray['tG_AssignmentName']);
        $this->myArray['tG_AssignmentName'] = 'xyx';
        $result = $classInstance->insertRecord($mylocalArray);
        // get record back and use id.
        $row = $classInstance->getLastDbEntryAsArray();
        $this->assertTrue($row['tG_AssignmentName'] === 'Test');
        $this->assertTrue($row['tG_FormName'] === '537dummy_form.php');
        $results = $classInstance->deleteRowById($row['id']);
        $this->assertTrue($results === 1);
        $result = $classInstance->deleteRowsNamed("Test");
        // clean up.
        // delete the record that was added.
        $r = $classInstance->deleteRowsNamed('Test');
        $this -> assertTrue($r === 0 );
        $this -> BuildArray();  // reset variables.
    }

}  // end class
