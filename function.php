<?php
session_start();
include('conn.php');
// include('database_connection.php');

// session is start here

// variable declaration
$id                 ="";
$email              ="";
$name               ="";
$password           ="";
$confirm_password   ="";


$gender             = "";
$phone_number       ="";
$errors             = array();


// call the register() function if register_btn is clicked
// if (isset($_POST['register_btn'])){
// 	register();
// }

// regsiter User

// function register()
// {
	// global variable is to use everywhere
	// global $conn, $errors ;


	// $id               = $_POST['id'];
	// $email            = $_POST['email'];

	// $name             = $_POST['name'];
	// $password         = $_POST['password'];
	// $confirm_password = $_POST['confirm_password'];
	// // $business_type    = $_POST['business_type'];
	// // $business_description = $_POST['business_description'];
	// $gender           = $_POST['gender'];
	// $phone_number     = $_POST['number'];

	// $folder = "image/".$_FILES['image']['name'];

 //    $image   = $_FILES["image"]["name"];

// form validation: ensure that the form is correctly filled
	
	// user-name required if field is empty  

// 	if(empty($id)){
// 		array_push($errors, "ID is required");
// 	}

// 	if (empty($name)){ 
// 		array_push($errors, "Username is required"); 
// 	}

	

// 	// gender required if field is empty

// 	if (empty($gender)) { 
// 		array_push($errors, "gender is required"); 
// 	}

// 	// number required if field is empty
	
// 	if (empty($phone_number)) { 
// 		array_push($errors, "Contact Number is required"); 
// 	}


// 	// password required if field is empty

// 	if (empty($password)) { 
// 		array_push($errors, "Password is required"); 
// 	}

// 	// match both passwords required if field is empty

// 	if ($password != $confirm_password) {
// 		array_push($errors, "The two passwords do not match");
// 	}



// 	// register user if there are no errors in the form

// 	if (count($errors) == 0)
// 	{
// 		if (isset($_POST['user_type'])) 
// 		{

// 			$user_type = $_POST['user_type'];
			
// 			// $query = "INSERT INTO users (username, email, department ,designation , contactno , user_type, password) 
// 			// 		  VALUES('$user_name', '$email', '$dept',  '$desgn', '$enumber' . '$user_type', '$password')";

// 			$query = "INSERT INTO `user_info`(`user_id`, `user_name`, `user_password`, `gender`, `phone_number`, `user_type`)
// 			 VALUES ('$id','$name','$password','$gender','$phone_number','$user_type')";	

// 			mysqli_query($conn, $query);

// 			// data is enterd as admin in database

// 			$_SESSION['success']  = "New user successfully created!!";
// 			// header('location: OwnerHomePage.php');
// 		}
// 		else
// 		{
// 			$query = "INSERT INTO  `user_info`(`user_id`, `user_email`, `user_name`, `user_password`, `gender`, `phone_number`, `user_type`)
// 			 VALUES ('$id','$email','$name','$password','$gender','$phone_number','user')";	

// 			mysqli_query($conn, $query);

// 			// get id of the created user
			

// 			$logged_in_user_id = mysqli_insert_id($conn);

// 			$_SESSION['user'] = getUserById($logged_in_user_id); 

// 			// data is entered as a user in database

// 			$_SESSION['success']  = "New user successfully created!!";
// 			// header('location: login.php');
// 		}
// 	}

// 	// if (move_uploaded_file($_FILES['image']['tmp_name'], $folder)){
// 	// 	echo "image uploaded ";
// 	//     }else
// 	//     {
// 	//     	echo "image not uploaded";
// 	//     }
  
// }

function getUserById($id)
  {
	global $conn;
	$query = "SELECT * FROM `user_info` WHERE user_id =" . $id;
	$result = mysqli_query($conn, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
  }



  function e($val)
  {
	global $conn;
	return mysqli_real_escape_string($conn, trim($val));
  }


function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<script>alert("';
		foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '")</script>';
	}
}	



// login process

// login function 

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked

// if (isset($_POST['logout'])) {
// 	session_destroy();
// 	unset($_SESSION['user']);
// 	header("location: index.php");
// }

if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $conn, $username, $errors;


	// grap form values
	// $id = $_POST['id'];
	$email            = $_POST['email'];
	$password = $_POST['password'];


	// make sure form is filled properly
	if (empty($email)) {
		array_push($errors, "is is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}


	// attempt login if no errors on form
	if (count($errors) == 0){

		$query = "SELECT * FROM `user_info` WHERE user_email ='$email' AND user_password='$password' LIMIT 1";
		$results = mysqli_query($conn, $query);


		if (mysqli_num_rows($results) == 1) 
		{ // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			
			if ($logged_in_user['user_type'] == 'admin') 
			{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin_main_page.php');	

			}elseif($logged_in_user['user_type'] == 'user')
			{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				// header('location:  filter_cards.php');
			}elseif($logged_in_user['user_type'] == 'teacher')
			{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location:  teacher_main_page.php');
			}
			elseif($logged_in_user['user_type'] == 'clerk')
			{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location:  clerk_main_page.php');
			}
			elseif($logged_in_user['user_type'] == 'Section_Head')
			{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				// header('location:  section_head_main_page.php');
				echo '<script>alert("You are now logged in")</script>';
				echo '<script>window.location="section_head_main_page.php"</script>';
			}
			elseif($logged_in_user['user_type'] == 'Middle_Section_Head')
			{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				// header('location:  section_head_main_page.php');
				echo '<script>alert("You are now logged in")</script>';
				echo '<script>window.location="section_head_main_page.php"</script>';
			}
			elseif($logged_in_user['user_type'] == 'High_Section_Head')
			{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				// header('location:  section_head_main_page.php');
				echo '<script>alert("You are now logged in")</script>';
				echo '<script>window.location="section_head_main_page.php"</script>';
			}
			elseif($logged_in_user['user_type'] == 'Principal')
			{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location:  principal_main_page.php');
			}
			elseif($logged_in_user['user_type'] == 'district_officer')
			{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location:  district_officer_main_page.php');
			}
			else
			{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				// header('location:  gsm_admin.php');
			}
			// at the end last else will be error alert to shpw id password  is wrong
		}else
		   {
			array_push($errors, "Wrong username/password combination");
		   }
		}			  
}




?> 