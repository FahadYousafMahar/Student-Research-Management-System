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
        if (isset($_SESSION['username']) && $_SESSION["type"]) {
            header("Location: /dashboard");
        }else{

            $title = 'Home ';
            return view('index', compact('title'));
        }
    }

    // public function search()
    // {
        
    //     if (session_status() !== PHP_SESSION_ACTIVE) {
    //         session_start();
    //     }
        
    //     if (isset($_SESSION['username']) && $_SESSION['type']=='user') {
    //         try {
    //             if (!isset($_GET['username'])) {
    //                 nextpagealert("warning", "I can not find a person without name !");
    //                 header("Location: /timeline");
    //             }else{
    //                 $username = $_GET['username'];
    //             }
    //             $friends = App::get('database')->query( 'user','User', "where id in (select user_one_id from friends where user_two_id = {$_SESSION['id']} and status = 1) or id in (select user_two_id from friends where user_one_id = {$_SESSION['id']} and status = 1)");
    //             $result = App::get('database')->selectOne('user', 'User', 'id', $_SESSION['id']);
    //             $user = $result[0];
    //             $result = App::get('database')->query('user', 'User',"where username like '{$username}%' or username like '%{$username}%'");
    //             $searched = $result;
    //             $title = 'Search Results';
    //             $pageTitle = 'Search Results';
    //             return view('search', compact('title', 'pageTitle', 'searched','user'));
    //         } catch (PDOException $e) {
    //             $e->getMessage();
    //             error_log("DB Error : ".$e->getMessage());
    //         }
    //     } else {
    //         header("Location: /login");
    //     }
    // }

    public function register()
    {
        $title = 'Register';
        return view('register', compact('title'));
    }

 
//     public function registerProcess()
//     {
//         $errors = array();
//         $status = false;
//         $_POST['birthday'] = Carbon::createFromFormat("d/m/Y", $_POST['birthday'])->format('Y-m-d');
//         $validate = GUMP::is_valid($_POST, array(
//    'fname'        => 'required|alpha_space',
//    'lname'        => 'required|alpha_space',
//    'username'        => 'required|alpha_dash',
//    'password'        => 'required|min_len,8',
//    'confirmpassword' => 'required|min_len,8',
//    'email'           => 'required|valid_email',
//    'gender'   =>  'required|alpha',
//    'birthday'             => 'required|date',
//    'city'             => 'required|alpha_space',
//    'country'             => 'required|alpha_space',
//   ));

//         if ($validate === true) {
//             if (isset($_POST['tos'])) {
//                 if ($_POST['password'] == $_POST['confirmpassword']) {
//                     $value['username'] = $_POST['username'];
//                     $value['password'] = sha1(md5($_POST['password']));
//                     $value['email'] = $_POST['email'];
//                     $value['fname'] = $_POST['fname'];
//                     $value['lname'] = $_POST['lname'];
//                     $value['birthday'] = $_POST['birthday'];
//                     $value['gender'] = $_POST['gender'];
//                     $value['country'] = $_POST['country'];
//                     $value['city'] = $_POST['city'];

//                     try {
//                         $usercount = App::get('database')->selectOneCount('user', 'User', 'username', $value['username']);
//                         $emailcount = App::get('database')->selectOneCount('user', 'User', 'email', $value['email']);
//                         if ($usercount['count(*)']>'0' ) {
//                             $status = false;
//                             array_push($errors, "Username or Email aready Exists");

//                         }else if($emailcount['count(*)']>'0'){
//                             $status = false;
//                             array_push($errors, "Email aready Exists");

