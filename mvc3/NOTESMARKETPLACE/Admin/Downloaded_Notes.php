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
         
        var table = $('#Download_table').DataTable({
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
                "targets": [4,6,10],
                "orderable": false, 
            }]
        });
        
        
        $('#Download_Notes_btn').on('click', function () {
            var Download = document.getElementById("Search_Download");
            table.search( Download.value ).draw();
        });
        
        $('#NoteTitle').on('change', function () {
            var NoteTitle = document.getElementById("NoteTitle");
            table.columns( 1 ).search( NoteTitle.value ).draw();
        });
        
        $('#Seller').on('change', function () {
            var Seller = document.getElementById("Seller");
            table.columns( 5 ).search( Seller.value ).draw();
        });
        
        $('#Downloader').on('change', function () {
            var Downloader = document.getElementById("Downloader");
            table.columns( 3 ).search( Downloader.value ).draw();
        });
        
    });
    
    
</script>
   
    
    <!-- Downloaded Notes -->
    <section id="downloaded-notes">

        <div class="content-box-lg">

            <div class="container">

                <div class="row downloaded-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="horizontal-heading">
                            <h2>Downloaded Notes</h2>
                        </div>

                    </div>
                </div>

                <div class="row downloaded-notes-row">

                    <div class="col-md-2 col-sm-4 col-3">
                        <div class="form-group text-left">
                            <label for="Notes">Notes</label>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-3">
                        <div class="form-group text-left">
                            <label for="Seller">Seller</label>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-3">
                        <div class="form-group text-left">
                            <label for="Buyer">Buyer</label>
                        </div>
                    </div>
                </div>
                
                <div class="row downloaded-notes-row">

                    <div class="col-md-2 col-sm-4 col-3">
                        <div class="form-group text-left">
                            <select class="form-control" id="NoteTitle">
                                <option value="Select Notes" selected disabled>Select Notes</option>
                            <?php 
                                
                                if(isset($_GET['UserID'])){
                                    $UserID = $_GET['UserID'];
                                    
                                    /*  To fetch specific Download Note (Redirect From Member Page)*/  
                                    $query = "SELECT DISTINCT NoteTitle FROM downloads WHERE Downloader=$UserID AND IsAttachmentDownloaded=1 AND IsActive=1";
                                }else if(isset($_GET['NoteID'])){
                                    $UID = $_GET['NoteID'];
                                    
                                    /*  To fetch specific Download Note (Redirect From Member Page)*/  
                                    $query = "SELECT * FROM downloads WHERE NoteID=$UID AND IsAttachmentDownloaded=1 AND IsActive=1 ORDER BY AttachmentDownloadedDate DESC";
                                }else{
                                    
                                    /*  To fetch All the Download Notes */
                                    $query = "SELECT DISTINCT NoteTitle FROM downloads  WHERE IsAttachmentDownloaded=1 AND IsActive=1";
                                }
                                    $All_Select = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($All_Select)){
                                        $NoteTitle = $row['NoteTitle'];
                                        
                                        echo "<option value=".$NoteTitle.">".$NoteTitle."</option>";
                                    }
                            ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-4 col-3">
                        <div class="form-group text-left">
                            <select class="form-control" id="Seller">
                                <option value="Select Seller" selected disabled>Select Seller</option>
                            <?php 
                                if(isset($_GET['UserID'])){
                                    $UserID = $_GET['UserID'];
                                    
                                    /*  To fetch specific Download Note (Redirect From Member Page)*/  
                                    $query = "SELECT DISTINCT Seller FROM downloads WHERE Downloader=$UserID AND IsAttachmentDownloaded=1 AND IsActive=1";
                                }else if(isset($_GET['NoteID'])){
                                    $UID = $_GET['NoteID'];
                                    
                                    /*  To fetch specific Download Note (Redirect From Member Page)*/  
                                    $query = "SELECT * FROM downloads WHERE NoteID=$UID AND IsAttachmentDownloaded=1 AND IsActive=1 ORDER BY AttachmentDownloadedDate DESC";
                                }else{
                                    
                                    /*  To fetch All the Download Notes */
                                    $query = "SELECT DISTINCT Seller FROM downloads  WHERE IsAttachmentDownloaded=1 AND IsActive=1";
                                }
                                    $All_Select = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($All_Select)){
                                        $SellerID = $row['Seller'];
                                        
                                        $query = "SELECT * FROM users WHERE ID=$SellerID";
                                        $Seller_Select = mysqli_query($connection,$query);
                                        if($row = mysqli_fetch_assoc($Seller_Select)) {
                                            $Seller_FirstName = $row['FirstName'];
                                            $Seller_LastName = $row['LastName'];
                                        }
                                        
                                        echo "<option value=".$Seller_FirstName." ".$Seller_LastName.">".$Seller_FirstName." ".$Seller_LastName."</option>"; 
                                    }
                            ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-2 col-sm-4 col-3">
                        <div class="form-group text-left">
                            <select class="form-control" id="Downloader">
                                <option value="Downloader Seller" selected disabled>Select Downloader</option>
                            <?php   
                                    
                                if(isset($_GET['UserID'])){
                                    $UserID = $_GET['UserID'];
                                    
                                    /*  To fetch specific Download Note (Redirect From Member Page)*/  
                                    $query = "SELECT DISTINCT Downloader FROM downloads WHERE Downloader=$UserID AND IsAttachmentDownloaded=1 AND IsActive=1";
                                }else if(isset($_GET['NoteID'])){
                                    $UID = $_GET['NoteID'];
                                    
                                    /*  To fetch specific Download Note (Redirect From Member Page)*/  
                                    $query = "SELECT * FROM downloads WHERE NoteID=$UID AND IsAttachmentDownloaded=1 AND IsActive=1 ORDER BY AttachmentDownloadedDate DESC";
                                }else{
                                    
                                    /*  To fetch All the Download Notes */
                                    $query = "SELECT DISTINCT Downloader FROM downloads  WHERE IsAttachmentDownloaded=1 AND IsActive=1";
                                }
                                    $All_Select = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($All_Select)){
                                        $DownloaderID = $row['Downloader'];
                        
                                        $query = "SELECT * FROM users WHERE ID=$DownloaderID";
                                        $Download_Select = mysqli_query($connection,$query);
                                        if($row = mysqli_fetch_assoc($Download_Select)) {
                                            $Downloader_FirstName = $row['FirstName'];
                                            $Downloader_LastName = $row['LastName'];
                                        }
                                        
                                        echo "<option value=".$Downloader_FirstName." ".$Downloader_LastName.">".$Downloader_FirstName." ".$Downloader_LastName."</option>"; 
                                    }
                            ?>
                            </select>
                        </div>
                    </div>
                
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-9 col-sm-6 col-6">
                                <div class="form-group text-left">
                                    <input type="text" id="Search_Download" name="Search_Download" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-6">
                                <button type="submit" id="Download_Notes_btn"
                                name="Download_Notes_btn" class="btn btn-info btn-Blue">Search</button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row downloaded-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table table-hover" id="Download_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SR.NO</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">BUYER</th>
                                        <th scope="col"></th>
                                        <th scope="col">SELLER</th>
                                        <th scope="col"></th>
                                        <th scope="col">SELL TYPE</th>
                                        <th scope="col">PRICE</th>
                                        <th scope="col">DOWNLOADED DATE/TIME</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                                if(isset($_GET['UserID'])){
                                    $UserID = $_GET['UserID'];
                                    
                                    /*  To fetch specific Download Note (Redirect From Member Page)*/  
                                    $query = "SELECT * FROM downloads WHERE Downloader=$UserID AND IsAttachmentDownloaded=1 AND IsActive=1 ORDER BY AttachmentDownloadedDate DESC";
                                }else if(isset($_GET['NoteID'])){
                                    $UID = $_GET['NoteID'];
                                    
                                    /*  To fetch specific Download Note (Redirect From Member Page)*/  
                                    $query = "SELECT * FROM downloads WHERE NoteID=$UID AND IsAttachmentDownloaded=1 AND IsActive=1 ORDER BY AttachmentDownloadedDate DESC";
                                }else{
                                    
                                    /*  To fetch All the Download Notes */
                                    $query = "SELECT * FROM downloads WHERE IsAttachmentDownloaded=1 AND IsActive=1 ORDER BY AttachmentDownloadedDate DESC";
                                }
                                    
                                    $Search_all = mysqli_query($connection,$query);
                                    if(!$Search_all){
                                        die("Query Failed" . mysqli_error($connection));
                                    }


                                    if(mysqli_num_rows($Search_all)!=0){
                                        $j=1;
                                        while($row =mysqli_fetch_assoc($Search_all)){
                                            $ID = $row['ID'];
                                            $NoteID = $row['NoteID'];
                                            $Title = $row['NoteTitle'];
                                            $Category = $row['NoteCategory'];
                                            $PurchasedPrice = $row['PurchasedPrice'];
                                            $IsPaid = $row['IsPaid'];
                                            $SellerID = $row['Seller'];
                                            $DownloaderID = $row['Downloader'];
                                            $AD = $row['AttachmentDownloadedDate'];   
                                            
                                            $AttachmentDownloadedDate = date("m-d-Y, H:i",
                                            strtotime($AD));
                                            
                                        if($SellerID!=$DownloaderID){
                                            $query = "SELECT * FROM users WHERE ID=$SellerID";  
                                            $Seller_select = mysqli_query($connection,$query);
                                            if($row = mysqli_fetch_assoc($Seller_select)){
                                                $SID=$row['ID'];
                                                $Seller_FirstName = $row['FirstName'];
                                                $Seller_LastName = $row['LastName'];
                                            }else{
                                                die("Query Failed" . mysqli_error($connection));
                                            }
                                            
                                            
                                            $query = "SELECT * FROM users WHERE ID=$DownloaderID";
                                            $Downloader_Select = mysqli_query($connection,$query);
                                            if($row = mysqli_fetch_assoc($Downloader_Select)){
                                                $DID=$row['ID'];
                                                $Downloader_FirstName = $row['FirstName'];
                                                $Downloader_LastName = $row['LastName'];
                                            }
                                            
                                          
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
                                                
                                            echo "<tr>
                                            <td>$j</td>
                                            <td><a href='Notes_Details.php?Note=$NoteID'>$Title</a></td>
                                            <td>$Category</td>
                                            <td>$Downloader_FirstName"." "."$Downloader_LastName</td>
                                            <td><a href='Member_Details.php?Member=$DID'><img src='images/tables/eye.png' alt='Eye Image' class='img-responsive'></a></td>
                                            <td>$Seller_FirstName"." "."$Seller_LastName</td>
                                            <td><a href='Member_Details.php?Member=$SID'><img src='images/tables/eye.png' alt='Eye Image' class='img-responsive'></a></td>
                                            <td>$SellType</td>
                                            <td>$PurchasedPrice</td>
                                            <td>$AttachmentDownloadedDate</td>
                                            <td>
                                                <div class='dropdown'>
                                                    <img src='images/tables/dots.png' alt='Setting Image' class='dropbtn'>
                                                    <div class='dropdown-content'>
                                                        <a href='Attachment_Download.php?Download=$NoteID'>Downloaded Notes</a>
                                                        <a href='Notes_Details.php?Note=$NoteID'>View More Details</a>
                                                    </div>
                                                </div>
                                            </td></tr>";
                                        
                                        $j++;
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
    <!-- Downloaded Notes ENDS -->

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->  