<?php
require "vendor/autoload.php";

use jimfuqua\tutorW\AssignmentsClass;
use jimfuqua\tutorW\CompletedClass;
use jimfuqua\tutorW\GenericAClass;
use jimfuqua\tutorW\LessonsClass;
use jimfuqua\tutorW\PersonClass;
use jimfuqua\tutorW\SessionsClass;
use jimfuqua\tutorW\SplitsClass;
use jimfuqua\tutorW\ActiveLessonClass;

$AssignClassObj   = new AssignmentsClass();
$CompClassObj     = new CompletedClass();
$gAClassObj       = new GenericAClass();
$PersonClassObj   = new PersonClass();
$SessionsClassObj = new SessionsClass();
$SplitsClassObj   = new SplitsClass();
$LessonClassObj   = new ActiveLessonClass('abc',__FILE__);
echo __DIR__;
?>
<style>
  :root {
  --main-color: green;
}

#foo h2 {
  color: var(--main-color);
}
h1 {color:red;}
p {color:blue;}
</style>
</head>
<body>

<h1>A heading</h1>
<p>A paragraph.</p>
<p id="foo">
  This is a test of css variables.&#xf088;&#xf087;
</p>
</body>
</html>
