<?php
namespace jimfuqua\tutorW;
use jimfuqua\tutorW\classes;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class AssignmentsCTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test test "buildArray()" in Assignments.class.inc
     *
     * Create an array to provide test data with class wide variables.
     *
     * @return myArray()
     */
    public function testbuildArray()
    {
        // $myArray is in db order but that does not make a difference when
        // you use the function to create SQL.
        $current_time        = time();
        $this->myArray['tA_id'] = '';
        $this->myArray['tA_S_ID']           = '!@#-$%^&';
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
        $this->myArray['tA_Post_date']         = 111;
        $this->myArray['tA_iterations_to_do']  = '9';
        $this->myArray['tA_OriginalTimestamp'] = $current_time;
        $this->myArray['tA_LastModifiedDateTime'] = '999998899';
        $this->myArray['tA_LocalDateTime']        = 8901234;
        $this->assertTrue(count($this->myArray) === 24, "Count of myArray should be 24.");
        return ($this->myArray);
    }//end testbuildArray()


public function testremoveUneededColumns() {
  $arrayIn = array(
    "Unneeded_1" => "aa",
    "tA_id" => "a",
    "tA_S_ID"  => "b",
    "tA_StudentName" => "c",
    "tG_AssignmentName" => "d",
    "Unneeded_2" => "e"
);
$classInstance = new AssignmentsClass;
$returned_array = $classInstance->removeUnneededColumns($arrayIn);
$this->assertTrue(count($returned_array) === 4);
$this->assertFalse(array_key_exists ("Unneeded_1", $returned_array));
$this->assertFalse(array_key_exists ("Unneeded_2", $returned_array));
$this->assertTrue(array_key_exists ("tA_id", $returned_array));
$this->assertTrue(array_key_exists ("tA_S_ID", $returned_array));
$this->assertTrue(array_key_exists ("tA_StudentName", $returned_array));
$this->assertTrue(array_key_exists ("tG_AssignmentName", $returned_array));
//$log_file = fopen("/var/www/html/jimfuqua/tutor/logs/ACT_testremoveUnneededColumns.log", "w");
    //$v = var_export($returned_array, true);
    //$string = __LINE__.' $returned_array = '.$v."\n\n";
    //fwrite($log_file, $string);
}

    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testinsertRecord()
    {
        $this->testbuildArray();
        // reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        // start with empty db entry.
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $result = $classInstance->insertRecord($this->myArray);
        // This inserts data into array but does not have a remaining value.
        $this->assertTrue(isset($classInstance));
        $this->assertTrue($result === 1);  // Number or rows affected.
        // $result = $classInstance -> getLastDbEntry($this->myArray['tA_S_ID']);
        $row = $classInstance->getLastDbEntryAsArray($this->myArray['tA_S_ID']);
        // $row has both numeric and relational entries double its numbers.
        //$log_file = fopen("/var/www/html/jimfuqua/tutor/logs/testinsertRecord.log", "w");
        //$this->assertTrue(count($row) === count($this->myArray));
        //$this->assertTrue($row['tA_S_ID'] == $this->myArray['tA_S_ID']);
        // Clean Up
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        return $classInstance;

    }//end testinsertRecord()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testgetAssignmentsByStudentID()
    {
        $this->testbuildArray();
        // reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $result        = $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $this->assertTrue($result === 0, 'If this test fails a previous test has not cleaned up.');
        $result        = $classInstance->delRowsByStudentId('getAssignmentsByStudentID');
        // Catch other tests sloppy cleanup.
        $this->myArray['tA_S_ID'] = 'getAssignmentsByStudentID';
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1);
        $rows = $classInstance->getAssignmentsByStudentID('getAssignmentsByStudentID');
        $this->assertTrue(is_array($rows));
        $this->assertTrue(count($rows) === 1);
        // now add another lesson and see if two come back
        $result = $classInstance->insertRecord($this->myArray);
        $rows = $classInstance->getAssignmentsByStudentID('getAssignmentsByStudentID');
        $this->assertTrue(is_array($rows));
        $this->assertTrue(count($rows) === 2);
        $result2 = $classInstance->delRowsByStudentId('getAssignmentsByStudentID');
        // line above returns # of rows deleted.
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $this->assertTrue($result2 == 2);
        $this->testbuildArray();
        // reset myArray to origninal values.

    }//end testgetAssignmentsByStudentID()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testgetOneRowFromDbAsArrayID()
    {
        $this->testbuildArray();
        // reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $result        = $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $this->assertEquals($result, 0);
        // Catch other tests sloppy cleanup.
        $this->myArray['tA_S_ID'] = 'ghghgh';
        $result = $classInstance->delRowsByStudentId('ghghgh');
        // insure clean start
        $this->assertTrue($result === 0);
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1);
        $row = $classInstance->getOneRowFromDbAsArrayID('ghghgh');
        $this->assertTrue(is_array($row));
        $this->assertTrue($row['tA_S_ID'] === 'ghghgh');
        $classInstance->delRowsByStudentId('ghghgh');
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);

    }//end testgetOneRowFromDbAsArrayID()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testgetSpecificStudentAssignmentFromDbAsArray()
    {
        $this->testbuildArray();
        // reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $result        = $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $this->assertTrue($result === 0);
        $this->myArray['tA_S_ID']           = 'ghghgh';
        $this->myArray['tG_AssignmentName'] = 'TestAssignment';
        $this->myArray['tA_StartRec']       = '77';
        $result = $classInstance->delRowsByStudentId('ghghgh');
        // insure clean start
        $this->assertTrue($result === 0);
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1);
        $row = $classInstance->getSpecificStudentAssignmentFromDbAsArray(
            'ghghgh',
            $this->myArray['tG_AssignmentName'],
            $this->myArray['tA_StartRec']
        );
        $this->assertTrue(is_array($row));
        $this->assertTrue($row['tA_S_ID'] === 'ghghgh');
        $this->assertTrue($row['tG_AssignmentName'] === 'TestAssignment');
        $this->assertTrue($row['tA_StartRec'] === '77');
        $classInstance->delRowsByStudentId('ghghgh');
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);

    }//end testgetSpecificStudentAssignmentFromDbAsArray()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function compareClassMethodsToTests()
    {
        $log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/ACT compareClassMethodsToTests.log", "w");
        $string = __LINE__.' ACT Missing Tests'."\n";
        fwrite($log_file, $string);
            // Create an array.of test methods.
            $tests_class_methods = get_class_methods(new AssignmentsClassTest());
            // Remove methods not starting with 'test'/
        foreach ($tests_class_methods as $key => $value) {
            if (substr($value, 0, 4) !== 'test') {
                unset($tests_class_methods[$key]);
            }
        }

        // Create an array of methods from the tested class.
                $class_methods = get_class_methods(new classes\AssignmentsClass());
                // add 'test' to start of each class method before compare.
        foreach ($class_methods as $key => $value) {
            $class_methods[$key] = 'test'.$value;
        }

        // Return an array containing all the entries from $class_methods that are not present
                // in  $tests_class_methods.
                $missing_tests = array_diff($class_methods, $tests_class_methods);
        foreach ($missing_tests as $key => $value) {
            // remove tests that don't test a method in tested class
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
                $string = "\n".' Missing:  '.$value;
                fwrite($log_file, $string);
                $i++;
            }
        }

    }//end compareClassMethodsToTests()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testdeleteRowByRowId()
    {
        $this->testbuildArray();
        // reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $result        = $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        // remove rows if they exist.
        // $this->assertTrue( mysql_affected_rows() === 0);
        // $this->assertTrue( $mysqli->affected_rows === 0);
        // No rows should have been there to delete.
        $result = $classInstance->insertRecord($this->myArray);
        // This inserts data into array but does not have a remaining value.
        $this->assertTrue(isset($classInstance));
        $this->assertTrue($result === 1);
        $row = $classInstance->getLastDbEntryAsArray($this->myArray['tA_S_ID']);
        // $this->assertTrue( is_resource($result));
        // $row = mysql_fetch_array($result, MYSQL_ASSOC);
        // $row = $result->fetch_array(MYSQLI_BOTH);

        $this->assertTrue(is_array($row));
        $result = $classInstance->deleteRowByRowId($row['tA_id']);
        // $this->assertTrue( mysql_affected_rows() === 1);
        // $this->assertTrue( $mysqli->affected_rows === 1);
        // Only one row should have been there to delete.
        $this->testbuildArray();
        // reset myArray to original values.
        // Clean Up
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);

    }//end testdeleteRowByRowId()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testgetNewestDbEntry()
    {
        $this->testbuildArray();
        // reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $result        = $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $this->assertTrue($result === 0);
        $this->myArray['tA_S_ID'] = 'ghghgh';
        $classInstance            = new AssignmentsClass;
        $result = $classInstance->delRowsByStudentId('ghghgh');
        // Returns num rows changed.
        $this->assertTrue($result === 0);
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1);
        $row = $classInstance->getNewestDbEntry('ghghgh');
        $this->assertTrue(is_array($row));
        $this->assertTrue($row['tA_S_ID'] === 'ghghgh');

        // Clean Up
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $classInstance->delRowsByStudentId('ghghgh');

    }//end testgetNewestDbEntry()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testgetSumOfAssignedTimeFromArray()
    {
        // takes array of associative arrays;
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
        $classInstance = new AssignmentsClass;
        $result        = $classInstance->getSumOfAssignedTimeFromArray($arr);
        $this->assertTrue($result === 6);
        $arr[]  = $row_4;
        $result = $classInstance->getSumOfAssignedTimeFromArray($arr);
        $this->assertTrue($result === 15);

    }//end testgetSumOfAssignedTimeFromArray()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testfieldsInDbVsMyArray()
    {
        // get a list of fields in the db
        $this->testbuildArray();
        // reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $result        = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1);
        $row           = $classInstance->getLastDbEntryAsArray($this->myArray['tA_S_ID']);
        $this->assertTrue(count($row) === count($this->myArray));
    }//end testfieldsInDbVsMyArray()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testgetLastDbEntryAsArray()
    {
        $result = '';
        $this->testbuildArray();
        // reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue(isset($classInstance));
        $returned_array = $classInstance->getLastDbEntryAsArray($this->myArray['tA_S_ID']);
        $this->assertTrue(is_array($returned_array));
        $this->assertTrue($returned_array['tG_AssignmentName'] === 'tG_Clockwise-CounterClockwise');
        $this->assertTrue($returned_array['tA_SavedStartRec'] === '8');
        // Clean Up
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);

    }//end testgetLastDbEntryAsArray()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testgetOneRowFromDB()
    {
        $this->testbuildArray();
        // reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $result        = $classInstance->insertRecord($this->myArray);
        $this->assertTrue(isset($classInstance));
        $this->assertTrue(isset($result));
        $row = $classInstance->getOneRowFromDbAsArrayID($this->myArray['tA_S_ID']);
        if (empty($row) !== TRUE){
        $this->assertTrue($row['tA_S_ID'] === $this->myArray['tA_S_ID']);
        }
        // Clean Up
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);

    }//end testgetOneRowFromDB()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testdeleteLastRow()
    {
      //$log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/testdeleteLastRow.log", "w");
          //$v = var_export($studentAssignmentsArray, true);
          //$string = __LINE__.' $studentAssignmentsArray = '.$v."\n\n";
          //fwrite($log_file, $string)
        $this->testbuildArray();
        // reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $this->assertTrue(isset($classInstance));
        // start clean
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $classInstance->delRowsByStudentId('777777');
        $this->myArray['tA_S_ID'] = 777777;
        $result = $classInstance->insertRecord($this->myArray);
        //$string = __LINE__.' $result = '. $result ."\n\n";
        //fwrite($log_file, $string);
        $result = $classInstance->insertRecord($this->myArray);
        $result = $classInstance->insertRecord($this->myArray);
        $phpTime           = time();
        $resultsArray      = $classInstance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
        $resultsArrayCount = count($resultsArray);
        //$string = __LINE__.' $resultsArrayCount = '. $resultsArrayCount ."\n\n";
        //fwrite($log_file, $string);
        //$this->assertTrue($resultsArrayCount === 3);
        //echo __LINE__ . ' $resultsArrayCount = ' . $resultsArrayCount;
        $result = $classInstance->deleteLastRow($this->myArray['tA_S_ID']);
        $this->assertTrue($result === 1);
        $resultsArray = $classInstance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
        $this->assertTrue(count($resultsArray) === 2);
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $classInstance->delRowsByStudentId('777777');

    }//end testdeleteLastRow()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testgetCurrentStudentAssignmentsInAnArray()
    {
        $this->testbuildArray();
        // reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $this->assertTrue(isset($classInstance));
        $tempStudent = 'bcdefgh';
        // insure no previous lessons for this student.
        $number_of_rows_deleted = $classInstance->delRowsByStudentId($tempStudent);
        // $this->assertTrue($number_of_rows_deleted === 0);
        $this->myArray['tA_S_ID'] = $tempStudent;
        $result = $classInstance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
        // should return NULL because no assignments have been added..
        $this->assertTrue(count($result) === 0);
        $result = $classInstance->insertRecord($this->myArray);
        // Test to see if insertion succeded.
        $this->assertTrue($result === 1);
        // Insertion succeded.
        $number_of_rows_deleted = $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $this->assertTrue($number_of_rows_deleted === 1);
        // Check total.
        $result = $classInstance->getCurrentStudentAssignmentsInAnArray(
            $this->myArray['tA_S_ID'],
            time()
        );
        // should return NULL.
        $this->assertTrue(count($result) === 0);
        // Insert some assignments.
        $result = $classInstance->insertRecord($this->myArray);
        // 1
        $result = $classInstance->insertRecord($this->myArray);
        // 2
        $del = $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $this->assertTrue($del === 2);
        $result = $classInstance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
        // should return NULL because no assignments have been added..
        $this->assertTrue(count($result) === 0);
        // Now create one row with a significant post date.
        $this->myArray['tA_Post_date'] = (time() + 1000000000);
        $result = $classInstance->insertRecord($this->myArray);
        // 1
        $this->myArray['tA_Post_date'] = (time() - 53600);
        // put it back in time.
        $result = $classInstance->insertRecord($this->myArray);
        // 2
        $result = $classInstance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
        $this->assertTrue(count($result) === 1);

        // now create three records.
        $this->myArray['tA_Post_date'] = (time() - 13600);
        // put it back in time.
        $result = $classInstance->insertRecord($this->myArray);
        // 2
        $this->assertTrue($result === 1);
        // Record added.
        $resultArray = $classInstance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
        $this->assertTrue(is_array($resultArray));
        $this->myArray['tA_Post_date'] = (time() - 7200);
        $result = $classInstance->insertRecord($this->myArray);
        // 3
        $this->assertTrue($result === 1);
        // Record added.
        $resultArray = NULL;
        $resultArray = $classInstance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
        $this->assertTrue(is_array($resultArray));
        // check the fields
        $this->assertTrue($resultArray[1]['tA_S_ID'] === $tempStudent);
        $this->assertTrue(count($resultArray) === 3);
        $classInstance->delRowsByStudentId($tempStudent);
        // insure no previous lessons for this student.
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $classInstance->delRowsByStudentId('bcdefgh');

    }//end testgetCurrentStudentAssignmentsInAnArray()

