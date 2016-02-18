<?php
require '../../scripts/basic_vars_lesson_js_PHP';
require '../../scripts/f_exit_from_lesson_js_PHP';
require '../../scripts/f_record_answer_js_PHP';
?>
/*ToDo
record erroneous key stroke values
record keystroke time for each character.
vertical spacing of wpm
create a speed array and a key array
key_speed=new array
key_A= new array
key_speed[65]=key_A
key_key[65]="A"
*/

/*global  escape, window, alert, $, ActiveXObject, jQuery, console, evt */

/*
members ActiveXObject, XMLHttpRequest, addEventListener, appName,
    appendChild, availHeight, availWidth, childNodes, close, createTextNode,
    description, document, errorList, firstChild, floor, focus,
    fromCharCode, getDate, getElementById, getFullYear, getHours,
    getMinutes, getMonth, getSeconds, hasOwnProperty, height, hide,
    id, indexOf, keyCode, length, log, moveTo, name, nodeValue, onerror,
    onreadystatechange, open, opener, overrideMimeType, param, parent,
    preventDefault, push, ready, readyState, removeChild, resizeTo,
    responseText, returnValue, round, screen, send, setRequestHeader,
    setTimeout, sort, srcElement, status, style, submit, substr,
    target, url, value, visibility, which, width, write, writeln
*/

// Global variables
var er;
var t_err;
var started = false;
var lastLine;
var lastLineContents;
var i_last_key;
var screen_width = screen.width;
var screen_height = screen.height;
var line;
var go;
var ls;
var startday;
var stop_clock = false;
var Time_display;
var this_title = "";
var myElement;
var element_this;
var keyAction = [];
var keyActionDetail = [];
var Lesson_Document_component;
var Line1 = "";
var title = "";
var last_key = "900";
var current_key;
var character_in;
var post_string;
var SystemDateTime = " ";
var http_request = false;
var displayLine_value;
var lessons = [];
var i;
var last_key_Time = Math.round(Date.now()/1000);
var clockStart = Math.round(Date.now()/1000);
var current_time = Math.round(Date.now()/1000);
var tC_ClientTimeStarted;
var tC_tGStartRec;
var debugWin;
var index;
var tC_Time_client_processed_answer;
var startTime;

function getTime() {
    'use strict';
    var myTime2 = new Date();
    return (myTime2.getTime());
}

function isCapslock(e){
'use strict';
    e = (e) ? e : window.event;
    var charCode = false;
    if (e.which) {
        charCode = e.which;
    } else if (e.keyCode) {
        charCode = e.keyCode;
    }

    var shifton = false;
    if (e.shiftKey) {
        shifton = e.shiftKey;
    } else if (e.modifiers) {
        shifton = !!(e.modifiers & 4);
    }

    if (charCode >= 97 && charCode <= 122 && shifton) {
        return true;
    }

    if (charCode >= 65 && charCode <= 90 && !shifton) {
        return true;
    }

    return false;
}

for (i = 1; i < 241; i++) {
    lessons[i] = [];
}
lessons[1][1] = "jjj fff jjj fff";
lessons[1][2] = "Lesson 1 The Home Row Keys.";
lessons[2][1] = "kkk ddd kkk ddd";
lessons[2][2] = "Lesson 2 The Home Row Keys.";
lessons[3][1] = "lll sss lll sss";
lessons[3][2] = "Lesson 3 The Home Row Keys.";
lessons[4][1] = ";;; aaa ;;; aaa";
lessons[4][2] = "Lesson 4 The Home Row Keys.";
lessons[5][1] = "fff jjj fff jjj";
lessons[5][2] = "Lesson 5 Review 'f' & 'j'.";
lessons[6][1] = "ddd kkk ddd kkk";
lessons[6][2] = "Lesson 6 Review 'd' & 'k'.";
lessons[7][1] = "lll sss lll sss";
lessons[7][2] = "Lesson 7 Review 'l' & 's'.";
lessons[8][1] = ";;; aaa ;;; aaa";
lessons[8][2] = "Lesson 8 Review ';' & 'a'";
lessons[9][1] = "sss lll sss lll";
lessons[9][2] = "Lesson 9 The Home Row Keys.";
lessons[10][1] = "aaa ;;; aaa ;;;";
lessons[10][2] = "Lesson 10 The Home Row Keys.";

lessons[11][1] = "jjj fff jjj fff";
lessons[11][2] = "Lesson 11 Review.";
lessons[12][1] = "kkk ddd kkk ddd";
lessons[12][2] = "Lesson 12 The Home Row Keys.";
lessons[13][1] = "lll sss lll sss";
lessons[13][2] = "Lesson 13 More Home Row Key drill.";
lessons[14][1] = "ask as; ask as;";
lessons[14][2] = "Lesson 14 More Home Row Key drill.";
lessons[15][1] = "dad dad dad dad";
lessons[15][2] = "Lesson 15 More Home Row Key drill.";
lessons[16][1] = "fad fad fad fad";
lessons[16][2] = "Lesson 16 More Home Row Key drill.";
lessons[17][1] = "had had had had";
lessons[17][2] = "Lesson 17 More Home Row Key drill.";
lessons[18][1] = "lad lad lad lad";
lessons[18][2] = "Lesson 18 More Home Row Key drill.";
lessons[19][1] = "sad sad sad sad";
lessons[19][2] = "Lesson 19 More Home Row Key drill.";
lessons[20][1] = "add add add add";
lessons[20][2] = "Lesson 20 More Home Row Key drill.";

lessons[21][1] = "ask dad lad ask dad lad ask dad lass ask dad";
lessons[21][2] = "Lesson 21 More Home Row Keys.";
lessons[22][1] = "add sad add sad add sad add lad fad lad lass";
lessons[22][2] = "Lesson 22 More Home Row Keys.";
lessons[23][1] = "dad dad fad fad had had had lass lad lad sad";
lessons[23][2] = "Lesson 23 More Home Row Keys.";
lessons[24][1] = "lll sss lll sss ls ls lll sss lll ls lll sss";
lessons[24][2] = "Lesson 24 More Home Row Keys.";
lessons[25][1] = "add sad fad lad had gas lass had dad has lad";
lessons[25][2] = "Lesson 25 Home Row Keys Continued.";
lessons[26][1] = "aaa asaa sss sss ddd ddd fff fff jjj jjj kkk";
lessons[26][2] = "Lesson 26 Home Row Keys Continued.";
lessons[27][1] = "kkk lll lll ;;; ;; as as as ask aa as ask as";
lessons[27][2] = "Lesson 27 Practice Home Row Keys.";
lessons[28][1] = "as ask ask as ask sad sad sad as fad fad fad";
lessons[28][2] = "Lesson 28 Practice Home Row Keys.";
lessons[29][1] = "lad lad a lad gad gad gad as sad gad add lad";
lessons[29][2] = "Lesson 29 The Home Row Keys.";
lessons[30][1] = "lass lass a lass fff ggg fff dad dad dad sad";
lessons[30][2] = "Lesson 30 The Home Row Keys.";


lessons[31][1] = "sad a sad as a as a as ask a ask sad had lad";
lessons[31][2] = "Lesson 31 The Home Row Keys.";
lessons[32][1] = ";;; aa ;; aa ;;; aaa fff a fff jjj a jjj kkk";
lessons[32][2] = "Lesson 32 The Home Row Keys.";
lessons[33][1] = "lll a lll sss a sss ddd aa ddd ask a ask dad";
lessons[33][2] = "Lesson 33 More Home Row Key drill.";
lessons[34][1] = "hag as hag hag ad fad ad had had had lad lad";
lessons[34][2] = "Lesson 34 More Home Row Key drill.";
lessons[35][1] = "lad sad a sad lad sad a sad add a fad had as";
lessons[35][2] = "Lesson 35 More Home Row Key drill.";
lessons[36][1] = "fff rrr fff rrr fff rrr fff rrr fff rrr ffff";
lessons[36][2] = "Lesson 36 r.";
lessons[37][1] = "rrr fff ttt fff ttt fff ttt fff rrr fff tttt";
lessons[37][2] = "Lesson 37 t r.";
lessons[38][1] = "jjj uuu jjj uuu jjj uuu jjj uuu jjj yyy j yy";
lessons[38][2] = "Lesson 38 u y.";
lessons[39][1] = "yyy jjj yyy jjj uuu jjj yyy jjj yyy jjj yjyj";
lessons[39][2] = "Lesson 39 u y.";
lessons[40][1] = "ff jj rrr jj rrr ff uuu jj uuu jj yyy jj ttt";
lessons[40][2] = "Lesson 40 t r u y continued.";