//                         } else {
//                             try {
//                                 App::get('database')->insert('user', $value);
//                                 $result = App::get('database')->selectOne('user','User','email',$value['email']);
//                                 $about = new \Myweb\Classes\About;
//                                 $about->userid = $result[0]->id;
//                                 $about = get_object_vars($about);
//                                 App::get('database')->insert('about',$about);
//                                 $status = true;
//                                 $title = 'Register';
//                                 \nextpagealert("success","You have been successfully registered !");
//                                 return view('register', compact('title', 'status', 'validate'));
//                             } catch (PDOException $e) {
//                                 $e->getMessage();
//                                 error_log("DB Error : ".$e->getMessage());
//                             }
//                         }
//                     } catch (PDOException $e) {
//                         $e->getMessage();
//                         error_log("DB Error : ".$e->getMessage());
//                     }
//                 } else {
//                     $status = false;
//                     array_push($errors, "Passwords donot match.");
//                 }
//             } else {
//                 $status = false;
//                 array_push($errors, "You have to agree to our Terms & Conditions.");
//             }
//         } else {
//             $status = false;
//         }

//         $title = 'Register';
//         return view('register', compact('title', 'status', 'validate', 'errors'));
//     }

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
                        if (session_status() !== PHP_SESSION_ACTIVE) {
                            session_start();
                        }
                        foreach ($row[0] as $key => $value) {
                            $_SESSION[$key] = $value;
                        }
                        $_SESSION["type"] = $_POST['type'];
                        header('Location: /dashboard');
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

    public function admin()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['username']) && $_SESSION['type']=='admin') {
            header('Location: /adminpanel');
        } else {
            $title  = 'Login as Admin';
            return view('adminlogin', compact('title'));
        }
    }

    public function adminlogin()
    {
        $errors = array();
        $status = false;
        try {
            $row = App::get('database')->selectOne('staff', 'Staff', 'username', $_POST['username']);
            if (isset($row[0])) {
                if ($_POST['username'] == $row[0]->username && sha1(md5($_POST['password'])) == $row[0]->password) {
                    if (session_status() !== PHP_SESSION_ACTIVE) {
                        session_start();
                    }
                    $_SESSION["username"] = $row[0]->username;
                    $_SESSION["id"] = $row[0]->id;
                    $_SESSION["type"] = "admin";
                    header('Location: /adminpanel');
                } else {
                    $status = false;
                    array_push($errors, "Username or Password do not match.");
                }
            } else {
                array_push($errors, "Username or Password do not match.");
            }
        } catch (PDOException $e) {
            $e->getMessage();
            error_log("DB Error : ".$e->getMessage());
        }
        $title  = 'Admin Login';
        return view('adminlogin', compact('title', 'status', 'errors'));
    }

    public function adminpanel()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['username']) && $_SESSION['type']=='admin') {
            if (isset($_GET['notpublished'])) {
                $ids=implode(',', $_GET['notpublished']);
                try {
                    App::get('database')->customquery("update product set published='true' where id in ({$ids})");
                    $status="published";
                } catch (PDOException $e) {
                    $e->getMessage();
                    error_log("DB Error : ".$e->getMessage());
                }
            }
            try {
                $products = App::get('database')->selectAll('product', 'Product');
            } catch (PDOException $e) {
                $e->getMessage();
                error_log("DB Error : ".$e->getMessage());
            }
            try {
                $user = App::get('database')->selectOne('customer', 'Customer', 'username', $_SESSION['username']);
                if (isset($user)&& !empty($user)) {
                    $user=$user[0];
                }
            } catch (PDOException $e) {
                $e->getMessage();
                error_log("DB Error : ".$e->getMessage());
            }
   
   
            $title  = 'Admin Panel';
            if (isset($status)) {
                return view('adminpanel', compact('title', 'user', 'status', 'products'));
            } else {
                return view('adminpanel', compact('title', 'user', 'products'));
            }
        } else {
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
    public function timeline($username = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (!isset($username) || empty(trim($username))) {
            $username = $_SESSION['username'];
        }
        if (isset($_SESSION['username']) && $_SESSION["type"]=="user") {
            $allowed=false;
            if($username!=$_SESSION['username']){
                $result = App::get('database')->query('user', 'User',
                "where id in 
                   (select user_one_id from friends where user_two_id = {$_SESSION['id']} and status = 1)
                 or id in 
                   (select user_two_id from friends where user_one_id = {$_SESSION['id']} and status = 1)");
                foreach ($result as $key => $value) {
                    if($username==$value->username){
                        $allowed=true;
                    }
                }
            }
            if($allowed || ($username == $_SESSION['username'])){
                try {
                    $result = App::get('database')->query('user', 'User',"where id in (select user_one_id from friends where user_two_id = {$_SESSION['id']} and status = 1) or id in (select user_two_id from friends where user_one_id = {$_SESSION['id']} and status = 1)");
                    $result = App::get('database')->selectOne('user', 'User', 'username', $username);
                    $user =  $result[0];
                    $posts = App::get('database')->query('posts', 'Post', "where userid={$user->id}");
                    $title = $user->fname . " " . $user->lname . " :: TimeLine";
                    $pageTitle = 'Timeline';
                    return view('timeline', compact('title', 'user','posts','pageTitle'));
                } catch (PDOException $e) {
                    $e->getMessage();
                    error_log("DB Error : ".$e->getMessage());
                }
            }else{
                nextpagealert("error","You are not friends with that user !");
                header('Location: /timeline');
            }
            
        } else {
            nextpagealert("error","Please Log in !");
            header('Location: /login');
        }
    }

 
    public function customersellProcess()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['username']) && $_SESSION["type"]=="user") {
            $errors = array();
            $status = false;
            $validate = GUMP::is_valid($_POST, array(
            'title'        => 'required',
            'price'        => 'required|numeric',
            'category'      => 'required',
            'availability'   => 'required',
            'description'    => 'required',
            'address'        => 'required'
            ));

            if ($validate === true) {
                if (!isset($_FILES['pic'])) {
                    $status = false;
                    array_push($errors, "Make sure that you have uploaded picture.");
                } else {
                    $filehandle = new upload($_FILES['pic']);
                    $filehandle->file_safe_name = true;
                    $filehandle->allowed = array('image/*');
                    $filehandle->mime_check = true;
                    if ($filehandle->uploaded) {
                        $filehandle->file_new_name_body = md5(sha1($filehandle->file_src_name_body.rand(10, 9999999).time()));
                        $filehandle->process(getcwd().'/App/Data/images/vendors/');
                        $filehandle->image_resize         = true;
                        $filehandle->image_x              = 200;
                        $filehandle->image_y              = 200;
                        if ($filehandle->processed) {
                            $value['sellerid'] = $_SESSION['id'];
                            $value['title'] = $_POST['title'] ;
                            $value['price'] = $_POST['price'] ;
                            $value['category'] = $_POST['category'] ;
                            $value['description'] = $_POST['description'] ;
                            $value['availability'] = $_POST['availability'] ;
                            $value['picture'] = $filehandle->file_dst_name ;
                            $value['demand'] = '0';
                            $value['rating'] = '0';
                            $value['published'] = 'false';
                            $value['address'] = $_POST['address'];
                            try {
                                App::get('database')->insert('product', $value);
                                $status = true;
                                $title  = 'Sell A Product';
                                return view('sellproduct', compact('title', 'status', 'validate', 'errors'));
                            } catch (PDOException $e) {
                                $e->getMessage();
                                error_log("DB Error : ".$e->getMessage());
                            }
                        } else {
                            error_log("File Error : ".$filehandle->error);
                        }
                    } else {
                        $status = false;
                        array_push($errors, "Please upload the picture.");
                    }
                }
            } else {
                $status = false;
            }

            $title  = 'Sell a Product';
            return view('sellproduct', compact('title', 'status', 'validate', 'errors'));
        } else {
            header('Location: /login');
        }
    }

    public function customersell()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['username']) && $_SESSION["type"]=="user") {
            try {
                $category = App::get('database')->selectAll('category', 'Category');
            } catch (PDOException $e) {
                $e->getMessage();
                error_log("DB Error : ".$e->getMessage());
            }
            $title  = 'Sell a Product';
            return view('sellproduct', compact('title', 'category'));
        } else {
            header('Location: /login');
        }
    }

    // public function buy()
    // {
    //     if (session_status() !== PHP_SESSION_ACTIVE) {
    //         session_start();
    //     }
    //     if (isset($_SESSION['username']) && $_SESSION["type"]=="user") {
    //         try {
    //             $user = App::get('database')->selectOne('customer', 'Customer', 'username', $_SESSION['username']);
    //             if (isset($user)&& !empty($user)) {
    //                 $user=$user[0];
    //             }
    //         } catch (PDOException $e) {
    //             $e->getMessage();
    //             error_log("DB Error : ".$e->getMessage());
    //         }
    //         try {
    //             $order = App::get('database')->query('ordertable', 'OrderTable', " where orderproductsid = {$_GET['id']} and customerid={$_SESSION['id']}");
    //             if (isset($order)&& !empty($order)) {
    //                 foreach ($order as $o) {
    //                     if ($o->status == 'unpaid') {
    //                         $status = "Order Bought Successfully.";
    //                         App::get('database')->customquery("update ordertable set status='paid' where orderproductsid='{$o->id}' and customerid={$o->customerid}");
    //                     }
    //                 }
    //             } else {
    //                 $value['customerid'] = $_SESSION['id'] ;
    //                 $value['status'] = 'paid' ;
    //                 $value['orderproductsid'] = $_GET['id']  ;
    //                 $value['quantity'] = 1 ;
    //                 App::get('database')->insert('ordertable', $value);
    //                 $status = "Order Added To Bought List Successfully.";
    //             }
    //         } catch (PDOException $e) {
    //             $e->getMessage();
    //             error_log("DB Error : ".$e->getMessage());
    //         }
        
    //         $title  = 'Customer Panel';
    //         return view('customerpanel', compact('title', 'status', 'user'));
    //     } else {
    //         header('Location: /login');
    //     }
    // }


    // public function wish()
    // {
    //     if (session_status() !== PHP_SESSION_ACTIVE) {
    //         session_start();
    //     }
    //     if (isset($_SESSION['username']) && $_SESSION["type"]=="user") {
    //         try {
    //             $user = App::get('database')->selectOne('customer', 'Customer', 'username', $_SESSION['username']);
    //             if (isset($user)&& !empty($user)) {
    //                 $user=$user[0];
    //             }
    //         } catch (PDOException $e) {
    //             $e->getMessage();
    //             error_log("DB Error : ".$e->getMessage());
    //         }
    //         $value['customerid'] = $_SESSION['id'] ;
    //         $value['status'] = 'unpaid' ;
    //         $value['orderproductsid'] = $_GET['id']  ;
    //         $value['quantity'] = 1 ;
    //         App::get('database')->insert('ordertable', $value);
    //         $status = "Order Added To Wish List Successfully.";
    //         $title  = 'Customer Panel';
    //         return view('customerpanel', compact('title', 'status', 'user'));
    //     } else {
    //         header('Location: /login');
    //     }
    // }

    public function login()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['username'])) {
            header('Location: /timeline');
        } else {
            $title  = 'Login';
            return view('login', compact('title'));
        }
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

 
    // public function privacy(){
 //     $title = 'Privacy Policy - ';
 //     return view('privacypolicy',compact('title'));
 // }

 // public function tos(){
 //     $title = 'Terms Of Service - ';
 //     return view('tos',compact('title'));
 // }

 // public function sitemap(){
 //     return view('sitemap');
 // }

 // public function usagepolicy(){
 //     $title = 'Acceptable Usage Policy - ';
 //     return view('acceptableusage',compact('title'));
 // }

 // public function contact(){
 //   $title = 'Contact Us - ';
 //   return view('contact',compact('title'));
 // }

 // public function contactmessage(){
 //     $title = 'Contact Us - ';
 //     $name = $_POST['name'];
 //     $email = $_POST['email'];
 //     $subject = $_POST['subject'];
 //     $message = $_POST['message'];
 //     $whmcsUrl = 'https://webit.pk/billing/';
 //     $username = 'admin@webit.pk';
 //     $password = '64cdf752a2bd4eb122ebe3434ef0f3f1';
 //     // Set post values
 //     $postfields = array(
 //         'username' => $username,
 //         'password' => $password,
 //         'accesskey' => 'webit@admin@api@3267',
 //         'action' => 'OpenTicket',
 //         'deptid' => '1',
 //         'name'    => $name,
 //         'email'   => $email,
 //         'subject' => $subject,
 //         'message' => $message,
 //         'responsetype' => 'json',
 //     );
 //     // Call the API
 //     $ch = curl_init();
 //     curl_setopt($ch, CURLOPT_URL, $whmcsUrl . 'includes/api.php');
 //     curl_setopt($ch, CURLOPT_POST, 1);
 //     curl_setopt($ch, CURLOPT_TIMEOUT, 30);
 //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
 //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
 //     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postfields));
 //     $response = curl_exec($ch);
 //     if (curl_error($ch)){
 //         die('Unable to connect: ' . curl_errno($ch) . ' - ' . curl_error($ch));
 //     }
 //     curl_close($ch);
 //     $jsonData = json_decode($response);
 //     //
 //     return view('contact',compact('title','jsonData'));

 // }

 // public function about(){
 //   $title = 'About Us - ';
 //   return view('about',compact('title'));
 // }

 // public function domains(){
 //   $title = 'Register Domains - ';
 //   $prices = getPrices();
 //   return view('domains',compact('title','prices'));
 // }

 // public function searchDomain(){
 //    $prices = getPrices();
 //    $data = array();
 //    $title="Register Domains - ";
 //    $extract = new Extract();
 //    $domain = $_POST["domain"];
 //    if(!empty($_POST["domain"])){
 //    if(strpos($_POST["domain"],".")==0)
 //   {
 //      $domain = trim($_POST['domain']).$_POST['tld'];
 //   }
 //   elseif(strpos($_POST["domain"],".")!=0)
 //   {
 //       $suf= substr($_POST["domain"],strpos($_POST["domain"],".")+1);

 //           if( array_key_exists( str_replace('.','',$suf), App::get('config')['prices']['domains']))
 //           {
 //               $domain = $_POST['domain'];
 //           }else{
 //               $domain = substr($_POST["domain"],0,strpos($_POST["domain"],".")).$_POST["tld"];
 //           }
 //   }
 //   $result = $extract->parse($domain);
 //   $domain = $result->getRegistrableDomain();
 //   $whmcsUrl = 'https://webit.pk/billing/';
 //   $username = 'admin@webit.pk';
 //   $password = '64cdf752a2bd4eb122ebe3434ef0f3f1';
 //   // Set post values
 //   $postfields = array(
 //       'username' => $username,
 //       'password' => $password,
 //       'accesskey' => 'webit@admin@api@3267',
 //       'action' => 'DomainWhois',
 //       'domain' => $domain,
 //       'responsetype' => 'json',
 //   );
 //   // Call the API
 //   $ch = curl_init();
 //   curl_setopt($ch, CURLOPT_URL, $whmcsUrl . 'includes/api.php');
 //   curl_setopt($ch, CURLOPT_POST, 1);
 //   curl_setopt($ch, CURLOPT_TIMEOUT, 30);
 //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 //   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
 //   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
 //   curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postfields));
 //   $response = curl_exec($ch);
 //   if (curl_error($ch)) {
 //       die('Unable to connect: ' . curl_errno($ch) . ' - ' . curl_error($ch));
 //   }
 //   curl_close($ch);
 //   $jsonData = json_decode($response);
 //   if($jsonData->result == 'success'){
 //     if($jsonData->status == 'available'){
 //       $status="available";
 //     }else if($jsonData->status=='unavailable'){
 //       $status="unavailable";
 //       $whois = $jsonData->whois;
 //     }
 //   }else{
 //     $status="error";
 //   }
 // }else{
 //   $status="empty";
 // }
 //   $data['status']=$status;
 //   $data['domain']=$domain;
 //   if(isset($whois)){
 //     $data['whois']=$whois;
 //  }
 //  return view('domains',compact('title','data','prices'));
 // }
 public function phpinfo(){
    phpinfo();
 }
}
