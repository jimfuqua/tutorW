<?php
use tutor\src\classes;
require_once('/var/www/html/jimfuqua/tutor/src/classes/SplitsClass.inc');

class Splitsclass_test extends PHPUnit_Framework_TestCase {

public function testbuildArray() {
        //$myArray is in db order but that does not make a difference when you use the function to create SQL.
        $this->myArray['tSp_id'] = '';
        $this->myArray['tSp_GroupID'] = 'relationships';
        $this->myArray['tSp_GroupDescription'] = 'none';
        $this->myArray['tSp_LessonName'] = 'telling_time';
        $this->myArray['tSp_tA_Parameter'] = 'none';
        $this->myArray['tSp_gA'] = 'tG_Clockwise-CounterClockwise';
        $this->myArray['tSp_gA_Parameter'] = '';
        $this->myArray['tSp_PercentTime'] = '10';
        $this->myArray['tSp_TimeRelativeOrAbsolute'] = 'Relative';
        $this->assertTrue(count($this->myArray) === 9 );
    }

    function testCreation(){
        $this->testbuildArray(); // reset myArray to origninal values.
        $classInstance = new tutor\src\classes\SplitsClass;
        $result = $classInstance->deleteSplitLessonName($this->myArray['tSp_LessonName']);
        $result = $classInstance->insertRow($this->myArray);
        $this->assertTrue(isset($classInstance));
        $this->assertTrue($result === 1);
        $result = $classInstance->getLastDbEntryAsArray();
        $this->assertTrue(count($result) === count($this->myArray));
        $count = $classInstance->deleteSplitLessonName($this->myArray['tSp_LessonName']);
        $this->assertTrue($count === 1);
    }

    public function compareClassMethodsToTests()
    {
        //$log_file = fopen("/var/www/tutor/logs/compareClassMethodsToTests.log", "w");
        //$string='43 compareClassMethodsToTests'."\n";
        //fwrite  (  $log_file, $string);
        // Create an array.of test methods.
        $testSp_class_methods = get_class_methods(new  Splitsclass_test);
        // Remove methods not starting with 'test'/
        foreach ($testSp_class_methods as $key => $value) {
            if (substr($value, 0, 4)!=='test') {
                unset($testSp_class_methods[$key]);
            }
        }
        // Create an array.of methods from the tested class.
        $class_methods = get_class_methods(new \tutor\classes\Splitsclass());
        // add 'test' to start of each class method before compare.
        foreach ($class_methods as $key => $value) {
            $class_methods[$key] = "test".$value;
        }
        // Return an array containing all the entries from $class_methods that are not present
        // in  $testSp_class_methods.
        $missing_tests = array_diff($class_methods, $testSp_class_methods);
        foreach ($missing_tests as $key => $value) {
            // remove tests that don't test a method in tested class
            if ($value === "testcompareClassMethodsToTests") {
                    unset($missing_tests[$key]);
            }
            if ($value === "testbuildArray") {
                    unset($missing_tests[$key]);
            }
            if ($value === "testfieldsInDbVsMyArray") {
                    unset($missing_tests[$key]);
            }
        };
        $i = 1;
        $count = count($missing_tests);
        if ($count > 0){
            foreach ($missing_tests as $key => $value) {
                $string = $i.' Missing:  '.$value."\n";
                echo $string;
                if ($i < $count) {
                    echo "<br />";
                }
                $i++;
            }
        }
        echo "<br />";echo "<br />";
    }

    function testget_last_db_entry(){
        $result = $this->testbuildArray(); // reset myArray to origninal values.
        $result = '';
        $classInstance = new tutor\src\classes\SplitsClass;
        $result = $classInstance->deleteSplitLessonName('split_name');
        $this->myArray['tSp_LessonName'] = 'testget_last_db_entry';
        $result = $classInstance->insertRow($this->myArray);
        $this->assertTrue($result === 1);
        // now query the database for last record.
        $result=$classInstance->getLastDbEntryAsArray();
        $this->assertTrue($result['tSp_LessonName'] === 'testget_last_db_entry');
        $classInstance->deleteSplitLessonName('testget_last_db_entry');
    }

