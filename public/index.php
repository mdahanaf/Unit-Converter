<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
define("ROOT", __DIR__. "/../");

require ROOT. "vendor/autoload.php";

$user_uri = $_SERVER['REQUEST_URI'];
if($user_uri == '/'){
    view('home');
}else if($user_uri == '/lenght'){
    view('lenght');
}else if($user_uri == '/weight'){
    view('weight');
}else if($user_uri == '/temperature'){
    view('temperature');
}else{
    view('404');
}