lessons[41][1] = "ff yy jj ttt jj yyy rrr ttt yy ff jj rrr ttt";
lessons[41][2] = "Lesson 41 t r u y continued";
lessons[42][1] = "rat rat rat at sat at fat fat fat tat tat at";
lessons[42][2] = "Lesson 42 t r continued";
lessons[43][1] = "tat at rat at rat sat fat tat at sat rat rat";
lessons[43][2] = "Lesson 43 t r continued";
lessons[44][1] = "ar ar ar jar jar jar tar tar tar jar jar tar";
lessons[44][2] = "Lesson 44 t r continued";
lessons[45][1] = "tar jar jar tar at tar jar jar jar far mar a";
lessons[45][2] = "Lesson 45 Words with r t";
lessons[46][1] = "ar far tar hat hat hat gar gar gar hart hart";
lessons[46][2] = "Lesson 46 Words with r t";
lessons[47][1] = "fff jjj fff jjj fff jjj fff jjj fff jjj fffj";
lessons[47][2] = "Lesson 47 Review";
lessons[48][1] = "hart gar ar far hat hat tar hat gar hart gar";
lessons[48][2] = "Lesson 48 Words with r t";
lessons[49][1] = "a; aaa; aaa; s; aaa; ;;; jjj; fff jjj ff far";
lessons[59][2] = "Lesson 49 Home Row Review";
lessons[50][1] = "ggg all ggg all ggg all hhh all hhh fall hhh";
lessons[50][2] = "Lesson 50 Home Row Review";

lessons[51][1] = "fall hhh fall ggg gall gall ark ggg gas gall";
lessons[51][2] = "Lesson 51 Home Row Words";
lessons[52][1] = "hall hall hall gall gall gall hat hat hat at";
lessons[52][2] = "Lesson 52 Home Row Words";
lessons[53][1] = "sat sat rat grass rat hall hall all gall all";
lessons[53][2] = "Lesson 53 u r t Words";
lessons[54][1] = "gull gull gull hull hull hull hat at far tar";
lessons[54][2] = "Lesson 54 u r t Words";
lessons[55][1] = "tar gar gar hat hat hat sat sat art hull far";
lessons[55][2] = "Lesson 55 Words with u r t";
lessons[56][1] = "fff eee fff eee fff eee fff eee fff eee jjje";
lessons[56][2] = "Lesson 56 Words with u r t";
lessons[57][1] = "site sit sit fit fit fit grit git lit hit it";
lessons[57][2] = "Lesson 57 Practice Words";
lessons[58][1] = "hit it grit lit little little little lit sit";
lessons[58][2] = "Lesson 58 Practice Words";
lessons[59][1] = "eat it eats feat eat feat eat feet it sitter";
lessons[59][2] = "Lesson 59 More Home Row Key drill";
lessons[60][1] = "eat feat heat feat eat feet feat it sigh his";
lessons[60][2] = "Lesson 60 More Home Row Key drill";

lessons[61][1] = "at sat at sat r sat at sat hat at rat rat is";
lessons[61][2] = "Lesson 61 The Home Row Keys";
lessons[62][1] = "eat eat lit sit sat sat rat rat hat risk his";
lessons[62][2] = "Lesson 62 The Home Row Keys";
lessons[63][1] = "lid lid hid hide rid id rid hide rid fid fid";
lessons[63][2] = "Lesson 63 More Home Row Key drill";
lessons[64][1] = "fid lid hid fid rid lid hide rid fid ride id";
lessons[64][2] = "Lesson 64 More Home Row Key drill";
lessons[65][1] = "did did lid the the the it did it rit it the";
lessons[65][2] = "Lesson 65 i";
lessons[66][1] = "the the did did did the the the did lid hide";
lessons[66][2] = "Lesson 66 i";
lessons[67][1] = "he she she she sit he she he far far far air";
lessons[67][2] = "Lesson 67 e";
lessons[68][1] = "air air fair fair fair air at sat rat fat at";
lessons[68][2] = "Lesson 68 i";
lessons[69][1] = "sit is; he is; she is it; he sit the; she it";
lessons[69][2] = "Lesson 69 i r t continued";
lessons[70][1] = "the; he is the; she is the; is it lit little";
lessons[70][2] = "Lesson 70 i r t continued";

lessons[71][1] = "the; he is the; she is the; is it lit little";
lessons[71][2] = "Lesson 71 Words with i r t";
lessons[72][1] = "his hair sat red it her hair sit red; his it";
lessons[72][2] = "Lesson 72 Words with i r t";
lessons[73][1] = "hair is red; her hair is red; the the he she";
lessons[73][2] = "Lesson 73 e";
lessons[74][1] = "jjj ooo jjj ooo jjj ooo jjj ooo jjj ooo ffff";
lessons[74][2] = "Lesson 74 o";
lessons[75][1] = "www fff www fff www fff www fff www fff wwww";
lessons[75][2] = "Lesson 75 f w";
lessons[76][1] = "o jog jog jog fog fog fog log log log hog ho";
lessons[76][2] = "Lesson 76 o f l";
lessons[77][1] = "o hog dog dog dog frog do fog lot tot rot lo";
lessons[77][2] = "Lesson 77 o t";
lessons[78][1] = "w wall was wall was wall was were we were we";
lessons[78][2] = "Lesson 78 w e";
lessons[79][1] = "wall was was were we was what where why what";
lessons[79][2] = "Lesson 79 w r ";
lessons[80][1] = "won hat was what what hen was when when wash";
lessons[80][2] = "Lesson 80 w e ";

lessons[81][1] = "where where why oo at we wash why what we we";
lessons[81][2] = "Lesson 81 Words with o w continued";
lessons[82][1] = "o of off often often oats oat oats oats coat";
lessons[82][2] = "Lesson 82 Words with o w continued";
lessons[83][1] = "coat coats coats oats oats off wood wheel we";
lessons[83][2] = "Lesson 83 m n";
lessons[84][1] = "jj mm nn jj mm nn jj mm nn jj mm nn jj an an";
lessons[84][2] = "Lesson 84 m n";
lessons[85][1] = "on on no no an an not no not nill nan can no";
lessons[85][2] = "Lesson 85 Words with m and n";
lessons[86][1] = "in in san and sand sand and and fan fan moss";
lessons[86][2] = "Lesson 86 Words with m and n";
lessons[87][1] = "moss mat mat mad mad sand fan tan ran an and";
lessons[87][2] = "Lesson 87 Words with m and n";
lessons[88][1] = "on on no no an an not no not nill nan can no";
lessons[88][2] = "Lesson 88 Words with m and n";
lessons[89][1] = "tan tan ran ran am me met meek meal nil mill";
lessons[89][2] = "Lesson 89 Words with m and n";
lessons[90][1] = "man man ad mad met met mess mess mar mar gum";
lessons[90][2] = "Lesson 90 Words with m and n";

