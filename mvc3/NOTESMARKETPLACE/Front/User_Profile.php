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

<script type="text/javascript">

    window.onload=function(){
    
        var upload = document.getElementById('upload_img');
        var Profile = document.getElementById('Profile_Pic');

        upload.addEventListener('change', ProfilePhoto);
        function ProfilePhoto( event ){
        var upload = event.srcElement;
        var file = upload.files[0].name;
            Profile.textContent = "Profile Photo " + file;
        }
    }
    
    function validateForm() {
        
        var First_Name = document.forms["User_Profile_Form"]["firstname"].value;
        if (First_Name == "") {
            alert("First Name must be filled out");
            return false;
        }
        var Last_Name = document.forms["User_Profile_Form"]["Lastname"].value;
        if (Last_Name == "") {
            alert("Last Name must be filled out");
            return false;
        }
        var Email_Address = document.forms["User_Profile_Form"]["EmailID"].value;
        if (Email_Address == "") {
            alert("Email Address must be filled out");
            return false;
        }
        var Phone_No = document.forms["User_Profile_Form"]["Phone_No"].value;
        if (Phone_No == "") {
            alert("Phone Number must be filled out");
            return false;
        }
        var add1 = document.forms["User_Profile_Form"]["add1"].value;
        if (add1 == "") {
            alert("Address 1 must be filled out");
            return false;
        }
        var add2 = document.forms["User_Profile_Form"]["add2"].value;
        if (add2 == "") {
            alert("Address 2 must be filled out");
            return false;
        }
        var City = document.forms["User_Profile_Form"]["City"].value;
        if (City == "") {
            alert("City must be filled out");
            return false;
        }
        var state = document.forms["User_Profile_Form"]["state"].value;
        if (state == "") {
            alert("State must be filled out");
            return false;
        }
        var zip_code = document.forms["User_Profile_Form"]["zip_code"].value;
        if (zip_code == "") {
            alert("Zip code must be filled out");
            return false;
        }
        
    }

