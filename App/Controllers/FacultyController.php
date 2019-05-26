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

class FacultyController
{
    
    public function Faculty($username = null)
    {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            if (isset($_SESSION['id']) && isset($_SESSION['type'])) {
                if ($_SESSION['type']=='Faculty') {
                    try {
                        $students = App::get('database')->query('student', 'Student'," where id in (select stdid from factostd where facid = {$_SESSION['id']}) order by createdat desc");
                        $papers = App::get('database')->query('paper', 'Paper',"where facid = {$_SESSION['id']} order by createdat desc ");
                        $user = App::get('database')->selectOne('faculty', 'Faculty','id',$_SESSION['id']);
                        $user = $user[0];
                        $title = 'Faculty Dashboard';
                        return view('facultydashboard', compact('title','user', 'students','papers'));
                    } catch (PDOException $e) {
                        $e->getMessage();
                        error_log("DB Error : ".$e->getMessage());
                    }
                }else{
                    \nextpagealert("error","You Are Not Allowed in Faculty Area ! ");
                    header('Location: /login');
                }
            } else {
                \nextpagealert("success","Please Login !");
                header('Location: /login');
            }
            
     }


     public function supervise($id = null)
     {
             if (session_status() !== PHP_SESSION_ACTIVE) {
                 session_start();
             }
             if (isset($_SESSION['id']) && isset($_SESSION['type'])) {
                 if ($_SESSION['type']=='Faculty') {
                   if($id==null){
                     \nextpagealert("error","Please Specify A Student To Be Supervised !");
                     header("Location: /viewallstudents/"); 
                     exit();
                   }
                   $value=[];
                   $value['facid']=$_SESSION['id'];
                   $value['stdid']=$id;
                   try {
                       if (App::get('database')->insert('factostd', $value)) {
                           nextpagealert("success", "Student was added to supervision Successfully!");
                           header("Location: /viewallstudents/"); 
                           exit();
                         } else {
                           nextpagealert("error", "An error occurred in trying to supervise Student!");
                           header("Location: /viewallstudents/"); 
                           exit();
                         }
                   } catch (PDOException $e) {
                       nextpagealert("error", "A database error occurred in Supervising Student!");
                       \error_log("DB Error : ".$e->getMessage());
                       header("Location: /viewallstudents/"); 
                       exit();
                     }
               }else{
                   \nextpagealert("error","You Are Not Allowed in Faculty Area ! ");
                   header('Location: /login');
               }
           } else {
               \nextpagealert("success","Please Login !");
               header('Location: /login');
           }
           
       }
 
       public function unsupervise($id = null)
     {
             if (session_status() !== PHP_SESSION_ACTIVE) {
                 session_start();
             }
             if (isset($_SESSION['id']) && isset($_SESSION['type'])) {
                 if ($_SESSION['type']=='Faculty') {
                   if($id==null){
                     \nextpagealert("error","Please Specify A Student To Be Un-Supervised !");
                     header("Location: /viewallstudents/"); 
                     exit();
                   }
                   try {
                       if (App::get('database')->customquery("delete from factostd where stdid = $id")) {
                           nextpagealert("success", "Student was removed from supervision Successfully!");
                           header("Location: /viewallstudents/"); 
                           exit();
                         } else {
                           nextpagealert("error", "An error occurred in trying to remove student from supervision!");
                           header("Location: /viewallstudents/"); 
                           exit();
                         }
                   } catch (PDOException $e) {
                       nextpagealert("error", "A database error occurred in removing supervision!");
                       \error_log("DB Error : ".$e->getMessage());
                       header("Location: /viewallstudents/"); 
                       exit();
                     }
               }else{
                   \nextpagealert("error","You Are Not Allowed in Faculty Area ! ");
                   header('Location: /login');
               }
           } else {
               \nextpagealert("success","Please Login !");
               header('Location: /login');
           }
           
       }
 

     public function viewapaper($id = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Faculty') {
                if($id==null){
                    \nextpagealert("error","Please Specify A Paper To Be Viewed !");
                    header("Location: /viewallpapers"); 
                    exit();
                }
                try {
                    $paper = App::get('database')->selectOne('paper', 'Paper','id',$id);
                    $students = App::get('database')->query('student', 'Student'," where id in (select stdid from factostd where facid = {$_SESSION['id']}) order by createdat desc");
                    $user = App::get('database')->selectOne('faculty', 'Faculty','id',$_SESSION['id']);
                    $user = $user[0];
                    $paper = $paper[0];
                    $title = 'View Paper';
                    return view('viewapaper', compact('title','paper','user','students'));
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

    public function editaPaper($id = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Faculty') {
                if($id==null){
                    \nextpagealert("error","Please Specify A Paper To Be Edited !");
                    header("Location: /viewallpapers"); 
                    exit();
                }
                try {
                    $paper = App::get('database')->selectOne('paper', 'Paper','id',$id);
                    $students = App::get('database')->query('student', 'Student'," where id in (select stdid from factostd where facid = {$_SESSION['id']}) order by createdat desc");
                    $user = App::get('database')->selectOne('faculty', 'Faculty','id',$_SESSION['id']);
                    $user = $user[0];
                    $paper = $paper[0];
                    $title = 'Edit Paper';
                    return view('editaPaper', compact('title','paper','user','students'));
                } catch (PDOException $e) {
                    $e->getMessage();
                    error_log("DB Error : ".$e->getMessage());
                }
            }else{
                \nextpagealert("error","You Are Not Allowed in Faculty Area ! ");
                header('Location: /login');
            }
        } else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
        
    }

