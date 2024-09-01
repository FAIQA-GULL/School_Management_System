<?php
include('conn.php');
include('function.php');
include('navbar_teacher.php');
// include('footer.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<title>Main Page</title>
	
  <!-- google fonts -->
    <!-- for labels -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,600;1,800;1,900&display=swap" rel="stylesheet">

   <!--  for heading -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ma+Shan+Zheng&display=swap" rel="stylesheet">

</head>

<style type="text/css">

 	.form-control{
 		width: 50%;
 	}
 h1,h3,p,thead,label{
 		font-family: 'Fraunces', serif;
    color: white;
 	}

 	.row{
    border-top-left-radius: 63px;
  border-bottom-right-radius: 63px;
  background-image: linear-gradient(27deg, #013A6B 50%,#004E95 50%);
  }
</style>
<body>
<!-- <div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Successful and unsuccessful people </h1><h1>do not vary greatly in their abilities </h1>
 
</div> -->

<!-- <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="teacher_main_page.php">Home</a></li>
        <li><a href="Profile.php">User Information</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav> -->

<br><br>


<div class="container">
    <div class="row">
      <!-- <div class="col-sm-4">
        

      <hr class="hidden-sm hidden-md hidden-lg">
      </div> -->

      <div class="col-sm-11">
        <center><h1>Courses Assigned</h1></center>


        <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
               
                <th>Employee ID</th>
                <th>Name</th>
                <th>Section Name</th>
                <th>Courses Assigned </th>
                <th>Class NAME</th>
               
              </tr>
            </thead>
            <?php 
            $id=$_SESSION['user']['user_id'];
            
            $sql=" SELECT * FROM course JOIN user_info 
            ON course.user_id=user_info.user_id 
            JOIN section
            ON user_info.section_id = section.section_id 
            where course.user_id ='$id'";
            
            $info = mysqli_query($conn, $sql); 
            if (mysqli_num_rows($info) > 0)
              {
                $sno = 1;
                //OUTPUT DATA OF EACH ROW
                while($row = mysqli_fetch_assoc($info))
                 {


            ?>
            
            <tbody>
              <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $row['user_name'];?></td>
                <td><?php echo $row['section_name'];?></td>
                <td><?php echo $row['cou_name'];?></td>
                <td><?php echo $row['class_id'];?></td>
              </tr>
            </tbody>
          <?php }}?>
          </table>
        </div>
      </div>
    </div>
  </body>
  </html>