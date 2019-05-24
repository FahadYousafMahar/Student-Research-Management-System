<?php
/**
 * @author  Fahad Yousaf Mahar https://fb.com/fahad3267
 * @website https://www.github.com/fahadyousafmahar
 **/
namespace Myweb\Controllers;

use Myweb\Core\App;
use PDOException;
use Exception;
use GUMP;
use upload;
use Carbon\Carbon;

class OperationController
{
    public function addcomment()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if (isset($_SESSION['username']) && $_SESSION['type']=='user') {
            try {
                $value['userid'] = $_SESSION['id'];
                $value['postid'] = $_POST['postid'];
                $value['body'] = htmlspecialchars($_POST['body']);
                if(empty(trim($value['body']))){
                    response("error","Please write something.");
                    die();
                }
                $result = App::get('database')->insert('comments',$value);
                response("success","Your comment has been added.");
            } catch (PDOException $e) {
                response("error","Database Error Occurred.");
                error_log("DB Error : ".$e->getMessage());
            }
        } else {
            response("error","You are not logged in.");
        }
    }

    public function addmessage()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if (isset($_SESSION['username']) && $_SESSION['type']=='user') {
            try {
                $value['fromid'] = $_SESSION['id'];
                $value['toid'] = $_POST['toid'];
                $value['body'] = htmlspecialchars($_POST['body']);
                if(empty(trim($value['body']))){
                    response("error","Please write something in message body.");
                    die();
                }
                $result = App::get('database')->insert('messages',$value);
                response("success","Your comment has been added.");
            } catch (PDOException $e) {
                response("error","Database Error Occurred.");
                error_log("DB Error : ".$e->getMessage());
            }
        } else {
            response("error","You are not logged in.");
        }
    }
    
    public function changepassword()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        
        }
        
        if (isset($_SESSION['username']) && $_SESSION['type']=='user') {
            try {
                $value['currentpassword'] = sha1(md5($_POST['currentpassword']));
                $value['newpassword'] = sha1(md5($_POST['newpassword']));
                $value['newconfirmpassword'] = sha1(md5($_POST['newconfirmpassword']));
                if($value['currentpassword'] != $_SESSION['password']){
                    response("error","Your entered an incorrect Current Password !");
                    die();
                }
                if($value['newpassword'] != $value['newconfirmpassword']){
                    response("error","New Password and Confirm Password donot match !");
                    die();
                }
                if(App::get('database')->customquery("update user set password = '{$value['newpassword']}' where id={$_SESSION['id']}")){
                    $_SESSION['password'] =  $value['newpassword'];
                    response("success","Your Password has been changed successfully.");
                }
            } catch (PDOException $e) {
                response("error","Database Error Occurred.");
                error_log("DB Error : ".$e->getMessage());
            }
        } else {
            response("error","You are not logged in.");
        }
    }

    public function searchapi($user)
    {
       
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if (isset($_SESSION['username']) && $_SESSION['type']=='user') {
            try {
                $username = $user;
                if($result = App::get('database')->customselect("select concat(fname,' ',lname) as 'fullname',username,profilepic,city,country,createdat from user where username like '%{$username}' or username like '%{$username}%' or fname like '%{$username}%'")){
                    for ($i=0; $i < count($result); $i++) {
                        $result[$i]['createdat'] = Carbon::make($result[$i]['createdat'])->diffForHumans(); 
                    }
                    echo '{"users":'.json_encode($result).'}';
                }
            } catch (PDOException $e) {
                response("error","Database Error Occurred.");
                error_log("DB Error : ".$e->getMessage());
            }
        } else {
            response("error","You are not logged in.");
        }
    }

    public function returnheaderimage()
    {
       
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if (isset($_SESSION['username']) && $_SESSION['type']=='user') { 
            $image = App::get('Image')->make($_FILES['header']['tmp_name']);
            if( $image->width() < 1920 ||  $image->height() < 640){
                response("error","Please Upload Header Image of at least 1920x640 pixels.");
                die();
            }else{
                $image->save(getcwd().'/app/data/temp/header'.$_SESSION['id'].'.jpg');
                response("success","/app/data/temp/header".$_SESSION['id'].".jpg");
                die();

            }
                } else {
            response("error","You are not logged in.");
            die();
        }
    }

    public function setheaderimage()
    {
       
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if (isset($_SESSION['username']) && $_SESSION['type']=='user') {
            $image = App::get('Image')->make(getcwd().'/app/data/temp/header'.$_SESSION['id'].'.jpg');
            $image->fit(768,null,null,'top-left')->crop($_POST['w'], $_POST['h'], $_POST['x1'], $_POST['y1'])->save(getcwd().'/app/data/images/covers/'.$_SESSION['username'].'.jpg');
            if(App::get('database')->customquery("update user set coverpic = '{$_SESSION['username']}' where id= {$_SESSION['id']}")){
                response("success","Header Picture Updated !");
                die();
            }else{
                response("error","Header Picture Was Not Updated ! Try Again.");
                die();
            }
                } else {
            response("error","You are not logged in.");
            die();

        }
    }
    
    public function returnprofileimage()
    {
       
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if (isset($_SESSION['username']) && $_SESSION['type']=='user') { 
            $image = App::get('Image')->make($_FILES['profile']['tmp_name']);
            if( $image->width() < 120 ||  $image->height() < 120){
                response("error","Please Upload Profile Image of at least 120x120 pixels.");
                die();
            }else{
                $image->save(getcwd().'/app/data/temp/profile'.$_SESSION['id'].'.jpg');
                response("success","/app/data/temp/profile".$_SESSION['id'].".jpg");
                die();

            }
                } else {
            response("error","You are not logged in.");
            die();
        }
    }

    public function setprofileimage()
    {
       
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if (isset($_SESSION['username']) && $_SESSION['type']=='user') {
            $image = App::get('Image')->make(getcwd().'/app/data/temp/profile'.$_SESSION['id'].'.jpg');
            $image->fit(400,null,null,'top-left')->crop($_POST['w'], $_POST['h'], $_POST['x1'], $_POST['y1'])->fit(120,120)->save(getcwd().'/app/data/images/users/'.$_SESSION['username'].'.jpg');
            if(App::get('database')->customquery("update user set profilepic = '{$_SESSION['username']}' where id= {$_SESSION['id']}")){
                response("success","Profile Picture Updated Successfully!");
                die();
            }else{
                response("error","Profile Picture Was Not Updated ! Try Again.");
                die();
            }
                } else {
            response("error","You are not logged in.");
            die();

        }
    }
}