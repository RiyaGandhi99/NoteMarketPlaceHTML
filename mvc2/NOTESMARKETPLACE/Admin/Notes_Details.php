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
    
<script>

    function DeleteReview(){
        if(confirm("“Are you sure you want to Delete this Review?”")){
            return true;
        }else{
            return false;
        }
    }

</script>
    
    <!-- Notes Details -->
    <section id="notes-details">

        <div class="content-box-lg">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-12 text-left">

                        <div class="horizontal-heading">
                            <h2>Notes Details</h2>
                        </div>

                    </div>

                </div>
                
                <?php
                    
                    if(isset($_GET['Note'])){
                        $ID = $_GET['Note'];
                        
                        $query = "SELECT * FROM sellernotes WHERE ID=$ID";
                        $Notes_Details = mysqli_query($connection,$query);
                        if($row = mysqli_fetch_assoc($Notes_Details)){
                            $Display_Picture = $row['DisplayPicture'];
                            $Notes_Preview = $row['NotesPreview'];
                            $Title = $row['Title'];
                            $Description = $row['Description'];
                            $Category = $row['Category'];
                            $NotesPreview = $row['NotesPreview'];
                            $IsPaid = $row['IsPaid'];
                            $SellingPrice = $row['SellingPrice'];
                            $NumberOfPages = $row['NumberOfPages'];
                            $CountryID = $row['Country'];
                            $UniversityName = $row['UniversityName'];
                            $Course = $row['Course'];
                            $CourseCode = $row['CourseCode'];
                            $Proffessor = $row['Professor'];                       
                        }
                        if(!$Notes_Details){
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        //Country Details
                        $query = "SELECT * FROM countries WHERE ID=$CountryID";
                        $Country_select_all = mysqli_query($connection,$query);
                        if($row = mysqli_fetch_assoc($Country_select_all)){
                            $Country = $row['Name'];
                        }else {
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        //Category Details
                        $query = "SELECT * FROM categories WHERE ID=$Category";
                        $Category_select_all = mysqli_query($connection,$query);
                        if($row = mysqli_fetch_assoc($Category_select_all)){
                            $Category = $row['Name'];
                        }else {
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        $query = "SELECT * FROM sellernotes WHERE ID=$ID";
                        $select_all = mysqli_query($connection,$query);
                        if($row = mysqli_fetch_assoc($select_all)){
                            $NoteID = $row['ID'];
                            $Id = $row['SellerID'];
                        }else{
                            die("Query Failed" . mysqli_error($connection));
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
                        
                    }
                ?>
                
                
                 
                <div class="row notes-details-row">

                    <div class="col-md-8 col-sm-8 col-8">    
                        
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-6">
                                <img src="<?php if(isset($_GET['Note'])){ echo "../Uploads/Members/{$Id}/{$NoteID}/Images/$Display_Picture"; }else{ echo 'images/Search/1.jpg';} ?>" alt="Book Image" class="img-responsive">
                            </div>
                            <div class="col-md-8 col-sm-8 col-6">
                                <div class="horizontal-heading">
                                    <h2><?php if(isset($_GET['Note'])){ echo $Title; } ?></h2>
                                    <h4><?php if(isset($_GET['Note'])){ echo $Category; } ?></h4>
                                </div>
                                <p><?php if(isset($_GET['Note'])){ echo $Description; } ?></p>
                                
                                
                                <form>
                                <?php
                                    if(isset($_GET['Note'])){
                                    if($SellType=='Paid'){
                                        echo "<a href='Attachment_Download.php?Download=$ID'>
                                                <button type='button' class='btn btn-primary btn-Blue'>
                                                    Download/$$SellingPrice
                                                </button>
                                            </a>";
                                    }else if($SellType=='Free'){
                                        echo "<a href='Attachment_Download.php?Download=$ID'>
                                                <button type='button' class='btn btn-primary btn-Blue'>
                                                    Download
                                                </button>
                                            </a>";
                                    }
                                    }
                                ?> 
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    
                    <?php 
                    
                    //Find the number of users marked this note inappropriate 
                    $query = "SELECT * FROM sellernotesreportedissues WHERE NoteID=$ID";
                    $Notesreported_Select = mysqli_query($connection,$query);
                    if(!$Notesreported_Select){
                        die("Query Failed" . mysqli_error($connection));
                    }
                    $Report_issue = mysqli_num_rows($Notesreported_Select);
                        
                    //Find the number of users review the note
                    $query = "SELECT * FROM sellernotesreviews WHERE NoteID=$ID";
                    $Notesreported_Select = mysqli_query($connection,$query);
                    if(!$Notesreported_Select){
                        die("Query Failed" . mysqli_error($connection));
                    }
                    $Review_Note = mysqli_num_rows($Notesreported_Select);
                    
                    
                    ?>
                    
                    <div class="col-md-4 col-sm-4 col-4">
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12 notes-details-row-inner">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Institution:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php if(isset($_GET['Note'])){ echo $UniversityName; }else{ echo "University Of California"; } ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Country:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php if(isset($_GET['Note'])){ echo $Country; }else{ echo "United State"; } ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Course Name:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php if(isset($_GET['Note'])){ echo $Course; }else{ echo "Computer Engineering"; } ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Course Code:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php if(isset($_GET['Note'])){ echo $CourseCode; }else{ echo "248705"; } ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Professor:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php if(isset($_GET['Note'])){ echo $Proffessor; }else{ echo "Mr. Richard Brown"; } ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Number Of Pages:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php if(isset($_GET['Note'])){ echo $NumberOfPages; }else{ echo "277"; } ?></p>
                                    </div>
                                </div>
                                <?php
                                    
                                    $query = "SELECT * FROM sellernotes WHERE Status=9 AND ID=$ID";
                                    $Note_Published = mysqli_query($connection,$query);
                                    if($row = mysqli_fetch_assoc($Note_Published)){
                                        $PDate = $row['PublishedDate'];
                                        $PublishedDate = date('M d Y',strtotime($PDate));
                                    }
                                    
                                if(mysqli_num_rows($Note_Published)!=0){
                                ?>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Approved Date:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php echo $PublishedDate; ?></p>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Rating:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 img-notes-preview-star member-Blue">
                                      
                                        <p>
                                       
                            <?php
                            
                                $result=0;
                                //Rating Details
                                $query = "SELECT * FROM sellernotesreviews WHERE NoteID=$ID ";
                                $Review_select = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($Review_select)){
                                    $Ratings = $row['Ratings'];
                                    
                                    /*To display stars according to rating (only for 1 review)*/
                                    $total=5;
                                    if(mysqli_num_rows($Review_select)==1 && $Review_Note<2){
                                        if($Ratings==0){
                                            echo " ";
                                        }else if($Ratings!=5){
                                            for($s=1;$s<=$Ratings;$s++){
                                                echo "<img src='images/NotesDetails/star.png' alt='Star Ratings' class='img-responsive'>";
                                            }
                                        
                                            $Remain=$total-$Ratings;
                                            for($r=1;$r<=$Remain;$r++){
                                                echo "<img src='images/NotesDetails/star-white.png' alt='Star Ratings' class='img-responsive'>";
                                            }
                                        }else{
                                            for($s=1;$s<=$Ratings;$s++){
                                                echo "<img src='images/NotesDetails/star.png' alt='Star Ratings' class='img-responsive'>";
                                            }
                                        }
                                    }else if(mysqli_num_rows($Review_select)>1){
                                        $result=$result+$Ratings;
                                    }
                                } 
                                /*To display Avg. stars according to rating (More than 1 review)*/
                                if(mysqli_num_rows($Review_select)>1){
                                    $avg=0;
                                    for($t=1;$t<=$Review_Note;$t++){
                                        $avg = ceil($result/$Review_Note);
                                    }
                                    if($Ratings==0){
                                        echo " ";
                                    }else if($Ratings!=5){
                                        for($s=1;$s<=$avg;$s++){
                                            echo "<img src='images/NotesDetails/star.png' alt='Star Ratings' class='img-responsive'>";
                                        }
                                        $Remain=$total-$avg;
                                        for($r=1;$r<=$Remain;$r++){
                                            echo "<img src='images/NotesDetails/star-white.png' alt='Star Ratings' class='img-responsive'>";
                                        }
                                    }else{
                                        for($s=1;$s<=$avg;$s++){
                                            echo "<img src='images/NotesDetails/star.png' alt='Star Ratings' class='img-responsive'>";
                                        }
                                    }
                                }
                                if($Review_Note==0){
                                    echo "No Reviews"; 
                                }else{ 
                                    echo $Review_Note . " "; ?>Reviews
                                <?php } ?></p>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12" style="color:red;">
                                        <p>
                                        <?php  
                                        if($Report_issue==0){
                                            echo " "; 
                                        }else{ 
                                            echo $Report_issue . " ";?>Users marked this note as inappropriate<?php 
                                        } ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Notes Details ENDS -->
    
    <!-- Notes Preview & Customer Review -->
    <section id="note-preview">

        <div class="content-box-xs">

            <div class="container">

                <div class="row note-preview-row">

                    <div class="col-md-5 col-sm-5 col-5 text-left">

                        <div class="horizontal-heading">
                            <h2>Notes Preview</h2>
                        </div>
                        <div id="Iframe-Cicis-Menu-To-Go" class="set-margin-cicis-menu-to-go set-padding-cicis-menu-to-go set-border-cicis-menu-to-go set-box-shadow-cicis-menu-to-go center-block-horiz">
                            <div class="responsive-wrapper responsive-wrapper-padding-bottom-90pct" style="-webkit-overflow-scrolling: touch; overflow: auto;"><!-- http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf-->
                                <iframe src="<?php if(isset($_GET['Note'])){ echo "../Uploads/Members/{$Id}/{$NoteID}/Images/$Notes_Preview"; }else{ echo 'http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf';} ?>">
                                    <p style="font-size: 110%;"><em><strong>ERROR: </strong>
                                            An &#105;frame should be displayed here but your browser version does not support &#105;frames.</em> Please update your browser to its most recent version and try again, or access the file <a href="http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf">with this link.</a></p>
                                </iframe>
                            </div>
                        </div>
                    </div>
                

                    <div class="col-md-7 col-sm-7 col-7 text-left">

                        <div class="horizontal-heading">
                            <h2>Customer Review</h2>
                        </div>
                        
                        <!-- Customer 01 -->
                        <div id="customer">
                        <?php
                            
                                //Find the number of users review the note
                                $query = "SELECT * FROM sellernotesreviews WHERE NoteID=$ID";
                                $Notesreview_Select = mysqli_query($connection,$query);
                                
                                $Review_Note = mysqli_num_rows($Notesreview_Select);
                                
                                if($Review_Note==0){
                                    echo "<br><br><br><br><br><br><br><h1 class='text-center' style='color:#6255a5;'> No Customer Review </h1>";
                                }else{
                                    
                                
                                while($row = mysqli_fetch_assoc($Notesreview_Select)){
                                    $ReviewID= $row['ID'];
                                    $ReviewedByID = $row['ReviewedByID'];
                                    $Ratings = $row['Ratings'];
                                    $Comments = $row['Comments'];
                                    
                                    
                                    $query = "SELECT * FROM users WHERE ID=$ReviewedByID"; 
                                    $User_Name = mysqli_query($connection,$query);
                                    if($row = mysqli_fetch_assoc($User_Name)){
                                        $FirstName = $row['FirstName'];
                                        $LastName = $row['LastName'];
                                    }else{
                                        die("Query Failed" . mysqli_error($connection));
                                    }
                                    
                                    $query = "SELECT * FROM sellernotes WHERE ID=$ID";
                                    $select_all = mysqli_query($connection,$query);
                                    if($row = mysqli_fetch_assoc($select_all)){
                                        $NoteID = $row['ID'];
                                        $Id = $row['SellerID'];
                                    }else{
                                        die("Query Failed" . mysqli_error($connection));
                                    }
                                    
                                    $query = "SELECT * FROM userprofile WHERE UserID=$ReviewedByID"; 
                                    $User_Name = mysqli_query($connection,$query);
                                    if($row = mysqli_fetch_assoc($User_Name)){
                                        $UserID = $row['UserID'];
                                        $Profile_Picture = $row['Profile Picture'];
                                    }else{
                                        die("Query Failed" . mysqli_error($connection));
                                    }
                        ?>
                        
                        <div class="row note-preview-row-inner">
                            <div class="col-md-2 col-sm-2 col-2">
                                <img class="rounded-circle img-responsive img-notes-preview-reviewers" src="<?php echo "../Uploads/Members/{$UserID}/Profile_Photo/$Profile_Picture"; ?>" alt="Customer 01" >
                            </div>
                            <div class="col-md-10 col-sm-10 col-10">
                                <div class="row">
                                   <div class="col-md-12 col-sm-12 col-12">
                                        <h2><?php echo $FirstName." ".$LastName; ?></h2>
                                   </div>
                                </div>
                                <div class="row img-notes-preview-star">
                                   <div class="col-md-10 col-sm-10 col-10">
                            <?php
                                
                                $result=0;
                                //Rating Details
                                $query = "SELECT * FROM sellernotesreviews WHERE NoteID=$ID
                                AND ReviewedByID=$ReviewedByID";
                                $Review_select = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($Review_select)){
                                    $Ratings = $row['Ratings'];
                                    
                                    /*To display stars according to rating (only for 1 review)*/
                                    $total=5;
                                    if(mysqli_num_rows($Review_select)==1){
                                        if($Ratings==0){
                                            echo " ";
                                        }else if($Ratings!=5){
                                            for($s=1;$s<=$Ratings;$s++){
                                                echo "<img src='images/NotesDetails/star.png' alt='Star Ratings' class='img-responsive'>";
                                            }
                                        
                                            $Remain=$total-$Ratings;
                                            for($r=1;$r<=$Remain;$r++){
                                                echo "<img src='images/NotesDetails/star-white.png' alt='Star Ratings' class='img-responsive'>";
                                            }
                                        }else{
                                            for($s=1;$s<=$Ratings;$s++){
                                                echo "<img src='images/NotesDetails/star.png' alt='Star Ratings' class='img-responsive'>";
                                            }
                                        }
                                    }else if(mysqli_num_rows($Review_select)>1){
                                        $result=$result+$Ratings;
                                    }
                                } 
                                
                            ?>
                                   </div>
                                   <div class="col-md-2 col-sm-2 col-2">
                                        <a href="<?php echo 'Delete_Review.php?Note='.$ID.'&Delete='.$ReviewID; ?>" onclick="return DeleteReview()"><img src="images/NotesDetails/delete.png" alt="Delete Image" class="img-responsive"></a>
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <p><?php echo $Comments; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11 col-sm-11 col-11 border-down">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Notes Preview & Customer Review ENDS -->
    
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>
<?php
    
    $query = "SELECT * FROM system_configuration";
    $Config_Details = mysqli_query($connection,$query);
    if(!$Config_Details){
        die("Query Failed".mysqli_error($connection));
    }
    
    if(mysqli_num_rows($Config_Details)!=0){
        $query = "SELECT * FROM system_configuration WHERE ID=4";
        $Facebook_Details = mysqli_query($connection,$query);
        if($row = mysqli_fetch_assoc($Facebook_Details)){
            $Facebook_Url= $row['Value'];
        }

        $query = "SELECT * FROM system_configuration WHERE ID=5";
        $Twitter_Details = mysqli_query($connection,$query);
        if($row = mysqli_fetch_assoc($Twitter_Details)){
            $Twitter_Url= $row['Value'];
        }

        $query = "SELECT * FROM system_configuration WHERE ID=6";
        $LinkedIn_Details = mysqli_query($connection,$query);
        if($row = mysqli_fetch_assoc($LinkedIn_Details)){
            $LinkedIn_Url= $row['Value'];
        }
    }
?>
    
      
    <!-- Footer -->
    <footer>

        <div class="container">

            <div class="row">

                <div class="col-md-6 col-sm-6 col-6 text-left footer-left">

                    <p>Copyright &copy; Tatvasoft All rights reserved</p>

                </div>

                <div class="col-md-6 col-sm-6 col-6 text-right footer-right">
                    <ul class="social-list">
                        <li>
                            <a href="<?php if(mysqli_num_rows($Config_Details)!=0){ echo $Facebook_Url; }else{ echo "#"; }?>">
                                <img src="images/Homepage/facebook.png" alt="Facebook Link" class="img-responsive">
                            </a>
                        </li>
                        <li>
                            <a href="<?php if(mysqli_num_rows($Config_Details)!=0){ echo $Twitter_Url; }else{ echo "#"; }?>">
                                <img src="images/Homepage/twitter.png" alt="Twitter Link" class="img-responsive">
                            </a>
                        </li>
                        <li>
                            <a href="<?php if(mysqli_num_rows($Config_Details)!=0){ echo $LinkedIn_Url;}else{ echo "#"; } ?>">
                                <img src="images/Homepage/linkedin.png" alt="LinkedIn Link" class="img-responsive">
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

    </footer>
    <!-- Footer ENDS -->

    
    
    <!-- JQuery-->
    <script src="js/jquery-min.js"></script>

    <!--Bootstrap JS-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--Custom JS-->
    <script src="js/Script.js"></script>


</body>

</html>