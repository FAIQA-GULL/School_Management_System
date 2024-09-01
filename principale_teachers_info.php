<?php
include('conn.php');
include('function.php');
include('principale_navbar_home.php');
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
					<th>Email</th>
					<th>NIC No</th>
					<th>Gender</th>
					<th>Contact</th>
					<th>Section Name</th>
					
				</tr>
		    </thead>
		    <?php 

		        $sql="SELECT * from user_info JOIN section 
		        on user_info.section_id=section.section_id 
		        WHERE user_type='teacher'";
		         // print_r($sql);
		    	
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
		    		<td><?php echo $row["user_email"];?></td>
		    		<td><?php echo $row["NIC"]; ?></td>
				    <td><?php echo $row["gender"];?></td>
				    <td><?php echo $row["phone_number"];?></td>
				    <td><?php echo $row["section_name"];?></td>
				    
				    
				    

				 
		    	</tr>
		    </tbody>
		    <?php
		    }
		    } 

		    ?>
	    </table>




<br><br>




		<!-- <center><h1>Leave Record </h1></center> -->
		<!-- <table class="table table-hover table-striped table-bordered">
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
		</table> -->

		</div>
	</div>
</div>







</body>
</html>