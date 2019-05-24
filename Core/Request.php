<?php
namespace Myweb\Core;
/**
 * Request Class
 */
class Request
{

  public static function uri()
  {
    $tmpUrl = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1, strpos(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/'),"/"));
    if(empty($tmpUrl)){
       return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/');
    }else{
      return $tmpUrl;
    }

    return ;
  }

  public static function method()
  {
    return ($_SERVER['REQUEST_METHOD']);
  }

  public static function data()
  {
    $path=trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/');
    if($path == Request::uri()){
      return null;
    }
    return trim(substr($path,strpos($path,"/")),"/");
  }
}