lessons[91][1] = "gum gum him him gum game name nap gap sap at";
lessons[91][2] = "Lesson 91 Words with m and n";
lessons[92][1] = "man in the sand sand in the fan fan the sand";
lessons[92][2] = "Lesson 92 Words with m and n";
lessons[93][1] = "sand the fan ran in the at mat rat sat an an";
lessons[93][2] = "Lesson 93 c v";
lessons[94][1] = "cc vv bb cc vv bb cc vv bb cc vv bb cc vv bb";
lessons[94][2] = "Lesson 94 c v";
lessons[95][1] = "cc vv bb cc vv bb cc vv bb vv cc bb cc vv bb";
lessons[95][2] = "Lesson 95 Words with c v";
lessons[96][1] = "cove cove can can van van tan tan an ran bat";
lessons[96][2] = "Lesson 96 Words with c v";
lessons[97][1] = "at back back cat cat cast cap can cam vacuum";
lessons[97][2] = "Lesson 97 Words with c v b";
lessons[98][1] = "vat vat vote vote vol vole vent vent vet vet";
lessons[98][2] = "Lesson 98 Words with c v b";
lessons[99][1] = "vivid vivid vote vote vat go vivid vat at ab";
lessons[99][2] = "Lesson 99 Words with c v b";
lessons[100][1] = "boat bat boat boat bobbing bobbing bard bard";
lessons[100][2] = "Lesson 100 Words with c v b";

lessons[101][1] = "bar cart bet cart best be boat bard back bat";
lessons[101][2] = "Lesson 101 More Home Row Keys";
lessons[102][1] = "bat fat rat mat net cat hat sat note hot rot";
lessons[102][2] = "Lesson 102 More Home Row Keys";
lessons[103][1] = "cot loot not rot coot lot can van ap nap sap";
lessons[103][2] = "Lesson 103 p and q";
lessons[104][1] = "ppp qqq pp qq pp qq pp qq pp qq pat pat quit";
lessons[104][2] = "Lesson 104 p and q";
lessons[105][1] = "quit pop pop quo quo quit at it quit quo pop";
lessons[105][2] = "Lesson 105 p and q";
lessons[106][1] = "quick quick quit quiet quit quiet quit quiet";
lessons[106][2] = "Lesson 106 p and q";
lessons[107][1] = "quo quick quo quill quit quill quit quit quo";
lessons[107][2] = "Lesson 107 p and q";
lessons[108][1] = "p pot pop pop plat pat plan pan pet plat pep";
lessons[108][2] = "Lesson 108 p and q";
lessons[109][1] = "p pep pet pop pet pip plan pip pill pop pill";
lessons[109][2] = "Lesson 109 Practice Words with p and q";
lessons[110][1] = "up cup puck pup puck pup tuck luck tuck luck";
lessons[110][2] = "Lesson 110 Practice Words with p and q";

lessons[111][1] = "p puck puck apt apt cap tap lap pat puck tip";
lessons[111][2] = "Lesson 111 Practice Words with p and q";
lessons[112][1] = "q quit quit quo quo quill quill pot pet pill";
lessons[112][2] = "Lesson 112 Practice Words with p and q";
lessons[113][1] = "q pan pet pip pop por quit quit quo pot quit";
lessons[113][2] = "Lesson 113 z";
lessons[114][1] = "aa zz qq aa zz qq aa zz qq aa zz qq qq zz aa";
lessons[114][2] = "Lesson 114 z";
lessons[115][1] = "qq zz qq zz aa qq zz qaz zz qaz zz qaz zz qz";
lessons[115][2] = "Lesson 115 z words";
lessons[116][1] = "zot zot zap zap zip zip zen zen zone zone qz";
lessons[116][2] = "Lesson 116 z words";
lessons[117][1] = "zoo zoo zinc zinc zero zero zz qaz zaq qaz z";
lessons[117][2] = "Lesson 117 Words with x z";
lessons[118][1] = "xx zz xx zxz xx zxz z xx zz extra zest extra";
lessons[118][2] = "Lesson 118 Words with x z";
lessons[119][1] = "zest xenon xenon extra fix xxzz zx xz xe zeb";
lessons[119][2] = "Lesson 119 Words with z and x";
lessons[120][1] = "text next ax ax lax lax fax fax sax sax ax z";
lessons[120][2] = "Lesson 120 Words with z and x";

lessons[121][1] = "At An A Are Am An And And An An An Sand Ran";
lessons[121][2] = "Lesson 121 The Right Shift Key";
lessons[122][1] = "RAT At RAT Mat CAT At FAT Cat Rat Sat Fat At";
lessons[122][2] = "Lesson 122 The Right Shift Key";
lessons[123][1] = "A a A a A a A a A a A a A a A a A a A S s Ss";
lessons[123][2] = "Lesson 123 The Right Shift Key";
lessons[124][1] = "As S d Dd d D f F f F g G g F f D d D Ad Fat";
lessons[124][2] = "Lesson 124 The Right Shift Key";
lessons[125][1] = "Q q Q q W w W w E e E e R r T t B b V v C Ca";
lessons[125][2] = "Lesson 125 The Right Shift Key continued";
lessons[126][1] = "X x X x Z z Z a A a A Q q Z X V Bat Quit Fit";
lessons[126][2] = "Lesson 126 The Right Shift Key continued";
lessons[127][1] = "Sat At Cat Rat Fat As At Tape Rack Soap Arts";
lessons[127][2] = "Lesson 127 The Right Shift Key continued";
lessons[128][1] = "Aa Aa And And Fan Fan Ran Ran Can Can Ant At";
lessons[128][2] = "Lesson 128 The Right Shift Key continued";
lessons[129][1] = "And An And Fan And Ax Zap Quit Was What Rope";
lessons[129][2] = "Lesson 129 The Right Shift Key continued";

lessons[130][1] = "Hh Jj Kk Ll Yy Ii Oo Pp Nn Mm It Is Me My It";
lessons[130][2] = "Lesson 130 The Right Shift Key continued";
lessons[131][1] = "Hat Pat Nat Fat A You Kin You No Mo I Pa Haw";
lessons[131][2] = "Lesson 131 The Left Shift Key";
lessons[132][1] = "Nat Mat Pat Onyx Onyx Onion Onion One At Mop";
lessons[132][2] = "Lesson 132 The Left Shift Key";
lessons[133][1] = "No No Rot Cot Lot Jot Pot Up No Mo You He Jo";
lessons[133][2] = "Lesson 133 The Left Shift Key";
lessons[134][1] = "Pete Pap Pip Pin Open Pen It It I I I In Yes";
lessons[134][2] = "Lesson 134 The Left Shift Key";
lessons[135][1] = "Yes You You Yo Yo No A You In He Kim Him Mop";
lessons[135][2] = "Lesson 135 The Left Shift Key continued";
lessons[136][1] = "He h H h I I Hi Hi Him Him He He His His Hit";
lessons[136][2] = "Lesson 136 The Left Shift Key continued";
lessons[137][1] = "Hit Kit Kick Let Lot Lot Lick Kick Hick Nick";
lessons[137][2] = "Lesson 137 The Left Shift Key continued";
lessons[138][1] = "Pet Pet Pep Pots Pat Pam Pam Sam Sam Pam Pam";
lessons[138][2] = "Lesson 138 The Left Shift Key continued";
lessons[139][1] = "Am And Fan Hand You No Me My Kip Lip Up In I";
lessons[139][2] = "Lesson 139 . ,";
lessons[140][1] = "I. , , .. ,, kk ,, ll .. ll .. o .. Oo .. ii";
lessons[140][2] = "Lesson 140 . ,";

