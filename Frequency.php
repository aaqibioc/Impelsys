<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequency of letters</title>
</head>
<body>
    
<?php

$SIZE = 26;
function frequency($str)
{
    global $SIZE;
    $n = strlen($str);

    $freq = array_fill(0, $SIZE, NULL);
    for ($i = 0; $i < $n; $i++)
        $freq[ord($str[$i]) - ord('a')]++;
    for ($i = 0; $i < $n; $i++)
    {
        if ($freq[ord($str[$i]) - ord('a')] != 0)
        {

            echo $str[$i] ." = ". $freq[ord($str[$i]) -
                                  ord('a')] . "<br>";
 
            $freq[ord($str[$i]) - ord('a')] = 0;
        }
    }
}
 

$str = "google";
echo "Original String : ".$str."<br> <br>";
frequency($str);
 

?>
</body>
</html>