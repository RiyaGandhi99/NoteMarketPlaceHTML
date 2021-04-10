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
    window.onload=function(){
        var upload = document.getElementById('upload');
        var Profile = document.getElementById('Profile');

        upload.addEventListener('change', ProfilePhoto);
        function ProfilePhoto( event ){
        var upload = event.srcElement;
        var file = upload.files[0].name;
            Profile.textContent = "Profile Photo " + file;
        }

    }
</script>
   
   
    <!-- My Profile -->
    <section id="profile">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-12 text-left">

                        <div class="horizontal-heading">
                            <h2>My Profile</h2>
                        </div>

                    </div>

                </div>
            <?php
                
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
                    $EmailID = $_SESSION['EmailID']; 
                    
                    $query = "SELECT * FROM users WHERE EmailID='{$EmailID}'";
                    $Users_select = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($Users_select)){
                        $ID = $row['ID'];
                        $EmailIDOld = $row['EmailID'];
                        $FirstNameOld = $row['FirstName'];
                        $LastNameOld = $row['LastName'];
                    }
                    
                    $query = "SELECT * FROM userprofile WHERE UserID=$ID";
                    $User_profile_select = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($User_profile_select)){
                        $CountryCodeOld = $row['Phone number - Country Code'];
                        $PhonenumberOld = $row['Phone number'];
                    }
                }
            ?>
            
            <?php
                if(isset($_POST['My_Profile'])){
                    
                    
                    $firstname = $_POST['First_Name'];
                    $lastname = $_POST['Last_Name'];
                    $EmailID = $_POST['Email'];
                    $Secondary_Email = $_POST['Secondary_Email'];
                    $country_code = $_POST['PhoneCode'];
                    $Phone_No = $_POST['Phone_Number'];
                    $Profile_Picture = $_FILES['upload']['name'];
                    $Profile_Picture_tempname = $_FILES['upload']['tmp_name'];
                    $Profile_Picture_Type = $_FILES['upload']['type'];
                    
                    $errors = array();
                    $acceptable = array(
                        'image/jpeg',
                        'image/jpg',
                        'image/gif',
                        'image/png'
                    );
                    

                    if((!in_array($Profile_Picture_Type, $acceptable)) && (!empty($Profile_Picture_Type))) {
                        $errors[] = 'Invalid file type. Only JPG, GIF and PNG types are accepted.';
                    }

                    if(count($errors) === 0) {
                        
                        $query = "SELECT * FROM userprofile WHERE UserID=$ID";
                        $Users_Profile_select = mysqli_query($connection,$query);
                        if(!$Users_Profile_select){
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        $query = "UPDATE users SET
                        FirstName='{$firstname}',LastName='{$lastname}' WHERE ID=$ID";
                        $User_Details = mysqli_query($connection,$query);
                        if(!$User_Details){
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        $Profile_Count = mysqli_num_rows($Users_Profile_select);

                        if($Profile_Count==0){
                            
                            $query = "INSERT INTO userprofile( `UserID`,`SecondaryEmailAddress`,`Phone number - Country Code`, `Phone number`, `Profile Picture`) VALUES ('{$ID}','{$Secondary_Email}','+{$country_code}','{$Phone_No}','{$Profile_Picture}')";

                        }else{

                            $query = "UPDATE userprofile SET `SecondaryEmailAddress`='{$Secondary_Email}',`Phone number - Country Code`='+{$country_code}', `Phone number`='{$Phone_No}',`Profile Picture`='{$Profile_Picture}' WHERE `UserID`=$ID";

                        }
                        
                        $Profile = "../Uploads/Admin/{$ID}/Profile_Photo";
                        if(!is_dir($Profile)) {
                            mkdir($Profile,0777,true);      move_uploaded_file($Profile_Picture_tempname,"../Uploads/Admin/{$ID}/Profile_Photo/$Profile_Picture");
                        }else{
                            move_uploaded_file($Profile_Picture_tempname,"../Uploads/Admin/{$ID}/Profile_Photo/$Profile_Picture");
                        }
                        
                        $User_Profile_Details = mysqli_query($connection,$query);
                        if(!$User_Profile_Details){
                            die("Query Failed" . mysqli_error($connection));
                        }
                    } else {
                        foreach($errors as $error) {
                            echo '<script>
                                    alert("'.$error.'");
                                </script>';
                        }
                    }
                    
                }
        ?>
                <!-- My Profile row  -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-6 col-sm-12 col-12">

                            <div class="row profile-row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group text-left">
                                        <label for="Full-Name">First Name<span> *</span></label>
                                        <input type="text" value="<?php if(isset($_SESSION['loggedin'])){ echo $FirstNameOld; } ?>" name="First_Name" class="form-control" placeholder="Enter your full name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row profile-row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group text-left">
                                        <label for="Last-Name">Last Name<span> *</span></label>
                                        <input type="text" value="<?php if(isset($_SESSION['loggedin'])){ echo $LastNameOld; } ?>" name="Last_Name" class="form-control" placeholder="Enter your last name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row profile-row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group text-left">
                                        <label for="Email-Address">Email<span> *</span></label>
                                        <input type="email" value="<?php if(isset($_SESSION['loggedin'])){ echo $EmailIDOld; } ?>" name="Email" class="form-control" placeholder="Enter your email address" <?php if(isset($_SESSION['loggedin'])){ echo "readonly"; }else{ echo "required"; }?>>
                                    </div>
                                </div>
                            </div>
                            <div class="row profile-row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group text-left">
                                        <label for="Secondary-Email">Secondary Email</label>
                                        <input type="email" name="Secondary_Email" class="form-control" placeholder="Enter your email address">
                                    </div>
                                </div>
                            </div>
                            <div class="row profile-row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <h4>Phone Number</h4>
                                    <div class="row" id="profile-row-inner">
                                        <div class="col-md-2 col-sm-2 col-2">
                                            <div class="form-group text-left">
                                                <select class="form-control" name="PhoneCode">
                                                    <?php if(isset($_SESSION['loggedin']) && mysqli_num_rows($User_profile_select)!=0){?>
                                                    <option value="<?php echo $CountryCodeOld; } ?>" selected><?php echo $CountryCodeOld; ?></option>
                                            
                                                    <?php
                                        
                                                    //Country Details
                                                    $query = "SELECT * FROM countries WHERE IsActive='1'";
                                                    $Country_select = mysqli_query($connection,$query);
                                                    while($row = mysqli_fetch_assoc($Country_select)){
                                                        $Phonecode = $row['Phonecode'];
                                                        echo "<option value='". $Phonecode . "'>" . $Phonecode ."</option>";
                                                    } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-10 col-10">
                                                <div class="form-group">
                                                    <input type="text" value="<?php if(isset($_SESSION['loggedin']) && mysqli_num_rows($User_profile_select)!=0){ echo $PhonenumberOld; }else{ echo ""; } ?>" name="Phone_Number" class="form-control" placeholder="Enter your phone number" required>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row profile-row">
                                <div class="col-md-12 col-sm-12 col-12" id="Profile-Picture">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <label>Profile Picture</label>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-12 text-center">
                                            <div class="add-border">
                                                <label for="upload" class="upload-profile">
                                                    <img src="images/User-Profile/upload.png">
                                                    <p style="color: lightgray;" id="Profile">Upload a Picture</p>
                                                    <input type="file" name="upload" id="upload" style="display: none;">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- My Profile Button -->
                    <div class="row profile-row">

                        <div class="col-md-12 col-sm-12 col-12">
                            <button type="submit" name="My_Profile" class="btn btn-info btn-rich-blue">Submit</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </section>
    <!-- My Profile ENDS -->

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->  