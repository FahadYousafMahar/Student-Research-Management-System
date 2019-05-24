<?php
namespace Myweb\Core\Database;
class Connection
{

  public static function make($config)
  {
    try {
      return new \PDO(
        'mysql:host='.$config['hostUrl'].';dbname='.$config['dbName'].';charset=utf8',
        $config['dbUser'],
        $config['dbPass'],
        $config['options']
      );
    }catch(PDOException $e){
      echo $e->getMessage();
      die('DB could not be loaded');
    }
  }

}