function testChange_tA_Post_date(){//merge with Assignmentstest
        $this->testbuildArray();
        $classInstance = new AssignmentsClass;
        $this->assertTrue(isset($classInstance));
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $this->myArray['tA_Post_date'] = 1000;
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result ===  1);
        $row = $classInstance->getLastDbEntryAsArray($this->myArray['tA_S_ID']);
        $old_tA_Post_date = $this->myArray['tA_Post_date'];
        $this->assertTrue($old_tA_Post_date ===  1000);
        // Clean Up
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);

    }


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testupdateFields()
    {
        $this->testbuildArray();
        // reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $this->assertTrue(isset($classInstance));
        $tempStudent = 'bcdefgh';
        // insure no previous lessons for this student.
        $result = $classInstance->delRowsByStudentId($tempStudent);
        $this->assertTrue($result === 0);
        // "No rows should be deleted if all previous methods have cleaned up.");
        $this->myArray['tA_S_ID'] = $tempStudent;
        $result = $classInstance->getCurrentStudentAssignmentsInAnArray($this->myArray['tA_S_ID']);
        $this->assertTrue(
            count($result) === 0,
            'Should return 0 because no assignments have been added.'
        );

        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1, '1 if insertion succeeded.');

        $results= $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $this->assertTrue($results === 1, 'Should be 1.');

        // Now create one row with a significant post date.
        $this->myArray['tA_Post_date'] = (time() + 1000000000);
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1, '1 if insertion succeeded.');

        $whereArray = array(
                       'tA_S_ID'       => 'bcdefgh',
                       'tA_ErrorsMade' => '4',
                      );
        $valueArray = array(
                       'tA_ErrorsMade' => '2',
                       'tA_StartRec'   => '25',
                      );

        $result = $classInstance->updateFields($valueArray, $whereArray);
        $this->assertTrue($result === 1);
        // Get the row and check the results.
        $result2 = $classInstance->getNewestDbEntry('bcdefgh');
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
        $result     = $classInstance->updateFields($valueArray, $whereArray);
        $result2    = $classInstance->getNewestDbEntry('bcdefgh');
        $this->assertTrue($result2['tA_StartRec'] === '27');
        $this->assertTrue($result2['tA_ErrorsMade'] === '6');
        // Now delete the rows.
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $classInstance->delRowsByStudentId('bcdefgh');

    }//end testupdateFields()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testupdateTaStartRec()
    {
        // Objective: Create a db entry and then update it and test for
        // the update.
        $log_file = fopen("/var/www/html/jimfuqua/tutorW/logs/testupdateTaStartRec.log", "w");
// the lessons inserted do not have tA_PercentTime  error is in the insert
            //$v = var_export($studentAssignmentsArray, true);
            //$string = __LINE__.' $studentAssignmentsArray = '.$v."\n\n";
            //fwrite($log_file, $string)
        $this->testbuildArray();
        // reset myArray to origninal values.
        $this->myArray['tA_OriginalTimestamp'] = '0987654';//987654000
        $this->myArray['tA_S_ID']     = 'x!@#$1112';
        $this->myArray['tA_StartRec'] = 22;
        $classInstance = new AssignmentsClass;
        $result1       = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result1 === 1);
        $result2 = $classInstance->updateTaStartRec(
            44,
            $this->myArray['tA_S_ID'],
            $this->myArray['tA_OriginalTimestamp']
        );

        $string = __LINE__.' $result2 = '.$result2."\n\n";
        fwrite($log_file, $string);
        $this->assertTrue($result2 === 1);
        // mysql_affected_rows
        // Get the row and check the results.
        $classInstance = new AssignmentsClass;
        $result3       = $classInstance->getNewestDbEntry('x!@#$1112');
        $this->assertTrue($result3['tA_StartRec'] == '44');
        // Now delete the rows.
        $classInstance->delRowsByStudentId('x!@#$1112');
        $classInstance->delRowsByStudentId('!@#$1112');
        // Clean Up
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $classInstance->delRowsByStudentId('x!@#$1112');
        $this->testbuildArray();
        // reset myArray to origninal values.

    }//end testupdateTaStartRec()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testgetAssignmentByAssignmentID()
    {
        $this->testbuildArray();
        // reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        // insure no previous lessons for this student.
        $this->myArray['tA_id'] = '88888';
        $this->myArray['tA_StudentName'] = 'John Doe III';
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1);


        // Returns array or FALSE
        $result = $classInstance->getAssignmentByAssignmentID('88888');
        $this->assertTrue(is_array($result) === TRUE);
        if (is_array($result) === TRUE) {
            $this->assertTrue($result['tA_StudentName'] === 'John Doe III');
            $this->assertTrue($result['tA_id'] === '88888');
        }
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);

    }//end testgetAssignmentByAssignmentID()


