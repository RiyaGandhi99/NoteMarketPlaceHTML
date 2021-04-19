<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>
<?php
        if(isset($_GET['Delete'])){
            $ID = $_GET['Delete'];
            $NoteID = $_GET['Note'];
            
            $query = "DELETE FROM sellernotesreviews WHERE ID=$ID";
            $Delete_all = mysqli_query($connection,$query);
            if(!$Delete_all){
                die("Query Failed" . mysqli_error($connection));
            }
            
            header('Location: Notes_Details.php?Note='.$NoteID);
            
        }   
?>
    