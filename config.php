<?php
// Database settings
return [
  'database'=>[
    'hostUrl' => "127.0.0.1",
    'dbName'  => "research",
    'dbUser'  => "root",
    'dbPass'  => "",
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ]
];
