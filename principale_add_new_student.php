<?php
include('conn.php');



    $pname=$_POST['pname'];
   
    $fname=$_POST['fname'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
	
	$category=$_POST['category'];

	
// INSERT INTO `student`(`std_id`, `std_name`, `std_father_name`, `std_phone_number`, `std_address`, `section_id`, `user_id`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])

	$sql="INSERT INTO student(std_name, std_father_name, std_phone_number, std_address, section_id) values ('$pname','$fname','$contact','$address', '$category')";
	
	$addResult = mysqli_query($conn, $sql);

   if($addResult)
            {
                if(mysqli_affected_rows($conn) > 0)
                    {
                        echo '<script>alert("New Student Added")</script>';
                        // header('location:check_student_detail.php');
                        echo '<script>window.location="principale_students_info.php"</script>';
                    }
            }
            else
                {
                    echo '<script>alert("connection error")</script>';
                }

       




?>