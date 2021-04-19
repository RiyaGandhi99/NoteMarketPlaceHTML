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
         
        var table = $('#Notes_Under_Review_table').DataTable({
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
                "targets": [7,8],
                "orderable": false, 
            }]
        });
          
         
        $('#Notes_Under_Review').on('click', function () {
            var Review = document.getElementById("Search_Notes_Under_Review");
            table.search( Review.value ).draw();
        });
        
        $('#Seller').on('change', function () {
            var Seller = document.getElementById("Seller");
            table.columns( 3 ).search( Seller.value ).draw();
        });
    
        
        $('.modal .btn-danger').on('click', function(){
            if(confirm("“Are you sure you want to reject seller request?”")){
                return true;
            }else{
                return false;
            }
        });
    });   
    
    function Review(){
        if(confirm("“Via marking the note In Review – System will let user know that review process has been initiated. Please press yes to continue.”")){
            return true;
        }else{
            return false;
        }
    }
    
    function Approve(){
        if(confirm("“If you approve the notes – System will publish the notes over portal. Please press yes to continue.”")){
            return true;
        }else{
            return false;
        }
    }
        
     
    
    
</script> 

   
    
    <?php

        if(isset($_GET['Review'])){
            $ID = $_GET['Review'];
            
            //Update status of notes 
            $query = "UPDATE sellernotes SET Status=8 WHERE ID=$ID";
            $Notes_Update = mysqli_query($connection,$query);
            if(!$Notes_Update){
                die("Query Failed" . mysqli_error($connection));
            }    
            header("Location: Notes_Under_Review.php");    
        }

        if(isset($_GET['Approve'])){
            $ID = $_GET['Approve'];
            
            $PublishedDate = date('Y-m-d h:i:s');
            //Update status of notes 
            $query = "UPDATE sellernotes SET Status=9,PublishedDate='{$PublishedDate}' WHERE ID=$ID";
            $Notes_Update = mysqli_query($connection,$query);
            if(!$Notes_Update){
                die("Query Failed" . mysqli_error($connection));
            }    
            header("Location: Notes_Under_Review.php");    
        }

        
        
    
    ?>

    <!-- Notes Under Review -->
    <section id="notes-under-review">

        <div class="content-box-lg">

            <div class="container">

                <div class="row notes-under-review-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="horizontal-heading">
                            <h2>Notes Under Review</h2>
                        </div>

                    </div>
                </div>

                <div class="row notes-under-review-row">

                    <div class="col-md-12 col-sm-12 col-12">
                            <div class="form-group text-left">
                                <label for="Seller">Seller</label>
                            </div>
                    </div>
                </div>

                <div class="row notes-under-review-row">

                    <div class="col-md-6 col-sm-12 col-12">
                            <select class="form-control" id="Seller">
                                <option value="Select Seller" selected disabled>Select Seller</option>
                            <?php
                                if(isset($_GET['UserID'])){
                                    $UserID = $_GET['UserID'];
                                    
                                    /*  To fetch specific Note under Review (Redirect From Member Page)*/    
                                    $query = "SELECT DISTINCT SellerID FROM sellernotes WHERE SellerID=$UserID AND Status IN (7,8) AND IsActive=1";
                                     
                                }else{   
                                    /*  To fetch All the Notes under Review */
                                    $query = "SELECT DISTINCT SellerID FROM sellernotes WHERE Status=7 OR Status=8 AND IsActive=1";
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

                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-9 col-sm-6 col-6">
                                    <div class="form-group text-left">
                                        <input type="text" id="Search_Notes_Under_Review" name="Search_Notes_Under_Review" class="form-control" placeholder="Search">
                                    </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-6">
                                    <button type="button" id="Notes_Under_Review" name="Notes_Under_Review" class="btn btn-info btn-Blue">Search</button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row notes-under-review-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table" id="Notes_Under_Review_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SR.NO</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">SELLER</th>
                                        <th scope="col"></th>
                                        <th scope="col">DATE EDITED</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">ACTION</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                            <?php
                                if(isset($_GET['UserID'])){
                                    $UserID = $_GET['UserID'];
                                    
                                    /*  To fetch specific Note under Review (Redirect From Member Page)*/    
                                    $query = "SELECT * FROM sellernotes WHERE SellerID=$UserID AND Status IN (7,8) AND IsActive=1 ORDER BY CreatedDate DESC";
                                     
                                }else{   
                                    
                                    /*  To fetch All the Notes under Review */
                                    $query = "SELECT * FROM sellernotes WHERE Status=7 OR Status=8 AND IsActive=1 ORDER BY CreatedDate DESC";
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
                                            $SellerID = $row['SellerID'];
                                            $CreatedDate = $row['CreatedDate'];
                                            $StatusID = $row['Status'];
                                            
                                            $DATEEDITED = date("m-d-Y, H:i",
                                            strtotime($CreatedDate));  
                                        

                                        $query = "SELECT * FROM referencedata WHERE ID=$StatusID";  
                                        $category_select = mysqli_query($connection,$query);
                                        if($row = mysqli_fetch_assoc($category_select)){
                                            $Status = $row['Value'];
                                        }else{
                                            die("Query Failed" . mysqli_error($connection));
                                        }    
                                            
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
                                            $UserID =$row['ID'];
                                            $FirstName = $row['FirstName'];
                                            $LastName = $row['LastName'];
                                        }else{
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                            
                                            
                                        echo "<tr>
                                            <td>$j</td>
                                            <td>$Title</td>
                                            <td>$Category</td>
                                            <td>$FirstName"." "."$LastName</td>
                                            <td><a href='Member_Details.php?Member=$UserID'><img src='images/tables/eye.png' alt='Eye Image' class='img-responsive'></a></td>
                                            <td>$DATEEDITED</td>
                                            <td>$Status</td>
                                            <td>
                                                <a href='Notes_Under_Review.php?Approve=$ID'>
                                                    <button type='button' class='btn btn-success' onclick='return Approve()'>Approve</button>
                                                </a>
                                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#ReviewModal$j' >Reject</button>";
                                                if($StatusID==8){
                                                    echo "<button type='button' class='btn
                                                        btn-light' onclick='return
                                                        NotesUnderReview()'>Notes Under Review</button>";
                                                }else{
                                                    echo "<a href='Notes_Under_Review.php?Review=$ID'>       
                                                        <button type='button' class='btn
                                                        btn-light' onclick='return
                                                        Review()'>InReview</button>
                                                    </a>";
                                                }    
                                                
                                            
                                            echo "</td>
                                            <td>
                                                <div class='dropdown'>
                                                    <img src='images/tables/dots.png' alt='Setting Image' class='dropbtn'>
                                                    <div class='dropdown-content'>
                                                        <a href='Notes_Details.php?Note=$ID'>View More Details</a>
                                                        <a href='Attachment_Download.php?Download=$ID'>Downloaded Notes</a>
                                                    </div>
                                                </div>
                                            </td>";
                                        
                                        ?>
                                  
                                    <!-- Review Popper -->
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
                                                            <label for="message-text" class="col-form-label">Remarks</label>
                                                            <textarea class="form-control" id="message-text" name="message-text" placeholder="Write remarks"></textarea>
                                                            <input type="hidden" name="Reject" value="<?php echo $ID; ?>">
                                                        </div>
                                                        <button type="submit" name="RejectNotes" class="btn btn-danger">Reject</button>
                                                        <a href="Notes_Under_Review.php"><button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button></a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <!-- Notes Under Review ENDS -->
    
    <?php  
        
        if(isset($_POST['RejectNotes'])){
            $Remark = $_POST['message-text'];
            $ID = $_POST['Reject'];
            
            
            $EmailID = $_SESSION['EmailID'];
            $query = "SELECT * FROM users WHERE EmailID='{$EmailID}'";
            $Admin_Select = mysqli_query($connection,$query);
            if($row= mysqli_fetch_assoc($Admin_Select)){
                $UserID = $row['ID'];
            }
            
            //Update status of notes 
            $query = "UPDATE sellernotes SET Status=10,ActionBy=$UserID,IsActive=0,AdminRemarks='{$Remark}' WHERE ID=$ID";
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
            header("Location: Notes_Under_Review.php");
        }    
    ?>
    
<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->  