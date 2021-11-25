<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


$sum=0;

   for($i=2;$i<=500;$i++)
{
                         $prime=true;
  for($j=2;$j<$i;$j++)
        {
             if($i%$j==0)
                         {
                           $prime=false;
                            break;
                          }
         }

             if($prime)
                        {
                        
                        $result = chunk_split($i, 5, "<br>");
                        echo "$result"."<font color=red>+</font>";   
                        
                        $sum=$sum+$i;

                                 
                        }

}
echo "<br> Sum of all prime numbers upto 500 is"."<font color=green> = </font>".$sum."<br>";
        
      ?> 
   


</body>
</html>