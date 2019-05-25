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

    public function editAdmin($id = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                if($id==null){
                    $id = $_SESSION['id'];
                }
                try {
                    $admin = App::get('database')->selectOne('admin', 'Admin','id',$id);
                    $user = App::get('database')->selectOne('admin', 'Admin','email',$_SESSION['email']);
                    $user = $user[0];
                    $admin = $admin[0];
                    $title = 'Edit Admin';
                    return view('editAdmin', compact('title','admin','user'));
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

    public function editadminprocess($id = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $value = [];
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                if($id==null){
                    \nextpagealert("error","Please Specify An Admin To Be Edited !");
                    header("Location: ".$_SERVER['REQUEST_URI']);
                }
                if (file_exists($_FILES['profilepic']['tmp_name']) || is_uploaded_file($_FILES['profilepic']['tmp_name'])) {
                    $image = App::get('Image')->make($_FILES['profilepic']['tmp_name'])->fit(110, 110)->save(getcwd().'/app/data/images/users/'.$_POST['email'].'.jpg');
                    $value['profilepic'] = $_POST['email'];
                }
                $_POST = Gump::sanitize(Gump::xss_clean($_POST));
                foreach ($_POST as $k=>$v) {
                    if (!empty($v)) {
                        if($k =='password' || $k == 'confirmpassword'){
                            if($_POST['password'] == $_POST['confirmpassword']){
                                $value['password']=sha1(md5($v));
                            }else{
                                nextpagealert("error", "Password and Confirm Password Donot match!");
                                header("Location: ".$_SERVER['REQUEST_URI']);
                            }
                        }else if ($k == 'birthday'){
                            $value[$k] = date("Y-m-d", strtotime($v));
                        }else{
                            $value[$k]=$v;
                        }
                    }
                }
                try {
                    if (App::get('database')->updatewhere('admin', $value, 'id', $id)) {
                        if($id == $_SESSION['id']){
                            $row = App::get('database')->selectOne('admin', 'Admin', 'id', $id);
                            foreach ($row[0] as $key => $value) {
                                $_SESSION[$key] = $value;
                            }
                        }
                        nextpagealert("success", "Profile was Updated Successfully!");
                        header("Location: ".$_SERVER['REQUEST_URI']);
                    } else {
                        nextpagealert("error", "An error occurred in Updating profile!");
                        header("Location: ".$_SERVER['REQUEST_URI']);
                    }
                } catch (PDOException $e) {
                    nextpagealert("error", "A database error occurred in Updating profile!");
                    \error_log("DB Error : ".$e->getMessage());
                    header("Location: ".$_SERVER['REQUEST_URI']);
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

    public function editStudent($id = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                if($id==null){
                    \nextpagealert("error","Please Specify A Student To Be Edited !");
                    header('Location: /dashboard');
                }
                try {
                    $student = App::get('database')->selectOne('student', 'Student','id', $id);
                    $user = App::get('database')->selectOne('admin', 'Admin','email',$_SESSION['email']);
                    $user = $user[0];
                    $student = $student[0];
                    $title = 'Edit Student';
                    return view('editstudent', compact('title','student','user'));
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

    public function editstudentprocess($id = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $value = [];
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                if($id==null){
                    \nextpagealert("error","Please Specify A Student To Be Edited !");
                    header('Location: /dashboard');
                }
                if (file_exists($_FILES['profilepic']['tmp_name']) || is_uploaded_file($_FILES['profilepic']['tmp_name'])) {
                    $image = App::get('Image')->make($_FILES['profilepic']['tmp_name'])->fit(110, 110)->save(getcwd().'/app/data/images/users/'.$_POST['email'].'.jpg');
                    $value['profilepic'] = $_POST['email'];
                }
                $_POST = Gump::sanitize(Gump::xss_clean($_POST));
                foreach ($_POST as $k=>$v) {
                    if (!empty($v)) {
                        if($k =='password' || $k == 'confirmpassword'){
                            if($_POST['password'] == $_POST['confirmpassword']){
                                $value['password']=sha1(md5($v));
                            }else{
                                nextpagealert("error", "Password and Confirm Password Donot match!");
                                header("Location: ".$_SERVER['REQUEST_URI']);
                            }
                        }else if ($k == 'birthday'){
                            $value[$k] = date("Y-m-d", strtotime($v));
                        }else{
                            $value[$k]=$v;
                        }
                    }
                }
                try {
                    if (App::get('database')->updatewhere('student', $value, 'id', $id)) {
                        nextpagealert("success", "Profile was Updated Successfully!");
                        header("Location: ".$_SERVER['REQUEST_URI']);
                    } else {
                        nextpagealert("error", "An error occurred in Updating profile!");
                        header("Location: ".$_SERVER['REQUEST_URI']);
                    }
                } catch (PDOException $e) {
                    nextpagealert("error", "A database error occurred in Updating profile!");
                    \error_log("DB Error : ".$e->getMessage());
                    header("Location: ".$_SERVER['REQUEST_URI']);
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

    public function editFaculty($id = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                if($id==null){
                    \nextpagealert("error","Please Specify A Faculty Member To Be Edited !");
                    header('Location: /dashboard');
                }
                try {
                    $faculty = App::get('database')->selectOne('faculty', 'Faculty','id', $id);
                    $user = App::get('database')->selectOne('admin', 'Admin','email',$_SESSION['email']);
                    $user = $user[0];
                    $faculty = $faculty[0];
                    $title = 'Edit Faculty';
                    return view('editfaculty', compact('title','faculty','user'));
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

    public function editfacultyprocess($id = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $value = [];
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                if($id==null){
                    \nextpagealert("error","Please Specify A Faculty Member To Be Edited !");
                    header('Location: /dashboard');
                }
                if (file_exists($_FILES['profilepic']['tmp_name']) || is_uploaded_file($_FILES['profilepic']['tmp_name'])) {
                    $image = App::get('Image')->make($_FILES['profilepic']['tmp_name'])->fit(110, 110)->save(getcwd().'/app/data/images/users/'.$_POST['email'].'.jpg');
                    $value['profilepic'] = $_POST['email'];
                }
                $_POST = Gump::sanitize(Gump::xss_clean($_POST));
                foreach ($_POST as $k=>$v) {
                    if (!empty($v)) {
                        if($k =='password' || $k == 'confirmpassword'){
                            if($_POST['password'] == $_POST['confirmpassword']){
                                $value['password']=sha1(md5($v));
                            }else{
                                nextpagealert("error", "Password and Confirm Password Donot match!");
                                header("Location: ".$_SERVER['REQUEST_URI']);
                            }
                        }else if ($k == 'birthday'){
                            $value[$k] = date("Y-m-d", strtotime($v));
                        }else{
                            $value[$k]=$v;
                        }
                    }
                }
                try {
                    if (App::get('database')->updatewhere('faculty', $value, 'id', $id)) {
                        nextpagealert("success", "Profile was Updated Successfully!");
                        header("Location: ".$_SERVER['REQUEST_URI']);
                        exit();
                    } else {
                        nextpagealert("error", "An error occurred in Updating profile!");
                        header("Location: ".$_SERVER['REQUEST_URI']);
                        exit();
                    }
                } catch (PDOException $e) {
                    nextpagealert("error", "A database error occurred in Updating profile!");
                    \error_log("DB Error : ".$e->getMessage());
                    header("Location: ".$_SERVER['REQUEST_URI']);
                    exit();
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

    public function deleteadmin($id = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                if($id==null){
                    \nextpagealert("error","Please Specify An Admin To Be Edited !");
                    header("Location: /viewadmins"); 
                    exit();
                }else if($id==$_SESSION['id']){
                    \nextpagealert("error","AH! You Cannot Delete Yourself!");
                    header("Location: /viewadmins"); 
                    exit();
                }
                try {
                    if (App::get('database')->customquery("delete from admin where id = ".$id)) {
                        nextpagealert("success", "Profile was Deleted Successfully!");
                        header("Location: /viewadmins"); 
                        exit();
                    } else {
                        nextpagealert("error", "An error occurred in Deleting profile!");
                        header("Location: /viewadmins"); 
                        exit();
                    }
                } catch (PDOException $e) {
                    nextpagealert("error", "A database error occurred in Deleting profile!");
                    \error_log("DB Error : ".$e->getMessage());
                    header("Location: /viewadmins"); 
                    exit();
                }
            }else{
                \nextpagealert("error","You Are Not Allowed in Admin Area ! ");
                header('Location: /login');
                exit();
            }
        } else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
        
    }

    public function deletefaculty($id = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                if($id==null){
                    \nextpagealert("error","Please Specify A Faculty To Be Edited !");
                    header("Location: /viewfaculty"); 
                }
                try {
                    if (App::get('database')->customquery("delete from faculty where id = ".$id)) {
                        nextpagealert("success", "Profile was Deleted Successfully!");
                        header("Location: /viewfaculty"); 
                        exit();
                    } else {
                        nextpagealert("error", "An error occurred in Deleting profile!");
                        header("Location: /viewfaculty"); 
                        exit();
                    }
                } catch (PDOException $e) {
                    nextpagealert("error", "A database error occurred in Deleting profile!");
                    \error_log("DB Error : ".$e->getMessage());
                    header("Location: /viewfaculty"); 
                    exit();
                }
            }else{
                \nextpagealert("error","You Are Not Allowed in Admin Area ! ");
                header('Location: /login');
                exit();
            }
        } else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
        
    }

    public function deletestudent($id = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                if($id==null){
                    \nextpagealert("error","Please Specify A Student To Be Edited !");
                    header("Location: /viewstudents"); 
                    exit();
                }
                try {
                    if (App::get('database')->customquery("delete from student where id = ".$id)) {
                        nextpagealert("success", "Profile was Deleted Successfully!");
                        header("Location: /viewstudents"); 
                        exit();
                    } else {
                        nextpagealert("error", "An error occurred in Deleting profile!");
                        header("Location: /viewstudents"); 
                        exit();
                    }
                } catch (PDOException $e) {
                    nextpagealert("error", "A database error occurred in Deleting profile!");
                    \error_log("DB Error : ".$e->getMessage());
                    header("Location: /viewstudents"); 
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


    public function addadmin()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                try {
                    $user = App::get('database')->selectOne('admin', 'Admin','id',$_SESSION['id']);
                    $user = $user[0];
                    $title = 'Add Admin';
                    return view('addadmin', compact('title','user'));
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

    public function addadminprocess()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                $user = App::get('database')->selectOne('admin', 'Admin','id',$_SESSION['id']);
                $user = $user[0];
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
            ));
                if ($validate === true) {
                    $_POST['birthday'] = Carbon::createFromFormat("d/m/Y", $_POST['birthday'])->format('Y-m-d');
                    if (file_exists($_FILES['profilepic']['tmp_name']) || is_uploaded_file($_FILES['profilepic']['tmp_name'])) {
                        $image = App::get('Image')->make($_FILES['profilepic']['tmp_name'])->fit(110, 110)->save(getcwd().'/app/data/images/users/'.$_POST['email'].'.jpg');
                        $value['profilepic'] = $_POST['email'];
                    }
                    if ($_POST['password'] == $_POST['confirmpassword']) {
                        $value['password'] = sha1(md5($_POST['password']));
                        $value['email'] = $_POST['email'];
                        $value['fname'] = $_POST['fname'];
                        $value['lname'] = $_POST['lname'];
                        $value['birthday'] = $_POST['birthday'];
                        $value['gender'] = $_POST['gender'];
                        $value['country'] = $_POST['country'];
                        $value['city'] = $_POST['city'];

                        try {
                            $emailcount = App::get('database')->selectOneCount('admin', 'Admin', 'email', $value['email']);
                            if ($emailcount['count(*)']>'0') {
                                $status = false;
                                array_push($errors, "Email aready Exists");
                            } else {
                                try {
                                    App::get('database')->insert('admin', $value);
                                    \nextpagealert("success", "Admin Has Been Successfully Added !");
                                    $status=true;
                                    header("Location: /viewadmins");
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
                    $errors = array_merge($errors, $validate);
                }
                $title = 'Add An Admin';
                return view('addadmin', compact('title', 'status', 'errors','user'));
            } else {
                \nextpagealert("error", "You Are Not Allowed in Admin Area ! ");
                header('Location: /login');
            }
        }
    }

    public function addfaculty()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                $user = App::get('database')->selectOne('admin', 'Admin','id',$_SESSION['id']);
                $user = $user[0];
                try {
                    $user = App::get('database')->selectOne('faculty', 'Faculty','id',$_SESSION['id']);
                    $user = $user[0];
                    $title = 'Add Faculty';
                    return view('addfaculty', compact('title','user'));
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

    public function addfacultyprocess()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                $user = App::get('database')->selectOne('admin', 'Admin','id',$_SESSION['id']);
                $user = $user[0];
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
            'education'             => 'required|alpha_space',
            'institute'             => 'required|alpha_space',
            'aboutme'             => 'alpha_space',
            ));
                if ($validate === true) {
                    $_POST['birthday'] = Carbon::createFromFormat("d/m/Y", $_POST['birthday'])->format('Y-m-d');
                    if (file_exists($_FILES['profilepic']['tmp_name']) || is_uploaded_file($_FILES['profilepic']['tmp_name'])) {
                        $image = App::get('Image')->make($_FILES['profilepic']['tmp_name'])->fit(110, 110)->save(getcwd().'/app/data/images/users/'.$_POST['email'].'.jpg');
                        $value['profilepic'] = $_POST['email'];
                    }
                    if ($_POST['password'] == $_POST['confirmpassword']) {
                        $value['password'] = sha1(md5($_POST['password']));
                        $value['email'] = $_POST['email'];
                        $value['fname'] = $_POST['fname'];
                        $value['lname'] = $_POST['lname'];
                        $value['birthday'] = $_POST['birthday'];
                        $value['gender'] = $_POST['gender'];
                        $value['country'] = $_POST['country'];
                        $value['city'] = $_POST['city'];
                        $value['education'] = $_POST['education'];
                        $value['institute'] = $_POST['institute'];
                        $value['aboutme'] = $_POST['aboutme'];
                        try {
                            $emailcount = App::get('database')->selectOneCount('faculty', 'Faculty', 'email', $value['email']);
                            if ($emailcount['count(*)']>'0') {
                                $status = false;
                                array_push($errors, "Email aready Exists");
                            } else {
                                try {
                                    App::get('database')->insert('faculty', $value);
                                    \nextpagealert("success","Faculty Member Has Been Successfully Added !");
                                    $status = true;
                                    header("Location: /viewfaculty");
                                    exit();
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
                    $errors = array_merge($errors, $validate);
                }
                $title = 'Add Faculty';
                return view('addfaculty', compact('title', 'status', 'errors','user'));
            } else{
                \nextpagealert("error","You Are Not Allowed in Admin Area ! ");
                header('Location: /login');
            }
        } else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
    }

    public function addstudent()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                $user = App::get('database')->selectOne('admin', 'Admin','id',$_SESSION['id']);
                $user = $user[0];
                try {
                    $user = App::get('database')->selectOne('student', 'Student','id',$_SESSION['id']);
                    $user = $user[0];
                    $title = 'Add Student';
                    return view('addstudent', compact('title','user'));
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

    public function addstudentprocess()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Admin') {
                $user = App::get('database')->selectOne('admin', 'Admin','id',$_SESSION['id']);
                $user = $user[0];
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
                    if (file_exists($_FILES['profilepic']['tmp_name']) || is_uploaded_file($_FILES['profilepic']['tmp_name'])) {
                        $image = App::get('Image')->make($_FILES['profilepic']['tmp_name'])->fit(110, 110)->save(getcwd().'/app/data/images/users/'.$_POST['email'].'.jpg');
                        $value['profilepic'] = $_POST['email'];
                    }
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
                                    App::get('database')->insert('student', $value);
                                    \nextpagealert("success","Student Has Been Successfully Added !");
                                    $status = true;
                                    header("Location: /viewstudents");
                                    exit();
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
                    $errors = array_merge($errors, $validate);
                }
                $title = 'Add Student';
                return view('addstudent', compact('title', 'status', 'errors','user'));
            } else{
                \nextpagealert("error","You Are Not Allowed in Admin Area ! ");
                header('Location: /login');
            }
        } else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
    }
    // private function find($getp, $getv, $give, $haystack)
    // {
    //     foreach ($haystack as $h) {
    //         foreach ((get_object_vars($h)) as $p => $v) {
    //             if ($h->$getp == $getv) {
    //                 return $h->$give;
    //             }
    //         }
    //     }
    //     return null;
    // }
}