lessons[141][1] = "I,, .. ,, jj ,, jj .. ;; .. hh .. ,, hh .. l";
lessons[141][2] = "Lesson 141 . ,";
lessons[142][1] = "I can type. I like to type. Typing is fun.";
lessons[142][2] = "Lesson 142 . ,";
lessons[143][1] = "I like to type. With practice I type faster.";
lessons[143][2] = "Lesson 143 . ,";
lessons[144][1] = "I can type fast. I work hard. I type fast.";
lessons[144][2] = "Lesson 144 . ,";
lessons[145][1] = "You can type, but you must practice to type.";
lessons[145][2] = "Lesson 145 Sentences";
lessons[146][1] = "Many receive advice, only the wise profit by it.";
lessons[146][2] = "Lesson 146 Sentences";
lessons[147][1] = "There is nothing permanent except change.";
lessons[147][2] = "Lesson 147 Sentences";
lessons[148][1] = "Only the educated are free. Epictetus.";
lessons[148][2] = "Lesson 148 Sentences";
lessons[149][1] = "Only the educated are free. Epictetus.";
lessons[149][2] = "Lesson 149 Sentences";
lessons[150][1] = "Facts do not go away because you ignore them.";
lessons[150][2] = "Lesson 150 Number Keys";

lessons[151][1] = "a 1a a 1 z 1 a z q 1 a z q 1 a z 1 s w 2 s w";
lessons[151][2] = "Lesson 151 Number Keys";
lessons[152][1] = "2 2 s w w 2x x x2 x 2 x x2x x 2x2 x2x 222 xs";
lessons[152][2] = "Lesson 152 1 2 3 4";
lessons[153][1] = "a 1 a 1 a z 1 a z 1 2 x 2 w x 2 3 3edc 12 34";
lessons[153][2] = "Lesson 153 1 2 3 4";
lessons[154][1] = "c 3 c e c 3 c 3 d c 3 3 d c 3 d 123d 3e 3c 3";
lessons[154][2] = "Lesson 154 1234";
lessons[155][1] = "4 v 4 r f v v 4 r v 4 4 v 4 f 4 v 4 1 2 3 4f";
lessons[155][2] = "Lesson 155 1234";
lessons[156][1] = "v a 1 2 3 4 1234 1234 1 2 3 4 1 fr4 de3 sw21";
lessons[156][2] = "Lesson 156 1 2 3 4";
lessons[157][1] = "aq1 w2 de3 I like to type. I can type fast.";
lessons[157][2] = "Lesson 157 1 2 3 4";
lessons[158][1] = "a1s2 I learn more every day. Typing is fun!";
lessons[158][2] = "Lesson 158 1234";
lessons[159][1] = "1234 1234 1234 1 2 3 4 1234 1234 1234 1234 3";
lessons[159][2] = "Lesson 159 1234";
lessons[160][1] = "all s22 d33 f44 v4 1234 TMenu 1234 s2 1234 1234";
lessons[160][2] = "Lesson 160 1 2 3 4";

lessons[160][1] = "2 2 s w w 2x x x2 x 2 x x2x x 2x2 x2x 222 xs";
lessons[160][2] = "Lesson 160 1 2 3 4";
lessons[161][1] = "456 456 456 456 456 456 456 456 456 456 3456";
lessons[161][2] = "Lesson 161 Number Keys";
lessons[162][1] = "456 456 456 456 456 3456 23456 f56 t6 t6 r56";
lessons[162][2] = "Lesson 162 Number Keys";
lessons[163][1] = "4 5 6 44 55 66 4 46 46 46 36 34 35 34 35 365";
lessons[163][2] = "Lesson 163 1 2 3 4 5 6";
lessons[164][1] = "35 36 24 25 26 14 15 d3 f4 f5 f6 t6 r5 e3 r4";
lessons[164][2] = "Lesson 164 1 2 3 4 5 6";
lessons[165][1] = "654 654 654 654 654 654 456 654 456 654 456f";
lessons[165][2] = "Lesson 165 1 2 3 4 5 6";
lessons[166][1] = "654 456 654 456 654 r45 t54 e34 s23 a1 1a a1";
lessons[166][2] = "Lesson 166 1 2 3 4 5 6";
lessons[167][1] = "I like to type. I can type fast. 33 44 22 1";
lessons[167][2] = "Lesson 167 1 2 3 4 5 6";
lessons[168][1] = "I learn more every day. Typing is fun. 2345";
lessons[168][2] = "Lesson 168 1 2 3 4 5 6";
lessons[169][1] = "1234 1234 1234 1 2 3 4 1234 1234 1234 e3 w23";
lessons[169][2] = "Lesson 169 1 2 3 4 5 6";
lessons[170][1] = "1234 1234 1234 1234 1234 a1 s2 d3 f4 f5 f6 1";
lessons[170][2] = "Lesson 170 1 2 3 4 5 6";

lessons[171][1] = "7890 7890 7890 7890 7890 7890 7890 7890 0987";
lessons[171][2] = "Lesson 171 7 8 9 0";
lessons[172][1] = "0987 0987 0987 9870 0987 7890 0987 8 7 9 0 7";
lessons[172][2] = "Lesson 172 7 8 9 0";
lessons[173][1] = "07 07 70 07 07 70 17 17 27 28 28 29 29 01 01";
lessons[173][2] = "Lesson 173 7 8 9 0";
lessons[174][1] = "10 10 11 00 99 88 77 o9 jy7 ft6 fr4 fr5 ju78";
lessons[174][2] = "Lesson 174 7 8 9 0";
lessons[175][1] = "67 67 67 67 67 67 67 67 67 67 76 76 76 76 67";
lessons[175][2] = "Lesson 175 1 2 3 4 5 6 7 8 9 0";
lessons[176][1] = "67 76 67 67 76 76 67 123456 7890 1234 7890 4";
lessons[176][2] = "Lesson 176 1 2 3 4 5 6 7 8 9 0";
lessons[177][1] = "I like to type. I type fast. I type fast.";
lessons[177][2] = "Lesson 177 1 2 3 4 5 6 7 8 9 0";
lessons[178][1] = "I learn more every day. Typing is fun. 248";
lessons[178][2] = "Lesson 178 1 2 3 4 5 6 7 8 9 0";
lessons[179][1] = "56 57 58 59 60 10 11 12 13 14 15 16 17 18 19";
lessons[179][2] = "Lesson 179 1 2 3 4 5 6 7 8 9 0";
lessons[180][1] = "20 21 22 23 24 25 26 10 29 38 47 57 12 39 22";
lessons[180][2] = "Lesson 180 1 2 3 4 5 6 7 8 9 0";

lessons[181][1] = "A sentence tells a complete thought.";
lessons[181][2] = "Lesson 181 Parts of Sentences";
lessons[182][1] = "In a sentence a subject tells who or what.";
lessons[182][2] = "Lesson 182 Parts of Sentences";
lessons[183][1] = "In a sentence a verb tells about action.";
lessons[183][2] = "Lesson 183 Parts of Sentences";
lessons[184][1] = "A subject is usually a noun or pronoun.";
lessons[184][2] = "Lesson 184 Parts of Sentences";
lessons[185][1] = "Nouns name things.";
lessons[185][2] = "Lesson 185 Parts of Sentences";
lessons[186][1] = "Pronouns are a short way of telling who.";
lessons[186][2] = "Lesson 186 Parts of Sentences.";
lessons[187][1] = "I ran. I ran fast. I ran very fast.";
lessons[187][2] = "Lesson 187 Practice";
lessons[188][1] = "I learn more every day. Typing is fun. 2348";
lessons[188][2] = "Lesson 188 Practice";
lessons[189][1] = "56 57 58 59 60 10 11 12 13 14 15 16 17 18 19";
lessons[189][2] = "Lesson 189 Practice";
lessons[190][1] = "20 21 22 23 24 25 26 10 29 38 47 57 12 39 22";
lessons[190][2] = "Lesson 190 Practice";

