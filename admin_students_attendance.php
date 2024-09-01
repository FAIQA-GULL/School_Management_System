<?php
include('conn.php');
include('function.php');
include('admin_navbar_home.php');
// include('footer.php');

 $school_id = $_POST['school_id'];


if (isset($_POST['add'])) {
	$Subject = $conn->real_escape_string($_POST['subjects']);
	$class   =$conn->real_escape_string($_POST['class_name']);
	$user_id =$conn->real_escape_string($_POST['user_id']);

	// INSERT INTO `course`(`cou_id`, `cou_name`, `user_id`, `class_id`) VALUES ([value-1],[value-2],[value-3],[value-4])

	$query="INSERT INTO `course`(`cou_name`, `user_id`, `class_id`) VALUES('$Subject','$user_id','$class')";
	$result = mysqli_query($conn,$query);

	if($result)
        {
          if(mysqli_affected_rows($conn) > 0)
            {
              echo '<script>alert("Course Assigned")</script>';
            }
        }
        else
          {
            echo '<script>alert("connection error")</script>';
          }


}




if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		// DELETE FROM `course` WHERE 0
		$user_id = $_GET['user_id'];
		$cou_name= $_GET['cou_name'];
				
		$sql="DELETE FROM `course` WHERE user_id = '$user_id' AND cou_name = '$cou_name'";
        $query = mysqli_query($conn , $sql) ;
     
        echo '<script>alert("Data Removed")</script>';
		echo '<script>window.location="principale_teachers.php"</script>';

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
  <center><h2 style="color: black;">Today Student Attendance</h2>
    <div class="row">
      <!-- <div class="col-sm-4">
        

      <hr class="hidden-sm hidden-md hidden-lg">
      </div> -->

      <div class="col-sm-11">
        <center><h3>Primary Section Student</h3></center>

       
        <br><br>


        <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
               
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Today Present </th>
                <th>Class Name</th>
                <th>Edit</th>
                <th>Attendance Record</th>
               
              </tr>
            </thead>
            <?php 
            // SELECT DISTINCT(user_info.user_id), course.cou_name , user_info.user_name,class.class_name FROM course join class on course.class_id=class.class_id join section on section.section_id=class.section_id join user_info on user_info.section_id=section.section_id where user_info.user_type ='primary_teacher'


            // SELECT course.cou_name ,user_info.user_id,user_info.user_name ,class.class_name from user_info JOIN course on course.user_id=user_info.user_id JOIN class on class.class_id= course.class_id where course.class_id <= 5
            $sql="SELECT student_attendance.sta_attendance , student.std_name,student.std_id, student.section_id , student_attendance.class_id , class.class_name FROM `student_attendance` JOIN student on student_attendance.student_id = student.std_id JOIN class on class.class_id = student_attendance.class_id WHERE student_attendance.class_id <=5 AND student.sch_id ='$school_id' AND student_attendance.cdate = CURRENT_DATE()";
            print_r($sql);
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
              	<td><?php echo $row['std_id']; ?></td>
              	<td><?php echo $row['std_name'];?></td>
                <td><?php echo $row['sta_attendance'];?></td>
                <td><?php echo $row['class_name'];?></td>
                
                <td>
                  <a href="admin_student_update.php?std_id=<?php echo $row['std_id'];?>&sta_attendance=<?php echo $row['sta_attendance'];?>&class_name=<?php echo $row['class_id'];?>&section_id=<?php echo $row['section_id'];?>" class="btn btn-success"> Edit </a>                  

                </td>
                <td>
                  <a href="admin_student_attendance_report.php?std_id=<?php echo $row['std_id'];?>&std_name=<?php echo $row['std_name'];?>&class_name=<?php echo $row['class_id'];?>" class="btn btn-warning">View</a>
                </td>
              </tr>
            </tbody>
          <?php }}?>
          </table>
        </div>
    </div>
</div>

<br><hr><br>

<div class="container">
    <div class="row">
      <!-- <div class="col-sm-4">
        

      <hr class="hidden-sm hidden-md hidden-lg">
      </div> -->

      <div class="col-sm-11">
        <center><h3>Middle Section Students</h3></center>

       
        <br><br>


        <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
               
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Today Present </th>
                <th>Class Name</th>
                <th>Edit</th>
                <th>Attendance Record</th>
               
              </tr>
            </thead>
            <?php 
            // $id=$_SESSION['user']['user_id'];
            $sql=" SELECT student_attendance.sta_attendance , student.std_name,student.std_id,student.section_id , student_attendance.class_id , class.class_name FROM `student_attendance` JOIN student on student_attendance.student_id = student.std_id JOIN class on class.class_id = student_attendance.class_id WHERE student_attendance.class_id BETWEEN 6 AND 7 AND student.sch_id ='$school_id'AND student_attendance.cdate = CURRENT_DATE()";

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
              	<td><?php echo $row['std_id']; ?></td>
                <td><?php echo $row['std_name'];?></td>
                <td><?php echo $row['sta_attendance'];?></td>
                <td><?php echo $row['class_name'];?></td>
              <td>
                  <a href="admin_student_update.php?std_id=<?php echo $row['std_id'];?>&sta_attendance=<?php echo $row['sta_attendance'];?>&class_name=<?php echo $row['class_id'];?>&section_id=<?php echo $row['section_id'];?>" class="btn btn-success"> Edit </a>                  

                </td>
                <td>
                  <a href="admin_student_attendance_report.php?std_id=<?php echo $row['std_id'];?>&std_name=<?php echo $row['std_name'];?>&class_name=<?php echo $row['class_id'];?>" class="btn btn-warning">View</a>
                </td>
              </tr>
            </tbody>
          <?php }}?>
          </table>
        </div>
    </div>
</div>


<br><hr><br>



<div class="container">
    <div class="row">
      <!-- <div class="col-sm-4">
        

      <hr class="hidden-sm hidden-md hidden-lg">
      </div> -->

      <div class="col-sm-11">
        <center><h3>High Section Students</h3></center>

       
        <br><br>


        <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
               
                 <th>Student ID</th>
                <th>Student Name</th>
                <th>Today Present </th>
                <th>Class Name</th>
                <th>Edit</th>
                <th>Attendance Record</th>
               
              </tr>
            </thead>
            <?php 
            // $id=$_SESSION['user']['user_id'];
            $sql="SELECT student_attendance.sta_attendance , student.std_name,student.std_id, student.section_id  ,student_attendance.class_id , class.class_name FROM `student_attendance` JOIN student on student_attendance.student_id = student.std_id JOIN class on class.class_id = student_attendance.class_id WHERE student_attendance.class_id =8 AND student.sch_id ='$school_id'AND student_attendance.cdate = CURRENT_DATE()";
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
              	<td><?php echo $row['std_id']; ?></td>
                <td><?php echo $row['std_name'];?></td>
                <td><?php echo $row['sta_attendance'];?></td>
                <td><?php echo $row['class_name'];?></td>
                <td>
                  <a href="admin_student_update.php?std_id=<?php echo $row['std_id'];?>&sta_attendance=<?php echo $row['sta_attendance'];?>&class_name=<?php echo $row['class_id'];?>&section_id=<?php echo $row['section_id'];?>" class="btn btn-success"> Edit </a>                  

                </td>
                 <td>
                  <a href="admin_student_attendance_report.php?std_id=<?php echo $row['std_id'];?>&std_name=<?php echo $row['std_name'];?>&class_name=<?php echo $row['class_id'];?>" class="btn btn-warning">View</a>
                </td>
              </tr>
            </tbody>
          <?php }}?>
          </table>
        </div>
    </div>
</div>



  </body>
  </html>

