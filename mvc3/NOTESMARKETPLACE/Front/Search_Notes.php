<!-- Header -->
<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){
        
        
        $('#books').load('SearchNotesFilter.php');
        
        $('select').on('change',function(){
        var Select_Item = $(this).val();
        var type = $("#type").val();
        var category = $("#category").val();
        var university = $("#university").val();
        var course = $("#course").val();
        var country = $("#country").val();
        var rating = $("#rating").val();
            
         
            $.ajax({
                url:"SearchNotesFilter.php",
                type:"POST",
                data:{
                    Type:type,
                    Category:category,
                    University:university,
                    Course:course,
                    Country:country,
                    Rating:rating,
                    select:Select_Item
                },
                success:function(d){
                    $('#books').html(d);
                }
            });
        });
        
        $('#search').on('keyup',function(){
        var Search_Item = $(this).val();
          
            $.ajax({
                url:"SearchNotesFilter.php",
                type:"POST",
                data:{search: Search_Item},
                success:function(d){
                    $('#books').html(d);
                }
            });
        });
        
        $(document).on('click','.pagination .page-item a',function(e){
        e.preventDefault();
        var Page = $(this).text();
            
        var type = $("#type").val();
        var category = $("#category").val();
        var university = $("#university").val();
        var course = $("#course").val();
        var country = $("#country").val();
        var rating = $("#rating").val();
            
            $.ajax({
                url:"SearchNotesFilter.php",
                type:"POST",
                data:{
                    "Page":Page,
                    Type:type,
                    Category:category,
                    University:university,
                    Course:course,
                    Country:country,
                    Rating:rating
                },
                success:function(d){
                    $('#books').html(d);
                }
            });
            
        });
       
    });
        
        
</script>   
   
    <?php   
        
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
            include "Registered_Header.php"; 
        }else{
            include "Unregistered_Header.php";
        }
        
    ?>
        
    
    <!-- Search Notes -->
    <section id="bg-image-search-notes" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 id="title">Search Notes</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section id="search-notes">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="heading">
                        <h2>Search and Filter notes</h2>
                    </div>
                </div>
            </div>
            <div id="search-boxes">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="search-box">
                            <div class="form-group">

                                <input type="text" class="form-control" name="Search" id="search" placeholder="Search Notes here...">
                                <span class="shift-left"><img src="images/Dashboard/search.jpg"></span>

                            </div>
                        </div>
                    </div>

                </div>

                <div id="drop-downs">
                    <div class="row">
                        <div class="col-md-2 col-sm-6 col-6">
                            <div class="form-group">


                                <select id="type" class="form-control custom-select">
                                    <option selected>Select type</option>
                                    
                                    <?php
    
                                        //Type Details 
                                        $query = "SELECT * FROM types";
                                        $Type_select = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($Type_select)){
                                            $TypeName = $row['Name'];
                                            echo "<option value='". $TypeName . "'>" . $TypeName ."</option>";
                                        }
                                    
                                    ?>
                                    
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-6 add-margin">
                            <div class="form-group">

                                <select id="category" class="form-control custom-select">
                                    <option selected>Select category</option>
                                    
                                    <?php
                                        //Category Details
                                        $query = "SELECT * FROM categories";
                                        $Category_select = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($Category_select)){
                                            $CategoryName = $row['Name'];
                                            echo "<option value='" . $CategoryName . "'> " . $CategoryName . "</option>";
                                        }
                                    ?>
                                    
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-6 add-margin">
                            <div class="form-group">

                                <select id="university" class="form-control custom-select">
                                    <option selected>Select University</option>
                                    
                                    <?php
                                        //University Details
                                        $query = "SELECT DISTINCT UniversityName FROM sellernotes";
                                        $Category_select = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($Category_select)){
                                            $UniversityName = $row['UniversityName'];
                                            echo "<option value='" . $UniversityName . "'> " . $UniversityName . "</option>";
                                        }
                                    ?>
                                    
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-6 add-margin">
                            <div class="form-group">

                                <select id="course" class="form-control custom-select">
                                    <option selected>Select course</option>
                                    
                                    <?php
                                        //Course Details
                                        $query = "SELECT DISTINCT Course FROM sellernotes";
                                        $Category_select = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($Category_select)){
                                            $Course = $row['Course'];
                                            echo "<option value='" . $Course . "'> " . $Course . "</option>";
                                        }
                                    ?>
                                    
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-6 add-margin">
                            <div class="form-group">

                                <select id="country" class="form-control custom-select">
                                    <option selected>Select country</option>
                                    
                                    <?php
                                        
                                        //Country Details
                                        $query = "SELECT DISTINCT Name FROM countries";
                                        $Country_select = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($Country_select)){
                                            $CountryName = $row['Name'];
                                            echo "<option value='". $CountryName . "'>" . $CountryName ."</option>";
                                        } 
                                    ?>
                                    
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-6">
                            <div class="form-group">

                                <select id="rating" class="form-control custom-select">
                                    <option selected>Select rating</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="books">
        </section>
        
    </div>
    <!-- Search Notes Ends -->
    
<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->