lessons[191][1] = "A sentence usually ends with a period.";
lessons[191][2] = "Lesson 191 Questions?";
lessons[192][1] = "A question ends with a question mark.";
lessons[192][2] = "Lesson 192 Questions?";
lessons[193][1] = "Is a question a sentence?";
lessons[193][2] = "Lesson 193 Questions?";
lessons[194][1] = "A question is a special kind of sentence.";
lessons[194][2] = "Lesson 194 Questions?";
lessons[195][1] = "A question asks something.";
lessons[195][2] = "Lesson 195 Questions?";
lessons[196][1] = "Start sentences with a capital letter.";
lessons[196][2] = "Lesson 196 Questions?";
lessons[197][1] = "Start questions with a capital letter.";
lessons[197][2] = "Lesson 197 Questions?";
lessons[198][1] = "Exclamations are sentences with energy.";
lessons[198][2] = "Lesson 198 Exclamations!";
lessons[199][1] = "Exclamations end with!";
lessons[199][2] = "Lesson 199 Exclamations!";
lessons[200][1] = "I like to type fast.";
lessons[200][2] = "Lesson 200 Exclamations!";

lessons[201][1] = "You, me, he, she and I are pronouns.";
lessons[201][2] = "Lesson 201 Pronouns";
lessons[202][1] = "You, me, he, she and I are singular.";
lessons[202][2] = "Lesson 202 Singular Pronouns";
lessons[203][1] = "Them, they and their are pronouns too.";
lessons[203][2] = "Lesson 203 Pronouns";
lessons[204][1] = "Them, they and their are plural.";
lessons[204][2] = "Lesson 204 Plural Pronouns";
lessons[205][1] = "His, hers and my are possessive pronouns.";
lessons[205][2] = "Lesson 205 Possessive Pronouns";
lessons[206][1] = "His, hers and my are singular.";
lessons[206][2] = "Lesson 206 Singular Pronouns";
lessons[207][1] = "Their and our are possessive pronouns too.";
lessons[207][2] = "Lesson 207 Possessive Pronouns";
lessons[208][1] = "Their and our are plural.";
lessons[208][2] = "Lesson 208 Plural Pronouns";
lessons[209][1] = "Pronouns are a short way of telling who.";
lessons[209][2] = "Lesson 209 Pronouns replace nouns.";
lessons[210][1] = "554545455565456456446645";
lessons[210][2] = "Lesson 210 Number Practice";

lessons[211][1] = "545454656565545645545546";
lessons[211][2] = "Lesson 211   4 5 6";
lessons[212][1] = "466446456654654654555666";
lessons[212][2] = "Lesson 212   4 5 6";
lessons[213][1] = "444456456554466554566545";
lessons[213][2] = "Lesson 213   4 5 6";
lessons[214][1] = "515151511515151551155154";
lessons[214][2] = "Lesson 214   1 5";
lessons[215][1] = "51515151151515155115515";
lessons[215][2] = "Lesson 215   1 5";
lessons[216][1] = "154156525215225252565456";
lessons[216][2] = "Lesson 216   1 4 5 6";
lessons[217][1] = "535353535353353535353535";
lessons[217][2] = "Lesson 217   3 5";
lessons[218][1] = "353555335353351335355353";
lessons[218][2] = "Lesson 218   3 5";
lessons[219][1] = "I can type fast. I learn more every day.";
lessons[219][2] = "Lesson 219 Sentences.";
lessons[220][1] = "Typing fast will save me time.";
lessons[220][2] = "Lesson 220 Sentences.";

lessons[221][1] = "565757575757757575755858585858";
lessons[221][2] = "Lesson 221 Numbers and Operators";
lessons[222][1] = "755858585858858554561234567775";
lessons[222][2] = "Lesson 222 Numbers and Operators";
lessons[223][1] = "595859595959599595959595565758";
lessons[223][2] = "Lesson 223 Numbers and Operators";
lessons[224][1] = "949691927418529630808040524205";
lessons[224][2] = "Lesson 224 Numbers and Operators";
lessons[225][1] = escape("05060+0408010090/6*6-5+5-5.50.");
lessons[225][2] = "Lesson 225 Numbers and Operators";
lessons[226][1] = "7410852963741852963/*-+786548657864321";
lessons[226][2] = "Lesson 226 Numbers and Operators";
lessons[227][1] = escape("123456789012345678901234567890/*-+1234");
lessons[227][2] = "Lesson 227 Numbers and Operators";
lessons[228][1] = "0987654321098765432101234567890/*-+098";
lessons[228][2] = "Lesson 228 Numbers and Operators";
lessons[229][1] = escape("456123789123456789010203040506070809/*");
lessons[229][2] = "Lesson 229 Numbers and Operators";
lessons[230][1] = "12345678900987654321001470258036898765";
lessons[230][2] = "Lesson 230 Numbers and Operators";

lessons[231][1] = escape("1!1@23#4$5%6^!1!1@2#3$4%5^6!@#$%^");
lessons[231][2] = "Lesson 231 Symbols and Numbers and Operators";
lessons[232][1] = escape("!&7p;!&!&@(@(@(#)#)#)#)$_$_$_$_-=0 - - =");
lessons[232][2] = "Lesson 232 Symbols and Numbers and Operators";
lessons[233][1] = escape("&&&2*2*2() () () (k) (o) (0) (w) (3) (+1)");
lessons[233][2] = "Lesson 233 Symbols and Numbers";
lessons[234][1] = escape("2-3 2+3 3+4 (3) 2-2=0 3-3=0 3-2=1 (3-2)=1");
lessons[234][2] = "Lesson 234 Symbols and Numbers";
lessons[235][1] = escape("$33.33 $23.99 $22.32 $12.32 $1.33 $3.33");
lessons[235][2] = "Lesson 235 Symbols and Numbers";
lessons[236][1] = escape("/*-+/*-+///***---+++ 8/6 7*8 1-8 8-1 8/4 4");
lessons[236][2] = "Lesson 236 Symbols and Numbers";
lessons[237][1] = "1 2 3 4 5 6 7 8 9 0 0123456789 88 22 44 66";
lessons[237][2] = "Lesson 237 Symbols and Numbers";
lessons[238][1] = "14725836978945612301020304050607080908";
lessons[238][2] = "Lesson 238 Symbols and Numbers";
lessons[239][1] = escape("5/6 7*4 1-8 7+5 3/1 6+8 4*6 7-8 1/9 4/8-8");
lessons[239][2] = "Lesson 239 Symbols and Numbers";
lessons[240][1] = escape("5/6 7*4 1-8 7+5 3/1 6+8 4*6 7-8 1/9 4/8-8");
lessons[240][2] = "Lesson 240 Symbols and Numbers";

var f;
var index;
var key_speed = []; // This won't work by itself as each write will overwrite the previous time.
// Need separate array for each letter.  Each array entry must be an array.  This is done below.  The first
// round in lines 294-386 creates an array for each character below ASCII 128.  The next round in lines 392-487
// attaches each individual charater array to key_speed with an index of the ASCII code for that letter.  See
// after line 490 for the key-pair array.
var key_space = [];
var key_exclamation_mark = [];
var key_quotation_mark = [];
var key_pound = [];
var key_dollar_sign = [];
var key_percent = [];
var key_ampersand = [];
var key_apostrophe = [];
var key_open_parenthesis = [];
var key_close_parenthesis = [];
var key_asterisk = [];
var key_plus = [];
var key_comma = [];
var key_minus = [];
var key_period = [];
var key_forward_slash = [];
var key_0 = [];
var key_1 = [];
var key_2 = [];
var key_3 = [];
var key_4 = [];
var key_5 = [];
var key_6 = [];
var key_7 = [];
var key_8 = [];
var key_9 = [];
var key_colon = [];
var key_semicolon = [];
var key_less_than_sign = [];
var key_equal = [];
var key_greater_than_sign = [];
var key_queston_mark = [];
var key_at_sign = [];
var key_A = [];
var key_B = [];
var key_C = [];
var key_D = [];
var key_E = [];
var key_F = [];
var key_G = [];
var key_H = [];
var key_I = [];
var key_J = [];
var key_K = [];
var key_L = [];
var key_M = [];
var key_N = [];
var key_O = [];
var key_P = [];
var key_Q = [];
var key_R = [];
var key_S = [];
var key_T = [];
var key_U = [];
var key_V = [];
var key_W = [];
var key_X = [];
var key_Y = [];
var key_Z = [];
var key_left_square_bracket = [];
var key_backslash = [];
var key_right_square_bracket = [];
var key_circumflex_accent = [];
var key_underscore = [];
var key_grave_accent = [];
var key_a = [];
var key_b = [];
var key_c = [];
var key_d = [];
var key_e = [];
var key_f = [];
var key_g = [];
var key_h = [];
var key_i = [];
var key_j = [];
var key_k = [];
var key_l = [];
var key_m = [];
var key_n = [];
var key_o = [];
var key_p = [];
var key_q = [];
var key_r = [];
var key_s = [];
var key_t = [];
var key_u = [];
var key_v = [];
var key_w = [];
var key_x = [];
var key_y = [];
var key_z = [];
var key_left_curly_brace = [];
var key_vertical_bar = [];
var key_right__curly_brace = [];
var key_tilde = [];
var key_delete = [];
var median_key_speed = [];

