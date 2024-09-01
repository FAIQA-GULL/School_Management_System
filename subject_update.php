<?php
	include('conn.php');

  

    $id=$_GET['product'];

    $pname=$_POST['pname'];
   
   

    

    // UPDATE `subjects` SET `sub_id`=[value-1],`sub_name`=[value-2],`Section_name`=[value-3] WHERE 1


    $sql = "UPDATE `subjects` SET  `sub_name`='$pname' WHERE `sub_id`='$id'";
    // $conn->query($sql);

     $addResult = mysqli_query($conn, $sql);

   if($addResult)
            {
                if(mysqli_affected_rows($conn) > 0)
                    {
                        echo '<script>alert("Data Updated")</script>';
                        // header('location:check_student_detail.php');
                        echo '<script>window.location="check_subject_detail.php"</script>';
                    }
            }
            else
                {
                    echo '<script>alert("connection error")</script>';
                }

       
?>