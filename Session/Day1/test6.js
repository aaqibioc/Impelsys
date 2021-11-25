// function fun1()
// {
// console.log("Welcome");
// }
// var x=function ()
// {
// console.log("Data");
// }
// var y =function(a, b)
// {
// var ans= a+b;
// console.log("The answer is "+ ans);
// }
// fun1();
// x();
// y(12, 34);



// var x = (a, b) => {
//     sum = a + b;
//     console.log(sum);
// }

// x(12,24);


// var greet = (s) => {
//     return("what are you coding? ," + s);
// }
// console.log(greet("Mark"));


var person=
{
fname:"Lata",
lname: "Bhambwani"}

console.log("Method1");
console.log(person.fname+" "+ person. lname)
console.log("Method 2");
console.log(person["fname"]+" "+ person["lname"])
console.log(" for in loop"); 
console.log("For in loop with objects"); 
for (x in person) {
console.log(x+ ":"+person[x]);
}