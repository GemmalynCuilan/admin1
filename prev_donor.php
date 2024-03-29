<?php
@session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');
include('includes/scripts.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
form {
  display:inline-block;
  margin: 0 0 5px;

}
</style>
    <script>$(document).ready(function () {
        $('#example').DataTable();
    });
    </script>
    </head>
    <body>
    <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Previous Donor</h6>
                <div id="filters">
                <span>Fetch results by &nbsp;</span>
        <select name="fetchval" id="fetchval">
            <option value="" disabled="" selected="">Select Filter</option>
            
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            
        </select>
        </div>
        </div>
            <?php
                $query = "SELECT * FROM archive_donor";
                $query_run = mysqli_query($connection, $query);
            ?>
               
            <div class="container">

            <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                     <tr>
                        <th style="display:none;"> Indentification No.</th>
                        <th style="display:none;"> ID </th>
                            <th> Lastname</th>
                            <th> Firstname</th>
                            <th style="display:none;"> Middlename</th>
                            <th style="display:none;"> Password</th>
                            <th style="display:none;"> Birthdate </th>
                            <th style="display:none;"> Age </th>
                            <th style="display:none;"> Sex</th>
                            <th> Blood Group</th>
                            <th style="display:none;"> Identification</th>
                            <th style="display:none;"> Street</th>
                            <th style="display:none;"> Barangay</th>
                            <th style="display:none;"> Town/Municipality</th>
                            <th style="display:none;"> City</th>
                            <th style="display:none;"> Zip Code</th>
                            <th> Mobile Number</th>
                            <th> Email Address</th>
                            <th style="display:none;"> Identification ID</th>
                            <th> Status</th>
                            

                           
                        </tr>
                    </thead>
                    <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            
                
                            {
                        ?>
                            <tr>
                            <td style="display:none;"><?php  echo $row['idno']; ?></td>
                            <td style="display:none;"><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['lastname']; ?></td>
                                <td><?php  echo $row['firstname']; ?></td>
                                <td style="display:none;"><?php  echo $row['middlename']; ?></td>
                                <td style="display:none;"><?php  echo $row['password']; ?></td>
                                <td style="display:none;"><?php  echo $row['birthdate']; ?></td>
                                <td style="display:none;"><?php  echo $row['age']; ?></td>
                                <td style="display:none;"><?php  echo $row['sex']; ?></td>
                                <td><?php  echo $row['bloodGroup']; ?></td>
                                <td style="display:none;"><?php  echo $row['identifyno']; ?></td>
                                <td style="display:none;"><?php  echo $row['street']; ?></td>
                                <td style="display:none;"><?php  echo $row['barangay']; ?></td>
                                <td style="display:none;"><?php  echo $row['tm']; ?></td>
                                <td style="display:none;"><?php  echo $row['city']; ?></td>
                                <td style="display:none;"><?php  echo $row['code']; ?></td>
                                <td><?php  echo $row['mobileNumber']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <th style="display:none;"><?php echo '<img src="Images/'.$row['reqimg'].'" width="100px;" height="100px;" alt="Image">'?></td>
                            
                                <td class=" text-center">
                                        <?php if($row['status'] == "active"){
                                            echo '<span class="badge badge-primary">Active</span>';
                                        }else if ($row['status'] == "inactive"){
                                            echo '<span class="badge badge-success">Inactive</span>';
                                        }
                                        ?>	
									</td>
                                
                               
                            </tr>
                        <?php
                        include 'delete_modal.php';
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                        </tbody>
                        
 

                    </table>
             
</body>
</html>
<!-- /.container-fluid -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://ajx.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready( function () {
    $('.table').DataTable();
} );
</script>
    <script>
    $(document).ready( function(){
        $('.updatebtn').on('click',function(){
            $('#updatemodal').modal('show');
        });
    });
</script>

    
    <script type="text/javascript">
        $(document).ready(function(){
            $("#fetchval").on('change',function(){
                var value = $(this).val();
                //alert(value);

                $.ajax({
                    url:"fetch1.php",
                    type:"POST",
                    data:'filter=' +value,
                    beforeSend:function(){
                        $(".container").html("<span>Working...</span>");
                    },
                    success:function(data){
                        $(".container").html(data);
                    }
                });
            });
        });
    </script>
