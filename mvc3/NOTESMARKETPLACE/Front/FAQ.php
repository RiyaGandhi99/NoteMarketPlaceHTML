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
        
    <!-- FAQ  -->
    <div class="flex-shrink-0" id="padding-navbar">
        <section id="bg-image-faq" class="my-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 id="title">Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div id="general-question">
                <div class="heading">
                    <h2>General Questions</h2>
                </div>
                <div class="general-questions">
                    <div class="accordion" id="accordionExample">
                        <div class="questions">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        what is Market-Place-Notes ?
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                            style="float: right;">
                                            <img src="images/FAQ/add.png">
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse " aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt
                                        aliqua put a bird on it squi VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="questions">
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        What do the University say?
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
                                            style="float: right;">
                                            <img src="images/FAQ/add.png">
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                        shoreditch et. Nihil anim kef them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="questions">
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        Is this legal
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree" style="float: right;">
                                            <img src="images/FAQ/add.png">
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                        shoreditch et. Nihil anim kef them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="upload-question">
                <div class="heading">
                    <h2>Uploaders</h2>
                </div>
                <div class="upload-questions">
                    <div class="accordion" id="accordionExample-2">
                        <div class="questions">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        what is Market-Place-Notes ?
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseFour" aria-expanded="true"
                                            aria-controls="collapseFour" style="float: right;">
                                            <img src="images/FAQ/add.png">
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseFour" class="collapse " aria-labelledby="headingOne"
                                    data-parent="#accordionExample-2">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt
                                        aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch
                                        et. VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="questions">
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        What do the University say?
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseFive" aria-expanded="false"
                                            aria-controls="collapseFive" style="float: right;">
                                            <img src="images/FAQ/add.png">
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample-2">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                        shoreditch et. Nihil anim kef them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="download-question">
                <div class="heading">
                    <h2>Downloaders</h2>
                </div>
                <div class="download-questions">
                    <div class="accordion" id="accordionExample-1">
                        <div class="questions">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        How do I buy notes ?
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapsesix" aria-expanded="true" aria-controls="collapsesix"
                                            style="float: right;">
                                            <img src="images/FAQ/add.png">
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapsesix" class="collapse " aria-labelledby="headingOne"
                                    data-parent="#accordionExample-1">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt
                                        aliqua put a bird on itnable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="questions">
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        Can I edit notes  ?
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseseven" aria-expanded="false"
                                            aria-controls="collapseseven" style="float: right;">
                                            <img src="images/FAQ/add.png">
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseseven" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample-1">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                        shoreditch et. Nihil anim keffiy accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ  -->
    
<!-- Footer -->
<?php include "Footer.php"; ?>
<!-- Footer ENDS -->