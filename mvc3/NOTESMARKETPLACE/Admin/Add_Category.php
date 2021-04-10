<!-- Header -->
<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>    
    
<script>
    
    function validateForm() {
        var Category_Name = document.forms["Add_Category_Form"]["Category_Name"].value;
        if (Category_Name == "") {
            alert("Category Name must be filled out");
            return false;
        }
        var Description = document.forms["Add_Category_Form"]["Description"].value;
        if (Description == "") {
            alert("Description must be filled out");
            return false;
        }
    }
    
</script>      
    
    <?php   
        
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
            include "Header.php"; 
        }else{
            header("Location: ../Login.php");
        }
        
    ?>
    
    <!-- Add Category -->
    <section id="category">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-12 text-left">

                        <div class="horizontal-heading">
                            <h2>Add Category</h2>
                        </div>

                    </div>

                </div>

                <?php
                
                
                    if(isset($_GET['edit'])){
                        $ID = $_GET['edit'];
                        
                        $query = "SELECT * FROM  categories WHERE ID=$ID";
                        $Admin_category_Select = mysqli_query($connection,$query);    
                        if(!$Admin_category_Select){
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        if($row = mysqli_fetch_assoc($Admin_category_Select)){
                            $CategoryOld = $row['Name'];
                            $DescriptionOld = $row['Description'];
                        }
                    }
                        
                        
                        if(isset($_POST['CategorySubmit'])){
                        
                            $Category_Name = $_POST['Category_Name'];
                            $Description = $_POST['Description'];
                            
                            
                            $query = "SELECT * FROM  categories WHERE ID=$ID";
                            $Admin_category_Select = mysqli_query($connection,$query);    
                            if(!$Admin_category_Select){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                            $CategoryCount = mysqli_num_rows($Admin_category_Select);
                            
                            
                            if($CategoryCount==0){
                                
                                $query = "INSERT INTO categories(Name,Description) VALUES
                                ('{$Category_Name}','{$Description}')";
                                $Category_Details = mysqli_query($connection,$query);
                                
                                if(!$Category_Details){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                                
                            }else{
                                
                                $query = "UPDATE categories SET
                                Name='{$Category_Name}',Description='{$Description}' WHERE
                                ID=$ID";
                                $Admin_Category_Update = mysqli_query($connection,$query);
                                    
                                if(!$Admin_Category_Update){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                                
                            }
                            
                            
                        }
                    
                    
                ?>
                  
                  
                  
               
                <form action="" method="post" name="Add_Category_Form" onsubmit="return validateForm()">
                <!-- Category row  -->
                <div class="row">

                    <div class="col-md-6 col-sm-12 col-12">

                        <div class="row category-row">
                            <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group text-left">
                                        <label for="Category_Name">Category Name<span> *</span></label>
                                        <input type="text" name="Category_Name" style="width:100%;border:1px solid #d1d1d1" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $CategoryOld; }else{ echo ""; } ?>" placeholder="Enter your category name" required>
                                    </div>
                            </div>
                        </div>
                        <div class="row category-row">
                            <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group text-left">
                                        <label for="Description">Description<span> *</span></label>
                                        <textarea id="category-description" name="Description" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $DescriptionOld; }else{ echo ""; } ?>" placeholder="Enter your description" required></textarea>
                                    </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Category Button -->
                <div class="row category-row">

                    <div class="col-md-12 col-sm-12 col-12">
                            <button type="submit" name="CategorySubmit" class="btn btn-info btn-rich-blue">Submit</button>
                    </div>

                </div>

            </form>


            </div>
        </div>

    </section>
    <!-- Add Category ENDS -->

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->    