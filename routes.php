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
     $routes ->get('Student'   , 'StudentController@Student');
     $routes ->get('addPaper'   , 'StudentController@addpaper');
     $routes ->get('viewpapers'   , 'StudentController@viewpapers');
     $routes ->get('viewPaper'   , 'StudentController@viewpaper');
     $routes ->get('editPaper'   , 'StudentController@editPaper');
    $routes ->get('registerstudent'   , 'StudentController@registerstudent');
    
    $routes ->post('editPaper'   , 'StudentController@editpaperprocess');
    $routes ->post('registerstudent'   , 'StudentController@registerstudentProcess');
    $routes ->post('addPaper'   , 'StudentController@addpaperprocess');

// FacultyController
    $routes ->get('Faculty'   , 'FacultyController@Faculty');
    $routes ->get('viewapaper'   , 'FacultyController@viewapaper');
    $routes ->get('viewallpapers'   , 'FacultyController@viewallpapers');
    $routes ->get('viewallstudents'   , 'FacultyController@viewallstudents');
    $routes ->get('deletePaper'   , 'FacultyController@deletePaper');
    $routes ->get('editapaper'   , 'FacultyController@editaPaper');
    $routes ->get('registerfaculty'   , 'FacultyController@registerfaculty');
    $routes ->get('supervisestudent'   , 'FacultyController@supervise');
    $routes ->get('unsupervisestudent'   , 'FacultyController@unsupervise');

    $routes ->post('editapaper'   , 'FacultyController@editapaperprocess');
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

//
$routes ->get('phpinfo','PagesController@phpinfo');
