<!-- Header -->
<?php ob_start(); ?>
<?php include "Header.php"; ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>

<script>

    function validateForm() {
        var Email_Address = document.forms["Login_Form"]["Email_Address"].value;
        if (Email_Address == "") {
            alert("Email Address must be filled out");
            return false;
        }
        var Password = document.forms["Login_Form"]["Password"].value;
        if (Password == "") {
            alert("Password must be filled out");
            return false;
        }
    }

</script>
      
    <section id="login-body">
        <section id="login">
            <div class="content-box-login">
                <div class="container">
                    <div class="row justify-content-center" id="login-details">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                            <img src="images/pre-login/top-logo.png" alt="logo" class="img-resposive" class="logo">
                        </div>
                        
                            <?php
                            
                            if(isset($_POST['Login'])){
                                
                                
                                $EmailID = $_POST['Email_Address'];
                                $Password = $_POST['Password'];
                                
                                //Check whether email is verified or not
                                $query = "SELECT * FROM users WHERE EmailID='$EmailID' AND IsEmailVerified=1";
                                $Users_select_verifiedemail = mysqli_query($connection,$query);  
                                if(!$Users_select_verifiedemail){
                                    die("Query Failed" . mysqli_error($connection)); 
                                }  
                                
                                //Validate the user
                                $query = "SELECT * FROM users WHERE EmailID='$EmailID'";
                                $Users_select = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($Users_select)){
                                    $EmailID_New = $row['EmailID'];
                                    $Password_New = $row['Password'];
                                    $FirstName = $row['FirstName'];
                                    $LastName = $row['LastName'];
                                }
                                
                                if(mysqli_num_rows($Users_select)==0){
                                        ?>
                                        
                                            <script type="text/javascript">
                                                alert("Please Sign Up First to continue Login");
                                            </script>
                                            
                                        <?php
                                } else {
                                    
                                    
                                    if(mysqli_num_rows($Users_select_verifiedemail)==0){
                                        
                                        /*Ismailverification=0 => Mail to user to verifty email first.*/
                                        $to = $EmailID;
                                        
                                        $header = "MIME_Version:1.0" . "\r\n";
                                        $header .= "Content-type: text/html; charset=iso-8859-1"."\r\n";
                                        $header .= 'From: gogoproject2020@gmail.com';
                                        
                                        $subject = "Note Marketplace - Email Verification";
                                        
                                        $comments = "Hello <br><h4>".$FirstName." ".$LastName.",</h4> <br>";
                                        $comments .= "<p>Verify Your EmailID First.Please click on below link to verify your email address and to do login.</p><br><br>";
                                        
                                        $comments .= "
                                        <table>
                                        <tbody style='background-color:#fff;width:1366px;height:768px;position: absolute'>
                                            <tr style='left:50px ;background-color:#fff ;width: 640px;height:390px ;position:relative ;margin-top:200px;margin-left: 420px '>
                                                <td>
                                                    <img src='https://i.ibb.co/HVyPwqM/top-logo1.png' alt='Logo' style='margin-top: 200px;margin-left: 420px'>
                                                    <h2 style='font-family: Open Sans, sans-seri;font-size: 26px;font-weight: 600;line-height: 30px;color: #6255a5;padding-bottom: 6px;padding-top: 40px;margin-left:420px'>Email Verification</h2>
                                                    <h5 style='font-family: Open Sans, sans-serif;font-size: 18px;font-weight: 600;line-height: 22px;color: #333333;padding-bottom: 6px;padding-top: 10px;margin-left: 420px'>
                                                        Dear " . $FirstName .",
                                                    </h5>
                                                    <p style='font-family: Open Sans, sans-serif;font-size: 16px;font-weight: 400;line-height: 20px;color: #333333;padding-bottom: 25px;margin-left: 420px'>Thank you for Signup!<br><br>Simply Click below for email verification.</p>
                                                    <form action='' method='post'>    
                                                        <a href='http://localhost:8080/NOTESMARKETPLACE/front/Update_Email_Status.php?Email=$EmailID'><button type='submit' name='Email_Verification' style='width: 560px;height: 50px;margin-left: 420px;background-color:#6255a5;color:#fff;text-transform:uppercase;border: transparent;font-weight: 600'>Verify Email Address</button></a>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                        </table>";
                                        $comments .= "<br><br> Regards, <br> Notes Marketplace";
                                        
                                        
                                        
                                        if(!mail($to,$subject,$comments,$header)){
                                            die("Email verification Failed");
                                        }
                                    
                                    }else{
                                        if($Password==$Password_New){
                                                //echo "YESSS...";
                                        }else{
                                            $count=1;
                                        }
                                        
                                        session_start();
                                        $_SESSION['loggedin'] = true;
                                        $_SESSION['EmailID'] = $EmailID;
                                        
                                    }
                                }    
                            }
                        
                        ?>
                        
                        
                        
                        <form action="" name="Login_Form" method="post" onsubmit="return validateForm()">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="horizontal-heading text-center">
                                    <h2>Login</h2>
                                    <p>Enter your email address and password to login</p>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group text-left">
                                    <label for="Email_Address">Email</label>
                                    <input type="email" name="Email_Address" class="form-control" placeholder="Enter your email address" required>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group text-left">
                                    <label for="Password">Password</label>
                                    <a href="Forgot_Password.php" class="text-right">Forgot Password?</a>
                                    <input type="password" style="border-color:<?php if(isset($count)){ echo " #ff0000"; }else{ echo "#6255a5";} ?>;" name="Password" class="form-control" placeholder="Enter your password" id="password-field" required>
                                    <div class="input-group-append">
                                        <span toggle="#password-field" class="eye field-icon toggle-password"><img src="images/pre-login/eye.png" alt="eye"></span>
                                    </div>
                                    
                                    <span id="login-msg" style="display:<?php if(isset($count)){ echo "block"; }else{ echo "none";} ?>;">The password that you've entered is incorrect.</span>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group form-check text-left">
                                    <input type="checkbox" class="form-check-input" id="Checkbox">
                                    <label class="form-check-label" for="CheckBox">Remember Me</label>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 btn-general-one">
                                <button type="submit" name="Login" class="btn btn-info btn-rich-blue">Login</button>
                                <p>Don't have an account? <a href="Sign_Up.php">Sign Up</a></p>
                            </div>
                        </form>
                        
                        
                        
                    </div>
                </div>
            </div>
        </section>
    </section>
    
    
    
    <!-- JQuery-->
    <script src="js/jquery-min.js"></script>

    <!--Bootstrap JS-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--Custom JS-->
    <script src="js/Script.js"></script>


</body>

</html>