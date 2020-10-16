// var  = require('events').EventEmitter;
// var em =new events.EventEmitter();



// em.on ('FirstEvent',function(data){
//     console.log(data);
// });

// em.emit('FirstEvent','day la su kien dau tien');

// var emitter = require('events').EventEmitter;

// function LoopProcessor(num){
//      var e = new emitter();

//      setTimeout(function(){
//         for(var i =1; i <= num; i++){
//             e.emit('BeforeProcess:', i);

//             console.log('processing number' + i);

//             e.emit('Afterprocess:', i);
//         }         
//      },  2000);
//      return e;
// }

// var lp = LoopProcessor (3);
//     lp.on('BeforeProcess',function(data){
//         console.log('About to start the process for' + data);
//     });

//     lp.on('Afterprocess',function(data){
//         console.log('Complete processing' + data);
//     });     

var emitter = require('events').EventEmitter;
var util = require('util');

function LoopProcessor(num){
   var me = this;

     setTimeout(function(){
        for(var i =1; i <= num; i++){
            me.emit('BeforeProcess:', i);

            console.log('processing number' + i);

            me.emit('Afterprocess:', i);
        }         
     },  2000);
     return this;
}
util.inherits(LoopProcessor,emitter);

var lp = new  LoopProcessor (3);
    lp.on('BeforeProcess',function(data){
        console.log('About to start the process for' + data);
    });

    lp.on('Afterprocess',function(data){
        console.log('Complete processing' + data);
    });     