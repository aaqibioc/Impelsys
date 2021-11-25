<?php
function array_not_unique($a)
{
  return array_diff_key( $a , array_unique( $a ) );
}

$a1 = array(34,56,33,2,65,77,9,64);
$a2 = array(75,23,32,56,64,5,14,34);
$array1 = array_unique(array_merge($a1, $a2));
// $array2 = ($array1, array_unique(array1));
$merge = array_merge($a1, $a2);
$array2 = array_not_unique($merge);


echo "Merged array without duplicates: ";
print_r($array1);
echo "<br> Duplicate values: ";
print_r($array2);

?>