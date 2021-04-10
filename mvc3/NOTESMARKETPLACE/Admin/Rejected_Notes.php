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
         
        var table = $('#Rejected_Notes_table').DataTable({
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
                "targets": [4,8],
                "orderable": false, 
            }]
        });
        
        
        $('#Rejected_Notes').on('click', function () {
            var Reject = document.getElementById("Search_Rejected_Notes");
            table.search( Reject.value ).draw();
        });
        
        $('#Seller').on('change', function () {
            var Seller = document.getElementById("Seller");
            table.columns( 3 ).search( Seller.value ).draw();
        });
        
    });
    
    
    function Approve(){
        if(confirm("“If you approve the notes – System will publish the notes over portal. Please press yes to continue.”")){
            return true;
        }else{
            return false;
        }
    }
    
    
    
</script> 

   
    
    <?php


        if(isset($_GET['Approve'])){
            $ID = $_GET['Approve'];
            
            //Update status of notes 
            $query = "UPDATE sellernotes SET Status=9,AdminRemarks='',IsActive=1 WHERE ID=$ID";
            $Notes_Update = mysqli_query($connection,$query);
            if(!$Notes_Update){
                die("Query Failed" . mysqli_error($connection));
            }    
                
        }

        
    
    ?>
    
    <!-- Rejected Notes -->
    <section id="rejected-notes">

        <div class="content-box-lg">

            <div class="container">

                <div class="row rejected-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="horizontal-heading">
                            <h2>Rejected Notes</h2>
                        </div>

                    </div>
                </div>

                <div class="row rejected-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="form-group text-left">
                            <label for="Seller">Seller</label>
                        </div>
                    </div> 
                </div>

                <div class="row rejected-notes-row">

                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="form-group text-left">
                            <select class="form-control" id="Seller">
                                <option value="Select Seller" selected disabled>Select Seller</option>
                                <?php
                                
                                        $query = "SELECT * FROM sellernotes WHERE Status=10";
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
                                    <input type="text" id="Search_Rejected_Notes" name="Search_Rejected_Notes" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-6">
                                <button type="button" id="Rejected_Notes" name="Rejected_Notes" class="btn btn-info btn-Blue">Search</button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row rejected-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table table-hover" id="Rejected_Notes_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SR.NO</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">SELLER</th>
                                        <th scope="col"></th>
                                        <th scope="col">DATE EDITED</th>
                                        <th scope="col">REJECTED BY</th>
                                        <th scope="col">REMARKS</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                            <?php
                                    
                                    $query = "SELECT * FROM sellernotes WHERE Status=10 ORDER BY CreatedDate DESC";
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
                                            $CDate = $row['CreatedDate'];
                                            
                                            $CreatedDate = date('m-d-Y , H:i',strtotime($CDate));
                                            
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
                                            
                                        
                                        $query = "SELECT * FROM sellernotes WHERE Status=10 AND ID=$ID";
                                        $Reject_ID_Select = mysqli_query($connection,$query);
                                        if($row = mysqli_fetch_assoc($Reject_ID_Select)){
                                            $ActionBy = $row['ActionBy'];
                                        }
                                        
                                        
                                        $query = "SELECT * FROM users WHERE ID=$ActionBy";
                                        $Reject_By_Select = mysqli_query($connection,$query);
                                        if($row = mysqli_fetch_assoc($Reject_By_Select)){
                                            $Rejected_FirstName = $row['FirstName'];
                                            $Rejected_LastName = $row['LastName'];
                                        }
                                            
                                            
                                        echo "<tr>
                                            <td>$j</td>
                                            <td><a href='Notes_Details.php?Note=$ID'>$Title</a></td>
                                            <td>$Category</td>
                                            <td>$FirstName"." "."$LastName</td>
                                            <td><a href='Member_Details.php?Member=$SID'><img src='images/tables/eye.png' alt='Eye Image' class='img-responsive'></a></td>
                                            <td>$CreatedDate</td>
                                            <td>$Rejected_FirstName"." "."$Rejected_LastName</td>
                                            <td>Lorem ipsum is simply dummy text</td>
                                            <td>
                                                <div class='dropdown'>
                                                    <img src='images/tables/dots.png' alt='Setting Image' class='dropbtn'>
                                                    <div class='dropdown-content'>
                                                        <a href='Rejected_Notes.php?Approve=$ID' onclick='return Approve()'>Approve</a>
                                                        <a href='Attachment_Download.php?Download=$ID'>Download Notes</a>
                                                        <a href='Notes_Details.php?Note=$ID'>View More Details</a>
                                                    </div>
                                                </div>
                                            </td>";
                                        
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
    <!-- Rejected Notes ENDS -->
    
<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->  