var Applicant = /** @class */ (function () {
    function Applicant() {
    }
    return Applicant;
}());
var obj1 = new Applicant();
var obj2 = new Applicant();
obj1.ApplName = "Aaqib";
obj1.score = 90;
obj2.ApplName = "Abhi";
obj2.score = 99;
var avgscore = (obj1.score + obj2.score) / 2;
console.log(obj1.ApplName);
console.log(obj1.score);
console.log(obj2.ApplName);
console.log(obj2.score);
console.log(avgscore);
