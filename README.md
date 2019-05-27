# Student-Research-Management-System
A Student Research Paper Management System which can be used to collaborate between students and faculty members and manage research papers.

Faculty Members can supervise a student and his research paper.
## Prerequisites

[PHP >= 7.2](https://php.net) - The language which powers web

[MySql](http://www.mysql.com) - DBMS

## Installation
```
1 - IMPORT research.sql
2 - Change /config.php accordingly.
3 - It is strongly advised that you add a Virtual Host to this project. 

For Demo

admin : user = admin@admin.com
	pass = admin@admin.com

faculty: user = atif.khattak@nu.edu.pk
	pass = atif.khattak@nu.edu.pk

student: user = safi@safi.com
	pass = safi@safi.com

```

##  Project Directory Structure
```
+
├───App // Everything related to current application
│   ├─── Class // Holds all class definitions to fetch data as objects from database
│   ├─── Controllers // Contains controllers for all route operations and methods
│   ├─── Data // contains User's images
│   └─── Views // Contains Views for current application 
│       ├─── css
│       ├─── fonts
│       ├─── img
│       ├─── js
│       ├─── partials // Contains all repeated building blocks like head and foot etc.
├─── Core // Contains Framework's core classes like Database and Router definitions etc.
├─── Docs // Contains documentation
└─── vendor // Contains libraries included through Composer
```


## Screenshots
##### Login
![Login](/Docs/signin.png?raw=true "Login")
##### Register
![Timeline](/Docs/register.png?raw=true "Timeline")
### Admin
##### Admin Dashboard
![Admin Dashboard](/Docs/admindashboard.png?raw=true "Admin Dashboard")
##### Admin View Students
![Admin View Students](/Docs/adminviewstudents.png?raw=true "Admin View Students")
##### Admin Edit Students
![Admin Edit Students](/Docs/admineditstudent.png?raw=true "Admin Edit Students")
##### Admin View Faculty
![Admin View Faculty](/Docs/adminviewfaculty.png?raw=true "Admin View Faculty")
##### Admin Edit Faculty
![Admin Edit Faculty](/Docs/admineditfaculty.png?raw=true "Admin Edit Faculty")

### Faculty
##### Faculty Dashboard
![Faculty Dashboard](/Docs/facultydashboard.png?raw=true "Faculty Dashboard")
##### Faculty Supevise Student
![Faculty Supevise Student](/Docs/facultysupervisepaper.png?raw=true "Faculty Supevise Student")
##### Faculty View Paper
![Faculty View Paper](/Docs/facultyviewpaper.png?raw=true "Faculty View Paper")

### Student
##### Student Dashboard
![Student Dashboard](/Docs/studentdashboard.png?raw=true "Student Dashboard")
##### Student View Paper
![Student View Paper](/Docs/studentviewpaper.png?raw=true "Student View Paper")
## Authors

 [![Fahad Yousaf Mahar](https://avatars2.githubusercontent.com/u/20330772?s=60)](https://github.com/fahadyousafmahar)


## Acknowledgments

* [ Visual Studio Code](https://github.com/microsoft/vscode)
* [ PHP Extensions](https://github.com/felixfbecker/vscode-php-pack)
