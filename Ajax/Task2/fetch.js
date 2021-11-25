var content = document.getElementById("emp-info");

var sale = document.getElementById("sale");  
var res = document.getElementById("research");
var acc = document.getElementById("accounting");
var op = document.getElementById("operation");



sale.addEventListener("click", function(){
    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'fetchdb.php');
    ourRequest.onload = function () {
        var ourData = JSON.parse(ourRequest.responseText);
        sales(ourData);
    };
    ourRequest.send();
})

res.addEventListener("click", function(){
    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'fetchdb.php');
    ourRequest.onload = function () {
        var ourData = JSON.parse(ourRequest.responseText);
        research(ourData);
    };
    ourRequest.send();
})

acc.addEventListener("click", function(){
    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'fetchdb.php');
    ourRequest.onload = function () {
        var ourData = JSON.parse(ourRequest.responseText);
        accounting(ourData);
    };
    ourRequest.send();
})

op.addEventListener("click", function(){
    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'fetchdb.php');
    ourRequest.onload = function () {
        var ourData = JSON.parse(ourRequest.responseText);
        operation(ourData);
    };
    ourRequest.send();
})






function sales(data) {
    var string1 = "<tr><th>Emp No.</th><th>Name</th><th>Job</th><th>Salary</th></tr>";
    for (i = 0; i < data.length; i++) {
        if (data[i].deptno == '30'){
            string1 += "<tr>" +
            "<td align='center'>" + data[i].empno + "</td>" +
            "<td align='center'>" + data[i].ename + "</td>" +
            "<td align='center'>" + data[i].job + "</td>" +
            "<td align='center'>" +  data[i].salary  + "</td>" +
            "</tr>";
        }
    }
    
    content.insertAdjacentHTML('beforeend', string1);
};


function research(data) {
    var string1 = "<tr><th>Emp No.</th><th>Name</th><th>Job</th><th>Salary</th></tr>";
    for (i = 0; i < data.length; i++) {
        if (data[i].deptno == '20')
            string1 += "<tr>" +
            "<td align='center'>" + data[i].empno + "</td>" +
            "<td align='center'>" + data[i].ename + "</td>" +
            "<td align='center'>" + data[i].job + "</td>" +
            "<td align='center'>" +  data[i].salary  + "</td>" +
            "</tr>";
    }
    content.insertAdjacentHTML('beforeend', string1);
};


function accounting(data) {
    var string1 = "<tr><th>Emp No.</th><th>Name</th><th>Job</th><th>Salary</th></tr>";
    for (i = 0; i < data.length; i++) {
        if (data[i].deptno == '10')
            string1 += "<tr>" +
            "<td align='center'>" + data[i].empno + "</td>" +
            "<td align='center'>" + data[i].ename + "</td>" +
            "<td align='center'>" + data[i].job + "</td>" +
            "<td align='center'>" +  data[i].salary  + "</td>" +
            "</tr>";
    }
    content.insertAdjacentHTML('beforeend', string1);
};


function operation(data) {
    var string1 = "<tr><th>Emp No.</th><th>Name</th><th>Job</th><th>Salary</th></tr>";
    for (i = 0; i < data.length; i++) {
        if (data[i].deptno == '40')
            string1 += "<tr>" +
            "<td align='center'>" + data[i].empno + "</td>" +
            "<td align='center'>" + data[i].ename + "</td>" +
            "<td align='center'>" + data[i].job + "</td>" +
            "<td align='center'>" +  data[i].salary  + "</td>" +
            "</tr>";
    }
    content.insertAdjacentHTML('beforeend', string1);
};
