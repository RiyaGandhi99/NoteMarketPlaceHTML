<!-- Header -->
<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>    
    
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
     
        var table = $('#type_table').DataTable({
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
                "targets": [6],
                "orderable": false, 
            }]
        });
        
        $('#Manage_Type').on('click', function () {
            var type = document.getElementById("Search_Type");
            table.search( type.value ).draw();
        });
        
        
    });
    
    function DELETE(){
        if(confirm("“Are you sure you want to make this type inactive?”")){
            return true;
        }else{
            return false;
        }
    }
    
</script> 
     
     
    <?php   
        
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
            include "Header.php"; 
        }else{
            header("Location: ../Login.php");
        }
        
    ?>


    <!-- Manage Type -->
    <section id="manage-type">

        <div class="content-box-lg">
            
            <div class="container">
            <?php
                
                if(isset($_GET['delete'])){
                    $ID = $_GET['delete'];
                    
                    $query = "UPDATE types SET IsActive=0 WHERE ID=$ID";
                    $Delete_Type = mysqli_query($connection,$query);
                    if(!$Delete_Type){
                        die("Query failed". mysqli_error($connection));   
                    }
                    
                }
            
            ?>
               
                <form action="" method="post">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-12 text-left">

                            <div class="horizontal-heading">
                                <h2>Manage Type</h2>
                            </div>

                        </div>

                    </div>
                    <div class="row manage-type-row">

                        <div class="col-md-6 col-sm-6 col-6">
                            <a href="Add_Type.php"><button type="button" class="btn btn-info btn-rich-blue">Add Type</button></a>
                        </div>

                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="row">
                                <div class="col-md-9 col-sm-6 col-6">
                                    <div class="form-group text-left">
                                        <input type="text" id="Search_Type" name="Search_Type" class="form-control" placeholder="Search">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-6">
                                    <button type="button" id="Manage_Type"
                                    name="Manage_Type" class="btn btn-info btn-Blue">Search</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
                <div class="row manage-type-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table table-hover" id="type_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SR.NO</th>
                                        <th scope="col">TYPE</th>
                                        <th scope="col">DESCRIPTION</th>
                                        <th scope="col">DATE ADDED</th>
                                        <th scope="col">ADDED BY</th>
                                        <th scope="col">ACTIVE</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                            <?php
                                    
                                $query = "SELECT * FROM types ";
                                $Search_all = mysqli_query($connection,$query);
                                if(!$Search_all){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                                
                                
                                if(mysqli_num_rows($Search_all)!=0){
                                    $j=1;
                                    while($row =mysqli_fetch_assoc($Search_all)){
                                        $ID = $row['ID'];
                                        $Name = $row['Name'];
                                        $CreatedDate = $row['CreatedDate'];
                                        $Description = $row['Description'];
                                        $IsActive = $row['IsActive'];
                                        
                                        echo "<tr><td>$j</td>
                                                <td>$Name</td>
                                                <td>$Description</td>
                                                <td>$CreatedDate</td>
                                                <td>Riya Gandhi</td>";
                                        
                                        if(isset($_GET['delete']) && $_GET['delete']==$ID || $IsActive==0){
                                            echo "<td>NO</td>";
                                        }else{
                                            echo "<td>Yes</td>";
                                        }
                                        echo "<td><a href='Add_Type.php?edit=$ID'><img src='images/Dashboard/edit.png' alt='Edit'></a><a href='Manage_Type.php?delete=$ID' onclick='return DELETE()'><img src='images/Dashboard/delete.png' alt='Delete'></a></td></tr>";
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
    <!-- Manage Type ENDS -->


<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->  