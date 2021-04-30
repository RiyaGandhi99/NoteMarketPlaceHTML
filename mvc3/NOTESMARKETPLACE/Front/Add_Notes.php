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
        Add Notes (form has to add data to database)
    */
    
    if(isset($_POST['save'])){
        
        $Title = $_POST['notes_title'];
        $Category = $_POST['Category'];
        !empty($_FILES['dp']['name'])?$Display_Picture = $_FILES['dp']['name']:$Display_Picture = "";
        $Display_Picture_tempname = $_FILES['dp']['tmp_name'];
        $Display_Picture_Type = $_FILES['dp']['type'];
        $Upload_Notes_tempname[] = $_FILES['upload_notes']['tmp_name'];
        $Upload_Notes_Type[] = $_FILES['upload_notes']['type'];
        !empty($_FILES['upload_notes']['name'])?$Upload_Notes[] = $_FILES['upload_notes']['name']:$Upload_Notes[] = "";
        !empty($_POST['note_type'])?$Type = $_POST['note_type']:$Type = "";
        $Pages = $_POST['note_pages'];
        $Description = $_POST['Description'];
        $Country = $_POST['country'];
        !empty($_POST['institute_name'])?$Institute_Name = $_POST['institute_name']:$Institute_Name = "";
        !empty($_POST['CourseName'])?$CourseName = $_POST['CourseName']:$CourseName = "";
        $CourseCode = $_POST['CourseCode'];
        $Proffessor = $_POST['proffessor'];
        $sell = $_POST['sell'];        
        !empty($_POST['sell_price'])?$sell_price = $_POST['sell_price']:$sell_price = "";
        !empty($_FILES['upload_file']['name'])?$Upload_File = $_FILES['upload_file']['name']:$Upload_File = "";
        $Upload_File_tempname = $_FILES['upload_file']['tmp_name'];
        $Upload_File_Type = $_FILES['upload_file']['type'];
        

        //Type Details 
        if(!empty($Type)){
            $query = "SELECT * FROM types WHERE Name='{$Type}'";
            $Type_select_all = mysqli_query($connection,$query);
            if($row = mysqli_fetch_assoc($Type_select_all)){
                $TypeID = $row['ID'];
            }else {
                die("Query Failed aaa" . mysqli_error($connection));
            }
        }else{
            $TypeID=1;
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
        
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            $EmailID=  $_SESSION['EmailID'];
            $query = "SELECT * FROM users WHERE EmailID='$EmailID'";
                             
            $Users_select = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($Users_select)){
                $Id = $row['ID'];
            }
        }else {
            
        }
        
        $errors     = array();
        $acceptable_img = array(
            'image/jpeg',
            'image/jpg',
            'image/gif',
            'image/png'
        );
        $acceptable_pdf = array(
            'application/pdf'
        );
        
        if((!in_array($Display_Picture_Type, $acceptable_img)) && (!empty($Display_Picture_Type))) {
                    $errors[] = 'Invalid file type. Only JPG, GIF and PNG types are accepted.';
        }
        
        if((!in_array($Upload_Notes_Type, $acceptable_pdf)) && (!empty($Upload_Notes_Type)) &&
          (!in_array($Upload_File_Type, $acceptable_pdf)) && (!empty($Upload_File_Type))) {
                    $errors[] = 'Invalid file type. Only PDF types are accepted.';
        }
        
        if(count($errors) === 0 || empty($Display_Picture_Type) || empty($Upload_Notes_Type) || empty($Upload_File_Type)) {
                
        
        //Insert Data into sellernotes table..
        $query = "INSERT INTO sellernotes(SellerID,Status,Title,Category,DisplayPicture,NoteType,NumberOfPages,Description,UniversityName,Country,Course,CourseCode,Professor,IsPaid,SellingPrice,NotesPreview) VALUES ('{$Id}','6','{$Title}','{$CategoryID}','{$Display_Picture}','{$TypeID}','{$Pages}','{$Description}','{$Institute_Name}','{$CountryID}','{$CourseName}','{$CourseCode}','{$Proffessor}',$sell,'{$sell_price}','{$Upload_File}')";
        
        $Notes_Details = mysqli_query($connection,$query);
        if(!$Notes_Details){
            die("Query Failed" . mysqli_error($connection));
        }    
        
        //Last Inserted row in Sellernotes 
        $query = "SELECT * FROM sellernotes WHERE ID =(SELECT MAX(ID) FROM sellernotes)";
        $Last_insert = mysqli_query($connection,$query);
        if($row = mysqli_fetch_assoc($Last_insert)){
            $NoteID = $row['ID'];
        }else{
            die("Query Failed" . mysqli_error($connection));
        }
        
        $r=0;
        while($r<count($_FILES['upload_notes']['name'])){
                
                //Last Inserted row in Sellernotes
                $query = "SELECT * FROM sellernotesattachments WHERE ID =(SELECT MAX(ID) FROM sellernotesattachments)";
                $Last_insert = mysqli_query($connection,$query);
                $row = mysqli_fetch_assoc($Last_insert);
                $Upload_Notes = $_FILES['upload_notes']['name'][$r];
                $Upload_Notes_tempname = $_FILES['upload_notes']['tmp_name'][$r];
                
            
            
                //insert Attachments sellernotesattachments in table..
                $query_Attachments = "INSERT INTO sellernotesattachments(NoteID,FileName,FilePath) VALUES ('{$NoteID}','{$Upload_Notes}','Members/{$Id}/{$NoteID}/Attachments/$Upload_Notes')";
                $Notes_Attachments = mysqli_query($connection,$query_Attachments);
                if(!$Notes_Attachments){
                    die("Query Failed" . mysqli_error($connection));
                }
                
                $Folder = "../Uploads/Members/{$Id}/{$NoteID}/Attachments";
                if(!is_dir($Folder)) {
                    mkdir($Folder,0777,true);
                    move_uploaded_file($Upload_Notes_tempname, "../Uploads/Members/{$Id}/{$NoteID}/Attachments/$Upload_Notes");
                }else{
                    move_uploaded_file($Upload_Notes_tempname, "../Uploads/Members/{$Id}/{$NoteID}/Attachments/$Upload_Notes");
                }
               $r++; 
        }
        
        
        
        //Check Whether Folder Exist and put file/img in it
        $Folder = "../Uploads/Members/{$Id}/{$NoteID}/Images";
        if(!is_dir($Folder))  { 
            mkdir($Folder,0777,true);
            move_uploaded_file($Display_Picture_tempname,"../Uploads/Members/{$Id}/{$NoteID}/Images/$Display_Picture"); 
            move_uploaded_file($Upload_File_tempname, "../Uploads/Members/{$Id}/{$NoteID}/Images/$Upload_File");
        }else{
            move_uploaded_file($Display_Picture_tempname,"../Uploads/Members/{$Id}/{$NoteID}/Images/$Display_Picture"); 
            move_uploaded_file($Upload_File_tempname, "../Uploads/Members/{$Id}/{$NoteID}/Images/$Upload_File");
        }
        
        header("Location: Dashboard.php");
        }else {
            foreach($errors as $error) {
                echo '<script>
                    alert("'.$error.'");
                </script>';
            }
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
                                            <input type="file" name="upload_notes[]" id="upload_notes" style="display: none;" multiple>
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
                                    <option>10</option>
                                    <option>20</option>
                                    <option>50</option>
                                    <option>100</option>
                                    <option>200</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="Description" id="description">Description*</label>
                                <textarea class="form-control" name="Description" id="Description"
                                    placeholder="Enter your Description" required><?php if(isset($_POST['save'])){echo $Description;}else{ echo ""; } ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="institute-information-form">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="heading">
                                <h2>Institute Information</h2>
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
                                <label for="institute_name">Institution name*</label>
                                <input type="text" value="<?php if(isset($_GET['edit'])){echo $UniversityNameOld; }else if(isset($_POST['save'])){echo $Institute_Name;} ?>" class="form-control" name="institute_name" id="institute_name"
                                    placeholder="Enter your institute name" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="institute-information-form">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="heading">
                                <h2>Course Details</h2>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="Course_Name">Course Name</label>
                                <input type="text" value="<?php if(isset($_GET['edit'])){echo $UniversityNameOld; }else if(isset($_POST['save'])){echo $CourseName;} ?>" class="form-control" name="CourseName" id="Course_Name"
                                    placeholder="Enter your Course Name">
                                
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="Course_Code">Course Code</label>
                                <input type="text" value="<?php if(isset($_GET['edit'])){echo $UniversityNameOld; }else if(isset($_POST['save'])){echo $CourseCode;} ?>" class="form-control" name="CourseCode" id="Course_Code"
                                    placeholder="Enter your Course Code">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="proffessor">Proffessor/lecturer*</label>
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
                                    <input type="radio" id="paid" name="sell" value="1" >
                                    <label for="paid" id="paid-lbl">Paid</label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <label for="sell_price">Sell Price</label>
                                <input type="text" value="<?php if(isset($_GET['edit'])){echo $sell_priceOld; }else if(isset($_POST['save'])){echo $sell_price;}else{echo "0";} ?>" name="sell_price" class="form-control" id="sell-price" placeholder="Enter your price" readonly>
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
                    <button type="submit" name="publish" class="btn btn-Blue" onclick="return PublishNotes()" style="visibility:<?php if(isset($_POST['save'])){ echo 'visible'; }else{ echo 'hidden'; } ?>;">PUBLISH</button>
                </div>
            </form>

        
            <?php
            
            if (empty($_POST["email"])) {
                $email_error = "Required";
            } else {
                $email = proc_input($_POST["email"]);
            }

            
            if(isset($_POST['publish'])){
                        
                        $query = "SELECT * FROM sellernotes WHERE ID =(SELECT MAX(ID) FROM sellernotes)";
                        $Last_Update = mysqli_query($connection,$query);
                        if($row = mysqli_fetch_assoc($Last_Update)){
                            $Title = $row['Title'];
                            $ID = $row['ID'];
                        }else{
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        //Update status of notes 
                        $query = "UPDATE sellernotes SET Status='7' WHERE Title='{$Title}'";
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
                        
                        $query = "SELECT * FROM system_configuration WHERE ID=3";
                        $config_select = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($config_select)){
                            $Default_EmailID = $row['Value'];
                        }
                        
                        //Mail to the admin for publish notes confirmation
                        $to = $Default_EmailID;
                        
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
 
<script src="js/jquery-min.js"></script>
<script>    
        
        $('input[type=radio]').change(function(){
            var SellType = $(this).val();
            if(SellType==0){
                $('#sell-price').prop('readonly',true);
                $('#upload_file').prop('required',true);
            }else{
                $('#sell-price').prop('readonly',false);
                $('#upload_file').prop('required',false);
            }
        });
    
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