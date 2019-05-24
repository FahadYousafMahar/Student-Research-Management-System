<?php
namespace Myweb\Core;
class App{

  protected static $storage;

  public function bind($key,$value)
  {
    static::$storage[$key] = $value;
  }

  public function get($key)
  {
    if (!array_key_exists($key,static::$storage)){
      throw new Exception("No {$key} bound in App Storage");
    }
    return static::$storage[$key];
  }

}
