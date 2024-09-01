<?php
include('conn.php');
include('function.php');
include('admin_navbar_home.php');
 $school_id = $_POST['school_id'];
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
	html{
		scroll-behavior: smooth;
	}
	
	

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
</head>
<body>
	

<br><br>
	
<div class="container">
	<div class="row">
    <div class="col">
		<center><h1>Student Information </h1></center>
		
		<a href="#add"  class="pull-right btn btn-warning"><span class="glyphicon glyphicon-plus"></span> Add New Student</a>
		<br>
		<br>
		<br>

	    <table class="table table-hover table-striped table-bordered">
		    <thead>
			<tr>
					<th>Sr.no</th>
					<th>Student name</th>
					<th>Father Name</th>
					<th>Address</th>
					<th>Contact</th>
					<th>Section</th>
					<!-- <th>Section Name</th> -->
					<th>Update || Delete</th>
			</tr>
		    </thead>
		    <?php 

 $sql="SELECT * from student join section on student.section_id=section.section_id
    where student.section_id=section.section_id AND section.sch_id='$school_id'";
		    	
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
		    		
		    		
		    		
		    		<td><?php echo $row["std_name"]; ?></td>
		    		<?php 
		    		$name =$row["std_name"];
		    		$f_name = $row["std_father_name"];
		    		$address = $row["std_address"];
		    		$phone = $row["std_phone_number"];
		    		$section_name = $row["section_name"]; 

		    		?>
		    		<td><?php echo $row["std_father_name"];?></td>
		    		<td><?php echo $row["std_address"];?></td>
		    		<td><?php echo $row["std_phone_number"];?></td>
				    <td><?php echo $row["section_name"];?></td>
				   
				    <td>
				    	<input type="submit" class="btn btn-success" name="edit" value="Edit"> || 

				    	<input type="submit" class="btn btn-danger" name="" value="Delete">
								
				    </td>
		    	</tr>
		    </tbody>
		
		    <?php
		    $sch=$row['sch_id'];
		    }
		    } 

		    ?>
	    </table>
    </div>
	</div>
</div>


<!--  -->
<!-- <?php 
if(isset($_POST['edit']))
{
	?>
	<input type="text" class="form-control" name="" value="<?php echo $name;?>">


	<?php
	echo $st_name = $name;

}


?> -->


<br>
<hr>
<br>

<div class="container" id="add">
	<div class="row">
		<center><h1 style="color: white;">Add New Student Data</h1></center>
		<div class="col">
			<form  method="POST">
			<center>
				<input type="hidden" name="sch" value="<?php echo $sch;?>">
			<input type="text" class="form-control" name="std_name" placeholder="Student Name "><br>
			<input type="text" class="form-control" name="f_name" placeholder="Father Name">
			<br>
			<input type="text" class="form-control" name="std_address" placeholder="Address">
			<br>
			<input type="text" class="form-control" name="std_contact" placeholder="Contact">
			<br>
			<select class="form-control" name="category" required/>
                              	<option value="">Select Section</option>
                                    <?php
                                        $sql="SELECT * from section order by section_id asc";
                                        $query=$conn->query($sql);
                                        while($row=$query->fetch_array()){
                                            ?>
                                            <option value="<?php echo $row['section_id']; ?>"><?php echo $row['section_name']; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>

            <br>
            <select class="form-control" name="class_id" required/>
                              	<option value="">Select class</option>
                                    <?php
                                        $sql="SELECT * from class JOIN section
                                        ON class.section_id = section.section_id
                                        ";
                                        $query=$conn->query($sql);
                                        while($row=$query->fetch_array()){
                                            ?>
                                            <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?>.......<?php echo $row['section_name'];?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
            <br>
            <input type="submit" name="add_std" class="btn btn-success" value="Add New Data">
            </center>
        </form>

		</div>

		<br>
	</div>
</div>
<br><hr><br>

<?php 
if(isset($_POST['add_std']))
{
	$sch = $_POST['sch'];
	$std_name = $_POST['std_name'];
	$f_name   = $_POST['f_name'];
	$std_address = $_POST['std_address'];
	$std_contact = $_POST['std_contact'];
	$category = $_POST['category'];
	$class_id = $_POST['class_id'];
	


	// INSERT INTO `student`(`std_id`, `std_name`, `std_father_name`, `std_phone_number`, `std_address`, `section_id`, `class_id`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])

	$query = "INSERT INTO `student`(`std_name`, `std_father_name`, `std_phone_number`, `std_address`, `section_id`, `class_id`, `sch_id`) 
VALUES('$std_name','$f_name','$std_contact','$std_address','$category','$class_id','$sch')";
	$ad = mysqli_query($conn,$query);

	echo '<script>alert("Data Added")</script>';
	echo '<script>window.location= "admin_search_students_info.php"</script>'; 

}

?>
</body>
</html>


