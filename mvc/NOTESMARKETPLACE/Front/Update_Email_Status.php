<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>
<?php
    
        if(isset($_GET['Email'])){
            $EmailID = $_GET['Email'];
            
            $query = "UPDATE users SET IsEmailVerified=1 WHERE EmailID='{$EmailID}'";
            $Users_update = mysqli_query($connection,$query);  
            if(!$Users_update){
                header("Location: Sign_Up.php");
                die("Query Failed" . mysqli_error($connection)); 
            }else{
                header("Location: Login.php");
            }
        }


?>