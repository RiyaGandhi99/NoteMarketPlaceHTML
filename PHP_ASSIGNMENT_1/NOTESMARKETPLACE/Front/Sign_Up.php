<!-- Header -->
<?php ob_start(); ?>
<?php include "Header.php"; ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>

<script>

    function validateForm() {
        var First_Name = document.forms["Sign_UP_Form"]["First_Name"].value;
        if (First_Name == "") {
            alert("First Name must be filled out");
            return false;
        }
        var Last_Name = document.forms["Sign_UP_Form"]["Last_Name"].value;
        if (Last_Name == "") {
            alert("Last Name must be filled out");
            return false;
        }
        var Email_Address = document.forms["Sign_UP_Form"]["Email_Address"].value;
        if (Email_Address == "") {
            alert("Email Address must be filled out");
            return false;
        }
        var Password = document.forms["Sign_UP_Form"]["Password"].value;
        if (Password == "") {
            alert("Password must be filled out");
            return false;
        }
        var Confirm_Password = document.forms["Sign_UP_Form"]["Confirm_Password"].value;
        if (Confirm_Password == "") {
            alert("Confirm Password must be filled out");
            return false;
        }
        
    }

</script>
   <section id="sign-body">
       <section id="sign">
           <div class="content-box-sign">
               <div class="container">
                   <div class="row justify-content-center" id="sign-details">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                           <img src="images/pre-login/top-logo.png" alt="logo" class="img-resposive" class="logo">
                       </div>

                        
                        <?php
                            
                            if(isset($_POST['Sign_Up'])){
                                $FirstName = $_POST['First_Name'];
                                $LastName = $_POST['Last_Name'];
                                $EmailID = $_POST['Email_Address'];
                                $Password = $_POST['Password'];
                                $Confirm_Password = $_POST['Confirm_Password'];
                                
                                $query = "SELECT * FROM userroles WHERE Name='Member'";
                                $User_Roles_select = mysqli_query($connection,$query);
                                    if($row = mysqli_fetch_assoc($User_Roles_select)){
                                        $RoleID = $row['ID'];
                                    }else {
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
                                
                                if(!mysqli_num_rows($Users_select)==0){
                                        ?>
                                        
                                            <script type="text/javascript">
                                                alert("User already exist!Please Enter Different EmailId to continue signup.");
                                            </script>
                                            
                                        <?php
                                } else {
                                    if($Password==$Confirm_Password){

                                    $query = "INSERT INTO users(RoleID,FirstName,LastName,EmailID,Password) VALUES ('{$RoleID}','{$FirstName}','{$LastName}','{$EmailID}','{$Password}')";
                                    $User_Details = mysqli_query($connection,$query);
                                        
                                    if(!$User_Details){
                                        die("Query Failed" . mysqli_error($connection));
                                    } else {
                                        $Count=1;
                                        
                                        
                                        $to = $EmailID;

                                        $header = "MIME_Version:1.0" . "\r\n";
                                        $header .= "Content-type: text/html; charset=iso-8859-1"."\r\n";
                                        $header .= 'From: gogoproject2020@gmail.com';

                                        $subject = "Note Marketplace - Email Verification";

                                        $comments = "Hello <br>
                                        <h4>".$FirstName." ".$LastName.",</h4> <br>";
                                        $comments .= "<p>Thank you for signing up with us. Please click on below link to verify your email address and to do login.</p><br><br><br>";
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
                                      }
                                    } else {
                                        $Number=1;
                                    } 
                                }
                            }
                            
                        ?>
                            
                          
                        <form action="" name="Sign_UP_Form" method="post" onsubmit="return validateForm()">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                               <div class="horizontal-heading text-center">
                                   <h2>Create an Account</h2>
                                   <p>Enter your details to signup</p>
                                   <span id='sign-msg' style="display:<?php if(isset($Count)){echo 'block';}else{echo 'none'; } ?>;">&#9989; Your account has been successfully created.</span>
                                   <span id='sign-msg' style="display:<?php if(isset($Number)){echo 'block';}else{echo 'none'; } ?>;">Password & Confirm Password should be same.</span>
                               </div>
                           </div>

                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                               <div class="form-group text-left">
                                   <label for="First_Name">First Name<span> *</span></label>
                                   <input type="text" name="First_Name" class="form-control" placeholder="Enter your first name" required pattern="[a-zA-Z]{3,15}">
                               </div>
                           </div>

                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                               <div class="form-group text-left">
                                   <label for="Last_Name">Last Name<span> *</span></label>
                                   <input type="text" name="Last_Name" class="form-control" placeholder="Enter your last name" required pattern="[a-zA-Z]{4,15}">
                               </div>
                           </div>

                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                               <div class="form-group text-left">
                                   <label for="Email_Address">Email<span> *</span></label>
                                   <input type="email" name="Email_Address" class="form-control" placeholder="Enter your email address" required>
                               </div>
                           </div>

                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                               <div class="form-group text-left">
                                   <label for="Password">Password</label>
                                   <input type="password" name="Password" class="form-control" placeholder="Enter your password" id="password-field4" required pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[@$!#^%*?&])[A-Za-z\d@$!#^%*?&]{8,24}$">
                                   <span toggle="#password-field4" class="eye field-icon"><img src="images/pre-login/eye.png" alt="eye"></span>
                               </div>
                           </div>

                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                               <div class="form-group text-left">
                                   <label for="Confirm_Password"> Confirm Password</label>
                                   <input type="password" name="Confirm_Password" class="form-control" placeholder="Re-enter your password" id="password-field5" required pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[@$!#^%*?&])[A-Za-z\d@$!#^%*?&]{8,24}$">
                                   <span toggle="#password-field5" class="eye field-icon"><img src="images/pre-login/eye.png" alt="eye"></span>
                               </div>
                           </div>

                           <div class="col-lg-12 col-md-12 col-sm-12 btn-general-one">
                               <button type="submit" name="Sign_Up" class="btn btn-info btn-rich-blue">Sign Up</button>
                               <p>Already have an account? <a href="Login.php">Login</a></p>
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