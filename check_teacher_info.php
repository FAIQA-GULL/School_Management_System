<?php
include('conn.php');
include('function.php');
include('navbar_home.php');
// include('footer.php');
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
	
	/*.jumbotron{
 		background-image: url('image/books.jpg');

 	}
 	
 	.jumbotron h1{
 		font-size: 2.5rem;
 		color: white;
 		font-family: 'Fraunces', serif;
 	}
*/
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
</style>
<body>
<!-- <div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Successful and unsuccessful people </h1><h1>do not vary greatly in their abilities </h1>
  
</div> -->

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
        <li class="active"><a href="clerk_main_page.php">Home</a></li>
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
		<div class="col">
		<center><h1>Teacher Information</h1></center>
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>Sr.no</th>
					<th>Name</th>
					<th>NIC No</th>
					<th>Attendance</th>
					
					<th>Update || Delete</th>
				</tr>
		    </thead>
		    <?php 

		        $sql="SELECT * from user_info left join attendance 
		         on user_info.user_id=attendance.user_id 
		         WHERE `user_type` ='teacher'
		         order by attendance.date_time asc ";
		    	
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
		    		<?php echo "<th>".($sno++)."</th>"; ?>
		    		<td><?php echo $row["user_name"]; ?></td>
		    		<td><?php echo $row["NIC"]; ?></td>
				    <td><?php echo $row["attendance"];?></td>
				    
				    
				    

				    <td>
								<a href="#editproduct<?php echo $row['user_id']; ?>" data-toggle="modal" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Edit</a> ||

								<a href="#deleteproduct<?php echo $row['user_id']; ?>" data-toggle="modal" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('teacher_update_modal.php'); ?>
				    </td>

		    	</tr>
		    </tbody>
		    <?php
		    }
		    } 

		    ?>
	    </table>



<hr>
<br><br>




		<center><h1>Leave Record </h1></center>
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					
					<th>Employee ID </th>
					<th>Name</th>
					<th>Leave Status</th>
					<th>Leave Detail</th>
					<th>Date - Time</th>
				</tr>
		    </thead>
		    <?php 

		     $sql="SELECT * from user_info  join  leave_record 
		         on user_info.user_id= leave_record.user_id 
		         WHERE `user_type` ='teacher'
		         order by  leave_record.date_time asc ";
		    	
		    	$in = mysqli_query($conn, $sql);

		    	if (mysqli_num_rows($in) > 0)
		    	 	{
		    	 	   
		    	 	    //OUTPUT DATA OF EACH ROW
		    	 	    while($row = mysqli_fetch_assoc($in))
		    	 	     {
		    	
		    ?>
		    <tbody>
		    	<tr>
		    		
		    		<td >
		    			<?php echo $row['user_id'];?>
		    		</td>
		    		<td><?php echo $row['user_name'];?></td>
		    		<td><?php echo $row['lea_status'];?></td>
		    		<td><?php echo $row['lea_detail'];?></td>
		    		<td><?php echo $row['date_time'];?></td>
		        </tr>
		    
		    </tbody>
		    <?php 
		}
	}
	else
	{
		echo 'No Record For this User'; 
	}
	?>
		</table>

		</div>
	</div>
</div>







</body>
</html>