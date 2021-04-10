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
    <link rel="shortcut icon" href="images/Homepage/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    
    <!-- datatable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!--Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<script>
        
        function LogoutAdmin(){
            if(confirm("Are you sure, you want to logout?")){
                return true;
            }else{
                return false;
            }
        }
        
</script>

<body>
    
    
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light white-nav-top fixed-top">
            <div class="container">
                <a id="user-header" class="navbar-brand" href="Dashboard.php">
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
                            <a class="nav-link" href="Dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropbtn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Notes
                            </a>
                            <div class="dropdown-menu" style="left:0;" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="Notes_Under_Review.php">Notes Under Review</a>
                                <a class="dropdown-item" href="Published_Notes.php">Published Notes</a>
                                <a class="dropdown-item" href="Downloaded_Notes.php">Downloaded Notes</a>
                                <a class="dropdown-item" href="Rejected_Notes.php">Rejected Notes</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Members.php">Members</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Spam_Reports.php">Reports</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropbtn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Settings
                            </a>
                            <div class="dropdown-menu" style="left:0;" aria-labelledby="navbarDropdown">
                                
                                <?php
                                
                                ob_start();
                                
                                $EmailID = $_SESSION['EmailID'];
                                $query = "SELECT * FROM users WHERE EmailID='{$EmailID}' AND
                                RoleID=3";
                                $Super_Admin_Select = mysqli_query($connection,$query);
                                if(!$Super_Admin_Select){
                                die("Query Failed" . mysqli_error($connection));
                                }
                                
                                
                                ?>
                                <a class="dropdown-item" style="<?php if(mysqli_num_rows($Super_Admin_Select)==0){ echo "display:none"; }else{ echo ""; } ;?>"href="Manage_System_Configuration.php">Manage System Configuration</a>
                                
                                <a class="dropdown-item" style="<?php if(mysqli_num_rows($Super_Admin_Select)==0){ echo "display:none"; }else{ echo ""; } ;?>" href="Manage_Administrator.php">Manage Administrator</a>
                                
                                
                                <a class="dropdown-item" href="Manage_Category.php">Manage Category</a>
                                <a class="dropdown-item" href="Manage_Type.php">Manage Type</a>
                                <a class="dropdown-item" href="Manage_Country.php">Manage Countries</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle user-img dropbtn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            
                            <?php
                                ob_start(); 
                                
                                    $EmailID = $_SESSION['EmailID'];
                                    	
                                    $query = "SELECT * FROM users WHERE EmailID='{$EmailID}'";
                                    $Users_select = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($Users_select)){
                                        $ID = $row['ID'];
                                    }
                                    
                                    $query = "SELECT * FROM userprofile WHERE UserID=$ID";
                                    $Users_select = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($Users_select)){
                                        $IMG = $row['Profile Picture'];
                                    }
                                    
                                    
                                    $query = "SELECT * FROM system_configuration WHERE ID=8";
                                    $Default_select = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($Default_select)){
                                        $Default_IMG = $row['Value'];
                                    }
                            ?>
                            
                            <img src="<?php if(mysqli_num_rows($Users_select)!=0 && $IMG!=""){ echo "../Uploads/Admin/$ID/Profile_Photo/$IMG"; }else{ echo "../Uploads/Default_Images/$Default_IMG"; }?>" alt="User-Photo" class="rounded-circle img-responsive"></a>
                            <div class="dropdown-menu" style="left:0;" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="My_Profile.php">Update Profile</a>
                                <a class="dropdown-item" href="../Change_Password.php">Change Password</a>
                                <a class="dropdown-item" onclick="return LogoutAdmin()" href="../Login.php">LOGOUT</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" action="" method="post">
                                <button class="btn btn-outline-success my-2 my-sm-0 btn-Blue" name="Logout" type="submit" onclick="return LogoutAdmin()">Logout</button>
                            </form>
                        </li>
                        <?php
                        
                            if(isset($_POST['Logout'])){
                                session_start(); //to ensure you are using same session
                                session_destroy(); //destroy the session
                                header("Location: ../Login.php"); 
                                exit();
                            }
                        
                        ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header ENDS -->


