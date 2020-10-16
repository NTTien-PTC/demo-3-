
var buff = new Buffer("Hell o",'utf-8');

console.log(buff);
console.log(buff.toString());

buff.write("Tien");
console.log(buff.toJSON());