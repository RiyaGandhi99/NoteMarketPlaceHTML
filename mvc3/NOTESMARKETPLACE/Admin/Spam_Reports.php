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
         
        var table = $('#Reports_table').DataTable({
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
                "targets": [6,7],
                "orderable": false, 
            }]
        });
        
        
        $('#Reports').on('click', function () {
            var Reports = document.getElementById("Search_Reports");
            table.search( Reports.value ).draw();
        });
        
    });
    
    function DELETE(){
        if(confirm("“Are you sure you want to delete reported issue”")){
            return true;
        }else{
            return false;
        }
    } 
    
    
</script>
   

    <!-- Spam Reports -->
    <section id="spam-reports">

        <div class="content-box-lg">

            <div class="container">

                <div class="row spam-reports-row">

                    <div class="col-md-6 col-sm-6 col-6">

                        <div class="horizontal-heading">
                            <h2>Spam Reports</h2>
                        </div>

                    </div>
                    
                    <?php
                        
                        if(isset($_GET['delete'])){
                            $ID = $_GET['delete'];
                                   
                            $query = "DELETE FROM sellernotesreportedissues WHERE ID=$ID";
                            $Delete_all = mysqli_query($connection,$query);
                            if(!$Delete_all){
                                die("Query Failed" . mysqli_error($connection));
                            }   
                        }
                        
                        
                    ?>
                        
                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="row">
                            <div class="col-md-9 col-sm-6 col-6">
                                <div class="form-group text-left">
                                    <input type="text" id="Search_Reports" name="Search_Reports" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-6">
                                <button type="button" id="Reports" name="Reports" class="btn btn-info btn-Blue">Search</button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row spam-reports-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table table-hover" id="Reports_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SR.NO</th>
                                        <th scope="col">REPORTED BY</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">DATE EDITED</th>
                                        <th scope="col">REMARK</th>
                                        <th scope="col">ACTION</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php 
                                    
                                $query = "SELECT * FROM sellernotesreportedissues ORDER BY CreatedDate DESC";
                                    
                                $Search_all = mysqli_query($connection,$query);
                                if(!$Search_all){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                                
                                
                                if(mysqli_num_rows($Search_all)!=0){
                                    $j=1;
                                    while($row =mysqli_fetch_assoc($Search_all)){
                                        $ID = $row['ID'];
                                        $NoteID = $row['NoteID'];
                                        $AgainstDownloadID = $row['AgainstDownloadID'];
                                        $ReportedBYID = $row['ReportedBYID'];
                                        $Remarks = $row['Remarks'];
                                        $CreatedDate = $row['CreatedDate'];
                                        $DATEEDITED = date("m-d-Y, H:i",
                                        strtotime($CreatedDate));  
                                        
                                        $query = "SELECT * FROM users WHERE ID=$ReportedBYID";
                                        $User_Select = mysqli_query($connection,$query);
                                        if($row = mysqli_fetch_assoc($User_Select)){
                                            $FirstName = $row['FirstName'];
                                            $LastName = $row['LastName'];
                                        }
                                        
                                        $query = "SELECT * FROM downloads WHERE ID=$AgainstDownloadID";
                                        $Download_Select = mysqli_query($connection,$query);
                                        if($row =mysqli_fetch_assoc($Download_Select)){
                                            $NoteTitle = $row['NoteTitle'];
                                            $NoteCategory = $row['NoteCategory'];
                                        }
                                        
                                        echo "<tr><td>$j</td>
                                                <td>".$FirstName." ".$LastName."</td>
                                                <td><a href='Notes_Details.php?Note=$NoteID'>$NoteTitle</a></td>
                                                <td>$NoteCategory</td>
                                                <td>$DATEEDITED</td>
                                                <td>$Remarks</td>
                                                <td><a href='Spam_Reports.php?delete=$ID'
                                                onclick='return DELETE()'><img src='images/tables/delete.png' alt='Delete Image'></a></td>
                                                <td>
                                                    <div class='dropdown'>
                                                        <img src='images/tables/dots.png' alt='Setting Image' class='dropbtn'>
                                                        <div class='dropdown-content'>
                                                            <a href='Attachment_Download.php?Download=$NoteID'>Downloaded Notes</a>
                                                            <a href='Notes_Details.php?Note=$NoteID'>View More Details</a>
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
    <!-- Spam Reports ENDS -->


<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->  