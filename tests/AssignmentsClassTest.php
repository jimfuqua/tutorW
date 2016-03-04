<?php

/**
 * @file
 * Test the AssignmentsClass.
 */

namespace jimfuqua\tutorW;
// Use jimfuqua\tutorW\classes;.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$directory = __DIR__;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
if ($directory === '/var/www/html/jimfuqua/tutorW/tests') {
  require '../vendor/autoload.php';
}
else {
  require '../../vendor/autoload.php';
}

/**
 * Class description.
 */
class AssignmentsCTest extends \PHPUnit_Framework_TestCase {
  /**
   * Test test "buildArray()" in Assignments.class.inc.
   *
   * Create an array to provide test data with class wide variables.
   *
   * @return myArray()
   */

  public $myArray = array(
    'tA_id' => '',
    'tA_S_ID' => '!@#-$%^&',
    'tA_StudentName' => 'asdfg  hjkl',
    'tG_AssignmentName' => 'tG_C
    lockwise-CounterClockwise',
    'tA_Consecutive_Reps_OK' => 1,
    'tA_Parameter' => 'none',
    'tA_Immediate_Loops' => '2',
    'tA_StartRec' => '1',
    'tA_StopRec' => '2',
    'tG_Reps_to_master' => '30',
    'tG_Errors_Allowed' => '3',
    'tA_RepsTowardM' => '3',
    'tA_ErrorsMade' => '4',
    'tA_PercentTime' => '55',
    'tA_SumPercent' => '66',
    'tA_QueOrder' => '7',
    'tA_SavedAssignment' => 'Test 2',
    'tA_SavedStartRec' => '8',
    'tA_PostDateIncrement' => '20',
    'tA_Post_date' => '',
    'tA_iterations_to_do' => '9',
    'tA_OriginalTimestamp' => '',
    'tA_LastModifiedDateTime' => '999998899',
    'tA_LocalDateTime' => 8901234,
  );

