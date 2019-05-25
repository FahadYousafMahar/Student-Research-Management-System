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
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $errors = array();
        $status = false;
        GUMP::sanitize($_POST);
        $validate = GUMP::is_valid($_POST, array(
            'fname'        => 'required|alpha_space',
            'lname'        => 'required|alpha_space',
            'password'        => 'required|min_len,8',
            'confirmpassword' => 'required|min_len,8',
            'email'           => 'required|valid_email',
            'gender'   =>  'required|alpha',
            'birthday'             => 'required',
            'city'             => 'required|alpha_space',
            'country'             => 'required|alpha_space',
            'degree'             => 'required|alpha_space',
            'semester'             => 'required|alpha_space',
            'semesteryear'             => 'required|alpha_space',
            'institute'             => 'required|alpha_space',
            'aboutme'             => 'alpha_space',
            ));

        if ($validate === true) {
            $_POST['birthday'] = Carbon::createFromFormat("d/m/Y", $_POST['birthday'])->format('Y-m-d');
            if (isset($_POST['tos'])) {
                if ($_POST['password'] == $_POST['confirmpassword']) {
                    $value['password'] = sha1(md5($_POST['password']));
                    $value['email'] = $_POST['email'];
                    $value['fname'] = $_POST['fname'];
                    $value['lname'] = $_POST['lname'];
                    $value['birthday'] = $_POST['birthday'];
                    $value['gender'] = $_POST['gender'];
                    $value['country'] = $_POST['country'];
                    $value['city'] = $_POST['city'];
                    $value['degree'] = $_POST['degree'];
                    $value['semester'] = $_POST['semester'];
                    $value['semesteryear'] = $_POST['semesteryear'];
                    $value['institute'] = $_POST['institute'];
                    $value['aboutme'] = $_POST['aboutme'];

                    try {
                        $emailcount = App::get('database')->selectOneCount('student', 'Student', 'email', $value['email']);
                       if ($emailcount['count(*)']>'0') {
                            $status = false;
                            array_push($errors, "Email aready Exists");
                        } else {
                            try {
                                App::get('database')->insert('Student', $value);
                                $status = true;
                                $title = 'Register';
                                \nextpagealert("success", "You have been successfully registered !");
                                return view('registerStudent', compact('title', 'status'));
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
            $errors = array_merge($errors,$validate);
        }
        $title = 'Register as Student';
        return view('registerStudent', compact('title', 'status', 'errors'));
    }
}
