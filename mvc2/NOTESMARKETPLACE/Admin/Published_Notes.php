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
         
        var table = $('#Published_Notes_table').DataTable({
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
                "targets": [6,10],
                "orderable": false, 
            }]
        });
        
        $('#published_Notes').on('click', function () {
            var published = document.getElementById("Search_published_Notes");
            table.search( published.value ).draw();
        });
        
        $('#Seller').on('change', function () {
            var Seller = document.getElementById("Seller");
            table.columns( 5 ).search( Seller.value ).draw();
        });
        
    
    
    $('.btn-danger').on('click', function(){
        if(confirm("“Are you sure you want to Unpublish this note?”")){
            return true;
        }else{
            return false;
        }
    });
    
    });
</script> 
       
    
    <!-- Published Notes -->
    <section id="published-notes">

        <div class="content-box-lg">

            <div class="container">

                <div class="row published-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="horizontal-heading">
                            <h2>Published Notes</h2>
                        </div>

                    </div>
                </div>

                <div class="row published-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">
                            <div class="form-group text-left">
                                <label for="Seller">Seller</label>
                            </div>
                       </div>
                </div>

                <div class="row published-notes-row">

                    <div class="col-md-6 col-sm-12 col-12">
                            <div class="form-group text-left">
                                <select class="form-control" id="Seller">
                                    <option value="Select Seller" selected disabled>Select Seller</option>
                            <?php

                                    if(isset($_GET['UserID'])){
                                        $UserID = $_GET['UserID'];
                                    
                                        /*  To fetch specific Published Note (Redirect From Member Page)*/  
                                        $query = "SELECT DISTINCT SellerID FROM sellernotes WHERE SellerID=$UserID AND IsActive=1 AND Status=9";
                                    }else{
                                        /*  To fetch All the Published Notes */
                                        $query = "SELECT DISTINCT SellerID FROM sellernotes WHERE Status=9 AND IsActive=1";
                                    }
                                        $Seller_Select = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($Seller_Select)){
                                            $SellerID = $row['SellerID'];
                                        
                                            $query = "SELECT * FROM users WHERE ID=$SellerID";
                                            $Reject_By_Select = mysqli_query($connection,$query);
                                            if($row = mysqli_fetch_assoc($Reject_By_Select)) {
                                                $Seller_FirstName = $row['FirstName'];
                                                $Seller_LastName = $row['LastName'];
                                            }
                                            echo "<option value=".$Seller_FirstName." ".$Seller_LastName.">".$Seller_FirstName." ".$Seller_LastName."</option>";
                                        }
                            ?>
                                </select>
                            </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-9 col-sm-6 col-6">
                                <div class="form-group text-left">
                                    <input type="text" id="Search_published_Notes" name="Search_published_Notes" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-6">
                                <button type="button" name="published_Notes" 
                                id="published_Notes"  class="btn btn-info btn-Blue">Search</button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row published-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table" id="Published_Notes_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SR.NO</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">SELL TYPE</th>
                                        <th scope="col">PRICE</th>
                                        <th scope="col">SELLER</th>
                                        <th scope="col"></th>
                                        <th scope="col">PUBLISHED DATE</th>
                                        <th scope="col">APPROVED BY</th>
                                        <th scope="col">NUMBER OF DOWNLOADS</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                            <?php  
                                if(isset($_GET['UserID'])){
                                    $UserID = $_GET['UserID'];
                                    
                                    /*  To fetch specific Published Note (Redirect From Member Page)*/  
                                    $query = "SELECT * FROM sellernotes WHERE SellerID=$UserID AND IsActive=1 AND Status=9 ORDER BY PublishedDate DESC";
                                }else{
                                    /*  To fetch All the Published Notes */
                                    $query = "SELECT * FROM sellernotes WHERE Status=9 AND IsActive=1 ORDER BY PublishedDate DESC";
                                }
                                    
                                    $Search_all = mysqli_query($connection,$query);
                                    if(!$Search_all){
                                        die("Query Failed" . mysqli_error($connection));
                                    }


                                    if(mysqli_num_rows($Search_all)!=0){
                                        $j=1;
                                        while($row =mysqli_fetch_assoc($Search_all)){
                                            $ID = $row['ID'];
                                            $Title = $row['Title'];
                                            $CategoryID = $row['Category'];
                                            $SellingPrice = $row['SellingPrice'];
                                            $IsPaid = $row['IsPaid'];
                                            $SellerID = $row['SellerID'];
                                            $PDate = $row['PublishedDate'];  
                                            
                                            $PublishedDate = date("m-d-Y, H:i",
                                            strtotime($PDate));
                                            
                                        $query = "SELECT * FROM categories WHERE ID=$CategoryID";  
                                        $category_select = mysqli_query($connection,$query);
                                        if($row = mysqli_fetch_assoc($category_select)){
                                            $Category = $row['Name'];
                                        }else{
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        
                                        $query = "SELECT * FROM users WHERE ID=$SellerID";  
                                        $category_select = mysqli_query($connection,$query);
                                        if($row = mysqli_fetch_assoc($category_select)){
                                            $SID=$row['ID'];
                                            $FirstName = $row['FirstName'];
                                            $LastName = $row['LastName'];
                                        }else{
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                         
                                            
                                        $query = "SELECT * FROM sellernotes WHERE Status=9 AND ID=$ID";
                                        $Reject_ID_Select = mysqli_query($connection,$query);
                                        if($row = mysqli_fetch_assoc($Reject_ID_Select)){
                                            $ActionBy = $row['ActionBy'];
                                        }
                                        
                                        
                                        $query = "SELECT * FROM users WHERE ID=$ActionBy";
                                        $Approved_By_Select = mysqli_query($connection,$query);
                                        if($row = mysqli_fetch_assoc($Approved_By_Select)){
                                            $Approved_FirstName = $row['FirstName'];
                                            $Approved_LastName = $row['LastName'];
                                        }
                                          
                                            
                                        $query = "SELECT * FROM downloads WHERE IsAttachmentDownloaded=1 AND NoteID=$SID";
                                        $Notes_Downloads = mysqli_query($connection,$query);
                                        if(!$Notes_Downloads){
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        
                                        $Notes_Downloads_Count = mysqli_num_rows($Notes_Downloads);
                                        
                                            
                                        echo "<tr>
                                            <td>$j</td>
                                            <td><a href='Notes_Details.php?Note=$ID'>$Title</a></td>
                                            <td>$Category</td>";
                                            
                                        if($IsPaid==1){
                                            echo"<td>Paid</td>";
                                        }else{
                                            echo"<td>Free</td>";
                                        }
                                            
                                            
                                        echo"<td>$SellingPrice</td>
                                            <td>$FirstName"." "."$LastName</td>
                                            <td><a href='Member_Details.php?Member=$SID'><img src='images/tables/eye.png' alt='Eye Image' class='img-responsive'></a></td>
                                            <td>$PublishedDate</td>
                                            <td>$Approved_FirstName"." "."$Approved_LastName</td>
                                            <td><a href='Downloaded_Notes.php?NoteID=$SellerID'>$Notes_Downloads_Count</a></td>
                                            <td>
                                                <div class='dropdown'>
                                                    <img src='images/tables/dots.png' alt='Setting Image' class='dropbtn'>
                                                    <div class='dropdown-content'>
                                                        <a href='Attachment_Download.php?Download=$ID'>Downloaded Notes</a>
                                                        <a href='Notes_Details.php?Note=$ID'>View More Details</a>
                                                        <a href='#' data-toggle='modal' data-target='#ReviewModal$j'>Unpublish</a>
                                                    </div>
                                                </div>
                                            </td>";
                                ?>     
                                    <!-- Unpublished Popper -->
                                    <div class="modal fade" id="ReviewModal<?php echo $j;?>" tabindex="-1" aria-labelledby="ReviewModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h5 class="modal-title" id="ReviewModalLabel">
                                                        <?php echo "$Title"." - "."$Category"; ?></h5>
                                                    <form action="" method="post">
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Remarks*</label>
                                                            <textarea class="form-control" name="message-text" placeholder="Write remarks"></textarea>
                                                            <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                                                        </div>
                                                                <button type="submit" name="Unpublish" class="btn btn-danger" style="margin-left:0;">Unpublish</button>
                                                            <a href="Published_Notes.php">
                                                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                                            </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Unpublished Popper -->
                            <?php
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
    <!-- Published Notes ENDS -->
    
    <?php  
        
        if(isset($_POST['Unpublish'])){
            $Remark = $_POST['message-text'];
            $ID = $_POST['ID'];
            
            $EmailID = $_SESSION['EmailID'];
            $query = "SELECT * FROM users WHERE EmailID='{$EmailID}'";
            $Admin_Select = mysqli_query($connection,$query);
            if($row= mysqli_fetch_assoc($Admin_Select)){
                $UserID = $row['ID'];
            }
            
            //Update status of notes 
            $query = "UPDATE sellernotes SET Status=11,IsActive=0,ActionBy=$UserID,AdminRemarks='{$Remark}' WHERE ID=$ID";
            $Notes_Update = mysqli_query($connection,$query);
            if(!$Notes_Update){
                die("Query Failed" . mysqli_error($connection));
            }
            
            //Update Downloads notes inactive
            $query = "UPDATE downloads SET IsActive=0 WHERE NoteID=$ID";
            $Downloads_Update = mysqli_query($connection,$query);
            if(!$Downloads_Update){
                die("Query Failed" . mysqli_error($connection));
            }
            
            //Mail Sended to seller from admin
            $query = "SELECT * from sellernotes WHERE ID=$ID";
            $Notes_select = mysqli_query($connection,$query);
            if($row = mysqli_fetch_assoc($Notes_select)){
                $SellerID = $row['SellerID'];
                $NoteTitle = $row['Title'];
            }
            
            $query = "SELECT * from users WHERE ID=$SellerID";
            $Notes_select = mysqli_query($connection,$query);
            if($row = mysqli_fetch_assoc($Notes_select)){
                $EmailID = $row['EmailID'];
                $FirstName = $row['FirstName'];
                $LastName = $row['LastName'];
            }
            
            
            /* When Administrator Unpublish the Seller Notes, Notify Seller*/
            $to = $EmailID;

            $header = "MIME_Version:1.0" . "\r\n";
            $header .= "Content-type: text/html; charset=iso-8859-1"."\r\n";
            $header .= 'From: gogoproject2020@gmail.com';

            $subject = "Sorry! We need to remove your notes from our portal.";

            $comments = "Hello <br>
            <h4>".$FirstName." ".$LastName.",</h4> <br>";
            $comments .= "<p>We want to inform you that, your note ".$NoteTitle." has been removed from the portal.<br>Please find our remarks as below - <br>".$Remark.".</p><br><br>";
            
            $comments .= "<br><br> Regards, <br> Notes Marketplace";
            
            if(!mail($to,$subject,$comments,$header)){
                die("Email verification Failed");
            }
            header("Location: Published_Notes.php");
        }    
    ?>
    

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->  