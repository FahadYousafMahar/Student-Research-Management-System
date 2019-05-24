<?php

use Myweb\Core\App;
use Myweb\Core\Database\{Connection,QueryBuilder};
use Intervention\Image\ImageManager;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
   Connection::make(App::get('config')['database'])
 ));

 App::bind('Image', new ImageManager(array('driver' => 'gd')));

function view($name, $data = []){
  extract($data);
 return require "App/Views/{$name}.view.php";
}
  

function response($type,$data){
  $arr['type'] = $type;
  $arr['body'] = $data;
  echo json_encode($arr);
}

function nextpagealert($type,$data){
    $_SESSION['alert']['type'] = $type;
    $_SESSION['alert']['body'] = $data;
}



function alert($type,$data){
$html= <<<HTML
<script>
new Noty({
        theme: 'metroui',
        type: "$type",
		text: "$data",
        timeout: 3000,
        progressBar: true,
        layout: 'bottomLeft',
        closeWith: ['click', 'button'],
        animation: {
            open: function (promise) {
                var n = this;
                new Bounce()
                    .translate({
                        from: {
                            x: 450,
                            y: 0
                        },
                        to: {
                            x: 0,
                            y: 0
                        },
                        easing: "bounce",
                        duration: 1000,
                        bounces: 4,
                        stiffness: 3
                    })
                    .scale({
                        from: {
                            x: 1.2,
                            y: 1
                        },
                        to: {
                            x: 1,
                            y: 1
                        },
                        easing: "bounce",
                        duration: 1000,
                        delay: 100,
                        bounces: 4,
                        stiffness: 1
                    })
                    .scale({
                        from: {
                            x: 1,
                            y: 1.2
                        },
                        to: {
                            x: 1,
                            y: 1
                        },
                        easing: "bounce",
                        duration: 1000,
                        delay: 100,
                        bounces: 6,
                        stiffness: 1
                    })
                    .applyTo(n.barDom, {
                        onComplete: function () {
                            promise(function (resolve) {
                                resolve();
                            })
                        }
                    });
            },
            close: function (promise) {
                var n = this;
                new Bounce()
                    .translate({
                        from: {
                            x: 0,
                            y: 0
                        },
                        to: {
                            x: 450,
                            y: 0
                        },
                        easing: "bounce",
                        duration: 500,
                        bounces: 4,
                        stiffness: 1
                    })
                    .applyTo(n.barDom, {
                        onComplete: function () {
                            promise(function (resolve) {
                                resolve();
                            })
                        }
                    });
            }
        }
    }).show();
    </script>
HTML;
echo $html;
}