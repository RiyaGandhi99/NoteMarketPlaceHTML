<!-- Header -->
<?php ob_start(); ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>

    <?php   
        
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
            include "Registered_Header.php"; 
        }else{
            include "Unregistered_Header.php";
        }
        
    ?>
    
    <!-- Notes Details -->
    <section id="notes-details">

        <div class="content-box-lg">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-12 text-left">

                        <div class="horizontal-heading">
                            <h2>Notes Details</h2>
                        </div>

                    </div>

                </div>
                 
                 
                <?php
                
                    if(isset($_GET['EYE'])){
                        $ID = $_GET['EYE'];
                                        
                        $query = "SELECT * FROM sellernotes WHERE ID=$ID";
                        $Notes_Details = mysqli_query($connection,$query);
                        if($row = mysqli_fetch_assoc($Notes_Details)){
                            $Display_Picture = $row['DisplayPicture'];
                            $Title = $row['Title'];
                            $Description = $row['Description'];
                            $Category = $row['Category'];
                            $NotesPreview = $row['NotesPreview'];
                            //$TypeOld = $row['NoteType'];
                            $NumberOfPages = $row['NumberOfPages'];
                            $Country = $row['Country'];
                            $UniversityName = $row['UniversityName'];
                            $Course = $row['Course'];
                            $CourseCode = $row['CourseCode'];
                            $Proffessor = $row['Professor'];                       
                        }else{
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        //Country Details
                        $query = "SELECT * FROM countries WHERE ID='{$Country}'";
                        $Country_select_all = mysqli_query($connection,$query);
                        if($row = mysqli_fetch_assoc($Country_select_all)){
                            $Country = $row['Name'];
                        }else {
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        //Category Details
                        $query = "SELECT * FROM categories WHERE ID='{$Category}'";
                        $Category_select_all = mysqli_query($connection,$query);
                        if($row = mysqli_fetch_assoc($Category_select_all)){
                            $Category = $row['Name'];
                        }else {
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        
                        
                    }
                
                
                ?>
                 
                <div class="row notes-details-row">

                    <div class="col-md-8 col-sm-8 col-8">    
                        
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-6">
                                <img src="<?php if(isset($_GET['EYE'])){ echo '../Uploads/'.$Display_Picture; }else{ echo 'images/Search/1.jpg';} ?>" alt="Book Image" class="img-responsive">
                            </div>
                            <div class="col-md-8 col-sm-8 col-6">
                                <div class="horizontal-heading">
                                    <h2><?php if(isset($_GET['EYE'])){ echo $Title; }else{ echo "Computer Science"; } ?></h2>
                                    <h4><?php if(isset($_GET['EYE'])){ echo $Category; }else{ echo "Science"; } ?></h4>
                                </div>
                                <p><?php if(isset($_GET['EYE'])){ echo $Description; }else{ echo "Lorem ipsum dolor sit amet, consecteture adipisicing elite.<br> Quos esse veniam sed similique quaerat rerum repellat quia<br> cumque doloribus eius omnis sapiente, ea vitae asperiores<br> aut tempore corrupti tempora."; } ?></p>
                                
                                
                                <form>
                                <?php
                                    
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        echo "<button type='button' class='btn btn-primary btn-Blue' data-toggle='modal' data-target='#ThankModalCenter'>
                                        Download/$15</button>";
                                    }
                                    else {
                                        echo "<a href='Login.php'><button type='button' class='btn btn-primary btn-Blue'>Download/$15</button></a>";
                                    }
                                    
                                ?> 
                                </form>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-4 col-sm-4 col-4">
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12 notes-details-row-inner">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Institution:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php if(isset($_GET['EYE'])){ echo $UniversityName; }else{ echo "University Of California"; } ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Country:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php if(isset($_GET['EYE'])){ echo $Country; }else{ echo "United State"; } ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Course Name:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php if(isset($_GET['EYE'])){ echo $Course; }else{ echo "Computer Engineering"; } ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Course Code:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php if(isset($_GET['EYE'])){ echo $CourseCode; }else{ echo "248705"; } ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Professor:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php if(isset($_GET['EYE'])){ echo $Proffessor; }else{ echo "Mr. Richard Brown"; } ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Number Of Pages:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p><?php if(isset($_GET['EYE'])){ echo $NumberOfPages; }else{ echo "277"; } ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Approved Date:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 member-Blue">
                                        <p>November 25 2020</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <p>Rating:</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 img-notes-preview-star member-Blue">
                                        <p><img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star-white.png" alt="Star Ratings" class="img-responsive">100 Review</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12 Mark">
                                        <p>5 Users marked this note as inappropriate</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>

                
            </div>
        </div>

    </section>
    <!-- Notes Details ENDS -->
    
    <!-- Notes Preview & Customer Review -->
    <section id="note-preview">

        <div class="content-box-xs">

            <div class="container">

                <div class="row note-preview-row">

                    <div class="col-md-5 col-sm-5 col-5 text-left">

                        <div class="horizontal-heading">
                            <h2>Notes Preview</h2>
                        </div>
                        <div id="Iframe-Cicis-Menu-To-Go" class="set-margin-cicis-menu-to-go set-padding-cicis-menu-to-go set-border-cicis-menu-to-go set-box-shadow-cicis-menu-to-go center-block-horiz">
                            <div class="responsive-wrapper responsive-wrapper-padding-bottom-90pct" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                                <iframe src="http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf">
                                    <p style="font-size: 110%;"><em><strong>ERROR: </strong>
                                            An &#105;frame should be displayed here but your browser version does not support &#105;frames.</em> Please update your browser to its most recent version and try again, or access the file <a href="http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf">with this link.</a></p>
                                </iframe>
                            </div>
                        </div>


                    </div>
                

                    <div class="col-md-7 col-sm-7 col-7 text-left">

                        <div class="horizontal-heading">
                            <h2>Customer Review</h2>
                        </div>
                        
                        <!-- Customer 01 -->
                        <div id="customer">
                        <div class="row note-preview-row-inner">
                            <div class="col-md-2 col-sm-2 col-2">
                                <img src="images/NotesDetails/reviewer-1.png" alt="Customer 01" class="img-circle img-responsive img-notes-preview-reviewers">
                            </div>
                            <div class="col-md-10 col-sm-10 col-10">
                                <div class="row">
                                   <div class="col-md-12 col-sm-12 col-12">
                                        <h2>Richard Brown</h2>
                                   </div>
                                </div>
                                <div class="row img-notes-preview-star">
                                   <div class="col-md-12 col-sm-12 col-12">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star-white.png" alt="Star Ratings" class="img-responsive">
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <p>Lorem Ipsum has been industry's standard dummy Text ever since the 1500s when an unkowns printer took a gallery of type.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11 col-sm-11 col-11 border-down">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <!-- Customer 02 -->
                        <div class="row note-preview-row-inner">
                            <div class="col-md-2 col-sm-2 col-2">
                                <img src="images/NotesDetails/reviewer-2.png" alt="Customer 02" class="img-circle img-responsive img-notes-preview-reviewers">
                            </div>
                            <div class="col-md-10 col-sm-10 col-10">
                                <div class="row">
                                   <div class="col-md-12 col-sm-12 col-12">
                                        <h2>Alice Ortiaz</h2>
                                   </div>
                                </div>
                                <div class="row img-notes-preview-star">
                                   <div class="col-md-12 col-sm-12 col-12">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star-white.png" alt="Star Ratings" class="img-responsive">
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <p>Lorem Ipsum has been industry's standard dummy Text ever since the 1500s when an unkowns printer took a gallery of type.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11 col-sm-11 col-11 border-down">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <!-- Customer 03 -->
                        <div class="row note-preview-row-inner">
                            <div class="col-md-2 col-sm-2 col-2">
                                <img src="images/NotesDetails/reviewer-3.png" alt="Customer 03" class="img-circle img-responsive img-notes-preview-reviewers">
                            </div>
                            <div class="col-md-10 col-sm-10 col-10">
                                <div class="row">
                                   <div class="col-md-12 col-sm-12 col-12">
                                        <h2>Sara Passmore</h2>
                                   </div>
                                </div>
                                <div class="row img-notes-preview-star">
                                   <div class="col-md-12 col-sm-12 col-12">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star.png" alt="Star Ratings" class="img-responsive">
                                        <img src="images/NotesDetails/star-white.png" alt="Star Ratings" class="img-responsive">
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <p>Lorem Ipsum has been industry's standard dummy Text ever since the 1500s when an unkowns printer took a gallery of type.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                </div>

                <div class="row note-preview-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&lt;</span>
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&gt;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>

                </div>
            </div>
        </div>

    </section>
    <!-- Notes Preview & Customer Review ENDS -->

    
    <!-- Modal -->
    <div id="note-detail">
    <div class="modal fade" id="ThankModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <img src="images/NotesDetails/SUCCESS.png" alt="Success Yes">
                    <h1>Thank you for purchasing!</h1>
                    <h3>Dear Smith,</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio et, fugiat eos saepe soluta maiores unde maxime assumenda blanditiis qui voluptate veritatis sunt est hic incidunt natus in, voluptas aliquam.</p>
                    <p>In Case, You have urgency.<br>Please Contact Us on +91 9657849852</p>
                    <p>Once he receives the payment and acknowledge us- selected notes you can see over my downloads tab for download.</p>
                    <p>Have a good day.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal Ends -->
    
<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->