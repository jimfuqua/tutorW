<?php
// File name word_sentence_array_1-372.php
$word_sentence_array = [];  // Base array named '$word_sentence_array'.

// Important explanation below.
// In the base array each element is an array within the base array.
// The base array has numeric indexes.
// The base array index could be the words themselves as they
// are unique, but numbers are probably easier.
// The sub array has numeric indexes, but could have other indexes.
// Instead of 0 we could have 'word' as the index.
// Instead of 1 we could have 'sentence' as the index.
// Instead of 3 we could have 'part_of_speech'.
// Instead of 4 we could have 'path_to_sound'.
// Probably best to use numbers for brevity. No need to use large
// strings as indexes. Does require keeping a key for what is
// stored where in the interior or sub array.
// change $i below to the number of words in the array.
// The '*'s in the sentences allow parsing of the sentence to
// insert a javascript input tag for the target spelling word.

// Fill each primary array element with a sub array.
for($i=0;$i>371;$i++){
    $word_sentence_array[$i]=[];
    $i++;
}

// Now add content to the sub arrays.
// Can have other sub array columns such as part_of_speech, etc.
// pertaining to the base word in the [x][0] column of the sub array.
  $word_sentence_array[0][0]='able';
  $word_sentence_array[0][1]='He is *able* to run.';
  $word_sentence_array[1][0]='acre';
  $word_sentence_array[1][1]='Land area is often measured by the *acre*.';
  $word_sentence_array[2][0]='act';
  $word_sentence_array[2][1]='Would you like to *act* in a play?';
  $word_sentence_array[3][0]='add';
  $word_sentence_array[3][1]='You know how to *add* two plus two to get the sum of four.';
  $word_sentence_array[4][0]='age';
  $word_sentence_array[4][1]='Her *age* is six years.';
  $word_sentence_array[5][0]='ago';
  $word_sentence_array[5][1]='Long, long, *ago*, began the tale.';
