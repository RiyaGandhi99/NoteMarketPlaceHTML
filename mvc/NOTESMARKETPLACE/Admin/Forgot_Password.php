<!-- Header -->
<?php ob_start(); ?>
<?php include "Header.php"; ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>

<script>

    function validateForm() {
        var Email_Address = document.forms["Forgot_Password_Form"]["Email_Address"].value;
        if (Email_Address == "") {
            alert("Email Address must be filled out");
            return false;
        }
        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(Email_Address))
        {
            return true;
        }else{
            alert("You have entered an invalid email address!")
            return false;
        }
    }

</script>


  
    <section id="forgot">
        <div class="content-box-lg"> 
            <div class="container">
                <div class="row justify-content-center" id="forgot-details">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <img src="images/pre-login/top-logo.png" alt="logo" class="img-resposive" class="logo">
                    </div>
                    
                    
                    <?php
                     
                        if(isset($_POST['Forgot_password'])){
                            $EmailID = $_POST['Email_Address'];
                            
                            $query = "SELECT * FROM users WHERE EmailID='$EmailID'";
                                $Users_select = mysqli_query($connection,$query);  
                                while($row = mysqli_fetch_assoc($Users_select)){
                                        $EmailID_New = $row['EmailID'];
                                        $Name = $row['FirstName'];
                                        $Password_New = $Name ."$". rand(1000,10000);
                                        
                                        if($EmailID==$EmailID_New){
                                            
                                            $to = $EmailID_New;
                                            
                                            $header = "MIME_Version:1.0" . "\r\n";
                                            $header .= "Content-type: text/html; charset=iso-8859-1"."\r\n";
                                            $header .= 'From: gogoproject2020@gmail.com';
                                            
                                            $subject = "New Temporary Password has been created for you";
                                            $comments = "Hello, <br> We have generated a new password for you <br> Password: " . $Password_New . "<br>" . "Regards, ". "<br>" . "Notes Marketplace";
                                            
                                            if(mail($to,$subject,$comments,$header)){
                                            echo "<h3 style='color:pink;'class='text-center'>“Your password has been changed successfully and newly generated password is sent on your registered email address.</h3>”";
                                                
                                                $query = "UPDATE users SET Password='$Password_New' WHERE EmailID='$EmailID'";
                                                $Users_Update = mysqli_query($connection,$query);
                                                if(!$Users_Update){
                                                    die("Query Failed" . mysqli_error($connection));
                                                }
                                                //header("Location: Login.php");
                                            }else{
                                            echo "Email Failed";
                                            }
                                               
                                        }else {
                                            echo"<span id='login-msg' class='text-center'>The Email that you've entered is incorrect.</span>";
                                        }
                                    }
                                
                            
                        }
                        
                        
                    ?>
                    
                    <form action="" name="Forgot_Password_Form" method="post" onsubmit="return validateForm()">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="horizontal-heading text-center">
                                <h2>Forgot Password?</h2>
                                <p>Enter your Email to reset password</p>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group text-left"> 
                                    <label for="Email_Address">Email</label>
                                    <input type="email" name="Email_Address" class="form-control" placeholder="Enter your email address" required>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" name="Forgot_password" class="btn btn-info btn-rich-blue">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- JQuery-->
    <script src="js/jquery-min.js"></script>

    <!--Bootstrap JS-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--Custom JS-->
    <script src="js/Script.js"></script>


</body>

</html>