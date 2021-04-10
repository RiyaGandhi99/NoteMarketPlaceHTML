<!-- Header -->
<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>    
    
    
    <?php   
        
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
            include "Header.php"; 
        }else{
            header("Location: ../Login.php");
        }
        
    ?>
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
         
        var table = $('#category_table').DataTable({
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
        
        
        $('#Manage_Category').on('click', function () {
            var category = document.getElementById("Search_Category");
            table.search( category.value ).draw();
        });
        
    });
    
    function DELETE(){
        if(confirm("“Are you sure you want to make this Category inactive?”")){
            return true;
        }else{
            return false;
        }
    }
    
</script>
    
    
    <!-- Manage Category -->
    <section id="manage-category">

        <div class="content-box-lg">

            <div class="container">

            <?php
                
                if(isset($_GET['delete'])){
                    $ID = $_GET['delete'];
                    
                    $query = "UPDATE categories SET IsActive=0 WHERE ID=$ID";
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
                                <h2>Manage Category</h2>
                            </div>

                        </div>

                    </div>
                    <div class="row manage-category-row">

                        <div class="col-md-6 col-sm-6 col-6">
                            <a href="Add_Category.php"><button type="button" class="btn btn-info btn-rich-blue">Add Category</button></a>
                        </div>

                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="row">
                                <div class="col-md-9 col-sm-6 col-6">
                                    <div class="form-group text-left">
                                        <input type="text" name="Search_Category" id="Search_Category" class="form-control" placeholder="Search">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-6">
                                    <button type="button" name="Manage_Category" id="Manage_Category" class="btn btn-info btn-Blue">Search</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
                    
                    
                    
                <div class="row manage-category-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table" id="category_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SR.NO</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">DESCRIPTION</th>
                                        <th scope="col">DATE ADDED</th>
                                        <th scope="col">ADDED BY</th>
                                        <th scope="col">ACTIVE</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                            <?php 
                                    
                                $query = "SELECT * FROM categories ";
                                    
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
                                                <td></td>";
                                        
                                        if(isset($_GET['delete']) && $_GET['delete']==$ID || $IsActive==0){
                                            echo "<td>NO</td>";
                                        }else{
                                            echo "<td>Yes</td>";
                                        }
                                        echo "<td><a href='Add_Category.php?edit=$ID'><img src='images/Dashboard/edit.png' alt='Edit'></a><a href='Manage_Category.php?delete=$ID' onclick='return DELETE()'><img src='images/Dashboard/delete.png' alt='Delete'></a></td></tr>";
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
    <!-- Manage Category ENDS -->

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->    