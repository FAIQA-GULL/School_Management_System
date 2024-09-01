<?php
include('conn.php');
include('function.php');
include('principale_navbar_home.php');

if (isset($_POST['update'])) {

 $user_id = $conn->real_escape_string($_POST['user_id']);
 $user_name = $conn->real_escape_string($_POST['user_name']);
 $NIC = $conn->real_escape_string($_POST['NIC']);
 $attendance =$conn->real_escape_string($_POST['attendance']);
 $date =$conn->real_escape_string($_POST['date']);

//UPDATE attendance ,user_info SET attendance.attendance='$attendance', user_info.user_name='$pname',user_info.NIC='$NIC' WHERE user_info.user_id='$id' AND attendance.user_id = '$id' AND attendance.date_time=CURRENT_DATE() 

 $query="UPDATE attendance ,user_info SET attendance.attendance='$attendance', user_info.user_name='$user_name',user_info.NIC='$NIC' WHERE user_info.user_id='$user_id' AND attendance.user_id = '$user_id' AND attendance.date_time='$date'";
 // print_r($query);
 $result=mysqli_query($conn,$query);

 echo '<script>alert("Attendace Updated !")</script>';
 echo '<script>window.location="principale_teacher_attendance.php"</script>';
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
					<form action="principale_teacher_update.php" method="post">
			<?php 

		 $user_id = $_GET['user_id'];
         $user_name = $_GET['user_name'];
         $NIC = $_GET['NIC'];
         $attendance = $_GET['attendance'];
         $date = $_GET['date'];

			?>

			<label>User ID</label>
			<input type="text" name="user_id" class="form-control" value="<?php echo $user_id;?>" >
			<br><br>
			<label>User Name</label>
			<input type="text" name="user_name" class="form-control" value="<?php echo $user_name;?>" >
			<br><br>
			<label>User NIC</label>
			<input type="text" name="NIC" class="form-control" value="<?php echo $NIC;?>" >
			<br><br>
			
			<label>Student Attendance</label>
			<input type="text" name="" class="form-control" value="User is  ' <?php echo $attendance;?> '" readonly>
			<br><br>
			<select class="form-control" name="attendance">
				<option>Update Attandence</option>
				<option value="Present">Present</option>
				<option value="Absent">Absent</option>
			</select>
			<br><br>
			<label>Date </label>
			<input type="text" name="date" class="form-control" value="<?php echo $date; ?>" readonly>

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