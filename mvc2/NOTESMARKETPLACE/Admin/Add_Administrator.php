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
    
    <!-- Add Administrator -->
    <section id="administrator">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-12 text-left">

                        <div class="horizontal-heading">
                            <h2>Add Administrator</h2>
                        </div>

                    </div>

                </div>

                <?php
                
                    if(isset($_GET['edit'])){
                        $ID = $_GET['edit'];
                        
                        $query = "SELECT * FROM users WHERE ID=$ID";
                        $Admin_User_Select = mysqli_query($connection,$query);    
                        if(!$Admin_User_Select){
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        if($row = mysqli_fetch_assoc($Admin_User_Select)){
                            $FirstNameOld = $row['FirstName'];
                            $LastNameOld = $row['LastName'];
                            $EmailIDOld = $row['EmailID'];
                        }
                    }
                
                        if(isset($_POST['Add_Admin'])){
                            
                            $First_Name = $_POST['First_Name'];
                            $Last_Name = $_POST['Last_Name'];
                            $Email_Address = $_POST['Email_Address'];
                            $Phone_Code = $_POST['Phone_Code'];
                            $Phone_Number = $_POST['Phone_Number'];
                            $Password = $First_Name ."$". rand(1000,10000);
                            
                            
                            $query = "SELECT * FROM users WHERE ID=$ID";
                            $Admin_User_Select = mysqli_query($connection,$query);    
                            if(!$Admin_User_Select){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                            $User = mysqli_num_rows($Admin_User_Select);
                            
                            if($User==0){
                            
                                $query = "INSERT INTO users(RoleID,FirstName,LastName,EmailID,Password) VALUES (1,'{$First_Name}','{$Last_Name}','{$Email_Address}','{$Password}')";
                                $Admin_User_Insert = mysqli_query($connection,$query);
                                if(!$Admin_User_Insert){
                                    die("Query Failed" . mysqli_error($connection));
                                }

                                $query = "SELECT * FROM users WHERE ID=(SELECT MAX(ID) FROM users)";
                                $Admin_User_Select = mysqli_query($connection,$query);
                                if($row = mysqli_fetch_assoc($Admin_User_Select)){
                                    $UserID=$row['ID'];
                                }

                                $query = "INSERT INTO userprofile(`UserID`,`Phone number - Country Code`,`Phone number`) VALUES ($UserID,'+{$Phone_Code}','{$Phone_Number}')";
                                $Admin_User_Profile_Insert = mysqli_query($connection,$query);
                                if(!$Admin_User_Profile_Insert){
                                    die("Query Failed" . mysqli_error($connection));
                                }


                                $to = $Email_Address;

                                $header = "MIME_Version:1.0" . "\r\n";
                                $header .= "Content-type: text/html; charset=iso-8859-1"."\r\n";
                                $header .= 'From: gogoproject2020@gmail.com';

                                $subject = "Password has been created for you";
                                $comments = "Hello, ".$First_Name.",<br><br> We have generated a password for you. <br> Password: " . $Password . "<br><br><br>" . "Regards, ". "<br>" . "Notes Marketplace";

                                if(!mail($to,$subject,$comments,$header)){
                                    die("Email verification Failed");
                                }
                            }else{
                            
                                $query = "UPDATE users SET FirstName='{$First_Name}',LastName='{$Last_Name}' WHERE ID=$ID";
                                $Admin_User_Update = mysqli_query($connection,$query);
                                if(!$Admin_User_Update){
                                    die("Query Failed" . mysqli_error($connection));
                                }

                                $query = "SELECT * FROM users WHERE ID=$ID";
                                $Admin_User_Select = mysqli_query($connection,$query);
                                if($row = mysqli_fetch_assoc($Admin_User_Select)){
                                    $UserID=$row['ID'];
                                }

                                $query = "UPDATE userprofile SET `Phone number - Country Code`='+{$Phone_Code}',`Phone number`='{$Phone_Number}' WHERE
                                UserID=$UserID";
                                $Admin_User_Profile_Update = mysqli_query($connection,$query);
                                if(!$Admin_User_Profile_Update){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                            
                            }    
                            
                        }
                
                ?>
                
                <form action="" method="post">
                <!-- Add Administrator row  -->
                <div class="row">

                    <div class="col-md-6 col-sm-12 col-12">

                        <div class="row administrator-row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-group text-left">
                                    <label for="Full-Name">First Name<span> *</span></label>
                                    <input type="text" value="<?php if(isset($_GET['edit'])){ echo $FirstNameOld; }else{ echo ""; } ?>" name="First_Name" class="form-control" placeholder="Enter your full name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row administrator-row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-group text-left">
                                    <label for="Last-Name">Last Name<span> *</span></label>
                                    <input type="text" value="<?php if(isset($_GET['edit'])){ echo $LastNameOld; }else{ echo ""; } ?>" name="Last_Name" class="form-control" placeholder="Enter your last name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row administrator-row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-group text-left">
                                    <label for="Email-Address">Email Address<span> *</span></label>
                                    <input type="email" value="<?php if(isset($_GET['edit'])){ echo $EmailIDOld; }else{ echo ""; } ?>" name="Email_Address" class="form-control" placeholder="Enter your email address" <?php if(isset($_GET['edit'])){ echo "readonly"; }else{ echo "required"; }?>>
                                </div>
                            </div>
                        </div>
                        <div class="row administrator-row">
                            <div class="col-md-12 col-sm-12 col-12">
                               <h4>Phone Number</h4>
                                <div class="row" id="administrator-row-inner">
                                    <div class="col-md-2 col-sm-2 col-2">
                                        <div class="form-group text-left">
                                            <select name="Phone_Code" class="form-control">
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
                                            <input type="text" name="Phone_Number" class="form-control" placeholder="Enter your phone number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Administrator Button -->
                <div class="row administrator-row">

                    <div class="col-md-12 col-sm-12 col-12">
                        <button type="submit" name="Add_Admin" class="btn btn-info btn-rich-blue">Submit</button>
                    </div>

                </div>

            </form>

            </div>
        </div>

    </section>
    <!-- Add Administrator ENDS -->

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->    