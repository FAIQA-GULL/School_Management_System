<?php
include('conn.php');
include('function.php');
include('navbar_index.php');
// include('footer.php');
?>


<!DOCTYPE html>
<html>
<head>
	

 <title>Login</title>
  

  <!-- google fonts -->
    <!-- for labels -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,600;1,800;1,900&display=swap" rel="stylesheet">

   <!--  for heading -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ma+Shan+Zheng&display=swap" rel="stylesheet">

 <style type="text/css">
 	
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

 	h3,h1,p,a{
 		font-family: 'Fraunces', serif;
    color: white
 	}
 	
 		.row{
    
  border-top-left-radius: 63px;
  border-bottom-right-radius: 63px;
  background-image: linear-gradient(27deg, #013A6B 50%,#004E95 50%);

  }
 
 </style>


</head>
<body>
<!-- <section class ="hero_image"  ></section> -->
	
<!-- <div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Successful and unsuccessful people </h1><h1>do not vary greatly in their abilities </h1> -->
  <!-- <p>Flower will not grow, if the stem doesn't allow.</p>  -->
</div>

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
        <li class="active"><a href="#">Home</a></li>
        
         <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav> -->

<br><br>

<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-8">
		<h1>Login  here!</h1>
		<form method="post" action="index.php" class="form_code">


        <input type="text" name="email"  class="form-control" placeholder="Your Email" required>
        <br>

        
        <!-- <label>password</label> -->
        <input type="text"  name="password" class="form-control" placeholder="password" required>
       
        <br><br>

        <button type="submit" class="btn btn-success" name="login_btn">Login </button>
        <br>
        <!-- <p> Not yet a member? => <a href="register.php">Sign up</a> </p> -->
        </form>

        </div>
    </div>
</div>

</body>
</html>
<!-- =============================================== -->



<!-- <br><br><br>
<!DOCTYPE html>
<html>
<head>
	<title>form</title>
</head>
<body>
	<form method="post" action="practice.php">

		<input type="text" name="name">
		
		<input type="password" name="password">

		<select name="selectMe">
			<option>SELECT PLEASE </option>
			<option value="Faiqa">Faiqa</option>
			<option value="noureen" >Noureeen</option>
		</select>

		<input type="submit" name="add">
	</form>

</body>
</html> -->