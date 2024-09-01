<?php include('conn.php'); 
// include('header.php');


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
<!-- <link rel="stylesheet" href="bst.css"> -->


</head>

<body>

    <!-- Edit Product -->
    <div class="modal fade" id="leave<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                                            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-lebel="Close"> </button>
                    <center>
                        <h4 class="modal-title" id="myModalLabel">Edit Information</h4>
                    </center>
                </div>
                <div class="modal-body">
                   
                            <?php
                            $user_id = $row['user_id'];

                             $sql = "SELECT * FROM leave_record where user_id ='$user_id'";
                             $info = mysqli_query($conn, $sql);
                             if (mysqli_num_rows($info) > 0)
                    {
                        $sno = 1;
                             while($row = mysqli_fetch_assoc($info))
                         {
                            ?>


                            <table>
                                <thead>
                                    <tr>
                                        <th>Sr.#</th>
                                        <th>Leave</th>
                                        <th>Leave Detail</th>
                                        <th>Date - time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php echo "<th>".($sno++)."</th>"; ?>
                                        <td><?php echo $row['   lea_status'];?></td>

                                        <td>
                                            <?php echo $row['lea_detail'];?>
                                        </td>

                                        <td><?php echo $row['date_time'];?></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                            <?php 
                        }
                    }
                    else{
                        echo 'NO Record found';
                    }


                            ?>
                                   
                              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span
                            class="glyphicon glyphicon-remove"></span> Close</button>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span>   
                     Update</button>
                    
                </div>
            <!-- </form> -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

   
</body>

</html>