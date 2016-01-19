<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    session_destroy();
}

}
session_start();
    $_SESSION['from'] = __LINE__.'  '.__FILE__;
    $_SESSION['count'] = 1;
$logFile = fopen("/var/www/jimfuqua/tutor/logs/update_tA_tC.php.log", "w");
/*require_once '../../src/classes/AssignmentsClass.inc';

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
/*    public function testbuildArray()
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
    */
    $_SESSION['tA_id']='abc';
    $_SESSION['from'] = __LINE__.'  <br/>'.__FILE__;echo "<br/>";
    echo $_SESSION['from'];
    echo "<br/>";
    echo serialize($_SESSION);
    echo "<br/>";
$url = 'http://localhost/jimfuqua/tutor/src/scripts/update_tA_tC.php';
echo $url;
$myvars = 'tA_S_ID=' . 'AAAAA';
$myvars = $myvars.'&tA_id=' . '199305';
$myvars = $myvars.'&sender='.'GearsRotationDirection.php';
$myvars = $myvars.'&tC_Correct='.'1';
$myvars = $myvars.'&tC_ClientTimeStarted=' . '1425088283979';
$myvars = $myvars.'&tC_Time_client_processed_answer=' . '1425091361012';
$myvars = $myvars.'&tC_Question_and_Response=' . 'counterclockwise';
$myvars = $myvars.'&tC_More_data_about_response=' . '';
$myvars = $myvars.'&tA_ErrorsMade=' . '0';
$myvars = $myvars.'&tA_LocalDateTime=' . '1425091361';
$myvars = $myvars.'&tA_RepsTowardM=' . 'Plus1';

$data = array('tA_S_ID' => 'AAAAA');
$data['tA_id'] = '199305';
$data['sender'] ='GearsRotationDirection.php';
$data['tC_Correct'] = '1';
$data['tC_ClientTimeStarted'] = '1425088283979';
$data['tC_Time_client_processed_answer'] = '1425091361012';
$data['tC_Question_and_Response']= 'counterclockwise';
$data['tC_More_data_about_response'] = '';
$data['tA_ErrorsMade'] = '0';
$data['tA_LocalDateTime'] = '1425091361';
$data['tA_RepsTowardM'] = 'Plus1';

//$url = 'URL';
//$data = array('field1' => 'value', 'field2' => 'value');

$options = array(
        'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$logFile = fopen("/var/www/jimfuqua/tutor/logs/update_tA_tC.php.log", "w");
$v = var_export($result, TRUE);
$string = __LINE__ . ' $result = ' . $v . "\n\n";
//fwrite($logFile, $string);
$url = 'http://localhost/jimfuqua/tutor/src/scripts/update_tA_tC.php';
//header( "Location: $url" ); nothing transfers
//var_dump($result);

/*
//$strCookie = 'PHPSESSID=' . $_COOKIE['PHPSESSID'] . '; path=/';
//session_write_close();

$ch = curl_init( $url );

//$strCookie = session_name()."=".session_id()."; path=".session_save_path();
//curl_setopt ($ch, CURLOPT_COOKIEFILE, $strCookie);
//curl_setopt($ch, CURLOPT_COOKIEJAR, $strCookie);
//session_write_close();
//curl_setopt( $ch, CURLOPT_COOKIESESSION, true );
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 1);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );

echo $response;
curl_close ($ch);
*/
//echo '<br /><a href="update_tA_tC.php">page 2</a>';
//echo header("http://localhost/jimfuqua/tutor/src/scripts/update_tA_tC.php");
//echo 'To continue, <a href=http://localhost/jimfuqua/tutor/src/scripts/update_tA_tC.php>click';
/*}
$_POST = array (
  'tA_S_ID' => 'qqq4q3q',
  'tA_id' => '199305',
  'sender' => 'GearsRotationDirection.php',
  'tC_Correct' => '1',
  'tC_ClientTimeStarted' => '1425088283979',
  'tC_Time_client_processed_answer' => '1425091361012',
  'tC_Question_and_Response' => 'counterclockwise',
  'tC_More_data_about_response' => '',
  'tA_ErrorsMade' => '0',
  'tA_LocalDateTime' => '1425091361',
  'tA_RepsTowardM' => 'Plus1',
)*/
?>
