<!-- Header -->
<?php ob_start(); ?>
<?php include "Header.php"; ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        var table = $('#Dashboard_table').DataTable({
            "pageLength": 5,
            "info": false,
            "lengthChange": false,
            "sDom": 'ltipr',
            "pagingType": "simple_numbers",
            "language": {
                "paginate": {
                    "previous": "&lt;",
                    "next": "&gt;"
                }
            },
            "columnDefs": [{
                "targets": [9],
                "orderable": false,
            }]
        });


        $('#Dashboard_published').on('click', function() {
            var published = document.getElementById("Search_published");
            table.search(published.value).draw();
        });

    });

</script>

    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light white-nav-top fixed-top">
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

                        <li class="nav-item active">
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
                                <a class="dropdown-item" href="Manage_System_Configuration.php">Manage System Configuration</a>
                                <a class="dropdown-item" href="Manage_Administrator.php">Manage Administrator</a>
                                <a class="dropdown-item" href="Manage_Category.php">Manage Category</a>
                                <a class="dropdown-item" href="Manage_Type.php">Manage Type</a>
                                <a class="dropdown-item" href="Manage_Country.php">Manage Countries</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle user-img dropbtn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/Homepage/user-img.png" alt="User-Photo" class="rounded-circle img-responsive"></a>
                            <div class="dropdown-menu" style="left:0;" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="My_Profile.php">Update Profile</a>
                                <a class="dropdown-item" href="Change_Password.php">Change Password</a>
                                <a class="dropdown-item" href="#">LOGOUT</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0">
                                <a href="Login.php"><button class="btn btn-outline-success my-2 my-sm-0 btn-Blue" type="submit">Logout</button></a>
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header ENDS -->

    <!-- Dashboard -->
    <section id="dashboard-notes">

        <div class="content-box-lg">

            <div class="container">

                <div class="row dashboard-notes-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="horizontal-heading">
                            <h2>Dashboard</h2>
                        </div>

                    </div>

                </div>

                <div class="row dashboard-notes-row">

                    <div class="col-md-12 col-sm-12 col-12 text-center">

                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-12">
                                <h4>20</h4>
                                <p>Number Of Notes in Review for Publish</p>
                            </div>
                            <div class="col-md-3 col-sm-12 col-12">
                                <h4>103</h4>
                                <p>Number Of New Notes Downloaded<br>(Last 7 Days)</p>
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <h4>223</h4>
                                <p>Number Of New Notes Registrations(Last 7 Days)</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Dashboard ENDS -->

    <!-- Published Notes -->
    <section id="publish-note">

        <div class="content-box-xs">

            <div class="container">

                <div class="row publish-note-row">

                    <div class="col-md-6 col-sm-6 col-6">

                        <div class="horizontal-heading">
                            <h2>Published Notes</h2>
                        </div>

                    </div>

                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-4">
                                <div class="form-group">
                                   <form>
                                    <input type="text" id="Search_published" name="Search_published" class="form-control" placeholder="Search">
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-4">
                               <form>
                                <button type="button" id="Dashboard_published" name="Dashboard_published" class="btn btn-info btn-Blue">Search</button>
                                </form>
                            </div>
                            <div class="col-md-4 col-sm-4 col-4">
                                <form>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option selected>Select month</option>
                                            <option>01</option>
                                            <option>02</option>
                                            <option>04</option>
                                            <option>05</option>
                                            <option>06</option>
                                            <option>07</option>
                                            <option>08</option>
                                            <option>09</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                        </select>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row publish-note-row">

                    <div class="col-md-12 col-sm-12 col-12">

                        <div class="table-responsive">
                            <table class="table" id="Dashboard_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SR NO.</th>
                                        <th scope="col">TITLE</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">ATTACHMENT</th>
                                        <th scope="col">SELL TYPE</th>
                                        <th scope="col">PRICE</th>
                                        <th scope="col">PUBLISHER</th>
                                        <th scope="col">PUBLISHER DATE</th>
                                        <th scope="col">NUMBER OF DOWNLOADS</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="member-Blue">Data Science</td>
                                        <td>Science</td>
                                        <td>10 KB</td>
                                        <td>Free</td>
                                        <td>$0</td>
                                        <td>Pritesh Panchal</td>
                                        <td>09-10-2020,10:10</td>
                                        <td class="member-Blue">10</td>
                                        <td>
                                            <div class="dropdown">
                                                <img src="images/tables/dots.png" alt="Setting Image" class="dropbtn">
                                                <div class="dropdown-content">
                                                    <a href="#">Downloaded Notes</a>
                                                    <a href="#">View More Details</a>
                                                    <a href="#">Unpublish</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td class="member-Blue">Accounts</td>
                                        <td>Commerce</td>
                                        <td>23 MB</td>
                                        <td>Paid</td>
                                        <td>$22</td>
                                        <td>Rahil Shah</td>
                                        <td>10-10-2020,12:30</td>
                                        <td class="member-Blue">21</td>
                                        <td>
                                            <div class="dropdown">
                                                <img src="images/tables/dots.png" alt="Setting Image" class="dropbtn">
                                                <div class="dropdown-content">
                                                    <a href="#">Downloaded Notes</a>
                                                    <a href="#">View More Details</a>
                                                    <a href="#">Unpublish</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td class="member-Blue">Social Studies</td>
                                        <td>Social</td>
                                        <td>3 MB</td>
                                        <td>Paid</td>
                                        <td>$56</td>
                                        <td>Anish Patel</td>
                                        <td>11-10-2020,01:00</td>
                                        <td class="member-Blue">13</td>
                                        <td>
                                            <div class="dropdown">
                                                <img src="images/tables/dots.png" alt="Setting Image" class="dropbtn">
                                                <div class="dropdown-content">
                                                    <a href="#">Downloaded Notes</a>
                                                    <a href="#">View More Details</a>
                                                    <a href="#">Unpublish</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td class="member-Blue">AI</td>
                                        <td>IT</td>
                                        <td>1 MB</td>
                                        <td>Free</td>
                                        <td>$0</td>
                                        <td>Vijay Vaishnav</td>
                                        <td>12-10-2020,10:10</td>
                                        <td class="member-Blue">34</td>
                                        <td>
                                            <div class="dropdown">
                                                <img src="images/tables/dots.png" alt="Setting Image" class="dropbtn">
                                                <div class="dropdown-content">
                                                    <a href="#">Downloaded Notes</a>
                                                    <a href="#">View More Details</a>
                                                    <a href="#">Unpublish</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td class="member-Blue">Lorem Ipsum</td>
                                        <td>Lorem</td>
                                        <td>105 KB</td>
                                        <td>Paid</td>
                                        <td>$90</td>
                                        <td>Mehul Patel</td>
                                        <td>13-10-2020, 11:25</td>
                                        <td class="member-Blue">9</td>
                                        <td>
                                            <div class="dropdown">
                                                <img src="images/tables/dots.png" alt="Setting Image" class="dropbtn">
                                                <div class="dropdown-content">
                                                    <a href="#">Downloaded Notes</a>
                                                    <a href="#">View More Details</a>
                                                    <a href="#">Unpublish</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>
    <!-- Published Notes ENDS -->

<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->