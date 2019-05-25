<?php

//  PagesController
    $routes ->get('','PagesController@home');
    $routes ->get('home'    , 'PagesController@home');
    $routes ->get('login'   , 'PagesController@login');
    $routes ->get('logout'   , 'PagesController@logout');
    $routes ->get('dashboard'   , 'PagesController@dashboard');
    $routes ->get('404'   , 'PagesController@pagenotfound');
    // $routes ->get('search'    , 'PagesController@search');
    // $routes ->get('timeline'    , 'PagesController@timeline');
    // $routes ->get('wish'    , 'PagesController@wish');

    $routes ->post('login'   , 'PagesController@loginProcess');
    // $routes ->post('register'   , 'PagesController@registerProcess');

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

    $routes ->post('registerfaculty'   , 'AdminController@registerfacultyProcess');


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
