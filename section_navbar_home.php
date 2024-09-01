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
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="section_head_main_page.php">Home</a></li>
      <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
        </ul>
      </li> -->
      <li><a href="primary_teaher.php">Courses Assigned</a></li>
       <!-- <li><a href="#">Subjects Assigned</a></li> -->
       <li><a href="primary_student_attendance.php">Attendance of students</a></li>
       <li><a href="primary_teacher_attendance.php">Attendance of teachers</a></li>
       <li><a href="primary_student_result.php">Results of students</a></li>
      
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