  /**
   * Resets the values in $this->myArray.
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
    $this->myArray['tA_RepsTowardM'] = '3';
    $this->myArray['tA_ErrorsMade']        = '4';
    $this->myArray['tA_PercentTime'] = '55';
    $this->myArray['tA_SumPercent']        = '66';
    $this->myArray['tA_QueOrder']          = '7';
    $this->myArray['tA_SavedAssignment']   = 'Test 2';
    $this->myArray['tA_SavedStartRec']     = '8';
    $this->myArray['tA_PostDateIncrement'] = '20';
    $this->myArray['tA_Post_date']         = '';
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
    // $log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/
    // ACT_testremoveUnneededColumns.log", "w");.
    $array_in = array(
      "Unneeded_1" => "aa",
      "tA_id" => "a",
      "tA_S_ID"  => "b",
      "tA_StudentName" => "c",
      "tG_AssignmentName" => "d",
      "Unneeded_2" => "e",
    );
    $ac_class_instance = new AssignmentsClass();
    $returned_array = $ac_class_instance->removeUnneededColumns($array_in);

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
   */
  public function testinsertRecord() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    // Start with empty db entry.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $result = $ac_class_instance->insertRecord($this->myArray);
    // This inserts data into array but does not have a remaining value.
    $this->assertTrue(isset($ac_class_instance));
    // Number or rows affected.
    $this->assertTrue($result === 1);
    $row = $ac_class_instance->getLastDbEntryAsArray(
      $this->myArray['tA_S_ID']
    );
    // $row has both numeric and relational entries double its numbers.
    // $log_file = fopen("/var/www/html/jimfuqua/
    // tutor/logs/testinsertRecord.log", "w");
    // $this->assertTrue(count($row) === count($this->myArray));
    // $this->assertTrue($row['tA_S_ID'] == $this->myArray['tA_S_ID']);
    // Clean Up.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    // Return $ac_class_instance;  Why was this here?
    $this->testbuildArray();
  }//end testinsertRecord()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testgetAssignmentsByStudentId() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    $result        = $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->assertTrue($result === 0, 'If this test fails a previous test has not cleaned up.');
    $result        = $ac_class_instance->delRowsByStudentId('getAssignmentsByStudentID');
    // Catch other tests sloppy cleanup.
    $this->myArray['tA_S_ID'] = 'getAssignmentsByStudentID';
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $rows = $ac_class_instance->getAssignmentsByStudentID('getAssignmentsByStudentID');
    $this->assertTrue(is_array($rows));
    $this->assertTrue(count($rows) === 1);
    // Now add another lesson and see if two come back.
    $result = $ac_class_instance->insertRecord($this->myArray);
    $rows = $ac_class_instance->getAssignmentsByStudentID('getAssignmentsByStudentID');
    $this->assertTrue(is_array($rows));
    $this->assertTrue(count($rows) === 2);
    $result2 = $ac_class_instance->delRowsByStudentId('getAssignmentsByStudentID');
    // Line above returns # of rows deleted.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->assertTrue($result2 == 2);
    $this->testbuildArray();
    // Reset myArray to origninal values.
  }//end testgetAssignmentsByStudentId()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testGetOneRowFromDbAsArrayId() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    $result        = $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->assertEquals($result, 0);
    // Catch other tests sloppy cleanup.
    $this->myArray['tA_S_ID'] = 'ghghgh';
    $result = $ac_class_instance->delRowsByStudentId('ghghgh');
    // Insure clean start.
    $this->assertTrue($result === 0);
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $row = $ac_class_instance->getOneRowFromDbAsArrayID('ghghgh');
    $this->assertTrue(is_array($row));
    $this->assertTrue($row['tA_S_ID'] === 'ghghgh');
    $ac_class_instance->delRowsByStudentId('ghghgh');
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);

  }//end testGetOneRowFromDbAsArrayId()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testgetSpecificStudentAssignmentFromDbAsArray() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    $result = $ac_class_instance->delRowsByStudentId(
      $this->myArray['tA_S_ID']
    );
    $this->assertTrue($result === 0);
    $this->myArray['tA_S_ID']           = 'ghghgh';
    $this->myArray['tG_AssignmentName'] = 'TestAssignment';
    $this->myArray['tA_StartRec']       = '77';
    $result = $ac_class_instance->delRowsByStudentId('ghghgh');
    // Insure clean start.
    $this->assertTrue($result === 0);
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $row = $ac_class_instance->getSpecificStudentAssignmentFromDbAsArray(
          'ghghgh',
          $this->myArray['tG_AssignmentName'],
          $this->myArray['tA_StartRec']
      );
    // exit;.
    $this->assertTrue(is_array($row));
    $this->assertTrue($row['tA_S_ID'] === 'ghghgh');
    $this->assertTrue($row['tG_AssignmentName'] === 'TestAssignment');
    $this->assertTrue($row['tA_StartRec'] === '77');
    $ac_class_instance->delRowsByStudentId('ghghgh');
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);

  }//end testgetSpecificStudentAssignmentFromDbAsArray()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function compareClassMethodsToTests() {

    // $log_file = fopen("/var/www/html/jimfuqua/tutorW/
    // logs/ACT compareClassMethodsToTests.log", "w");
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

    // Return an array containing all the entries from $class_methods
    // that are not present in  $tests_class_methods.
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
   */
  public function testdeleteRowByRowId() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    $result        = $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    // Remove rows if they exist.
    // $this->assertTrue( mysql_affected_rows() === 0);
    // $this->assertTrue( $mysqli->affected_rows === 0);
    // No rows should have been there to delete.
    $result = $ac_class_instance->insertRecord($this->myArray);
    // This inserts data into array but does not have a remaining value.
    $this->assertTrue(isset($ac_class_instance));
    $this->assertTrue($result === 1);
    $row = $ac_class_instance->getLastDbEntryAsArray($this->myArray['tA_S_ID']);
    // $this->assertTrue( is_resource($result));
    // $row = mysql_fetch_array($result, MYSQL_ASSOC);
    // $row = $result->fetch_array(MYSQLI_BOTH);
    $this->assertTrue(is_array($row));
    $result = $ac_class_instance->deleteRowByRowId($row['tA_id']);
    // $this->assertTrue( mysql_affected_rows() === 1);
    // $this->assertTrue( $mysqli->affected_rows === 1);
    // Only one row should have been there to delete.
    $this->testbuildArray();
    // Reset myArray to original values.
    // Clean Up.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->testbuildArray();
  }//end testdeleteRowByRowId()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testgetNewestDbEntry() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    $result        = $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->assertTrue($result === 0);
    $this->myArray['tA_S_ID'] = 'ghghgh';
    $ac_class_instance            = new AssignmentsClass();
    $result = $ac_class_instance->delRowsByStudentId('ghghgh');
    // Returns num rows changed.
    $this->assertTrue($result === 0);
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $row = $ac_class_instance->getNewestDbEntry('ghghgh');
    $this->assertTrue(is_array($row));
    $this->assertTrue($row['tA_S_ID'] === 'ghghgh');

    // Clean Up.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $ac_class_instance->delRowsByStudentId('ghghgh');
    $this->testbuildArray();
  }//end testgetNewestDbEntry()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
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
    $ac_class_instance = new AssignmentsClass();
    $result        = $ac_class_instance->getSumOfAssignedTimeFromArray($arr);
    $this->assertTrue($result === 6);
    $arr[]  = $row_4;
    $result = $ac_class_instance->getSumOfAssignedTimeFromArray($arr);
    $this->assertTrue($result === 15);

  }//end testgetSumOfAssignedTimeFromArray()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testfieldsInDbVsMyArray() {

    // Get a list of fields in the db.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    $result        = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $row           = $ac_class_instance->getLastDbEntryAsArray($this->myArray['tA_S_ID']);
    $this->assertTrue(count($row) === count($this->myArray));
  }//end testfieldsInDbVsMyArray()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testgetLastDbEntryAsArray() {

    $result = '';
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue(isset($ac_class_instance));
    $returned_array = $ac_class_instance->getLastDbEntryAsArray($this->myArray['tA_S_ID']);
    $this->assertTrue(is_array($returned_array));
    $this->assertTrue($returned_array['tG_AssignmentName'] === 'tG_Clockwise-CounterClockwise');
    $this->assertTrue($returned_array['tA_SavedStartRec'] === '8');
    // Clean Up.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->testbuildArray();
  }//end testgetLastDbEntryAsArray()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testGetOneRowFromDb() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    $result        = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue(isset($ac_class_instance));
    $this->assertTrue(isset($result));
    $row = $ac_class_instance->getOneRowFromDbAsArrayID($this->myArray['tA_S_ID']);
    if (empty($row) !== TRUE) {
      $this->assertTrue($row['tA_S_ID'] === $this->myArray['tA_S_ID']);
    }
    // Clean Up.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->testbuildArray();
  }//end testGetOneRowFromDb()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testdeleteLastRow() {

    // $log_file = fopen("/var/www/html/jimfuqua/tutorW/
    // logs/testdeleteLastRow.log", "w");
    // $v = var_export($student_assignments_array, true);
    // $string = __LINE__.' Start = '."\n\n";
    // fwrite($log_file, $string);.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    $this->assertTrue(isset($ac_class_instance));
    // Start clean.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $ac_class_instance->delRowsByStudentId('a76677');

    $this->myArray['tA_S_ID'] = 'a76677';
    $result = $ac_class_instance->insertRecord($this->myArray);
    // $string = __LINE__.' $result = '. $result ."\n\n";
    // fwrite($log_file, $string);
    // exit; one is there.
    $result = $ac_class_instance->insertRecord($this->myArray);
    $result = $ac_class_instance->insertRecord($this->myArray);
    // exit; three are there.
    $results_array = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);

    // $v = var_export($results_array, true);
    // $string = __LINE__.' $results_array = '. $v ."\n\n";
    // fwrite($log_file, $string);
    // Is not getting an array.
    $results_array_count = count($results_array);
    // $string = __LINE__.' $results_array_count = '.
    // $results_array_count ."\n\n";
    // fwrite($log_file, $string);
    // following fails getCurrentStudentAssignmentsInAnArray not working
    // $this->assertTrue($results_array_count === 3);
    // echo __LINE__ . ' $results_array_count = ' . $results_array_count;.
    $result = $ac_class_instance->deleteLastRow($this->myArray['tA_S_ID']);
    $this->assertTrue($result === 1);
    $results_array = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
    // $string = __LINE__.' count($results_array) = '.
    // count($results_array) ."\n\n";
    // fwrite($log_file, $string);
    // $this->assertTrue(count($results_array) === 2);
    // $string = __LINE__.' count($results_array) =
    // '.count($results_array)."\n\n";
    // fwrite($log_file, $string);.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $ac_class_instance->delRowsByStudentId('a76677');
  }//end testdeleteLastRow()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testgetCurrentStudentAssignmentsInAnArray() {
    $log = new Logger('name');
    $log->pushHandler(new StreamHandler('/var/www/html/jimfuqua/tutorW/logs/testgetCurrentStudentAssignmentsInAnArray.log', Logger::WARNING));
    // Add records to the log.
    $log->addWarning('Foo');
    $log->addError('Bar');

    $path = "/var/www/html/jimfuqua/tutorW/logs/";
    $file = "testgetCurrentStudentAssignmentsInAnArray.log";
    $log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/testgetCurrentStudentAssignmentsInAnArray.log", "w");
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    $this->assertTrue(isset($ac_class_instance));
    $temp_student_id = 'bcdefgh';
    // Insure no previous lessons for this student.
    $number_of_rows_deleted = $ac_class_instance->delRowsByStudentId($temp_student_id);
    $this->assertTrue($number_of_rows_deleted === 0);

    $this->myArray['tA_S_ID'] = $temp_student_id;
    $result = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
    // Should return NULL because no assignments have been added..
    $this->assertTrue(count($result) === 0);

    $result = $ac_class_instance->insertRecord($this->myArray);
    // Test to see if insertion succeded.
    $v = var_export($this->myArray, TRUE);
    $string = __LINE__ . ' $this->myArray = ' . "$v\n\n";
    fwrite($log_file, $string);
    $string = __LINE__ . ' $result = ' . "$result\n\n";
    fwrite($log_file, $string);
    $this->assertTrue($result === 1);
    // Insertion succeded.
    // exit; verified.
    $number_of_rows_deleted = $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->assertTrue($number_of_rows_deleted === 1);
    // exit;
    // Check total.
    $result = $ac_class_instance->getCurrentStudentAssignmentsInAnArray(
          $this->myArray['tA_S_ID']
      );
    // Should return NULL.
    $this->assertTrue(count($result) === 0);
    $del = $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $result = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
    // Should return NULL because no assignments have been added..
    $this->assertTrue(count($result) === 0);

    // Now create one row with no post date.
    $this->myArray['tA_Post_date'] = strval(microtime(TRUE));
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $v = var_export($this->myArray["tA_Post_date"], TRUE);
    $string = __LINE__ . ' $this->myArray["tA_Post_date"] = ' . "$v\n\n";
    fwrite($log_file, $string);

    // Now create one row with a 100 second post date.
    $this->myArray['tA_Post_date'] = strval(microtime(TRUE) + 100);
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $v = var_export($this->myArray["tA_Post_date"], TRUE);
    $string = __LINE__ . ' $this->myArray["tA_Post_date"] = ' . "$v\n\n";
    fwrite($log_file, $string);

    // Now create one row with a -100 second post date.
    $this->myArray['tA_Post_date'] = strval(microtime(TRUE) - 100);
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);

    $v = var_export($this->myArray["tA_Post_date"], TRUE);
    $string = __LINE__ . ' $this->myArray["tA_Post_date"] = ' . "$v\n\n";
    fwrite($log_file, $string);

    $v = var_export($this->myArray, TRUE);
    $string = __LINE__ . ' $this->myArray = ' . "$v\n\n";
    fwrite($log_file, $string);

    $string = __LINE__ . ' $result = ' . $result . "\n\n";
    fwrite($log_file, $string);

    $result = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);

    $v = var_export($result, TRUE);
    $string = __LINE__ . ' $result = ' . $v . "\n\n";
    fwrite($log_file, $string);

    $this->assertTrue(count($result) === 1);

    $result = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);

    $v = var_export($result, TRUE);
    $string = __LINE__ . ' $result = ' . $v . "\n\n";
    fwrite($log_file, $string);

    // Every test method will stop executing once an assertion fails.
    $this->assertTrue(count($result) === 1);

    // Now create three records.
    $this->myArray['tA_Post_date'] = (time() - 13600);
    // Put it back in time.
    $result = $ac_class_instance->insertRecord($this->myArray);
    // 2.
    $this->assertTrue($result === 1);
    // Record added.
    $result_array = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
    $this->assertTrue(is_array($result_array));
    $this->myArray['tA_Post_date'] = (time() - 7200);
    $result = $ac_class_instance->insertRecord($this->myArray);
    // 3.
    $this->assertTrue($result === 1);
    // Record added.
    $result_array = NULL;
    $result_array = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
    $this->assertTrue(is_array($result_array));
    // Check the fields.
    $this->assertTrue($result_array[1]['tA_S_ID'] === $temp_student_id);
    $this->assertTrue(count($result_array) === 3);
    $ac_class_instance->delRowsByStudentId($temp_student_id);
    // Insure no previous lessons for this student.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $ac_class_instance->delRowsByStudentId('bcdefgh');
    $ac_class_instance->delRowsByStudentId($temp_student_id);
  }

  /**
   * End testgetCurrentStudentAssignmentsInAnArray().
   */
  public function testChangeTaPostDate() {
    // Merge with Assignmentstest.
    $this->testbuildArray();
    $ac_class_instance = new AssignmentsClass();
    $this->assertTrue(isset($ac_class_instance));
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->myArray['tA_Post_date'] = 1000;
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $row = $ac_class_instance->getLastDbEntryAsArray($this->myArray['tA_S_ID']);
    $old_ta_post_date = $this->myArray['tA_Post_date'];
    $this->assertTrue($old_ta_post_date === 1000);
    // Clean Up.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->testbuildArray();
  }


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testupdateFields() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    $this->assertTrue(isset($ac_class_instance));
    $temp_student_id = 'bcdefgh';
    // Insure no previous lessons for this student.
    $result = $ac_class_instance->delRowsByStudentId($temp_student_id);
    $this->assertTrue($result === 0);
    // "No rows should be deleted if all previous methods have cleaned up.");.
    $this->myArray['tA_S_ID'] = $temp_student_id;
    $result = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
    $this->assertTrue(
          count($result) === 0,
          'Should return 0 because no assignments have been added.'
      );

    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1, '1 if insertion succeeded.');

    $results = $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->assertTrue($results === 1, 'Should be 1.');

    // Now create one row with a significant post date.
    $this->myArray['tA_Post_date'] = (time() + 1000000000);
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1, '1 if insertion succeeded.');

    $where_array = array(
      'tA_S_ID'       => 'bcdefgh',
      'tA_ErrorsMade' => '4',
    );
    $value_array = array(
      'tA_ErrorsMade' => '2',
      'tA_StartRec'   => '25',
    );

    $result = $ac_class_instance->updateFields($value_array, $where_array);
    $this->assertTrue($result === 1);
    // Get the row and check the results.
    $result2 = $ac_class_instance->getNewestDbEntry('bcdefgh');
    $this->assertTrue($result2['tA_StartRec'] === '25');
    $this->assertTrue($result2['tA_ErrorsMade'] === '2');
    $where_array = array(
      'tA_S_ID'       => 'bcdefgh',
      'tA_ErrorsMade' => '2',
    );
    $value_array = array(
      'tA_ErrorsMade' => '6',
      'tA_StartRec'   => '27',
    );
    $result     = $ac_class_instance->updateFields($value_array, $where_array);
    $result2    = $ac_class_instance->getNewestDbEntry('bcdefgh');
    $this->assertTrue($result2['tA_StartRec'] === '27');
    $this->assertTrue($result2['tA_ErrorsMade'] === '6');
    // Now delete the rows.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $ac_class_instance->delRowsByStudentId('bcdefgh');

  }//end testupdateFields()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testupdateTaStartRec() {

    // Objective: Create a db entry and then update it and test for
    // the update.
    // $log_file =
    // fopen("/var/www/html/jimfuqua/tutorW/logs/testupdateTaStartRec.log",
    // "w");
    // the lessons inserted do not have tA_PercentTime  error is in the insert
    // $v = var_export($student_assignments_array, true);
    // $string = __LINE__.' $student_assignments_array = '.$v."\n\n";
    // fwrite($log_file, $string).
    $this->testbuildArray();
    // Reset myArray to origninal values.
    // 987654000.
    $this->myArray['tA_OriginalTimestamp'] = '0987654';
    $this->myArray['tA_S_ID']     = 'x!@#$1112';
    $this->myArray['tA_StartRec'] = 22;
    $ac_class_instance = new AssignmentsClass();
    $result1       = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result1 === 1);
    $result2 = $ac_class_instance->updateTaStartRec(
          44,
          $this->myArray['tA_S_ID'],
          $this->myArray['tA_OriginalTimestamp']
      );

    // $string = __LINE__.' $result2 = '.$result2."\n\n";
    // fwrite($log_file, $string);.
    $this->assertTrue($result2 === 1);
    // mysql_affected_rows
    // Get the row and check the results.
    $ac_class_instance = new AssignmentsClass();
    $result3       = $ac_class_instance->getNewestDbEntry('x!@#$1112');
    $this->assertTrue($result3['tA_StartRec'] == '44');
    // Now delete the rows.
    $ac_class_instance->delRowsByStudentId('x!@#$1112');
    $ac_class_instance->delRowsByStudentId('!@#$1112');
    // Clean Up.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $ac_class_instance->delRowsByStudentId('x!@#$1112');
    $this->testbuildArray();
    // reset myArray to origninal values.
  }//end testupdateTaStartRec()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testgetAssignmentByAssignmentId() {

    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    // Insure no previous lessons for this student.
    $this->myArray['tA_id'] = '88888';
    $this->myArray['tA_StudentName'] = 'John Doe III';
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);

    // Returns array or FALSE.
    $result = $ac_class_instance->getAssignmentByAssignmentID('88888');
    $this->assertTrue(is_array($result) === TRUE);
    if (is_array($result) === TRUE) {
      $this->assertTrue($result['tA_StudentName'] === 'John Doe III');
      $this->assertTrue($result['tA_id'] === '88888');
    }
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->testbuildArray();
  } //End testgetAssignmentByAssignmentId().


  // /**
  // * TestsetRepsTowardMToZero in Assignments.class.inc.
  // */
  // public function testsetRepsTowardMToZero()
  // {
  // temp_stop_rec $this->testbuildArray();
  // temp_stop_rec // reset myArray to origninal values.
  // temp_stop_rec $ac_class_instance = new AssignmentsClass;
  // temp_stop_rec $ac_class_instance->
  // delRowsByStudentId($this->myArray['tA_S_ID']);
  // temp_stop_rec $temp_student_id = 'abcdefg';
  // temp_stop_rec $this->myArray['tA_S_ID']           = $temp_student_id;
  // temp_stop_rec $this->myArray['tG_AssignmentName'] =
  // 'testsetRepsTowardMToZero';
  // temp_stop_rec $this->myArray['tA_RepsTowardM']    = '222';
  //
  // temp_stop_rec $result = $ac_class_instance->
  // delRowsByStudentId($temp_student_id);
  // temp_stop_rec // insure no previous lessons for this student.
  // temp_stop_rec
  // Previous instruction only deletes if another function failed to clean up.
  // temp_stop_rec $result = $ac_class_instance->insertRecord($this->myArray);
  // temp_stop_rec // Returns 1 or FALSE.  Inserts a lesson.
  // temp_stop_rec $this->assertTrue($result === 1);
  // temp_stop_rec // record inserted.
  // temp_stop_rec // Now get it back to get it's id.
  // temp_stop_rec $currentRow =
  // $ac_class_instance->getSpecificStudentAssignmentFromDbAsArray(
  // temp_stop_rec     $temp_student_id,
  // temp_stop_rec     $this->myArray['tG_AssignmentName'],
  // temp_stop_rec     $this->myArray['tA_StartRec']
  // temp_stop_rec );
  // temp_stop_rec $this->assertTrue(is_array($currentRow));
  // // Must use new method updateFields
  // //temp_stop_rec $result = $ac_class_instance->setRepsTowardMToZero(
  // //temp_stop_rec     $temp_student_id,
  // //temp_stop_rec     $this->myArray['tG_AssignmentName'],
  // //temp_stop_rec     $currentRow['tA_id']
  // //temp_stop_rec );
  // //         $this->assertTrue($result === 1);
  // // record modified.
  // // Now get record back and double check.
  // $row = $ac_class_instance->getSpecificStudentAssignmentFromDbAsArray(
  // $temp_student_id,
  // 'testsetRepsTowardMToZero',
  // $this->myArray['tA_StartRec']
  // );
  // $this->assertTrue(is_array($row));
  // $this->assertTrue(count($row) > 7);
  // $this->assertTrue($row['tA_RepsTowardM'] === '0');
  // $ac_class_instance->delRowsByStudentId($temp_student_id);
  // // Insure no lessons for this student.
  // $this->testbuildArray();
  // // Reset myArray to origninal values.
  // temp_stop_rec // Clean Up.
  // temp_stop_rec $ac_class_instance->delRowsByStudentId($this->
  // myArray['tA_S_ID']);
  // temp_stop_rec $ac_class_instance->delRowsByStudentId('abcdefg');
  // temp_stop_rec$this->testbuildArray();
  // }//end testsetRepsTowardMToZero()
  /**
   * Test "testprintNullIfNull()" in Assignments.class.pdf.
   */
  public function testprintNullIfNull() {

    $ac_class_instance = new AssignmentsClass();
    $a = NULL;
    $this->assertTrue($ac_class_instance->printNullIfNull($a) === 'NULL');
  }//end testprintNullIfNull()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testrepairRowIfStartRecIslargerThanStopRec() {

    // First step is to place a distinct -correct lesson- in the database
    // and retrieve it and run a test.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance   = new AssignmentsClass();
    $resulttemp_stop_rec = $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    // Insure no previous lessons for this student.
    $this->assertTrue($result === 0);
    // Only deletion if improper cleanup else where.
    // Create a new student with an assignment that has error in start and stop.
    $temp_student_id = 'abcdefg';
    $this->myArray['tA_S_ID'] = $temp_student_id;
    $temp_start_rec = '4';
    $temp_stop_rec  = '2';
    $this->myArray['tA_StartRec'] = $temp_start_rec;
    $this->myArray['tA_StopRec'] = $temp_stop_rec;

    $result = $ac_class_instance->insertRecord($this->myArray);
    // Returns TRUE for success or FALSE for failure.  Inserts a lesson.
    $this->assertTrue($result === 1);
    // The test record was added to the DB.
    $result = $ac_class_instance->repairRowIfStartRecIsLargerThanStopRec(
      temp_stop_rec  $temp_student_id,
      $this->myArray['tG_AssignmentName'],
      $temp_start_rec
    );
    $this->assertTrue(is_array($result));
    $this->assertTrue($result['tA_StartRecWasGreater'] === TRUE);
    $this->assertTrue($result['tA_subsequentAssignmentInserted'] === TRUE);
    $this->assertTrue($result['tA_ErroneousAssignmentDeleted'] === TRUE);

    $result = $ac_class_instance->delRowsByStudentId($temp_student_id);
    // Insure no previous lessons for this student.
    $message = __LINE__ . ' Row should have been previously deleted.';
    $this->assertEquals($result, TRUE, $message);

    // Now test for call with no error in start and stop.
    $temp_start_rec = '2';
    $temp_stop_rec  = '4';
    $this->myArray['tA_StartRec'] = $temp_start_rec;
    $this->myArray['tA_StartRec'] = $temp_start_rec;
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $result = $ac_class_instance->repairRowIfStartRecIsLargerThanStopRec(
      temp_stop_rec  $temp_student_id,
      $this->myArray['tG_AssignmentName'],
      $temp_start_rec
    );
    $this->assertTrue(is_array($result));
    $this->assertTrue(count($result) === 1);
    $this->assertTrue($result['tA_StartRecWasGreater'] === FALSE);

    // Clean up.
    $ac_class_instance->delRowsByStudentId($temp_student_id);
    unset($result);
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $ac_class_instance->delRowsByStudentId('abcdefg');
    unset($ac_class_instance);
    $this->testbuildArray();
  }//end testrepairRowIfStartRecIslargerThanStopRec()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testgetSumOfAssignedTime() {
    // Input parameter is an array of lessons for one student.
    // Create a three lesson array of lessons.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    $temp_student_id   = 'abcdefg';
    $ac_class_instance->delRowsByStudentId($temp_student_id);
    // Insure no previous lessons for this student.
    $this->myArray['tA_S_ID'] = $temp_student_id;
    $storage2 = $this->myArray['tA_PercentTime'];
    $this->myArray['tA_PercentTime'] = 20;
    $ac_class_instance->insertRecord($this->myArray);
    $this->myArray['tA_PercentTime'] = 37;
    $ac_class_instance->insertRecord($this->myArray);
    $this->myArray['tA_PercentTime'] = 120;
    $ac_class_instance->insertRecord($this->myArray);
    // We should now have 3 assignments for this student.  Let's check.
    $student_assignments_array = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id);
    // $log_file = fopen("/var/www/html/jimfuqua/tutor/
    // logs/testgetSumOfAssignedTime.log", "w");
    // the lessons inserted do not have tA_PercentTime  error is in the insert
    // $v = var_export($student_assignments_array, true);
    // $string = __LINE__.' $student_assignments_array = '.$v."\n\n";
    // fwrite($log_file, $string);.
    $this->assertTrue(is_array($student_assignments_array));
    $this->assertTrue(count($student_assignments_array) === 3);
    $this->assertTrue(
          $ac_class_instance->getSumOfAssignedTimeFromArray(
              $student_assignments_array
          ) === 177
      );

    // Clean Up.
    $ac_class_instance->delRowsByStudentId($temp_student_id);
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $ac_class_instance->delRowsByStudentId('abcdefg');
    unset($ac_class_instance);
    $this->testbuildArray();
  }//end testgetSumOfAssignedTime()


  /**
   * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc.
   */
  public function testnormalizePercentTimeTo100Percent() {
    // Input parameter is an array of lessons for one student.
    // Returns normalized array of lessons totalling 100%.
    // Create a three lesson array of lessons.
    // Reset myArray to origninal values.
    $this->testbuildArray();

    $ac_class_instance = new AssignmentsClass();
    $temp_student_id   = 'abcdefg';

    // Insure no previous lessons for this student.
    $ac_class_instance->delRowsByStudentId($temp_student_id);

    // Add three new lessons.
    $this->myArray['tA_S_ID']temp_stop_rec = $temp_student_id;
    $this->myArray['tA_PercentTime'] = 120;
    $ac_class_instance->insertRecord($this->myArray);
    $this->myArray['tA_PercentTime'] = 137;
    $ac_class_instance->insertRecord($this->myArray);
    $this->myArray['tA_PercentTime'] = 20;
    $ac_class_instance->insertRecord($this->myArray);

    // We should now have 3 assignments for this student.  Let's check.
    $student_assignments_array = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id);
    $this->assertTrue(count($student_assignments_array) == 3);

    // Check Sum of Assigned Time.
    $this->assertTrue(
          $ac_class_instance->getSumOfAssignedTimeFromArray(
              $student_assignments_array
          ) === 277
      );

    // Now check normalization to 100%.
    $result = $ac_class_instance->normalizePercentTimeTo100Percent(
          $student_assignments_array
      );
    $total_assigned = 0;
    foreach ($result as $key => $content) {
      $total_assigned = ($total_assigned + $content['tA_PercentTime']);
    }

    $this->assertTrue($total_assigned == '100');
    // Wonder why rounding errors don't cause this to fail.
    // Clean up.
    $ac_class_instance->delRowsByStudentId($temp_student_id);
    // Clean Up.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $ac_class_instance->delRowsByStudentId('abcdefg');
    unset($ac_class_instance);
    $this->testbuildArray();
  }//end testnormalizePercentTimeTo100Percent()


  /**
   * Test test "compare()" in Assignments.class.inc.
   */
  public function testcompare() {

    // Must send it three structured arrays of lessons. One with more than
    // 100% assigned and the other with less and one exact.
    // Should return 0 for equal.  -1 for greater than and 1 for less than.
    $x['tA_PercentTime'] = 0;
    $y['tA_PercentTime'] = 110;
    $z['tA_PercentTime'] = 100;
    $ac_class_instance       = new AssignmentsClass();
    $test1 = $ac_class_instance->compare($x, $x);
    $this->assertTrue($test1 === 0);
    // Equal returns 0.
    $test2 = $ac_class_instance->compare($y, $z);
    $this->assertTrue($test2 === -1);
    // Greater returns -1.
    $test3 = $ac_class_instance->compare($z, $y);
    // Less than returns 1.
    $this->assertTrue($test3 === 1);

  }//end testcompare()


  /**
   * Test "testselectOneLesson()" in Assignments.class.inc.
   */
  public function testselectOneLesson() {

    // Construct a fake student.  Populate with three lessons.
    // Run about 100 selections and test that a lesson is returned in the
    // correct ratio.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance = new AssignmentsClass();
    $temp_student_id   = 'abcdefg';
    $ac_class_instance->delRowsByStudentId($temp_student_id);
    // Insure no previous lessons for this student.
    $this->myArray['tA_S_ID']           = $temp_student_id;
    $this->myArray['tA_PercentTime']    = 120;
    $this->myArray['tG_AssignmentName'] = 'abc';
    $ac_class_instance->insertRecord($this->myArray);
    $this->myArray['tA_PercentTime']    = 137;
    $this->myArray['tG_AssignmentName'] = 'def';
    $ac_class_instance->insertRecord($this->myArray);
    $this->myArray['tA_PercentTime']    = 20;
    $this->myArray['tG_AssignmentName'] = 'ghi';
    $ac_class_instance->insertRecord($this->myArray);
    // We should now have 3 assignments for this student.  Let's check.
    $student_assignments_array = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id);
    $this->assertTrue(count($student_assignments_array) === 3);
    $this->assertTrue(
          $ac_class_instance->getSumOfAssignedTimeFromArray(
              $student_assignments_array,
              time()
          ) === 277
      );
    $all_lesson_array = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id);
    $this->assertTrue(is_array($all_lesson_array));
    $this->assertTrue(count($all_lesson_array) == 3);
    $total_abc = 0;
    $total_def = 0;
    $total_ghi = 0;
    for ($i = 0; $i < 100; $i++) {
      // Trying to select a lesson many times and
      // Checking for frequency.
      $last_lesson_id   = '';
      $selected_lesson = $ac_class_instance->selectOneLesson($all_lesson_array, $last_lesson_id);
      // Should return array containing one lesson.
      if (is_array($selected_lesson) === TRUE) {
        if ($selected_lesson['tG_AssignmentName'] === 'abc') {
          $total_abc++;
        }

        if ($selected_lesson['tG_AssignmentName'] === 'def') {
          $total_def++;
        }

        if ($selected_lesson['tG_AssignmentName'] === 'ghi') {
          $total_ghi++;
        }
      }
      else {
        die(__LINE__ . ' acTest should have been an array.');
      }
    }//end for

    $this->assertTrue($total_abc > 30);
    $this->assertTrue($total_def > 30);
    $this->assertTrue($total_abc > 1);
    // Clean Up.
    $ac_class_instance->delRowsByStudentId($temp_student_id);
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    // Insure no previous lessons for this student.
    $ac_class_instance->delRowsByStudentId('abcdefg');
    $this->testbuildArray();
  }//end testselectOneLesson()


  /**
   * Test "insertTaSplitIntoTa()" in Assignments.class.inc.
   *
   * Insert a split assignment into tA.
   * Insert into tSplits two assignments.
   * Read the tA and process it and put the newly assigned assignments in tA.
   *
   *
   * Splits should be revised to take arrays of lessons using
   * serialize — Generates a storable representation of a value
   *    * public function testinsertTaSplitIntoTa() {
   * // Should also add the tSplits entries to make function stand alone.
   * // Pack array with new values to make the assignment a split.
   * // Then insert the split into the db.
   *    * $this->testbuildArray();
   * // Reset myArray to original values.
   * // Add one split.
   * /*
   * tSp_id
   * tSp_GroupID
   * tSp_GroupDescription
   * tSp_LessonName
   * tSp_tA_Parameter
   * tSp_gA
   * tSp_gA_Parameter
   * tSp_PercentTime
   * tSp_TimeRelativeOrAbsolute
   *
   * $my_array1['tSp_id']               = '';
   * $my_array1['tSp_GroupID']          = '3456';
   * $my_array1['tSp_GroupDescription'] = 'tS_Add_Subtract';
   * $my_array1['tSp_LessonName']       = 'abc';
   * $my_array1['tSp_gA']               = 'tG_1';
   * $my_array1['tSp_PercentTime']      = '10';
   * $this->assertTrue(count($my_array1) === 6);
   * // Add another split.
   * $my_array2['tSp_id']               = '';
   * $my_array2['tSp_GroupID']          = '789';
   * $my_array2['tSp_GroupDescription'] = 'tS_xyz';
   * $my_array2['tSp_LessonName']        = 'tS_Add_Subtract';
   * $my_array2['tSp_gA']                = 'tG_2';
   * $my_array2['tSp_PercentTime']       = '20';
   * $this->assertTrue(count($my_array2) === 6);
   * // Prepare to insert split records into db.
   * $split_instance = new SplitsClass();
   * // Make sure no splits with these ids already exist in the db.
   * $split_instance->deleteRowId($my_array1['tSp_id']);
   * $split_instance->deleteRowId($my_array2['tSp_id']);
   * // Next insert into db.
   * $split_instance->insertRow($my_array1);
   * $split_instance->insertRow($my_array2);
   * // Next insert an assignment to use the splits
   * // Reset the array.  First store the standard test values.
   * $temp_student_idID            = 'gbcdefg';
   * $temp_student_idName          = 'zxcvbn';
   * $this->myArray['tA_S_ID'] = $temp_student_idID;
   * $this->myArray['tA_StudentName'] = $temp_student_idName;
   * // Now create a new student assignment to use the splits inserted above.
   * $ac_class_instance = new AssignmentsClass();
   * // Make sure this assignment does not already exist.
   * // Next insure no previous lessons for this student.
   * $rowsDeleted = $ac_class_instance->
   *   delRowsByStudentId($this->myArray['tA_S_ID']);
   * // Insert the tA.
   * $this->myArray['tG_AssignmentName'] = 'tS_Add_Subtract';
   * // These tS records were inserted above.
   * $ac_class_instance->insertRecord($this->myArray);
   * $result  = $ac_class_instance->
   *  getCurrentStudentAssignmentsInAnArray($temp_student_idID);
   * $num_rows = (count($result));
   * $this->assertTrue($num_rows === 1);
   *    * // Now convert the split to regular assignments.
   * $assignmentArray = $result;
   * $this->assertTrue(count($assignmentArray) === 1);
   * $resultAfterInsert = $ac_class_instance->
   *  insertTaSplitIntoTa($assignmentArray);
   * $this->assertTrue($resultAfterInsert === 1);
   * // Now check to see if the split was converted to assignments.
   * // not converted        exit;
   * // Clean up.
   * $this->assertTrue($this->myArray['tA_S_ID'] === 'gbcdefg');
   * $result = $ac_class_instance->
   *    delRowsByStudentId($this->myArray['tA_S_ID']);
   * $this->assertTrue($result === 1);
   * // exit;
   * // Deleted the two split rows. Original assignment was deleted upon
   * // insertion of splits.
   * //        $result = $split_instance->deleteRowId($my_array1['tA_id']);
   * //        $this->assertTrue($result === 1);
   * //        $result = $split_instance->deleteRowId($my_array2['tA_id']);
   * //        $this->assertTrue($result === 1);
   * // Clean Up.
   * $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
   * $ac_class_instance->delRowsByStudentId('gbcdefg');
   * $this->testbuildArray();
   * }//end testinsertTaSplitIntoTa()
   */

  /**
   * Test "checkAndProcessSplits()" in Assignments.class.php.
   */
  public function testcheckAndProcessSplits() {

    // Add two splits.
    $my_array1['tSp_id']        = '1111';
    $my_array1['tSp_LessonName']   = 'split_1';
    $my_array1['tSp_gA'] = 'tG_1';
    $my_array1['tSp_PercentTime'] = '10';
    $this->assertTrue(count($my_array1) === 4);
    $my_array2['tSp_id']        = '1112';
    $my_array2['tSp_LessonName']   = 'split_2';
    $my_array2['tSp_gA'] = 'tG_2';
    $my_array2['tSp_PercentTime'] = '20';
    $this->assertTrue(count($my_array2) === 4);
    $split_instance = new SplitsClass();
    // Next insert into db.
    $split_instance->deleteRowId($my_array1['tSp_id']);
    $split_instance->insertRow($my_array1);
    $split_instance->deleteRowId($my_array2['tSp_id']);
    $split_instance->insertRow($my_array2);
    // Check to see if they exist.
    $row = $split_instance->getSplitByPrimaryKey($my_array1['tSp_id']);
    // Next check to see what is in $row.
    $this->assertTrue($row['tSp_id'] === '1111');
    // Note that id is a string.
    $row = $split_instance->getSplitByPrimaryKey($my_array2['tSp_id']);
    // Next check to see what is in $row.
    $this->assertTrue($row['tSp_id'] === '1112');
    // Note that id is a string.
    // Clean up database.
    $split_instance->deleteRowId($my_array1['tSp_id']);
    $split_instance->deleteRowId($my_array2['tSp_id']);
    $this->testbuildArray();
  }//end testcheckAndProcessSplits()


  /**
   * Test "returnColumnsNamesInArray" in Assignments.class.inc.
   *
   * Just test function returnColumnsNamesInArray.
   */
  public function testreturnColumnsNamesInArray() {

    $this->testbuildArray();
    // Reset myArray to original values.
    $ac_class_instance = new AssignmentsClass();
    $ac_class_instance->insertRecord($this->myArray);
    $result = $ac_class_instance->returnColumnsNamesInArray();
    $this->assertTrue(is_array($result));
    $column_names_count = count($result);
    $my_array_keys      = array_keys($this->myArray);
    $my_array_count     = count($my_array_keys);
    $this->assertTrue($my_array_count === $column_names_count);
    // Array_diff returns an array containing the differences.
    // it should have a count of 0.
    // Following two lines caused error when variable was elimintate
    // and count directly includend in test.  Probably timeing issue.
    $difference_between_arrays = count(array_diff($result, $my_array_keys));
    $this->assertTrue($difference_between_arrays === 0);
    // Clean Up.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $this->testbuildArray();
  }//end testreturnColumnsNamesInArray()


  /**
   * Test getNextAssignmentToDo().   *    .*/
  public function testgetNextAssignmentToDo() {
    // File handle used for debugging messages.
    // Insert 3 new tA lessons into database for a fictitious new student.
    // Need boundary tests & bad assignments and one good assignment.
    // Run several tests to see that the correct lesson is returned.
    // First test should be simple with one zero time assigned and
    // the other 150% assigned.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance  = new AssignmentsClass();
    $temp_student_id591 = 'abcdefg';
    // Next insure no previous lessons for this student.
    $num_rows = $ac_class_instance->delRowsByStudentId($temp_student_id591);
    $this->assertTrue($num_rows === 0);
    // Any number greater than 0 would indicate a clean-up failure in
    // another function.
    $this->myArray['tA_S_ID'] = $temp_student_id591;
    $last_lesson_id = '';
    // Test 1 Check for no lessons to do because no student exists.
    $result = $ac_class_instance->getNextAssignmentToDo($temp_student_id591, $last_lesson_id);
    // $path_to_file = "/var/www/html/jimfuqua/tutor/logs/";
    // $file = "ACT_testgetNextAssignmentToDo.log";
    // $path_file = $path_to_file.$file;
    // $log_file = fopen($path_file, "w");
    // $v = var_export($result, true);
    // $string = __LINE__.' testgetNextAssignmentToDo = '.$result."\n\n";
    // fwrite($log_file, $string);.
    $this->assertTrue($result === 'error');
    // Test 2  Create a class instance with one lesson and test count
    // to see if it just has one lesson.
    $result = $ac_class_instance->delRowsByStudentId($temp_student_id591);
    // Start with none.
    $this->assertTrue($result === 0);
    $ac_class_instance->insertRecord($this->myArray);

    $result  = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $log_file = fopen("/var/www/html/jimfuqua/tutor/logs/testgetNextAssignmentToDo.log", "w");
    $v = var_export($result, TRUE);
    $string = __LINE__ . ' AC $result = ' . $v . "\n";
    fwrite($log_file, $string);
    $num_rows = count($result);
    $v = var_export($num_rows, TRUE);
    $string = __LINE__ . ' AC $num_rows = ' . $v . "\n";
    fwrite($log_file, $string);
    $this->assertTrue($num_rows === 1);
    $last_lesson_id = '';
    $result = $ac_class_instance->getNextAssignmentToDo($temp_student_id591, $last_lesson_id);
    $num_rows = count($result);
    $v = var_export($num_rows, TRUE);
    $string = __LINE__ . ' AC $num_rows = ' . $v . "\n";
    fwrite($log_file, $string);
    $this->assertTrue($num_rows === 24);

    // Test 3 add an identical lesson and test for number of lessons = 2.
    $ac_class_instance->insertRecord($this->myArray);
    $result  = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $num_rows = count($result);
    $this->assertTrue($num_rows === 2);

    // Test 4 Delete all lessons and add one specific lesson back.
    // Test that it is returned.
    $result = $ac_class_instance->delRowsByStudentId($temp_student_id591);
    // Start with none.
    $this->myArray['tG_AssignmentName'] = 'fffff';
    $ac_class_instance->insertRecord($this->myArray);
    // Add a record.
    $result  = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $num_rows = count($result);
    $this->assertTrue($num_rows === 1);
    // Get it back.
    $last_lesson_id = '';
    $result       = $ac_class_instance->getNextAssignmentToDo($temp_student_id591, $last_lesson_id);
    $this->assertTrue(is_array($result));
    $this->assertTrue(count($result) === 24);
    // Returns FALSE only if there are no lessons.
    $this->assertTrue(is_array($result));
    $this->assertTrue($result['tG_AssignmentName'] == 'fffff');
    $this->assertTrue($result['tA_S_ID'] === $temp_student_id591);
    $result = $ac_class_instance->delRowsByStudentId($temp_student_id591);
    // Insure no previous lessons for this student.
    $this->assertTrue($result === 1);
    // Any number greater than 1 would indicate a clean-up failure.
    $this->testbuildArray();
    // Reset myArray to original values.
    unset($ac_class_instance);

    // Test 5
    // Delete all lessons and add two lessons one with 0 time assigned
    // and the other with 150% assigned.
    // Test for return of one with greater time assigned.
    // First delete all lessons for $temp_student_id591.
    unset($ac_class_instance);
    $this->testbuildArray();
    // Reset myArray.
    $temp_student_id591           = 'abcdefg';
    $ac_class_instance            = new AssignmentsClass();
    $this->myArray['tA_S_ID'] = $temp_student_id591;
    $ac_class_instance->delRowsByStudentId($temp_student_id591);
    // Insure no previous lessons for this student.
    $this->myArray['tA_PercentTime']    = '150';
    $this->myArray['tG_AssignmentName'] = 'klm';
    $ac_class_instance->insertRecord($this->myArray);
    $result  = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $num_rows = count($result);
    $this->assertTrue($num_rows === 1);
    // Now add another row with 0 % time.
    $this->myArray['tA_PercentTime']    = '0';
    $this->myArray['tG_AssignmentName'] = 'nop';
    $ac_class_instance->insertRecord($this->myArray);
    $result  = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $num_rows = count($result);
    $this->assertTrue($num_rows === 2);

    $result = $ac_class_instance->getNextAssignmentToDo($temp_student_id591, $last_lesson_id);
    $this->assertTrue(is_array($result));
    $this->assertTrue(count($result) === 24);
    // Returns FALSE only if there are no lessons.
    $this->assertTrue($result['tG_AssignmentName'] === 'klm');
    // Clean Up.
    unset($ac_class_instance);

    // Reset myArray to origninal values.
    $this->testbuildArray();

    // Test 6
    // Delete all lessons and add two lessons one with 0 time assigned and
    // the other with 150% assigned in reverse order of previous test..
    // Test for return of one with greater time assigned.
    // First delete all lessons for $temp_student_id591.
    unset($ac_class_instance);
    $this->testbuildArray();
    // Reset myArray.
    $temp_student_id591           = 'abcdefg';
    $ac_class_instance            = new AssignmentsClass();
    $this->myArray['tA_S_ID'] = $temp_student_id591;
    // Insure no previous lessons for this student.
    $ac_class_instance->delRowsByStudentId($temp_student_id591);
    $this->myArray['tA_PercentTime']    = '0';
    $this->myArray['tG_AssignmentName'] = 'klm';
    $ac_class_instance->insertRecord($this->myArray);
    $result  = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $num_rows = count($result);
    $this->assertTrue($num_rows === 1);
    // Now add another row with 0 % time.
    $this->myArray['tA_PercentTime']    = '150';
    $this->myArray['tG_AssignmentName'] = 'klm';
    $ac_class_instance->insertRecord($this->myArray);
    $result  = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $num_rows = count($result);
    $this->assertTrue($num_rows === 2);
    $last_lesson_id = '';
    $result       = $ac_class_instance->getNextAssignmentToDo($temp_student_id591, $last_lesson_id);
    $this->assertTrue(is_array($result));
    $this->assertTrue(count($result) === 24);
    // Returns FALSE only if there are no lessons.
    $this->assertTrue($result['tG_AssignmentName'] === 'klm');
    // Clean Up.
    unset($ac_class_instance);
    // Reset myArray to origninal values.
    $this->testbuildArray();

    // Test 7    Add three new lessons and check frequency of return.
    $this->testbuildArray();
    // Reset myArray.
    $temp_student_id591           = 'asdfg  hjkl';
    $this->myArray['tA_S_ID'] = $temp_student_id591;
    $ac_class_instance            = new AssignmentsClass();
    $ac_class_instance->delRowsByStudentId($temp_student_id591);
    // Previous line insures no previous lessons for this student.
    $this->myArray['tG_AssignmentName'] = 'aaaaa';
    $this->myArray['tA_PercentTime']    = '33';
    $result = $ac_class_instance->insertRecord($this->myArray);
    // Add a record.
    $this->assertTrue($result === 1);
    // This is a post date time.
    $result = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $this->assertTrue(is_array($result));
    // Look our for post date issues.
    $num_rows = count($result);
    $this->assertTrue($num_rows === 1);
    $this->myArray['tG_AssignmentName'] = 'bbbbb';
    $this->myArray['tA_PercentTime']    = '33';
    $ac_class_instance->insertRecord($this->myArray);
    // Add a record.
    $result  = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $num_rows = count($result);
    $this->assertTrue($num_rows === 2);
    $this->myArray['tG_AssignmentName'] = 'ccccc';
    $this->myArray['tA_PercentTime']    = '33';
    $ac_class_instance->insertRecord($this->myArray);
    // Add a record.
    $result = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
    $this->assertTrue(count($result) === 3);
    // Now get back a bunch of lessons and check frequency of return
    // against assigned values.
    $total_aaaaa = 0;
    $total_bbbbb = 0;
    $total_ccccc = 0;
    $count      = 0;
    for ($i = 1; $i <= 100; $i++) {
      // Run through 100 selections and see if they follow % assigned.
      $ac_class_instance = new AssignmentsClass();
      $result        = $ac_class_instance->getCurrentStudentAssignmentsInAnArray($temp_student_id591);
      $num_rows       = count($result);
      $count++;
      if ($num_rows > 0) {
        foreach ($result as $key => $value) {
          // Is an array of arrays.
          if ($value['tG_AssignmentName'] === 'aaaaa') {
            $total_aaaaa++;
          }

          if ($value['tG_AssignmentName'] === 'bbbbb') {
            $total_bbbbb++;
          }

          if ($value['tG_AssignmentName'] === 'accccc') {
            $total_ccccc++;
          }
        }
      }
    }//end for

    $ac_class_instance->delRowsByStudentId($temp_student_id591);
    // Next reset myArray to origninal values.
    $this->testbuildArray();
    // Clean Up.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $ac_class_instance->delRowsByStudentId('abcdefg');
    $ac_class_instance->delRowsByStudentId('x!@#$1112');
    unset($ac_class_instance);
    $this->testbuildArray();
  }//end testgetNextAssignmentToDo()

  /**
   * Test delRowsByStudentIdAndAssignmentName().
   */
  public function testdelRowsByStudentIdAndAssignmentName() {
    $this->testbuildArray();
    $temp_student_id = 'abcdefg';
    $temp_assignment_name = 'hijklmn';
    $this->myArray['tA_S_ID'] = $temp_student_id;
    $this->myArray['tG_AssignmentName'] = $temp_assignment_name;
    $ac_class_instance = new AssignmentsClass();
    // Next insure no previous lessons for this student.
    $ac_class_instance->delRowsByStudentId($temp_student_id);
    $this->assertTrue(isset($ac_class_instance));
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result === 1);
    $this->assertTrue(isset($ac_class_instance));
    // Now delete the row.
    $result = $ac_class_instance->delRowsByStudentIdAndAssignmentName($temp_student_id, $temp_assignment_name);
    $result = $this->assertTrue($result === 1);
    // Now try deleting the row again  -- should not be one to delete.
    $result = $ac_class_instance->delRowsByStudentId($temp_student_id);
    $this->assertTrue($result === 0);
  }

  /**
   * Test delRowsByStudentId().
   */
  public function testdelRowsByStudentId() {
    // Next reset myArray to origninal values.
    $this->testbuildArray();
    $temp_student_id = 'abcdefg';
    $this->myArray['tA_S_ID'] = $temp_student_id;
    $ac_class_instance = new AssignmentsClass();
    // Next insure no previous lessons for this student.
    $ac_class_instance->delRowsByStudentId($temp_student_id);
    $this->assertTrue(isset($ac_class_instance));
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result == 1);

    // Now delete the row.
    $result = $ac_class_instance->delRowsByStudentId($temp_student_id);
    $this->assertTrue($result === 1);

    // Now try deleting the row again  -- should not be one to delete.
    $result = $ac_class_instance->delRowsByStudentId($temp_student_id);
    // Clean Up.
    $ac_class_instance->delRowsByStudentId($temp_student_id);
    // Insure no previous lessons for this student.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    // Insure no previous lessons for this student.
    $this->testbuildArray();
    // Reset myArray to origninal values.
    $ac_class_instance->delRowsByStudentId($temp_student_id);
    // Clean Up.
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $ac_class_instance->delRowsByStudentId('!@#-$%^&');
    $ac_class_instance->delRowsByStudentId('abcdefg');

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
    $ac_class_instance = new AssignmentsClass();
    $this->assertTrue(isset($ac_class_instance));
    $ac_class_instance->delRowsByStudentId($this->myArray['tA_S_ID']);
    $temp_student_id = 'abcdefg';
    $this->myArray['tA_S_ID'] = $temp_student_id;
    // Set to a different value.
    $ac_class_instance->delRowsByStudentId($temp_student_id);
    // Insure no previous lessons for this student.
    $result = $ac_class_instance->insertRecord($this->myArray);
    $this->assertTrue($result == 1);
    $_SESSION['tA_S_ID'] = $temp_student_id;
    $ac_class_instance->delRowsByStudentId('abcdefg');

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
