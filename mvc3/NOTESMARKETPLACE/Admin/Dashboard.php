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

        var table = $('#Dashboard_table').DataTable({
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
            "columnDefs": [{
                "targets": [9],
                "orderable": false,
            }]
        });


        $('#Dashboard_published').on('click', function() {
            var published = document.getElementById("Search_published");
            table.search(published.value).draw();
        });
        
        
        $('#Month').on('change', function () {
            var Month = $(this).val();
            $(this).parents('form').submit();
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

    
    <!-- Dashboard -->
    <section id="dashboard-notes">

        <div class="content-box-lg">

            <div class="container">

                <div class="row dashboard-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="horizontal-heading">
                            <h2>Dashboard</h2>
                        </div>

                    </div>

                </div>
                
                <?php
                    
                    /* Number Of Notes in Review for Publish */
                    $query = "SELECT * FROM sellernotes WHERE Status IN(7,8)";
                    $In_Review_Notes = mysqli_query($connection,$query);
                    if(!$In_Review_Notes){
                        die("Query Failed" . mysqli_error($connection));
                    }
                    
                    $In_Review_Notes_Count = mysqli_num_rows($In_Review_Notes);
                    
                    /* Number Of New Notes Downloaded (Last 7 Days)*/ 
                    //$lastWeek = date("m-d-y", strtotime("-7 days"));
                    //$Date = date('m-d-y');
                    $query = "SELECT * FROM downloads WHERE IsAttachmentDownloaded=1 AND IsActive=1";
                    $Notes_Downloads = mysqli_query($connection,$query);
                    if(!$Notes_Downloads){
                        die("Query Failed" . mysqli_error($connection));
                    }
                    
                    $Notes_Downloads_Count = mysqli_num_rows($Notes_Downloads);
                    
                    /* Number Of New Registrations(Last 7 Days)*/ 
                    //$lastWeek = date("m-d-y", strtotime("-7 days"));
                    //$Date = date('m-d-y');
                    $query = "SELECT * FROM users WHERE RoleID=2";
                    $User_Select = mysqli_query($connection,$query);
                    if(!$User_Select){
                        die("Query Failed" . mysqli_error($connection));
                    }
                    
                    $User_Select_Count = mysqli_num_rows($User_Select);
                    
                ?>
                
                <div class="row dashboard-notes-row">

                    <div class="col-md-12 col-sm-12 col-12 text-center">

                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-12">
                                <h4><a href="Notes_Under_Review.php" style="color:#6255a5;"><?php echo $In_Review_Notes_Count; ?></a></h4>
                                <p>Number Of Notes in Review for Publish</p>
                            </div>
                            <div class="col-md-3 col-sm-12 col-12">
                                <h4><a href="Downloaded_Notes.php" style="color:#6255a5;"><?php echo $Notes_Downloads_Count; ?></a></h4>
                                <p>Number Of New Notes Downloaded<br>(Last 7 Days)</p>
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <h4><a href="Members.php" style="color:#6255a5;"><?php echo $User_Select_Count; ?></a></h4>
                                <p>Number Of New Registrations(Last 7 Days)</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Dashboard ENDS -->

    <!-- Published Notes -->
    <section id="publish-note">

        <div class="content-box-xs">

            <div class="container">

                <div class="row publish-note-row">

                    <div class="col-md-6 col-sm-6 col-6">

                        <div class="horizontal-heading">
                            <h2>Published Notes</h2>
                        </div>

                    </div>

                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-4">
                                <div class="form-group">
                                   <input type="text" id="Search_published" name="Search_published" class="form-control" placeholder="Search"> 
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-4">
                               <button type="button" id="Dashboard_published" name="Dashboard_published" class="btn  btn-info btn-Blue">Search</button> 
                            </div>
                            <div class="col-md-4 col-sm-4 col-4">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <select class="form-control" name="Month" id="Month">
                                            <option disabled>Select month</option>
                                            
                                            <?php
                                                $query = "SELECT * FROM sellernotes WHERE Status=9 ORDER BY PublishedDate DESC";
                                                
                                                $Search_all = mysqli_query($connection,$query);
                                                if(!$Search_all){
                                                    die("Query Failed" . mysqli_error($connection));
                                                }
                                                
                                                while($row =mysqli_fetch_assoc($Search_all)){
                                                    $ID = $row['ID'];
                                                    $PDate = $row['PublishedDate'];   
                                                    $PublishedDate = date("m-d-Y, H:i", strtotime($PDate));  
                                                    
                                                    $Current_Month = date('m');
                                                    $Published_Month = date('m', strtotime($row['PublishedDate']));
                                                    
                                                }
                                                    
                                                if(isset($_POST['Month'])){
                                                    $M = $_POST['Month'];
                                                    if($Published_Month!=$M){
                                                        echo"<option selected>".$M."</option>";
                                                    }
                                                    if($Current_Month<'06'){
                                                        $Last_Months=$Current_Month-05; 
                                                        for($i=1;$i<=5;$i++){
                                                            if($Last_Months==0){
                                                                if($M==12){
                                                                    echo"<option>$Current_Month</option>";
                                                                }else{
                                                                    echo"<option>12</option>";
                                                                }
                                                            }else if($Last_Months==-1){
                                                                if($M==11){
                                                                    echo"<option>$Current_Month</option>";
                                                                }else{
                                                                    echo"<option>11</option>";
                                                                }
                                                            }else if($Last_Months==-2){
                                                                if($M==10){
                                                                    echo"<option>$Current_Month</option>";
                                                                }else{
                                                                    echo"<option>10</option>";
                                                                }
                                                            }else if($Last_Months==-3){
                                                                if($M==9){
                                                                    echo"<option>$Current_Month</option>";
                                                                }else{
                                                                    echo"<option>9</option>";
                                                                }
                                                            }else if($Last_Months==-4){
                                                                if($M==8){
                                                                    echo"<option>$Current_Month</option>";
                                                                }else{
                                                                    echo"<option>8</option>";
                                                                }
                                                            }else{
                                                                echo"<option>".$Last_Months."</option>"; 
                                                            }
                                                            $Last_Months++;
                                                        }
                                                    }else{
                                                        $Last_Months=$Current_Month-05;
                                                        for($i=1;$i<=5;$i++){
                                                            echo"<option>".$Last_Months."</option>";
                                                            $Last_Months++;
                                                        }
                                                    }
                                                    
                                                    
                                                }else{
                                                    echo"<option selected>".$Current_Month."</option>";  
                                                  
                                                    if($Current_Month<'06'){
                                                        $Last_Months=$Current_Month-05; 
                                                        for($i=1;$i<=5;$i++){
                                                            if($Last_Months==0){
                                                                echo"<option>12</option>";
                                                            }else if($Last_Months==-1){
                                                                echo"<option>11</option>";
                                                            }else if($Last_Months==-2){
                                                                echo"<option>10</option>";
                                                            }else if($Last_Months==-3){
                                                                echo"<option>9</option>";
                                                            }else if($Last_Months==-4){
                                                                echo"<option>8</option>";
                                                            }else{
                                                                echo"<option>".$Last_Months."</option>"; 
                                                            }
                                                            $Last_Months++;
                                                        }
                                                    }else{
                                                        $Last_Months=$Current_Month-05;
                                                        for($i=1;$i<=5;$i++){
                                                            echo"<option>".$Last_Months."</option>";
                                                            $Last_Months++;
                                                        }
                                                    }
                                                }
                                            
                                            ?>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row publish-note-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table table-hover" id="Dashboard_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SR NO.</th>
                                        <th scope="col">TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">ATTACHMENT</th>
                                        <th scope="col">SELL TYPE</th>
                                        <th scope="col">PRICE</th>
                                        <th scope="col">PUBLISHER</th>
                                        <th scope="col">PUBLISHER DATE</th>
                                        <th scope="col">NUMBER OF DOWNLOADS</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                                    
                                    
                                    $query = "SELECT * FROM sellernotes WHERE Status=9 ORDER BY PublishedDate DESC";
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
                                            $IsPaid = $row['IsPaid'];
                                            $SellingPrice = $row['SellingPrice'];
                                            $SellerID = $row['SellerID'];
                                            $ActionBy = $row['ActionBy'];
                                            $PDate = $row['PublishedDate'];
                                            $PublishedDate = date("m-d-Y, H:i", strtotime($PDate));  
                                            
                                            $Current_Month = date('m');
                                            $Published_Month = date('m', strtotime($row['PublishedDate']));
                                            
                                                
                                            $query = "SELECT * FROM categories WHERE ID=$CategoryID";
                                                $category_select = mysqli_query($connection,$query);
                                                if($row = mysqli_fetch_assoc($category_select)){
                                                    $Category = $row['Name'];
                                                }else{
                                                    die("Query Failed" . mysqli_error($connection));
                                                }

                                            $query = "SELECT * FROM downloads WHERE NoteId=$ID";
                                                $Download_Select = mysqli_query($connection,$query);
                                                if(!$Download_Select){
                                                    die("Query Failed" . mysqli_error($connection));
                                                }
                                                
                                            $query = "SELECT * FROM users WHERE ID=$ActionBy";
                                                $Action_By_Select = mysqli_query($connection,$query);
                                                if(!$Action_By_Select){
                                                    die("Query Failed" . mysqli_error($connection));
                                                }
                                                if($row = mysqli_fetch_assoc($Action_By_Select)){
                                                    $FirstName = $row['FirstName'];
                                                    $LastName = $row['LastName'];
                                                }

                                            $DownloadCount = mysqli_num_rows($Download_Select);

                                            
                                            if(isset($_POST['Month'])){
                                                $M = $_POST['Month'];
                                                if($Published_Month==$M){
                                                    echo "<tr>
                                                    <td>$j</td>
                                                    <td><a href='Notes_Details.php?Note=$ID'>$Title</a></td>
                                                    <td>$Category</td>
                                                    <td>10MB</td>";
                                                    if($IsPaid==0){
                                                        echo "<td>Free</td>";
                                                    }else{
                                                        echo "<td>Paid</td>";
                                                    }
                                                    echo"<td>$$SellingPrice</td>
                                                    <td>".$FirstName." ".$LastName."</td>
                                                    <td>$PublishedDate</td>
                                                    <td><a href='Downloaded_Notes.php?NoteID=$ID'>$DownloadCount</a></td>
                                                    <td>
                                                        <div class='dropdown'>
                                                            <img src='images/tables/dots.png' alt='Setting Image' class='dropbtn'>
                                                            <div class='dropdown-content'>
                                                                <a href='Attachment_Download.php?Download=$ID'>Download Notes</a>
                                                                <a href='Notes_Details.php?Note=$ID'>View More Details</a>
                                                                <a href='' data-toggle='modal' data-target='#ReviewModal$j'>Unpublish</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>";
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
                                                        <button type="submit" name="Unpublish" class="btn btn-danger" style="margin-left:0;">Unpublish</button>
                                                        <a href="Notes_Under_Review.php"><button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button></a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php           
                                                    $j++;
                                                }   
                                            }else if($Published_Month==$Current_Month){

                                                echo "<tr>
                                                    <td>$j</td>
                                                    <td><a href='Notes_Details.php?Note=$ID'>$Title</a></td>
                                                    <td>$Category</td>
                                                    <td>10MB</td>";
                                                    if($IsPaid==0){
                                                        echo "<td>Free</td>";
                                                    }else{
                                                        echo "<td>Paid</td>";
                                                    }
                                                    echo"<td>$$SellingPrice</td>
                                                    <td>".$FirstName." ".$LastName."</td>
                                                    <td>$PublishedDate</td>
                                                    <td><a href='Downloaded_Notes.php?NoteID=$ID'>$DownloadCount</a></td>
                                                    <td>
                                                        <div class='dropdown'>
                                                            <img src='images/tables/dots.png' alt='Setting Image' class='dropbtn'>
                                                            <div class='dropdown-content'>
                                                                <a href='Attachment_Download.php?Download=$ID'>Download Notes</a>
                                                                <a href='Notes_Details.php?Note=$ID'>View More Details</a>
                                                                <a href='' data-toggle='modal' data-target='#ReviewModal$j'>Unpublish</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>";
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
                                                        <button type="submit" name="Unpublish" class="btn btn-danger" style="margin-left:0;">Unpublish</button>
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