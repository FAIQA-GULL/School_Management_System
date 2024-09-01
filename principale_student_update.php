<?php
include('conn.php');
include('function.php');
include('principale_navbar_home.php');

if (isset($_POST['update'])) {

 $std_id = $conn->real_escape_string($_POST['std_id']);
 
 $attendance =$conn->real_escape_string($_POST['attendance']);

//INSERT INTO `student_attendance`(`sta_id`, `sta_attendance`, `student_id`, `class_id`, `section_id`, `cdate`) VALUES 

 $query="UPDATE `student_attendance` SET `sta_attendance`='$attendance' WHERE `student_id` = '$std_id' AND cdate = CURRENT_DATE()";
 $result=mysqli_query($conn,$query);

 echo '<script>alert("Attendace Updated !")</script>';
 echo '<script>window.location="principale_student_attendance.php"</script>';
}
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
 h1,h2,h3,p,thead,label{
 		font-family: 'Fraunces', serif;
    color: white;
 	}
 	
 	.row{
    border-top-left-radius: 63px;
  border-bottom-right-radius: 63px;
  background-image: linear-gradient(27deg, #013A6B 50%,#004E95 50%);
  }
  #row1{
    border-top-left-radius: 63px;
  border-bottom-right-radius: 63px;
  padding: 10px;
  /*background-image: linear-gradient(27deg, #013A6B 50%,#004E95 50%);*/
  }
</style>
<body>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<center>
					<form action="principale_student_update.php" method="post">
			<?php 

		 $std_id = $_GET['std_id'];
         $sta_attendance = $_GET['sta_attendance'];
         $class_name = $_GET['class_name'];

			?>

			<label>Student ID</label>
			<input type="text" name="std_id" class="form-control" value="<?php echo $std_id;?>" readonly>
			<br><br>
			<label>Student Attendance</label>
			<input type="text" name="" class="form-control" value="Student is  ' <?php echo $sta_attendance;?> '" readonly>
			<br><br>
			<select class="form-control" name="attendance">
				<option>Update Attandence</option>
				<option value="Present">Present</option>
				<option value="Absent">Absent</option>
			</select>
			<br><br>
			<label>Class Name</label>
			<input type="text" name="" class="form-control" value="<?php echo $class_name; ?>" readonly>

		</center>

		</div>
		<br>
		<hr><br>
		<center><input type="Submit" class="btn btn-success" name="update" value="Update"></center>
	</form>
		<hr>
		</div>
	</div>


</body>
</html>