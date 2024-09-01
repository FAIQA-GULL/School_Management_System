<?php
include('conn.php');
include('function.php');
include('admin_navbar_home.php');

 $school_id = $_POST['school_id'];
 $section_id = $_POST['section_name'];



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
              echo '<script>window.location="admin_search_courses.php"</script>';

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
		// echo '<script>window.location="admin_assign_courses.php"</script>';

	}
		
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
		<center><h1>Assigned Courses Information</h1></center>
		<div class="pull-right">
			<a href="#assign" class="btn btn-warning">Assign New Course</a>
			
		</div>
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
				<th>Sr.#</th>
				<th>Teacher ID</th>
                <th>Teacher Name</th>
                <th>Courses Assigned</th>
                <th>Class Name</th>
                <th>Show Courses</th>
					
				</tr>
		    </thead>
		    <?php 
		    // SELECT course.cou_name ,user_info.user_id,user_info.user_name ,class.class_name from user_info JOIN course on course.user_id=user_info.user_id JOIN class on class.class_id= course.class_id where course.class_id <= 5

		        $sql="SELECT course.cou_name ,user_info.user_id,user_info.user_name ,class.class_name from user_info JOIN course on course.user_id=user_info.user_id JOIN class on class.class_id= course.class_id where user_info.sch_id='$school_id' AND user_info.section_id='$section_id'";
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
		    	<td><?php echo $row['user_id']; ?></td>
              	<td><?php echo $row['user_name'];?></td>
                <td><?php echo $row['cou_name'];?></td>
                <td><?php echo $row['class_name'];?></td>
                <td><a href="admin_assign_courses.php?action=delete&user_id=<?php echo $row['user_id']; ?>&cou_name=<?php echo $row['cou_name'];?>" class="btn btn-danger">Delete</a></td>
				    
				    
				    

				 
		    	</tr>
		    </tbody>
		    <?php
		    }
		    } 
		    else{
		    	?>
		    	<center><h3 style="color: yellow;">No Record Found</h3></center>
		    	<?php
		    }

		    ?>
	    </table>




<br><br>

		</div>
	</div>
</div>
<br>
<hr>
<br>

<div class="container" id="assign">
	<div class="row" id="row1">
		<div class="col">
			<center><h2 style="color: white;">Assign Courses</h2></center>
			<form action="admin_assign_courses.php" method="POST">

			<table class="table table-hover table-striped table-bordered">

				<tr>
					<th>Subject Name</th>
					<td>
						<select class="form-control" name="subjects" required/>
							<option value="">Select Subjects </option>

					<?php $query ="SELECT * FROM subjects";
					$result = mysqli_query($conn,$query);
					if (mysqli_num_rows($result) > 0)
						{
								//OUTPUT DATA OF EACH ROW
		    	 	    while($row = mysqli_fetch_assoc($result))
		    	 	       {
		    	 	     	?>
		    	 	     	<option value="<?php echo $row['sub_name'];?>"><?php echo $row['sub_name'];?></option>
		    	 	    
		    	 	    <?php
		    	 	        }
		    	 	    }?>
		    	 	</td>
				</tr>

				<tr>
					<th style="color:white;">Class Name</th>
					<td>
						<select class="form-control" name="class_name" required/>
							<option value="">Select Class</option>
					<?php $query ="SELECT * FROM class join Section
					on class.section_id = section.section_id";
					$result = mysqli_query($conn,$query);
					if (mysqli_num_rows($result) > 0)
						{
								//OUTPUT DATA OF EACH ROW
		    	 	    while($row = mysqli_fetch_assoc($result))
		    	 	       {
		    	 	     	?>
		    	 	     	<option value="<?php echo $row['class_id'];?>"><?php echo $row['class_name'];?> ........... <?php echo $row['section_name'];?>
		    	 	     		
		    	 	     	</option>
		    	 	    
		    	 	    <?php
		    	 	        }
		    	 	    }?>
		    	 	</td>
				</tr>
				
				<tr>
					<th>Teacher Name </th>
					<td>
						<select class="form-control" name="user_id" required/>
							<option value="">Select Teacher</option>


					<?php $query ="SELECT * FROM user_info join section 
					on user_info.section_id = section.section_id
					 WHERE user_type ='teacher' ";
					$result = mysqli_query($conn,$query);
					if (mysqli_num_rows($result) > 0)
						{
								//OUTPUT DATA OF EACH ROW
		    	 	    while($row = mysqli_fetch_assoc($result))
		    	 	       {
		    	 	     	?>
		    	 	     	<option value="<?php echo $row['user_id'];?>"><?php echo $row['user_name'];?>      
		    	 	     	........... 
		    	 	     	<?php echo $row['section_name'];?></option>
		    	 	    
		    	 	    <?php
		    	 	        }
		    	 	    }?>
		    	 	</td>
				</tr>

				<tr>
					<!-- <th></th> -->
					<td colspan="3"  align="center">
						<input type="submit" class="btn btn-success" name="add">
					</td>
				</tr>
				
			
				
			</table>
			
			</form>
		</div>
	</div>
</div>






</body>
</html>