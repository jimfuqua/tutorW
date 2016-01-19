<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    session_destroy();
}

session_start();
    $_SESSION['sender'] =__FILE__;
    $_SESSION['tA_id'] = '199305';
    $_SESSION['tA_S_ID'] = 'AAAAA';
    $_SESSION['tA_StudentName'] = "John Doe";
    $_SESSION['tG_AssignmentName'] = "assignment";
    $_SESSION['tA_StartRec'] = 3;
    $_SESSION['session_id'] = session_id();
    $_SESSION['tC_ServerTimeStarted'] = microtime(TRUE);

    $session_id = session_id();


$logFile = fopen("/var/www/jimfuqua/tutor/logs/update_tA_tCTestHTML.php.log", "w");

$v = var_export($_SESSION, TRUE);
$string = __LINE__ . ' $_SESSION = ' . $v . "\n\n";
fwrite($logFile, $string);
?>
<html>
<head>
</head>
<body>

<form id='submit_form' action="update_tA_tC.php" method="post">
tA_S_ID:<input type="text" name="tA_S_ID" value='qqq4q3q'><br><br>
tA_id:<input type="text" name="tA_id"  value='199305'><br><br>
session_id:<input type="text" name="session_id"  value=<?php echo $session_id ?>><br><br>
tA_StudentName:<input type="text" name="tA_StudentName"  value='John Doe'><br><br>
tG_AssignmentName:<input type="text" name="tG_AssignmentName"  value="<?php echo $_SESSION['tG_AssignmentName']?>"><br><br>
tA_RepsTowardM:<input type="text" name="tA_RepsTowardM"  value='Plus1'><br><br>


tA_ErrorsMade:<input type="text" name="tA_ErrorsMade"  value='0'><br><br>
tC_Correct:<input type="text" name="tC_Correct"  value='true'><br><br>
tC_Question_and_Response:<input type="text" id="tC_Question_and_Response"  name="tC_Question_and_Response"  value='abc'><br><br>
tC_More_data_about_response:<input type="text" id="tC_More_data_about_response" name="tC_More_data_about_response"  value='def'><br><br>
<input type="submit">
<input type='hidden' id="tC_ClientTimeStarted" name="tC_ClientTimeStarted" value = "<?php echo time()?>"><br><br>
<input type='hidden' id="tA_LocalDateTime"     name="tA_LocalDateTime"     value = "<?php echo time()?>"><br><br>
<input type='hidden' id="tC_Time_client_processed_answer" name="tC_Time_client_processed_answer" value = "<?php echo time()?>"><br><br>
<input type='hidden' id="tC_tGStartRec" name="tC_tGStartRec" value = "1"><br><br>
<input type='hidden' id="tC_tGStopRec" name="tC_tGStopRec" value = "2"><br><br>
<input type='hidden' id="tC_CompletedTimestamp" name="tC_CompletedTimestamp" value = "<?php echo time()?>"><br><br>
<input type='hidden' id="tC_ServerTimeStarted" name="tC_ServerTimeStarted" value = "<?php echo time()?>"><br><br>
<input type='hidden' id="sender" name="sender" value = "update_tA_tCTestsHTML"><br><br>
</form>
<script type="text/javascript">
var tC_ClientTimeStarted = Math.floor(Date.now() / 1000);
      document.getElementById("tC_ClientTimeStarted").value = tC_ClientTimeStarted;
      //document.getElementById("value2").value = Math.floor(89+Math.random()*11);​
  </script>
</body>

</html>