//     /**
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
//         $classInstance = new AssignmentsClass;
//         $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
//         $tempStudent = 'abcdefg';
//         $this->myArray['tA_S_ID']           = $tempStudent;
//         $this->myArray['tG_AssignmentName'] = 'testsetRepsTowardMToZero';
//         $this->myArray['tA_RepsTowardM']    = '222';
//
//         $result = $classInstance->delRowsByStudentId($tempStudent);
//         // insure no previous lessons for this student.
//         // Previous instruction only deletes if another function failed to clean up.
//         $result = $classInstance->insertRecord($this->myArray);
//         // Returns 1 or FALSE.  Inserts a lesson.
//         $this->assertTrue($result === 1);
//         // record inserted.
//         // Now get it back to get it's id.
//         $currentRow = $classInstance->getSpecificStudentAssignmentFromDbAsArray(
//             $tempStudent,
//             $this->myArray['tG_AssignmentName'],
//             $this->myArray['tA_StartRec']
//         );
//         $this->assertTrue(is_array($currentRow));
// // Must use new method updateFields
// //         $result = $classInstance->setRepsTowardMToZero(
// //             $tempStudent,
// //             $this->myArray['tG_AssignmentName'],
// //             $currentRow['tA_id']
// //         );
// //         $this->assertTrue($result === 1);
//         // record modified.
//         // Now get record back and double check.
//         $row = $classInstance->getSpecificStudentAssignmentFromDbAsArray(
//             $tempStudent,
//             'testsetRepsTowardMToZero',
//             $this->myArray['tA_StartRec']
//         );
//         $this->assertTrue(is_array($row));
//         $this->assertTrue(count($row) > 7);
//         $this->assertTrue($row['tA_RepsTowardM'] === '0');
//         $classInstance->delRowsByStudentId($tempStudent);
//         // Insure no lessons for this student.
//         $this->testbuildArray();
//         // Reset myArray to origninal values.
//         // Clean Up.
//         $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
//         $classInstance->delRowsByStudentId('abcdefg');
//
//     }//end testsetRepsTowardMToZero()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testprintNullIfNull()
    {
        $classInstance = new AssignmentsClass;
        $a = NULL;
        $this->assertTrue($classInstance->printNullIfNull($a) === 'NULL');

    }//end testprintNullIfNull()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testrepairRowIfStartRecIslargerThanStopRec()
    {
        // First step is to place a distinct -correct lesson- in the database
        // and retrieve it and run a test.
        $this->testbuildArray();
        // Reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $result        = $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        // Insure no previous lessons for this student.
        $this->assertTrue($result === 0);
        // Only deletion if improper cleanup else where.
        // Create a new student with an assignment that has error in start and stop.
        $tempStudent = 'abcdefg';
        $this->myArray['tA_S_ID'] = $tempStudent;
        $tempStartRec = '4';
        $tempStopRec  = '2';
        $this->myArray['tA_StartRec'] = $tempStartRec;
        $this->myArray['tA_StopRec'] = $tempStopRec;

        $result = $classInstance->insertRecord($this->myArray);
        // Returns TRUE for success or FALSE for failure.  Inserts a lesson.
        $this->assertTrue($result === 1);
        // The test record was added to the DB.
        $result = $classInstance->repairRowIfStartRecIsLargerThanStopRec(
            $tempStudent,
            $this->myArray['tG_AssignmentName'],
            $tempStartRec
        );
        $this->assertTrue(is_array($result));
        $this->assertTrue($result['tA_StartRecWasGreater'] === TRUE);
        $this->assertTrue($result['tA_subsequentAssignmentInserted'] === TRUE);
        $this->assertTrue($result['tA_ErroneousAssignmentDeleted'] === TRUE);

        $result = $classInstance->delRowsByStudentId($tempStudent);
        // Insure no previous lessons for this student.
        $message = __LINE__.' Row should have been previously deleted.';
        $this->assertEquals($result, TRUE, $message);

        // Now test for call with no error in start and stop.
        $tempStartRec = '2';
        $tempStopRec  = '4';
        $this->myArray['tA_StartRec'] = $tempStartRec;
        $this->myArray['tA_StartRec'] = $tempStartRec;
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result === 1);
        $result = $classInstance->repairRowIfStartRecIsLargerThanStopRec(
            $tempStudent,
            $this->myArray['tG_AssignmentName'],
            $tempStartRec
        );
        $this->assertTrue(is_array($result));
        $this->assertTrue(count($result) === 1);
        $this->assertTrue($result['tA_StartRecWasGreater'] === FALSE);

        // Clean up.
        $classInstance->delRowsByStudentId($tempStudent);
        unset($result);
        $this->testbuildArray();
        // Reset myArray to origninal values.
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $classInstance->delRowsByStudentId('abcdefg');
        unset($classInstance);

    }//end testrepairRowIfStartRecIslargerThanStopRec()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testgetSumOfAssignedTime()
    {
        // Input parameter is an array of lessons for one student.
        // Create a three lesson array of lessons.
        $this->testbuildArray();
        // Reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $tempStudent   = 'abcdefg';
        $classInstance->delRowsByStudentId($tempStudent);
        // Insure no previous lessons for this student.
        $this->myArray['tA_S_ID'] = $tempStudent;
        $storage2 = $this->myArray['tA_PercentTime'];
        $this->myArray['tA_PercentTime'] = 20;
        $classInstance->insertRecord($this->myArray);
        $this->myArray['tA_PercentTime'] = 37;
        $classInstance->insertRecord($this->myArray);
        $this->myArray['tA_PercentTime'] = 120;
        $classInstance->insertRecord($this->myArray);
        // We should now have 3 assignments for this student.  Let's check.
        $studentAssignmentsArray = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent);
        //$log_file = fopen("/var/www/html/jimfuqua/tutor/logs/testgetSumOfAssignedTime.log", "w");
