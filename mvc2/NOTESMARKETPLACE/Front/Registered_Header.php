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

<body>
   
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
                            <a class="nav-link" href="Search_Notes.php"><span>Search</span><span class="space">Notes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Dashboard.php">Sell<span>Your</span><span class="space">Notes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Buyer_Requests.php"><span>Buyer</span><span class="space">Requests</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FAQ.php">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contact_Us.php"><span>Contact</span><span class="space">Us</span></a>
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
                                
                            ?>
                            
                            <img src="<?php echo "../Uploads/Members/$ID/Profile_Photo/$IMG"; ?>" alt="User-Photo" class="rounded-circle img-responsive">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../Admin/My_Profile.php">My Profile</a>
                                <a class="dropdown-item" href="My_Downloads.php">My Downloads</a>
                                <a class="dropdown-item" href="My_Sold_Notes.php">My Sold Notes</a>
                                <a class="dropdown-item" href="My_Rejected_Notes.php">My Rejected Notes</a>
                                <a class="dropdown-item" href="Change_Password.php">Change Password</a>
                                <a class="dropdown-item" onclick="return Logout()" href="Login.php">LOGOUT</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" action="" method="post">
                                <button class="btn btn-outline-success my-2 my-sm-0 btn-Blue" name="Logout" type="submit" onsubmit="return Logout()">Logout</button>
                            </form>
                        </li>
                        
                            
                        <?php
                        
                            if(isset($_POST['Logout'])){
                                session_start(); //to ensure you are using same session
                                session_destroy(); //destroy the session
                                header("Location: Login.php"); 
                                exit();
                            }
                        
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header ENDS -->
    
<script>
        
        function Logout(){
            if(confirm("Are you sure, you want to logout?")){
                return true;
            }else{
                return false;
            }
        }
        
</script>