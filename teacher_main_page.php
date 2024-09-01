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
 	.col-sm-4{
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
			<div class="col-sm-4">
				<h2>About Me</h2>
				<!-- <h5>Photo of me:</h5> -->
				<!-- <div class="fakeimg"> -->
					<!-- Fake Image -->
					<!-- <a href="#"><img src="image/t1.jpg" ></a> -->
				<!-- </div> -->
				<hr>
				<div class="row">
					<div class="col-sm-4">
				<label>Name: </label>
				<label>Email: </label>
				<label>Contact: </label>
				<label>User Type</label>
				<label>Salary</label>
				
			</div>
			<div class="col-sm-8">
				<?php echo $_SESSION['user']['user_name'];?>
				<br>
				<?php echo $_SESSION['user']['user_email'];?>
				<br><br>
				<?php echo $_SESSION['user']['phone_number'];?>
				<br>
				<?php echo $_SESSION['user']['user_type'];?>
				<br>
				 <?php
                      
                      $uid = $_SESSION['user']['user_id'];
                      $sql="SELECT * FROM user_salary WHERE user_id = '$uid'";
                      $in = mysqli_query($conn, $sql);
                      while($row = mysqli_fetch_assoc($in))
                      { 
                      	echo $row['salary'];
                      }
                ?>
			</div>

			</div>

			<hr class="hidden-sm hidden-md hidden-lg">
			</div>
			<div class="col-sm-8">
				<center><h1>Attendance</h1></center>


				<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Sr.no</th>
								<th>Today Attendance </th>
						        <th>Date</th>
						        <th>Attedance Marked</th>
							</tr>
						</thead>
						<?php $sno = 1;
						

						?>

						<tbody>
							<tr>
								<?php echo "<th>".($sno++)."</th>"; ?>
								<td>

								<a name="id" href="teacher_main_page.php?action=Enable&user_id=<?php echo $_SESSION['user']['user_id']; ?>"  class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Present</a>
								

								|| 

								<a href="teacher_main_page.php?action=disable&user_id=<?php echo $_SESSION['user']['user_id'];?>"  class="btn btn-danger" ><span class="glyphicon glyphicon-remove"></span> Absent </a>


								</td>

								<td id="date"></td>
					
					<?php

						$id = $_SESSION['user']['user_id'];

						$sql="SELECT * FROM attendance WHERE user_id='$id' AND date_time = CURRENT_DATE()";
						$info = mysqli_query($conn, $sql); 
						if (mysqli_num_rows($info) > 0)
							{
								$sno = 1;
								//OUTPUT DATA OF EACH ROW
		    	 	    while($row = mysqli_fetch_assoc($info))
		    	 	     {


						?>

								<td><?php echo $row['attendance'];?></td>
						<?php 
			            }
			            	}
					?>

							</tr>
						</tbody>
					
					</table>
				
			   <!--  </div> -->
			</div>
<br><br>

     </div>
</div>

<?php 


if(isset($_GET["action"]))
  {
    if($_GET["action"]== "Enable")
      {
        
           $Uid = $_GET['user_id'];

                         
           

           // INSERT INTO `attendance`(`att_id`, `attendance`, `user_id`, `date_time`) VALUES ([value-1],[value-2],[value-3],[value-4])

           $check_Pid = "SELECT * from attendance where user_id ='$Uid' AND date_time = CURRENT_DATE()";

           $check = mysqli_query($conn, $check_Pid);
           if (mysqli_num_rows($check)>0)
           {
	// UPDATE `attendance` SET `att_id`=[value-1],`attendance`=[value-2],`user_id`=[value-3],`date_time`=[value-4] WHERE 1

           $sql ="UPDATE `attendance` SET `attendance`='Present'
           WHERE `user_id`='$Uid'and `date_time`= CURRENT_DATE()";

           $query = mysqli_query($conn , $sql); 

           echo '<script>alert("Attendance Marked!")</script>';
            echo '<script>window.location="teacher_main_page.php"</script>';
      
            }
            else
            {

            $sql = "INSERT INTO `attendance` ( `attendance`, `user_id`) VALUES ('Present','$Uid')";

            $query = mysqli_query($conn , $sql); 

       
            echo '<script>alert("Attendance Marked!")</script>';
            echo '<script>window.location="teacher_main_page.php"</script>';
          
      }
   
  }
}

// Absent attendance procedure


if(isset($_GET["action"]))
  {
    if($_GET["action"]== "disable")
      {
        
           $Uid = $_GET['user_id'];

                         
          
           $check_Pid = "SELECT * from attendance where user_id ='$Uid' AND date_time = CURRENT_DATE()";

           $check = mysqli_query($conn, $check_Pid);
           if (mysqli_num_rows($check)>0)
           {
	// UPDATE `attendance` SET `att_id`=[value-1],`attendance`=[value-2],`user_id`=[value-3],`date_time`=[value-4] WHERE 1

           $sql ="UPDATE `attendance` SET `attendance`='Absent'
           WHERE `user_id`='$Uid'";

           $query = mysqli_query($conn , $sql); 

           echo '<script>alert("Attendance Marked!")</script>';
            echo '<script>window.location="teacher_main_page.php"</script>';
      
            }
            else
            {

            $sql = "INSERT INTO `attendance` ( `attendance`, `user_id`) VALUES ('Absent','$Uid')";

            $query = mysqli_query($conn , $sql); 

       
            echo '<script>alert("Attendance Marked!")</script>';
            echo '<script>window.location="teacher_main_page.php"</script>';
          
      }
   
      }
    
  }




?>


</body>
</html>


<!-- script for date -->
<script type="text/javascript">
	n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
</script>


