var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};
function log(target, key, para) {
    console.log("i have" + " " + para + " " + "paramerters");
}
var cow = /** @class */ (function () {
    function cow() {
    }
    cow.prototype.say = function (b, a) {
        console.log(b + " " + a);
    };
    cow.prototype.list = function (msg1, msg2) {
        console.log(msg1 + " " + msg2);
    };
    __decorate([
        __param(0, log)
    ], cow.prototype, "say");
    __decorate([
        __param(0, log)
    ], cow.prototype, "list");
    return cow;
}());
new cow().say('hello', 90);
new cow().list('yes', "i am listening");
