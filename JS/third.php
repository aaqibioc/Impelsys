<!DOCTYPE html>
<html lang="en">
<body>


<input type="text" onkeyup="count(this,'noof')" maxlength="10" id="char" onblur=cap()><br><br><br>
Number of characters left: 
<input maxlength="10" size="10" value="10" id="noof">

<script>
function count(x ,y)
{
  var count = document.getElementById(y);
  count.value = 10 - x.value.length;
}

// function cap(a)
// {
//     var a = document.getElementById(char);
//     return a.toUpperCase();
// }

</script>
    
</body>
</html>








