<?php
include('conn.php');
include('function.php');
include('principale_navbar_home.php');
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
  <center><h2 style="color: black;">Teacher Attandence and Updates</h2></center>
    
	<div class="row">
    <div class="col">
      <center><h3>Primary Section Teacher Attendance</h3></center>
	

	    <table class="table table-hover table-striped table-bordered">
		    <thead>
			<tr>
					<th>Sr.no</th>
          <th>Teacher ID</th>
					<th>Teacher name</th>
          <th>NIC</th>
					<th>Today Attendance</th>
          <th>DATE</th>
					<th>Update</th>
			</tr>
		    </thead>
		    <?php 

		    $sql="SELECT * from attendance join user_info 
        on attendance.user_id=user_info.user_id 
        WHERE user_info.user_type='teacher' AND user_info.section_id=1 AND attendance.date_time=CURRENT_DATE();";
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
		    <tbody>
		    	<tr>
		    		<?php echo "<th>".($sno++)."</th>"; ?>
		    		
		    		
		    		<td><?php echo $row["user_id"]; ?></td>
		    		<td><?php echo $row["user_name"]; ?></td>
		    		<td><?php echo $row["NIC"];?></td>
           	<td><?php echo $row["attendance"];?></td>
            <td><?php echo $row["date_time"];?></td>
				   
				    <td>
								<a href="principale_teacher_update.php?user_id=<?php echo $row['user_id'];?>&user_name=<?php echo $row["user_name"]; ?>&NIC=<?php echo $row["NIC"];?>&attendance=<?php echo $row["attendance"];?>&date=<?php echo $row["date_time"];?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>Update </a> 
						</td>

								<!-- <a href="#deleteproduct<?php echo $row['std_id']; ?>" data-toggle="modal" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span> Delete</a> -->
								<!-- <?php include('Primary_student_update_modal.php'); ?> -->
				    <!-- </td> -->
		    	</tr>
		    </tbody>
		    <?php
		    }
		    } 

		    ?>
	    </table>
    </div>
	</div>
</div>

<br><hr><br>

<div class="container">
    
  <div class="row">
    <div class="col">
      <center><h3>Middle Section Teacher Attendance</h3></center>
  

      <table class="table table-hover table-striped table-bordered">
        <thead>
      <tr>
          <th>Sr.no</th>
           <th>Teacher ID</th>
          <th>Teacher name</th>
          <th>NIC</th>
          <th>Today Attendance</th>
          <th>DATE</th>
          <th>Update</th>
      </tr>
        </thead>
        <?php 

        $sql="SELECT * from attendance join user_info 
        on attendance.user_id=user_info.user_id 
        WHERE user_info.user_type='teacher' AND user_info.section_id=2 AND attendance.date_time=CURRENT_DATE();";
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
        <tbody>
          <tr>
            <?php echo "<th>".($sno++)."</th>"; ?>
            
            
            <td><?php echo $row["user_id"]; ?></td>
            <td><?php echo $row["user_name"]; ?></td>
            <td><?php echo $row["NIC"];?></td>
            <td><?php echo $row["attendance"];?></td>
            <td><?php echo $row["date_time"];?></td>
           
            <td>
                <a href="principale_teacher_update.php?user_id=<?php echo $row['user_id'];?>&user_name=<?php echo $row["user_name"]; ?>&NIC=<?php echo $row["NIC"];?>&attendance=<?php echo $row["attendance"];?>&date=<?php echo $row["date_time"];?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>Update </a> 
            </td>

                <!-- <a href="#deleteproduct<?php echo $row['std_id']; ?>" data-toggle="modal" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span> Delete</a> -->
                <!-- <?php include('Primary_student_update_modal.php'); ?> -->
            <!-- </td> -->
          </tr>
        </tbody>
        <?php
        }
        } 

        ?>
      </table>
    </div>
  </div>
</div>

<br><hr><br>

<div class="container">
    
  <div class="row">
    <div class="col">
      <center><h3>High Section Teacher Attendance</h3></center>
  

      <table class="table table-hover table-striped table-bordered">
        <thead>
      <tr>
          <th>Sr.no</th>
          <th>Teacher ID</th>
          <th>Teacher name</th>
          <th>NIC</th>
          <th>Today Attendance</th>
          <th>DATE</th>
          <th>Update</th>
      </tr>
        </thead>
        <?php 

        $sql="SELECT * from attendance join user_info 
        on attendance.user_id=user_info.user_id 
        WHERE user_info.user_type='teacher' AND user_info.section_id=3 AND attendance.date_time=CURRENT_DATE();";
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
        <tbody>
          <tr>
            <?php echo "<th>".($sno++)."</th>"; ?>
            
            
            <td><?php echo $row["user_id"]; ?></td>
            <td><?php echo $row["user_name"]; ?></td>
            <td><?php echo $row["NIC"];?></td>
            <td><?php echo $row["attendance"];?></td>
            <td><?php echo $row["date_time"];?></td>
           
            <td>
                <a href="principale_teacher_update.php?user_id=<?php echo $row['user_id'];?>&user_name=<?php echo $row["user_name"]; ?>&NIC=<?php echo $row["NIC"];?>&attendance=<?php echo $row["attendance"];?>&date=<?php echo $row["date_time"];?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>Update </a>  
            </td>

                <!-- <a href="#deleteproduct<?php echo $row['std_id']; ?>" data-toggle="modal" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span> Delete</a> -->
                <!-- <?php include('Primary_student_update_modal.php'); ?> -->
            <!-- </td> -->
          </tr>
        </tbody>
        <?php
        }
        } 

        ?>
      </table>
    </div>
  </div>
</div>






</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $("#catList").on('change', function(){
      if($(this).val() == 0)
      {
        window.location = 'primary_student_attendance.php';
      }
      else
      {
        window.location = 'primary_student_attendance.php?category='+$(this).val();
      }
    });
  });

</script>


