<!-- Header -->
<?php ob_start(); ?>
<?php include "Header.php"; ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>

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
                            <a class="nav-link active" href="Buyer_Requests.html"><span>Buyer</span><span class="space">Requests</span></a>
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

    <!-- Buyer Requests -->
    <section id="buyer-requests">

        <div class="content-box-lg">

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
                            $Page_1 = ($Page*10)-10;
                        }
                        
                        
                        
                        $query = "SELECT * FROM sellernotes AS sn LEFT JOIN categories AS cg ON sn.Category=cg.ID WHERE sn.Status='9' ";
                        if(isset($_GET['Buyer_Request'])){
                            $Search = $_GET['Search_Buyer_Request'];
                            
                            $query .= "AND (sn.Title LIKE '%$Search%' ";
                            $query .= "OR cg.Name LIKE '%$Search%' ";
                            $query .= "OR sn.SellingPrice LIKE '%$Search%') ";
                            //$query .= "OR Status IN(6,7,8,9,10,11)";
                        }
                        $Count_Row = mysqli_query($connection,$query);
                        $Count = mysqli_num_rows($Count_Row);
                        
                        $CountSearch = ceil($Count/10); 
                        
                        
                        $query = "SELECT * FROM sellernotes AS sn LEFT JOIN categories AS cg ON sn.Category=cg.ID WHERE sn.Status='9' ";
                        if(isset($_GET['Buyer_Request'])){
                            $Search = $_GET['Search_Buyer_Request'];
                            
                            $query .= "AND (sn.Title LIKE '%$Search%' ";
                            $query .= "OR cg.Name LIKE '%$Search%' ";
                            $query .= "OR sn.SellingPrice LIKE '%$Search%') ";
                            //$query .= "OR Status IN(6,7,8,9,10,11)";
                        }
                        $query .= "LIMIT $Page_1,10";
                            
                        
                    ?> 
               
                <form action="" method="get">
                <div class="row buyer-requests-row">

                    <div class="col-md-6 col-sm-6 col-6">

                        <div class="horizontal-heading">
                            <h2>Buyer Requests</h2>
                        </div>

                    </div>

                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="row">
                            <div class="col-md-9 col-sm-6 col-6">
                                    <div class="form-group text-left">
                                        <input type="text" name="Search_Buyer_Request" class="fa fa-search form-control" placeholder="Search">
                                    </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-6">
                                    <button type="submit" name="Buyer_Request" class="btn btn-info btn-Blue">Search</button>
                            </div>

                        </div>
                    </div>

                </div>
                </form>
                
                
                <?php
                
                    if(isset($_GET['email'])){
                        $EmailID = $_GET['email'];
                        
                        $query_user = "SELECT * FROM users WHERE EmailID='$EmailID'";
                        $Users_select = mysqli_query($connection,$query_user);  
                        while($row = mysqli_fetch_assoc($Users_select)){
                            $Name = $row['FirstName'];
                        }
                        $to = $EmailID;
                        
                        $header = "MIME_Version:1.0" . "\r\n";
                        $header .= "Content-type: text/html; charset=iso-8859-1"."\r\n";
                        $header .= 'From: gogoproject2020@gmail.com';
                        
                        $subject = "<Seller Name> Allows you to download a note";
                        
                        $comments = "Hello ". $Name .", <br><br> <p>We would like to inform you that, Seller Name Allows you to download a note.Please login and see My Download tabs to download particular note.</p><br><br>Regards, <br>Notes Marketplace";
                        
                        if(!mail($to,$subject,$comments,$header)){
                            echo "Email Failed";
                        }                        
                        
                        
                    }                
                
                ?>
                
                <div class="row buyer-requests-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SR.NO</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">BUYER</th>
                                        <th scope="col">PHONE NO.</th>
                                        <th scope="col">SELL TYPE</th>
                                        <th scope="col">PRICE</th>
                                        <th scope="col">DOWNLOADED DATE/TIME</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                <?php
                                    
                                    $Search_all = mysqli_query($connection,$query);
                                    if(!$Search_all){
                                        die("Query Failed" . mysqli_error($connection));
                                    }
                                
                                    if(mysqli_num_rows($Search_all)==0){
                                        echo "<tr><td colspan='9' class='text-center'><h1>Data Not Found</h1></td></tr>";
                                    }else{
                                        $j=0;
                                        while($row =mysqli_fetch_assoc($Search_all)){
                                            $IsPaid = $row['IsPaid'];
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
                                            if($row = mysqli_fetch_assoc($ID_select)){
                                                $ID = $row['ID'];
                                            }else{
                                                die("Query Failed" . mysqli_error($connection));
                                            }
                                            
                                            
                                            $j++;
                                            echo "<tr><th scope='row'>$j</th>
                                            <td class='member-Blue''>$Title</td>
                                            <td>$Category</td>
                                            <td>gogoproject2020@gmail.com</td>
                                            <td>+91 9645781512</td>
                                            <td>$SellType</td>
                                            <td>$$SellingPrice</td>
                                            <td>27 Nov 2020,11:24:34</td>
                                            <td>
                                                <a href='Notes_Details.php?EYE=$ID'><img src='images/tables/eye.png' alt='Eye'></a>
                                                <div class='dropdown'>
                                                    <img src='images/tables/dots.png' alt='Setting Image' class='dropbtn'>
                                                    <div class='dropdown-content'>
                                                        <a href='Buyer_Requests.php?email=gandhiriya99@gmail.com'>Yes,I Received</a>
                                                    </div>
                                                </div>
                                            </td></tr>";
                                        }
                                    
                                }
                                
                            ?>
                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>

                <div class="row buyer-requests-row justify-content-center">

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
                                            echo "<li class='page-item active' aria-current='page'><a class='page-link' href='Buyer_Requests.php?Published_Page={$i}'>{$i}</a></li>";
                                        }else{
                                            echo "<li class='page-item' aria-current='page'><a class='page-link' href='Buyer_Requests.php?Published_Page={$i}'>{$i}</a></li>";
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
    <!-- Buyer Requests ENDS -->

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->