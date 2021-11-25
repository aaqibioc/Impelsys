<?php

$name = array("Amit","Sumit","Priya","James");
$salary = array(40000,30000,50000,60000);
print_r($name);
print_r($salary);
$new = array_combine($name, $salary);
echo " <br> The new array is :";
print_r($new);

?>
