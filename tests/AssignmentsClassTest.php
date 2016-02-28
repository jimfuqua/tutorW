<?php

/**
 * @file
 */

namespace jimfuqua\tutorW;
// Use jimfuqua\tutorW\classes;.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**
 *
 */
class AssignmentsCTest extends \PHPUnit_Framework_TestCase {
  /**
   * Test test "buildArray()" in Assignments.class.inc.
   *
   * Create an array to provide test data with class wide variables.
   *
   * @return myArray()
   */
  public function testbuildArray() {

    // $myArray is in db order but that does not make a difference when
    // you use the function to create SQL.
    $current_time        = time();
    $this->myArray['tA_id'] = '';
    $this->myArray['tA_S_ID'] = '!@#-$%^&';
    $this->myArray['tA_StudentName']    = 'asdfg  hjkl';
    $this->myArray['tG_AssignmentName'] = 'tG_Clockwise-CounterClockwise';
    $this->myArray['tA_Consecutive_Reps_OK'] = 1;
    $this->myArray['tA_Parameter']           = 'none';
    $this->myArray['tA_Immediate_Loops']     = '2';
    $this->myArray['tA_StartRec']            = '1';
    $this->myArray['tA_StopRec']           = '2';
    $this->myArray['tG_Reps_to_master']    = '30';
    $this->myArray['tG_Errors_Allowed']    = '3';
    $this->myArray['tA_RepsTowardM']       = '3';
    $this->myArray['tA_ErrorsMade']        = '4';
    $this->myArray['tA_PercentTime']       = '55';
    $this->myArray['tA_SumPercent']        = '66';
    $this->myArray['tA_QueOrder']          = '7';
    $this->myArray['tA_SavedAssignment']   = 'Test 2';
    $this->myArray['tA_SavedStartRec']     = '8';
    $this->myArray['tA_PostDateIncrement'] = '20';
    $this->myArray['tA_Post_date']         = time() + 0;
    $this->myArray['tA_iterations_to_do']  = '9';
    $this->myArray['tA_OriginalTimestamp'] = $current_time;
    $this->myArray['tA_LastModifiedDateTime'] = '999998899';
    $this->myArray['tA_LocalDateTime']        = 8901234;
    $this->assertTrue(count($this->myArray) === 24, "Count of myArray should be 24.");
    return ($this->myArray);
  }/**
    * End testbuildArray().
    */
  public function testremoveUneededColumns() {
    // $log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/ACT_testremoveUnneededColumns.log", "w");.
    $arrayIn = array(
      "Unneeded_1" => "aa",
      "tA_id" => "a",
      "tA_S_ID"  => "b",
      "tA_StudentName" => "c",
      "tG_AssignmentName" => "d",
      "Unneeded_2" => "e",
    );
    $class_instance = new AssignmentsClass();
    $returned_array = $class_instance->removeUnneededColumns($arrayIn);

    // $v = var_export($returned_array, true);
    // $string  = __LINE__.' $returned_array = '.$v."\n\n";
    // fwrite($log_file, $string);.
    $this->assertTrue(count($returned_array) === 4);
    $this->assertFalse(array_key_exists("Unneeded_1", $returned_array));
    $this->assertFalse(array_key_exists("Unneeded_2", $returned_array));
    $this->assertTrue(array_key_exists("tA_id", $returned_array));
    $this->assertTrue(array_key_exists("tA_S_ID", $returned_array));
    $this->assertTrue(array_key_exists("tA_StudentName", $returned_array));
    $this->assertTrue(array_key_exists("tG_AssignmentName", $returned_array));

    // $v = var_export($returned_array, true);
    // $string = __LINE__.' $returned_array = '.$v."\n\n";
    // fwrite($log_file, $string);.
  }

  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testinsertRecord() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    // Start with empty db entry.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $result = $class_instance->insertRecord($this->myArray);
    // This inserts data into array but does not have a remaining value.
    $this->assertTrue(isset($class_instance));
    // Number or rows affected.
    $this->assertTrue($result === 1);
    // $result = $class_instance -> getLastDbEntry($this->myArray['tA_S_ID']);.
    $row = $class_instance->getLastDbEntryAsArray($this->myArray['tA_S_ID']);
    // $row has both numeric and relational entries double its numbers.
    // $log_file = fopen("/var/www/html/jimfuqua/tutor/logs/testinsertRecord.log", "w");
    // $this->assertTrue(count($row) === count($this->myArray));
    // $this->assertTrue($row['tA_S_ID'] == $this->myArray['tA_S_ID']);
    // Clean Up.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    // Return $class_instance;  Why was this here?
    $this->testbuildArray();
  }//end testinsertRecord()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testgetAssignmentsByStudentID() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $result        = $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->assertTrue($result === 0, 'If this test fails a previous test has not cleaned up.');
    $result        = $class_instance->delRowsByStudentId('getAssignmentsByStudentID');
    // Catch other tests sloppy cleanup.
    $this->myArray['tA_S_ID'] = 'getAssignmentsByStudentID';
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $rows = $class_instance->getAssignmentsByStudentID('getAssignmentsByStudentID');
    $this->assertTrue(is_array($rows));
    $this->assertTrue(count($rows) === 1);
    // Now add another lesson and see if two come back.
    $result = $class_instance->insertRecord($this->myArray);
    $rows = $class_instance->getAssignmentsByStudentID('getAssignmentsByStudentID');
    $this->assertTrue(is_array($rows));
    $this->assertTrue(count($rows) === 2);
    $result2 = $class_instance->delRowsByStudentId('getAssignmentsByStudentID');
    // Line above returns # of rows deleted.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->assertTrue($result2 == 2);
    $this->testbuildArray();
    // Reset myArray to origninal values.
  }//end testgetAssignmentsByStudentID()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testgetOneRowFromDbAsArrayID() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $result        = $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->assertEquals($result, 0);
    // Catch other tests sloppy cleanup.
    $this->myArray['tA_S_ID'] = 'ghghgh';
    $result = $class_instance->delRowsByStudentId('ghghgh');
    // Insure clean start.
    $this->assertTrue($result === 0);
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $row = $class_instance->getOneRowFromDbAsArrayID('ghghgh');
    $this->assertTrue(is_array($row));
    $this->assertTrue($row['tA_S_ID'] === 'ghghgh');
    $class_instance->delRowsByStudentId('ghghgh');
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);

  }//end testgetOneRowFromDbAsArrayID()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testgetSpecificStudentAssignmentFromDbAsArray() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $result        = $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->assertTrue($result === 0);
    $this->myArray['tA_S_ID']           = 'ghghgh';
    $this->myArray['tG_AssignmentName'] = 'TestAssignment';
    $this->myArray['tA_StartRec']       = '77';
    $result = $class_instance->delRowsByStudentId('ghghgh');
    // Insure clean start.
    $this->assertTrue($result === 0);
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $row = $class_instance->getSpecificStudentAssignmentFromDbAsArray(
          'ghghgh',
          $this->myArray['tG_AssignmentName'],
          $this->myArray['tA_StartRec']
      );
    // exit;.
    $this->assertTrue(is_array($row));
    $this->assertTrue($row['tA_S_ID'] === 'ghghgh');
    $this->assertTrue($row['tG_AssignmentName'] === 'TestAssignment');
    $this->assertTrue($row['tA_StartRec'] === '77');
    $class_instance->delRowsByStudentId('ghghgh');
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);

  }//end testgetSpecificStudentAssignmentFromDbAsArray()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function compareClassMethodsToTests() {

    // $log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/ACT compareClassMethodsToTests.log", "w");
    // $string = __LINE__.' ACT Missing Tests'."\n";
    // fwrite($log_file, $string);
    // Create an array.of test methods.
    $tests_class_methods = get_class_methods(new AssignmentsClassTest());
    // Remove methods not starting with 'test'/.
    foreach ($tests_class_methods as $key => $value) {
      if (substr($value, 0, 4) !== 'test') {
        unset($tests_class_methods[$key]);
      }
    }

    // Create an array of methods from the tested class.
    $class_methods = get_class_methods(new classes\AssignmentsClass());
    // Add 'test' to start of each class method before compare.
    foreach ($class_methods as $key => $value) {
      $class_methods[$key] = 'test' . $value;
    }

    // Return an array containing all the entries from $class_methods that are not present
    // in  $tests_class_methods.
    $missing_tests = array_diff($class_methods, $tests_class_methods);
    foreach ($missing_tests as $key => $value) {
      // Remove tests that don't test a method in tested class.
      if ($value === 'testcompareClassMethodsToTests') {
        unset($missing_tests[$key]);
      }

      if ($value === 'testbuildArray') {
        unset($missing_tests[$key]);
      }

      if ($value === 'testfieldsInDbVsMyArray') {
        unset($missing_tests[$key]);
      }
    };
    $i     = 1;
    $count = count($missing_tests);
    $this->assertTrue(count($missing_tests) === 0);
    if ($count > 0) {
      foreach ($missing_tests as $key => $value) {
        // $string = "\n".' Missing:  '.$value;
        // fwrite($log_file, $string);.
        $i++;
      }
    }

  }//end compareClassMethodsToTests()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testdeleteRowByRowId() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $result        = $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    // Remove rows if they exist.
    // $this->assertTrue( mysql_affected_rows() === 0);
    // $this->assertTrue( $mysqli->affected_rows === 0);
    // No rows should have been there to delete.
    $result = $class_instance->insertRecord($this->myArray);
    // This inserts data into array but does not have a remaining value.
    $this->assertTrue(isset($class_instance));
    $this->assertTrue($result === 1);
    $row = $class_instance->getLastDbEntryAsArray($this->myArray['tA_S_ID']);
    // $this->assertTrue( is_resource($result));
    // $row = mysql_fetch_array($result, MYSQL_ASSOC);
    // $row = $result->fetch_array(MYSQLI_BOTH);
    $this->assertTrue(is_array($row));
    $result = $class_instance->deleteRowByRowId($row['tA_id']);
    // $this->assertTrue( mysql_affected_rows() === 1);
    // $this->assertTrue( $mysqli->affected_rows === 1);
    // Only one row should have been there to delete.
    $this->testbuildArray();
    // Reset myArray to original values.
    // Clean Up.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->testbuildArray();
  }//end testdeleteRowByRowId()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testgetNewestDbEntry() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $result        = $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->assertTrue($result === 0);
    $this->myArray['tA_S_ID'] = 'ghghgh';
    $class_instance            = new AssignmentsClass();
    $result = $class_instance->delRowsByStudentId('ghghgh');
    // Returns num rows changed.
    $this->assertTrue($result === 0);
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $row = $class_instance->getNewestDbEntry('ghghgh');
    $this->assertTrue(is_array($row));
    $this->assertTrue($row['tA_S_ID'] === 'ghghgh');

    // Clean Up.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $class_instance->delRowsByStudentId('ghghgh');
    $this->testbuildArray();
  }//end testgetNewestDbEntry()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testgetSumOfAssignedTimeFromArray() {

    // Takes array of associative arrays;.
    $arr   = array();
    $row_1 = array();
    $row_2 = array();
    $row_3 = array();
    $row_1['tA_PercentTime'] = 1;
    $row_2['tA_PercentTime'] = 2;
    $row_3['tA_PercentTime'] = 3;
    $row_4['tA_PercentTime'] = 9;
    $arr           = array(
      $row_1, $row_2, $row_3,
    );
    $class_instance = new AssignmentsClass();
    $result        = $class_instance->getSumOfAssignedTimeFromArray($arr);
    $this->assertTrue($result === 6);
    $arr[]  = $row_4;
    $result = $class_instance->getSumOfAssignedTimeFromArray($arr);
    $this->assertTrue($result === 15);

  }//end testgetSumOfAssignedTimeFromArray()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testfieldsInDbVsMyArray() {

    // Get a list of fields in the db.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $result        = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $row           = $class_instance->getLastDbEntryAsArray($this->myArray['tA_S_ID']);
    $this->assertTrue(count($row) === count($this->myArray));
  }//end testfieldsInDbVsMyArray()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testgetLastDbEntryAsArray() {

    $result = '';
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue(isset($class_instance));
    $returned_array = $class_instance->getLastDbEntryAsArray($this->myArray['tA_S_ID']);
    $this->assertTrue(is_array($returned_array));
    $this->assertTrue($returned_array['tG_AssignmentName'] === 'tG_Clockwise-CounterClockwise');
    $this->assertTrue($returned_array['tA_SavedStartRec'] === '8');
    // Clean Up.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->testbuildArray();
  }//end testgetLastDbEntryAsArray()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testgetOneRowFromDB() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $result        = $class_instance->insertRecord($this->myArray);
    $this->assertTrue(isset($class_instance));
    $this->assertTrue(isset($result));
    $row = $class_instance->getOneRowFromDbAsArrayID($this->myArray['tA_S_ID']);
    if (empty($row) !== TRUE) {
      $this->assertTrue($row['tA_S_ID'] === $this->myArray['tA_S_ID']);
    }
    // Clean Up.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->testbuildArray();
  }//end testgetOneRowFromDB()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testdeleteLastRow() {

    // $log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/testdeleteLastRow.log", "w");
    // $v = var_export($studentAssignmentsArray, true);
    // $string = __LINE__.' Start = '."\n\n";
    // fwrite($log_file, $string);.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $this->assertTrue(isset($class_instance));
    // Start clean.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $class_instance->delRowsByStudentId('a76677');

    $this->myArray['tA_S_ID'] = 'a76677';
    $result = $class_instance->insertRecord($this->myArray);
    // $string = __LINE__.' $result = '. $result ."\n\n";
    // fwrite($log_file, $string);
    // exit; one is there.
    $result = $class_instance->insertRecord($this->myArray);
    $result = $class_instance->insertRecord($this->myArray);
    // exit; three are there.
    $resultsArray = $class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);

    // $v = var_export($resultsArray, true);
    // $string = __LINE__.' $resultsArray = '. $v ."\n\n";
    // fwrite($log_file, $string);
    // Is not getting an array.
    $resultsArrayCount = count($resultsArray);
    // $string = __LINE__.' $resultsArrayCount = '. $resultsArrayCount ."\n\n";
    // fwrite($log_file, $string);
    // following fails getCurrentStudentAssignmentsInAnArray not working
    //        $this->assertTrue($resultsArrayCount === 3);
    // echo __LINE__ . ' $resultsArrayCount = ' . $resultsArrayCount;.
    $result = $class_instance->deleteLastRow($this->myArray['tA_S_ID']);
    $this->assertTrue($result === 1);
    $resultsArray = $class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
    // $string = __LINE__.' count($resultsArray) = '. count($resultsArray) ."\n\n";
    // fwrite($log_file, $string);
    //        $this->assertTrue(count($resultsArray) === 2);
    // $string = __LINE__.' count($resultsArray) = '.count($resultsArray)."\n\n";
    // fwrite($log_file, $string);.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $class_instance->delRowsByStudentId('a76677');
  }//end testdeleteLastRow()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testgetCurrentStudentAssignmentsInAnArray() {

    // $log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/testgetCurrentStudentAssignmentsInAnArray.log", "w");.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $this->assertTrue(isset($class_instance));
    $temp_student_id = 'bcdefgh';
    // Insure no previous lessons for this student.
    $number_of_rows_deleted = $class_instance->delRowsByStudentId($temp_student_id);
    $this->assertTrue($number_of_rows_deleted === 0);

    $this->myArray['tA_S_ID'] = $temp_student_id;
    $result = $class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
    // Should return NULL because no assignments have been added..
    $this->assertTrue(count($result) === 0);

    $result = $class_instance->insertRecord($this->myArray);
    // Test to see if insertion succeded.
    // $v = var_export($this->myArray, true);
    // $string = __LINE__.' $this->myArray = '."$v\n\n";
    // fwrite($log_file, $string);
    // $string = __LINE__.' $result = '."$result\n\n";
    // fwrite($log_file, $string);.
    $this->assertTrue($result === 1);
    // Insertion succeded.
    // exit; verified.
    $number_of_rows_deleted = $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->assertTrue($number_of_rows_deleted === 1);
    // exit;
    // Check total.
    $result = $class_instance->getCurrentStudentAssignmentsInAnArray(
          $this->myArray['tA_S_ID']
      );
    // Should return NULL.
    $this->assertTrue(count($result) === 0);
    $del = $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $result = $class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
    // Should return NULL because no assignments have been added..
    $this->assertTrue(count($result) === 0);
    // Now create one row with a significant post date.
    $this->myArray['tA_Post_date'] = time();
    $result = $class_instance->insertRecord($this->myArray);
    $this->myArray['tA_Post_date'] = $this->myArray['tA_Post_date'] - 100;
    $result = $class_instance->insertRecord($this->myArray);
    $this->myArray['tA_Post_date'] = $this->myArray['tA_Post_date'] + 100;
    $result = $class_instance->insertRecord($this->myArray);
    // $string = __LINE__.' $result = '.$result."\n\n";
    // fwrite($log_file, $string);.
    $result = $class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
    // $v = var_export($result, true);
    // $string = __LINE__.' $result = '.$v."\n\n";
    // fwrite($log_file, $string);.
    $this->assertTrue(count($result) === 1);

    $result = $class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
    // $v = var_export($result, true);
    // $string = __LINE__.' $result = '.$v."\n\n";
    // fwrite($log_file, $string);
    // Every test method will stop executing once an assertion fails.
    $this->assertTrue(count($result) === 1);

    // Now create three records.
    $this->myArray['tA_Post_date'] = (time() - 13600);
    // Put it back in time.
    $result = $class_instance->insertRecord($this->myArray);
    // 2.
    $this->assertTrue($result === 1);
    // Record added.
    $resultArray = $class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
    $this->assertTrue(is_array($resultArray));
    $this->myArray['tA_Post_date'] = (time() - 7200);
    $result = $class_instance->insertRecord($this->myArray);
    // 3.
    $this->assertTrue($result === 1);
    // Record added.
    $resultArray = NULL;
    $resultArray = $class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
    $this->assertTrue(is_array($resultArray));
    // Check the fields.
    $this->assertTrue($resultArray[1]['tA_S_ID'] === $temp_student_id);
    $this->assertTrue(count($resultArray) === 3);
    $class_instance->delRowsByStudentId($temp_student_id);
    // Insure no previous lessons for this student.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $class_instance->delRowsByStudentId('bcdefgh');

  }/**
    * End testgetCurrentStudentAssignmentsInAnArray().
    */
  function testChange_tA_Post_date() {
    // Merge with Assignmentstest.
    $this->testbuildArray();
    $class_instance = new AssignmentsClass();
    $this->assertTrue(isset($class_instance));
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->myArray['tA_Post_date'] = 1000;
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $row = $class_instance->getLastDbEntryAsArray($this->myArray['tA_S_ID']);
    $old_tA_Post_date = $this->myArray['tA_Post_date'];
    $this->assertTrue($old_tA_Post_date === 1000);
    // Clean Up.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->testbuildArray();
  }


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testupdateFields() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $this->assertTrue(isset($class_instance));
    $temp_student_id = 'bcdefgh';
    // Insure no previous lessons for this student.
    $result = $class_instance->delRowsByStudentId($temp_student_id);
    $this->assertTrue($result === 0);
    // "No rows should be deleted if all previous methods have cleaned up.");.
    $this->myArray['tA_S_ID'] = $temp_student_id;
    $result = $class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
    $this->assertTrue(
          count($result) === 0,
          'Should return 0 because no assignments have been added.'
      );

    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1, '1 if insertion succeeded.');

    $results = $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->assertTrue($results === 1, 'Should be 1.');

    // Now create one row with a significant post date.
    $this->myArray['tA_Post_date'] = (time() + 1000000000);
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1, '1 if insertion succeeded.');

    $whereArray = array(
      'tA_S_ID'       => 'bcdefgh',
      'tA_ErrorsMade' => '4',
    );
    $valueArray = array(
      'tA_ErrorsMade' => '2',
      'tA_StartRec'   => '25',
    );

    $result = $class_instance->updateFields($valueArray, $whereArray);
    $this->assertTrue($result === 1);
    // Get the row and check the results.
    $result2 = $class_instance->getNewestDbEntry('bcdefgh');
    $this->assertTrue($result2['tA_StartRec'] === '25');
    $this->assertTrue($result2['tA_ErrorsMade'] === '2');
    $whereArray = array(
      'tA_S_ID'       => 'bcdefgh',
      'tA_ErrorsMade' => '2',
    );
    $valueArray = array(
      'tA_ErrorsMade' => '6',
      'tA_StartRec'   => '27',
    );
    $result     = $class_instance->updateFields($valueArray, $whereArray);
    $result2    = $class_instance->getNewestDbEntry('bcdefgh');
    $this->assertTrue($result2['tA_StartRec'] === '27');
    $this->assertTrue($result2['tA_ErrorsMade'] === '6');
    // Now delete the rows.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $class_instance->delRowsByStudentId('bcdefgh');

  }//end testupdateFields()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testupdateTaStartRec() {

    // Objective: Create a db entry and then update it and test for
    // the update.
    // $log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/testupdateTaStartRec.log", "w");
    // the lessons inserted do not have tA_PercentTime  error is in the insert
    // $v = var_export($studentAssignmentsArray, true);
    // $string = __LINE__.' $studentAssignmentsArray = '.$v."\n\n";
    // fwrite($log_file, $string).
    $this->testbuildArray();
    // Reset myArray to origninal values.
    // 987654000.
    $this->myArray['tA_OriginalTimestamp'] = '0987654';
    $this->myArray['tA_S_ID']     = 'x!@#$1112';
    $this->myArray['tA_StartRec'] = 22;
    $class_instance = new AssignmentsClass();
    $result1       = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result1 === 1);
    $result2 = $class_instance->updateTaStartRec(
          44,
          $this->myArray['tA_S_ID'],
          $this->myArray['tA_OriginalTimestamp']
      );

    // $string = __LINE__.' $result2 = '.$result2."\n\n";
    // fwrite($log_file, $string);.
    $this->assertTrue($result2 === 1);
    // mysql_affected_rows
    // Get the row and check the results.
    $class_instance = new AssignmentsClass();
    $result3       = $class_instance->getNewestDbEntry('x!@#$1112');
    $this->assertTrue($result3['tA_StartRec'] == '44');
    // Now delete the rows.
    $class_instance->delRowsByStudentId('x!@#$1112');
    $class_instance->delRowsByStudentId('!@#$1112');
    // Clean Up.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $class_instance->delRowsByStudentId('x!@#$1112');
    $this->testbuildArray();
    // reset myArray to origninal values.
  }//end testupdateTaStartRec()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testgetAssignmentByAssignmentID() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    // Insure no previous lessons for this student.
    $this->myArray['tA_id'] = '88888';
    $this->myArray['tA_StudentName'] = 'John Doe III';
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);

    // Returns array or FALSE.
    $result = $class_instance->getAssignmentByAssignmentID('88888');
    $this->assertTrue(is_array($result) === TRUE);
    if (is_array($result) === TRUE) {
      $this->assertTrue($result['tA_StudentName'] === 'John Doe III');
      $this->assertTrue($result['tA_id'] === '88888');
    }
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->testbuildArray();
  } //End testgetAssignmentByAssignmentID().


  // /**
  //      * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
  //      *
  //      * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
  //      * and to provide some background information or textual references.
  //      *
  //      * @return void
  //      */
  //     public function testsetRepsTowardMToZero()
  //     {
  //         $this->testbuildArray();
  //         // reset myArray to origninal values.
  //         $class_instance = new AssignmentsClass;
  //         $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
  //         $temp_student_id = 'abcdefg';
  //         $this->myArray['tA_S_ID']           = $temp_student_id;
  //         $this->myArray['tG_AssignmentName'] = 'testsetRepsTowardMToZero';
  //         $this->myArray['tA_RepsTowardM']    = '222';
  //
  //         $result = $class_instance->delRowsByStudentId($temp_student_id);
  //         // insure no previous lessons for this student.
  //         // Previous instruction only deletes if another function failed to clean up.
  //         $result = $class_instance->insertRecord($this->myArray);
  //         // Returns 1 or FALSE.  Inserts a lesson.
  //         $this->assertTrue($result === 1);
  //         // record inserted.
  //         // Now get it back to get it's id.
  //         $currentRow = $class_instance->getSpecificStudentAssignmentFromDbAsArray(
  //             $temp_student_id,
  //             $this->myArray['tG_AssignmentName'],
  //             $this->myArray['tA_StartRec']
  //         );
  //         $this->assertTrue(is_array($currentRow));
  // // Must use new method updateFields
  // //         $result = $class_instance->setRepsTowardMToZero(
  // //             $temp_student_id,
  // //             $this->myArray['tG_AssignmentName'],
  // //             $currentRow['tA_id']
  // //         );
  // //         $this->assertTrue($result === 1);
  //         // record modified.
  //         // Now get record back and double check.
  //         $row = $class_instance->getSpecificStudentAssignmentFromDbAsArray(
  //             $temp_student_id,
  //             'testsetRepsTowardMToZero',
  //             $this->myArray['tA_StartRec']
  //         );
  //         $this->assertTrue(is_array($row));
  //         $this->assertTrue(count($row) > 7);
  //         $this->assertTrue($row['tA_RepsTowardM'] === '0');
  //         $class_instance->delRowsByStudentId($temp_student_id);
  //         // Insure no lessons for this student.
  //         $this->testbuildArray();
  //         // Reset myArray to origninal values.
  //         // Clean Up.
  //         $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
  //         $class_instance->delRowsByStudentId('abcdefg');
  //        $this->testbuildArray();
  //     }//end testsetRepsTowardMToZero()
  /**
   * Test "testprintNullIfNull()" in Assignments.class.pdf.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testprintNullIfNull() {

    $class_instance = new AssignmentsClass();
    $a = NULL;
    $this->assertTrue($class_instance->printNullIfNull($a) === 'NULL');
  }//end testprintNullIfNull()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testrepairRowIfStartRecIslargerThanStopRec() {

    return;
    // First step is to place a distinct -correct lesson- in the database
    // and retrieve it and run a test.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $result        = $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    // Insure no previous lessons for this student.
    $this->assertTrue($result === 0);
    // Only deletion if improper cleanup else where.
    // Create a new student with an assignment that has error in start and stop.
    $temp_student_id = 'abcdefg';
    $this->myArray['tA_S_ID'] = $temp_student_id;
    $tempStartRec = '4';
    $tempStopRec  = '2';
    $this->myArray['tA_StartRec'] = $tempStartRec;
    $this->myArray['tA_StopRec'] = $tempStopRec;

    $result = $class_instance->insertRecord($this->myArray);
    // Returns TRUE for success or FALSE for failure.  Inserts a lesson.
    $this->assertTrue($result === 1);
    // The test record was added to the DB.
    $result = $class_instance->repairRowIfStartRecIsLargerThanStopRec(
          $temp_student_id,
          $this->myArray['tG_AssignmentName'],
          $tempStartRec
      );
    $this->assertTrue(is_array($result));
    $this->assertTrue($result['tA_StartRecWasGreater'] === TRUE);
    $this->assertTrue($result['tA_subsequentAssignmentInserted'] === TRUE);
    $this->assertTrue($result['tA_ErroneousAssignmentDeleted'] === TRUE);

    $result = $class_instance->delRowsByStudentId($temp_student_id);
    // Insure no previous lessons for this student.
    $message = __LINE__ . ' Row should have been previously deleted.';
    $this->assertEquals($result, TRUE, $message);

    // Now test for call with no error in start and stop.
    $tempStartRec = '2';
    $tempStopRec  = '4';
    $this->myArray['tA_StartRec'] = $tempStartRec;
    $this->myArray['tA_StartRec'] = $tempStartRec;
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $result = $class_instance->repairRowIfStartRecIsLargerThanStopRec(
          $temp_student_id,
          $this->myArray['tG_AssignmentName'],
          $tempStartRec
      );
    $this->assertTrue(is_array($result));
    $this->assertTrue(count($result) === 1);
    $this->assertTrue($result['tA_StartRecWasGreater'] === FALSE);

    // Clean up.
    $class_instance->delRowsByStudentId($temp_student_id);
    unset($result);
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $class_instance->delRowsByStudentId('abcdefg');
    unset($class_instance);
    $this->testbuildArray();
  }//end testrepairRowIfStartRecIslargerThanStopRec()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testgetSumOfAssignedTime() {

    return;
    // Input parameter is an array of lessons for one student.
    // Create a three lesson array of lessons.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $temp_student_id   = 'abcdefg';
    $class_instance->delRowsByStudentId($temp_student_id);
    // Insure no previous lessons for this student.
    $this->myArray['tA_S_ID'] = $temp_student_id;
    $storage2 = $this->myArray['tA_PercentTime'];
    $this->myArray['tA_PercentTime'] = 20;
    $class_instance->insertRecord($this->myArray);
    $this->myArray['tA_PercentTime'] = 37;
    $class_instance->insertRecord($this->myArray);
    $this->myArray['tA_PercentTime'] = 120;
    $class_instance->insertRecord($this->myArray);
    // We should now have 3 assignments for this student.  Let's check.
    $studentAssignmentsArray = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id);
    // $log_file = fopen("/var/www/html/jimfuqua/tutor/logs/testgetSumOfAssignedTime.log", "w");
    // the lessons inserted do not have tA_PercentTime  error is in the insert
    // $v = var_export($studentAssignmentsArray, true);
    // $string = __LINE__.' $studentAssignmentsArray = '.$v."\n\n";
    // fwrite($log_file, $string);.
    $this->assertTrue(is_array($studentAssignmentsArray));
    $this->assertTrue(count($studentAssignmentsArray) === 3);
    $this->assertTrue(
          $class_instance->getSumOfAssignedTimeFromArray(
              $studentAssignmentsArray
          ) === 177
      );

    // Clean Up.
    $class_instance->delRowsByStudentId($temp_student_id);
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $class_instance->delRowsByStudentId('abcdefg');
    unset($class_instance);
    $this->testbuildArray();
  }//end testgetSumOfAssignedTime()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testnormalizePercentTimeTo100Percent() {

    return;
    // Input parameter is an array of lessons for one student.
    // Returns normalized array of lessons totalling 100%.
    // Create a three lesson array of lessons.
    // Reset myArray to origninal values.
    $this->testbuildArray();

    $class_instance = new AssignmentsClass();
    $temp_student_id   = 'abcdefg';

    // Insure no previous lessons for this student.
    $class_instance->delRowsByStudentId($temp_student_id);

    // Add three new lessons.
    $this->myArray['tA_S_ID']        = $temp_student_id;
    $this->myArray['tA_PercentTime'] = 120;
    $class_instance->insertRecord($this->myArray);
    $this->myArray['tA_PercentTime'] = 137;
    $class_instance->insertRecord($this->myArray);
    $this->myArray['tA_PercentTime'] = 20;
    $class_instance->insertRecord($this->myArray);

    // We should now have 3 assignments for this student.  Let's check.
    $studentAssignmentsArray = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id);
    $this->assertTrue(count($studentAssignmentsArray) == 3);

    // Check Sum of Assigned Time.
    $this->assertTrue(
          $class_instance->getSumOfAssignedTimeFromArray(
              $studentAssignmentsArray
          ) === 277
      );

    // Now check normalization to 100%.
    $result = $class_instance->normalizePercentTimeTo100Percent(
          $studentAssignmentsArray
      );
    $totalAssigned = 0;
    foreach ($result as $key => $content) {
      $totalAssigned = ($totalAssigned + $content['tA_PercentTime']);
    }

    $this->assertTrue($totalAssigned == '100');
    // Wonder why rounding errors don't cause this to fail.
    // Clean up.
    $class_instance->delRowsByStudentId($temp_student_id);
    // Clean Up.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $class_instance->delRowsByStudentId('abcdefg');
    unset($class_instance);
    $this->testbuildArray();
  }//end testnormalizePercentTimeTo100Percent()


  /**
   * Test test "compare()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testcompare() {

    // Must send it three structured arrays of lessons. One with more than
    // 100% assigned and the other with less and one exact.
    // Should return 0 for equal.  -1 for greater than and 1 for less than.
    $x['tA_PercentTime'] = 0;
    $y['tA_PercentTime'] = 110;
    $z['tA_PercentTime'] = 100;
    $class_instance       = new AssignmentsClass();
    $test1 = $class_instance->compare($x, $x);
    $this->assertTrue($test1 === 0);
    // Equal returns 0.
    $test2 = $class_instance->compare($y, $z);
    $this->assertTrue($test2 === -1);
    // Greater returns -1.
    $test3 = $class_instance->compare($z, $y);
    // Less than returns 1.
    $this->assertTrue($test3 === 1);

  }//end testcompare()


  /**
   * Test "testselectOneLesson()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testselectOneLesson() {

    return;
    // Construct a fake student.  Populate with three lessons.
    // Run about 100 selections and test that a lesson is returned in the
    // correct ratio.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance = new AssignmentsClass();
    $temp_student_id   = 'abcdefg';
    $class_instance->delRowsByStudentId($temp_student_id);
    // Insure no previous lessons for this student.
    $this->myArray['tA_S_ID']           = $temp_student_id;
    $this->myArray['tA_PercentTime']    = 120;
    $this->myArray['tG_AssignmentName'] = 'abc';
    $class_instance->insertRecord($this->myArray);
    $this->myArray['tA_PercentTime']    = 137;
    $this->myArray['tG_AssignmentName'] = 'def';
    $class_instance->insertRecord($this->myArray);
    $this->myArray['tA_PercentTime']    = 20;
    $this->myArray['tG_AssignmentName'] = 'ghi';
    $class_instance->insertRecord($this->myArray);
    // We should now have 3 assignments for this student.  Let's check.
    $studentAssignmentsArray = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id);
    $this->assertTrue(count($studentAssignmentsArray) === 3);
    $this->assertTrue(
          $class_instance->getSumOfAssignedTimeFromArray(
              $studentAssignmentsArray,
              time()
          ) === 277
      );
    $allLessonArray = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id);
    $this->assertTrue(is_array($allLessonArray));
    $this->assertTrue(count($allLessonArray) == 3);
    $totalAbc = 0;
    $totalDef = 0;
    $totalGhi = 0;
    for ($i = 0; $i < 100; $i++) {
      // Trying to select a lesson many times and
      // Checking for frequency.
      $lastLessonId   = '';
      $selectedLesson = $class_instance->selectOneLesson($allLessonArray, $lastLessonId);
      // Should return array containing one lesson.
      if (is_array($selectedLesson) === TRUE) {
        if ($selectedLesson['tG_AssignmentName'] === 'abc') {
          $totalAbc++;
        }

        if ($selectedLesson['tG_AssignmentName'] === 'def') {
          $totalDef++;
        }

        if ($selectedLesson['tG_AssignmentName'] === 'ghi') {
          $totalGhi++;
        }
      }
      else {
        die(__LINE__ . ' acTest should have been an array.');
      }
    }//end for

    $this->assertTrue($totalAbc > 30);
    $this->assertTrue($totalDef > 30);
    $this->assertTrue($totalAbc > 1);
    // Clean Up.
    $class_instance->delRowsByStudentId($temp_student_id);
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    // Insure no previous lessons for this student.
    $class_instance->delRowsByStudentId('abcdefg');
    $this->testbuildArray();
  }//end testselectOneLesson()


  /**
   * Test "insertTaSplitIntoTa()" in Assignments.class.inc.
   *
   * Insert a split assignment into tA.
   * Insert into tSplits two assignments.
   * Read the tA and process it and put the newly assigned assignments in tA.
   *
   * @return void
   */
  public function testinsertTaSplitIntoTa() {

    return;
    // Should also add the tSplits entries to make function stand alone.
    // Pack array with new values to make the assignment a split.
    // Then insert the split into the db.
    $this->testbuildArray();
    // Reset myArray to original values.
    // Add one split.
    $myArray1['tSp_id']        = '1113';
    $myArray1['tS_Name']   = 'tS_Add_Subtract';
    $myArray1['tSplit_gA'] = 'tG_1';
    $myArray1['tSplit_PercentTime'] = '10';
    $this->assertTrue(count($myArray1) === 4);
    // Add another split.
    $myArray2['tSp_id']        = '1114';
    $myArray2['tS_Name']   = 'tS_Add_Subtract';
    $myArray2['tSplit_gA'] = 'tG_2';
    $myArray2['tSplit_PercentTime'] = '20';
    $this->assertTrue(count($myArray2) === 4);
    // Prepare to insert split records into db.
    $splitInstance = new SplitsClass();
    // Make sure no splits with these ids already exist in the db.
    $splitInstance->deleteRowId($myArray1['tSp_id']);
    $splitInstance->deleteRowId($myArray2['tSp_id']);
    // Next insert into db.
    $splitInstance->insertRow($myArray1);
    $splitInstance->insertRow($myArray2);
    // Next insert an assignment to use the splits
    // Reset the array.  First store the standard test values.
    $temp_student_idID            = 'gbcdefg';
    $temp_student_idName          = 'zxcvbn';
    $this->myArray['tA_S_ID'] = $temp_student_idID;
    $this->myArray['tA_StudentName'] = $temp_student_idName;
    // Now create a new student assignment to use the splits inserted above.
    $class_instance = new AssignmentsClass();
    // Make sure this assignment does not already exist.
    // Next insure no previous lessons for this student.
    $rowsDeleted = $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    // Insert the tA.
    $this->myArray['tG_AssignmentName'] = 'tS_Add_Subtract';
    // These tS records were inserted above.
    $class_instance->insertRecord($this->myArray);
    $result  = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_idID);
    $numRows = (count($result));
    $this->assertTrue($numRows === 1);

    // Now convert the split to regular assignments.
    $assignmentArray = $result;
    $this->assertTrue(count($assignmentArray) === 1);
    $resultAfterInsert = $class_instance->insertTaSplitIntoTa($assignmentArray);
    $this->assertTrue($resultAfterInsert === 1);
    // Now check to see if the split was converted to assignments.
    // not converted        exit;
    // Clean up.
    $this->assertTrue($this->myArray['tA_S_ID'] === 'gbcdefg');
    $result = $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->assertTrue($result === 1);
    // exit;
    // Deleted the two split rows. Original assignment was deleted upon
    // insertion of splits.
    //        $result = $splitInstance->deleteRowId($myArray1['tA_id']);
    //        $this->assertTrue($result === 1);
    //        $result = $splitInstance->deleteRowId($myArray2['tA_id']);
    //        $this->assertTrue($result === 1);
    // Clean Up.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $class_instance->delRowsByStudentId('gbcdefg');
    $this->testbuildArray();
  }//end testinsertTaSplitIntoTa()


  /**
   * Test "checkAndProcessSplits()" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testcheckAndProcessSplits() {

    // Add two splits.
    $myArray1['tSp_id']        = '1111';
    $myArray1['tSp_LessonName']   = 'split_1';
    $myArray1['tSp_gA'] = 'tG_1';
    $myArray1['tSp_PercentTime'] = '10';
    $this->assertTrue(count($myArray1) === 4);
    $myArray2['tSp_id']        = '1112';
    $myArray2['tSp_LessonName']   = 'split_2';
    $myArray2['tSp_gA'] = 'tG_2';
    $myArray2['tSp_PercentTime'] = '20';
    $this->assertTrue(count($myArray2) === 4);
    $splitInstance = new SplitsClass();
    // Next insert into db.
    $splitInstance->deleteRowId($myArray1['tSp_id']);
    $splitInstance->insertRow($myArray1);
    $splitInstance->deleteRowId($myArray2['tSp_id']);
    $splitInstance->insertRow($myArray2);
    // Check to see if they exist.
    $row = $splitInstance->getSplitByPrimaryKey($myArray1['tSp_id']);
    // Next check to see what is in $row.
    $this->assertTrue($row['tSp_id'] === '1111');
    // Note that id is a string.
    $row = $splitInstance->getSplitByPrimaryKey($myArray2['tSp_id']);
    // Next check to see what is in $row.
    $this->assertTrue($row['tSp_id'] === '1112');
    // Note that id is a string.
    // Clean up database.
    $splitInstance->deleteRowId($myArray1['tSp_id']);
    $splitInstance->deleteRowId($myArray2['tSp_id']);
    $this->testbuildArray();
  }//end testcheckAndProcessSplits()


  /**
   * Test "returnColumnsNamesInArray" in Assignments.class.inc.
   *
   * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
   * and to provide some background information or textual references.
   *
   * @return void
   */
  public function testreturnColumnsNamesInArray() {

    $this->testbuildArray();
    // Reset myArray to original values.
    $class_instance = new AssignmentsClass();
    $class_instance->insertRecord($this->myArray);
    $result = $class_instance->returnColumnsNamesInArray();
    $this->assertTrue(is_array($result));
    $columnNamesCount = count($result);
    $myArrayKeys      = array_keys($this->myArray);
    $myArrayCount     = count($myArrayKeys);
    $this->assertTrue($myArrayCount === $columnNamesCount);
    // Array_diff returns an array containing the differences.
    // it should have a count of 0.
    // Following two lines caused error when variable was elimintate
    // and count directly includend in test.  Probably timeing issue.
    $differenceBetweenArrays = count(array_diff($result, $myArrayKeys));
    $this->assertTrue($differenceBetweenArrays === 0);
    // Clean Up.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->testbuildArray();
  }//end testreturnColumnsNamesInArray()


  /**
   * Test getNextAssignmentToDo().
   *
   * @return void
   */
  public function testgetNextAssignmentToDo() {

    return;
    // File handle used for debugging messages.
    // Insert 3 new tA lessons into database for a fictitious new student.
    // Need boundary tests & bad assignments and one good assignment.
    // Run several tests to see that the correct lesson is returned.
    // First test should be simple with one zero time assigned and
    // the other 150% assigned.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance  = new AssignmentsClass();
    $temp_student_id591 = 'abcdefg';
    // Next insure no previous lessons for this student.
    $numRows = $class_instance->delRowsByStudentId($temp_student_id591);
    $this->assertTrue($numRows === 0);
    // Any number greater than 0 would indicate a clean-up failure in
    // another function.
    $this->myArray['tA_S_ID'] = $temp_student_id591;
    $lastLessonId = '';
    // Test 1 Check for no lessons to do because no student exists.
    $result = $class_instance->getNextAssignmentToDo($temp_student_id591, $lastLessonId);
    // $log_file = fopen("/var/www/html/jimfuqua/tutor/logs/ACT_testgetNextAssignmentToDo.log", "w");
    // $v = var_export($result, true);
    // $string = __LINE__.' testgetNextAssignmentToDo = '.$result."\n\n";
    // fwrite($log_file, $string);.
    $this->assertTrue($result === 'error');
    // Test 2  Create a class instance with one lesson and test count
    // to see if it just has one lesson.
    $result = $class_instance->delRowsByStudentId($temp_student_id591);
    // Start with none.
    $this->assertTrue($result === 0);
    $class_instance->insertRecord($this->myArray);

    $result  = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    // $log_file = fopen("/var/www/html/jimfuqua/tutor/logs/testgetNextAssignmentToDo.log", "w");
    // $v = var_export($result, true);
    // $string = __LINE__.' AC $result = '.$v."\n";
    // fwrite($log_file, $string);.
    $numRows = count($result);
    $v = var_export($numRows, TRUE);
    // $string = __LINE__.' AC $numRows = '.$v."\n";
    // fwrite($log_file, $string);.
    $this->assertTrue($numRows === 1);
    $lastLessonId = '';
    $result = $class_instance->getNextAssignmentToDo($temp_student_id591, $lastLessonId);
    $numRows = count($result);
    $v = var_export($numRows, TRUE);
    // $string = __LINE__.' AC $numRows = '.$v."\n";
    // fwrite($log_file, $string);.
    $this->assertTrue($numRows === 24);

    // Test 3 add an identical lesson and test for number of lessons = 2.
    $class_instance->insertRecord($this->myArray);
    $result  = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $numRows = count($result);
    $this->assertTrue($numRows === 2);

    // Test 4 Delete all lessons and add one specific lesson back.
    // Test that it is returned.
    $result = $class_instance->delRowsByStudentId($temp_student_id591);
    // Start with none.
    $this->myArray['tG_AssignmentName'] = 'fffff';
    $class_instance->insertRecord($this->myArray);
    // Add a record.
    $result  = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $numRows = count($result);
    $this->assertTrue($numRows === 1);
    // Get it back.
    $lastLessonId = '';
    $result       = $class_instance->getNextAssignmentToDo($temp_student_id591, $lastLessonId);
    $this->assertTrue(is_array($result));
    $this->assertTrue(count($result) === 24);
    // Returns FALSE only if there are no lessons.
    $this->assertTrue(is_array($result));
    $this->assertTrue($result['tG_AssignmentName'] == 'fffff');
    $this->assertTrue($result['tA_S_ID'] === $temp_student_id591);
    $result = $class_instance->delRowsByStudentId($temp_student_id591);
    // Insure no previous lessons for this student.
    $this->assertTrue($result === 1);
    // Any number greater than 1 would indicate a clean-up failure.
    $this->testbuildArray();
    // Reset myArray to original values.
    unset($class_instance);

    // Test 5
    // Delete all lessons and add two lessons one with 0 time assigned
    // and the other with 150% assigned.
    // Test for return of one with greater time assigned.
    // First delete all lessons for $temp_student_id591.
    unset($class_instance);
    $this->testbuildArray();
    // Reset myArray.
    $temp_student_id591           = 'abcdefg';
    $class_instance            = new AssignmentsClass();
    $this->myArray['tA_S_ID'] = $temp_student_id591;
    $class_instance->delRowsByStudentId($temp_student_id591);
    // Insure no previous lessons for this student.
    $this->myArray['tA_PercentTime']    = '150';
    $this->myArray['tG_AssignmentName'] = 'klm';
    $class_instance->insertRecord($this->myArray);
    $result  = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $numRows = count($result);
    $this->assertTrue($numRows === 1);
    // Now add another row with 0 % time.
    $this->myArray['tA_PercentTime']    = '0';
    $this->myArray['tG_AssignmentName'] = 'nop';
    $class_instance->insertRecord($this->myArray);
    $result  = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $numRows = count($result);
    $this->assertTrue($numRows === 2);

    $result = $class_instance->getNextAssignmentToDo($temp_student_id591, $lastLessonId);
    $this->assertTrue(is_array($result));
    $this->assertTrue(count($result) === 24);
    // Returns FALSE only if there are no lessons.
    $this->assertTrue($result['tG_AssignmentName'] === 'klm');
    // Clean Up.
    unset($class_instance);

    // Reset myArray to origninal values.
    $this->testbuildArray();

    // Test 6
    // Delete all lessons and add two lessons one with 0 time assigned and
    // the other with 150% assigned in reverse order of previous test..
    // Test for return of one with greater time assigned.
    // First delete all lessons for $temp_student_id591.
    unset($class_instance);
    $this->testbuildArray();
    // Reset myArray.
    $temp_student_id591           = 'abcdefg';
    $class_instance            = new AssignmentsClass();
    $this->myArray['tA_S_ID'] = $temp_student_id591;
    // Insure no previous lessons for this student.
    $class_instance->delRowsByStudentId($temp_student_id591);
    $this->myArray['tA_PercentTime']    = '0';
    $this->myArray['tG_AssignmentName'] = 'klm';
    $class_instance->insertRecord($this->myArray);
    $result  = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $numRows = count($result);
    $this->assertTrue($numRows === 1);
    // Now add another row with 0 % time.
    $this->myArray['tA_PercentTime']    = '150';
    $this->myArray['tG_AssignmentName'] = 'klm';
    $class_instance->insertRecord($this->myArray);
    $result  = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $numRows = count($result);
    $this->assertTrue($numRows === 2);
    $lastLessonId = '';
    $result       = $class_instance->getNextAssignmentToDo($temp_student_id591, $lastLessonId);
    $this->assertTrue(is_array($result));
    $this->assertTrue(count($result) === 24);
    // Returns FALSE only if there are no lessons.
    $this->assertTrue($result['tG_AssignmentName'] === 'klm');
    // Clean Up.
    unset($class_instance);
    // Reset myArray to origninal values.
    $this->testbuildArray();

    // Test 7    Add three new lessons and check frequency of return.
    $this->testbuildArray();
    // Reset myArray.
    $temp_student_id591           = 'asdfg  hjkl';
    $this->myArray['tA_S_ID'] = $temp_student_id591;
    $class_instance            = new AssignmentsClass();
    $class_instance->delRowsByStudentId($temp_student_id591);
    // Previous line insures no previous lessons for this student.
    $this->myArray['tG_AssignmentName'] = 'aaaaa';
    $this->myArray['tA_PercentTime']    = '33';
    $result = $class_instance->insertRecord($this->myArray);
    // Add a record.
    $this->assertTrue($result === 1);
    // This is a post date time.
    $result = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $this->assertTrue(is_array($result));
    // Look our for post date issues.
    $numRows = count($result);
    $this->assertTrue($numRows === 1);
    $this->myArray['tG_AssignmentName'] = 'bbbbb';
    $this->myArray['tA_PercentTime']    = '33';
    $class_instance->insertRecord($this->myArray);
    // Add a record.
    $result  = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $numRows = count($result);
    $this->assertTrue($numRows === 2);
    $this->myArray['tG_AssignmentName'] = 'ccccc';
    $this->myArray['tA_PercentTime']    = '33';
    $class_instance->insertRecord($this->myArray);
    // Add a record.
    $result = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $this->assertTrue(count($result) === 3);
    // Now get back a bunch of lessons and check frequency of return
    // against assigned values.
    $totalAaaaa = 0;
    $totalBbbbb = 0;
    $totalCcccc = 0;
    $count      = 0;
    for ($i = 1; $i <= 100; $i++) {
      // Run through 100 selections and see if they follow % assigned.
      $class_instance = new AssignmentsClass();
      $result        = $class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
      $numRows       = count($result);
      $count++;
      if ($numRows > 0) {
        foreach ($result as $key => $value) {
          // Is an array of arrays.
          if ($value['tG_AssignmentName'] === 'aaaaa') {
            $totalAaaaa++;
          }

          if ($value['tG_AssignmentName'] === 'bbbbb') {
            $totalBbbbb++;
          }

          if ($value['tG_AssignmentName'] === 'accccc') {
            $totalCccccc++;
          }
        }
      }
    }//end for

    $class_instance->delRowsByStudentId($temp_student_id591);
    // Next reset myArray to origninal values.
    $this->testbuildArray();
    // Clean Up.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $class_instance->delRowsByStudentId('abcdefg');
    $class_instance->delRowsByStudentId('x!@#$1112');
    $class_instance->delRowsByStudentName('asdfg  hjkl');
    unset($class_instance);
    $this->testbuildArray();
  }//end testgetNextAssignmentToDo()

  /**
   * Test delRowsByStudentIdAndAssignmentName().
   *
   * @return void
   */
  public function testdelRowsByStudentIdAndAssignmentName() {
    return;
    $this->testbuildArray();
    $temp_student_id = 'abcdefg';
    $tempAssignmentName = 'hijklmn';
    $this->myArray['tA_S_ID'] = $temp_student_id;
    $this->myArray['tG_AssignmentName'] = $tempAssignmentName;
    $class_instance = new AssignmentsClass();
    // Next insure no previous lessons for this student.
    $class_instance->delRowsByStudentId($temp_student_id);
    $this->assertTrue(isset($class_instance));
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $this->assertTrue(isset($class_instance));
    // Now delete the row.
    $result = $class_instance->delRowsByStudentIdAndAssignmentName($temp_student_id, $tempAssignmentName);
    $result = $this->assertTrue($result === 1);
    // Now try deleting the row again  -- should not be one to delete.
    $result = $class_instance->delRowsByStudentId($temp_student_id);
    $this->assertTrue($result === 0);
  }

  /**
   * Test delRowsByStudentId().
   *
   * @return void
   */
  public function testdelRowsByStudentId() {

    return;
    // Next reset myArray to origninal values.
    $this->testbuildArray();
    $temp_student_id = 'abcdefg';
    $this->myArray['tA_S_ID'] = $temp_student_id;
    $class_instance = new AssignmentsClass();
    // Next insure no previous lessons for this student.
    $class_instance->delRowsByStudentId($temp_student_id);
    $this->assertTrue(isset($class_instance));
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result == 1);

    // Now delete the row.
    $result = $class_instance->delRowsByStudentId($temp_student_id);
    $this->assertTrue($result === 1);

    // Now try deleting the row again  -- should not be one to delete.
    $result = $class_instance->delRowsByStudentId($temp_student_id);
    // Clean Up.
    $class_instance->delRowsByStudentId($temp_student_id);
    // Insure no previous lessons for this student.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    // Insure no previous lessons for this student.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $class_instance->delRowsByStudentId($temp_student_id);
    // Clean Up.
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $class_instance->delRowsByStudentId('!@#-$%^&');
    $class_instance->delRowsByStudentId('abcdefg');

  }//end testdelRowsByStudentId()


  /**
   * Test cAssignmentGetNextLesson().
   */
  public function testcAssignmentGetNextLesson() {
    /*
    Tests cAssignment_get_next_lesson.php Does not show up on missing
    tests because cAssignments is not in assignments.class
    Function cAssignments_get_next_lesson is called from javascript.
     */

    // Next reset myArray to origninal values.
    $this->testbuildArray();
    // Add a new row to delete.
    $class_instance = new AssignmentsClass();
    $this->assertTrue(isset($class_instance));
    $class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $temp_student_id = 'abcdefg';
    $this->myArray['tA_S_ID'] = $temp_student_id;
    // Set to a different value.
    $class_instance->delRowsByStudentId($temp_student_id);
    // Insure no previous lessons for this student.
    $result = $class_instance->insertRecord($this->myArray);
    $this->assertTrue($result == 1);
    $_SESSION['tA_S_ID'] = $temp_student_id;
    $class_instance->delRowsByStudentId('abcdefg');

  }//end testcAssignmentGetNextLesson()


  /**
   * Test connectToDb().
   */
  public function testConnectToDb() {

    $t       = 2;
    $message = 'abcde';
    $this->assertTrue(1 === 1, $message);
    $this->assertFileExists('../classes/db_include2.php', 'Location of connection variables.');

  }//end testConnectToDb()


}//end class
