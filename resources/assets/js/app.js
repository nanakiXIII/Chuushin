
22:30
$('.dropdown-trigger').dropdown();
require('./bootstrap');

import Echo from 'laravel-echo'

let e = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
})

e.channel('channel-demo')
    .listen('PostCreatedEvent', (e) => {
        console.log(e);
})

$('#demo').click(function(e){
    e.preventDefault()
    $.get('/posts/create')
})