<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No. of Words</title>
</head>
<body>
    <?php
        $str = "India is a Republic country, and is a country in South Asia.";
        echo " Original String : ".$str;
        echo "<br> <br> <br>";        
        print_r(array_count_values(str_word_count($str, 1)));
    ?>
    
</body>
</html>