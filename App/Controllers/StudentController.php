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

class StudentController
{
    
    public function registerstudent()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $title = 'Student Register ';
        return view('registerStudent', compact('title'));
    }

 
    public function registerstudentProcess()
    {
        $errors = array();
        $status = false;
        $_POST['birthday'] = Carbon::createFromFormat("d/m/Y", $_POST['birthday'])->format('Y-m-d');
        $validate = GUMP::is_valid($_POST, array(
   'fname'        => 'required|alpha_space',
   'lname'        => 'required|alpha_space',
   'username'        => 'required|alpha_dash',
   'password'        => 'required|min_len,8',
   'confirmpassword' => 'required|min_len,8',
   'email'           => 'required|valid_email',
   'gender'   =>  'required|alpha',
   'birthday'             => 'required|date',
   'city'             => 'required|alpha_space',
   'country'             => 'required|alpha_space',
  ));

        if ($validate === true) {
            if (isset($_POST['tos'])) {
                if ($_POST['password'] == $_POST['confirmpassword']) {
                    $value['username'] = $_POST['username'];
                    $value['password'] = sha1(md5($_POST['password']));
                    $value['email'] = $_POST['email'];
                    $value['fname'] = $_POST['fname'];
                    $value['lname'] = $_POST['lname'];
                    $value['birthday'] = $_POST['birthday'];
                    $value['gender'] = $_POST['gender'];
                    $value['country'] = $_POST['country'];
                    $value['city'] = $_POST['city'];

                    try {
                        $usercount = App::get('database')->selectOneCount('user', 'User', 'username', $value['username']);
                        $emailcount = App::get('database')->selectOneCount('user', 'User', 'email', $value['email']);
                        if ($usercount['count(*)']>'0' ) {
                            $status = false;
                            array_push($errors, "Username or Email aready Exists");

                        }else if($emailcount['count(*)']>'0'){
                            $status = false;
                            array_push($errors, "Email aready Exists");

                        } else {
                            try {
                                App::get('database')->insert('user', $value);
                                $result = App::get('database')->selectOne('user','User','email',$value['email']);
                                $about = new \Myweb\Classes\About;
                                $about->userid = $result[0]->id;
                                $about = get_object_vars($about);
                                App::get('database')->insert('about',$about);
                                $status = true;
                                $title = 'Register';
                                \nextpagealert("success","You have been successfully registered !");
                                return view('register', compact('title', 'status', 'validate'));
                            } catch (PDOException $e) {
                                $e->getMessage();
                                error_log("DB Error : ".$e->getMessage());
                            }
                        }
                    } catch (PDOException $e) {
                        $e->getMessage();
                        error_log("DB Error : ".$e->getMessage());
                    }
                } else {
                    $status = false;
                    array_push($errors, "Passwords donot match.");
                }
            } else {
                $status = false;
                array_push($errors, "You have to agree to our Terms & Conditions.");
            }
        } else {
            $status = false;
        }

        $title = 'Register';
        return view('register', compact('title', 'status', 'validate', 'errors'));
    }
}