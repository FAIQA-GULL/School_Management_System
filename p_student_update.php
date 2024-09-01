<?php
	include('conn.php');

  

    $id=$_GET['product'];

    $pname=$_POST['pname'];
    $fname=$_POST['fname'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    // $user_type=$_POST['user_type'];
    // $pname=$_POST['pname'];


    $section=$_POST['section'];
    // $price=$_POST['price'];

   

    

    // UPDATE `student` SET `std_id`=[value-1],`std_name`=[value-2],`std_father_name`=[value-3],`std_phone_number`=[value-4],`std_address`=[value-5],`section_id`=[value-6],`user_id`=[value-7] WHERE 1


    $sql = "UPDATE `student` SET  `std_name`='$pname',`std_father_name`='$fname',`std_phone_number`='$contact',`std_address`='$address',`section_id`='$section' WHERE `std_id`='$id'";
    // $conn->query($sql);

     $addResult = mysqli_query($conn, $sql);

   if($addResult)
            {
                if(mysqli_affected_rows($conn) > 0)
                    {
                        echo '<script>alert("Data Updated")</script>';
                        // header('location:check_student_detail.php');
                        echo '<script>window.location="principale_students_info.php"</script>';
                    }
            }
            else
                {
                    echo '<script>alert("connection error")</script>';
                }

       
?>