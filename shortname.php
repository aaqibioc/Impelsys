<?php
function shortName($fname, $lname){
    $name = '';
    foreach(explode(' ',  $fname) as $fn)
        $name .= strtoupper($fn[0]) . '.';

    $name .= ucfirst($lname);
    return $name;}

    $fname = "Avul pakir Jainulabdeen abdul";
    $sur = "Kalam";
    Echo "Full Name is :". $fname." ". $sur;
    echo "<br> Short Name is : ";
    print(shortName($fname, $sur));

?>