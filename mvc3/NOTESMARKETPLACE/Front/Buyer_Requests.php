<!-- Header -->
<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>
       
        
    <?php   
        
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
            include "Registered_Header.php"; 
        }else{
            header("Location: ../Login.php");
        }
        
    ?>    
        
        
        
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
         
        var table = $('#Buyer_Requests_table').DataTable({
            "pageLength": 10,
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
                "targets": [8],
                "orderable": false, 
            }]
        });
        
        
        $('#Buyer_Request').on('click', function () {
            var Buyer = document.getElementById("Search_Buyer_Request");
            table.search( Buyer.value ).draw();
        });
        
    });
    
</script> 
        
    <!-- Buyer Requests -->
    <section id="buyer-requests">

        <div class="content-box-lg">

            <div class="container">
               
                <form action="" method="post">
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
                                        <input type="text" id="Search_Buyer_Request" name="Search_Buyer_Request" class="fa fa-search form-control" placeholder="Search">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-6">
                                    <button type="button" id="Buyer_Request" name="Buyer_Request" class="btn btn-info btn-Blue">Search</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
                
                <?php
                
                    if(isset($_GET['email']) && isset($_GET['UserID'])){
                        $EmailID = $_GET['email'];
                        $UserID = $_GET['UserID'];
                        
                        $query_user = "SELECT * FROM users WHERE ID=$UserID";
                        $seller_select = mysqli_query($connection,$query_user);  
                        while($row = mysqli_fetch_assoc($seller_select)){
                            $seller = $row['FirstName'];
                        }
                        
                        $query_user = "SELECT * FROM users WHERE EmailID='$EmailID'";
                        $buyer_select = mysqli_query($connection,$query_user);  
                        while($row = mysqli_fetch_assoc($buyer_select)){
                            $buyer = $row['FirstName'];
                        }
                        $to = $EmailID;
                        
                        $header = "MIME_Version:1.0" . "\r\n";
                        $header .= "Content-type: text/html; charset=iso-8859-1"."\r\n";
                        $header .= 'From: gogoproject2020@gmail.com';
                        
                        $subject = $seller. " Allows you to download a note";
                        
                        $comments = "Hello ". $buyer .", <br><br> <p>We would like to inform you that,".$seller." Allows you to download a note.Please login and see My Download tabs to download particular note.</p><br><br>Regards, <br>Notes Marketplace";
                        
                        if(!mail($to,$subject,$comments,$header)){
                            echo "Email Failed";
                        }                        
                        
                    }
                
                    if(isset($_GET['DownloadID']) && isset($_GET['NoteID'])){
                
                        $DownloadID = $_GET['DownloadID'];
                        $NoteID = $_GET['NoteID'];
                        
                        $query = "SELECT * FROM sellernotesattachments WHERE NoteID=$NoteID";
                        $Attachment_select = mysqli_query($connection,$query);
                        if($row =mysqli_fetch_assoc($Attachment_select)){
                            $FilePath = $row['FilePath'];
                        }else{
                            die("Query Failed" . mysqli_error($connection));
                        }
                    
                        $query = "UPDATE `downloads` SET IsSellerHasAllowedDownload=1 ,  AttachmentPath='{$FilePath}' , IsAttachmentDownloaded=0 WHERE Downloader=$DownloadID AND NoteID=$NoteID";


                        $Download_Update = mysqli_query($connection,$query);
                        if(!$Download_Update){
                            die("Query Failed" . mysqli_error($connection));
                        }
                    }
                    
                
                ?>
                
                <div class="row buyer-requests-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table table-hover" id="Buyer_Requests_table">
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
                                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
                        
                                    $EmailID = $_SESSION['EmailID'];
                                    
                                    $query = "SELECT * FROM users WHERE EmailID='{$EmailID}'"; 
                                    $User_ID = mysqli_query($connection,$query);
                                    if($row = mysqli_fetch_assoc($User_ID)){
                                        $UserID = $row['ID'];
                                    }else{
                                        die("Query Failed" . mysqli_error($connection));
                                    }
                        
                                    
                                    $query = "SELECT * FROM downloads WHERE Seller='$UserID' AND IsPaid=1 AND IsSellerHasAllowedDownload=0";
                                    
                                    $Buyer_Request = mysqli_query($connection,$query);
                                    if(!$Buyer_Request){
                                        die("Query Failed" . mysqli_error($connection));
                                    }
                                
                                    if(mysqli_num_rows($Buyer_Request)!=0){
                                        $j=0;
                                        while($row =mysqli_fetch_assoc($Buyer_Request)){
                                            $DownloadID = $row['Downloader'];
                                            $IsPaid = $row['IsPaid'];
                                            $Title = $row['NoteTitle'];
                                            $Category = $row['NoteCategory'];
                                            $PurchasedPrice = $row['PurchasedPrice'];
                                        
                                            //For Paid Notes Name    
                                            $query = "SELECT * FROM referencedata WHERE ID=4";
                                            $Status_select = mysqli_query($connection,$query);
                                            if($row =mysqli_fetch_assoc($Status_select)){
                                                $SellType = $row['Value'];
                                            }else{
                                                die("Query Failed" . mysqli_error($connection));
                                            }
                                        
                                            //Buyer's EmailId 
                                            $query = "SELECT * FROM users WHERE ID=$DownloadID";
                                            $Users_select = mysqli_query($connection,$query);
                                            while($row = mysqli_fetch_assoc($Users_select)){
                                                $Buyer_Email = $row['EmailID'];
                                            }
                                            
                                            //Buyer's Phone Number 
                                            $query = "SELECT * FROM userprofile WHERE UserID=$DownloadID";
                                            $Users_select = mysqli_query($connection,$query);
                                            while($row = mysqli_fetch_assoc($Users_select)){
                                                $Buyer_Phone_number_Country_Code= $row['Phone number - Country Code'];
                                                $Buyer_Phone_number = $row['Phone number'];
                                            }
                                                
                                            //To finad the noteid
                                            $query = "SELECT * FROM sellernotes WHERE Title='{$Title}'";
                                            $ID_select = mysqli_query($connection,$query);
                                            if($row = mysqli_fetch_assoc($ID_select)){
                                                $ID = $row['ID'];
                                            }else{
                                                die("Query Failed" . mysqli_error($connection));
                                            }
                                            
                                            
                                            $j++;
                                            echo "<tr><th scope='row'>$j</th>
                                            <td><a href='Notes_Details.php?Note=$ID'>$Title</a></td>
                                            <td>$Category</td>
                                            <td>$Buyer_Email</td>
                                            <td>$Buyer_Phone_number_Country_Code $Buyer_Phone_number</td>
                                            <td>$SellType</td>
                                            <td>$$PurchasedPrice</td>
                                            <td>27 Nov 2020,11:24:34</td>
                                            <td>
                                                <a href='Notes_Details.php?Note=$ID'><img src='images/tables/eye.png' alt='Eye'></a>
                                                <div class='dropdown'>
                                                    <img src='images/tables/dots.png' alt='Setting Image' class='dropbtn'>
                                                    <div class='dropdown-content'>
                                                        <a href='Buyer_Requests.php?email=gandhiriya99@gmail.com&DownloadID=$DownloadID&NoteID=$ID&UserID=$UserID'>Yes,I Received</a>
                                                    </div>
                                                </div>
                                            </td></tr>";
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
    <!-- Buyer Requests ENDS -->

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->