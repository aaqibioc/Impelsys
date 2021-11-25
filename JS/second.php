<!DOCTYPE html>
<html>
<body>
<script>

function add(){
    var a1 =  document.getElementById("value1").value;
    var a2 =  document.getElementById("value2").value;
    var a3 = parseInt(a1) + parseInt(a2); 
    document.getElementById("result").innerHTML=a3;
    if(a1.value.length == 0){
            alert ("Please enter both fields");
        }
  }

  function sub(){
    var s1 =  document.getElementById("value1").value;
    var s2 =  document.getElementById("value2").value;
    var s3 = parseInt(s1) - parseInt(s2); 
    document.getElementById("result").innerHTML=s3;
  }


</script>


<div class="container">
    
    <label>Value 1 :</label>
    <input type="text" name="value1" id="value1"> <br>
    <br>
    <label>Value 2 :</label>
    <input type="text" name="value2" id="value2"> <br><br><br>

    
    <button type="button" onclick="add()">+</button> &nbsp; &nbsp;
    <button type="button" onclick="sub()">-</button><br><br>
    <div class="result" id="result"></div>


</div>


</body>
</html>