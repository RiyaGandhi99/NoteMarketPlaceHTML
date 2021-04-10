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
         
        var table = $('#Members_Details_table').DataTable({
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
                "targets": [8],
                "orderable": false, 
            }]
        });
        
    });
    
</script> 

    
    <!-- Member Details -->
    <section id="member-details">

        <div class="content-box-lg">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-12 text-left">

                        <div class="horizontal-heading">
                            <h2>Member Details</h2>
                        </div>

                    </div>

                </div>
                
                <?php
                    
                    if(isset($_GET['Member'])){
                        $ID = $_GET['Member'];
                        
                        //User's basic Details
                        $query = "SELECT * FROM users WHERE ID=$ID";
                        $Member_select = mysqli_query($connection,$query);
                        if(!$Member_select){
                            die("Query Failed" . mysqli_error($connection));
                        }
                        if($row = mysqli_fetch_assoc($Member_select)){
                            $UserID =$row['ID'];
                            $FirstName = $row['FirstName'];
                            $LastName = $row['LastName'];
                            $EmailID = $row['EmailID'];
                        }
                        
                        //User's all Details From UserProfile table
                        $query = "SELECT * FROM userprofile WHERE UserID=$UserID";
                        $Member_Profile_select = mysqli_query($connection,$query);
                        if(!$Member_Profile_select){
                            die("Query Failed" . mysqli_error($connection));
                        }
                        if($row = mysqli_fetch_assoc($Member_Profile_select)){
                            $DOB = date('d-m-Y',strtotime($row['DOB']));
                            $Phonenumber = $row['Phone number'];
                            $University = $row['University'];
                            $AddressLine1 = $row['Address Line 1'];
                            $AddressLine2 = $row['Address Line 2'];
                            $City = $row['City'];
                            $State = $row['State'];
                            $Country = $row['Country'];
                            $ZipCode = $row['Zip Code'];
                            $Profile_Picture = $row['Profile Picture'];
                            
                        }
                        $Path="../Uploads/Members/$UserID/Profile_Photo/$Profile_Picture";
                        $query = "SELECT * FROM system_configuration WHERE ID=8";
                        $Default_select = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($Default_select)){
                            $Default_IMG = $row['Value'];
                        }
                    }
                ?>
                <div class="row member-details-row">
                    
                    <div class="col-md-6 col-sm-6 col-6 Detail">

                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-4">
                                <img src="<?php if($Profile_Picture!=""){ echo $Path; }else{ echo "../Uploads/Default_Images/$Default_IMG"; }?>" alt="Member Image">
                            </div>
                            <div class="col-md-8 col-sm-8 col-8">
                                <div class="row line">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>First Name:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php echo $FirstName; ?></p>
                                    </div>
                                </div>
                                <div class="row line">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Last Name:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php echo $LastName; ?></p>
                                    </div>
                                </div>
                                <div class="row line">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Email:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php echo $EmailID; ?></p>
                                    </div>
                                </div>
                                <div class="row line">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>DOB:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php echo $DOB; ?></p>
                                    </div>
                                </div>
                                <div class="row line">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Phone No.:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php echo $Phonenumber; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>College/University:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php echo $University; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 col-sm-6 col-6">

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Address 1:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php echo $AddressLine1; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Address 2:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php echo $AddressLine2; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>City:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php echo $City; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>State:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php echo $State; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Country:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php echo $Country; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Zip Code:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php echo $ZipCode; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </div>

    </section>
    <!-- Member Details ENDS -->

    <!-- Notes -->
    <section id="member-notes">

        <div class="content-box-xs">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-12 text-left">

                        <div class="horizontal-heading">
                            <h2>Notes</h2>
                        </div>

                    </div>

                </div>

                <div class="row member-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table table-hover" id="Members_Details_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SR.NO</th>
                                        <th scope="col">NOTE TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">DOWNLOADED NOTES</th>
                                        <th scope="col">TOTAL EARNINGS</th>
                                        <th scope="col">DATE EDITED</th>
                                        <th scope="col">PUBLISHED DATE</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                            <?php
                                    
                                    $query = "SELECT * FROM sellernotes WHERE SellerID=$ID AND Status IN (7,8,9)";
                                    $Search_all = mysqli_query($connection,$query);
                                    if(!$Search_all){
                                        die("Query Failed" . mysqli_error($connection));
                                    }
                                    
                                    if(mysqli_num_rows($Search_all)!=0){
                                        $j=1;
                                        while($row =mysqli_fetch_assoc($Search_all)){
                                            $ID = $row['ID'];
                                            $Title = $row['Title'];
                                            $StatusID = $row['Status'];
                                            $CategoryID = $row['Category'];
                                            $SellingPrice = $row['SellingPrice'];
                                            $SellerID = $row['SellerID'];
                                            $CDate = $row['CreatedDate'];
                                            $PDate = $row['PublishedDate']; 
                                            
                                            $createdDate = date('m-d-Y, H:i',strtotime($CDate));
                                            
                                            $PublishedDate = date('m-d-Y, H:i',strtotime($PDate));
                                            
                                        $query = "SELECT * FROM referencedata WHERE ID=$StatusID";  
                                        $Status_select = mysqli_query($connection,$query);
                                        if($row = mysqli_fetch_assoc($Status_select)){
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
                                            
                                        $query = "SELECT * FROM downloads WHERE Downloader=$SellerID";
                                        $Download_Select = mysqli_query($connection,$query);
                                        if(!$Download_Select){
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        
                                        $DownloadCount = mysqli_num_rows($Download_Select);
                                        
                                          
                                        echo "<tr>
                                            <td>$j</td>
                                            <td><a href='Notes_Details.php?
                                            Note=$ID'>$Title</a></td>
                                            <td>$Category</td>
                                            <td>$Status</td>
                                            <td><a href='Downloaded_Notes.php?UserID=$SellerID'>$DownloadCount</a></td>
                                            <td>$$SellingPrice</td>
                                            <td>$createdDate</td>";
                                            if($Status!='Published'){
                                                echo "<td>NA</td>";
                                            }else{
                                                echo "<td>$PublishedDate</td>";
                                            }
                                            echo"<td>
                                                <div class='dropdown'>
                                                    <img src='images/tables/dots.png' alt='Setting Image' class='dropbtn'>
                                                    <div class='dropdown-content'>
                                                        <a href='Attachment_Download.php?Download=$ID'>Download Notes</a>
                                                    </div>
                                                </div>
                                            </td></tr>";
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
    <!-- Notes ENDS -->

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->  