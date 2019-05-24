<?php
namespace Myweb\Classes;
class Friend
{
    public $id;
    public $user_one_id;
    public $user_two_id;
    // 0 = sent
    // 1 = friend
    // 2 = blocked
    // 3 = deleted
    public $status;
    public $action_user_id;
    public $createdat;
}