// the lessons inserted do not have tA_PercentTime  error is in the insert
            //$v = var_export($studentAssignmentsArray, true);
            //$string = __LINE__.' $studentAssignmentsArray = '.$v."\n\n";
            //fwrite($log_file, $string);
        $this->assertTrue(is_array($studentAssignmentsArray));
        $this->assertTrue(count($studentAssignmentsArray) === 3);
        $this->assertTrue(
            $classInstance->getSumOfAssignedTimeFromArray(
                $studentAssignmentsArray
            ) === 177
        );

        // Clean Up.
        $classInstance->delRowsByStudentId($tempStudent);
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $classInstance->delRowsByStudentId('abcdefg');
        unset($classInstance);

    }//end testgetSumOfAssignedTime()


    /**
     * Test test "normalizePercentTimeTo100Percent()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testnormalizePercentTimeTo100Percent()
    {
        // Input parameter is an array of lessons for one student.
        // Returns normalized array of lessons totalling 100%.
        // Create a three lesson array of lessons.

        // Reset myArray to origninal values.
        $this->testbuildArray();

        $classInstance = new AssignmentsClass;
        $tempStudent   = 'abcdefg';

        // Insure no previous lessons for this student.
        $classInstance->delRowsByStudentId($tempStudent);

        // Add three new lessons.
        $this->myArray['tA_S_ID']        = $tempStudent;
        $this->myArray['tA_PercentTime'] = 120;
        $classInstance->insertRecord($this->myArray);
        $this->myArray['tA_PercentTime'] = 137;
        $classInstance->insertRecord($this->myArray);
        $this->myArray['tA_PercentTime'] = 20;
        $classInstance->insertRecord($this->myArray);

        // We should now have 3 assignments for this student.  Let's check.
        $studentAssignmentsArray = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent);
        $this->assertTrue(count($studentAssignmentsArray) == 3);

        //  Check Sum of Assigned Time.
        $this->assertTrue(
            $classInstance->getSumOfAssignedTimeFromArray(
                $studentAssignmentsArray
            ) === 277
        );

        // Now check normalization to 100%.
        $result = $classInstance->normalizePercentTimeTo100Percent(
            $studentAssignmentsArray
        );
        $totalAssigned = 0;
        foreach ($result as $key => $content) {
            $totalAssigned = ($totalAssigned + $content['tA_PercentTime']);
        }

        $this->assertTrue($totalAssigned == '100');
        // Wonder why rounding errors don't cause this to fail.
        // Clean up.
        $classInstance->delRowsByStudentId($tempStudent);
        // Clean Up.
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $classInstance->delRowsByStudentId('abcdefg');
        unset($classInstance);

    }//end testnormalizePercentTimeTo100Percent()


    /**
     * Test test "compare()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testcompare()
    {
        // Must send it three structured arrays of lessons. One with more than
        // 100% assigned and the other with less and one exact.
        // Should return 0 for equal.  -1 for greater than and 1 for less than.
        $x['tA_PercentTime'] = 0;
        $y['tA_PercentTime'] = 110;
        $z['tA_PercentTime'] = 100;
        $classInstance       = new AssignmentsClass;
        $test1 = $classInstance->compare($x, $x);
        $this->assertTrue($test1 === 0);
        // Equal returns 0.
        $test2 = $classInstance->compare($y, $z);
        $this->assertTrue($test2 === -1);
        // Greater returns -1.
        $test3 = $classInstance->compare($z, $y);
        // Less than returns 1.
        $this->assertTrue($test3 === 1);

    }//end testcompare()


        /**
         * Test "testselectALesson()" in Assignments.class.inc
         *
         * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
         * and to provide some background information or textual references.
         *
         * @return void
         */
    public function testselectALesson()
    {
        // Construct a fake student.  Populate with three lessons.
        // Run about 100 selections and test that a lesson is returned in the
        // correct ratio.
        $this->testbuildArray();
        // Reset myArray to origninal values.
        $classInstance = new AssignmentsClass;
        $tempStudent   = 'abcdefg';
        $classInstance->delRowsByStudentId($tempStudent);
        // Insure no previous lessons for this student.
        $this->myArray['tA_S_ID']           = $tempStudent;
        $this->myArray['tA_PercentTime']    = 120;
        $this->myArray['tG_AssignmentName'] = 'abc';
        $classInstance->insertRecord($this->myArray);
        $this->myArray['tA_PercentTime']    = 137;
        $this->myArray['tG_AssignmentName'] = 'def';
        $classInstance->insertRecord($this->myArray);
        $this->myArray['tA_PercentTime']    = 20;
        $this->myArray['tG_AssignmentName'] = 'ghi';
        $classInstance->insertRecord($this->myArray);
        // We should now have 3 assignments for this student.  Let's check.
        $studentAssignmentsArray = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent);
        $this->assertTrue(count($studentAssignmentsArray) === 3);
        $this->assertTrue(
            $classInstance->getSumOfAssignedTimeFromArray(
                $studentAssignmentsArray,
                time()
            ) === 277
        );
        $allLessonArray = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent);
        $this->assertTrue(is_array($allLessonArray));
        $this->assertTrue(count($allLessonArray) == 3);
        $totalAbc = 0;
        $totalDef = 0;
        $totalGhi = 0;
        for ($i = 0; $i < 100; $i++) {
            // Trying to select a lesson many times and
            // Checking for frequency.
            $lastLessonId   = '';
            $selectedLesson = $classInstance->selectALesson($allLessonArray, $lastLessonId);
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
            } else {
                die(__LINE__.' acTest should have been an array.');
            }
        }//end for

        $this->assertTrue($totalAbc > 30);
            $this->assertTrue($totalDef > 30);
            $this->assertTrue($totalAbc > 1);
            // Clean Up.
            $classInstance->delRowsByStudentId($tempStudent);
            $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
            // Insure no previous lessons for this student.
            $classInstance->delRowsByStudentId('abcdefg');

    }//end testselectALesson()


    /**
     * Test "insertTaSplitIntoTa()" in Assignments.class.inc
     *
     * Insert a split assignment into tA.
     * Insert into tSplits two assignments.
     * Read the tA and process it and put the newly assigned assignments in tA.
     *
     * @return void
     */
    public function testinsertTaSplitIntoTa()
    {
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
        $splitInstance = new SplitsClass;
        // Make sure no splits with these ids already exist in the db.
        $splitInstance->deleteRowId($myArray1['tSp_id']);
        $splitInstance->deleteRowId($myArray2['tSp_id']);
        // Next insert into db.
        // temp disable
//$splitInstance->insertRow($myArray1);
//$splitInstance->insertRow($myArray2);
        // end temp disable
        // Next insert an assignment to use the splits
        // Reset the array.  First store the standard test values.
        $tempStudentID            = 'gbcdefg';
        $tempStudentName          = 'zxcvbn';
        $this->myArray['tA_S_ID'] = $tempStudentID;
        $this->myArray['tA_StudentName'] = $tempStudentName;
        // Now create a new student assignment to use the splits inserted above.
        $classInstance = new AssignmentsClass;
        // Make sure this assignment does not already exist.
        // Next insure no previous lessons for this student.
        $rowsDeleted = $classInstance->delRowsByStudentId('gbcdefg');
        // Insert the tA.
        $this->myArray['tG_AssignmentName'] = 'tS_Add_Subtract';
        // These tS records were inserted above.
        $classInstance->insertRecord($this->myArray);
        $result  = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudentID);
        $numRows = (count($result));
        $this->assertTrue($numRows === 1);
        // Now convert the split to regular assignments.
        $assignmentArray = $result;
        $this->assertTrue(count($assignmentArray) === 1);
        $resultAfterInsert = $classInstance->insertTaSplitIntoTa($assignmentArray);
