$(document).ready(function(){

    $("#selectcategory").change(function(){

       var cat=  $('#selectcategory').val();
       console.log(cat);
    });


    $.ajax({
        url: 'data.php',
        type: 'get',
        dataType: 'JSON',
        cache:false,
        timeout:20000,    
        success: function(response)
          {

            var len = response.length;
         
            
            
             for(var i=0; i<len; i++)
                {
                var productId = response[i]['productId'];
                var productName = response[i]['productName'];
                var price = response[i]['price'];
                var cat = response[i]['category'];
                
            
                var tr_str = "<tr>" +
                    "<td align='center'>" + (i+1) + "</td>" +
                    "<td align='center'>" + productId + "</td>" +
                    "<td align='center'>" + productName + "</td>" +
                    "<td align='center'>" + price + "</td>" +
                    "</tr>";

                $("#userTable").append(tr_str);

                }
            
          },
          error: function(err,errocode,xhr)
          {
              
          },      

        //}
    });
});


// response[0]['productName'];

