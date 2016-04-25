<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Match Phoneme</title>
    <link rel='stylesheet' type='text/css' href='http://localhost/jimfuqua/tutorW/css/quit_valid.css'/>
    <link rel='stylesheet' type='text/css' href='./css/match_phoneme.css'  media='screen' />
    <script><?php require './scripts/match_phoneme.js.php';?></script>
</head>

<body>

<h1>Match Sound to Phoneme</h1>

<h4>Drag the phoneme you heard to the gray box.</h4>

<div  class = "drop_box" ondrop="drop_handler(event);" ondragover="dragover_handler(event);">
    
</div>

<div id='phoneme_pad' class='phoneme_pad'>
    <div>
        <input id='Button_/b/' draggable="true" ondragstart="dragstart_handler(event);" tabindex = '6' type='button' value='/b/'  class='number_button'  />
        <input id='Button_/d/' draggable="true" ondragstart="dragstart_handler(event);" tabindex = '6' tabindex = '6' type='button' value='/d/'  class='number_button'  />
        <input id='Button_/f/' tabindex = '6' type='button' value='/f/'  class='number_button'  />
        <input id='Button_/g/' tabindex = '6' type='button' value='/g/'  class='number_button'  />
        <input id='Button_4' tabindex = '6' type='button' value='/h/'  class='number_button'  />
        <input id='Button_5' tabindex = '6' type='button' value='/j/'  class='number_button'  />
        <input id='Button_6' tabindex = '6' type='button' value='/k/'  class='number_button'  />
        <input id='Button_7' tabindex = '6' type='button' value='/l/'  class='number_button'  />
        <input id='Button_8' tabindex = '6' type='button' value='/m/'  class='number_button'  />
        <input id='Button_9' tabindex = '6' type='button' value='/n/'  class='number_button'  />
        <input id='Button_10' tabindex = '6' type='button' value='/p/'  class='number_button'  />
    </div>
    <div>
        <input id='Button_11' tabindex = '6' type='button' value='/r/'  class='number_button'  />
        <input id='Button_12' tabindex = '6' type='button' value='/s/'  class='number_button'  />
        <input id='Button_13' tabindex = '6' type='button' value='/t/'  class='number_button'  />
        <input id='Button_14' tabindex = '6' type='button' value='/v/'  class='number_button'  />
        <input id='Button_15' tabindex = '6' type='button' value='/w/'  class='number_button'  />
        <input id='Button_16' tabindex = '6' type='button' value='/y/'  class='number_button'  />
        <input id='Button_17' tabindex = '6' type='button' value='/z/'  class='number_button'  />
        <input id='Button_18' tabindex = '6' type='button' value='/th/'  class='number_button'  />
        <input id='Button_19'   tabindex = '6' type='button' value='/ng/'  class='number_button'   />
        <input id='Button_20' tabindex = '6' type='button' value='/th/'  class='number_button'  />
        <input id='Button_21'   tabindex = '6' type='button' value='/ng/'  class='number_button'   />
    </div>
    <div>
        <input id='Button_11' tabindex = '6' type='button' value='/sh/'  class='number_button'  />
        <input id='Button_12' tabindex = '6' type='button' value='/ch/'  class='number_button'  />
        <input id='Button_13' tabindex = '6' type='button' value='/zh/'  class='number_button'  />
        <input id='Button_14' tabindex = '6' type='button' value='/wh/'  class='number_button'  />
        <input id='Button_15' tabindex = '6' type='button' value='/a/'  class='number_button'  />
        <input id='Button_16' tabindex = '6' type='button' value='/e/'  class='number_button'  />
        <input id='Button_17' tabindex = '6' type='button' value='/i/'  class='number_button'  />
        <input id='Button_18' tabindex = '6' type='button' value='/o/'  class='number_button'  />
        <input id='Button_19' tabindex = '6' type='button' value='/u/'  class='number_button'   />
        <input id='Button_20' tabindex = '6' type='button' value='/ā/'  class='number_button'  />
        <input id='Button_21' tabindex = '6' type='button' value='/ē/'  class='number_button'   />
    </div>
    <div>
        <input id='Button_11' tabindex = '6' type='button' value='/ī/'  class='number_button'  />
        <input id='Button_12' tabindex = '6' type='button' value='/ō/'  class='number_button'  />
        <input id='Button_13' tabindex = '6' type='button' value='/ū/'  class='number_button'  />
        <input id='Button_14' tabindex = '6' type='button' value='/oo/'  class='number_button'  />
        <input id='Button_15' tabindex = '6' type='button' value='/ōō/'  class='number_button'  />
        <input id='Button_16' tabindex = '6' type='button' value='/ow/'  class='number_button'  />
        <input id='Button_17' tabindex = '6' type='button' value='/oy/'  class='number_button'  />
        <input id='Button_18' tabindex = '6' type='button' value='/a(r)/'  class='number_button'  />
        <input id='Button_19' tabindex = '6' type='button' value='/i(r)/'  class='number_button'   />
        <input id='Button_20' tabindex = '6' type='button' value='/o(r)/'  class='number_button'  />
        <input id='Button_21' tabindex = '6' type='button' value='/u(r)/-'  class='number_button'   />
    </div>
    <div class="msg_button_1">Click on the phoneme to hear its sound!</div>
    <div class="msg_button_1">Click on me to hear the target sound again!</div>
</div>
</body>
</html>