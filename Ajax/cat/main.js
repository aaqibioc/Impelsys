var animalContainer = document.getElementById("animal-info");
var button = document.getElementById("btn");
var pageCount = 1;

button.addEventListener("click", function(){
    var ourRequest = new XMLHttpRequest();
ourRequest.open('GET', '/Codes/AjaxTut/Sircode/repository0.php');
ourRequest.onload = function(){
    var ourData = JSON.parse(ourRequest.responseText);
    render(ourData);
};
ourRequest.send();
});

function render(data){
    var string1= "";
    for(i=0;i<data.length;i++){
        string1 += "<p>" + data[i].name + "  is a " + data[i].species + "</p>";
    }
    animalContainer.insertAdjacentHTML('beforeend', string1);
};



