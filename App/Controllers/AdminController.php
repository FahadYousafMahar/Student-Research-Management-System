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

class AdminController
{
    public function Admin($username = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                try {
                    $faculty = App::get('database')->query('faculty', 'Faculty',"order by createdat desc");
                    $students = App::get('database')->query('student', 'Student',"order by createdat desc");
                    $papers = App::get('database')->query('paper', 'Paper',"order by createdat desc");
                    $user = App::get('database')->selectOne('admin', 'Admin','email',$_SESSION['email']);
                    $user = $user[0];
                    $title = 'Admin Dashboard';
                    return view('admindashboard', compact('title','user', 'students','faculty','papers'));
                } catch (PDOException $e) {
                    $e->getMessage();
                    error_log("DB Error : ".$e->getMessage());
                }
            }else{
                \nextpagealert("error","You Are Not Allowed in Admin Area ! ");
                header('Location: /login');
            }
        } else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
        
    }

    public function viewstudents($username = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                try {
                    $students = App::get('database')->selectAll('student', 'Student');
                    $user = App::get('database')->selectOne('admin', 'Admin','email',$_SESSION['email']);
                    $user = $user[0];
                    $title = 'Students List';
                    return view('viewstudents', compact('title','user','students'));
                } catch (PDOException $e) {
                    $e->getMessage();
                    error_log("DB Error : ".$e->getMessage());
                }
            }else{
                \nextpagealert("error","You Are Not Allowed in Admin Area ! ");
                header('Location: /login');
            }
        } else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
        
    }

    public function viewfaculty($username = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                try {
                    $faculty = App::get('database')->selectAll('faculty', 'Faculty');
                    $user = App::get('database')->selectOne('admin', 'Admin','email',$_SESSION['email']);
                    $user = $user[0];
                    $title = 'Faculty List';
                    return view('viewfaculty', compact('title','user','faculty'));
                } catch (PDOException $e) {
                    $e->getMessage();
                    error_log("DB Error : ".$e->getMessage());
                }
            }else{
                \nextpagealert("error","You Are Not Allowed in Admin Area ! ");
                header('Location: /login');
            }
        } else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
        
    }

    public function viewadmins($username = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                try {
                    $admins = App::get('database')->selectAll('admin', 'Admin');
                    $user = App::get('database')->selectOne('admin', 'Admin','email',$_SESSION['email']);
                    $user = $user[0];
                    $title = 'Admins List';
                    return view('viewadmins', compact('title','user','admins'));
                } catch (PDOException $e) {
                    $e->getMessage();
                    error_log("DB Error : ".$e->getMessage());
                }
            }else{
                \nextpagealert("error","You Are Not Allowed in Admin Area ! ");
                header('Location: /login');
            }
        } else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
        
    }

    public function myprofile($username = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if (isset($_SESSION['email']) && $_SESSION['type']=='user') {
            try {
                if (!isset($username)) {
                    $username = $_SESSION['email'];
                }
                $result = App::get('database')->selectOne('user', 'User', 'username', $username);
                if (count($result) > 0) {
                    $user =  $result[0];
                    $about = App::get('database')->query('about', 'About', "where userid = $user->id ");
                    if (count($about)>0) {
                        $about = $about[0];
                    } else {
                        $about = new \Myweb\Classes\About;
                        $about->userid = $_SESSION['id'];
                        $about = get_object_vars($about);
                        App::get('database')->insert('about', $about);
                    }
                    $title = 'About';
                    $pageTitle = 'About';
                    return view('youraccount', compact('title', 'pageTitle', 'user', 'about'));
                } else {
                    $e = new Exception("Empty User at ".get_class()."@".__FUNCTION__." in ".__FILE__." at ".__LINE__."\n");
                    error_log("My Error : ".$e->getMessage());
                    nextpagealert("error", "User Does Not Exist");
                    header("Location: /login");
                }
            } catch (PDOException $e) {
                $e->getMessage();
                error_log("DB Error : ".$e->getMessage());
            }
        } else {
            header("Location: /login");
        }
    }

    public function friendbirthday($username = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if (isset($_SESSION['email']) && $_SESSION['type']=='user') {
            try {
                if (!isset($username)) {
                    $username = $_SESSION['email'];
                }
                $result = App::get('database')->query(
                    'user',
                    'User',
                    "where id in 
                    (select user_one_id from friends where user_two_id = {$_SESSION['id']} and status = 1)
                  or id in 
                    (select user_two_id from friends where user_one_id = {$_SESSION['id']} and status = 1)"
                );
                if (count($result) > 0) {
                    $friends = $result;
                    $title = 'Friends\' Birthdays';
                    $pageTitle = 'Friends\' Birthdays';
                    return view('friendbirthday', compact('title', 'pageTitle', 'friends'));
                } else {
                    $e = new Exception("Empty User at ".get_class()."@".__FUNCTION__." in ".__FILE__." at ".__LINE__."\n");
                    error_log("My Error : ".$e->getMessage());
                    nextpagealert("error", "You have no Friends. Try to make some !");
                    header("Location: /login");
                }
            } catch (PDOException $e) {
                $e->getMessage();
                error_log("DB Error : ".$e->getMessage());
            }
        } else {
            header("Location: /login");
        }
    }

    public function friends($username = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if (isset($_SESSION['email']) && $_SESSION['type']=='user') {
            try {
                if (!isset($username)) {
                    $username = $_SESSION['email'];
                }
                $result = App::get('database')->selectOne('user', 'User', 'username', $username);
                $user = $result[0];
                $result = App::get('database')->query(
                    'user',
                    'User',
                    "where id in 
                    (select user_one_id from friends where user_two_id = {$_SESSION['id']} and status = 1)
                  or id in 
                    (select user_two_id from friends where user_one_id = {$_SESSION['id']} and status = 1)"
                );
                if (count($result) > 0) {
                    $friends = $result;
                    $title = 'Friends';
                    $pageTitle = 'Friends';
                    return view('friends', compact('title', 'pageTitle', 'friends', 'user'));
                } else {
                    $e = new Exception("Empty User at ".get_class()."@".__FUNCTION__." in ".__FILE__." at ".__LINE__."\n");
                    error_log("My Error : ".$e->getMessage());
                    nextpagealert("error", "You have no Friends. Try to make some !");
                    header("Location: /timeline");
                }
            } catch (PDOException $e) {
                $e->getMessage();
                error_log("DB Error : ".$e->getMessage());
            }
        } else {
            header("Location: /login");
        }
    }


    public function messages($username = null)
    {
        $title = 'Messages';
        $pageTitle = 'Messages';
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if (isset($_SESSION['email']) && $_SESSION['type']=='user') {
            try {
                $result = App::get('database')->selectOne('user', 'User', 'id', $_SESSION['id']);
                $user = $result[0];
                $result = App::get('database')->query('user','User',"where id in (select user_one_id from friends where user_two_id = {$_SESSION['id']} and status = 1) or id in (select user_two_id from friends where user_one_id = {$_SESSION['id']} and status = 1)");
                $friends = $result;
                $result = App::get('database')->query('messages', 'Message', "where fromid in ( {$_SESSION['id']} ) or toid in ( {$_SESSION['id']} ) order by createdat desc");
                $messages = $result;
                if (!isset($username)) {
                    try {
                        $result = App::get('database')->customselect("(select fromid from messages where toid = {$_SESSION['id']} order by createdat desc) union (select toid from messages where fromid = {$_SESSION['id']} order by createdat desc )");
                        if(!empty($result[0]['fromid'])){
                            $chatuserid = $result[0]['fromid'];
                        }else{
                            $chatuserid = $result[0]['toid'];
                        }
                    } catch (PDOException $e) {
                        $e->getMessage();
                        error_log("DB Error : ".$e->getMessage());
                    }
                    return view('messages', compact('title', 'pageTitle', 'friends', 'user', 'messages','chatuserid'));
                } else {
                    if (!empty($chatuserid = $this->find('username', $username, 'id', $friends))) {
                            return view('messages', compact('title', 'pageTitle', 'friends', 'user', 'messages','chatuserid'));
                    } else {
                        $result = App::get('database')->customselect("(select fromid from messages where toid = {$_SESSION['id']} order by createdat desc) union (select toid from messages where fromid = {$_SESSION['id']} order by createdat desc )");
                        $chatuserid = $result[0];
                        return view('messages', compact('title', 'pageTitle', 'friends', 'user', 'messages','chatuserid'));
                    }
                }
            } catch (PDOException $e) {
                $e->getMessage();
                error_log("DB Error : ".$e->getMessage());
            }
        } else {
            header("Location: /login");
        }
    }


    public function changepasswordform()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if (isset($_SESSION['email']) && $_SESSION['type']=='user') {
            $title = 'Change Password';
            $pageTitle = 'Change Password';
            return view('changepassword', compact('title', 'pageTitle'));
        } else {
            header("Location: /login");
        }
    }

    public function settingProcess()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $_POST = Gump::sanitize(Gump::xss_clean($_POST));
        if (isset($_SESSION['email']) && $_SESSION['type']=='user') {
            foreach ($_POST as $key=>$value) {
                if (\array_key_exists($key, \get_object_vars(new \Myweb\Classes\User))) {
                    $user[$key]=$value;
                } else {
                    $about[$key]=$value;
                }
            }
            $user['birthday']= date("Y-m-d", strtotime($user['birthday']));
            try {
                if (App::get('database')->updatewhere('user', $user, 'id', $_SESSION['id']) && App::get('database')->updatewhere('about', $about, 'userid', $_SESSION['id'])) {
                    nextpagealert("success", "Profile was Updated Successfully!");
                    header("Location: /setting");
                } else {
                    nextpagealert("error", "An error occurred in Updating profile!");
                    header("Location: /setting");
                }
            } catch (PDOException $e) {
                nextpagealert("error", "A database error occurred in Updating profile!");
                \error_log("DB Error : ".$e->getMessage());
                header("Location: /setting");
            }
        }
    }
    private function find($getp, $getv, $give, $haystack)
    {
        foreach ($haystack as $h) {
            foreach ((get_object_vars($h)) as $p => $v) {
                if ($h->$getp == $getv) {
                    return $h->$give;
                }
            }
        }
        return null;
    }
}
