<!-- Header -->
<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
         
        //In_Progress_Notes table
        var table1 = $('#In_Progress_Notes_table').DataTable({
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
                "targets": [4],
                "orderable": false, 
            }]
        });
        
        
        $('#In_Progress_Notes').on('click', function () {
            var in_progress = document.getElementById("search_in_progress_notes");
            table1.search( in_progress.value ).draw();
        });
        
        //Published_Notes table
        var table2 = $('#Published_Notes_table').DataTable({
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
                "targets": [5],
                "orderable": false, 
            }]
        });
        
        
        $('#Published_Notes').on('click', function () {
            var published = document.getElementById("search_published_notes");
            table2.search( published.value ).draw();
        });
    });
        
        function DELETE(){
            if(confirm("Are you sure, you want to delete this note?")){
                return true;
            }else{
                return false;
            }
        } 
</script>
   
    <?php   
        
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
            include "Registered_Header.php"; 
        }else{
            header("Location: Login.php");
        }
        
    ?>
    
    <!-- Dashboard -->
    <section id="dashboard-notes">

        <div class="content-box-lg">

            <div class="container">

                <div class="row dashboard-notes-row">

                    <div class="col-md-6 col-sm-6 col-6">
                    
                        <div class="horizontal-heading">
                            <h2>Dashboard</h2>
                        </div>
                    
                    </div>
                    
                    <div class="col-md-6 col-sm-6 col-6 text-right">
                            
                            <a href="Add_Notes.php"><button type="submit" class="btn btn-info btn-Blue">Add Notes</button></a>
                       
                    </div>

                </div>
                <?php
                
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
                        
                        $EmailID = $_SESSION['EmailID'];
                        $query = "SELECT * FROM users WHERE EmailID='{$EmailID}'"; 
                        $User_ID = mysqli_query($connection,$query);
                        if($row = mysqli_fetch_assoc($User_ID)){
                            $UserID = $row['ID'];
                        }else{
                            die("Query Failed" . mysqli_error($connection));
                        }
                    }
                ?>
                
                <div class="row dashboard-notes-row">

                    <div class="col-md-12 col-sm-12 col-12 text-center">
                        
                        <div class="row">
                            <div class="col-md-2 col-sm-6 col-6">
                                <img src="images/Dashboard/my-earning.png" alt="Earning Image">
                                <h4>My Earning</h4>
                            </div>
                            <div class="col-md-4 col-sm-6 col-6">
                                <span><h4>100</h4>
                                <p>Number Of Notes Sold</p></span>
                                <span><h4>$10,00,000</h4>
                                <p>Money Earned</p></span>
                            </div>
                            <div class="col-md-1 col-sm-10 col-10 dashboard-gap">
                                <h4>38</h4>
                                <p>My Downloads</p>
                            </div>
                            <div class="col-md-2 col-sm-10 col-10 dashboard-gap">
                                <h4>12</h4>
                                <p>My Rejected<br>Notes</p>
                            </div>
                            <div class="col-md-2 col-sm-10 col-10 dashboard-gap">
                                <h4>104</h4>
                                <p>Buyer Requests</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Dashboard ENDS -->
    
    <!-- In Progress Notes -->
    <section id="in-progress-notes">

        <div class="content-box-xs">

            <div class="container">
                 
                    <?php
                        
                        if(isset($_GET['delete'])){
                            $ID = $_GET['delete'];
                                   
                            $query = "DELETE FROM sellernotes WHERE ID=$ID";
                            $Delete_all = mysqli_query($connection,$query);
                            if(!$Delete_all){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location: Dashboard.php");    
                        }
                        
                        
                    ?> 
               
                <form action="" method="post">
                    <div class="row in-progress-notes-row">

                        <div class="col-md-6 col-sm-6 col-6">

                            <div class="horizontal-heading">
                                <h2>In Progress Notes</h2>
                            </div>

                        </div>

                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="row">
                                <div class="col-md-9 col-sm-6 col-6">

                                    <div class="form-group">
                                        <input type="text" id="search_in_progress_notes" name="search_in_progress_notes" class="form-control" placeholder="Search">
                                    </div>

                                </div>
                                <div class="col-md-3 col-sm-6 col-6">

                                    <button type="button" id="In_Progress_Notes" name="In_Progress_Notes" class="btn btn-info btn-Blue">Search</button>

                                </div>

                            </div>
                        </div>


                    </div>
                </form>
                
                <div class="row in-progress-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">

                    <div class="table-responsive">
                        <table class="table table-hover datatable" id="In_Progress_Notes_table">
                            <thead>
                                <tr>
                                    <th scope="col">ADDED DATE</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>  
                                
                        <?php
                                
                                $query = "SELECT * FROM sellernotes WHERE Status IN (6,7,8) AND SellerID=$UserID AND IsActive=1 ORDER BY CreatedDate DESC";
                                
                                
                                $Search_all = mysqli_query($connection,$query);
                                if(!$Search_all){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                                
                                
                                if(mysqli_num_rows($Search_all)!=0){
                                    while($row =mysqli_fetch_assoc($Search_all)){
                                        $Status = $row['Status'];
                                        $CDate = $row['CreatedDate'];
                                        $Title = $row['Title'];
                                        $Category = $row['Category'];
                                        
                                        $CreatedDate = date('d-m-Y',strtotime($CDate));
                                        
                                        
                                        $query = "SELECT * FROM referencedata WHERE ID=$Status";
                                        $Status_select = mysqli_query($connection,$query);
                                        if($row =mysqli_fetch_assoc($Status_select)){
                                            $Status = $row['Value'];
                                        }else{
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        
                                        $query = "SELECT * FROM categories WHERE ID=$Category";
                                        $Category_select = mysqli_query($connection,$query);
                                        if($row =mysqli_fetch_assoc($Category_select)){
                                            $Category = $row['Name'];
                                        }else{
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        
                                        $query = "SELECT * FROM sellernotes WHERE Title='{$Title}'";
                                        $ID_select = mysqli_query($connection,$query);
                                        if($row =mysqli_fetch_assoc($ID_select)){
                                            $ID = $row['ID'];
                                        }else{
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        
                                        
                                        echo "<tr><td>$CreatedDate</td>
                                                <td>$Title</td>
                                                <td>$Category</td>
                                                <td>$Status</td>";
                                            
                                        
                                        if($Status=='Draft'){
                                                echo "<td><a href='Edit_Notes.php?edit=$ID'><img src='images/Dashboard/edit.png' alt='Edit'></a><a href='?delete=$ID' onclick='return DELETE()'><img src='images/Dashboard/delete.png' alt='Delete'></a></td></tr>";
                                        }else{
                                            
                                                echo "<td><a href='Notes_Details.php?Note=$ID'><img src='images/tables/eye.png' alt='Eye'></a></td></tr>";
                                        }
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
    <!-- In Progress Notes ENDS -->

    <!-- Published Notes -->
    <section id="published-notes">

        <div class="content-box-xs">

            <div class="container">

                <form action="" method="post">
                    <div class="row published-notes-row">

                        <div class="col-md-6 col-sm-6 col-6">

                            <div class="horizontal-heading">
                                <h2>Published Notes</h2>
                            </div>

                        </div>

                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="row">
                                <div class="col-md-9 col-sm-6 col-6">
                                    <div class="form-group">
                                        <input type="text" id="search_published_notes" name="search_published_notes" class="form-control" placeholder="Search">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-6">
                                    <button type="button" id="Published_Notes" name="Published_Notes" class="btn btn-info btn-Blue">Search</button>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
                
                <div class="row published-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">

                    <div class="table-responsive">
                        <table class="table table-hover" id="Published_Notes_table">
                            <thead>
                                <tr>
                                    <th scope="col">ADDED DATE</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">SELL TYPE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                    <?php
                                
                                $query = "SELECT * FROM sellernotes WHERE Status='9' AND SellerID=$UserID AND IsActive=1 ORDER BY CreatedDate DESC";
                                
                                $Search_all = mysqli_query($connection,$query);
                                if(!$Search_all){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                                
                                if(mysqli_num_rows($Search_all)!=0){
                                    while($row =mysqli_fetch_assoc($Search_all)){
                                        $IsPaid = $row['IsPaid'];
                                        $CDate = $row['CreatedDate'];
                                        $Title = $row['Title'];
                                        $Category = $row['Category'];
                                        $SellingPrice = $row['SellingPrice'];
                                        $CreatedDate = date('d-m-Y',strtotime($CDate));
                                        
                                        if($IsPaid==1){
                                            $query = "SELECT * FROM referencedata WHERE ID=4";
                                        }else{
                                            $query = "SELECT * FROM referencedata WHERE ID=5";
                                        }
                                        $Status_select = mysqli_query($connection,$query);
                                        if($row =mysqli_fetch_assoc($Status_select)){
                                            $SellType = $row['Value'];
                                        }else{
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        
                                        $query = "SELECT * FROM categories WHERE ID=$Category";
                                        $Category_select = mysqli_query($connection,$query);
                                        if($row =mysqli_fetch_assoc($Category_select)){
                                            $Category = $row['Name'];
                                        }else{
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        
                                        $query = "SELECT * FROM sellernotes WHERE Title='{$Title}'";
                                        $ID_select = mysqli_query($connection,$query);
                                        if($row =mysqli_fetch_assoc($ID_select)){
                                            $ID = $row['ID'];
                                        }else{
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        
                                        echo "<tr><td>$CreatedDate</td>
                                                <td>$Title</td>
                                                <td>$Category</td>
                                                <td>$SellType</td>
                                                <td>$$SellingPrice</td>
                                                <td><a href='Notes_Details.php?Note=$ID'><img src='images/tables/eye.png' alt='Eye'></a></td>
                                            </tr>";

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
    <!-- Published Notes ENDS -->
    
    
    
    
<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->