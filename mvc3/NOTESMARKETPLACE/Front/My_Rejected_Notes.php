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
         
        var table = $('#My_Rejected_Notes_table').DataTable({
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
                "targets": [5],
                "orderable": false, 
            }]
        });
        
        
        $('#My_Rejected_Notes').on('click', function () {
            var Rejected = document.getElementById("Search_My_Rejected_Notes");
            table.search( Rejected.value ).draw();
        });
        
    });
    
    
</script> 


    <!-- MY Rejected Notes -->
    <section id="my-rejected-notes">

        <div class="content-box-lg">

            <div class="container">

                <div class="row my-rejected-notes-row">

                    <div class="col-md-6 col-sm-6 col-6">

                        <div class="horizontal-heading">
                            <h2>MY Rejected Notes</h2>
                        </div>

                    </div>

                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="row">
                            <div class="col-md-9 col-sm-6 col-6">
                                <div class="form-group text-left">
                                    <input type="text" id="Search_My_Rejected_Notes" name="Search_My_Rejected_Notes" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-6">
                                <button type="button" id="My_Rejected_Notes" name="My_Rejected_Notes" class="btn btn-info btn-Blue">Search</button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row my-rejected-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">


                        <div class="table-responsive">
                            <table class="table table-hover" id="My_Rejected_Notes_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SR.NO</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">REMARKS</th>
                                        <th scope="col">CLONE</th>
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
                                        
                                        
                                    $query = "SELECT * FROM sellernotes WHERE SellerID='$ID'  AND Status=10 ";
                                    
                                    $Search_all = mysqli_query($connection,$query);
                                    if(!$Search_all){
                                        die("Query Failed" . mysqli_error($connection));
                                    }
                                
                                    if(mysqli_num_rows($Search_all)!=0){
                                        $j=0;
                                        while($row =mysqli_fetch_assoc($Search_all)){
                                            $IsPaid = $row['IsPaid'];
                                            $Title = $row['Title'];
                                            $Category = $row['Category'];
                                            $AdminRemarks = $row['AdminRemarks'];
                                            
                                        
                                            $query = "SELECT * FROM categories WHERE ID=$Category";
                                            $Category_select = mysqli_query($connection,$query);
                                            if($row =mysqli_fetch_assoc($Category_select)){
                                                $Category = $row['Name'];
                                            }else{
                                                die("Query Failed" . mysqli_error($connection));
                                            }
                                            
                                            $query = "SELECT * FROM sellernotes WHERE Title='{$Title}'";
                                            $ID_select = mysqli_query($connection,$query);
                                            if($row = mysqli_fetch_assoc($ID_select)){
                                                $ID = $row['ID'];
                                            }else{
                                                die("Query Failed" . mysqli_error($connection));
                                            }
                                            
                                            
                                            $j++;
                                            echo "<tr><th scope='row'>$j</th>
                                            <td><a href='Notes_Details.php?EYE=$ID'>$Title</a></td>
                                            <td>$Category</td>
                                            <td>$AdminRemarks</td>
                                            <td><a href='#'>Clone</a></td>
                                            <td>
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
                                
                            ?>        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- MY Rejected Notes ENDS -->


<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->