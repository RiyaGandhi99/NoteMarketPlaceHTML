<!-- Header -->
<?php ob_start(); ?>
<?php include "Header.php"; ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>
   
   //Check Whether Folder Exist and put file/img in it
        $PDF = "../Uploads/Members/{$NoteID}/Attachments";
        for($r=0;$r<$Upload_Notes.length;$r++){
            if(!is_dir($PDF))  { 
                mkdir($PDF,0777,true); 
                move_uploaded_file($Upload_Notes_tempname, "../Uploads/$Upload_Notes");
            }else{ 
                move_uploaded_file($Upload_Notes_tempname, "../Uploads/$Upload_Notes");
            }
        }
    $Image = "../Uploads/Members/{$NoteID}/Image";
        if(!is_dir($Image))  { 
            mkdir($Image,0777,true);
            move_uploaded_file($Display_Picture_tempname,"../Uploads/Members/{$NoteID}/Image/$Display_Picture");
            move_uploaded_file($Upload_File_tempname, "../Uploads/Members/{$NoteID}/Image/$Upload_File");
        }else{
            move_uploaded_file($Display_Picture_tempname,"../Uploads/Members/{$NoteID}/Image/$Display_Picture");
            move_uploaded_file($Upload_File_tempname, "../Uploads/Members/{$NoteID}/Image/$Upload_File");
        }   

        
   
   
    <!-- Header -->
    <header>
        <nav class="navbar navbar-light navbar-expand-lg  white-nav-top fixed-top">
            <div class="container">
                <a id="user-header" class="navbar-brand" href="#">
                    <img src="images/Homepage/logo.png" alt="Logo" class="img-responsive">
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-current="true" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Mobile Menu Close Button -->
                <span id="mobile-nav-close-btn">&times;</span>
               
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="Search_Notes.html"><span>Search</span><span class="space">Notes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sell<span>Your</span><span class="space">Notes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Buyer_Requests.html"><span>Buyer</span><span class="space">Requests</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FAQ.html">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contact_Us.html"><span>Contact</span><span class="space">Us</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle user-img dropbtn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/Homepage/user-img.png" alt="User-Photo" class="rounded-circle img-responsive"></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../Admin/My_Profile.html">My Profile</a>
                                <a class="dropdown-item" href="My_Downloads.html">My Downloads</a>
                                <a class="dropdown-item" href="My_Sold_Notes.html">My Sold Notes</a>
                                <a class="dropdown-item" href="My_Rejected_Notes.html">My Rejected Notes</a>
                                <a class="dropdown-item" href="Change_Password.html">Change Password</a>
                                <a class="dropdown-item" href="#">LOGOUT</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0">
                                <button class="btn btn-outline-success my-2 my-sm-0 btn-Blue" type="submit">Logout</button>
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
</header>
    <!-- Header ENDS -->
    
    <?php
    
       if(isset($_GET['edit'])){
            $ID = $_GET['edit'];
            $query = "SELECT * FROM sellernotes WHERE Status='6' AND ID=$ID";
            $Edit_Notes = mysqli_query($connection,$query);
            if($row = mysqli_fetch_assoc($Edit_Notes)){
                $TitleOld = $row['Title'];
                $CategoryOld = $row['Category'];
                $Display_PictureOld = $row['DisplayPicture'];
                $TypeOld = $row['NoteType'];
                $NumberOfNotesOld = $row['NumberOfPages'];
                $DescriptionOld = $row['Description'];
                $CountryOld = $row['Country'];
                $UniversityNameOld = $row['UniversityName'];
                $CourseOld = $row['Course'];
                $CourseCodeOld = $row['CourseCode'];
                $ProffessorOld = $row['Professor'];
                $sellOld = $row['IsPaid'];
                $sell_priceOld = $row['SellingPrice'];
            }else {
                die("Query Failed" . mysqli_error($connection));
            } 
       }
    
    
    
    ?>
    
    <!-- Add Notes -->
    <section id="bg-image-add-notes" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 id="title">Add Notes</h2>
                </div>
            </div>
        </div>
    </section>
    
    <?php
    
    /*
        Edit Notes (form has to edit data to database)
    */
    
    if(isset($_POST['save'])){
        
        $Title = $_POST['notes_title'];
        $Category = $_POST['Category'];
        $Display_Picture = $_FILES['dp']['name']; 
        $Display_Picture_tempname = $_FILES['dp']['tmp_name'];
        $Upload_Notes = $_FILES['upload_notes']['name'];
        $Upload_Notes_tempname = $_FILES['upload_notes']['tmp_name'];
        $Type = $_POST['note_type'];
        $Pages = $_POST['note_pages'];
        $Description = $_POST['Description'];
        $Country = $_POST['country'];
        $Institute_Name = $_POST['institute_name'];
        $Proffessor = $_POST['proffessor'];
        $sell = $_POST['sell'];        
        $sell_price = $_POST['sell_price'];
        $Upload_File = $_FILES['upload_file']['name'];
        $Upload_File_tempname = $_FILES['upload_file']['tmp_name'];
        
        //Type Details 
        $query = "SELECT * FROM types WHERE Name='{$Type}'";
        $Type_select_all = mysqli_query($connection,$query);
        if($row = mysqli_fetch_assoc($Type_select_all)){
            $TypeID = $row['ID'];
        }else {
            die("Query Failed" . mysqli_error($connection));
        }
        
        //Category Details
        $query = "SELECT * FROM categories WHERE Name='{$Category}'";
        $Category_select_all = mysqli_query($connection,$query);
        if($row = mysqli_fetch_assoc($Category_select_all)){
            $CategoryID = $row['ID'];
        }else {
            die("Query Failed" . mysqli_error($connection));
        }
        
        
        //Country Details
        $query = "SELECT * FROM countries WHERE Name='{$Country}'";
        $Country_select_all = mysqli_query($connection,$query);
        if($row = mysqli_fetch_assoc($Country_select_all)){
            $CountryID = $row['ID'];
        }else {
            die("Query Failed" . mysqli_error($connection));
        }
        
        
        
        
        //Update Data into sellernotes table..
        $query = "UPDATE sellernotes SET  SellerID='{$ID}',Status='6',Title='{$Title}',Category='{$CategoryID}',DisplayPicture='{$Display_Picture}',NoteType='{$TypeID}',NumberOfPages='{$Pages}',Description='{$Description}',UniversityName='{$Institute_Name}',Country='{$CountryID}',Course='GOGO',CourseCode='023',Professor='{$Proffessor}',IsPaid=$sell,SellingPrice='{$sell_price}',NotesPreview='{$Upload_File}' WHERE ID=$ID";
        
        $Notes_Details = mysqli_query($connection,$query);
        if(!$Notes_Details){
            die("Query Failed" . mysqli_error($connection));
        }    
        
        //Update Attachments sellernotesattachments in table..
        $query_Attachments = "UPDATE sellernotesattachments SET NoteID='{$NoteID}',FileName='{$Upload_Notes}',FilePath='Members/{$ID}/{$NoteID}/Attachments/$Upload_Notes' WHERE ID=$ID";
        
        $Notes_Attachments = mysqli_query($connection,$query_Attachments);
        if(!$Notes_Attachments){
            die("Query Failed" . mysqli_error($connection));
        }
        
        //Check Whether Folder Exist and put file/img in it
        $Folder = "../Uploads";
        if(!is_dir($Folder))  { 
            mkdir($Folder);
            move_uploaded_file($Display_Picture_tempname,"../Uploads/$Display_Picture"); 
            move_uploaded_file($Upload_Notes_tempname, "../Uploads/$Upload_Notes");
            move_uploaded_file($Upload_File_tempname, "../Uploads/$Upload_File");
        }else{
            move_uploaded_file($Display_Picture_tempname,"../Uploads/$Display_Picture"); 
            move_uploaded_file($Upload_Notes_tempname, "../Uploads/$Upload_Notes");
            move_uploaded_file($Upload_File_tempname, "../Uploads/$Upload_File");
        }
        
    }
    
    ?>
    
    <div class="container">
        <section id="add-notes">
            <form action="" method="post" enctype="multipart/form-data" name="Add_Notes_Form">
                <div class="basic-notes-form">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="heading">
                                <h2>Basic Notes Details</h2>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="notes_title">Title*</label>
                                <input type="text" value="<?php if(isset($_GET['edit'])){echo $TitleOld; }else if(isset($_POST['save'])){echo $Title;} ?>" name="notes_title" class="form-control" id="notes-title"
                                    placeholder="Enter your notes title" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="Category">Category*</label>
                                <select class="form-control custom-select" name="Category" id="category" required>
                                    <option value="<?php if(isset($_GET['edit'])){echo $CategoryOld; }else if(isset($_POST['save'])){echo $Category;} ?>" selected>Select your Category </option>
                                    <?php
                                        //Category Details
                                        $query = "SELECT * FROM categories";
                                        $Category_select = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($Category_select)){
                                            $CategoryName = $row['Name'];
                                            echo "<option value='" . $CategoryName . "'> " . $CategoryName . "</option>";
                                        }
                                    ?>    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <label>Display Picture</label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12 text-center">
                                    <div class="add-border">
                                    <label for="dp" class="upload-profile">
                                        <img src="images/Add-Notes/upload-file.png">
                                        <p style="color: lightgray;" id="upload-picture">Upload a Picture</p>
                                        <input type="file" name="dp" id="dp" style="display: none;">
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <label>Upload Notes</label>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-12 text-center">
                                        <div class="add-border">
                                        <label for="upload_notes" class="upload-profile">
                                            <img src="images/Add-Notes/upload-note.png">
                                            <p style="color: lightgray;" id="PDF_files">Upload a Notes</p>
                                            <input type="file" name="upload_notes" id="upload_notes" style="display: none;" multiple>
                                        </label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="note_type">Type</label>
                                <select class="form-control custom-select" name="note_type" id="note-type">
                                    <option value="<?php if(isset($_GET['edit'])){echo $TypeOld; }else if(isset($_POST['save'])){echo $Type;} ?>" selected>Select your notes type</option>
                                    <?php
    
                                        //Type Details 
                                        $query = "SELECT * FROM types";
                                        $Type_select = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($Type_select)){
                                            $TypeName = $row['Name'];
                                            echo "<option value='". $TypeName . "'>" . $TypeName ."</option>";
                                        }
                                    
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="note_pages">Pages*</label>
                                <select class="form-control custom-select" name="note_pages" id="note-pages" required>
                                    <option value="<?php if(isset($_GET['edit'])){echo $PagesOld; }else if(isset($_POST['save'])){echo $Pages;} ?>" selected>Enter number of note pages</option>
                                    <option>20</option>
                                    <option>100</option>
                                    <option>50</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="Description" id="description">Description*</label>
                                <textarea class="form-control"  value="<?php if(isset($_GET['edit'])){echo $DescriptionOld; }else if(isset($_POST['save'])){echo $Description;} ?>" name="Description" id="Description"
                                    placeholder="Enter your Description" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="institute-information-form">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="heading">
                                <h2>Institute Details</h2>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="country">Country*</label>
                                <select class="form-control custom-select" name="country" id="country" required>
                                    <option value="<?php if(isset($_GET['edit'])){echo $CountryOld; }else if(isset($_POST['save'])){echo $Country;} ?>" selected>Select your Country</option>
                                    <?php
                                        
                                        //Country Details
                                        $query = "SELECT * FROM countries";
                                        $Country_select = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($Country_select)){
                                            $CountryName = $row['Name'];
                                            echo "<option value='". $CountryName . "'>" . $CountryName ."</option>";
                                        } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="institute_name">Institution name</label>
                                <input type="text" value="<?php if(isset($_GET['edit'])){echo $UniversityNameOld; }else if(isset($_POST['save'])){echo $Institute_Name;} ?>" class="form-control" name="institute_name" id="institute_name"
                                    placeholder="Enter your institute name" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="proffessor">Proffessor/lecturer</label>
                                <input type="text" value="<?php if(isset($_GET['edit'])){ echo $ProffessorOld; }else if(isset($_POST['save'])){echo $Proffessor;} ?>" class="form-control" name="proffessor" id="professor"
                                    placeholder="Enter your proffessor name" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="selling-information">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="heading">
                                <h2>Selling Information</h2>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    
                                    <label for="sell" id="#sell">Sell For*</label><br>
                                    <input type="radio" id="free" name="sell" value="0" checked>
                                    <label for="free" id="free-lbl">Free</label>
                                    <input type="radio" id="paid" name="sell" value="1">
                                    <label for="paid" id="paid-lbl">Paid</label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <label for="sell_price">Sell Price</label>
                                    <input type="text" value="<?php if(isset($_GET['edit'])){echo $sell_priceOld; }else if(isset($_POST['save'])){echo $sell_price;}else{echo "0";} ?>" name="sell_price" class="form-control" id="sell-price" placeholder="Enter your price">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <label>Note Preview</label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12 text-center">
                                    <div class="add-border">
                                    <label for="upload_file" class="upload-profile">
                                        <img src="images/Add-Notes/upload-file.png">
                                        <p style="color: lightgray;" id="note-preview">Upload a Picture</p>
                                        <input type="file" name="upload_file" id="upload_file" style="display: none;" onclick="return PaidNotes()">
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button">
                    <button type="submit" name="save" class="btn btn-Blue">SAVE</button>
                    <button type="submit" name="publish" class="btn btn-Blue" onclick="return PublishNotes()">PUBLISH</button>
                </div>
            </form>

        
        <?php
            
            if(isset($_POST['publish'])){
                        
                        
                        //Update status of notes 
                        $query = "UPDATE sellernotes SET Status='7' WHERE ID=$ID";
                        $Notes_Update = mysqli_query($connection,$query);
                        if(!$Notes_Update){
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        $query = "SELECT * FROM sellernotes AS sn JOIN users AS us ON sn.SellerID=us.ID WHERE sn.ID='{$ID}'";
                        $Notes_select_ID = mysqli_query($connection,$query);
                        if($row = mysqli_fetch_assoc($Notes_select_ID)){
                            $Name = $row['FirstName'];
                            $Title = $row['Title'];
                        }else{
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        
                        //Mail to the admin for publish notes confirmation
                        $to = "gandhiriya99@gmail.com";
                        
                        $header = "MIME_Version:1.0" . "\r\n";
                        $header .= "Content-type: text/html; charset=iso-8859-1"."\r\n";
                        $header .= 'From: gogoproject2020@gmail.com';
                        
                        $subject = $Name . " sent his note for review";
                        
                        $comments = " Hello Admins, <br><br> We want to inform you that, " . 
                        $Name ." sent his note ". $Title ." for review. Please look at the notes and take required actions. <br><br> Regards, <br> Notes Marketplace";
                        
                        if(!mail($to,$subject,$comments,$header)){
                            echo "Email Failed";
                        }else{
                            header("Location: Dashboard.php");
                        }
                        
            }
            
        ?>
            
        </section>
    </div>
    <!-- Add Notes ENDS -->  
 
<script>    
    
        function PublishNotes(){
            
            if(confirm("Publishing this note will send note to administrator for review, once administrator review and approve then this note will be published to portal. Press yes to continue.")){
                return true;
            }else{
                return false;
                }
            
        }
        
        /*  Display picture js  */
        var dp = document.getElementById( 'dp' );
        var Picture = document.getElementById( 'upload-picture' );

        dp.addEventListener( 'change', showDisplayPicture );

        function showDisplayPicture( event ) {
            // the change event gives us the input it occurred in
            var dp = event.srcElement;
            // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
            var fileName1 = dp.files[0].name;
            // use fileName however fits your app best, i.e. add it into a div
            Picture.textContent = 'File name: ' + fileName1;
        }
        
        
        
        /*  Upload Notes js  */
        var uploads = document.getElementById( 'upload_notes' );
        var uploadNotes = document.getElementById( 'PDF_files' );

        uploads.addEventListener( 'change', showUploadNotes );

        function showUploadNotes( event ) {
            var uploads = event.srcElement;
            var count = uploads.files.length;
            uploadNotes.textContent="";
            for(f=0;f<count;f++){
                var file = uploads.files[f].name;
                uploadNotes.textContent += 'File name'+f+':' + file + ' ';
            }
        }
        
        
        
        
        /*  Notes Preview js  */
        var notes = document.getElementById( 'upload_file' );
        var preview = document.getElementById( 'note-preview' );

        notes.addEventListener( 'change', showNotePreview );

        function showNotePreview( event ) {
            var notes = event.srcElement;
            var fileName3 = notes.files[0].name;
            preview.textContent = 'File name: ' + fileName3;
        }
        
</script> 
  
    
<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->