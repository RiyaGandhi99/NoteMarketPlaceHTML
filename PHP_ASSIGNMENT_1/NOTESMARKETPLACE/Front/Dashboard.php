<!-- Header -->
<?php ob_start(); ?>
<?php include "Header.php"; ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>

<script type="text/javascript">
        function DELETE(){
            if(confirm("Are you sure, you want to delete this note?")){
                return true;
            }else{
                return false;
            }
        } 
</script>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-light navbar-expand-lg  white-nav-top fixed-top">
            <div class="container">
                <a id="user-header" class="navbar-brand" href="#">
                    <img src="images/Homepage/logo.png" alt="Logo" class="img-responsive">
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-current="true" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Mobile Menu Close Button -->
                <span id="mobile-nav-close-btn">&times;</span>
               
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="Search_Notes.html"><span>Search</span><span class="space">Notes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sell<span>Your</span><span class="space">Notes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Buyer_Requests.html"><span>Buyer</span><span class="space">Requests</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FAQ.html">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contact_Us.html"><span>Contact</span><span class="space">Us</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle user-img dropbtn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/Homepage/user-img.png" alt="User-Photo" class="rounded-circle img-responsive"></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../Admin/My_Profile.html">My Profile</a>
                                <a class="dropdown-item" href="My_Downloads.html">My Downloads</a>
                                <a class="dropdown-item" href="My_Sold_Notes.html">My Sold Notes</a>
                                <a class="dropdown-item" href="My_Rejected_Notes.html">My Rejected Notes</a>
                                <a class="dropdown-item" href="Change_Password.html">Change Password</a>
                                <a class="dropdown-item" href="#">LOGOUT</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0">
                                <button class="btn btn-outline-success my-2 my-sm-0 btn-Blue" type="submit">Logout</button>
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header ENDS -->
    
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
                            
                        <form>
                            <button type="submit" class="btn btn-info btn-Blue">Add Notes</button>
                        </form>
                       
                    </div>

                </div>
                
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
                        
                        
                        if(isset($_GET['page'])){
                            $Page = $_GET['page'];
                        }else{
                            $Page = "";
                        }
                        
                        if($Page=="" || $Page==1){
                            $Page_1=0;
                        }else{
                            $Page_1 = ($Page*5)-5;
                        }
                        
                        $query = "SELECT * FROM sellernotes AS sn LEFT JOIN categories AS cg ON sn.Category=cg.ID WHERE Status IN (6,7,8) ";
                        if(isset($_GET['In_Progress_Notes'])){
                            $Search = $_GET['search_in_progress_notes'];
                            
                            $query .= "AND (sn.Title LIKE '%$Search%' ";
                            $query .= "OR cg.Name LIKE '%$Search%') ";
                        }
                        $Count_Row = mysqli_query($connection,$query);
                        $Count = mysqli_num_rows($Count_Row);
                        
                        $CountSearch = ceil($Count/5); 
                        
                            
                        $query = "SELECT * FROM sellernotes AS sn LEFT JOIN categories AS cg ON sn.Category=cg.ID WHERE Status IN (6,7,8) ";
                        if(isset($_GET['In_Progress_Notes'])){
                            $Search = $_GET['search_in_progress_notes'];
                            
                            $query .= "AND (sn.Title LIKE '%$Search%' ";
                            $query .= "OR cg.Name LIKE '%$Search%') ";
                        }
                        $query .= "LIMIT $Page_1,5";
                        
                    ?> 
               
                <form action="" method="get">
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
                                        <input type="text" name="search_in_progress_notes" class="form-control" placeholder="Search">
                                    </div>

                                </div>
                                <div class="col-md-3 col-sm-6 col-6">

                                    <button type="submit" name="In_Progress_Notes" class="btn btn-info btn-Blue">Search</button>

                                </div>

                            </div>
                        </div>


                    </div>
                </form>
                
                <div class="row in-progress-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">

                    <div class="table-responsive">
                        <table class="table">
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
                                $Search_all = mysqli_query($connection,$query);
                                if(!$Search_all){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                                
                                
                                if(mysqli_num_rows($Search_all)==0){
                                    echo "<tr><td colspan='5' class='text-center'><h1>Data Not Found</h1></td></tr>";
                                }else{
                                    while($row =mysqli_fetch_assoc($Search_all)){
                                        $Status = $row['Status'];
                                        $CreatedDate = $row['CreatedDate'];
                                        $Title = $row['Title'];
                                        $Category = $row['Category'];
                                        
                                        
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
                                            
                                                echo "<td><a href='Notes_Details.php?EYE=$ID'><img src='images/tables/eye.png' alt='Eye'></a></tr>";
                                        }
                                    }
                                }
                                
                            ?>
                                
                            
                            </tbody>
                        </table>
                    </div>

                    </div>

                </div>

                <div class="row in-progress-notes-row justify-content-center">

                    <div class="col-md-12 col-sm-12 col-12">

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&lt;</span>
                                    </a>
                                </li>
                                
                                <?php
                                    
                                    for($i=1 ; $i<=$CountSearch ; $i++){
                                        if($i == $Page || $Page=="" && $i == 1){
                                            echo "<li class='page-item active' aria-current='page'><a class='page-link' href='Dashboard.php?page={$i}'>{$i}</a></li>";
                                        }else{
                                            echo "<li class='page-item' aria-current='page'><a class='page-link' href='Dashboard.php?page={$i}'>{$i}</a></li>";
                                        }
                                    }
                                
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&gt;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

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

                <?php
                        
                        if(isset($_GET['Published_Page'])){
                            $Page = $_GET['Published_Page'];
                        }else{
                            $Page = "";
                        }
                        
                        if($Page=="" || $Page==1){
                            $Page_1=0;
                        }else{
                            $Page_1 = ($Page*5)-5;
                        }
                        
                        
                        $query = "SELECT * FROM sellernotes AS sn LEFT JOIN categories AS cg ON sn.Category=cg.ID WHERE sn.Status='9' ";
                        if(isset($_GET['Published_Notes'])){
                            $Search = $_GET['search_published_notes'];
                            
                            $query .= "AND (sn.Title LIKE '%$Search%' ";
                            $query .= "OR cg.Name LIKE '%$Search%' ";
                            $query .= "OR sn.SellingPrice LIKE '%$Search%')";
                        }
                        $Count_Row = mysqli_query($connection,$query);
                        $Count = mysqli_num_rows($Count_Row);
                        
                        $CountSearch = ceil($Count/5); 
                        
                        
                        
                        
                        $query = "SELECT * FROM sellernotes AS sn LEFT JOIN categories AS cg ON sn.Category=cg.ID WHERE sn.Status='9' ";
                        if(isset($_GET['Published_Notes'])){
                            $Search = $_GET['search_published_notes'];
                            
                            $query .= "AND (sn.Title LIKE '%$Search%' ";
                            $query .= "OR cg.Name LIKE '%$Search%' ";
                            $query .= "OR sn.SellingPrice LIKE '%$Search%')";
                        }
                        $query .= "  LIMIT $Page_1,5";
                
                        
                    ?> 
               
               
               
               
                <form action="" method="get">
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
                                        <input type="text" name="search_published_notes" class="form-control" placeholder="Search">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-6">
                                    <button type="submit" name="Published_Notes" class="btn btn-info btn-Blue">Search</button>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
                
                <div class="row published-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">

                    <div class="table-responsive">
                        <table class="table">
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
                                $Search_all = mysqli_query($connection,$query);
                                if(!$Search_all){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                                
                                if(mysqli_num_rows($Search_all)==0){
                                    echo "<tr><td colspan='6' class='text-center'><h1>Data Not Found</h1></td></tr>";
                                }else{
                                    while($row =mysqli_fetch_assoc($Search_all)){
                                        $IsPaid = $row['IsPaid'];
                                        $CreatedDate = $row['CreatedDate'];
                                        $Title = $row['Title'];
                                        $Category = $row['Category'];
                                        $SellingPrice = $row['SellingPrice'];
                                        
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
                                                <td><a href='Notes_Details.php?EYE=$ID'><img src='images/tables/eye.png' alt='Eye'></a></tr>";

                                    }
                                }
                                
                            ?>
                              
                            </tbody>
                        </table>
                    </div>

                    </div>

                </div>

                <div class="row published-notes-row justify-content-center">

                    <div class="col-md-12 col-sm-12 col-12">

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&lt;</span>
                                    </a>
                                </li>
                                
                                <?php
                                    
                                    for($i=1 ; $i<=$CountSearch ; $i++){
                                        if($i == $Page || $Page=="" && $i == 1){
                                            echo "<li class='page-item active' aria-current='page'><a class='page-link' href='Dashboard.php?Published_Page={$i}'>{$i}</a></li>";
                                        }else{
                                            echo "<li class='page-item' aria-current='page'><a class='page-link' href='Dashboard.php?Published_Page={$i}'>{$i}</a></li>";
                                        }
                                    }
                                
                                ?>
                                
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&gt;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>

                </div>
            </div>
        </div>

    </section>
    <!-- Published Notes ENDS -->
    
    
    
    
<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->