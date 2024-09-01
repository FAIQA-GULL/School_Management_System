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
    <div class="modal fade" id="editproduct<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                 <form method="POST" action="principale_update.php?product=<?php echo $row['user_id']; ?>"
                            >
                            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-lebel="Close"> </button>
                    <center>
                        <h4 class="modal-title" id="myModalLabel">Edit Information</h4>
                    </center>
                </div>
                <div class="modal-body">
                   
                       
                            
                                <label >Name:</label>
                                    
                                    <input type="text" class="form-control" value="<?php echo $row['user_name']; ?>"
                                            name="pname">

                                <label >NIC No:</label>
                                    
                                    <input type="text" class="form-control" value="<?php echo $row['NIC']; ?>"
                                            name="NIC">

                                <label >Attendance:</label>
                                    
                                    <!-- <input type="text" class="form-control" value="<?php echo $row['attendance']; ?>"
                                            name="attendance">
 -->
                            <select name="attendance" class="form-control">
                                <option value="Absent">Absent</option>
                                <option value="Present">present</option>
                            </select>

                                <!-- <label >Leave Record:</label>
                                    
                                    <input type="text" class="form-control" value="<?php echo $row['phone_number']; ?>"
                                            name="phone"> -->

                              
                                   
                              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span
                            class="glyphicon glyphicon-remove"></span> Close</button>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span>   
                     Update</button>
                    
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- Delete principal -->
    <div class="modal fade" id="deleteproduct<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center>
                        <h4 class="modal-title" id="myModalLabel">Delete Information</h4>
                    </center>
                </div>
                <div class="modal-body">
                    <h2 class="text-center"><?php echo $row['user_name']; ?></h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span
                            class="glyphicon glyphicon-remove"></span> Close</button>
                    <a href="delete_principale.php?product=<?php echo $row['user_id']; ?>"  class="btn btn-danger"><span
                            class="glyphicon glyphicon-trash"></span> Yes</a>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</body>

</html>