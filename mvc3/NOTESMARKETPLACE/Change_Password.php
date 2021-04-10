<!-- Header -->
<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Front/Config/Database-Connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!--Important meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">

    <!--Title-->
    <title>NOTES MARKETPLACE</title>

    <!--Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="Front/images/Homepage/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Front/css/bootstrap/bootstrap.min.css">
    
    <!-- datatable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="Front/css/style.css">
    
    <!--Responsive CSS -->
    <link rel="stylesheet" href="Front/css/responsive.css">

</head>

<body>

  
  
<script>

    function validateForm() {
        var Old_Password = document.forms["Change_Password_Form"]["Old_Password"].value;
        if (Old_Password == "") {
            alert("Old Password must be filled out");
            return false;
        }
        var New_Password = document.forms["Change_Password_Form"]["New_Password"].value;
        if (New_Password == "") {
            alert("New Password must be filled out");
            return false;
        }
        var Confirm_Password = document.forms["Change_Password_Form"]["Confirm_Password"].value;
        if (Confirm_Password == "") {
            alert("Confirm Password must be filled out");
            return false;
        }
        
    }

</script>
    
    
  
    <section id="change">
        <div class="content-box-change">
            <div class="container">
                <div class="row justify-content-center" id="change-details">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <img src="Front/images/pre-login/top-logo.png" alt="logo" class="img-resposive" class="logo"> 
                    </div>
                    
                    <?php
                        
                        session_start();
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                            $EmailID=  $_SESSION['EmailID'];
                            $query = "SELECT * FROM users WHERE EmailID='$EmailID'";
                             
                            $Users_select = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($Users_select)){
                                $OldPassword = $row['Password'];
                            }
                        }
                        else {
                                
                        }
                        
                        if(isset($_POST['Change_Password'])){
                            $Old_Password = $_POST['Old_Password'];
                            $New_Password = $_POST['New_Password'];
                            $Confirm_Password = $_POST['Confirm_Password'];
                            
                                $query = "SELECT * FROM users WHERE Password='{$Old_Password}'";
                                $Password_Check_Select = mysqli_query($connection,$query);
                                if($row = mysqli_fetch_assoc($Password_Check_Select)){
                                    $OldPassword = $row['Password'];
                                }
                            
                            if($Old_Password == $OldPassword){
                                
                                if($New_Password == $Confirm_Password){
                                    
                                    
                                    $query = "UPDATE users SET Password='{$New_Password}' WHERE Password='{$Old_Password}'";
                                    $Password_Check_Select = mysqli_query($connection,$query);
                                    if(!$Password_Check_Select){
                                        die("Query failed". mysqli_error($connection));
                                    }else {
                                        ?>
                                        
                                        <script>
                                            alert('Password has been changed successfully.');
                                        </script>
                                        
                                        <?php
                                        header("Location: Login.php");
                                         
                                        
                                        
                                    }
                                    
                                }
                                
                            }
                            
                        }
                        
                    ?>
                    
                    <form action="" method="post" name="Change_Password_Form" onsubmit="return validateForm()">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="horizontal-heading text-center">
                                <h2>Change Password</h2>
                                <p>Enter your new password to change your password</p>
                            </div>
                        </div>
                           
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group text-left">
                                <label for="Old_Password"> Old Password</label>
                                <input type="password" name="Old_Password" value="<?php if(isset($_SESSION['loggedin'])){ echo $OldPassword; }else{ echo ""; } ?>" class="form-control" placeholder="Enter your old password" id="password-field1" <?php if(isset($_SESSION['loggedin'])){ echo "readonly"; }else{ echo "required"; } ?>>
                                <div class="input-group-append">
                                     <span toggle="#password-field1" class="P1 eye field-icon toggle-password"><img src="Front/images/pre-login/eye.png" alt="eye"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group text-left">
                                <label for="New_Password">New Password</label>
                                <input type="password" name="New_Password" class="form-control" placeholder="Enter your new password" id="password-field2" required pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[@$!#^%*?&])[A-Za-z\d@$!#^%*?&]{8,24}$">
                                <div class="input-group-append">
                                     <span toggle="#password-field2" class="P1 eye field-icon toggle-password"><img src="Front/images/pre-login/eye.png" alt="eye"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group text-left">
                                <label for="Confirm_Password"> Confirm Password</label>
                                <input type="password" name="Confirm_Password" class="form-control" placeholder="Enter your confirm password" id="password-field3" required pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[@$!#^%*?&])[A-Za-z\d@$!#^%*?&]{8,24}$">
                                <div class="input-group-append3">
                                     <span toggle="#password-field3" class="P1P1 eye field-icon toggle-password"><img src="Front/images/pre-login/eye.png" alt="eye"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" name="Change_Password" class="btn btn-info btn-rich-blue">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- JQuery-->
    <script src="Front/js/jquery-min.js"></script>

    <!--Bootstrap JS-->
    <script src="Front/js/bootstrap/bootstrap.min.js"></script>

    <!--Custom JS-->
    <script src="Front/js/Script.js"></script>


</body>

</html>