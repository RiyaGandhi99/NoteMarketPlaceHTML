<!-- Header -->
<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>

<script>

    function PaidDownload(){
        if(confirm("“Are you sure you want to download this Paid note. Please confirm.”")){
            return true;
        }else{
            //$('#PaidDL').modal('hide').css('data-backdrop','static');
            return false;
        }
    }


</script>
  
    <?php   
        
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
            include "Registered_Header.php"; 
        }else{
            include "Unregistered_Header.php";
        }
        
    ?>
    
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
                            $Country = $row['Country'];
                            $UniversityName = $row['UniversityName'];
                            $Course = $row['Course'];
                            $CourseCode = $row['CourseCode'];
                            $Proffessor = $row['Professor'];
                        }else{
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        //Country Details
                        $query = "SELECT * FROM countries WHERE ID='{$Country}'";
                        $Country_select_all = mysqli_query($connection,$query);
                        if($row = mysqli_fetch_assoc($Country_select_all)){
                            $Country = $row['Name'];
                        }else {
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        //Category Details
                        $query = "SELECT * FROM categories WHERE ID='{$Category}'";
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
                
                    $query = "SELECT * FROM system_configuration WHERE ID=7";
                    $Default_select = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($Default_select)){
                        $Default_IMG = $row['Value'];
                    }
                
                ?>
                 
                <div class="row notes-details-row">

                    <div class="col-md-8 col-sm-8 col-8">    
                        
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-6">
                                <img src="<?php if(isset($_GET['Note']) && $Display_Picture!=""){ echo "../Uploads/Members/{$Id}/{$NoteID}/Images/$Display_Picture"; }else{ echo "../Uploads/Default_Images/$Default_IMG";} ?>" alt="Book Image" class="img-responsive">
                            </div>
                            <div class="col-md-8 col-sm-8 col-6">
                                <div class="horizontal-heading">
                                    <h2><?php if(isset($_GET['Note'])){ echo $Title; }else{ echo "Computer Science"; } ?></h2>
                                    <h4><?php if(isset($_GET['Note'])){ echo $Category; }else{ echo "Science"; } ?></h4>
                                </div>
                                <p><?php if(isset($_GET['Note'])){ echo $Description; }else{ echo "Lorem ipsum dolor sit amet, consecteture adipisicing elite.<br> Quos esse veniam sed similique quaerat rerum repellat quia<br> cumque doloribus eius omnis sapiente, ea vitae asperiores<br> aut tempore corrupti tempora."; } ?></p>
                                
                                
                                <form>
                                <?php
                                    
                                    //session_start();
                                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        if($SellType=='Paid'){
                                            echo "<a href='Attachments_Downloads.php?DownloadPaid=$ID'>
                                                    <button type='button' class='btn btn-primary btn-Blue ' id='PaidDL' data-toggle='modal' data-target='#ThankModalCenter' onclick='return PaidDownload()'>
                                                        Download/$$SellingPrice
                                                    </button>
                                                  </a>";
                                        }else if($SellType=='Free'){
                                            echo "<a href='Attachments_Downloads.php?Download=$ID'>
                                                    <button type='button' class='btn btn-primary btn-Blue'>
                                                        Download
                                                    </button>
                                                  </a>";
                                        }
                                    }
                                    else {
                                        echo "<a href='../Login.php'><button type='button' class='btn btn-primary btn-Blue'>Download/$15</button></a>";
                                    }
                                    
                                ?> 
                                </form>
                                
                                <?php
                                    
                                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    
                                    $EmailID = $_SESSION['EmailID'];
                                    /* To fetch Name of the users and System config 
                                    number */
                                    $query = "SELECT * FROM users WHERE EmailID='{$EmailID}'"; 
                                    $User_Name = mysqli_query($connection,$query);
                                    if($row = mysqli_fetch_assoc($User_Name)){
                                        $Name = $row['FirstName'];
                                    }else{
                                        die("Query Failed" . mysqli_error($connection));
                                    }
                                    
                                    $query = "SELECT * FROM system_configuration WHERE KeyNote='Support phone number'"; 
                                    $User_Name = mysqli_query($connection,$query);
                                    if($row = mysqli_fetch_assoc($User_Name)){
                                        $Number = $row['Value'];
                                    }else{
                                        die("Query Failed" . mysqli_error($connection));
                                    }
                                    
                                    }
                                ?>
                                
                                <!-- Modal -->
                                <div id="note-detail">
                                    <div class="modal fade" id="ThankModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <img src="images/NotesDetails/SUCCESS.png" alt="Success Yes">
                                                    <h1>Thank you for purchasing!</h1>
                                                    <h3>Dear <?php echo $Name; ?>,</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio et, fugiat eos saepe soluta maiores unde maxime assumenda blanditiis qui voluptate veritatis sunt est hic incidunt natus in, voluptas aliquam.</p>
                                                    <p>In Case, You have urgency.<br>Please Contact Us on +91 <?php echo $Number; ?></p>
                                                    <p>Once he receives the payment and acknowledge us- selected notes you can see over my downloads tab for download.</p>
                                                    <p>Have a good day.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Ends -->
    
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
                        
                          
                        <!-- Customers -->
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
                                        $Profile_Picture = $row['Profile Picture'];
                                        $UID = $row['UserID'];
                                    }else{
                                        die("Query Failed" . mysqli_error($connection));
                                    }?>
                                
                        <div class="row note-preview-row-inner">
                            <div class="col-md-2 col-sm-2 col-2">
                                <img class="rounded-circle img-responsive img-notes-preview-reviewers" src="<?php echo "../Uploads/Members/{$UID}/Profile_Photo/$Profile_Picture"; ?>" alt="Customer 01" >
                            </div>
                            <div class="col-md-10 col-sm-10 col-10">
                                <div class="row">
                                   <div class="col-md-12 col-sm-12 col-12">
                                        <h2><?php echo $FirstName." ".$LastName; ?></h2>
                                   </div>
                                </div>
                                <div class="row img-notes-preview-star">
                                   <div class="col-md-12 col-sm-12 col-12">
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
    
    
<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->