<?php
namespace jimfuqua\tutorW;
use jimfuqua\tutorW\classes;
date_default_timezone_set('America/Chicago');

/**********************************************************************
*  Test CompletedClass using PHP SimpleTest.

ToDo:
    4.   Add docbook type comments to each function and internal
*    comments in each function.
*/

class CompletedTest extends \PHPUnit_Framework_TestCase {
    //var $myArray;

    public function testbuildArray()
    {
        //  $myArray is in db order but that does not make a difference when
        //  you use the function to create SQL.
        $this->dtime= date("Y-m-d H:i:s");
        $this->myArray['id']='';
        $this->myArray['tA_S_ID']="abc-def";
        $this->myArray['tA_StudentName']='John Doe';
        $this->myArray['tC_Session']="123456789";
        $this->myArray['tC_gA']="gAssignment";
        $this->myArray['tC_tGStartRec']='Test';
        $this->myArray['tC_tGStopRec']='Test';
        $this->myArray['tC_CompletedTimestamp']='';
        $this->myArray['tC_ServerTimeStarted']=$this->dtime;
        $this->myArray['tC_ClientTimeStarted']=$this->dtime;
        $this->myArray['tC_Time_client_processed_answer']='';
        $this->myArray['tC_Correct']='5';
        $this->myArray['tC_Question_and_Response']='1';
        $this->myArray['tC_More_data_about_response']='2';
        $this->assertTrue(count($this->myArray)==14);
        return($this->myArray);
    }

    public function testCreation()
    {
        $this->testbuildArray(); // reset myArray to origninal values.
        $classInstance = new CompletedClass;
        $classInstance->recordData($this->myArray);
        $this->assertTrue(isset($classInstance));
        return $classInstance;$this -> assertTrue(FALSE);
        ddd;
    }

    public function testfieldsInDbVsMyArray()
    {
    $log_file = fopen("/var/www/html/jimfuqua/tutor/logs/CT testfieldsInDbVsMyArray", "w");
        // get a list of fields in the db
        $this->testbuildArray(); // reset myArray to origninal values.
        $classInstance = new CompletedClass;
        $result = $classInstance->insertRecord($this->myArray);
        $results = $classInstance->getLastDbEntry();
        $this->assertTrue(count($results) === count($this->myArray));

        //  Put all of the column names from the returned row in an array.
        $dbKeys = [];
        $i = 0;
        foreach ($results as $key => $value) {
            $dbKeys[$i] = $key;
            $i++;
        }
        $v = var_export($dbKeys, true);
        $string = "\n".__LINE__.' $dbKeys = ' . $v."\n";
        fwrite  (  $log_file, $string);
        $i = 0;
        foreach ($this->myArray as $key => $value) {
            $myArrayKeys[$i] = $key;
            $i++;
        }
        $v = var_export($myArrayKeys, true);
        $string = "\n".__LINE__.' $myArrayKeys = ' . $v."\n";
        fwrite  (  $log_file, $string);
        $num_columns = $i;
        $i = 0;
        //  Compare the two arrays key by key.
        for ($i<$num_columns; $i++;) {
            $this->assertTrue(($dbKeys[$i] === $myArrayKeys[$i]), "$i.' '.$dbKeys[$i] === $myArrayKeys[$i]");

        }
}

public function compareClassMethodsToTests()
    {
        //$log_file = fopen("/var/www/tutor/logs/compareClassMethodsToTests.log", "w");
        //$string='43 compareClassMethodsToTests' . "\n";
        //fwrite  (  $log_file, $string);
        // Create an array.of test methods.
        $tests_class_methods = get_class_methods(new CompletedTest());
        // Remove methods not starting with 'test'/
        foreach ($tests_class_methods as $key => $value) {
            if (substr($value, 0, 4)!=='test') {
                unset($tests_class_methods[$key]);
            }
        }
        // Create an array.of methods from the tested class.
        $class_methods = get_class_methods(new \tutor\src\CompletedClass());
        // add 'test' to start of each class method before compare.
        foreach ($class_methods as $key => $value) {
            $class_methods[$key] = "test" . $value;
        }
        // Return an array containing all the entries from $class_methods that are not present
        // in  $tests_class_methods.
        $missing_tests = array_diff( $class_methods, $tests_class_methods );
        foreach($missing_tests as $key => $value) {
            // remove tests that don't test a method in tested class
            if ($value === "testcompareClassMethodsToTests") {
                    unset($missing_tests[$key]);
            }
            if ($value === "testbuildArray") {
                    unset($missing_tests[$key]);
            }
            if ($value === "testfieldsInDbVsMyArray")  {
                    unset($missing_tests[$key]);
            }
        };
        $i = 1;
        $count = count($missing_tests);
        if ($count > 0){
            foreach ($missing_tests as $key => $value) {
                $string = $i . ' Missing:  ' . $value . "\n";
                echo $string;
                if ($i < $count) {
                    echo "<br />";
                }
                $i++;
            }
        }
    }

    public function testgetLastDbEntry()
    {
        $classInstance = $this->testCreation();
        $this->assertTrue(isset($classInstance));
        $row = $classInstance->getLastDbEntry();
        //$row = mysqli_fetch_array($results, MYSQL_ASSOC);
        $this->assertTrue(count($row)==14);
        $this->assertTrue($row['tA_StudentName']=='John Doe');
        $this->assertTrue($row['tC_More_data_about_response']=='2');
     }


    public function testDeleteLastRrow()
    {
        $classInstance = $this->testCreation();
        $this->assertTrue(isset($classInstance));
        $result=$classInstance->DeleteLastRow($this->myArray['tA_S_ID']);
        $this->assertTrue($result==1);
    }

    public function testDeleteTestStudent()
    {
        $classInstance = $this->testCreation();
        $result=$classInstance->deleteStudentRows($this->myArray['tA_S_ID']);
        $this->assertTrue($result>0);
    }

}
