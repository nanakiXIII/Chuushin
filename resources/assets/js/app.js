$('.dropdown-trigger').dropdown();
require('./bootstrap');

import Echo from 'laravel-echo'

let e = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
})

e.channel('channel-demo')
    .listen('PostCreatedEvent', (e) => {
        console.log('Post', e);
})
   console.log(document.head.querySelector('meta[name="user"]').content);



e.join('group.1')
    .listen('GroupWizzEvent', function (e){
        console.log('GroupWizzEvent', e)
})

e.join('PresenceChannel')
    .here(function (users){
        users.forEach(function(user){
            console.log(user);
            $('.test').append('<div id="'+user.id+'">'+user.name+'</div>')
        })
        console.log('here', users)
    })
    .joining(function (user){
        $('.test').append('<div id="'+user.id+'">'+user.name+'</div>')
        console.log('join', user)
    })
    .leaving(function (user) {
        $('#'+user.id).remove()
        console.log('leave', user)
    })
    .listen('PresenceChannel', function (e){
        console.log('PresenceChannel', e)
    })

$('#demo').click(function(e){
    e.preventDefault()
    $.get('/posts/create')
})