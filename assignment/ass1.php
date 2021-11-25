<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sorting array</title>
</head>

<body>
    <?php

    $name = array(
        "Mr. Sanu Ahuja",
        "Mrs. Nidhi Agarwal",
        "Mr. Sanu",
        "Mr. Pritam",
        "Mrs. Priya Shetty",
        "Ms. Sujyothi Shetty",
        "Mr. Chinmay"
    );

    rsort($name);

    $noofnames = count($name);
    for ($i = 0; $i < $noofnames; $i++) {
        echo $name[$i];
        echo "<br>";
    }
    ?>

</body>

</html>