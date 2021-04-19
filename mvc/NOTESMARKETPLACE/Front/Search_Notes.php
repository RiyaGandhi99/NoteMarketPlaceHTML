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

                                <input type="text" class="form-control" id="search" placeholder="Search Notes here...">
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
                                    <option>..</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-6 add-margin">
                            <div class="form-group">

                                <select id="category" class="form-control custom-select">
                                    <option selected>Select category</option>
                                    <option>..</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-6 add-margin">
                            <div class="form-group">

                                <select id="university" class="form-control custom-select">
                                    <option selected>Select University</option>
                                    <option>..</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-6 add-margin">
                            <div class="form-group">

                                <select id="course" class="form-control custom-select">
                                    <option selected>Select course</option>
                                    <option>..</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-6 add-margin">
                            <div class="form-group">

                                <select id="country" class="form-control custom-select">
                                    <option selected>Select country</option>
                                    <option>..</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-6">
                            <div class="form-group">

                                <select id="rating" class="form-control custom-select">
                                    <option selected>Select rating</option>
                                    <option>..</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="books">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="heading">
                        <h2>Total 18 notes</h2>
                    </div>
                </div>
            </div>
            <div class="books">
               
                <!-- Book 01 -->
                <div class="card">
                    <a href="Notes_Details.php"><img src="images/Search/1.jpg" class="card-img-top" alt="BOOK1"></a>
                    <div class="card-body">
                        <h5 class="card-title">Computer Operating System - Final Exam Book With Paper Solution</h5>
                        <p class="card-text">
                            <img src="images/Search/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/Search/pages.png"><span>204 Pages</span><br>
                            <img src="images/Search/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/Search/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
                
                <!-- Book 02 -->
                <div class="card">
                    <a href="Notes_Details.php"><img src="images/Search/2.jpg" class="card-img-top" alt="BOOK2"></a>
                    <div class="card-body">
                        <h5 class="card-title">Computer Science</h5>
                        <p class="card-text">
                            <img src="images/Search/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/Search/pages.png"><span>204 Pages</span><br>
                            <img src="images/Search/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/Search/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
                
                <!-- Book 03 -->
                <div class="card">
                    <a href="Notes_Details.php"><img src="images/Search/3.jpg" class="card-img-top" alt="BOOK3"></a>
                    <div class="card-body">
                        <h5 class="card-title">Basic Computer Engineering Tech India Publication Series</h5>
                        <p class="card-text">
                            <img src="images/Search/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/Search/pages.png"><span>204 Pages</span><br>
                            <img src="images/Search/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/Search/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
                
                <!-- Book 04 -->
                <div class="card">
                    <a href="Notes_Details.php"><img src="images/Search/4.jpg" class="card-img-top" alt="BOOK4"></a>
                    <div class="card-body">
                        <h5 class="card-title">Computer Science Illuminated Seventh Edition</h5>
                        <p class="card-text">
                            <img src="images/Search/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/Search/pages.png"><span>204 Pages</span><br>
                            <img src="images/Search/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/Search/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
                
                <!-- Book 05 -->
                <div class="card">
                    <a href="Notes_Details.php"><img src="images/Search/5.jpg" class="card-img-top" alt="BOOK5"></a>
                    <div class="card-body">
                        <h5 class="card-title">The Principles of Computer Hardware - Oxford</h5>
                        <p class="card-text">
                            <img src="images/Search/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/Search/pages.png"><span>204 Pages</span><br>
                            <img src="images/Search/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/Search/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
                
                <!-- Book 06 -->
                <div class="card">
                    <a href="Notes_Details.php"><img src="images/Search/6.jpg" class="card-img-top" alt="BOOK6"></a>
                    <div class="card-body">
                        <h5 class="card-title">The Computer Book</h5>
                        <p class="card-text">
                            <img src="images/Search/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/Search/pages.png"><span>204 Pages</span><br>
                            <img src="images/Search/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/Search/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
                
                <!-- Book 07 -->
                <div class="card">
                    <a href="Notes_Details.php"><img src="images/Search/1.jpg" class="card-img-top" alt="BOOK7"></a>
                    <div class="card-body">
                        <h5 class="card-title">Computer Operating System - Final Exam Book With Paper Solution</h5>
                        <p class="card-text">
                            <img src="images/Search/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/Search/pages.png"><span>204 Pages</span><br>
                            <img src="images/Search/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/Search/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
                
                <!-- Book 08 -->
                <div class="card">
                    <a href="Notes_Details.php"><img src="images/Search/2.jpg" class="card-img-top" alt="BOOK8"></a>
                    <div class="card-body">
                        <h5 class="card-title">Computer Science</h5>
                        <p class="card-text">
                            <img src="images/Search/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/Search/pages.png"><span>204 Pages</span><br>
                            <img src="images/Search/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/Search/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
                
                <!-- Book 09 -->
                <div class="card">
                    <a href="Notes_Details.php"><img src="images/Search/3.jpg" class="card-img-top" alt="BOOK9"></a>
                    <div class="card-body">
                        <h5 class="card-title">Basic Computer Engineering Tech India Publication Series</h5>
                        <p class="card-text">
                            <img src="images/Search/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/Search/pages.png"><span>204 Pages</span><br>
                            <img src="images/Search/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/Search/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <img src="images/Search/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
            </div>

        </section>
        <div class="row justify-content-center" id="search-pagination">

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
    <!-- Search Notes Ends -->
    
<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->