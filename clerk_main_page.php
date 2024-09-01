<?php
include('conn.php');
include('function.php');
include('navbar_home.php');
// include('footer.php');
?>
<!DOCTYPE html>
<html>
<head>
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
	.fakeimg {
    height: 200px;
    /*background: #aaa;*/
  }
  .fakeimg img {
    height: 200px;
    /*background: #aaa;*/
  }
	
	/*.jumbotron{
 		background-image: url('image/books.jpg');

 	}
 	
 	.jumbotron h1{
 		font-size: 2.5rem;
 		color: white;
 		font-family: 'Fraunces', serif;
 	}*/

 	.form-control{
 		width: 50%;
 	}
 	h1,h3,p,thead,label{
 		font-family: 'Fraunces', serif;
 		color: white
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

</div>
 -->
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
        <li class="active"><a href="#">Home</a></li>
        <li><a href="check_teacher_info.php">teacher information</a></li>
        <li><a href="check_principal_info.php">PRINCIPAL INFO</a></li>
        <li><a href="check_student_detail.php">student detail</a></li>
        <li><a href="check_subject_detail.php">subject detail</a></li>
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
					<!-- <a href="#"><img src="image/t5.jpg" ></a> -->
				<!-- </div> -->
				<hr>
				<div class="row">
					<div class="col-sm-4">
				<label>Name: </label>
				
				<br>
				<label>Email: </label>
				
				<br>
				<label>Contact: </label>
				
				<br>
				<label>User Type</label>
				
			</div>
			<div class="col-sm-8">
				<?php echo $_SESSION['user']['user_name'];?>
				<br>
				<?php echo $_SESSION['user']['user_email'];?>
				<br>
				<?php echo $_SESSION['user']['phone_number'];?>
				<br>
				<?php echo $_SESSION['user']['user_type'];?>
			</div>

			</div>

				<!-- <p>Some text about me in culpa qui officia deserunt mollit anim..</p> -->
				<!-- <h3>Some Links</h3>
				<p>Lorem ipsum dolor sit ame.</p>
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="#">Link 1</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
				</ul> -->
				<hr class="hidden-sm hidden-md hidden-lg">
			</div>
			<div class="col-sm-8">
				<center><h1>Attendance</h1></center>
				<!-- <div class="col-sm-4 col-lg-3 col-md-3">
					<img src="image/t5.jpg" style="width:100%; box-shadow: 1px 1px 5px 4px; " class="img-responsive">
				</div> -->
				<!-- <div class="col-8"> -->
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

								<a name="id" href="clerk_main_page.php?action=Enable&user_id=<?php echo $_SESSION['user']['user_id']; ?>"  class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Present</a>
								

								|| 

								<a href="clerk_main_page.php?action=disable&user_id=<?php echo $_SESSION['user']['user_id'];?>"  class="btn btn-danger" ><span class="glyphicon glyphicon-remove"></span> Absent </a>


								</td>

								<td id="date"></td>
					
					<?php

						$id = $_SESSION['user']['user_id'];

						$sql="SELECT * FROM attendance WHERE user_id='$id'";
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

           $check_Pid = "SELECT * from attendance where user_id ='$Uid'";

           $check = mysqli_query($conn, $check_Pid);
           if (mysqli_num_rows($check)>0)
           {
	// UPDATE `attendance` SET `att_id`=[value-1],`attendance`=[value-2],`user_id`=[value-3],`date_time`=[value-4] WHERE 1

           $sql ="UPDATE `attendance` SET `attendance`='Present'
           WHERE `user_id`='$Uid' and `date_time`= CURRENT_DATE()";

           $query = mysqli_query($conn , $sql); 

           echo '<script>alert("Attendance Marked!")</script>';
            echo '<script>window.location="clerk_main_page.php"</script>';
      
            }
            else
            {

            $sql = "INSERT INTO `attendance` ( `attendance`, `user_id`) VALUES ('Present','$Uid')";

            $query = mysqli_query($conn , $sql); 

       
            echo '<script>alert("Attendance Marked!")</script>';
            echo '<script>window.location="clerk_main_page.php"</script>';
          
      }
   
  }
}

// Absent attendance procedure


if(isset($_GET["action"]))
  {
    if($_GET["action"]== "disable")
      {
        
           $Uid = $_GET['user_id'];

                         
          
           $check_Pid = "SELECT * from attendance where user_id ='$Uid'";

           $check = mysqli_query($conn, $check_Pid);
           if (mysqli_num_rows($check)>0)
           {
	// UPDATE `attendance` SET `att_id`=[value-1],`attendance`=[value-2],`user_id`=[value-3],`date_time`=[value-4] WHERE 1

           $sql ="UPDATE `attendance` SET `attendance`='Absent'
           WHERE `user_id`='$Uid'";

           $query = mysqli_query($conn , $sql); 

           echo '<script>alert("Attendance Marked!")</script>';
            echo '<script>window.location="clerk_main_page.php"</script>';
      
            }
            else
            {

            $sql = "INSERT INTO `attendance` ( `attendance`, `user_id`) VALUES ('Absent','$Uid')";

            $query = mysqli_query($conn , $sql); 

       
            echo '<script>alert("Attendance Marked!")</script>';
            echo '<script>window.location="clerk_main_page.php"</script>';
          
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