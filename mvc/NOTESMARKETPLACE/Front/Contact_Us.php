<!-- Header -->
<?php ob_start(); ?>
<?php include "Header.php"; ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>


<!-- Header ENDS -->
   
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
                            <a class="nav-link" href="FAQ.html">FAQ</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="Contact_Us.html"><span>Contact</span><span class="space">Us</span></a>
                        </li>
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0">
                                <a href="Login.php"><button class="btn btn-outline-success my-2 my-sm-0 btn-Blue" type="button">Login</button></a>
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header ENDS -->
    
    
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
                        
                        $to = "gandhiriya99@gmail.com";
                        
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
                    
                        session_start();
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
                                                <input type="text" value="<?php if(isset($_SESSION['EmailID'])){ echo $FirstName; }else{ echo ""; }?>" name="firstname" class="form-control" id="firstname" placeholder="Enter your first name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="EmailID" id="email">Email*</label>
                                                <input type="email" value="<?php if(isset($_SESSION['EmailID'])){ echo $EmailID_New; }else{ echo ""; }?>" name="EmailID" class="form-control" id="EmailID" placeholder="Enter your email address" required>
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