//        $this->assertTrue($resultAfterInsert === 1);
        // Now check to see if the split was converted to assignments.
        // Clean up.
        $result = $classInstance->delRowsByStudentId($tempStudentID);
        $this->assertTrue($result === 1);
        // Deleted the two split rows. Original assignment was deleted upon
        // insertion of splits.
//        $result = $splitInstance->deleteRowId($myArray1['tA_id']);
//        $this->assertTrue($result === 1);
//        $result = $splitInstance->deleteRowId($myArray2['tA_id']);
//        $this->assertTrue($result === 1);
        // Clean Up.
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);

    }//end testinsertTaSplitIntoTa()


    /**
     * Test "checkAndProcessSplits()" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testcheckAndProcessSplits()
    {
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
        $splitInstance = new SplitsClass;
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

    }//end testcheckAndProcessSplits()


    /**
     * Test "returnColumnsNamesInArray" in Assignments.class.inc
     *
     * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
     * and to provide some background information or textual references.
     *
     * @return void
     */
    public function testreturnColumnsNamesInArray()
    {
        $this->testbuildArray();
        // Reset myArray to original values.
        $classInstance = new AssignmentsClass;
        $classInstance->insertRecord($this->myArray);
        $result = $classInstance->returnColumnsNamesInArray();
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
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);

    }//end testreturnColumnsNamesInArray()


    /**
     *   Test getNextAssignmentToDo()
     * @return void
     */
    public function testgetNextAssignmentToDo()
    {
        // File handle used for debugging messages.
        // Insert 3 new tA lessons into database for a fictitious new student.
        // Need boundary tests & bad assignments and one good assignment.
        // Run several tests to see that the correct lesson is returned.
        // First test should be simple with one zero time assigned and
        // the other 150% assigned.
        $this->testbuildArray();
        // Reset myArray to origninal values.
        $classInstance  = new AssignmentsClass;
        $tempStudent591 = 'abcdefg';
        // Next insure no previous lessons for this student.
        $numRows = $classInstance->delRowsByStudentId($tempStudent591);
        $this->assertTrue($numRows === 0);
        // Any number greater than 0 would indicate a clean-up failure in
        // another function.
        $this->myArray['tA_S_ID'] = $tempStudent591;
        $lastLessonId = '';
        // Test 1 Check for no lessons to do because no student exists.
        $result = $classInstance->getNextAssignmentToDo($tempStudent591, $lastLessonId);
//$log_file = fopen("/var/www/html/jimfuqua/tutor/logs/ACT_testgetNextAssignmentToDo.log", "w");
    //$v = var_export($result, true);
    //$string = __LINE__.' testgetNextAssignmentToDo = '.$result."\n\n";
    //fwrite($log_file, $string);
        $this->assertTrue($result === 'error');
        // Test 2  Create a class instance with one lesson and test count
        // to see if it just has one lesson.
        $result = $classInstance->delRowsByStudentId($tempStudent591);
        // Start with none.
        $this->assertTrue($result === 0);
        $classInstance->insertRecord($this->myArray);

        $result  = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent591);