    function testinsertRow(){
        $result = $this->testbuildArray(); // reset myArray to origninal values.
        $result = '';
        $classInstance = new tutor\src\classes\SplitsClass;
        $result = $classInstance->insertRow($this->myArray);
        $this->assertTrue($result === 1);
        // now query the database for last record.
        $result=$classInstance->getLastDbEntryAsArray($this->myArray['tSp_id']);
        $this->assertTrue($result['tSp_LessonName'] === $this->myArray['tSp_LessonName']);
        $classInstance->deleteSplitLessonName($this->myArray['tSp_LessonName']);
    }

    function testget_split_by_ID(){
        $result = $this->testbuildArray(); // reset myArray to origninal values.
        $temp_storage = $this->myArray['tSp_id'];
        $this->myArray['tSp_id'] = '779';
        $classInstance = new tutor\src\classes\SplitsClass;
        $classInstance->deleteSplitLessonName($this->myArray['tSp_LessonName']);
        $classInstance->insertRow($this->myArray);
        $row = $classInstance->getSplitByPrimaryKey('779');  // Returns a row -- array.
        $this->assertTrue($row['tSp_id'] === '779' );
        $result = $classInstance->deleteSplitLessonName($this->myArray['tSp_LessonName']);
        $this->myArray['tSp_id'] = $temp_storage ;
    }

    function testget_Splits(){
        // Get number of splits.  Add 3 splits.  Get number of splits again and test for match.
        $result = $this->testbuildArray(); // reset myArray to origninal values.
        $temp_storage = $this->myArray['tSp_id'];
        $classInstance = new tutor\src\classes\SplitsClass;
        $result = $classInstance->deleteByGroupID(0);
        $result = $classInstance->insertRow($this->myArray); // true on success.
        $this->assertTrue($result === 1 );
        $result = $classInstance->insertRow($this->myArray); // true on success.
        $this->assertTrue($result === 1 );
        $result = $classInstance->insertRow($this->myArray); // true on success.
        $this->assertTrue($result === 1 );
        $result = $classInstance->getAllSplits();
        $this->assertTrue(count($result) === 3 );
        $result = $classInstance->deleteSplitLessonName('$this->myArray["tSp_LessonName"]');
        $this->myArray['tSp_id'] = $temp_storage;

    }

    function testgetArrayOfColumnNames() {
    $result = $this->testbuildArray();
    $classInstance = new tutor\src\classes\SplitsClass;
    $result = $classInstance->getArrayOfColumnNames();
    $this->assertTrue($result[0] === 'tSp_id' );
    $this->assertTrue($result[8] === 'tSp_TimeRelativeOrAbsolute' );
    }

    function testdeleteRowId(){
        //  This should have no effect on the database and does not insert a row that is not removed.
        $result = $this->testbuildArray(); // reset myArray to origninal values.
        $classInstance = new tutor\src\classes\SplitsClass;
        $this->assertTrue(isset($classInstance));
        $result = $classInstance->deleteSplitLessonName('split_name');
        $result = $classInstance->deleteRowId($this->myArray['tSp_id']);
        $this->assertTrue($result === false ); // If true improper cleanup.
        $result = $classInstance->insertRow($this->myArray); // true on success.
        $this->assertTrue($result === 1 );
        // 'tSp_id' is assigned with each entry.  Must retrieve.
        $LastDbEntryAsArray = $classInstance->getLastDbEntryAsArray();
        $result = $classInstance->deleteRowId($LastDbEntryAsArray['tSp_id']);
        $this->assertTrue($result === 1 ); // affected rows
        $result = $classInstance->insertRow($this->myArray);
        $result = $classInstance->deleteRowId('not a number');
        $this->assertTrue($result === false ); // $id must be a number.
        $result = $classInstance->deleteRowId(null);
        $this->assertTrue($result === false ); // $id must be a number.
        $result = $classInstance->insertRow($this->myArray); // true on success.
        $this->assertTrue($result === 1);
        $result = $classInstance->getLastDbEntryAsArray();
        // Now test for $result containing accurate data.
        $this->assertTrue($result['tSp_LessonName'] === 'telling_time');
        $result = $classInstance->deleteRowId($result['tSp_id']);
        $this->assertTrue($result === 1);  // affected rows.
        // Clean Up
        $result = $classInstance->deleteSplitLessonName($this->myArray['tSp_LessonName']);;
    }
}
