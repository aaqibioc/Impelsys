function log(target:string,key:string,para:number){
    console.log("i have"+ " "+para+" " +"paramerters");
}
class cow{
    say(@log b:string,a:number){
        console.log(b+" "+a);

    }
  list(@log msg1:string,msg2:string){
      console.log(msg1+" "+msg2);
  }
}
new cow().say('hello',90);
new cow().list('yes',"i am listening");