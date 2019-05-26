<?php
$errorReport=false;
if($errorReport){
error_reporting(E_ERROR | E_WARNING | E_PARSE);
}else{
error_reporting(0);
}
require 'vendor/autoload.php';
require 'Core/bootstrap.php';
use Myweb\Core\{Router,Request,App};
Router::define('routes.php') -> direct( Request::uri(), Request::method(), Request::data() );