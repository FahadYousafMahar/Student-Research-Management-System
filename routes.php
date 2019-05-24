<?php

//  PagesController
    $routes ->get('','PagesController@home');
    $routes ->get('home'    , 'PagesController@home');
    $routes ->get('login'   , 'PagesController@login');
    $routes ->get('logout'   , 'PagesController@logout');
    $routes ->get('register'   , 'PagesController@register');
    $routes ->get('404'   , 'PagesController@pagenotfound');
    $routes ->get('search'    , 'PagesController@search');
    $routes ->get('timeline'    , 'PagesController@timeline');
    $routes ->get('wish'    , 'PagesController@wish');

    $routes ->post('login'   , 'PagesController@loginProcess');
    $routes ->post('register'   , 'PagesController@registerProcess');

   
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
