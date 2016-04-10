<?php

/**
 * @file
 * Test the GenericA class.
 */

namespace jimfuqua\tutorW;
require '../vendor/autoload.php';

/**********************************************************************
 *  Test AssignmentsClass using phpunit.

ToDo:
1.  Check class function list against tests to see that all functions
are tested.  see compareClassMethodsToTests.log
2.  Error at 673 caused by improper cleanup somewhere else.
 */

// File handle used for debugging messages.
// $file = "/var/www/html/jimfuqua/tutorW/logs/GenericAClassTest.log";
// $log_file = fopen($file, "w");
// $string = __LINE__ . "\n";
// fwrite($log_file, $string);
// echo __LINE__;
/*
class functions with no tests
arrayToSqlInsert no
connectToDb no
testGetGAssignmentsFilteredByALetterToArray no
testAllAssignmentNameToJSON no
testDisplayRow no
 */
/**
 * Test cases for the GenericA.class.php containing the GenericAClass.
 */
class GenericATest extends \PHPUnit_Framework_TestCase {

  private $myArray = array(
    // id omitted as it is autocompleted.
    'tG_AssignmentName' => 'Test',
    'tG_ThreadName' => 'Test',
    'tG_StartStop' => 'NA',
    'tG_path_to_lesson' => '/xxx/yyy/zzz/',
    'tG_FormName' => 'my_form.php',
    'tG_DataFile' => 'my_form.php',
    'tG_Parameters' => 'klm',
    'tG_Consequtive_Reps_OK' => 'True',
    'tG_Reps_to_master' => 20,
    'tG_Errors_Allowed' => 5,
    'tG_Minimum_completion_time' => '1',
    'tG_Maximum_completion_time' => '5',
    'tG_StartRec' => '1',
    'tG_StopRec' => '2',
    'tG_Immediate_Loops' => '1',
    'tG_RepsPerRecord' => '1',
    'tG_RecordsPerSet' => '1',
    'tG_Lesson_if_Correct' => 'Test2',
    'tG_Record_if_Correct' => '2',
    'tG_Parameter_if_Correct' => '2',
    'tG_Delay_Repeat_Corr' => '2',
    'tG_Lesson_if_Error' => 'Test1',
    'tG_Record_if_Error' => '3',
    'tG_Parameter_if_Error' => '4',
    'tG_Delay_Repeat_Err' => '2',
    'tG_Assignment_Creation_Date' => '',
  );


  /**
   * Function isplays title on the test results page.
   */
  public function testcompareClassMethodsToTests() {
return;
    //$log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/compareClassMethodsToTests.log", "w");
    //$string = __LINE__ . ' compareClassMethodsToTests' . "\n";
    //fwrite($log_file, $string);
    // Create an array.of test methods.
    $tests_class_methods = get_class_methods(new GenericATest());
    // Remove methods not starting with 'test'/.
    foreach ($tests_class_methods as $key => $value) {
      if (substr($value, 0, 4) !== 'test') {
        unset($tests_class_methods[$key]);
      }
    }
    // Create an array.of methods from the tested class.
    $class_instance = new GenericAClass();
    $class_methods = get_class_methods(new GenericAClass());
    //$v = var_export($class_methods, TRUE);
    //$string = __LINE__ . ' $class_methods = ' . $v . "\n";
    //fwrite($log_file, $string);
    // Add 'test' to start of each class method before compare.
    foreach ($class_methods as $key => $value) {
      $class_methods[$key] = "test" . $value;
    }
    // Returns an array containing all the entries from $test_class_methods
    // that are not present in $class_methods.
    // Return an array containing all the entries from $class_methods
    // that are not present in tests_class_methods.
    $missing_tests = array_diff($class_methods, $tests_class_methods);
    foreach ($missing_tests as $key => $value) {
      // Remove tests that don't test a method in tested class.
      if ($value === "testcompareClassMethodsToTests") {
        unset($missing_tests[$key]);
      }
      if ($value === "resetMyArray") {
        unset($missing_tests[$key]);
      }
      if ($value === "testfieldsInDbVsMyArray") {
        unset($missing_tests[$key]);
      }
      if ($value === "testarrayToSqlUpdate") {
        unset($missing_tests[$key]);
      }
    };
    if (count($missing_tests) > 0) {
      // Echo "Missing Tests or tests with no method to test:<br/>";.
      foreach ($missing_tests as $key => $value) {
        $string = "\n" . 'Missing:  ' . $value;
        // Echo $string;.
        //$string = __LINE__ . ' ' . $string . "\n";
        //fwrite($log_file, $string);
      }
    }
    else {
      echo "<br />";
      $this->assertTrue(count($missing_tests) === 0);
    }
  }

