<!-- Header -->
<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>    

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
         
        var table = $('#Admin_table').DataTable({
            "pageLength": 5,
            "info": false,
            "lengthChange": false,
            "sDom": 'ltipr',
            "pagingType": "simple_numbers",
            "language": {
                "paginate": {
                    "previous": "&lt;",
                    "next": "&gt;"
                }
            },
            "columnDefs": [ {
                "targets": [7],
                "orderable": false, 
            }]
        });
        
        
        $('#Manage_Admin').on('click', function () {
            var Admin = document.getElementById("Search_Admin");
            table.search( Admin.value ).draw();
        });
        
    });
    
    function DELETE(){
        if(confirm("“Are you sure you want to make this administrator inactive?”")){
            return true;
        }else{
            return false;
        }
    }
    
</script>   
 
   <?php   
        
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
            $EmailID =  $_SESSION['EmailID'];
            
            $query = "SELECT * FROM users WHERE EmailID='{$EmailID}' AND RoleID=3";
            $Super_Admin_Select = mysqli_query($connection,$query);
                
            if(!$Super_Admin_Select){
                die("Query Failed" . mysqli_error($connection));
            }
            if(mysqli_num_rows($Super_Admin_Select)==0){
                header("Location: Dashboard.php");
            }else{
                include "Header.php";   
            }
        }else{
            header("Location: ../Login.php");
        }
        
        
    ?>
    
      
    <!-- Manage Administrator -->
    <section id="manage-administrator">

        <div class="content-box-lg">

            <div class="container">
            <?php
                
                if(isset($_GET['delete'])){
                    $ID = $_GET['delete'];
                    
                    $query = "UPDATE users SET IsActive=0 WHERE ID=$ID";
                    $Delete_Admin = mysqli_query($connection,$query);
                    if(!$Delete_Admin){
                        die("Query failed". mysqli_error($connection));   
                    }
                    
                }
            
            ?>
            
            <form action="" method="post">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-12 text-left">

                        <div class="horizontal-heading">
                            <h2>Manage Administrator</h2>
                        </div>

                    </div>

                </div>
                <div class="row manage-administrator-row">

                    <div class="col-md-6 col-sm-6 col-6">

                        <form>
                            <a href="Add_Administrator.php"><button type="button" class="btn btn-info btn-rich-blue">Add Administrator</button></a>
                        </form>

                    </div>

                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="row">
                            <div class="col-md-9 col-sm-6 col-6">
                                    <div class="form-group text-left">
                                        <input type="text" id="Search_Admin" name="Search_Admin" class="form-control" placeholder="Search">
                                    </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-6">
                                    <button type="button" id="Manage_Admin" name="Manage_Admin" class="btn btn-info btn-Blue">Search</button>
                            </div>

                        </div>
                    </div>

                </div>
                </form>
                
                <div class="row manage-administrator-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table table-hover" id="Admin_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SR.NO</th>
                                        <th scope="col">FIRST NAME</th>
                                        <th scope="col">LAST NAME</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">PHONE NO.</th>
                                        <th scope="col">DATE ADDED</th>
                                        <th scope="col">ACTIVE</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                            <?php
                                  
                                $query = "SELECT * FROM users WHERE RoleID=1";
                                $Search_all = mysqli_query($connection,$query);
                                if(!$Search_all){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                                
                                
                                if(mysqli_num_rows($Search_all)!=0){
                                    $j=1;
                                    while($row =mysqli_fetch_assoc($Search_all)){
                                        $ID = $row['ID'];
                                        $FirstName = $row['FirstName'];
                                        $LastName = $row['LastName'];
                                        $EmailID = $row['EmailID'];
                                        $CreatedDate = $row['CreatedDate'];
                                        $IsActive = $row['IsActive'];
                                        
                                        $query = "SELECT * FROM users WHERE ID=$ID";
                                        $Admin_User_Select =
                                        mysqli_query($connection,$query);
                                        if($row = mysqli_fetch_assoc($Admin_User_Select)){
                                            $UserID=$row['ID'];
                                        }
                                        
                                        $query = "SELECT * FROM userprofile WHERE UserID=$UserID";
                                        $Admin_User_Profile_Select =
                                        mysqli_query($connection,$query);
                                        if($row = mysqli_fetch_assoc($Admin_User_Profile_Select)){
                                            $Phonenumber=$row['Phone number'];
                                        }
                                        
                                        
                                        echo "<tr><td>$j</td>
                                                <td>$FirstName</td>
                                                <td>$LastName</td>
                                                <td>$EmailID</td>
                                                <td>$Phonenumber</td>
                                                <td>$CreatedDate</td>";
                                        
                                        if(isset($_GET['delete']) && $_GET['delete']==$ID || $IsActive==0){
                                            echo "<td>NO</td>";
                                        }else{
                                            echo "<td>Yes</td>";
                                        }
                                        echo "<td><a href='Add_Administrator.php?edit=$ID'><img src='images/tables/edit.png' alt='Edit'></a><a href='Manage_Administrator.php?delete=$ID' onclick='return DELETE()'><img src='images/tables/delete.png' alt='Delete'></a></td></tr>";
                                        $j++;
                                    }
                                }   
                                    
                                    
                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Manage Administrator ENDS -->

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->    