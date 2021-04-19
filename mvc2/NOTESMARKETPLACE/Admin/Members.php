<!-- Header -->
<?php ob_start(); ?>
<!-- Database Connection -->
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
         
        var table = $('#Members_table').DataTable({
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
                "targets": [10],
                "orderable": false, 
            }]
        });
        
        
        $('#Members').on('click', function () {
            var Members = document.getElementById("Search_Members");
            table.search( Members.value ).draw();
        });
        
    });
    
    
    function Deactivate(){
        if(confirm("“Are you sure you want to make this member inactive?”")){
            return true;
        }else{
            return false;
        }
    }
    
    
    
</script> 
   
    
    <!-- Members -->
    <section id="members">

        <div class="content-box-lg">

            <div class="container">

                <div class="row members-row">

                    <div class="col-md-6 col-sm-6 col-6">

                        <div class="horizontal-heading">
                            <h2>Members</h2>
                        </div>

                    </div>
                        
                        
                    <?php
                        
                        if(isset($_GET['Deactivate'])){
                            $ID = $_GET['Deactivate'];
                                   
                            $query = "UPDATE users SET IsActive=0 WHERE ID=$ID";
                            $Deactivate_Users = mysqli_query($connection,$query);
                            if(!$Deactivate_Users){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                            $query = "UPDATE sellernotes SET Status=11 WHERE UserID=$ID";
                            $Deactivate_User_Notes = mysqli_query($connection,$query);
                            if(!$Deactivate_User_Notes){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                        }
                        
                        
                    ?>
                        
                      
                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="row">
                            <div class="col-md-9 col-sm-6 col-6">
                                    <div class="form-group text-left">
                                        <input type="text" id="Search_Members" name="Search_Members" class="form-control" placeholder="Search">
                                    </div>
                                </div>
                            <div class="col-md-3 col-sm-6 col-6">
                                <button type="submit" id="Members" name="Members" class="btn btn-info btn-Blue">Search</button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row members-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table" id="Members_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SR.NO</th>
                                        <th scope="col">FIRST NAME</th>
                                        <th scope="col">LAST NAME</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">JOINING DATE</th>
                                        <th scope="col">UNDER REVIEW<br>NOTES</th>
                                        <th scope="col">PUBLISHED<br>NOTES</th>
                                        <th scope="col">DOWNLOADED<br>NOTES</th>
                                        <th scope="col">TOTAL<br>EXPENSES</th>
                                        <th scope="col">TOTAL<br>EARNINGS</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                            <?php 
                                    
                                $query = "SELECT * FROM users WHERE RoleID=2 AND IsActive=1 ORDER BY CreatedDate DESC ";
                                    
                                $Search_all = mysqli_query($connection,$query);
                                if(!$Search_all){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                                
                                
                                if(mysqli_num_rows($Search_all)!=0){
                                    $j=1;
                                    while($row =mysqli_fetch_assoc($Search_all)){
                                        $ID = $row['ID'];
                                        $FirstName = $row['FirstName'];
                                        $LastName = $row['LastName'];
                                        $EmailID = $row['EmailID'];
                                        $CreatedDate = $row['CreatedDate'];
                                            
                                        $JOININGDATE = date("m-d-Y, H:i",
                                        strtotime($CreatedDate));  
                                        
                                        
                                        /* to find number of notes under review */
                                        $query = "SELECT * FROM sellernotes WHERE SellerID=$ID
                                        AND Status IN(7,8)";
                                        $Notes_Under_Review = mysqli_query($connection,$query);
                                        if(!$Notes_Under_Review){
                                            die("Query Failed" . mysqli_error($connection));
                                        }    
                                        $Notes_Under_Review_Count = mysqli_num_rows($Notes_Under_Review);
                                        
                                        
                                        /* to find number of Published notes and total
                                           earning */
                                        $Total_Earned = 0;
                                        $query = "SELECT * FROM sellernotes WHERE SellerID=$ID
                                        AND Status=9";
                                        $Published_Notes = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($Published_Notes)){
                                            $Price = $row['SellingPrice'];
                                            $Total_Earned = $Total_Earned + $Price;
                                        }    
                                        $Published_Notes_Count = mysqli_num_rows($Published_Notes);
                                        
                                        //to find total expenses
                                        $Total_Expenses = 0;
                                        $query = "SELECT * FROM downloads WHERE Seller=$ID
                                        AND IsAttachmentDownloaded=1";
                                        $SoldNotes = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($SoldNotes)){
                                            $Price = $row['PurchasedPrice'];
                                            $Total_Expenses = $Total_Expenses + $Price;
                                        }
                                        
                                        //to find number of downloads notes
                                        $query = "SELECT * FROM downloads WHERE Downloader=$ID AND IsAttachmentDownloaded=1";
                                        $Downloads = mysqli_query($connection,$query);
                                        if(!$Downloads){
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        $Downloads_Count = mysqli_num_rows($Downloads);
                                        
                                        echo "<tr><td>$j</td>
                                                <td>$FirstName</td>
                                                <td>$LastName</td>
                                                <td>$EmailID</td>
                                                <td>$JOININGDATE</td>
                                                <td><a href='Notes_Under_Review.php?UserID=$ID'>$Notes_Under_Review_Count</a></td>
                                                <td><a href='Published_Notes.php?UserID=$ID'>$Published_Notes_Count</a></td>
                                                <td><a href='Downloaded_Notes.php?UserID=$ID'>$Downloads_Count</a></td>
                                                <td><a href='Downloaded_Notes.php?UserID=$ID'>$$Total_Earned</a></td>
                                                <td>$$Total_Expenses</td>
                                                <td>
                                                    <div class='dropdown'>
                                                        <img src='images/tables/dots.png' alt='Setting Image' class='dropbtn'>
                                                        <div class='dropdown-content'>
                                                            <a href='Member_Details.php?Member=$ID'>View More Details</a>
                                                            <a href='Members.php?Deactivate=$ID' onclick='return
                                                            Deactivate()'>Deactivate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>";
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
    <!-- Members ENDS -->


<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->  