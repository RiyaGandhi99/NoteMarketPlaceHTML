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
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
     
        var table = $('#My_Sold_Notes_table').DataTable({
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
        
        $('#My_Sold_Notes').on('click', function () {
            var Sold = document.getElementById("Search_My_Sold_Notes");
            table.search( Sold.value ).draw();
        });
        
        
    });
    
</script> 
   
    
    <!-- My Sold Notes -->
    <section id="my-sold-notes">

        <div class="content-box-lg">

            <div class="container">

                <div class="row my-sold-notes-row">

                    <div class="col-md-6 col-sm-6 col-6">

                        <div class="horizontal-heading">
                            <h2>My Sold Notes</h2>
                        </div>

                    </div>

                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="row">
                            <div class="col-md-9 col-sm-6 col-6">
                                <div class="form-group text-left">
                                    <input type="text" id="Search_My_Sold_Notes"
                                    name="Search_My_Sold_Notes" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-6">
                                <button type="button" id="My_Sold_Notes" name="My_Sold_Notes" class="btn btn-info btn-Blue">Search</button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row my-sold-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table table-hover" id="My_Sold_Notes_table">
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
                                        
                                        $query = "SELECT * FROM users WHERE EmailID='{$EmailID}'";
                                        $Users_select = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($Users_select)){
                                            $ID = $row['ID'];
                                        }
                                        
                                        
                                        $query = "SELECT * FROM downloads WHERE Seller=$ID AND IsAttachmentDownloaded=1 AND IsActive=1 ORDER BY AttachmentDownloadedDate DESC";
                                    
                                        $Search_all = mysqli_query($connection,$query);
                                        if(!$Search_all){
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                
                                        if(mysqli_num_rows($Search_all)==0){
                                            $j=0;
                                            while($row =mysqli_fetch_assoc($Search_all)){
                                                $Seller = $row['Seller'];
                                                $IsPaid = $row['IsPaid'];
                                                $PurchasedPrice = $row['PurchasedPrice'];
                                                $NoteTitle = $row['NoteTitle'];
                                                $NoteCategory = $row['NoteCategory'];
                                                $Category = $row['NoteCategory'];
                                                $Downloader = $row['Downloader'];
                                                $AD = $row['AttachmentDownloadedDate'];   
                                                
                                                $AttachmentDownloadedDate = date("m-d-Y, H:i",strtotime($AD));
                                                  
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
                                                
                                                $query = "SELECT * FROM sellernotes WHERE  Title='{$NoteTitle}'";
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
                                                        <a href='Notes_Details.php?Note=$ID'>
                                                            <img src='images/tables/eye.png' alt='Eye' class='img-responsive'>
                                                        </a>
                                                        <div class='dropdown'>
                                                            <img src='images/tables/dots.png' alt='Setting Image' class='dropbtn'>
                                                            <div class='dropdown-content'>
                                                                <a href='Attachments_Downloads.php?Download=$ID'>Download Notes</a>
                                                            </div>
                                                        </div>
                                                    </td></tr>";
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
    <!-- MY Sold Notes ENDS -->

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->