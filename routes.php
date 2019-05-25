<?php

//  PagesController
    $routes ->get('','PagesController@home');
    $routes ->get('home'    , 'PagesController@home');
    $routes ->get('login'   , 'PagesController@login');
    $routes ->get('logout'   , 'PagesController@logout');
    $routes ->get('dashboard'   , 'PagesController@dashboard');
    $routes ->get('myprofile'   , 'PagesController@myprofile');
    $routes ->get('404'   , 'PagesController@pagenotfound');
   
    $routes ->post('login'   , 'PagesController@loginProcess');

 // StudentController
    $routes ->get('registerstudent'   , 'StudentController@registerstudent');
    $routes ->post('registerstudent'   , 'StudentController@registerstudentProcess');

// FacultyController
    $routes ->get('registerfaculty'   , 'FacultyController@registerfaculty');
    $routes ->post('registerfaculty'   , 'FacultyController@registerfacultyProcess');
   
// AdminController
    $routes ->get('Admin'   , 'AdminController@Admin');

    $routes ->get('viewfaculty'   , 'AdminController@viewfaculty');
    $routes ->get('viewstudents'   , 'AdminController@viewstudents');
    $routes ->get('viewadmins'   , 'AdminController@viewadmins');

    $routes ->get('editFaculty'   , 'AdminController@editfaculty');
    $routes ->get('editStudent'   , 'AdminController@editstudent');
    $routes ->get('editAdmin'   , 'AdminController@editadmin');

    $routes ->get('deleteFaculty'   , 'AdminController@deletefaculty');
    $routes ->get('deleteStudent'   , 'AdminController@deletestudent');
    $routes ->get('deleteAdmin'   , 'AdminController@deleteadmin');

    $routes ->get('addFaculty'   , 'AdminController@addfaculty');
    $routes ->get('addStudent'   , 'AdminController@addstudent');
    $routes ->get('addAdmin'   , 'AdminController@addadmin');

    $routes ->post('editStudent'   , 'AdminController@editstudentprocess');
    $routes ->post('editAdmin'   , 'AdminController@editadminprocess');
    $routes ->post('editFaculty'   , 'AdminController@editfacultyprocess');
    
    $routes ->post('addStudent'   , 'AdminController@addstudentprocess');
    $routes ->post('addAdmin'   , 'AdminController@addadminprocess');
    $routes ->post('addFaculty'   , 'AdminController@addfacultyprocess');


    // $routes ->get('admin'    , 'PagesController@admin');
    // $routes ->get('adminpanel'    , 'PagesController@adminpanel');

    // $routes ->post('contact' , 'PagesController@contactmessage');

    // $routes ->post('registerVendor'   , 'PagesController@registerVendorProcess');

    // $routes ->post('loginVendor'   , 'PagesController@loginVendorProcess');

    // $routes ->post('sellproduct'   , 'PagesController@customersellProcess');
    // $routes ->post('addcategory'    , 'PagesController@category');
    // $routes ->post('admin'    , 'PagesController@adminlogin');
   
    //ProfileController
    $routes ->get('about'   , 'ProfileController@about');
    $routes ->get('setting'   , 'ProfileController@youraccount');
    $routes ->get('changepassword'   , 'ProfileController@changepasswordform');
    $routes ->get('friends'   , 'ProfileController@friends');
    $routes ->get('birthdays'   , 'ProfileController@friendbirthday');
    $routes ->get('messages'   , 'ProfileController@messages');

    $routes ->post('setting'    , 'ProfileController@settingProcess');



    //OperationController
    $routes ->get('searchapi' , 'OperationController@searchapi');

    $routes ->post('addcomment' , 'OperationController@addcomment');
    $routes ->post('addmessage' , 'OperationController@addmessage');
    $routes ->post('changepassword'   , 'OperationController@changepassword');
    $routes ->post('returnheaderimage' , 'OperationController@returnheaderimage');
    $routes ->post('setheaderimage' , 'OperationController@setheaderimage');
    $routes ->post('returnprofileimage' , 'OperationController@returnprofileimage');
    $routes ->post('setprofileimage' , 'OperationController@setprofileimage');


//
$routes ->get('phpinfo','PagesController@phpinfo');
