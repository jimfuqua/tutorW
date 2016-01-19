<?php
require_once('/var/www/tutor/tests_simpletests/simpletest/autorun.php');
require_once('/var/www/tutor/tests_simpletests/simpletest/web_tester.php');

class TestOfAbout extends WebTestCase {
    function testindex() {
        $this->get('http://localhost/tutor/lessons/LeftRightMouse/test_LeftRightMouse.php');
        //echo $this->getUrl() . "<br /><br />";
        //$this->assertTitle('Left or Right');
        $this->assertFieldById('heading_title', 'Left or Right');
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