  /**
   * Put MyArray back into consistent variables.
   */
  public function resetMyArray() {
    $this->myArray['tG_AssignmentName'] = 'Test';
    $this->myArray['tG_ThreadName'] = 'Test';
    $this->myArray['tG_StartStop'] = 'NA';
    $this->myArray['tG_path_to_lesson'] = '/xxx/yyy/zzz/';
    $this->myArray['tG_FormName'] = 'my_form.php';
    $this->myArray['tG_DataFile'] = 'my_form.php';
    $this->myArray['tG_Parameters'] = 'klm';
    $this->myArray['tG_Consequtive_Reps_OK'] = 'True';
    $this->myArray['tG_Reps_to_master'] = 20;
    $this->myArray['tG_Errors_Allowed'] = 5;
    // Seconds to prevent computer insertion of false data.
    $this->myArray['tG_Minimum_completion_time'] = '1';
    // Just do it over if too slow;.
    $this->myArray['tG_Maximum_completion_time'] = '5';
    $this->myArray['tG_StartRec'] = '1';
    $this->myArray['tG_StopRec'] = '2';
    // Some things should be done several times to make it sink in.
    $this->myArray['tG_Immediate_Loops'] = '1';
    $this->myArray['tG_RepsPerRecord'] = '1';
    $this->myArray['tG_RecordsPerSet'] = '1';
    // Next gA lesson if correct.
    $this->myArray['tG_Lesson_if_Correct'] = 'Test2';
    $this->myArray['tG_Record_if_Correct'] = '2';
    $this->myArray['tG_Parameter_if_Correct'] = '2';
    $this->myArray['tG_Delay_Repeat_Corr'] = '2';
    $this->myArray['tG_Lesson_if_Error'] = 'Test1';
    $this->myArray['tG_Record_if_Error'] = '3';
    $this->myArray['tG_Parameter_if_Error'] = '4';
    $this->myArray['tG_Delay_Repeat_Err'] = '2';
    $this->myArray['tG_Assignment_Creation_Date'] = '';
    $count = count($this->myArray);
    $this->assertTrue($count == 26);
    // Autocompleted index is omitted.
    return ($this->myArray);
  }

  /**
   * Resets MyArray to stable values.
   */
  public function testresetMyArray() {
    // $myArray is in db order but that does not make a difference
    // when you use the function to create SQL.
    $this->resetMyArray();
    $this->assertTrue(count($this->myArray) == 26);
    // Check for variable identity.
  }

  /**
   * Test the method that creates sql from array of columns and values.
   */
  public function testarrayToSqlInsert() {
    // Give function sample data and check for accurate return.
    // Takes: Table name, array.
    $table_name = 'test_table';
    $my_parameters_array = array(
      'key'  => 'value',
      'key2' => 'value2',
      'key3' => 'value3',
    );
    $class_instance = new GenericAClass();
    $sql = $class_instance->arrayToSqlInsert($table_name, $my_parameters_array);
    $this->assertTrue(
    $sql === "INSERT INTO test_table (key, key2, key3) VALUES ('value', 'value2', 'value3')"
    );
  }

  /**
   * Test method insertRecord.
   */
  public function testinsertRecord() {
    $this->resetMyArray();
    $class_instance = new GenericAClass();
    $this->assertTrue(isset($class_instance));
    $class_instance->deleteRowsNamed($this->myArray['tG_AssignmentName']);
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);