key_speed[32] = key_space;
key_speed[33] = key_exclamation_mark;
key_speed[34] = key_quotation_mark;
key_speed[35] = key_pound;
key_speed[36] = key_dollar_sign;
key_speed[37] = key_percent;
key_speed[38] = key_ampersand;
key_speed[39] = key_apostrophe;
key_speed[40] = key_open_parenthesis;
key_speed[41] = key_close_parenthesis;
key_speed[42] = key_asterisk;
key_speed[43] = key_plus;
key_speed[44] = key_comma;
key_speed[45] = key_minus;
key_speed[46] = key_period;
key_speed[47] = key_forward_slash;
key_speed[48] = key_0;
key_speed[49] = key_1;
key_speed[50] = key_2;
key_speed[51] = key_3;
key_speed[52] = key_4;
key_speed[53] = key_5;
key_speed[54] = key_6;
key_speed[55] = key_7;
key_speed[56] = key_8;
key_speed[57] = key_9;
key_speed[58] = key_colon;
key_speed[59] = key_semicolon;
key_speed[60] = key_less_than_sign;
key_speed[61] = key_equal;
key_speed[62] = key_greater_than_sign;
key_speed[63] = key_queston_mark;
key_speed[64] = key_at_sign;
key_speed[65] = key_A;
key_speed[66] = key_B;
key_speed[67] = key_C;
key_speed[68] = key_D;
key_speed[69] = key_E;
key_speed[70] = key_F;
key_speed[71] = key_G;
key_speed[72] = key_H;
key_speed[73] = key_I;
key_speed[74] = key_J;
key_speed[75] = key_K;
key_speed[76] = key_L;
key_speed[77] = key_M;
key_speed[78] = key_N;
key_speed[79] = key_O;
key_speed[80] = key_P;
key_speed[81] = key_Q;
key_speed[82] = key_R;
key_speed[83] = key_S;
key_speed[84] = key_T;
key_speed[85] = key_U;
key_speed[86] = key_V;
key_speed[87] = key_W;
key_speed[88] = key_X;
key_speed[89] = key_Y;
key_speed[90] = key_Z;
key_speed[91] = key_left_square_bracket;
key_speed[92] = key_backslash;
key_speed[93] = key_right_square_bracket;
key_speed[94] = key_circumflex_accent;
key_speed[95] = key_underscore;
key_speed[96] = key_grave_accent;
key_speed[97] = key_a;
key_speed[98] = key_b;
key_speed[99] = key_c;
key_speed[100] = key_d;
key_speed[101] = key_e;
key_speed[102] = key_f;
key_speed[103] = key_g;
key_speed[104] = key_h;
key_speed[105] = key_i;
key_speed[106] = key_j;
key_speed[107] = key_k;
key_speed[108] = key_l;
key_speed[109] = key_m;
key_speed[110] = key_n;
key_speed[111] = key_o;
key_speed[112] = key_p;
key_speed[113] = key_q;
key_speed[114] = key_r;
key_speed[115] = key_s;
key_speed[116] = key_t;
key_speed[117] = key_u;
key_speed[118] = key_v;
key_speed[119] = key_w;
key_speed[120] = key_x;
key_speed[121] = key_y;
key_speed[122] = key_z;
key_speed[123] = key_left_curly_brace;
key_speed[124] = key_vertical_bar;
key_speed[125] = key_right__curly_brace;
key_speed[126] = key_tilde;
key_speed[127] = key_delete;

// Need a letter pair array for any combination of two letters.
var key_pair = [];
// Each entry in the array will be an array with a two letter name (i.e. th or an ) and a time representing
// the time between the strike of the two characters in seqence.  The index should be construed to put all
// data in the same two-character array.  This is done by constructing the numerical index of key_pair to
// have the ASCII or UTF-8 first digit codes as the index.  To avoid confusion pad the first character with
// 9 if the code is two digit.  If it is null use 900.

function tellerror(errMsg, location, lineNum) {
    'use strict';
    debugWin = window.open("", "debugWin", "height=300,width=550,resize=yes, scrollbars=yes");
    debugWin.document.write("There was an error at line " + lineNum);
    debugWin.document.writeln("<BR>The error was: " + errMsg);
    debugWin.document.writeln("<BR><BR>Location: " + location);
    debugWin.document.writeln("");
    debugWin.document.writeln("");
    debugWin.document.writeln("Alt F4 to close.");
    debugWin.document.close();
    return true;
}

window.onerror = tellerror;

function close_window() {
    'use strict';
    alert('Press Alt-F4 to close this window.');
}



function clearLines_and_TypingSpeeds() {
    'use strict';
    // called by: do_lesson(), formload(), gotFocus()
    Lesson_Document_component = document.getElementById("txt1a");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("wpm1a");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("err1a");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("L1_WPM");
    Lesson_Document_component.value = 0;
    Lesson_Document_component = document.getElementById("txt1b");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("wpm1b");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("err1b");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("L2_WPM");
    Lesson_Document_component.value = 0;
    Lesson_Document_component = document.getElementById("txt1c");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("wpm1c");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("err1c");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("L3_WPM");
    Lesson_Document_component.value = 0;
    Lesson_Document_component = document.getElementById("txt1d");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("wpm1d");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("err1d");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("L4_WPM");
    Lesson_Document_component.value = 0;
    Lesson_Document_component = document.getElementById("txt1e");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("wpm1e");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("err1e");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("L5_WPM");
    Lesson_Document_component.value = 0;
    Lesson_Document_component = document.getElementById("KSSecond");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("CorrectKeyStrokes");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("AverageSpeed");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("t_err");
    Lesson_Document_component.value = "0";
    Lesson_Document_component = document.getElementById("Time_Working");
    Lesson_Document_component.value = "";
    Lesson_Document_component = document.getElementById("LineNo");
    Lesson_Document_component.value = "txt1a";
    Lesson_Document_component = document.getElementById("txt1a");
    Lesson_Document_component.focus();
}

function do_lesson() {
    'use strict';
    // called by: formload(), clearLines_and_TypingSpeeds()
    var displayLine = window.document.getElementById('displayLine1');
    startday = Math.round(Date.now()/1000);
    // alert(startday);
    clearLines_and_TypingSpeeds();
    displayLine.value = Line1;
    Lesson_Document_component = document.getElementById("LineNo");
    Lesson_Document_component.value = "txt1a";
    Lesson_Document_component = document.getElementById("txt1a");
    Lesson_Document_component.focus();
    clockStart = Math.round(Date.now()/1000);
    startTime = 0;
    stop_clock = false;
}

function maximizeWin() {
    'use strict';
    // called by $(document).ready(function() {
    if (window.screen) {
        var aw = screen.availWidth,
            ah = screen.availHeight;
        window.moveTo(0, 0);
        window.resizeTo(aw, ah);
    }
}

function initStopwatch() {
    'use strict';
    var myTime = Math.round(Date.now()/1000);
    return (myTime - clockStart);
}

