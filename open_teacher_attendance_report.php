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
	<?php $user_id =$_GET['user_id'];?>

<div class="container">
	<div class="row">
		<center><h2 style="color: white;">Teacher Attendance Report</h2></center>

		<table class="table">
			<thead>
				<th>Sr.#</th>
				<th>Teacher Name</th>
				<th>Teacher Email</th>
				<th>Attendance</th>
				<th>Date</th>
			</thead>
			<?php
		$sql = "SELECT * FROM attendance JOIN user_info ON user_info.user_id = attendance.user_id WHERE attendance.user_id='$user_id'";
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
					<td><?php echo $row['user_name']; ?></td>
					<td><?php echo $row['user_email'];?></td>
					<td><?php echo $row['attendance'];?></td>
					<td><?php echo $row['date_time'];?></td>
					

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