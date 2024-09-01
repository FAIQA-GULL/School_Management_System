<?php
	include('conn.php');

  

    $id=$_GET['product'];

    
    // $pname=$_POST['pname'];


    
    
    $sql = "DELETE FROM `user_info` WHERE `user_id`='$id'";
    
   

     $addResult = mysqli_query($conn, $sql);

    if($addResult)
            {
                if(mysqli_affected_rows($conn) > 0)
                    {
                        echo '<script>alert("Data Deleted")</script>';
                        // header('location:check_student_detail.php');
                        echo '<script>window.location="check_principal_info.php"</script>';
                    }
            }
            else
                {
                    echo '<script>alert("connection error")</script>';
                }

       

?>