<?php
	include('conn.php');

  

    $id=$_GET['product'];

    $pname=$_POST['pname'];
    $NIC  =$_POST['NIC'];
    $attendance=$_POST['attendance'];
    


    // UPDATE attendance ,user_info SET attendance.attendance = 'present' , user_info.NIC=123456789 WHERE user_info.user_id = attendance.user_id


    // UPDATE attendance A    INNER JOIN user_info B    ON A.user_id = B.user_id SET A.attendance = 'present' ,B.NIC = 123 WHERE B.user_id=2






      $check_Pid = "SELECT * from attendance where user_id ='$id' AND date_time = CURRENT_DATE()";

           $check = mysqli_query($conn, $check_Pid);
           if (mysqli_num_rows($check)>0)
           {

            $sql = "UPDATE attendance ,user_info SET attendance.attendance='$attendance', user_info.user_name='$pname',user_info.NIC='$NIC' WHERE user_info.user_id='$id' AND attendance.user_id = '$id' AND attendance.date_time=CURRENT_DATE()";
    

            $addResult = mysqli_query($conn, $sql);

            echo '<script>alert("Data Updated!")</script>';
                      
            echo '<script>window.location="check_teacher_info.php"</script>';



           }
           else
           {
            $sql = "INSERT INTO `attendance` ( `attendance`, `user_id`) VALUES ('Present',' $id')";

            $query = mysqli_query($conn , $sql); 

       
            echo '<script>alert("Attendance Marked!")</script>';
            echo '<script>window.location="check_teacher_info.php"</script>';
          

           }

            // if($addResult)
            // {
            //     if(mysqli_affected_rows($conn) > 0)
            //         {
            //             echo '<script>alert("Data Updated!")</script>';
                       
            //             echo '<script>window.location="check_teacher_info.php"</script>';
            //         }
            // }
            // else
            // {
            //     echo '<script>alert("connection error")</script>';
            // }

 
       // header('location:check_teacher_info.php');
?>

























<!-- $check_Pid = "SELECT * from attendance where user_id ='$Uid' AND date_time = CURRENT_DATE()";

           $check = mysqli_query($conn, $check_Pid);
           if (mysqli_num_rows($check)>0)
           {
    // UPDATE `attendance` SET `att_id`=[value-1],`attendance`=[value-2],`user_id`=[value-3],`date_time`=[value-4] WHERE 1

           $sql ="UPDATE `attendance` SET `attendance`='Present'
           WHERE `user_id`='$Uid' and `date_time`= CURRENT_DATE()";

           $query = mysqli_query($conn , $sql); 

           echo '<script>alert("Attendance Marked!")</script>';
            echo '<script>window.location="section_head_main_page.php"</script>';
      
            }
            else
            {

            $sql = "INSERT INTO `attendance` ( `attendance`, `user_id`) VALUES ('Present','$Uid')";

            $query = mysqli_query($conn , $sql); 

       
            echo '<script>alert("Attendance Marked!")</script>';
            echo '<script>window.location="section_head_main_page.php"</script>';
          
      }
   
  }
}
 -->