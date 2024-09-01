<?php
include('conn.php');
include('function.php');
include('section_navbar_home.php');
// include('footer.php');




if(isset($_POST['update'])){
  $student_id =$conn->real_escape_string($_POST['student_id']);
  $attendance =$conn->real_escape_string($_POST['attendance']);

// UPDATE `student_attendance` SET `sta_id`=[value-1],`sta_attendance`=[value-2],`student_id`=[value-3],`class_id`=[value-4],`section_id`=[value-5],`cdate`=[value-6] WHERE 1
  $query="UPDATE `student_attendance` SET `sta_attendance`='$attendance' WHERE `student_id`='$student_id' AND cdate=CURRENT_DATE()";
  $result=mysqli_query($conn,$query);

  echo '<script>alert("Attendance Updated!")</script>';
            echo '<script>window.location="primary_student_attendance.php"</script>';


}




?>
<!DOCTYPE html>
<html>
<head>
	<title>Teacher information</title>


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
 h1,h3,p,thead{
 		font-family: 'Fraunces', serif;
    color: white;
 	}
 .row{
    border-top-left-radius: 63px;
  border-bottom-right-radius: 63px;
  background-image: linear-gradient(27deg, #013A6B 50%,#004E95 50%);
  }
  .col{
      margin-left: 2%;
      margin-right: 2%;
    }
    label{
      color: white;
    }
</style>
</head>
<body>
	

<br><br>
	
<div class="container">
    <center><h1>Update Student Attendance</h1></center>
	
      <br>
      <br>
  <div class="row">
    <div class="col">
		
	
		<br>
		<br>
		<br>


	    <?php 

      $std_id = $_GET['std_id'];
      $section_name = $_GET['section_name'];
      $Attendance  =$_GET['Attendance'];
      $date =$_GET['date'];


        $sql="SELECT * from student_attendance WHERE student_id='$std_id' AND cdate='$date'";
        // print_r($sql);
         // student.section_id=section.section_id;
		    	
		    	$info = mysqli_query($conn, $sql);

		    	if (mysqli_num_rows($info) > 0)
		    	 	{
		    	 	    $sno = 1;
		    	 	    //OUTPUT DATA OF EACH ROW
		    	 	    while($row = mysqli_fetch_assoc($info))
		    	 	     {
		    	
		    ?>
		    
		    	 <form action="primary_student_update.php" method="POST">
		    		
		    		<label >Student ID </label>
		    		<input type="text" name="student_id" class="form-control" value="<?php echo $row['student_id'];?>">
				 
						<label>Attendance</label>
            <select class="form-control" name="attendance" required/>
              <option value="">Update Attendace</option>
              <option value="Present">Present</option>
              <option value="Absent">Absent</option>
            </select>
		    <?php
		    }
		    } 

		    ?>
        <br>
	    <center><input type="submit" class="btn btn-success" name="update">
        <a href="primary_student_attendance.php" class="btn btn-warning">Back</a>
      </center>
    </form>
      <br>
    </div>
	</div>
</div>






</body>
</html>




