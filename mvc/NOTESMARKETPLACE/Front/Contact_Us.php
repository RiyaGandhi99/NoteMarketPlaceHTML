<!-- Header -->
<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>

    <?php   
        
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
            include "Registered_Header.php"; 
        }else{
            include "Unregistered_Header.php";
        }
        
    ?>
    
    
    <script>

    function validateForm() {
        var firstname = document.forms["Contact_Us_Form"]["firstname"].value;
        if (firstname == "") {
            alert("First Name must be filled out");
            return false;
        }
        var subject = document.forms["Contact_Us_Form"]["subject"].value;
        if (subject == "") {
            alert("Subject must be filled out");
            return false;
        }
        var EmailID = document.forms["Contact_Us_Form"]["EmailID"].value;
        if (EmailID == "") {
            alert("Email Address must be filled out");
            return false;
        }
        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(EmailID))
        {
            return true;
        }else{
            alert("You have entered an invalid email address!")
            return false;
        }
        var Description = document.forms["Contact_Us_Form"]["Description"].value;
        if (Description == "") {
            alert("Description must be filled out");
            return false;
        }
    }

    </script>

    
    <!-- Contact Us -->
    <section id="bg-image-contact-us" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 id="title">Contact Us</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section id="contact-us">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div id="heading">
                        <h2>Get in Touch</h2>
                        <p>Let us know how to get you</p>
                    </div>
                </div>
                
                <?php
                
                    if(isset($_POST['Contact_Us'])){
                        
                        
                        $firstname = $_POST['firstname'];
                        
                        $query = "SELECT * FROM system_configuration WHERE ID=3";
                        $config_select = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($config_select)){
                            $Default_EmailID = $row['Value'];
                        }
                        
                        $to = $Default_EmailID;
                        
                        $header = "MIME_Version:1.0" . "\r\n";
                        $header .= "Content-type: text/html; charset=iso-8859-1"."\r\n";
                        $header .= 'From: ' . $_POST['EmailID'];
                        
                        $subject = $_POST['subject']. " ";
                        $subject .= $firstname . "- Query";
                        
                        $comments = "Hello, <br><br> " . $_POST['Description'];
                        $comments .= "<br><br>Regards, <br>" . $firstname;
                        
                        if(mail($to,$subject,$comments,$header)){
                            echo "<h2>Email Sended Successfully..!!</h2>";
                        }else{
                            echo "Email Failed";
                        }
                        
                    }
                    
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                            $EmailID=  $_SESSION['EmailID'];
                            $query = "SELECT * FROM users WHERE EmailID='$EmailID'";
                             
                            $Users_select = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($Users_select)){
                                $EmailID_New = $row['EmailID'];
                                $FirstName = $row['FirstName'];
                            }
                        }
                        else {
                                
                        }    
                ?>
                
                <form action="" name="Contact_Us_Form" method="post" onsubmit="return validateForm()">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div id="contact-form">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="firstname" id="fname">Firstname*</label>
                                                <input type="text" value="<?php if(isset($_SESSION['EmailID'])){ echo $FirstName; }else{ echo ""; }?>" name="firstname" class="form-control" id="firstname" placeholder="Enter your first name" <?php if(isset($_SESSION['EmailID'])){ echo "readonly"; }else{ echo "required"; } ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="EmailID" id="email">Email*</label>
                                                <input type="email" value="<?php if(isset($_SESSION['EmailID'])){ echo $EmailID_New; }else{ echo ""; }?>" name="EmailID" class="form-control" id="EmailID" placeholder="Enter your email address" <?php if(isset($_SESSION['EmailID'])){ echo "readonly"; }else{ echo "required"; } ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="subject" id="sub">Subject*</label>
                                                <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter your subject" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="Description" id="comments">Comments/Questions*</label>
                                        <textarea name="Description" class="form-control" id="Description" rows="3" placeholder="Enter your Comments" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" name="Contact_Us" class="btn btn-Blue">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    </div>
    <!-- Contact Us ENDS -->        
    
<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->