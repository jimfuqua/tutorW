<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$log_file = fopen('../../logs/spelling_php.log', 'w');
assert_options(ASSERT_CALLBACK, 'my_assert_handler');
// Create a handler function
function my_assert_handler($file, $line, $code, $desc = null)
{
    //echo "Assertion failed at $file:$line: $code";
    $string = "Assertion failed at $file:$line: $code";
    $log = fopen('../../logs/spelling_assertions.php.log', 'w');
    fwrite($log, $string."\n");
    if ($desc) {
        //echo ": $desc";
        fwrite($log, $desc."\n");
    }
    echo "\n";
}

$SESS = session_id();
// The require below contains the words in $word_sentence_array[][].
// see the file for a complete understanding of the data.
require './word_sentence_array_1-372.php';

$v = var_export($_SESSION, true);
$string = __LINE__.' $_SESSION = '.$v."\n";
fwrite($log_file, $string);

// $word_index identifies the word in $word_sentence_array_1-372.php
$word_index = $_SESSION['tA_StartRec']; // For test should be 1.
// Must have a "$text_word.
// $text_word must come from tA_StartRec and tG_DataFile

$text_word = $word_sentence_array[$word_index][0];
$text_sentence = $word_sentence_array[$word_index][1];
$string = __LINE__.' $text_word = '.$text_word."\n";
fwrite($log_file, $string);
$string = __LINE__.' $text_sentence = '.$text_sentence."\n";
fwrite($log_file, $string);

$word_width = strlen($text_word) + 3;
$sentence_pre_stop = strrpos($text_sentence, $text_word) - 1;
$sentence_pre = substr($text_sentence, 0, $sentence_pre_stop);
$sentence_post_start = $sentence_pre_stop + strlen($text_word) + 2;
$sentence_post = substr($text_sentence, $sentence_post_start);

$audio_word = 'sound_files/words_ogg/';
$audio_word = $audio_word.$text_word.'.ogg';
$msg = $audio_word."\n".'Path + file name not correct.';
assert(file_exists($audio_word), $msg);

$audio_sentence = 'sound_files/sentences_ogg/';
$audio_sentence = $audio_sentence.$text_word.'.ogg';
$msg = $audio_sentence."\n".'Path + file name not correct.';
assert(file_exists($audio_sentence), $msg);

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Spelling</title>
  <link rel="stylesheet" type="text/css" href="../../css/quit_valid.css"/>
  <link rel="stylesheet" type="text/css" href="./css/spelling.css" media="screen"/>
  <script src='../../scripts/jquery.js'></script>
  <script><?php require 'scripts/spelling.js.php'; ?></script>
</head>
<body>
<?php require_once '../quit_help_buttons.php'; ?>
<div id="page" class="page">
  <header>
      <h1 id='h1_one' >Spelling</h1>
      <h2 id='student_identifier' class="student_identifier"><?php echo $_SESSION['tA_StudentName']; ?></h2>
      <h3 id='instructions' class="instructions">Type the word - then the enter key.</h3>
    </header>

  <div id="absolute_center" class="absolute_center">
      <div id='sentence_div' class="sentence_div">
      <span><?php echo $sentence_pre?></span>
      <span><input id='spelling_word_input' class="spelling_word_input" type='text' size = "<?php echo $word_width?>"></span>
      <span><?php echo trim($sentence_post)?></span>
      </div>
  </div>

<div id='bottom_buttons' class="bottom_buttons">
  <p>
    <input
       type='button'
       id='play_word'
       class="play_word"
       value = 'Say word.'
    />
    <input
         type='button'
         id='play_sentence'
         class="play_word"
         value = 'Say sentence.'
    />
  </p>

  <p>
    <?php echo "<audio id='audio1' class = 'audio1' controls  preload='auto'
      autoplay='autoplay' >
      <source id = 'src1' src='$audio_word' />
      </audio>";?>
    <?php echo "<audio id='audio2' class = 'audio2' controls  preload='auto' >
        <source src='$audio_sentence' />
        </audio>";?>
  </p>
</div>
<div class="audio_controls">

</div>
<div id = "problem"  class="problem">Report problem.</div>
<dialog id="Dialog_Exit" class="Dialog_Exit">
    <h2>How to Exit!</h2>
    <p>Press Alt key and F4 key together to close the browser.<br>
            Press Ctr key and w to close tab.</p>
    <button id="closeExitDialog">Exit</button>
</dialog>
<dialog id="Dialog_Help" class="Dialog_Help">
    <h2>Type the word into the box in the sentence.</h2>
    <p>Some words sound the same, but are spelled differently.<br>
            The sentence should give you a clue as to<br>the correct spelling for sound-alike words.</p>
    <button id="closeHelpDialog">Exit</button>
</dialog>
<dialog id="Dialog_Error" class="Dialog_Error" >
    <p class="correct_spelling"></p>
    <button id='okayError' class="okayError">"Okay, I've got it."</button>
</dialog>
</div><!-- page -->
<!-- Simple pop-up dialog box, containing a form -->
<dialog id="problemDialog" class="problemDialog">
  <form method="dialog" action="action_page.php">
    <section>
      <p><label for="theProblem">Please describe the problem:</label></p>
      <input type="text" name="sourceOfProblem" class="sourceOfProblem" value="<?php echo $_SESSION['tG_AssignmentName']; ?>">
      <input type="text" name="studentID" class="studentID" value="<?php echo $_SESSION['tA_S_ID']; ?>">
      <input type="text" name="tA_id" class="tA_id" value="<?php echo $_SESSION['tA_id']; ?>">
      <textarea id="theProblem" class="theProblem" rows="7" cols="63">?</textarea></p>
      <input type="text" name="date_reported" class="date_reported" value="<?php echo $_SESSION['tA_LocalDateTime']; ?>">
    </section>
    <menu class="problemDialogMenu">
      <button id="cancel" type="reset">Cancel</button>
      <button type="submit">Confirm</button>
    </menu>
  </form>
</dialog>

<script>
  (function() {
    //var reportProblem = document.getElementById('problemDialog');
    var cancelButton = document.getElementById('cancel');
    var problem = document.getElementById('problem');

    // Update button opens a modal dialog
    problem.addEventListener('click', function() {
      problemDialog.showModal();
    });

    // Form cancel button closes the dialog box
    cancelButton.addEventListener('click', function() {
      problemDialog.close();
    });

  })();
</script>
</body>
</html>
