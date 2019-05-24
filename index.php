<?php

require 'vendor/autoload.php';
require 'Core/bootstrap.php';
use Myweb\Core\{Router,Request,App};
Router::define('routes.php') -> direct( Request::uri(), Request::method(), Request::data() );