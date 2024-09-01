<?php
include('conn.php');
include('function.php');
include('admin_navbar_home.php');
// include('footer.php');
if (isset($_POST['update']))
{
  $sub_name = $_POST['sub_name'];
  $o_marks  = $_POST['o_marks'];
  $t_marks  = $_POST['t_marks'];
  $class_id = $_POST['class_id'];
  $std_id   = $_POST['std_id'];
  $section_id = $_POST['section_id'];

  // UPDATE `student_subject_result` SET `s_s_r_id`=[value-1],`sub_name`=[value-2],`obtained_marks`=[value-3],`total_marks`=[value-4],`std_id`=[value-5],`cass_id`=[value-6],`section_id`=[value-7] WHERE 1
  
  $query = "UPDATE `student_subject_result` SET `obtained_marks`='$o_marks',`total_marks`='$t_marks' WHERE `sub_name`='$sub_name' AND `std_id`='$std_id' AND `cass_id`='$class_id' AND `section_id`='$section_id'";
  // print_r($query);

  $result=mysqli_query($conn,$query);

 echo '<script>alert("Attendace Updated !")</script>';
 // echo '<script>window.location="principale_teacher_attendance.php"</script>';


}

?>
<!DOCTYPE html>
<html>
<head>
	<title>View Report</title>
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
 		color: white
 	}
 	.col{
 		color: white;
 	}
 	.row{
 		border-top-left-radius: 63px;
  border-bottom-right-radius: 63px;
  background-image: linear-gradient(27deg, #013A6B 50%,#004E95 50%);
 	}
 	td:hover{
 		background-color: #eee;
 		color: black;
 	}
 	td{
 		color: white;
 	}
 	.sit{
    display: inline-block;
    width: 20%;
  }
  .table{
    background-color: #eee;
  }
  th,td{
  	color: black;
  }


</style>
<body>
	<?php 
	$std_id = $_GET['std_id'];
	$std_name = $_GET['std_name'];
	$class_id = $_GET['class_id'];
	$section_id = $_GET['section_id'];
	$section_name = $_GET['section_name'];
	?>

<div class="container">
	<div class="row">
		  <center><h1>Student Result Detail</h1></center>
		  <center><h2 style="color: white;"><?php echo $section_name;?></h2></center>
        <center><h3><?php echo $std_name;?></h3></center>
        <center><h4 style="color: white;">Class : <?php echo $class_id;?></h4></center>

		<table class="table table-hover table-bordered">
			<thead>
				<th>Sr.#</th>
				<th>Subject Name</th>
				<th>Obtained Marks</th>
				<!-- <th>Update</th> -->
			</thead>
			<tbody>
			<?php
		// $sql = "SELECT * FROM student_attendance JOIN student ON student.std_id = student_attendance.student_id WHERE student_attendance.student_id='$std_id'";

			   $total = 0;
           $all_total = 0;
 $obtained_marks = 0;

		$sql="SELECT * from section join student 
        on section.section_id=student.section_id
        join student_result 
        on student_result.std_id = student.std_id 
        JOIN  student_subject_result
        ON  student_subject_result.std_id = student.std_id

        WHERE student.section_id ='$section_id' AND student_result.class_id ='$class_id' AND student.std_id='$std_id'";

		$info=mysqli_query($conn,$sql);
		if (mysqli_num_rows($info) > 0)
			{
			 $sno = 1;
			  //OUTPUT DATA OF EACH ROW
			  while($row = mysqli_fetch_assoc($info))
			  {

		?>
		
			  <form method="POST">
				<tr>
					<?php echo '<td>'.$sno++.'</td>'?>
					
					<td><?php echo $row['sub_name'];?>
						  <input type="hidden" name="sub_name" value="<?php echo $row['sub_name'];?>" >
					</td>

					<td>
						<input type="text" name="o_marks"  class="form-control sit" value="<?php echo $row['obtained_marks'];?>"> / <input type="text"  class="form-control sit" name="t_marks" value="<?php echo $row['total_marks'];?>">
					</td>

					<td>
						<input type="submit" name="update" class="btn btn-success" value=" Update">
					</td>



					<input type="hidden" name="class_id"  value="<?php echo $row['class_id'];?>">
              
                    <input type="hidden" name="std_id" value="<?php echo $row['std_id'];?>">
                
                    <input type="hidden" name="section_id" value="<?php echo $row['section_id'];?>">
					

				</tr>
				 </form>
			
			<?php


                        $all_total=$all_total + $row['total_marks'];
                        $obtained_marks = $obtained_marks + $row['obtained_marks'];
                        
                        $total =  $obtained_marks/ $all_total * 100;

        	    }
			} 
			?>
			   <tr >
			   	<td></td>
                  <th >
                    Total
                  </th>
                  <td><?php echo $obtained_marks;?>  /  <?php echo  $all_total;?> </td>
                    </tr>
                <tr>
                	<td></td>
                  <th>Persentage</th>
                  <td><?php echo $total;?>%</td>
                </tr>
			</tbody>
		</table>



		
	</div>
</div>

</body>
</html>