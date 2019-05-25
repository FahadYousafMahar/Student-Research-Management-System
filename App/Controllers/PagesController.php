<?php
/**
 * @author  Fahad Yousaf Mahar https://fb.com/fahad3267
 * @website https://www.github.com/fahadyousafmahar
 **/
namespace Myweb\Controllers;

use Myweb\Core\App;
use PDOException;
use GUMP;
use Carbon\Carbon;

class PagesController
{
    public function home()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && $_SESSION["type"]) {
            header("Location: /dashboard"); 
        }else{

            $title = 'Home ';
            return view('index', compact('title'));
        }
    }


    public function dashboard()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
                header("Location: /".$_SESSION['type']);
        } else {
            header('Location: /login');

        }
    }


    public function login()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email'])) {
            header('Location: /dashboard');
        } else {
            $title  = 'Login';
            return view('login', compact('title'));
        }
    }

    
    public function loginProcess()
    {
        
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $errors = array();
        $status = false;
        if(isset($_POST['type']) && !empty($_POST['email']) && !empty($_POST['password'])){
                try {
                $row = App::get('database')->selectOne(strtolower($_POST['type']), $_POST['type'], 'email', $_POST['email']);
                if (isset($row[0])) {
                    if ($_POST['email'] == $row[0]->email && sha1(md5($_POST['password'])) == $row[0]->password) {
                        foreach ($row[0] as $key => $value) {
                            $_SESSION[$key] = $value;
                        }
                        $_SESSION['type'] = $_POST['type'];
                        \header("Location: /dashboard"); 
                    } else {
                        $status = false;
                        array_push($errors, "Eamil or Password do not match.");
                        nextpagealert("error","Email or Password do not match.");
                    }
                } else {
                    array_push($errors, "No account exists with that email");
                    nextpagealert("error","No account exists with that email");
                }
            } catch (PDOException $e) {
                $e->getMessage();
                error_log("DB Error : ".$e->getMessage());
            }
        }else{
            array_push($errors, "Please fill all fields.");
            nextpagealert("error","Please fill all fields.");
        }
        $status = false;
        $title  = 'Login';
        return view('login', compact('title', 'status', 'errors'));
    }

    public function logout()
    {
        session_destroy();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
          session_name(),
          '',
          time() - 42000,
          $params["path"],
          $params["domain"],
          $params["secure"],
          $params["httponly"]
      );
        }
        header('Location: /login');
    }


    public function myprofile()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
                try {
                    $row = App::get('database')->selectOne(strtolower($_SESSION['type']), $_SESSION['type'], 'id', $_SESSION['id']);
                    $user = $row[0];
                    $title  = 'My Profile';
                    return view('myprofile', compact('title', 'user'));
                } catch (PDOException $e) {
                    $e->getMessage();
                    error_log("DB Error : ".$e->getMessage());
                }
        }else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
    }

    public function pagenotfound()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $title  = '404 - Page Not Found';
        return view('404', compact('title'));
    }

        public function phpinfo(){
            phpinfo();
        }
}
