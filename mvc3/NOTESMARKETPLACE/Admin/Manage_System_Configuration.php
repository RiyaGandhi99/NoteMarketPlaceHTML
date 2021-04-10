<!-- Header -->
<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>    
    
    <?php   
        
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
            $EmailID =  $_SESSION['EmailID'];
            
            $query = "SELECT * FROM users WHERE EmailID='{$EmailID}' AND RoleID=3";
            $Super_Admin_Select = mysqli_query($connection,$query);
                
            if(!$Super_Admin_Select){
                die("Query Failed" . mysqli_error($connection));
            }
            if(mysqli_num_rows($Super_Admin_Select)==0){
                header("Location: Dashboard.php");
            }else{
                include "Header.php";   
            }
        }else{
            header("Location: ../Login.php");
        }
        
    ?>
    
    <!-- Manage System Configuration -->
    <section id="system-configuration">

        <div class="content-box-md">
            
            <?php
                
                $query = "SELECT * FROM system_configuration";
                $Config_Select = mysqli_query($connection,$query);
                if(!$Config_Select){
                    die("Query Failed" . mysqli_error($connection));
                } 
                while($row = mysqli_fetch_array($Config_Select, MYSQLI_ASSOC)) {
                        $storeArray[] =  $row['Value'];  
                }
                $System_Config_Count = mysqli_num_rows($Config_Select);
                
                $EmailOLD = $storeArray[0];
                $PNOLD = $storeArray[1];
                $SecEmailOLD = $storeArray[2];
                $FOLD = $storeArray[3];
                $TOLD = $storeArray[4];
                $LOLD = $storeArray[5];
                $NOLD = $storeArray[6];
                $POLD = $storeArray[7];
                
            ?>
                
            <form action="" method="post" name="System_Config_Form" onsubmit="return Validation()" enctype="multipart/form-data">
                <div class="container">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-12 text-left">

                            <div class="horizontal-heading">
                                <h2>Manage System Configuration</h2>
                            </div>

                        </div>

                    </div>

                    <!-- Manage System Configuration row  -->
                    <div class="row">

                        <div class="col-md-6 col-sm-12 col-12">

                            <div class="row system-configuration-row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group text-left">
                                        <label for="Email_Address">Support email address<span> *</span></label>
                                        <input type="email" name="Email_Address" value="<?php if($System_Config_Count!=0){ echo $EmailOLD; }else{ echo ""; } ?>" class="form-control" placeholder="Enter email address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row system-configuration-row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group text-left">
                                        <label for="Phone_Number">Support phone number<span> *</span></label>
                                        <input type="text" name="Phone_Number" value="<?php if($System_Config_Count!=0){ echo $PNOLD; }else{ echo ""; } ?>" class="form-control" placeholder="Enter phone number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row system-configuration-row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group text-left">
                                        <label for="Secondary_Email">Email Address(es)(for various events system will send notificatio to these users)<span>*</span></label>
                                        <input type="email" name="Secondary_Email" value="<?php if($System_Config_Count!=0){ echo $SecEmailOLD; }else{ echo ""; } ?>" class="form-control" placeholder="Enter your email address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row system-configuration-row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group text-left">
                                        <label for="Facebook_URL">Facebook URL</label>
                                        <input type="url" name="Facebook_URL" value="<?php if($System_Config_Count!=0){ echo $FOLD; }else{ echo ""; } ?>" class="form-control" placeholder="Enter facebook url">
                                    </div>
                                </div>
                            </div>
                            <div class="row system-configuration-row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group text-left">
                                        <label for="Twitter_URL">Twitter URL</label>
                                        <input type="url" name="Twitter_URL" value="<?php if($System_Config_Count!=0){ echo $TOLD; }else{ echo ""; } ?>" class="form-control" placeholder="Enter twitter url">
                                    </div>
                                </div>
                            </div>
                            <div class="row system-configuration-row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group text-left">
                                        <label for="Linkedin_URL">Linkedin URL</label>
                                        <input type="url" name="Linkedin_URL" value="<?php if($System_Config_Count!=0){ echo $LOLD; }else{ echo ""; } ?>" class="form-control" placeholder="Enter linkedin url">
                                    </div>
                                </div>
                            </div>
                            <div class="row system-configuration-row">

                                <div class="col-md-12 col-sm-12 col-12" id="Profile-Picture1">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <label>Default image for notes(if seller do not upload)</label>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-12 text-center">
                                            <div class="add-border">
                                                <label for="Notes_Photo" class="upload-profile">
                                                    <img src="images/User-Profile/upload.png">
                                                    <p style="color: lightgray;" id="Note">Upload a Picture</p>
                                                    <input type="file" name="Notes_Photo" id="Notes_Photo" style="display: none;">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row system-configuration-row">

                                <div class="col-md-12 col-sm-12 col-12" id="Profile-Picture2">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <label>Default Profile Picture(if seller do not upload)</label>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-12 text-center">
                                            <div class="add-border">
                                                <label for="Profile_Photo" class="upload-profile">
                                                    <img src="images/User-Profile/upload.png">
                                                    <p style="color: lightgray;" id="Profile">Upload a Picture</p>
                                                    <input type="file" name="Profile_Photo" id="Profile_Photo" style="display: none;">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Manage System Configuration Button -->
                    <div class="row system-configuration-row">

                        <div class="col-md-12 col-sm-12 col-12">
                            <button type="submit" name="System_Config" class="btn btn-info btn-rich-blue">Submit</button>

                        </div>

                    </div>

                </div>
            </form>        
        </div>

   <?php
                
                
                    
                    
                    
                    if(isset($_POST['System_Config'])){
                        
                        $Email_Address = $_POST['Email_Address'];
                        $Phone_Number = $_POST['Phone_Number'];
                        $Secondary_Email = $_POST['Secondary_Email'];
                        $Facebook_URL = $_POST['Facebook_URL'];
                        $Twitter_URL = $_POST['Twitter_URL'];
                        $Linkedin_URL = $_POST['Linkedin_URL'];
                        $Notes_Photo = $_FILES['Notes_Photo']['name'];
                        $Notes_Photo_type = $_FILES['Notes_Photo']['type'];
                        $Notes_Photo_tmp = $_FILES['Notes_Photo']['tmp_name'];
                        $Profile_Photo = $_FILES['Profile_Photo']['name'];
                        $Profile_Photo_type = $_FILES['Profile_Photo']['type'];
                        $Profile_Photo_tmp = $_FILES['Profile_Photo']['tmp_name'];
                         
                        
                        if($System_Config_Count==0){
                        
                            $query = "INSERT INTO system_configuration(KeyNote,Value) VALUES ('Support email address','{$Email_Address}')";
                            $email_Details = mysqli_query($connection,$query);
                                
                            if(!$email_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                            $query = "INSERT INTO system_configuration(KeyNote,Value) VALUES ('Support phone number','{$Phone_Number}')";
                            $phone_Details = mysqli_query($connection,$query);
                                
                            if(!$phone_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                        
                            $query = "INSERT INTO system_configuration(KeyNote,Value) VALUES ('Email Address(es)(for various events system will send notificatio to these users)','{$Secondary_Email}')";
                            $SecondMail_Details = mysqli_query($connection,$query);
                                
                            if(!$SecondMail_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                        
                            $query = "INSERT INTO system_configuration(KeyNote,Value) VALUES ('Facebook URL','{$Facebook_URL}')";
                            $Facebook_Details = mysqli_query($connection,$query);
                                
                            if(!$Facebook_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                        
                            $query = "INSERT INTO system_configuration(KeyNote,Value) VALUES ('Twitter URL','{$Twitter_URL}')";
                            $Twitter_Details = mysqli_query($connection,$query);
                                
                            if(!$Twitter_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                        
                            $query = "INSERT INTO system_configuration(KeyNote,Value) VALUES ('Linkedin URL','{$Linkedin_URL}')";
                            $Linkedin_Details = mysqli_query($connection,$query);
                                
                            if(!$Linkedin_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                            
                            $query = "INSERT INTO system_configuration(KeyNote,Value) VALUES ('Default image for notes(if seller do not upload)','{$Notes_Photo}')";
                            $Noteimage_Details = mysqli_query($connection,$query);
                                
                            if(!$Noteimage_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                        
                            $query = "INSERT INTO system_configuration(KeyNote,Value) VALUES ('Default Profile Picture(if seller do not upload)','{$Profile_Photo}')";
                            $Profile_Photo_Details = mysqli_query($connection,$query);
                                
                            if(!$Profile_Photo_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                            $errors     = array();
                            $acceptable = array(
                                'image/jpeg',
                                'image/jpg',
                                'image/gif',
                                'image/png'
                            );
                            
                            if((!in_array($Notes_Photo_type, $acceptable)) && (!empty($Notes_Photo_type)) && (!in_array($Profile_Photo_type, $acceptable)) && (!empty($Profile_Photo_type))    ) {
                                $errors[] = 'Invalid file type. Only JPG, GIF and PNG types are accepted.';
                            }

                            if(count($errors) === 0) {
                                //Check Whether Folder Exist and put file/img in it
                                $Folder = "../Uploads/Default_Images";
                                if(!is_dir($Folder))  { 
                                    mkdir($Folder,0777,true);
                                    move_uploaded_file($Notes_Photo_tmp,"../Uploads/Default_Images/$Notes_Photo"); 
                                    move_uploaded_file($Profile_Photo_tmp, "../Uploads/Default_Images/$Profile_Photo");
                                }else{
                                    move_uploaded_file($Notes_Photo_tmp,"../Uploads/Default_Images/$Notes_Photo");
                                    move_uploaded_file($Profile_Photo_tmp, "../Uploads/Default_Images/$Profile_Photo");
                                }
                            }else{
                                foreach($errors as $error) {
                                    echo '<script>
                                            alert("'.$error.'");
                                        </script>';
                                }
                            }
                            
                        }else{
                            
                            //Update Support email address
                            $query = "UPDATE system_configuration SET
                            Value='{$Email_Address}' WHERE KeyNote='Support email address'";
                            $Email_Details = mysqli_query($connection,$query);
                            if(!$Email_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                              
                            //Update Support phone number
                            $query = "UPDATE system_configuration SET
                            Value='{$Phone_Number}' WHERE KeyNote='Support phone number'";
                            $phone_Details = mysqli_query($connection,$query);    
                            if(!$phone_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                            //Update Email Address(es)
                            $query = "UPDATE system_configuration SET 
                            Value='{$Secondary_Email}' WHERE KeyNote='Email Address(es)(for various events system will send notificatio to these users)'";
                            $SecondMail_Details = mysqli_query($connection,$query);    
                            if(!$SecondMail_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                            //Update Facebook URL
                            $query = "UPDATE system_configuration SET
                            Value='{$Facebook_URL}' WHERE KeyNot='Facebook URL'";
                            $Facebook_Details = mysqli_query($connection,$query);
                                
                            if(!$Facebook_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                            //Update Twitter URL
                            $query = "UPDATE system_configuration SET
                            Value='{$Twitter_URL}' WHERE KeyNote='Twitter URL'";
                            $Twitter_Details = mysqli_query($connection,$query);
                                
                            if(!$Twitter_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                            //Update Linkedin URL
                            $query = "UPDATE system_configuration SET
                            Value='{$Linkedin_URL}' WHERE KeyNote='Linkedin URL' ";
                            $Linkedin_Details = mysqli_query($connection,$query);
                                
                            if(!$Linkedin_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                            //Update Default image for notes
                            $query = "UPDATE system_configuration SET Value='{$Notes_Photo}' WHERE KeyNote='Default image for notes(if seller do not upload)',";
                            $Noteimage_Details = mysqli_query($connection,$query);
                                
                            if(!$Noteimage_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                            //Update Default Profile Picture
                            $query = "UPDATE system_configuration SET
                            Value='{$Profile_Photo}' WHERE KeyNote='Default Profile Picture(if
                            seller do not upload)'";
                            $Profile_Photo_Details = mysqli_query($connection,$query);
                                
                            if(!$Profile_Photo_Details){
                                die("Query Failed" . mysqli_error($connection));
                            }    
                            
                        }
                    }    
                    
                ?>
                
    </section>
    <!-- Manage System Configuration ENDS -->

<script>

    var Notes_Photo = document.getElementById("Notes_Photo");
    var Note = document.getElementById("Note");
    
    Notes_Photo.addEventListener('change',DefaultNotes);
    
    function DefaultNotes(e){
        var Notes_Photo= e.srcElement;
        var photo =  Notes_Photo.files[0].name;
        Note.textContent = "Default Notes :" + photo;
    }
    
    var Profile_Photo = document.getElementById("Profile_Photo");
    var Profile = document.getElementById("Profile");
    
    Profile_Photo.addEventListener('change',DefaultProfile);
    
    function DefaultProfile(e){
        var Profile_Photo= e.srcElement;
        var photo =  Profile_Photo.files[0].name;
        Profile.textContent = "Profile Photo :" + photo;
    }
    

</script>

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->    