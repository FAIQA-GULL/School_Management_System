<?php
include('conn.php');
include('function.php');
include('admin_navbar_home.php');

if (isset($_POST['update'])) {

	//INSERT INTO `student_attendance`(`sta_id`, `sta_attendance`, `student_id`, `class_id`, `section_id`, `cdate`) VALUES 

        $std_id = $conn->real_escape_string($_POST['std_id']);
        $attendance =$conn->real_escape_string($_POST['attendance']);
        $class_name = $conn->real_escape_string($_POST['class_name']);
        $section = $conn->real_escape_string($_POST['section_id']);

        $check_Pid = "SELECT * from `student_attendance` where student_id ='$std_id' AND cdate = CURRENT_DATE()";

           $check = mysqli_query($conn, $check_Pid);
           if (mysqli_num_rows($check)>0)
           {

            $query="UPDATE `student_attendance` SET `sta_attendance`='$attendance' WHERE `student_id` = '$std_id' AND cdate = CURRENT_DATE()";
            // print_r($query);
            $result=mysqli_query($conn,$query);
            echo '<script>alert("Attendace Updated !")</script>';
            echo '<script>window.location="admin_search_student_attendance.php"</script>';
        }
         else
            {

            	// INSERT INTO `student_attendance`(`sta_id`, `sta_attendance`, `student_id`, `class_id`, `section_id`, `cdate`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])

$sql = "INSERT INTO `student_attendance`(`sta_attendance`, `student_id`, `class_id`, `section_id`)

             VALUES ('$attendance','$std_id','$class_name','$section')";

            $query = mysqli_query($conn , $sql); 
              echo '<script>alert("Today Attendace marked !")</script>';
              echo '<script>window.location="admin_search_student_attendance.php"</script>';
          }
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
					<form method="post">
			<?php 

		 $std_id = $_GET['std_id'];
         $sta_attendance = $_GET['sta_attendance'];
         $class_name = $_GET['class_name'];
         $section_id = $_GET['section_id'];

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
			<input type="text" name="class_name" class="form-control" value="<?php echo $class_name; ?>" readonly>
			<!-- hidden section id  -->
			<input type="hidden" name="section_id" value="<?php echo $section_id;?>">

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