<?php
include('conn.php');
include('function.php');
include('admin_navbar_home.php');
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
</style>
<body>

<br><br>

<div class="container">
	<center><h3 style="color: black">Welcome Admin</h3></center>
	<br>
		<div class="row">
			<div class="col">
				<center><h2>About Me</h2></center>
				
				

			<table class="table">
				<tr>
				    <th>User ID</th>
				    <td><?php echo $_SESSION['user']['user_id'];?></td>
			    </tr>
			    <tr>
				    <th>User Name</th>
				    <td><?php echo $_SESSION['user']['user_name'];?></td>
			    </tr>
			    <tr>
				    <th>User Email</th>
				    <td><?php echo $_SESSION['user']['user_email'];?></td>
			    </tr>
			    <tr>
				    <th>User Contact</th>
				    <td><?php echo $_SESSION['user']['phone_number'];?></td>
			    </tr>
			    <tr>
				    <th>User Type</th>
				    <td><?php echo $_SESSION['user']['user_type'];?></td>
			    </tr>
			    <tr>
				    <th></th>
				    <td></td>
			    </tr>
			</table>
		

			

				
				<hr class="hidden-sm hidden-md hidden-lg">
			
			</div>
					
      </div>
</div>




</body>
</html>
