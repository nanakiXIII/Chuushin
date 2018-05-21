<?php

function customRequestCaptcha(){
    return new \ReCaptcha\RequestMethod\Post();
}
function setActive($path)
{
    return Request::is($path . '*') ? ' class=active' :  '';
}