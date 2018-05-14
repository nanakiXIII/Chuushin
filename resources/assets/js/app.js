$('.dropdown-trigger').dropdown();
$('.tabs').tabs();
require('./bootstrap');
require('./slick.min');

$('#episodes').click(function () {
    $('.responsive').slick({
        dots: true,
        arrows: true,
        fade: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });
})


import Echo from 'laravel-echo';

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