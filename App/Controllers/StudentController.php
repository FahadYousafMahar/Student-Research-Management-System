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
    public function Student($username = null)
    {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            if (isset($_SESSION['id']) && isset($_SESSION['type'])) {
                if ($_SESSION['type']=='Student') {
                    try {
                        $faculty = App::get('database')->query('faculty', 'Faculty',"where id in (select facid from paper where stdid = {$_SESSION['id']}) order by createdat desc");
                        $students = App::get('database')->query('student', 'Student',"order by createdat desc");
                        $papers = App::get('database')->query('paper', 'Paper',"where stdid = {$_SESSION['id']} order by createdat desc ");
                        $user = App::get('database')->selectOne('student', 'Student','id',$_SESSION['id']);
                        $user = $user[0];
                        $title = 'Student Dashboard';
                        return view('studentdashboard', compact('title','user', 'students','faculty','papers'));
                    } catch (PDOException $e) {
                        $e->getMessage();
                        error_log("DB Error : ".$e->getMessage());
                    }
                }else{
                    \nextpagealert("error","You Are Not Allowed in Student Area ! ");
                    header('Location: /login');
                }
            } else {
                \nextpagealert("success","Please Login !");
                header('Location: /login');
            }
            
     }

     public function addpaper($username = null)
     {
             if (session_status() !== PHP_SESSION_ACTIVE) {
                 session_start();
             }
             if (isset($_SESSION['id']) && isset($_SESSION['type'])) {
                 if ($_SESSION['type']=='Student') {
                     try {
                         $faculty = App::get('database')->query('faculty', 'Faculty'," where id in (select facid from factostd where stdid = {$_SESSION['id']})order by createdat desc");
                         $user = App::get('database')->selectOne('student', 'Student','id',$_SESSION['id']);
                         $user = $user[0];
                         $title = 'Add New Paper';
                         return view('addpaper', compact('title','user','faculty'));
                     } catch (PDOException $e) {
                         $e->getMessage();
                         error_log("DB Error : ".$e->getMessage());
                     }
                 }else{
                     \nextpagealert("error","You Are Not Allowed in Student Area ! ");
                     header('Location: /login');
                 }
             } else {
                 \nextpagealert("success","Please Login !");
                 header('Location: /login');
             }
             
      }

      public function addpaperprocess($id = null)
      {
              if (session_status() !== PHP_SESSION_ACTIVE) {
                  session_start();
              }
              if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
                  if ($_SESSION['type']=='Student') {
                    if($id==null){
                        $id = $_SESSION['id'];
                    }
                    if (file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name'])) {
                        move_uploaded_file($_FILES['file']['tmp_name'], getcwd().'/app/data/files/'.$_SESSION['id'].'-'.$_FILES['file']['name']);
                        $value['file'] = $_SESSION['id'].'-'.$_FILES['file']['name'];
                    }
                    $_POST = Gump::sanitize(Gump::xss_clean($_POST));
                    $value['facid']=$_POST['facid'];
                    $value['stdid']=$id;
                    $value['title']=$_POST['title'];
                    $value['body']=$_POST['body'];
                    try {
                        if (App::get('database')->insert('paper', $value)) {
                            nextpagealert("success", "Paper was Uploaded Successfully!");
                            header("Location: /viewpapers");
                        } else {
                            nextpagealert("error", "An error occurred in uploading Paper!");
                            header("Location: /viewpapers");
                        }
                    } catch (PDOException $e) {
                        nextpagealert("error", "A database error occurred in uploading Paper!");
                        \error_log("DB Error : ".$e->getMessage());
                        header("Location: /viewpapers");
                    }
                }else{
                    \nextpagealert("error","You Are Not Allowed in Student Area ! ");
                    header('Location: /login');
                }
            } else {
                \nextpagealert("success","Please Login !");
                header('Location: /login');
            }
            
        }
        
    public function editPaper($id = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Student') {
                if($id==null){
                    \nextpagealert("error","Please Specify A Paper To Be Edited !");
                    header("Location: /viewpapers"); 
                    exit();
                }
                try {
                    $paper = App::get('database')->selectOne('paper', 'Paper','id',$id);
                    $faculty = App::get('database')->query('faculty', 'Faculty'," where id in (select facid from factostd where stdid = {$_SESSION['id']})order by createdat desc");
                    $user = App::get('database')->selectOne('student', 'Student','id',$_SESSION['id']);
                    $user = $user[0];
                    $paper = $paper[0];
                    $title = 'Edit Paper';
                    return view('editPaper', compact('title','paper','user','faculty'));
                } catch (PDOException $e) {
                    $e->getMessage();
                    error_log("DB Error : ".$e->getMessage());
                }
            }else{
                \nextpagealert("error","You Are Not Allowed in Student Area ! ");
                header('Location: /login');
            }
        } else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
        
    }

    public function editpaperprocess($id = null)
    {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
                if ($_SESSION['type']=='Student') {
                  if($id==null){
                    \nextpagealert("error","Please Specify A Paper To Be Edited !");
                    header("Location: /viewpapers/"); 
                    exit();
                  }
                  if (file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name'])) {
                      move_uploaded_file($_FILES['file']['tmp_name'], getcwd().'/app/data/files/'.$_SESSION['id'].'-'.$_FILES['file']['name']);
                      $value['file'] = $_SESSION['id'].'-'.$_FILES['file']['name'];
                  }
                  $_POST = Gump::sanitize(Gump::xss_clean($_POST));
                  foreach ($_POST as $k=>$v) {
                    if (!empty($v)) {
                            $value[$k]=$v;
                     }
                  }
                  try {
                      if (App::get('database')->updatewhere('paper', $value,'id',$id)) {
                          nextpagealert("success", "Paper was Updated Successfully!");
                          header("Location: /editPaper/".$id); 
                        } else {
                          nextpagealert("error", "An error occurred in Updating Paper!");
                          header("Location: /editPaper/".$id); 
                        }
                  } catch (PDOException $e) {
                      nextpagealert("error", "A database error occurred in Updating Paper!");
                      \error_log("DB Error : ".$e->getMessage());
                      header("Location: /editPaper/".$id); 
                    }
              }else{
                  \nextpagealert("error","You Are Not Allowed in Student Area ! ");
                  header('Location: /login');
              }
          } else {
              \nextpagealert("success","Please Login !");
              header('Location: /login');
          }
          
      }

    public function viewpaper($id = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Student') {
                if($id==null){
                    \nextpagealert("error","Please Specify A Paper To Be Viewed !");
                    header("Location: /viewpapers"); 
                    exit();
                }
                try {
                    $paper = App::get('database')->selectOne('paper', 'Paper','id',$id);
                    $faculty = App::get('database')->query('faculty', 'Faculty'," where id in (select facid from factostd where stdid = {$_SESSION['id']})order by createdat desc");
                    $user = App::get('database')->selectOne('student', 'Student','id',$_SESSION['id']);
                    $user = $user[0];
                    $paper = $paper[0];
                    $title = 'View Paper';
                    return view('viewpaper', compact('title','paper','user','faculty'));
                } catch (PDOException $e) {
                    $e->getMessage();
                    error_log("DB Error : ".$e->getMessage());
                }
            }else{
                \nextpagealert("error","You Are Not Allowed in Student Area ! ");
                header('Location: /login');
            }
        } else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
        
    }

    public function viewpapers($username = null)
    {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
                if ($_SESSION['type']=='Student') {
                    try {
                        $faculty = App::get('database')->query('faculty', 'Faculty'," where id in (select facid from factostd where stdid = {$_SESSION['id']})order by createdat desc");
                        $user = App::get('database')->selectOne('student', 'Student','id',$_SESSION['id']);
                        $papers = App::get('database')->query('paper', 'Paper'," where stdid = {$_SESSION['id']} order by createdat desc");
                        $user = $user[0];
                        $title = 'View All Papers';
                        return view('viewpapers', compact('title','user','faculty','papers'));
                    } catch (PDOException $e) {
                        $e->getMessage();
                        error_log("DB Error : ".$e->getMessage());
                    }
                }else{
                    \nextpagealert("error","You Are Not Allowed in Student Area ! ");
                    header('Location: /login');
                }
            } else {
                \nextpagealert("success","Please Login !");
                header('Location: /login');
            }
            
    }

    public function deletePaper($id = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['id']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Student') {
                if($id==null){
                    \nextpagealert("error","Please Specify A Paper To Be Deleted !");
                    header("Location: /viewpapers"); 
                    exit();
                }
                try {
                    if (App::get('database')->customquery("delete from paper where id = ".$id)) {
                        nextpagealert("success", "Paper was Deleted Successfully!");
                        header("Location: /viewpapers"); 
                        exit();
                    } else {
                        nextpagealert("error", "An error occurred in Deleting Paper!");
                        header("Location: /viewpapers"); 
                        exit();
                    }
                } catch (PDOException $e) {
                    nextpagealert("error", "A database error occurred in Deleting Paper!");
                    \error_log("DB Error : ".$e->getMessage());
                    header("Location: /viewpapers"); 
                    exit();
                }
            }else{
                \nextpagealert("error","You Are Not Allowed in Student Area ! ");
                header('Location: /login');
                exit();
            }
        } else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
        
    }

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
