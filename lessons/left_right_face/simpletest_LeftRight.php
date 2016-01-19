<?php
require_once('/var/www/tutor/tests/simpletests_tests/simpletest/autorun.php');
require_once('/var/www/tutor/tests/simpletests_tests/simpletest/web_tester.php');

class TestOfAbout extends WebTestCase {
    function testindex() {
        $this->get('http://localhost/tutor/lessons/LeftRight/test_LeftRight.php');
        echo $this->getUrl() . "<br /><br />";
        $this->assertTitle('Left and Right');
        //$this->assertFieldById('heading_title', 'Left and Right');
       // $this->assertFieldById('left',  "");
       //$this->assertLinkById('left');
       $this->clickSubmitById('left');
       // $this->clickSubmitById('About');
        //$this->assertTitle('About Title');
        //$this->assertText('We are really great');
        //echo $this->getURL();
        //echo '<br /><br />';
        //$this->showSource();
       //echo '<br /><br />';
        //echo $this->showHeaders();
    }
}
?>