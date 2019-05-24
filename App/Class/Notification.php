<?php
namespace Myweb\Classes;
class Notification
/**
 * Notification class
 * types are "message","friendrequest","notification"
 */

{

    public $id;
    public $fromid;
    public $toid;
    public $type;
    public $body;
    public $status;
    public $createdat;
    
}