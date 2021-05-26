const io = require('socket.io')(6001);
console.log('Connected to port 6001');
io.on('error', function(socket) {
    console.log('error');
});
io.on('connection', client => {
    console.log('New connector: ' + client.id);
});

var Redis = require('ioredis');
var redis = new Redis();

redis.on('pmessage', (partner, channel, message) => {
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data.message);
    console.log('sent')
});