function clearText(element) {
    'use strict';
    var childNode,
        i;
    if (element !== null) {
        if (element.childNodes) {
            for (i = 0; i < element.childNodes.length; i++) {
                childNode = element.childNodes[i];
                element.removeChild(childNode);
            }
        }
    }
}

function replaceText(element, text) {
    'use strict';
    if (element !== null) {
        clearText(element);
        var newNode = document.createTextNode(text);
        element.appendChild(newNode);
    } else {
        alert("The element is empty at 943 in Typing_Single_Template.js");
    }
}

function doNothing(evt) {
    'use strict';
    if (evt.preventDefault) {
        evt.preventDefault();
    } else {
        evt.returnValue = false;
    }
    return false;
}

function record_wpm(target) {
    'use strict';
    var wpm = 0;
    var timeTyping = Date.now()/1000 - startTime;
    // console.log("991 record_wpm timeTyping = " + timeTyping);
    var line_copied = document.getElementById('displayLine1');
    var displayLine1 = line_copied.value;
    // wpm = characters per minute / 5
    // characters per second = length in characters/time in seconds
    // length = line_copied.value.length
    // time = timeTyping
    // therefore characters per second = line_copied.value.length / timeTyping
    // console.log("999 line_copied.value = " + line_copied.value);
    // console.log("1000 line_copied.value.length = " + line_copied.value.length);
    // console.log ("1001 characters per second = " + line_copied.value.length / timeTyping);
    // characters per minute = characters per second * 60 seconds/minute
    // console.log ("1003 characters per minute = " + line_copied.value.length / timeTyping * 60);
    // wpm = characters per minute / 5
    // length/timeTypng*60"seconds/minute"/5 "characters/per word"
    wpm = (line_copied.value.length/timeTyping)*60/5;
    // console.log ("1007 wpm = " + wpm);

    var the_control = document.getElementById(target); // the display
    the_control.value = Math.round(wpm);

    //console.log("1008 record_wpm x = " + x);

    startTime = Date.now()/1000;  // reset startTime a global variable.
}

function sortNumber(a, b) {
    'use strict';
    return a - b;
}

function Median(arrList) {
    'use strict';
    arrList = arrList.sort(sortNumber);
    var intLength = arrList.length;
    // Use the modulus operator to determine whether the array's length is odd or even
    // Use Math.floor to truncate numbers
    if ((intLength % 2) === 1) { //if odd ((n+1)/2)
        return (arrList[Math.floor(intLength / 2) + 1]);
    }
    return ((arrList[intLength / 2 + 1] + arrList[intLength / 2]) / 2);
} // end of function median

function save_data(KSSecond) { // THIS IS THE EXIT FROM THIS LESSON
    'use strict';
    var j;
    j = '{';
    j = j + '"tC_More_data_about_response"';
    j = j + ":[";
    j = j + '"errors:' + $("#t_err").val() + '",'
    j = j + '"elapsedTime:' + $("#Time_Working").val() + '",'
    j = j + '"average_speed:' + $('#AverageSpeed').val() + '",';
    j = j + '"KSSecond:' + $('#KSSecond').val() + '",';
    j = j + '"displayLine1:' + $('#displayLine1').val() + '"';
    j = j +  ']}';
    tC_More_data_about_response = j;
    // add line

    console.log (tC_More_data_about_response);
    errors_made = $("#t_err").val();
    //tA_RepsTowardM = 'Plus1';
    tC_Time_client_processed_answer = Math.round(Date.now()/1000);
    record_answer(1);
}   // This updates the completed table.

function endTyping(element_this) {
    'use strict';
    var data,
        wpm,
        AverageSpeed,
        KSSecond,
        x;
    switch (element_this.id) {
    case 'txt1a':
        wpm = "wpm1a";
        break;
    case 'txt1b':
        wpm = "wpm1b";
        break;
    case 'txt1c':
        wpm = "wpm1c";
        break;
    case 'txt1d':
        wpm = "wpm1d";
        break;
    case 'txt1e':
        wpm = "wpm1e";
        break;
    default:
        break;
    }

    record_wpm(wpm);
    if (wpm === 'wpm1e') {
        AverageSpeed = document.getElementById("AverageSpeed");
        x = parseInt(document.getElementById("wpm1a").value, 10);
        x = x + parseInt(document.getElementById("wpm1b").value, 10);
        x = x + parseInt(document.getElementById("wpm1c").value, 10);
        x = x + parseInt(document.getElementById("wpm1d").value, 10);
        x = x + parseInt(document.getElementById("wpm1e").value, 10);
        x = Math.round(x / 5);
        AverageSpeed.value = x;
        KSSecond = Math.round(document.getElementById("CorrectKeyStrokes").value / initStopwatch());
        document.getElementById("KSSecond").value = KSSecond;
        stop_clock = true;
        save_data(KSSecond);

    }
}

function process_end_of_line(evt, element_this, go) {
    'use strict';
    //alert(1182);
    //console.log(1183 in process_end_of_line);
    //console.log("1184 evt = " + evt);
    //console.log("1185 element_this = " + element_this);
    //console.log("1186 go = " + go);
    lastLine = element_this;
    go.focus();
    Lesson_Document_component = document.getElementById("LineNo");
    Lesson_Document_component.value = go.name;
    if (navigator.appName === "Microsoft Internet Explorer") {
        endTyping(element_this);
        event.returnValue = false;
    } else if (navigator.appName === "Netscape") {
        evt.preventDefault();
        endTyping(element_this);
    } else if (navigator.appName === "Opera") {
        evt.preventDefault();
        endTyping(element_this);
    }
}

function wrongKey(keyIn) {
    'use strict';
    // Compare the pattern line character to the input line character
    // may be making it more complicated than necessary.  Should get character count of input
    // field and add one and ascertain the template character in that position and compare it to
    // the input character in the que.
    //var break_out;
    var key = String.fromCharCode(keyIn),
        val,
        tgt,
        timeTyping;
    if (line.substr(document.getElementById(element_this.name).value.length, 1) === key) {
        tgt = document.getElementById("CorrectKeyStrokes");
        // Updates Characters Per Second at the bottom of the page.
        val = tgt.value;
        val++;
        tgt.value = val;
        current_time = Math.round(Date.now()/1000);
        timeTyping = (current_time - last_key_Time);
        last_key_Time = current_time;
        // Objective:  1. Measure the time between keyDown and keyUp  -- not yet attempted.
        // Objective:  2. Measure the time to hit a key.
                       // This is key_speed[keyIn].push(timeTyping) Where keyIn is
        key_speed[keyIn].push(timeTyping); // don't worry about extremes.  Median will eliminate extremes.
        character_in = key;
        if (last_key === 900) {
            // do nothing else because this is the first key
            last_key = keyIn;
            i_last_key = last_key;
            //break_out = true;;
        }
        return false;
    }
    return true;
}

function generic_keyUp(evt, line, element_this, go, er, key_c) {
    'use strict';
    if (stop_clock === true) {
        return "error";
    }
    if (!started) {
        started = true;
        startTime = Date.now()/1000;
    }
    if (startTime === 0) {
        startTime = Date.now()/1000;
    }
    Lesson_Document_component = document.getElementById("LineNo");
    if (key_c === 9) { // Don't allow a tab key.  Netscape does.  IE no.
        alert("Don't use tab keys please.");
        return "error";
    }
    //check to see if the txt control keeping up with line numbers is the same as the focus control.
    if (Lesson_Document_component.value !== element_this.name) { // typing on wrong line.
        //LineNo is a txt field that keeps track of the proper line name.  e is the calling control.
        return "error";
        //evt.value="";
        //alert("You have moved to the wrong line.  Use the mouse to move back.");
        //lastLine.focus();
    }
    //alert('1258');
    //alert('element_this.value.length = ' + element_this.value.length);
    //alert('line.length = ' + line.length);
    if (line.length === element_this.value.length) { // at end of line.
        process_end_of_line(evt, element_this, go);
        return "end of line";
    } // end -- if at the end of the line.
    // not at end of the line.
    if (key_c === 122) {
        return false;
    }
    // This is the F-11 toggle for full screen.
    if (wrongKey(key_c)) {
        if (isNaN(er.value)) {
            er.value = 0;
            $("#t_err").val(0);
        }
        er.value++;
        t_err = parseInt($("#t_err").val(),10);
        $("#t_err").val(t_err+1);
        evt.preventDefault();
        return false;
    }
    // end -- not at end of the line.
    return true;
} // end function generic_keyUp(e,line,element_this,go,er,key_c)

