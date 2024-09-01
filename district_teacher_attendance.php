<?php
include('conn.php');
include('function.php');
include('district_navbar_home.php');
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
</style>
<body>

<br><br>

<div class="container-fluid">
	<div class="row">
	<form method="POST" action="district_teacher_attendance_report.php">
		<center>
			<h3>Search Teacher Report BY school</h3>
		
		<div class="form-group has-success" style="margin-top: 50px; ">
			<label>School Name</label>

			<select class="form-control" name="school_id" required/>
				<option value="">Select School Name</option>
				<?php
				$sql="SELECT * FROM schools";
				$info = mysqli_query($conn, $sql);

		    	if (mysqli_num_rows($info) > 0)
		    	 	{
		    	 	    $sno = 1;
		    	 	    //OUTPUT DATA OF EACH ROW
		    	 	    while($row = mysqli_fetch_assoc($info))
		    	 	     {


			    ?>
			    <option value="<?php echo $row['sch_id'];?>"><?php echo $row['sch_name'];?></option>

				?>
				<?php }}?>
			</select>
			<label>Section Name</label>

			<select class="form-control" name="section_name" required/>
				<option value=""> Select Section</option>
				<?php
				$sql="SELECT * FROM section";
				$info = mysqli_query($conn, $sql);

		    	if (mysqli_num_rows($info) > 0)
		    	 	{
		    	 	    $sno = 1;
		    	 	    //OUTPUT DATA OF EACH ROW
		    	 	    while($row = mysqli_fetch_assoc($info))
		    	 	     {


			    ?>
			    <option value="<?php echo $row['section_id'];?>"><?php echo $row['section_name'];?></option>

				?>
				<?php }}?>
			</select>
			<br>
			<button type="submit" name= "search"  class="btn btn-dark">Search Teacher Attendance</button>

		</div>

		</center>
	</form>
</div>
	
</div>




</body>
</html>