</script>

    <!-- User Profile -->
    <section id="bg-image-user-profile" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 id="title">User Profile</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section id="user-profile-form">
            
            
            <?php
                if(isset($_POST['Profile'])){
        
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $EmailID = $_POST['EmailID'];
                $dob = $_POST['dob'];
                $gender = $_POST['gender'];
                $country_code = $_POST['country_code'];
                $Phone_No = $_POST['Phone_No'];
                $Profile_Picture = $_FILES['upload_img']['name']; 
                $Profile_Picture_tempname = $_FILES['upload_img']['tmp_name'];
                $Profile_Picture_Size = $_FILES['upload_img']['size'];
                $Profile_Picture_Type = $_FILES['upload_img']['type'];
                $add1 = $_POST['add1'];
                $add2 = $_POST['add2'];
                $City = $_POST['City'];
                $state = $_POST['state'];
                $zip_code = $_POST['zip_code'];
                $country = $_POST['country'];
                $university = $_POST['university'];
                $College = $_POST['College'];
                
                    
                //Users Details
                $query = "SELECT * FROM users WHERE EmailID='{$EmailID}'";
                $User_select = mysqli_query($connection,$query);
                if($row = mysqli_fetch_assoc($User_select)){
                    $UserID = $row['ID'];
                }else {
                    die("Query Failed" . mysqli_error($connection));
                }
                    
                //Gender Details
                $query = "SELECT * FROM referencedata WHERE Value='{$gender}'";
                $Gender_select = mysqli_query($connection,$query);
                if($row = mysqli_fetch_assoc($Gender_select)){
                    $GenderID = $row['ID'];
                }else {
                    die("Query Failed" . mysqli_error($connection));
                }
                
                $query = "SELECT * FROM userprofile WHERE UserID=$UserID";
                $UPselect = mysqli_query($connection,$query);
                if(!$UPselect){
                    die("Query Failed" . mysqli_error($connection));    
                }
                    
                if(mysqli_num_rows($UPselect)==0){
                    $query = "INSERT INTO userprofile( `UserID`, `DOB`, `Gender`, `Phone number - Country Code`, `Phone number`, `Profile Picture`, `Address Line 1`, `Address Line 2`, `City`, `State`, `Zip Code`, `Country`, `University`, `College`) VALUES ('{$UserID}','{$dob}','{$GenderID}','+{$country_code}','{$Phone_No}','{$Profile_Picture}','{$add1}','{$add2}','{$City}','{$state}','{$zip_code}','{$country}','{$university}','{$College}')";
                }else{
                    $query = "UPDATE userprofile SET `DOB`='{$dob}', `Gender`='{$GenderID}', `Phone number - Country Code`='+{$country_code}', `Phone number`='{$Phone_No}', `Profile Picture`='{$Profile_Picture}', `Address Line 1`='{$add1}', `Address Line 2`='{$add2}',`City`='{$City}', `State`='{$state}', `Zip Code`='{$zip_code}', `Country`='{$country}', `University`='{$university}', `College`='{$College}' WHERE `UserID`=$UserID";
                }
                    
                $errors     = array();
                $maxsize    = 10000000;
                $acceptable = array(
                    'image/jpeg',
                    'image/jpg',
                    'image/gif',
                    'image/png'
                );
                    
                    
                if(($Profile_Picture_Size >= $maxsize) || ($Profile_Picture_Size == 0)) {
                    $errors[] = 'File too large. File must be less than 10 megabytes.';
                }

                if((!in_array($Profile_Picture_Type, $acceptable)) && (!empty($Profile_Picture_Type))) {
                    $errors[] = 'Invalid file type. Only JPG, GIF and PNG types are accepted.';
                }

                if(count($errors) === 0) {
                    $Profile = "../Uploads/Members/{$UserID}/Profile_Photo";
                    if(!is_dir($Profile))  { 
                        mkdir($Profile,0777,true); move_uploaded_file($Profile_Picture_tempname,"../Uploads/Members/{$UserID}/Profile_Photo/$Profile_Picture"); 
                    }else{  
                        move_uploaded_file($Profile_Picture_tempname,"../Uploads/Members/{$UserID}/Profile_Photo/$Profile_Picture"); 
                    }  
                    
                    $User_Details = mysqli_query($connection,$query);
                    if(!$User_Details){
                        die("Query Failed" . mysqli_error($connection));
                    }else{
                        header("Location: Search_Notes.php");
                    }
                    
                    
                } else {
                    foreach($errors as $error) {
                        echo '<script>
                                alert("'.$error.'");
                            </script>';
                    }
                }   
            }
                
                //session.start();
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
                    $EmailID = $_SESSION['EmailID']; 
                    
                    $query = "SELECT * FROM users WHERE EmailID='{$EmailID}'";
                    $Users_select = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($Users_select)){
                        $UID = $row['ID'];
                        $EmailID = $row['EmailID'];
                        $FirstName = $row['FirstName'];
                        $LastName = $row['LastName'];
                    }  
                    
                    $query = "SELECT * FROM userprofile WHERE UserID=$UID";
                    $Users_Profile_select = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($Users_Profile_select)){
                        $DOBOLD = $row['DOB'];
                        $GenderOLD = $row['Gender'];
                        $CCOLD = $row['Phone number - Country Code'];
                        $PhonenumberOLD = $row['Phone number'];
                        $ProfilePictureOLD = $row['Profile Picture'];
                        $AddressLine1OLD = $row['Address Line 1'];
                        $AddressLine2OLD = $row['Address Line 2'];
                        $CityOLD = $row['City'];
                        $StateOLD = $row['State'];
                        $ZipCodeOLD = $row['Zip Code'];
                        $CountryOLD = $row['Country'];
                        $UniversityOLD = $row['University'];
                        $CollegeOLD = $row['College'];
                    }
                    $profile_Count = mysqli_num_rows($Users_Profile_select);
                }
            ?>
           
            <form action="" method="post" name="User_Profile_Form" onsubmit="return validateForm()" enctype="multipart/form-data">
                <div id="basic-details">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="heading">
                                <h2>Basic Profile Details</h2>
                            </div>
                        </div>
                    </div>

                    <div id="bd-form">

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="firstname" id="fname">Firstname*</label>
                                    <input type="text" value="<?php if(isset($_SESSION['loggedin'])){ echo $FirstName; } ?>" name="firstname" class="form-control" id="firstname" placeholder="Enter your first name" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="lastname" id="lname">Last Name*</label>
                                    <input type="text" value="<?php if(isset($_SESSION['loggedin'])){ echo $LastName; } ?>"
                                    name="lastname" class="form-control" id="lastname" placeholder="Enter your last name" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="EmailID" id="email">Email*</label>
                                    <input type="email" value="<?php if(isset($_SESSION['loggedin'])){ echo $EmailID; } ?>" name="EmailID" class="form-control" id="exampleInputEmail1" placeholder="Enter your email address" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="dob" id="dob">Date Of Birth</label>
                                    <input type="date" value="<?php if($profile_Count){ echo $DOBOLD; } ?>" name="dob" class="form-control" id="d.o.b" placeholder="Enter your date of birth" required>
                                    <span class="shift-right-r"></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="gender" id="seller-label">Gender</label>
                                    <select id="gender" name="gender" class="form-control custom-select" required>
                                        <option selected disabled>Gender</option>
                                        <?php
                                        
                                            //Country Details
                                            $query = "SELECT * FROM referencedata WHERE RefCategory='Gender' AND IsActive='1'";
                                            $Country_select = mysqli_query($connection,$query);
                                            while($row = mysqli_fetch_assoc($Country_select)){
                                                $Gender = $row['Value'];
                                                echo "<option value='". $Gender . "'>" .$Gender ."</option>";
                                            } 
                                        ?>  
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="phoneno" id="phoneno">Phone no.</label>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3  col-5">
                                            <div id="country_code">
                                                <select class="form-control custom-select" id="countrycode" name="country_code" required>
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
                                        <div class="col-md-9 col-sm-9 col-7">
                                            <div id="phone-no">
                                                <input type="text" name="Phone_No" value="<?php if($profile_Count){ echo $PhonenumberOLD; } ?>" class="form-control" placeholder="Enter your phone number " id="phoneno" required pattern="[7-9]{1}[0-9]{9}">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <label>Profile Picture</label>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-12 text-center">
                                        <div class="add-border">
                                            <label for="upload_img" class="upload-profile">
                                                <img src="images/User-Profile/upload.png">
                                                <p style="color: lightgray;" id="Profile_Pic">Upload a Picture</p>
                                                <input type="file" name="upload_img" id="upload_img" style="display: none;">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="address-details">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="heading">
                                <h2>Address Details</h2>
                            </div>
                        </div>
                    </div>
                    <div id="ad-form">

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="add1">Address Line 1*</label>
                                    <input type="text" name="add1" value="<?php if($profile_Count){ echo $AddressLine1OLD; } ?>" class="form-control" id="add1" placeholder="Enter your address" required>


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="add2">Address Line 2*</label>
                                    <input type="text" name="add2" value="<?php if($profile_Count){ echo $AddressLine2OLD; } ?>" class="form-control" id="add2" placeholder="Enter your address" required>


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="City">City*</label>
                                    <input type="text" name="City" value="<?php if($profile_Count){ echo $CityOLD; } ?>" class="form-control" id="CIty" placeholder="Enter your city" required>


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="state">State*</label>
                                    <input type="text" name="state" value="<?php if($profile_Count){ echo $StateOLD; } ?>" class="form-control" id="state" placeholder="Enter your state" required>


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="zip_code">ZipCode*</label>
                                    <input type="text" name="zip_code" value="<?php if($profile_Count){ echo $ZipCodeOLD; } ?>" class="form-control" id="zip-code" placeholder="Enter your zipcode" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="country" id="seller-label">Country</label>
                                    <select id="country" name="country" class="form-control custom-select">
                                        <option selected disabled>Select your country</option>
                                        <?php if($profile_Count){ echo "<option value='". $CountryOLD . "' selected>" .$CountryOLD ."</option>"; } ?>
                                        <?php
                                        
                                        //Country Details
                                        $query = "SELECT * FROM countries WHERE IsActive='1'";
                                        $Country_select = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($Country_select)){
                                            $CountryName = $row['Name'];
                                            echo "<option value='". $CountryName . "'>" . $CountryName ."</option>";
                                        } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div id="university-details">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="heading">
                                <h2>University and College Information</h2>
                            </div>
                        </div>
                    </div>
                    <div id="ud-form">

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="university">University</label>
                                    <input type="text" name="university" value="<?php if($profile_Count){ echo $UniversityOLD; } ?>" class="form-control" id="university" placeholder="Enter your university">


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="College">College</label>
                                    <input type="text" name="College" value="<?php if($profile_Count){ echo $CollegeOLD; } ?>" class="form-control" id="college" placeholder="Enter your college">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <button type="submit" name="Profile" class="btn btn-Blue">UPDATE</button>
                    </div>
                </div>
            </form>

        </section>
    </div>
    <!-- User Profile ENDS -->     
    
   
<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->