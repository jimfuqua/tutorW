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
    $_SESSION['from'] = __LINE__.'  '.__FILE__;
    $_SESSION['count'] = 1;

// Example using cURL.  $_POST array arrives with data in $myvars below.

$url = 'http://localhost/jimfuqua/tutorW/scripts/tested_script.php';
$ch = curl_init( $url );

$myvars = 'tA_S_ID=' . 'AAAAA';
$myvars = $myvars.'&tA_id=' . '199305';

curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 1);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );

echo $response;
curl_close ($ch);


// line below gets to tested script with sessions data but no post data. Uncomment to try it that way.
// echo 'To continue, <a href=http://localhost/jimfuqua/tutor/scripts/tested_script.php><br/><br/>click';
?>
