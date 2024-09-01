<?php
include('conn.php');
include('function.php');
include('district_navbar_home.php');
// include('footer.php');
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


</style>
<body>
	<?php $std_id =$_GET['std_id'];?>

<div class="container">
	<div class="row">
		<center><h2 style="color: white;">Student Attendance Report</h2></center>

		<table class="table">
			<thead>
				<th>Sr.#</th>
				<th>Student Name</th>
				<th>Father Name</th>
				<th>Attendance</th>
				<th>Date</th>
			</thead>
			<?php
		$sql = "SELECT * FROM student_attendance JOIN student ON student.std_id = student_attendance.student_id WHERE student_attendance.student_id='$std_id'";
		$info=mysqli_query($conn,$sql);
		if (mysqli_num_rows($info) > 0)
			{
			 $sno = 1;
			  //OUTPUT DATA OF EACH ROW
			  while($row = mysqli_fetch_assoc($info))
			  {

		?>
		
			<tbody>
				<tr>
					<?php echo '<td>'.$sno++.'</td>'?>
					<td><?php echo $row['std_name']; ?></td>
					<td><?php echo $row['std_father_name'];?></td>
					<td><?php echo $row['sta_attendance'];?></td>
					<td><?php echo $row['cdate'];?></td>
					

				</tr>
			</tbody>
			<?php }
			} 
			?>
		</table>



		
	</div>
</div>

</body>
</html>