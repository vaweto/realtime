var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('test-channel');

redis.on('message', function(channel, message){

   var parsedMessage = JSON.parse(message);
   console.log(parsedMessage);
   io.emit(channel+ ':' + parsedMessage.event, parsedMessage.data);
});

server.listen(3000);