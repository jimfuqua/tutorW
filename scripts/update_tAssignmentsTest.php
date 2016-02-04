<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.
require_once '../../src/classes/AssignmentsClass.inc';

 //must set session varaiables for target. Some data is transfered by session variables

class test extends PHPUnit_Framework_TestCase
{
    // update_tAssignmentsTest.php
    //
        // First create an assignemnt to test.
        // Read the assignment created and verify accuracy.
        // Call this script with changes to:
            // 1.   Reps toward mastery.
            // 2.   Post date time.
        // Read the assignment as changed and verify accuracy.
        // Clean Up.

        // First create an assignemnt to test.

    //public function test_odd_or_even_to_true() {
    //    $this->assertTrue( odd_or_even( 4 ) == true );
    //}


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
        $this->myArray['tA_S_ID']                 = '!@#-$%^&';
        $this->myArray['tA_StudentName']          = 'asdfg  hjkl';
        $this->myArray['tG_AssignmentName']       = 'tG_Test_Assignment';
        $this->myArray['tA_Consecutive_Reps_OK']  = FALSE;
        $this->myArray['tA_Parameter']            = 'none';
        $this->myArray['tA_Immediate_Loops']      = '2';
        $this->myArray['tA_StartRec']             = '1';
        $this->myArray['tA_StopRec']              = '2';
        $this->myArray['tG_Reps_to_master']       = '30';
        $this->myArray['tG_Errors_Allowed']       = '3';
        $this->myArray['tA_RepsTowardM']          = '3';
        $this->myArray['tA_ErrorsMade']           = '4';
        $this->myArray['tA_PercentTime']          = '55';
        $this->myArray['tA_SumPercent']           = '66';
        $this->myArray['tA_QueOrder']             = '7';
        $this->myArray['tA_SavedAssignment']      = 'Test 2';
        $this->myArray['tA_SavedStartRec']        = '8';
        $this->myArray['tA_Post_date']            = 1000;
        $this->myArray['tA_iterations_to_do']     = '9';
        $this->myArray['tA_OriginalTimestamp']    = $current_time;
        $this->myArray['tA_LastModifiedDateTime'] = '999998899';
        $this->myArray['tA_LocalDateTime']        = 8901234;
        $this->assertTrue(count($this->myArray) === 23, "myArray should have 23 elements.");
        return ($this->myArray);
    }//end testbuildArray()


    //Post date time


    function testupdate_tAssignmentsPHP_tA_RepsTowardM() {
    // must send a post string
    // http://www.lornajane.net/posts/2010/three-ways-to-make-a-post-request-from-php
    }

}
?>
