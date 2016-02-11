<?php

class PersonClassSimpletest extends PHPUnit_Framework_TestCase {

    public function testbuildArray()
    {
        // $myPersonArray is in db order but that does not make a difference
        // when you use the function to create SQL.
        $this->myPersonArray['id'] = '';
        $this->myPersonArray['prefix'] = 'Mr.';
        $this->myPersonArray['StudentName'] = 'Jim Fuqua';
        $this->myPersonArray['nickName'] = 'Jim';
        $this->myPersonArray['firstName'] = 'James';
        $this->myPersonArray['middleName'] = 'Louis';
        $this->myPersonArray['lastName'] = 'xxxFuquaxxx';
        $this->myPersonArray['suffix'] = 'Jr.';
        $this->myPersonArray['Person_ID'] = 'UPH-B41';
        $this->myPersonArray['phoneNumber'] = '615.822.4400';
        $this->myPersonArray['residenceCity'] = 'Hendersonville';
        $this->myPersonArray['residenceState'] = 'TN';
        $this->myPersonArray['residenceZip'] = '37075';
        $this->myPersonArray['userName'] = "jimfuqua";
        $this->myPersonArray['passwd'] = 'pasword';
        $this->myPersonArray['DateTimeModified'] = "";
        $this->myPersonArray['TimeRegistered'] = "1";  // Time in seconds in Unix time that this person registered.
        $this->myPersonArray['TimeLoggedIn'] = "1000";  // Total time in seconds this person has been logged in.
        $this->assertTrue(count($this->myPersonArray) === 18);
        return($this->myPersonArray);
}

    public function testCreation()
    {
        $this->testbuildArray(); // This resets the array to orignial values.
        $classInstance = new tutor\src\classes\PersonClass;
        $classInstance -> deleteAllRowsPerson_Id($this -> myPersonArray['Person_ID']);
        $result = $classInstance->insertRecord($this->myPersonArray);
        // This inserts data into array but does not have a remaining value.
        $this->assertTrue(isset($classInstance));
        $this->assertTrue($result === 1);
        $row = $classInstance -> getLastDbEntryArray();
        $this->assertTrue(count($row) === count($this->myPersonArray));
        $classInstance -> deleteAllRowsPerson_Id($this -> myPersonArray['Person_ID']);
    }