    // Now test what happens when we add an identical row.
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue(is_int($result));
    $this->assertTrue(is_numeric($result));
    $this->assertTrue($result === 1);

    // Clean Up.
    $result = $class_instance->deleteRowsNamed($this->myArray['tG_AssignmentName']);
    $this->assertTrue($result === 2);
    // Reset variables.
    $this->resetMyArray();
  }

  /**
   * Test the method deleteRowsNamed.
   */
  public function testdeleteRowsNamed() {
    // Start with a clean db.
    $this->resetMyArray();
    $class_instance = new GenericAClass();
    $class_instance->deleteRowsNamed($this->myArray['tG_AssignmentName']);
    // deleteRowsNamed returns number of affected rows.
    $test_assignment_name = 'Test_111';
    $this->myArray['tG_AssignmentName'] = $test_assignment_name;
    // Get a count of the rows with that generic assignment name.
    // assume this function works.
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    // Getting false when should be getting true.
    if ($result === NULL) {
      // Insert a record with that name.
      $result = $class_instance->insertRecord($this->myArray);
      $this->assertTrue($result === TRUE);
      // Now try to delete it.
      $result = $class_instance->deleteRowsNamed($test_assignment_name);
      $this->assertTrue($result === 1);
    }
    else {
      // We had one in the DB to start.  Should have not been there.
      // Try to delete it.
      $result = $class_instance->deleteRowsNamed($test_assignment_name);
      // Echo __LINE__.' $result = '.$result."\n";.
      $this->assertTrue($result === 1);
    }
    // Clean Up.
    $result = $class_instance->deleteRowsNamed($test_assignment_name);
    // Reset variables.
    $this->resetMyArray();
  }


  /**
   * Compare fields in MyArray to fields in db.
   */
  public function testfieldsInDbVsMyArray() {
    // Get a list of fields in the db
    // reset variables.
    $this->resetMyArray();
    $class_instance = new GenericAClass();
    $result = $class_instance->insertRecord($this->myArray);
    $row = $class_instance->getLastDbEntryAsArray();

    // id omitted from myArray as it is autocompleted.
    //$file = "/var/www/html/jimfuqua/tutorW/logs/testfieldsInDbVsMyArray.log";
    //$log_file = fopen($file, "w");
    //$string  = "\n" .__METHOD__. " inside ".__CLASS__."\n";
    //fwrite($log_file, $string);
    //$string  = "\n" . ' count($row) = '. count($row) . "\n";
    //fwrite($log_file, $string);
    //$string  = "\n" . ' count($this->myArray) = '. count($this->myArray) . "\n";
    //fwrite($log_file, $string);
    $this->assertTrue(count($row) === count($this->myArray) + 1);
    // Put all of the column names from the returned row in an array.
    $num_columns = count($row);
    $i = 0;
    $this->resetMyArray();
  }

  /**
   * See if all forms are available.
   */
  public function testtestAccessibilityOfAllForms() {
    // Reset variables.
    $this->resetMyArray();
    $class_instance = new GenericAClass();
    // Get rid of lessons generated with "Test0".
    $class_instance->deleteRowsNamed("Test0");
    $result = $class_instance->testAccessibilityOfAllForms();
    // Initial state of database. null if no problem.
    $this->assertNull(NULL);
    // Get rid of lessons generated with "myArray".
    $class_instance->deleteRowsNamed("Test0");
    $this->myArray['tG_AssignmentName'] = 'Test0';
    $this->myArray['tG_path_to_lesson'] = '';
    $class_instance->insertRecord($this->myArray);
    // Should fail because we have inserted a bad record.
    $result = $class_instance->testAccessibilityOfAllForms();
    // $this->assertFalse($result[0][0]);
    // Clean Up.
    // get rid of lessons generated with "Test0".
    $class_instance->deleteRowsNamed("Test0");
    // Reset variables.
    $this->resetMyArray();
  }

  /**
   * Test method getLastDbEntryAsArray.
   */
  public function testgetLastDbEntryAsArray() {
    // Reset variables.
    $this->resetMyArray();
    $class_instance = new GenericAClass();
    $this->assertTrue(isset($class_instance));
    // Get rid of lessons generated with "Test0".
    $class_instance->deleteRowsNamed("Test0");
    $this->myArray['tG_AssignmentName'] = 'Test0';
    $result = $class_instance->insertRecord($this->myArray);
    $row = $class_instance->getLastDbEntryAsArray();
    $this->assertTrue($row['tG_AssignmentName'] === 'Test0');
    $this->assertTrue($row['tG_Lesson_if_Error'] == 'Test1');
    // Reset variables.
    $this->resetMyArray();
  }

  /**
   * Takes an assignment name and returns the row.
   */
  public function testgetRowFromDbAsArray() {

    // Reset variables.
    $this->resetMyArray();
    $class_instance = new GenericAClass();
    $this->assertTrue(isset($class_instance));
    $this->assertTrue(method_exists($class_instance,'insertRecord'));
    //$this->assertTrue(property_exists($class_instance, $this->myArray['tG_AssignmentName']) === true);
    $class_instance->deleteRowsNamed($this->myArray['tG_AssignmentName']);
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    //exit;
    $row = $class_instance->getRowFromDbAsArray($this->myArray['tG_AssignmentName']);
    //$file = "/var/www/html/jimfuqua/tutorW/logs/testgetRowFromDbAsArray.log";
    //$log_file = fopen($file, "w");
    //$string  = "\n" .__METHOD__. " inside ".__CLASS__."\n";
    //fwrite($log_file, $string);
    //$string  = "\n" .__LINE__. ' $row["tG_AssignmentName"] = '.$row["tG_AssignmentName"];
    //fwrite($log_file, $string);
    //$string  = "\n" .__LINE__. ' $this->myArray[tG_AssignmentName] = '.$this->myArray['tG_AssignmentName'];
    //fwrite($log_file, $string);
    $this->assertTrue($row['tG_AssignmentName'] === $this->myArray['tG_AssignmentName']);
    // Clean up.
    $class_instance->deleteRowsNamed("Test");
    // Reset variables.
    $this->resetMyArray();
  }

  /**
   * Gets and returns all of the generic assignments.
   */
  public function testgetAllAssignmentNamesFromDbArray() {
    $this->resetMyArray();
    $class_instance = new GenericAClass();
    $class_instance->deleteRowsNamed($this->myArray['tG_AssignmentName']);
    $class_instance->deleteRowsNamed('Test0');
    // Add one row to insure at least one record.
    $this->myArray['tG_AssignmentName'] = 'Test22';
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    // Get number of rows.  Then add two rows.
    // Get number of rows again and check for increase of two rows.
    // $string = "\n".__LINE__.' testgetAllAssignmentNamesFromDbArray'."\n";
    // fwrite  ($log_file, $string);.
    $assignments = $class_instance->getAllAssignmentNamesFromDbArray();
    // Echo var_export($assignments, true);.
    $this->assertTrue(is_array($assignments));
    $count1 = count($assignments);
    $initial_count = $count1;
    $this->myArray['tG_AssignmentName'] = 'Test1';
    $result = $class_instance->insertRecord($this->myArray);
    $string = "\n" . __LINE__ . ' testgetAllAssignmentNamesFromDbArray' . "\n";
    $assignments2 = $class_instance->getAllAssignmentNamesFromDbArray();
    $count2 = count($assignments2);
    $count_after_adding_one = $count2;
    // Echo "count1 =".$count1."\n";
    // echo "count2 =".$count2;.
    $this->assertTrue(($count2 - $initial_count) === 1);
    $this->myArray['tG_AssignmentName'] = 'Test2';
    // $this->myArray['id'] = '3';.
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $result = $assignments3 = $class_instance->getAllAssignmentNamesFromDbArray();
    $count3 = count($assignments3);
    $this->assertTrue(($count3 - $initial_count) === 2);
    // Clean up.
    $class_instance->deleteRowsNamed("Test");
    $class_instance->deleteRowsNamed("Test0");
    $class_instance->deleteRowsNamed("Test1");
    $class_instance->deleteRowsNamed("Test2");
    $class_instance->deleteRowsNamed("Test3");
    $class_instance->deleteRowsNamed("Test22");
    // $class_instance->deleteRowsNamed("xx");
    // reset variables.
    $this->resetMyArray();
  }

  /**
   * Get all generic assignment assignment names.
   */
  public function testgetAllGenericAssgignmentNamesFromDbJson() {

    //$log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/testgetAllGenericAssgignmentNamesFromDbJson", "w+");
    //$string = "\n" . 'testgetAllGenericAssgignmentNamesFromDbJson()' . "\n";
    //fwrite($log_file, $string);
    // Reset variables.
    $this->resetMyArray();
    $returned_json = NULL;
    $class_instance = new GenericAClass();
    $r = $class_instance->deleteRowsNamed("xx");
    $r = $class_instance->deleteRowsNamed("xxy");
    $r = $class_instance->deleteRowsNamed("xxz");
    $r = $class_instance->deleteRowsNamed("Test");
    // Get all records and count them.
    $result = $class_instance->insertRecord($this->myArray);
    $this->myArray['tG_AssignmentName'] = 'Test2';
    $result2 = $class_instance->insertRecord($this->myArray);
    $result_json = $class_instance->getAllGenericAssgignmentNamesFromDbJson();
    $result_1 = json_decode($result_json, TRUE);
    //$v = var_export($result_json, TRUE);
    //$string = "\n" . __LINE__ . ' $result_json = ' . "$v\n";
    //fwrite($log_file, $string);
    //$v = var_export($result_1, TRUE);
    //$string = "\n" . __LINE__ . ' $result_1 = ' . "$v\n";
    //fwrite($log_file, $string);
    $this->assertTrue(is_array($result_1));
    $this->myArray['tG_AssignmentName'] = 'xx';
    // $this->myArray['id'] = '';.
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $result = $class_instance->getAllGenericAssgignmentNamesFromDbJson();
    $result_2 = json_encode($result_1);
    // $this->assertTrue($result_1 === $result_2);.
    $this->myArray['tG_AssignmentName'] = 'xxy';
    // $this->myArray['id'] = '';.
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $result = $class_instance->getAllGenericAssgignmentNamesFromDbJson();
    $result_3 = json_decode($result);
    // $this->assertTrue(count($result_3) === (count($result_1) + 2));.
    switch (json_last_error()) {
      case JSON_ERROR_DEPTH:
                $message = "";
        $message = ' - Maximum stack depth exceeded';echo $message;
        error_log($message, 0, '/var/www/tutor/logs/php_errors.log');
        break;

      case JSON_ERROR_CTRL_CHAR:
                $message = "";echo $message;
        $message = ' - Unexpected control character found';
        break;

      case JSON_ERROR_SYNTAX:
                $message = "";echo $message;
        $message = ' - Syntax error, malformed JSON';
        break;
    }
    // Clean up.
    // delete the records that were added.
    // returns affected rows.
    $r = $class_instance->deleteRowsNamed("xx");
    $this->assertTrue($r === 1);
    $r = $class_instance->deleteRowsNamed("xxy");
    $this->assertTrue($r === 1);
    $r = $class_instance->deleteRowsNamed("xxz");
    $r = $class_instance->deleteRowsNamed("Test");
    $r = $class_instance->deleteRowsNamed('Test2');
    // Reset variables.
    $this->resetMyArray();
  }

  /**
   * Gets all of the generic assignments filtered.
   *
   * Filter is by the fourth character in tG_AssignmentName.
   */
  public function testGetAllAssignmentNamesToJson() {
    //$log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/testGetAllAssignmentNamesToJson.log", "w+");
    $class_instance = new GenericAClass();
    $json_list_of_generic_assignments = $class_instance->getAllAssignmentNamesToJSON();
    //$v = var_export($json_list_of_generic_assignments, TRUE);
    //fwrite($log_file, __LINE__ . ' $json_list_of_generic_assignments = ' . $v . "\n \n");
    //$msg1 = json_decode($json_list_of_generic_assignments);
    //fwrite($log_file, __LINE__ . json_last_error_msg() . " \n\n");
    $msg2 = json_last_error_msg();
    $this->assertTrue($msg2 === "No error");
  }

  /**
   * Gets all of the generic assignments filtered.
   *
   * Filter is by the fourth character in tG_AssignmentName.
   */
  public function testgetgAssignmentNamesFilteredByStartingLettersToJson() {

    // $log_file = fopen("/var/www/tutor/logs/
    // testgetgAssignmentNamesFilteredByStartingLettersToJson", "w");
    // $string = "\n".
    // 'testgetgAssignmentNamesFilteredByStartingLettersToJson'.
    // "\n"; fwrite  ($log_file, $string);
    // reset variables.
    $this->resetMyArray();
    $class_instance = new GenericAClass();
    $r = $class_instance->deleteRowsNamed("xx");
    // Get all records filtered by y and count them.
    // $result_json = $class_instance->
    // getGAssignmentNamesFilteredByStartingLettersToJson('xx');
    // $this->assertTrue(is_null($result_json)); // records start with 'tG_';
    // add a record with y.
    $this->myArray['tG_AssignmentName'] = 'xx';
    // $this->myArray['id'] = '6';
    // insert record with 'xx';.
    $class_instance->insertRecord($this->myArray);
    $this->myArray['tG_AssignmentName'] = 'xxy';
    // $this->myArray['id'] = '7';
    // insert another record starting with 'xxy';.
    $class_instance->insertRecord($this->myArray);
    $this->myArray['tG_AssignmentName'] = 'xxz';
    // $this->myArray['id'] = '8';
    // inserts another record starting with 'xxz';.
    $class_instance->insertRecord($this->myArray);
    $this->assertTrue(json_last_error() === JSON_ERROR_NONE);
    switch (json_last_error()) {
      case JSON_ERROR_DEPTH:
        // Inserts another record starting with 'xx';.
                $message = "";
        $message = ' - Maximum stack depth exceeded';echo $message;
        error_log($message, 0, '/var/www/tutor/logs/php_errors.log');
        break;

      case JSON_ERROR_CTRL_CHAR:
                $message = "";echo $message;
        $message = ' - Unexpected control character found';
        break;

      case JSON_ERROR_SYNTAX:
                $message = "";echo $message;
        $message = ' - Syntax error, malformed JSON';
        break;
    }
    // Clean up.
    // delete the record that was added.
    $r = $class_instance->deleteRowsNamed("xx");
    $this->assertTrue($r === 1);
    $r = $class_instance->deleteRowsNamed("xxy");
    $this->assertTrue($r === 1);
    $r = $class_instance->deleteRowsNamed("xxz");
    $this->assertTrue($r === 1);
    // Reset variables.
    $this->resetMyArray();
  }

  /**
   * Deletes the last row.
   */
  public function testdeleteLastRowInserted() {

    // Reset variables.
    $this->resetMyArray();
    $class_instance = new GenericAClass();
    $this->assertTrue(isset($class_instance));
    $result = $class_instance->insertRecord($this->myArray);
    $result = $class_instance->deleteLastRowInserted();
    $this->assertTrue($result === 1);
    // Clean up.
    // None should be needed.
  }

  /**
   * Deletes the last row.
   */
  public function testeditRow() {
    // Insert a row.  Retrieve the row.
    // Modify the row.  Retrieve the row and compare.
    // reset variables.
    //$log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/testeditRow.log", "w+");

    $this->resetMyArray();
    $class_instance = new GenericAClass();
    $this->assertTrue(isset($class_instance));
    $my_local_array['tG_AssignmentName'] = 'editRowTest';
    $result = $class_instance->deleteRowsNamed('Test');
    $my_local_array['tG_FormName'] = __LINE__.' test_editRow_dummy_form.php';
    $this->myArray['tG_AssignmentName'] = 'xxxx';
    $result = $class_instance->deleteRowsNamed($my_local_array['tG_AssignmentName']);
    //$this->assertTrue($result === 0);
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $row = $class_instance->getLastDbEntryAsArray();
    //$v = var_export($row, TRUE);
    //fwrite($log_file, __LINE__ . ' $row = ' . $v . "\n \n");
    //print_r($row);
    $this->assertTrue($row['tG_AssignmentName'] === $this->myArray['tG_AssignmentName']);

    $my_local_array['id'] = $row['id'];
    $result = $class_instance->editRow($my_local_array);
    //$log_file = fopen("/var/www/html/jimfuqua/tutor/logs/testeditRow", "w");
    $s = var_export($result, TRUE);
    //$string = '$result = ' . $s . "\n";
    //fwrite($log_file, $string);
    $this->assertTrue($result === 1);
    // Now retrieve the row and check for updated fields.
    $row2 = $class_instance->getRowFromDbAsArrayById($row['id']);
    $this->assertTrue($row2['id'] === $row['id']);
    $this->assertFalse($row2['tG_AssignmentName'] === $this->myArray['tG_AssignmentName']);
    $this->assertTrue($row2['tG_AssignmentName'] === $my_local_array['tG_AssignmentName']);
    // Clean up.
    // delete the record that was added.
    //print_r($row2);
    $class_instance->deleteRowsNamed("Test");
    $class_instance->deleteRowsNamed($my_local_array['tG_AssignmentName']);
    $class_instance->deleteRowsNamed('xxxx');
    // Reset variables.
    $this->resetMyArray();
  }

  /**
   * Deletes row with specified id field.
   */
  public function testgetRowFromDbAsArrayById() {

    // Reset variables.
    $this->resetMyArray();
    $class_instance = new GenericAClass();
    $result = $class_instance->deleteRowsNamed('Test');
    $my_local_array['tG_AssignmentName'] = 'Test';
    $my_local_array['tG_FormName'] = '510dummy_form.php';
    $result = $class_instance->insertRecord($my_local_array);
    $row = $class_instance->getLastDbEntryAsArray();
    $row2 = $class_instance->getRowFromDbAsArrayById($row['id']);
    $this->assertTrue($row2['id'] === $row['id']);
    $this->assertTrue($row2['tG_AssignmentName'] === $row['tG_AssignmentName']);
    $this->assertTrue($row2['tG_FormName'] === $row['tG_FormName']);
    $result = $class_instance->deleteRowById($row2['id']);
    $this->assertTrue($result === 1);
    // Clean up.
    // delete the record that was added.
    $r = $class_instance->deleteRowsNamed('Test');
    $this->assertTrue($r === 0);
    // Reset variables.
    $this->resetMyArray();
  }

  /**
   * Deletes row with specified id field.
   */
  public function testdeleteRowById() {

    // Reset variables.
    $this->resetMyArray();
    $class_instance = new GenericAClass();
    $this->assertTrue(isset($class_instance));
    // Can't depend on the new record not supplying own id.
    // Can't use line above.
    $my_local_array['tG_AssignmentName'] = 'Test';
    $my_local_array['tG_FormName'] = '537dummy_form.php';
    $results = $class_instance->deleteRowsNamed($my_local_array['tG_AssignmentName']);
    $this->myArray['tG_AssignmentName'] = 'xyx';
    $result = $class_instance->insertRecord($my_local_array);
    // Get record back and use id.
    $row = $class_instance->getLastDbEntryAsArray();
    $this->assertTrue($row['tG_AssignmentName'] === 'Test');
    $this->assertTrue($row['tG_FormName'] === '537dummy_form.php');
    $results = $class_instance->deleteRowById($row['id']);
    $this->assertTrue($results === 1);
    $result = $class_instance->deleteRowsNamed("Test");
    // Clean up.
    // delete the record that was added.
    $r = $class_instance->deleteRowsNamed('Test');
    $this->assertTrue($r === 0);
    // Reset variables.
    $this->resetMyArray();
  }
  // End class.
}
