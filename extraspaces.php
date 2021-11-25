<?php

$given = "<pre>Good     Morning    All  .</pre>";
print "Given string is : ".$given." <br>";

$str = trim(preg_replace('/\s+/',' ', $given));
echo "Removing all the whitespaces : "  . $str;

?>