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
		<center><h1>Subject Information </h1></center>
		
		<a href="#add" data-toggle="modal" class="pull-right btn btn-warning"><span class="glyphicon glyphicon-plus"></span> Add New Subject</a>
		<br>
		<br>
		<br>

	    <table class="table table-hover table-striped table-bordered">
		    <thead>
			<tr>
					<th>Sr.no</th>
					<th>Name</th>
					
					<th>Update || Delete</th>
			</tr>
		    </thead>
		    <?php 

		    $sql="SELECT * from subjects ORDER BY sub_id DESC";
		    	
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
		    		
		    		
		    		<td><?php echo $row["sub_name"]; ?></td>
		    	

				    <td>
								<a href="#editproduct<?php echo $row['sub_id']; ?>" data-toggle="modal" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Edit</a> 
								||

								<a href="#deleteproduct<?php echo $row['sub_id']; ?>" data-toggle="modal" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('subject_update_modal.php'); ?>
				    </td>
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







<!-- =============== Model To Add New Subject ===============  -->

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> </button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Subject</h4></center>
            </div>
            <div class="modal-body">
                
                    <form method="POST" action="add_new_subject.php" >
                    <div class="form-group">
                          <label class="control-label">Subject Name:</label>
                            <input type="text" class="form-control" name="pname" required>

                           <!--  <label class="control-label">Father Name:</label>
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
                                </select> -->
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