<html>
<head>
<b>Chessboard using for loops</b>
    <title>Chessboard using for loops</title>
</head>
<body>
    <table width="400px" cellspacing="0px" cellpadding="0px" border="1px">
    <?php
    echo "<br>";
    echo "<br>";
    echo "<br>";
        for($row=1;$row<9;$row++){
            echo "<tr>";
            for($column=1;$column<9;$column++){
                $total=$row+$column;
                if($total%2==0){
                    echo "<td height=50px width=50px bgcolor=white></td>";
                }
                else {
                    echo "<td height=50px width=50px bgcolor=purple></td>";
                }
            }
            echo "</tr>";
        }

    ?>
            
</body>
</html>