    public function testfieldsInDbVsMyPersonArray()
    {
        // get a list of fields in the db
        $this->testbuildArray(); // This resets the array to orignial values.
        $classInstance = new tutor\src\classes\PersonClass;
        $classInstance -> deleteAllRowsPerson_Id($this -> myPersonArray['Person_ID']);
        $result=$classInstance->
                        insertRecord($this -> myPersonArray);
        $row=$classInstance->
            getLastDbEntryArray($this->myPersonArray['lastName']);
        // $row keys should give the names of all columns in the db.
        $this->assertTrue(count($row) === count($this->myPersonArray));
        //  Put all of the column names from the returned row in an array.
        $i = 0;
        $db_column_name_array = array();
        foreach ($row as $key => $value) {
            $db_column_name_array[$i] = $key;
            $i++;
        }
        $num_columns = count($this->myPersonArray);
        // now get the keys in the local myPersonArray into an array
        $i = 0;
        foreach ($this -> myPersonArray as $key => $value) {
            $myPersonArray_key_array[$i] = $key;
            $i++;
        }
        //  Compare the two arrays key by key.
        for ($i=0; $i < $num_columns; $i++) {
            $this->assertTrue($db_column_name_array[$i] ===
                $myPersonArray_key_array[$i]);
        }
        $classInstance -> deleteAllRowsPerson_Id($this -> myPersonArray['Person_ID']);
}

public function testcompareClassMethodsToTests()
    {
        // Create an array.of test methods.
        $tests_class_methods = get_class_methods(new PersonClassSimpletest());
        // Remove methods not starting with 'test'/
        foreach ($tests_class_methods as $key => $value) {
            if (substr($value, 0, 4)!=='test') {
                unset($tests_class_methods[$key]);
            }
        }
        // Create an array.of methods from the tested class.
        $class_methods = get_class_methods(new \tutor\src\classes\PersonClass());
        // add 'test' to start of each class method before compare.
        foreach ($class_methods as $key => $value) {
            $class_methods[$key] = "test" . $value;
        }
        // Returns an array containing all the entries from $test_class_methods
        // that are not present in $class_methods.
        // Return an array containing all the entries from $class_methods that are not present
        //   $tests_class_methods.
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
        }
        $i = 1;
        $count = count($missing_tests);
        array_unique($missing_tests);
        echo "\n";
            foreach ($missing_tests as $key => $value) {
                if ($i < 10) {
                    $ord = " " . $i;
                } else {
                    $ord = "".$i;
                }
                $string = $ord . ' Missing:  ' . $value;
                echo $string;
                if ($i < $count) {
                    echo "<br />\n";
                }
                $i++;
            }
        }


    public function testemptyPerson()
    {
        $result = null;
        $this->testbuildArray(); // This resets the array to orignial values.
        $classInstance = new tutor\src\classes\PersonClass;
        $classInstance -> deleteAllRowsPerson_Id($this -> myPersonArray['Person_ID']);
        $this->assertTrue($classInstance->getFirstName() === null);
        $firstName = "JohnJohn";
        $classInstance->setFirstName($firstName);
        $this->assertTrue($classInstance->getFirstName() == $firstName);
        $classInstance->emptyPerson();
        $this->assertTrue($classInstance->getFirstName() === null);
        $classInstance->setFirstName($firstName);
        $this->assertTrue($classInstance->getFirstName() == $firstName);
        $classInstance -> deleteAllRowsPerson_Id($this -> myPersonArray['Person_ID']);
    }

    public function testgetLastDbEntry()
    {
        $this->testbuildArray(); // This resets the array to orignial values.
        $classInstance = new tutor\src\classes\PersonClass;
        $classInstance -> deleteAllRowsPerson_Id($this -> myPersonArray['Person_ID']);
        $this->assertTrue(isset($classInstance));
        $result = $classInstance -> deleteAllRowsPerson_Id($this ->myPersonArray['Person_ID']);
        $this->assertTrue($result[0]); //
        // Only false if another function failed to clean up.
        $result = $classInstance->insertRecord($this->myPersonArray);
        $this->assertTrue($result === 1);
        $this->myPersonArray['lastName'] = 'xxx';
        $this->myPersonArray['Person_ID'] = 'xxx-yyy';
        $this->myPersonArray['userName'] = 'xxx-yyy';
        $result = $classInstance->insertRecord($this->myPersonArray);
        $this->assertTrue($result === 1);
        $row = $classInstance->getLastDbEntryArray($this->myPersonArray['lastName']);
        $this->assertTrue($row['lastName'] === 'xxx');
        $this->assertTrue($row['nickName'] === 'Jim');
        $this->assertTrue($row['residenceZip'] === '37075');
        // Clean Up
        $this->testbuildArray(); // Resets the array to orignial values.
        $classInstance -> deleteAllRowsPerson_Id('xxx-yyy');
        $classInstance -> deleteAllRowsPerson_Id($this -> myPersonArray['Person_ID']);
    }

    public function testgetSpecificStudent()
    {
        // add a specific assignment;
        // retrieve the specific assignment;
        // test the specific assignment;
        $classInstance = new tutor\src\classes\PersonClass;
        $this -> testbuildArray();
        // This resets the array to orignial values.
        $this -> assertTrue(isset($classInstance));
        $classInstance -> deleteAllRowsPerson_Id($this -> myPersonArray['Person_ID']);
        // Make sure no lessons exist for this student.
        $result = $classInstance -> insertRecord($this -> myPersonArray);
        // Returns true or false
        $this -> assertTrue( $result === 1 );
        if ($result === 1) {
            // Success in insertion into db.
            // retrieve the lesson;
            $row = $classInstance -> getSpecificStudentFromDbArray(
            $this -> myPersonArray["lastName"],
            $this -> myPersonArray['firstName'],
            $this -> myPersonArray['Person_ID'] );
            $this -> assertTrue( is_array($row) );
            $this -> assertTrue(count($row) === 18 );
            $this -> assertTrue($row['Person_ID'] ===
                    $this->myPersonArray['Person_ID']) ;
            $this -> assertTrue($row['lastName'] ===
                    $this->myPersonArray['lastName']);
            $this -> assertTrue($row['firstName'] ===
                    $this->myPersonArray['firstName']);
            }
        $classInstance -> deleteAllRowsPerson_Id($this -> myPersonArray['Person_ID']);
    }

public function testgetPersonDataArray()
    {
        // add a specific assignment;
        // retrieve the specific assignment;
        // test the specific assignment;
        $classInstance = new tutor\src\classes\PersonClass;
        $this -> testbuildArray();
        // This resets the array to orignial values.
        $this -> assertTrue(isset($classInstance));
        $classInstance -> deleteAllRowsPerson_Id($this -> myPersonArray['Person_ID']);
        // Make sure no lessons exist for this student.
        $result = $classInstance -> insertRecord($this -> myPersonArray);
        // Returns true or false
        $this -> assertTrue( $result === 1 );
        if ($result === 1) {
            // Success in insertion into db.
            // retrieve the lesson;
            $retrieved_result = $classInstance ->
                getPersonDataArray($this->myPersonArray['Person_ID']);
            $this -> assertTrue(is_array($retrieved_result) === true);
            $this -> assertTrue(count($retrieved_result) === 5 );
        }
        $return_array = $classInstance -> deleteAllRowsPerson_Id('abc');// Make shure one does not exit.
        $this -> assertFalse($return_array[1] === 1);
        $retrieved_result = $classInstance->getPersonDataArray('abc');
        $this -> assertFalse($retrieved_result);
        // Clean up.
        $classInstance -> deleteAllRowsPerson_Id($this -> myPersonArray['Person_ID']);
    }

    public function testdeleteAllRowsPerson_Id()
    {
        $classInstance = new tutor\src\classes\PersonClass;
        $this->testbuildArray();
        // This resets the array to orignial values.
        $classInstance -> deleteAllRowsPerson_Id($this ->
                            myPersonArray['Person_ID']);
        $this->assertTrue(isset($classInstance));
        $result = $classInstance -> insertRecord($this -> myPersonArray);
        $this->assertTrue( $result === 1);
        $result=$classInstance->deleteAllRowsPerson_Id($this ->
                            myPersonArray['Person_ID']);
        $this->assertTrue( $result[0] === true );
        $this->assertTrue( $result[1] === 1);
        $result = $classInstance -> deleteAllRowsPerson_Id($this ->
                            myPersonArray['Person_ID']);
        $this->assertTrue( $result[0] === true );
        $this->assertTrue( $result[1] === 0);
    }
}