function onKeyPress(evt) { //this works with NS 6 but not IE
    'use strict';
    var key_code = (evt.which || evt.keyCode),
        go,
        er,
        ls;
    if (Line1 === "") {
        Line1 = document.getElementById("Lesson.displayLine1").value;
    }
    line = Line1;
    switch (evt.target.name) {
    case 'txt1a':
        go = "txt1b";
        er = "err1a";
        ls = "L1_WPM";
        break;
    case 'txt1b':
        go = "txt1c";
        er = "err1b";
        ls = "L2_WPM";
        break;
    case 'txt1c':
        go = "txt1d";
        er = "err1c";
        ls = "L3_WPM";
        break;
    case 'txt1d':
        go = "txt1e";
        er = "err1d";
        ls = "L4_WPM";
        break;
    case 'txt1e':
        go = "park";
        er = "err1e";
        ls = "L5_WPM";
        break;
    default:
        break;
    }
    element_this = evt.target;
    er = document.getElementById(er);
    t_err = document.getElementById('t_err');
    go = document.getElementById(go);
    ls = document.getElementById(ls);
    generic_keyUp(evt, line, element_this, go, er, key_code, ls);
}

function getSecs() {
  var tSecs = Math.round(initStopwatch());
  var iSecs = tSecs % 60;
  var iMins = Math.round((tSecs-30)/60);
  var iHrs = Math.round((iMins-30)/60);
  var sSecs ="" + ((iSecs > 9) ? iSecs : "0" + iSecs);
  var sMins ="" + ((iMins > 9) ? iMins : "0" + iMins);
  var sHrs ="" + ((iHrs > 9) ? iHrs : "0" + iHrs);
  //document.forms[0].timespent.value = sHrs+":"+sMins+":"+sSecs;
  Time_display = document.getElementById("Time_Working");
  Time_display.value = sMins + ":" + sSecs;
  if (stop_clock !== true) {
    window.setTimeout('getSecs()',1000);
  }
}

function formload() {
    'use strict';
    var d,
        text_month,
        m,
        s,
        months,
        dateVar,
        Lesson_Date_Done,
        Lesson_Time_In,
        Lesson_Date_Display;
    getSecs();
    clearLines_and_TypingSpeeds();
    SystemDateTime = "";
    months = [];
    months[0] = "Jan";
    months[1] = "Feb";
    months[2] = "Mar";
    months[3] = "Apr";
    months[4] = "May";
    months[5] = "Jun";
    months[6] = "Jul";
    months[7] = "Aug";
    months[8] = "Sep";
    months[9] = "Oct";
    months[10] = "Nov";
    months[11] = "Dec";
    d = new Date();
    text_month = months[d.getMonth()];
    SystemDateTime += d.getDate() + " ";
    SystemDateTime += text_month + " ";
    SystemDateTime += d.getFullYear();
    SystemDateTime += "    ";
    SystemDateTime += d.getHours();
    SystemDateTime += ":";
    m = d.getMinutes();
    if (m < 10) {
        m = "0" + m;
    }
    SystemDateTime += m;

    s = d.getSeconds();
    SystemDateTime += ":" + s;
    dateVar = "";
    dateVar += (d.getFullYear() + "-");
    m = d.getMonth() + 1;
    if (m < 10) {
        m = "0" + m;
    }
    dateVar += m + "-";
    m = d.getDate();
    if (m < 10) {
        m = "0" + m;
    }
    dateVar += m + " ";
    m = d.getHours();
    if (m < 10) {
        m = "0" + m;
    }
    dateVar += m + ":";
    m = d.getMinutes();
    if (m < 10) {
        m = "0" + m;
    }
    dateVar += m + ":";
    m = d.getSeconds();
    if (m < 10) {
        m = "0" + m;
    }
    dateVar += m;
    Lesson_Date_Done = document.getElementById("Date_Done");
    Lesson_Date_Done.value = dateVar;
    Lesson_Time_In = document.getElementById("Time_In");
    Lesson_Time_In.value = dateVar;
    Lesson_Date_Display = document.getElementById("Date_Display");
    Lesson_Date_Display.value = SystemDateTime;
    do_lesson();
}

$(document).ready(function () {
    'use strict';
    var lesson_no,
        title,
        displayLine;
    console.log( "ready!" );
    maximizeWin()
    startday = Math.round(Date.now()/1000);
    clockStart = Math.round(Date.now()/1000);

    tC_ClientTimeStarted = Math.round(Date.now()/1000);
    // get parameters.
    lesson_no = 1;
    formload();
    $("#bnext_lesson").click(
        function () {
           exit_from_lesson();
        }
    );

    title = window.document.getElementById('Title1');
    displayLine = window.document.getElementById('displayLine1');

    if (window.parent.opener === null) { // This is true when run as a stand alone program.
        index = lesson_no;
        // index = 1;
        index = '<?php echo $_SESSION['tA_StartRec'];?>';
        $('#lesson_index').val('<?php echo $_SESSION['tA_StartRec'];?>');
        Line1 = lessons[index][1];
        this_title = lessons[index][2];
        replaceText(title, this_title);
        displayLine.value = Line1;
    } else {
        try {
            //student = window.parent.document.getElementById("tA_StudentName").value;
            // remember PHP is executed and gone by the time this frame runs.
            index = '<?php echo $_SESSION['tA_StartRec'];?>';
            $('#lesson_index').val('1');
            Line1 = lessons[index][1];
            displayLine.value = Line1;
            this_title = lessons[index][2];
            replaceText(title, this_title);
        } catch (err) {
            alert("There has been an error and I must close.");
            console.log("1462 err = " + err);
            return "";
        }
    } // end else
    window.document.getElementById('txt1a').focus();
    myElement = window.document.addEventListener("keypress", onKeyPress, true);
    return true;
}); // end function init()

function check_number(num, e) {
    'use strict';
    if (num < 32) {
        alert("Below 32");
        throw new Error("ASCII Number out of range at 1491 " + e.message + "  " + e.stack);
    }
    if (num > 127) {
        throw new Error("ASCII Number out of range at 1494 " + e.message + "  " + e.stack);
    }
    num = num.toString();
    return num;
}

function pad_number(num, e) {
    'use strict';
    if ((num > 31) && (num < 100)) {
        num = ("3" + num);
        return num;
    }
    throw ("Key code number out of range at 1532  " + e.message + "  " + e.stack);
}

function write_to_key_pair(key1, key2, elapsed_time) {
    'use strict';
    // Check for key1 & key2 being less than 3 digit numbers and less than 32 or more than 127. Return error if
    // they are out of range.  Pad with a 9 to the front if length is 2 digits.
    if (check_number(key1) && check_number(key2)) {
        if (key1 < 100) {
            key1 = pad_number(key1);
        }
        if (key2 < 100) {
            key2 = pad_number(key2);
        }
        var array_key = parseInt(key1.toString() + key2.toString(), 10);
        //var array_key = parseInt((key1 + "") + (key2 + ""), 10);
        if (key_pair[array_key]) {
            key_pair[array_key].push(elapsed_time);
        } else {
            key_pair[array_key] = [elapsed_time];
            //alert("923 array_key="+array_key);
        }
    }
}

function fHelp() {
    'use strict';
    window.open("Help.htm", "help", "width=600,height=420, scrollbars=yes,resizable=yes, statusbar=yes");
}
