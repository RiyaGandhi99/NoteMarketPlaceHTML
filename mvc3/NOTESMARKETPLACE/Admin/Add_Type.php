<!-- Header -->
<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>   

 
    <?php   
        
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
            include "Header.php"; 
        }else{
            header("Location: ../Login.php");
        }
        
    ?>
    
<script>
    
    function validateForm() {
        var Type = document.forms["Add_Type_Form"]["Type"].value;
        if (Type == "") {
            alert("Type must be filled out");
            return false;
        }
    }
    
</script>   
   
    
    <!-- Add Type -->
    <section id="type">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-12 text-left">

                        <div class="horizontal-heading">
                            <h2>Add Type</h2>
                        </div>

                    </div>

                </div>
                
                
                <?php
                    
                    
                    if(isset($_GET['edit'])){
                        $ID = $_GET['edit'];
                        
                        $query = "SELECT * FROM  types WHERE ID=$ID";
                        $Admin_type_Select = mysqli_query($connection,$query);    
                        if(!$Admin_type_Select){
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        if($row = mysqli_fetch_assoc($Admin_type_Select)){
                            $TypeOld = $row['Name'];
                            $DescriptionOld = $row['Description'];
                        }
                        
                    }
                        if(isset($_POST['TypeSubmit'])){
                        
                            $Type = $_POST['Type'];
                            $Description = $_POST['Description'];
                            
                            
                            $query = "SELECT * FROM  types WHERE ID=$ID";
                            $Admin_type_Select = mysqli_query($connection,$query);    
                            if(!$Admin_type_Select){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                            $typeCount = mysqli_num_rows($Admin_type_Select);
                            
                            if($typeCount==0){
                                
                                $query = "INSERT INTO types(Name,Description) VALUES ('{$Type}','{$Description}')";
                                $Types_Details = mysqli_query($connection,$query);
                                
                                if(!$Types_Details){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                            }else{
                                
                                $query = "UPDATE types SET
                                Name='{$Type}',Description='{$Description}' WHERE
                                ID=$ID";
                                $Admin_type_Update = mysqli_query($connection,$query);
                                    
                                if(!$Admin_type_Update){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                            }
                        }
                    
                    
                ?>

                <!-- Category row  -->
            <form action="" method="post" onsubmit="return validateForm()" name="Add_Type_Form">
                <div class="row">

                    <div class="col-md-6 col-sm-12 col-12">

                        <div class="row type-row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-group text-left">
                                    <label for="Type">Type<span> *</span></label>
                                    <input type="text" style="width:100%;border:1px solid #d1d1d1" value="<?php if(isset($_GET['edit'])){ echo $TypeOld; }else{ echo ""; } ?>"  name="Type" class="form-control" placeholder="Enter your Type name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row type-row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="form-group text-left">
                                    <label for="Description">Description<span> *</span></label>
                                    <textarea id="type-description" value="<?php if(isset($_GET['edit'])){ echo $DescriptionOld; }else{ echo ""; } ?>" name="Description" class="form-control" placeholder="Enter your description"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Category Button -->
                <div class="row type-row">

                    <div class="col-md-12 col-sm-12 col-12">
                        <button type="submit" name="TypeSubmit" class="btn btn-info btn-rich-blue">Submit</button>
                    </div>

                </div>
            </form>

            </div>
        </div>

    </section>
    <!-- Add Type ENDS -->

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->    