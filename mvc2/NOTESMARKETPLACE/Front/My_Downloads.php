<!-- Header -->
<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
     
        var table = $('#My_Downloads_Notes_table').DataTable({
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
                "targets": [7],
                "orderable": false, 
            }]
        });
        
        $('#My_Downloads_Notes').on('click', function () {
            var Downloads = document.getElementById("Search_My_Downloads_Notes");
            table.search( Downloads.value ).draw();
        });
        
        
    });
    
    
    function ReportInIssue(){
        if(confirm("– Are you sure you want to mark this report as spam, you cannot update it later?”")){
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
            ?>
            <script>
                    alert("Login First!");
            </script>
            
            <?php
            header("Location: Login.php");
        }
        
    ?>
    
    <!-- MY Downloads -->
    <section id="my-downloads">

        <div class="content-box-lg">

            <div class="container">

                <div class="row my-downloads-row">

                    <div class="col-md-6 col-sm-6 col-6">

                        <div class="horizontal-heading">
                            <h2>My Downloads</h2>
                        </div>

                    </div>

                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="row">
                            <div class="col-md-9 col-sm-6 col-6">
                                <div class="form-group text-left">
                                    <input type="text" id="Search_My_Downloads_Notes" name="Search_My_Downloads_Notes" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-6">
                                <button type="button" id="My_Downloads_Notes" name="My_Downloads_Notes" class="btn btn-info btn-Blue">Search</button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row my-downloads-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table table-hover" id="My_Downloads_Notes_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SR.NO</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">BUYER</th>
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
                                        
                                        $query = "SELECT * FROM users WHERE EmailID='$EmailID'";
                                        $Users_select = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($Users_select)){
                                            $ID = $row['ID'];
                                        }
                                        
                                        
                                        $query = "SELECT * FROM downloads WHERE Downloader=$ID AND IsSellerHasAllowedDownload=1";
                                    
                                        $Search_all = mysqli_query($connection,$query);
                                        if(!$Search_all){
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                
                                        if(mysqli_num_rows($Search_all)==0){
                                            echo "<tr><td colspan='8' class='text-center'><h1>Data Not Found</h1></td></tr>";
                                        }else{
                                            $j=0;
                                            while($row =mysqli_fetch_assoc($Search_all)){
                                                $DownloadID = $row['ID'];
                                                $Downloader = $row['Downloader'];
                                                $Seller = $row['Seller'];
                                                $IsPaid = $row['IsPaid'];
                                                $PurchasedPrice = $row['PurchasedPrice'];
                                                $NoteTitle = $row['NoteTitle'];
                                                $Category = $row['NoteCategory'];
                                                $AttachmentDownloadedDate = $row['AttachmentDownloadedDate'];
                                                $Downloader = $row['Downloader'];
                                                  
                                                
                                                if($Seller!=$Downloader){
                                                    
                                                
                                                $query = "SELECT * FROM users WHERE ID=$Downloader";
                                                $Users_select = mysqli_query($connection,$query);
                                                while($row = mysqli_fetch_assoc($Users_select)){
                                                    $EmailID = $row['EmailID'];
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
                                                
                                                
                                                $query = "SELECT * FROM sellernotes WHERE Title='{$NoteTitle}'";
                                                $ID_select = mysqli_query($connection,$query);
                                                if($row = mysqli_fetch_assoc($ID_select)){
                                                    $ID = $row['ID'];
                                                }else{
                                                    die("Query Failed" . mysqli_error($connection));
                                                }
                                            
                                                
                                                $j++;
                                                echo "<tr><th scope='row'>$j</th>
                                                    <td><a href='Notes_Details.php?Note=$ID'>$NoteTitle</a></td>
                                                    <td>$Category</td>
                                                    <td>$EmailID</td>
                                                    <td>$SellType</td>
                                                    <td>$$PurchasedPrice</td>
                                                    <td>$AttachmentDownloadedDate</td>
                                                    <td>
                                                        <a href='Notes_Details.php?Note=$ID'><img src='images/tables/eye.png' alt='Eye'>
                                                        </a>
                                                        <div class='dropdown'>
                                                            <img src='images/tables/dots.png' alt='Setting Image' class='dropbtn'>
                                                            <div class='dropdown-content'>
                                                                <a href='Attachments_Downloads.php?Download=$ID'>Download Notes</a>
                                                                <a href='My_Downloads.php' data-toggle='modal' data-target='#StarModalCenter$j'>Add Review/Feedback</a>
                                                                <a href='My_Downloads.php' data-toggle='modal' data-target='#ReportasInappropriate$j'>Report asInappropriate</a>
                                                            </div>
                                                        </div>
                                                    </td></tr>";
                                            ?>
                                            
                                    <!-- Star Review Popper -->
                                    <div class="modal fade" id="StarModalCenter<?php echo $j; ?>" tabindex="-1" aria-labelledby="ReviewModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h5 class="modal-title" id="ReviewModalLabel">Add Review</h5>
                                                    <form action="" method="post">
                                                    <div class="rate form-group">
                                                        <input type="radio" id="star5" name="rate" value="5" />
                                                        <label for="star5" title="text">5 stars</label>
                                                        <input type="radio" id="star4" name="rate" value="4" />
                                                        <label for="star4" title="text">4 stars</label>
                                                        <input type="radio" id="star3" name="rate" value="3" />
                                                        <label for="star3" title="text">3 stars</label>
                                                        <input type="radio" id="star2" name="rate" value="2" />
                                                        <label for="star2" title="text">2 stars</label>
                                                        <input type="radio" id="star1" name="rate" value="1" />
                                                        <label for="star1" title="text">1 star</label>
                                                    </div><br>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label" style="margin-right:280px;" >Comments<span> *</span></label>
                                                            <textarea class="form-control" id="message-text" name="Comments" placeholder="Comments..."></textarea>
                                                            <input type="hidden" name="NoteID" value="<?php echo $ID; ?>">
                                                            <input type="hidden" name="DownloadID" value="<?php echo $DownloadID; ?>">
                                                            
                                                        </div>
                                                        <a href="My_Downloads.php"><button type="submit" style="margin-left:0;" name="Rate" class="btn btn-Blue">submit</button></a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Star Review ENDS -->
                                    
                                    <!-- Review Popper -->
                                    <div class="modal fade" id="ReportasInappropriate<?php echo $j; ?>" tabindex="-1" aria-labelledby="ReportModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h5 class="modal-title" id="ReportModalLabel">
                                                        <?php echo "$NoteTitle"." - "."$Category";?>   
                                                    </h5>
                                                    <form action="" method="post">
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Remarks</label>
                                                            <textarea class="form-control" id="message-text" name="Remark" placeholder="Write remarks"></textarea>
                                                            <input type="hidden" name="NoteID" value="<?php echo $ID; ?>">
                                                            <input type="hidden" name="DownloadID" value="<?php echo $DownloadID; ?>">
                                                        </div>
                                                        <a href="My_Downloads.php"><button type="submit" name="Reportanissue" class="btn btn-danger" style="margin-left:0;" onclick="return ReportInIssue()">Report an issue button </button></a>
                                                        <a href="My_Downloads.php"><button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button></a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Review Popper ENDS -->
                                              
                                    <?php
                                                }
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
    <!-- MY Downloads ENDS -->
    
    
    <?php

        if(isset($_POST['Rate'])){
            $Comments = $_POST['Comments'];
            $Rating = $_POST['rate'];
            $NoteID = $_POST['NoteID'];
            $DownloadID = $_POST['DownloadID'];


            $EmailID = $_SESSION['EmailID'];
            $query = "SELECT * FROM users WHERE EmailID='$EmailID'";
            $Users_select = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($Users_select)){
                $UserID = $row['ID'];
            }

            $query = "INSERT INTO sellernotesreviews(NoteID,ReviewedByID,AgainstDownloadsID,Ratings,Comments) VALUES ($NoteID,$UserID,$DownloadID,'{$Rating}','{$Comments}')";
            $Users_select = mysqli_query($connection,$query);
            if(!$Users_select){
                die("Query Failed" . mysqli_error($connection));
            }
        }


        if(isset($_POST['Reportanissue'])){
            $Remark = $_POST['Remark'];
            $NoteID = $_POST['NoteID'];
            $DownloadID = $_POST['DownloadID'];

            $EmailID = $_SESSION['EmailID'];
            $query = "SELECT * FROM users WHERE EmailID='$EmailID'";
            $Users_select = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($Users_select)){
                $UserID = $row['ID'];
            }

            $query = "INSERT INTO sellernotesreportedissues(NoteID,ReportedBYID,AgainstDownloadID,Remarks) VALUES ($NoteID,$UserID,$DownloadID,'{$Remark}')";
            $Users_select = mysqli_query($connection,$query);
            if(!$Users_select){
                die("Query Failed" . mysqli_error($connection));
            }
        }  

    ?>
   
<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->