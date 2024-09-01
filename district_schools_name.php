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

<div class="container">
	
	<br>
		<div class="row">
			<div class="col">
				<center><h2>Schools Name</h2></center>
				
				

			<table class="table">
				
			    <thead>
			    	<tr>
			    		<th>School ID</th>
			    		<th>School Name</th>
			    		<th>School Email</th>
			    		<th>School Phone Number</th>
			    		<th>School Medium</th>
			    		<th>School Address</th>
			    		
			    	</tr>
			    </thead>
			    <?php
			    $sql="SELECT * FROM schools ";
			    
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
			    		<td><?php echo $row['sch_id'];?></td>
			    		<td><?php echo $row['sch_name'];?></td>
			    		<td><?php echo $row['sch_email'];?></td>
			    		<td><?php echo $row['sch_contact'];?></td>
			    		<td><?php echo $row['sch_medium'];?></td>
			    		<td><?php echo $row['sch_address'];?></td>
			    	</tr>
			    </tbody>
			    <?php 
			}
		}

			    ?>
			</table>
		

			

				
				<hr class="hidden-sm hidden-md hidden-lg">
			
			</div>
					
      </div>
</div>




</body>
</html>
