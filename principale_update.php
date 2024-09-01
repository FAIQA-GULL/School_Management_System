<?php
	include('conn.php');

  

    $id=$_GET['product'];

    $pname=$_POST['pname'];
    $NIC  =$_POST['NIC'];
    $attendance=$_POST['attendance'];
    // $phone=$_POST['phone'];
    // $user_type=$_POST['user_type'];
    // $pname=$_POST['pname'];


    // UPDATE attendance ,user_info SET attendance.attendance = 'present' , user_info.NIC=123456789 WHERE user_info.user_id = attendance.user_id


    // UPDATE attendance A    INNER JOIN user_info B    ON A.user_id = B.user_id SET A.attendance = 'present' ,B.NIC = 123 WHERE B.user_id=2



    $sql = "UPDATE attendance ,user_info SET attendance.attendance='$attendance', user_info.user_name='$pname',user_info.NIC='$NIC' WHERE user_info.user_id='$id'";
    

   $addResult = mysqli_query($conn, $sql);

   if($addResult)
            {
                if(mysqli_affected_rows($conn) > 0)
                    {
                        echo '<script>alert("Data Updated!")</script>';
                        // header('location:check_student_detail.php');
                        echo '<script>window.location="check_principal_info.php"</script>';
                    }
            }
            else
                {
                    echo '<script>alert("connection error")</script>';
                }

 
       // header('location:check_teacher_info.php');
?>