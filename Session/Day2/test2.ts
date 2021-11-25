interface person{
    "name":string;
    "age":number;
    "company":string;
    "address":string;
}
var x:person={
    name:"Aaqib Ahmad",
    age:23,
    company:"Impelsys",
    address:"Begusarai",
}
console.log(x.name) 
console.log(x.company)

//2nd question

interface add
{
 (a:number,b:number):void;

}
var obj:add=(a,b)=>{
 console.log(a+b);
}
obj(10,20);