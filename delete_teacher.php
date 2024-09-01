<?php
	include('conn.php');

  

    $id=$_GET['product'];

   
    // $price=$_POST['price'];

    // $sql="select * from product where product_id='$id'";
    // $query=$conn->query($sql);
    // $row=$query->fetch_array();

    // $fileinfo=PATHINFO($_FILES["photo"]["name"]);

    // if (empty($fileinfo['filename'])){
    //     $location = $row['photo'];
    // }
    // else{
    //     $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
    //     move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
    //     $location="upload/" . $newFilename;
    // }
    

    // $sql="UPDATE product set product_name='$pname', category_id='$category', product_price='$price', product_photo='$location' 
    // where product_id='$id'";


    $sql = "DELETE FROM `user_info` WHERE `user_id`='$id'";

     $addResult = mysqli_query($conn, $sql);

    if($addResult)
            {
                if(mysqli_affected_rows($conn) > 0)
                    {
                        echo '<script>alert("Data Deleted")</script>';
                        // header('location:check_student_detail.php');
                        echo '<script>window.location="check_teacher_info.php"</script>';
                    }
            }
            else
                {
                    echo '<script>alert("connection error")</script>';
                }

      
      
?>