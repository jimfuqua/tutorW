<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Protected Page</title>
        <link rel="stylesheet" href="styles/main.css" />
        <script>
        data = { tA_S_ID: "qqq4q3q", time: "2pm" }tA_S_ID
        $.post( "ajax/test.html", function( data ) {
            $( ".result" ).html( data );
        });
        </script>
    </head>
    <body>
        <?php if (login_check($mysqli_connection) == true) : ?>
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <p>
                This is an example protected page.  To access this page, users
                must be logged in.  At some stage, we'll also check the role of
                the user, so pages will be able to determine the type of user
                authorised to access the page.
            </p>
            <p>Return to <a href="../index.php">login page</a></p>
            <p>Go to <a href="../tutor/src/scripts/cAssignment_get_next_lesson.php"> cAssignment_get_next_lessonl.php</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="../index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>
