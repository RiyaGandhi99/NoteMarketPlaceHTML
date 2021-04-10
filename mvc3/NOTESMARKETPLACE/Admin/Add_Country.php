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
        var Country_Name = document.forms["Add_Country_Form"]["Country_Name"].value;
        if (Country_Name == "") {
            alert("Country Name must be filled out");
            return false;
        }
        var Country_Code = document.forms["Add_Country_Form"]["Country_Code"].value;
        if (Country_Code == "") {
            alert("Country Code must be filled out");
            return false;
        }
    }
    
</script>   
    
    <!-- Add Country -->
    <section id="country">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-12 text-left">

                        <div class="horizontal-heading">
                            <h2>Add Country</h2>
                        </div>

                    </div>

                </div>

                <?php
                
                
                    if(isset($_GET['edit'])){
                        $ID = $_GET['edit'];
                        
                        $query = "SELECT * FROM  countries WHERE ID=$ID";
                        $Admin_country_Select = mysqli_query($connection,$query);    
                        if(!$Admin_country_Select){
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        if($row = mysqli_fetch_assoc($Admin_country_Select)){
                            $CountryOld = $row['Name'];
                            $PhonecodeOld = $row['Phonecode'];
                        }
                        
                    }
                        
                    
                    if(isset($_POST['CountrySubmit'])){
                        
                            $Country_Name = $_POST['Country_Name'];
                            $Country_Code = $_POST['Country_Code'];
                            
                            
                            $query = "SELECT * FROM  countries WHERE ID=$ID";
                            $Admin_country_Select = mysqli_query($connection,$query);    
                            if(!$Admin_country_Select){
                                die("Query Failed" . mysqli_error($connection));
                            }
                            
                            $CountryCount = mysqli_num_rows($Admin_country_Select);
                            
                            
                            if($CountryCount==0){
                                
                                $query = "INSERT INTO countries(Name,CountryCode) VALUES
                                ('{$Country_Name}','{$Country_Code}')";
                                $Country_Details = mysqli_query($connection,$query);
                                
                                if(!$Country_Details){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                            }else{
                                
                                $query = "UPDATE countries SET
                                Name='{$Country_Name}',Phonecode='{$Country_Code}' WHERE
                                ID=$ID";
                                $Admin_Country_Update = mysqli_query($connection,$query);
                                    
                                if(!$Admin_Country_Update){
                                    die("Query Failed" . mysqli_error($connection));
                                }
                            }
                    }
                       
                ?>
               
               
                
                <form action="" method="post" name="Add_Country_Form" onsubmit="return validateForm()">
                    <!-- country row  -->
                    <div class="row">

                        <div class="col-md-6 col-sm-12 col-12">

                            <div class="row country-row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group text-left">
                                        <label for="Country_Name">Country Name<span> *</span></label>
                                        <input type="text" style="width:100%;border:1px solid #d1d1d1" name="Country_Name" class="form-control" value="<?php if(isset($_GET['edit'])){ echo $CountryOld; }else{ echo ""; } ?>" placeholder="Enter your country name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row country-row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group text-left">
                                        <label for="Country_Code">Country Code<span> *</span></label>
                                        <input type="text" style="width:100%;border:1px solid #d1d1d1" value="<?php if(isset($_GET['edit'])){ echo $PhonecodeOld; }else{ echo ""; } ?>" name="Country_Code" class="form-control" placeholder="Enter country code" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Country Button -->
                    <div class="row country-row">

                        <div class="col-md-12 col-sm-12 col-12">
                            <button type="submit" name="CountrySubmit" class="btn btn-info btn-rich-blue">Submit</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </section>
    <!-- Add Country ENDS -->

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->        