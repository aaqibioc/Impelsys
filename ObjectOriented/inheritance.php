<?php 
  
    class Employee{

        public $name = "mike";
        private $salary = 12000;
        private $grade = 3;
        public $gender = "female";

        function setSalary($salary){
            $this->salary = $salary; 
        }

        function getSalary(){ 
            echo "<br>The salary of employee is $this->name is $this->salary <br>";
        }

        function showName(){
            echo "<br>The name of this employee is $this->name <br>";
        }
        function showGender(){
            echo "<br>The gender of this employee is $this->gender <br>";
        }
    }

    // Inheritance
    class Programmer extends Employee{
        private $language = "php";

        function changeLanguage($lang){
            $this->language = $lang; 
            
        }
    }

    $Emp1 = new Employee();
    $Emp1->name = "Aaqib";
    $Emp1->setSalary(100);
    $Emp1->getSalary();
    $Emp1->showName();

    $Emp2 = new Employee();
    $Emp2->name = "Larry";
    $Emp2->setSalary(1000);
    $Emp2->getSalary();
    $Emp2->showName();

    $Emp3 = new Programmer();
    $Emp3->name = "Patel";
    $Emp3->gender = "Male";
    echo $Emp3->changeLanguage("Python");
    $Emp3->getSalary();
    $Emp3->showName();
    echo $Emp3->gender;
    
    

?>