    public function editapaperprocess($id = null)
    {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
                if ($_SESSION['type']=='Faculty') {
                  if($id==null){
                    \nextpagealert("error","Please Specify A Paper To Be Edited !");
                    header("Location: /viewallpapers/"); 
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
                          header("Location: /editapaper/".$id); 
                        } else {
                          nextpagealert("error", "An error occurred in Updating Paper!");
                          header("Location: /editapaper/".$id); 
                        }
                  } catch (PDOException $e) {
                      nextpagealert("error", "A database error occurred in Updating Paper!");
                      \error_log("DB Error : ".$e->getMessage());
                      header("Location: /editapaper/".$id); 
                    }
              }else{
                  \nextpagealert("error","You Are Not Allowed in Faculty Area ! ");
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
            if ($_SESSION['type']=='Faculty') {
                if($id==null){
                    \nextpagealert("error","Please Specify A Paper To Be Deleted !");
                    header("Location: /viewallpapers"); 
                    exit();
                }
                try {
                    if (App::get('database')->customquery("delete from paper where id = ".$id)) {
                        nextpagealert("success", "Paper was Deleted Successfully!");
                        header("Location: /viewallpapers"); 
                        exit();
                    } else {
                        nextpagealert("error", "An error occurred in Deleting Paper!");
                        header("Location: /viewallpapers"); 
                        exit();
                    }
                } catch (PDOException $e) {
                    nextpagealert("error", "A database error occurred in Deleting Paper!");
                    \error_log("DB Error : ".$e->getMessage());
                    header("Location: /viewallpapers"); 
                    exit();
                }
            }else{
                \nextpagealert("error","You Are Not Allowed in Faculty Area ! ");
                header('Location: /login');
                exit();
            }
        } else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
        
    }

    public function viewallpapers($username = null)
    {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
                if ($_SESSION['type']=='Faculty') {
                    try {
                        $students = App::get('database')->query('student', 'Student'," where id in (select stdid from factostd where facid = {$_SESSION['id']}) order by createdat desc");
                        $user = App::get('database')->selectOne('faculty', 'Faculty','id',$_SESSION['id']);
                        $papers = App::get('database')->query('paper', 'Paper'," where facid = {$_SESSION['id']} order by createdat desc");
                        $user = $user[0];
                        $title = 'View All Papers';
                        return view('viewallpapers', compact('title','user','students','papers'));
                    } catch (PDOException $e) {
                        $e->getMessage();
                        error_log("DB Error : ".$e->getMessage());
                    }
                }else{
                    \nextpagealert("error","You Are Not Allowed in Faculty Area ! ");
                    header('Location: /login');
                }
            } else {
                \nextpagealert("success","Please Login !");
                header('Location: /login');
            }
            
    }

    public function viewallstudents($username = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['email']) && isset($_SESSION['type'])) {
            if ($_SESSION['type']=='Faculty') {
                try {
                    $students = App::get('database')->selectAll('student', 'Student');
                    $facToStd = App::get('database')->selectOne('factostd', 'FacToStd','facid',$_SESSION['id']);
                    $user = App::get('database')->selectOne('faculty', 'Faculty','id',$_SESSION['id']);
                    $user = $user[0];
                    $title = 'Students List';
                    return view('viewallstudents', compact('title','user','students','facToStd'));
                } catch (PDOException $e) {
                    $e->getMessage();
                    error_log("DB Error : ".$e->getMessage());
                }
            }else{
                \nextpagealert("error","You Are Not Allowed in Faculty Area ! ");
                header('Location: /login');
            }
        } else {
            \nextpagealert("success","Please Login !");
            header('Location: /login');
        }
        
    }

    public function registerfaculty()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $title = 'Faculty Register ';
        return view('registerFaculty', compact('title'));
    }

 
    public function registerfacultyProcess()
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
            'education'             => 'required|alpha_space',
            'institute'             => 'required|alpha_space',
            'aboutme'             => 'alpha_space',
            ));
        if ($validate === true) {
            $_POST['birthday'] = Carbon::createFromFormat("d/m/Y", $_POST['birthday'])->format('Y-m-d');
            if(file_exists($_FILES['profilepic']['tmp_name']) || is_uploaded_file($_FILES['profilepic']['tmp_name'])){
                $image = App::get('Image')->make($_FILES['profilepic']['tmp_name'])->fit(110,110)->save(getcwd().'/app/data/images/users/'.$_POST['email'].'.jpg');
                $value['profilepic'] = $_POST['email'];
            }
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
                                $status = true;
                                $title = 'Register as Faculty';
                                \nextpagealert("success", "You have been successfully registered ! Please Log in");
                                return view('registerFaculty', compact('title', 'status'));
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
        $title = 'Register as Faculty';
        return view('registerFaculty', compact('title', 'status', 'errors'));
    }
}
