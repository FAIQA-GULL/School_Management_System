<?php
include('conn.php');
include('function.php');
include('principale_navbar_home.php');
// include('footer.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>information</title>


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
    <center><h1>Student Information </h1></center>
	

   <select id="catList" class="form-control">
      <option value="0">All Category</option>
      <?php
        $sql="SELECT * from class";
        $catquery=$conn->query($sql);
        while($catrow=mysqli_fetch_array($catquery)){
        
          $catid = isset($_GET['category']) ? $_GET['category'] : 0;
          $selected = ($catid == $catrow['class_id']) ? " selected" : "";
          echo "<option$selected value=".$catrow['class_id'].">".$catrow['class_name']."</option>";
        }
      ?>
      </select>
      <br>
      <br>
  <div class="row">
    <div class="col">
		
	
		<br>
		<br>
		<br>



	    <table class="table table-hover table-striped table-bordered">
		    <thead>
			<tr>
					<th>Sr.no</th>
          <th>Student ID</th>
					<th>Student name</th>
					<th>Section Name</th>
          <th>Student Result</th>
					<th>Class ID</th>
			</tr>
		    </thead>
		    <?php 

         $sno=1;
          $where = "";
          if(isset($_GET['category']))
          {
            $catid=$_GET['category'];
            $where = " WHERE student_result.class_id = $catid";
          }

		    $sql="SELECT * from section join student 
        on section.section_id=student.section_id
        join student_result 
        on student_result.std_id = student.std_id 
		    $where";
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
		    		
		    		
		    		<td><?php echo $row["std_id"]; ?></td>
		    		<td><?php echo $row["std_name"]; ?></td>
		    		<td><?php echo $row["section_name"];?></td>
            <td><?php echo $row["std_result"];?></td>
            <td><?php echo $row["class_id"];?></td>
				   
				   <!--  <td>
								<a href="primary_student_update.php?std_id=<?php echo $row['std_id']; ?>&section_name=<?php echo $row["section_name"];?>&Attendance=<?php echo $row["sta_attendance"];?>&date=<?php echo $row["cdate"];?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>Update Attendace</a> 
							

								 <a href="#deleteproduct<?php echo $row['std_id']; ?>" data-toggle="modal" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span> Delete</a> -->
								<!-- <?php include('Primary_student_update_modal.php'); ?> -->
				   <!--  </td> - -->
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






<!-- =============== Model To Add New Student ===============  -->

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> </button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Student</h4></center>
            </div>
            <div class="modal-body">
                
                    <form method="POST" action="add_new_student.php" >
                    <div class="form-group">
                          <label class="control-label">Student Name:</label>
                            <input type="text" class="form-control" name="pname" required>

                            <label class="control-label">Father Name:</label>
                            <input type="text" class="form-control" name="fname" required>

                            <label class="control-label">Address:</label>
                            <input type="text" class="form-control" name="address" required>

                            <label class="control-label">Contact:</label>
                            <input type="text" class="form-control" name="contact" required>
                           
                   <label class="control-label">Choose Section:</label>
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
                            </div> <!-- <label class="control-label">Price:</label>
                            <input type="text" class="form-control" name="price" required>
                            <label class="control-label">Photo:</label>
                             <input type="file" name="photo"> -->
                            
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit"  class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $("#catList").on('change', function(){
      if($(this).val() == 0)
      {
        window.location = 'principale_student_result.php';
      }
      else
      {
        window.location = 'principale_student_result.php?category='+$(this).val();
      }
    });
  });

</script>