// $log_file = fopen("/var/www/html/jimfuqua/tutor/logs/testgetNextAssignmentToDo.log", "w");
// $v = var_export($result, true);
// $string = __LINE__.' AC $result = '.$v."\n";
// fwrite($log_file, $string);
        $numRows = count($result);
        $v = var_export($numRows, true);
// $string = __LINE__.' AC $numRows = '.$v."\n";
// fwrite($log_file, $string);
        $this->assertTrue($numRows === 1);
        $lastLessonId = '';
        $result       = $classInstance->getNextAssignmentToDo($tempStudent591, $lastLessonId);

        $numRows      = count($result);
        $v = var_export($numRows, true);
// $string = __LINE__.' AC $numRows = '.$v."\n";
// fwrite($log_file, $string);
        $this->assertTrue($numRows === 24);

        // Test 3 add an identical lesson and test for number of lessons = 2.
        $classInstance->insertRecord($this->myArray);
        $result  = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent591);
        $numRows = count($result);
        $this->assertTrue($numRows === 2);

        // Test 4 Delete all lessons and add one specific lesson back.
        // Test that it is returned.
        $result = $classInstance->delRowsByStudentId($tempStudent591);
        // Start with none.
        $this->myArray['tG_AssignmentName'] = 'fffff';
        $classInstance->insertRecord($this->myArray);
        // Add a record.
        $result  = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent591);
        $numRows = count($result);
        $this->assertTrue($numRows === 1);
        // Get it back.
        $lastLessonId = '';
        $result       = $classInstance->getNextAssignmentToDo($tempStudent591, $lastLessonId);
        $this->assertTrue(is_array($result));
        $this->assertTrue(count($result) === 24);
        // Returns FALSE only if there are no lessons.
        $this->assertTrue(is_array($result));
        $this->assertTrue($result['tG_AssignmentName'] == 'fffff');
        $this->assertTrue($result['tA_S_ID'] === $tempStudent591);
        $result = $classInstance->delRowsByStudentId($tempStudent591);
        // Insure no previous lessons for this student.
        $this->assertTrue($result === 1);
        // Any number greater than 1 would indicate a clean-up failure.
        $this->testbuildArray();
        // Reset myArray to original values.
        unset($classInstance);

        // Test 5
        // Delete all lessons and add two lessons one with 0 time assigned
        // and the other with 150% assigned.
        // Test for return of one with greater time assigned.
        // First delete all lessons for $tempStudent591.
        unset($classInstance);
        $this->testbuildArray();
        // Reset myArray.
        $tempStudent591           = 'abcdefg';
        $classInstance            = new AssignmentsClass;
        $this->myArray['tA_S_ID'] = $tempStudent591;
        $classInstance->delRowsByStudentId($tempStudent591);
        // Insure no previous lessons for this student.
        $this->myArray['tA_PercentTime']    = '150';
        $this->myArray['tG_AssignmentName'] = 'klm';
        $classInstance->insertRecord($this->myArray);
        $result  = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent591);
        $numRows = count($result);
        $this->assertTrue($numRows === 1);
        // Now add another row with 0 % time.
        $this->myArray['tA_PercentTime']    = '0';
        $this->myArray['tG_AssignmentName'] = 'nop';
        $classInstance->insertRecord($this->myArray);
        $result  = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent591);
        $numRows = count($result);
        $this->assertTrue($numRows === 2);

        $result = $classInstance->getNextAssignmentToDo($tempStudent591, $lastLessonId);
        $this->assertTrue(is_array($result));
        $this->assertTrue(count($result) === 24);
        // Returns FALSE only if there are no lessons.
        $this->assertTrue($result['tG_AssignmentName'] === 'klm');
        // Clean Up.
        unset($classInstance);

        // Reset myArray to origninal values.
        $this->testbuildArray();

        // Test 6
        // Delete all lessons and add two lessons one with 0 time assigned and
        // the other with 150% assigned in reverse order of previous test..
        // Test for return of one with greater time assigned.
        // First delete all lessons for $tempStudent591.
        unset($classInstance);
        $this->testbuildArray();
        // Reset myArray.
        $tempStudent591           = 'abcdefg';
        $classInstance            = new AssignmentsClass;
        $this->myArray['tA_S_ID'] = $tempStudent591;
        // Insure no previous lessons for this student.
        $classInstance->delRowsByStudentId($tempStudent591);
        $this->myArray['tA_PercentTime']    = '0';
        $this->myArray['tG_AssignmentName'] = 'klm';
        $classInstance->insertRecord($this->myArray);
        $result  = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent591);
        $numRows = count($result);
        $this->assertTrue($numRows === 1);
        // Now add another row with 0 % time.
        $this->myArray['tA_PercentTime']    = '150';
        $this->myArray['tG_AssignmentName'] = 'klm';
        $classInstance->insertRecord($this->myArray);
        $result  = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent591);
        $numRows = count($result);
        $this->assertTrue($numRows === 2);
        $lastLessonId = '';
        $result       = $classInstance->getNextAssignmentToDo($tempStudent591, $lastLessonId);
        $this->assertTrue(is_array($result));
        $this->assertTrue(count($result) === 24);
        // Returns FALSE only if there are no lessons.
        $this->assertTrue($result['tG_AssignmentName'] === 'klm');
        // Clean Up.
        unset($classInstance);
        // Reset myArray to origninal values.
        $this->testbuildArray();

        // Test 7    Add three new lessons and check frequency of return.
        $this->testbuildArray();
        // Reset myArray.
        $tempStudent591           = 'asdfg  hjkl';
        $this->myArray['tA_S_ID'] = $tempStudent591;
        $classInstance            = new AssignmentsClass;
        $classInstance->delRowsByStudentId($tempStudent591);
        // Previous line insures no previous lessons for this student.
        $this->myArray['tG_AssignmentName'] = 'aaaaa';
        $this->myArray['tA_PercentTime']    = '33';
        $result = $classInstance->insertRecord($this->myArray);
        // Add a record.
        $this->assertTrue($result === 1);
        // This is a post date time.
        $result = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent591);
        $this->assertTrue(is_array($result));
        // Look our for post date issues.
        $numRows = count($result);
        $this->assertTrue($numRows === 1);
        $this->myArray['tG_AssignmentName'] = 'bbbbb';
        $this->myArray['tA_PercentTime']    = '33';
        $classInstance->insertRecord($this->myArray);
        // Add a record.
        $result  = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent591);
        $numRows = count($result);
        $this->assertTrue($numRows === 2);
        $this->myArray['tG_AssignmentName'] = 'ccccc';
        $this->myArray['tA_PercentTime']    = '33';
        $classInstance->insertRecord($this->myArray);
        // Add a record.
        $result = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent591);
        $this->assertTrue(count($result) === 3);
        // Now get back a bunch of lessons and check frequency of return
        // against assigned values.
        $totalAaaaa = 0;
        $totalBbbbb = 0;
        $totalCcccc = 0;
        $count      = 0;
        for ($i = 1; $i <= 100; $i++) {
            // Run through 100 selections and see if they follow % assigned.
            $classInstance = new AssignmentsClass;
            $result        = $classInstance->getCurrentStudentAssignmentsInAnArray($tempStudent591);
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

        $classInstance->delRowsByStudentId($tempStudent591);
        // Next reset myArray to origninal values.
        $this->testbuildArray();
        // Clean Up.
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $classInstance->delRowsByStudentId('abcdefg');
        $classInstance->delRowsByStudentId('x!@#$1112');
        //$classInstance->delRowsByStudentName('asdfg  hjkl');
        unset($classInstance);

    }//end testgetNextAssignmentToDo()

    /**
     *   Test delRowsByStudentId_AssignmentName()
     * @return void
      */
    public function testdelRowsByStudentId_AssignmentName() {
      $this->testbuildArray();
      $tempStudent = 'abcdefg';
      $tempAssignmentName = 'hijklmn';
      $this->myArray['tA_S_ID'] = $tempStudent;
      $this->myArray['tG_AssignmentName'] = $tempAssignmentName;
      $classInstance = new AssignmentsClass;
      // Next insure no previous lessons for this student.
      $classInstance->delRowsByStudentId($tempStudent);
      $this->assertTrue(isset($classInstance));
      $result = $classInstance->insertRecord($this->myArray);
      $this->assertTrue($result === 1);
      $this->assertTrue(isset($classInstance));
      // Now delete the row.
      $result = $classInstance->delRowsByStudentId_AssignmentName($tempStudent, $tempAssignmentName);
      $result = $this->assertTrue($result === 1);
      // Now try deleting the row again  -- should not be one to delete.
      $result = $classInstance->delRowsByStudentId($tempStudent);
      $this->assertTrue($result === 0);
}

     /**
      *   Test delRowsByStudentId()
     * @return void
      */
    public function testdelRowsByStudentId()
    {
        // Next reset myArray to origninal values.
        $this->testbuildArray();
        $tempStudent = 'abcdefg';
        $this->myArray['tA_S_ID'] = $tempStudent;
        $classInstance            = new AssignmentsClass;
        // Next insure no previous lessons for this student.
        $classInstance->delRowsByStudentId($tempStudent);
        $this->assertTrue(isset($classInstance));
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result == 1);
        $this->assertTrue(isset($classInstance));
        // Now delete the row.
        $result = $classInstance->delRowsByStudentId($tempStudent);
        $this->assertTrue($result === 1);
        // Now try deleting the row again  -- should not be one to delete.
        $result = $classInstance->delRowsByStudentId($tempStudent);
        // Clean Up.
        $classInstance->delRowsByStudentId($tempStudent);
        // Insure no previous lessons for this student.
        $this->testbuildArray();
        // Reset myArray to origninal values.
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        // Insure no previous lessons for this student.
        $this->testbuildArray();
        // Reset myArray to origninal values.
        $classInstance->delRowsByStudentId($tempStudent);
        // Clean Up.
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $classInstance->delRowsByStudentId('!@#-$%^&');
        $classInstance->delRowsByStudentId('abcdefg');

    }//end testdelRowsByStudentId()


    /**
     *   Test cAssignmentGetNextLesson()
     * @return void
     */
    public function testcAssignmentGetNextLesson()
    {
        /*
            Tests cAssignment_get_next_lesson.php Does not show up on missing
            tests because cAssignments is not in assignments.class
            Function cAssignments_get_next_lesson is called from javascript.
        */

        // Next reset myArray to origninal values.
        $this->testbuildArray();
        // Add a new row to delete.
        $classInstance = new AssignmentsClass;
        $this->assertTrue(isset($classInstance));
        $classInstance->delRowsByStudentId($this->myArray['tA_S_ID']);
        $tempStudent = 'abcdefg';
        $this->myArray['tA_S_ID'] = $tempStudent;
        // Set to a different value.
        $classInstance->delRowsByStudentId($tempStudent);
        // Insure no previous lessons for this student.
        $result = $classInstance->insertRecord($this->myArray);
        $this->assertTrue($result == 1);
        $_SESSION['tA_S_ID'] = $tempStudent;
        $classInstance->delRowsByStudentId('abcdefg');

    }//end testcAssignmentGetNextLesson()


    /**
     *   Test connectToDb()
     * @return void
     */
    private function _testconnectToDb()
    {
        $t       = 2;
        $message = 'abcde';
        $this->assertTrue(1 === 1, $message);
        $this->assertFileExists('db_include.php', 'Location of connection variables.');

    }//end _testconnectToDb()


}//end class
