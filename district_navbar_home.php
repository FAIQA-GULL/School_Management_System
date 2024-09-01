<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  a{
    font-size: 1.0rem;
  }
</style>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="district_officer_main_page.php">Home</a></li>
      
      <li class="dropdown"><a href="district_teacher_attendance.php">Teacher Info </a>
        
      </li>

      <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Student <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="distirct_students_attendace.php">Student Info</a></li>
          <li><a href="principale_student_attendance.php">Attendance</a></li>
          <li><a href="principale_student_result.php">Results</a></li>
        </ul>
      </li> -->
      <li><a href="district_search_students_attendance.php">Student Attendance</a></li>
      <li><a href="district_search_students_results.php">Student Results</a></li>
      <li><a href="district_schools_name.php">Schools</a></li>
       <!-- <li><a href="district_subject.php">Subjects</a></li> -->
      <!--  <li><a href="principale_class_subjects.php">Subjects of each class</a></li> -->
       <!-- <li><a href="principale_teacher_attendance.php">Attendance of teachers</a></li> -->
       <!-- <li><a href="principale_student_result.php">Results of students</a></li> -->
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
     
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  
  <h3>Right Aligned Navbar</h3>
  <h3>The .navbar-right class is used to right-align navigation bar buttons.</h3>
</div>

</body>
</html>
