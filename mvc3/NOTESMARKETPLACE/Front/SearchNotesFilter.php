<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>
<?php
            
            
            if(isset($_POST['Page'])){
                $Page = (int)$_POST['Page'];
               
            }else{
                $Page = "";
            }
            
            $N=9;
            if($Page=="" || $Page==1){
                $Page_1=0;
            }else{
                $Page_1 = (($Page*$N)-$N);
            }
            
            $query = "SELECT *,sn.ID AS ID FROM sellernotes AS sn LEFT JOIN sellernotesreviews AS sr ON sn.ID=sr.NoteID  WHERE sn.IsActive=1 ";
            if(isset($_POST['search'])){
                $Title = $_POST['search'];
                
                /*Notes Details (To Search Title through Search Box ) */
                $query .= "AND sn.Title LIKE '%$Title%'";
                
            }
            if(isset($_POST['select']) || isset($_POST['Page'])){
                if($_POST['Type']!="" && $_POST['Type']!="Select type"){
                    $T = $_POST['Type'];
                    /*Notes Details (To Filter through type from Dropdown)*/
                    $Types = "SELECT * FROM types WHERE Name='{$T}' ";
                    $Type_select_all = mysqli_query($connection,$Types);
                    if(mysqli_num_rows($Type_select_all)!=0){
                        if($row = mysqli_fetch_assoc($Type_select_all)){
                            $TypeID = $row['ID'];
                            $query .= "AND sn.NoteType=$TypeID ";
                        }else {
                            die("Query Failed" . mysqli_error($connection));
                        }
                    }
                }
                if($_POST['Category']!="" && $_POST['Category']!="Select category"){
                    $category = $_POST['Category'];
                    //Category Details
                    $Category = "SELECT * FROM categories WHERE Name='{$category}' ";
                    $Category_select_all = mysqli_query($connection,$Category);
                    if(mysqli_num_rows($Category_select_all)!=0){
                        if($row = mysqli_fetch_assoc($Category_select_all)){
                            $CategoryID = $row['ID'];
                            $query .= "AND sn.Category=$CategoryID ";
                        }else {
                            die("Query Failed" . mysqli_error($connection));
                        }
                    }
                }
                if($_POST['Country']!="" && $_POST['Country']!="Select country"){
                    $Country = $_POST['Country'];
                    /*Notes Details (To Search Country through Dropdown)*/
                    $C1 = "SELECT * FROM countries WHERE Name='{$Country}' ";
                    $Country_select_all = mysqli_query($connection,$C1);
                    if(mysqli_num_rows($Country_select_all)!=0){
                        if($row = mysqli_fetch_assoc($Country_select_all)){
                            $CountryID = $row['ID'];
                            $query .= "AND sn.Country=$CountryID ";
                        }else {
                            die("Query Failed" . mysqli_error($connection));
                        }
                    }
                }
                if($_POST['University']!="" && $_POST['University']!="Select University"){
                        $University = $_POST['University'];
                        $query .= " AND sn.UniversityName='{$University}' ";
                }
                if($_POST['Course']!="" && $_POST['Course']!="Select course"){
                        $Course = $_POST['Course'];
                        $query .= " AND sn.Course='{$Course}' ";
                }
                if($_POST['Rating']!="" && $_POST['Rating']!="Select rating"){
                        $Rating = $_POST['Rating'];
                        $query .= " AND sr.Ratings='{$Rating}' ";
                }
            }
            $query.=" GROUP BY sn.ID";
            $Note_select = mysqli_query($connection,$query) or die("Query Failed" . mysqli_error($connection));
            $Notes_Count = mysqli_num_rows($Note_select);
            if($Notes_Count == 0){
                echo "<div class='text-center' style='color:#6255a5;'><h1>Data Not Found</h1></div>";
            }else{
                
            
            ?>
            
            <section id="books">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2> 
                            <?php 
                                if($Notes_Count<2){
                                    echo "Total ".$Notes_Count." Note";
                                }else{
                                    echo "Total ".$Notes_Count ." Notes";
                                }
                            ?></h2>
                        </div>
                    </div>
                </div>
                <div class="books">   
                <!-- Books -->
                
                <?php
                    
                    $query = "SELECT *,sn.ID AS ID FROM sellernotes AS sn LEFT JOIN sellernotesreviews AS sr ON sn.ID=sr.NoteID WHERE sn.IsActive=1 ";
                    if(isset($_POST['search']) ){
                    $Title = $_POST['search'];

                    /*Notes Details (To Search Title through Search Box ) */
                    $query .= "AND sn.Title LIKE '%$Title%'";

                    }
                    if(isset($_POST['select']) || isset($_POST['Page'])){

                        if($_POST['Type']!="" && $_POST['Type']!="Select type"){
                            $Type = $_POST['Type'];
                            /*Notes Details (To Filter through type from Dropdown)*/
                            $Types = "SELECT * FROM types WHERE Name='{$Type}' ";
                            $Type_select_all = mysqli_query($connection,$Types);
                            if(mysqli_num_rows($Type_select_all)!=0){
                                if($row = mysqli_fetch_assoc($Type_select_all)){
                                    $TypeID = $row['ID'];
                                    $query .= "AND sn.NoteType=$TypeID ";
                                }else {
                                    die("Query Failed" . mysqli_error($connection));
                                }
                            }
                        }
                        if($_POST['Category']!="" && $_POST['Category']!="Select category"){
                            $category = $_POST['Category'];
                            //Category Details
                            $Category = "SELECT * FROM categories WHERE Name='{$category}' ";
                            $Category_select_all = mysqli_query($connection,$Category);
                            if(mysqli_num_rows($Category_select_all)!=0){
                                if($row = mysqli_fetch_assoc($Category_select_all)){
                                    $CategoryID = $row['ID'];
                                    $query .= "AND sn.Category=$CategoryID ";
                                }else {
                                    die("Query Failed" . mysqli_error($connection));
                                }
                            }
                        }
                        if($_POST['Country']!="" && $_POST['Country']!="Select country"){
                            $Country = $_POST['Country'];
                            /*Notes Details (To Search Country through Dropdown)*/
                            $C1 = "SELECT * FROM countries WHERE Name='{$Country}' ";
                            $Country_select_all = mysqli_query($connection,$C1);
                            if(mysqli_num_rows($Country_select_all)!=0){
                                if($row = mysqli_fetch_assoc($Country_select_all)){
                                    $CountryID = $row['ID'];
                                    $query .= "AND sn.Country=$CountryID ";
                                }else {
                                    die("Query Failed" . mysqli_error($connection));
                                }
                            }
                        }
                        if($_POST['University']!="" && $_POST['University']!="Select University"){
                            $University = $_POST['University'];
                            $query .= " AND sn.UniversityName='{$University}' ";
                        }
                        if($_POST['Course']!="" && $_POST['Course']!="Select course"){
                            $Course = $_POST['Course'];
                            $query .= " AND sn.Course='{$Course}' ";
                        }
                        if($_POST['Rating']!="" && $_POST['Rating']!="Select rating"){
                            $Rating = $_POST['Rating'];
                            $query .= " AND sr.Ratings='{$Rating}' ";
                        }
                    }
                    
                    $query .= " GROUP BY sn.ID LIMIT $Page_1,9 ";
                    $Notes_select = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($Notes_select)){
                        $ID = $row['ID'];
                        $DisplayPicture = $row['DisplayPicture'];
                        $Title = $row['Title'];
                        $NumberOfPages = $row['NumberOfPages'];
                        $UniversityName = $row['UniversityName'];
                        $CountryID = $row['Country'];
                        $PDate = $row['PublishedDate'];
                        $PublishedDate= date('D, M d Y',strtotime($PDate));
                    
                    $C = "SELECT * FROM countries WHERE ID='{$CountryID}' ";
                    $Country_select_all = mysqli_query($connection,$C);
                    if($row = mysqli_fetch_assoc($Country_select_all)){
                        $Country = $row['Name'];
                    }
                    
                    //Find the number of users marked this note inappropriate 
                    $query = "SELECT * FROM sellernotesreportedissues WHERE NoteID=$ID";
                    $Notesreported_Select = mysqli_query($connection,$query);
                    if(!$Notesreported_Select){
                        die("Query Failed" . mysqli_error($connection));
                    }
                    $Report_issue = mysqli_num_rows($Notesreported_Select);
                        
                    //Find the number of users review the note
                    $query = "SELECT * FROM sellernotesreviews WHERE NoteID=$ID";
                    $Notesreported_Select = mysqli_query($connection,$query);
                    if(!$Notesreported_Select){
                        die("Query Failed" . mysqli_error($connection));
                    }
                    $Review_Note = mysqli_num_rows($Notesreported_Select);
                    
                    
                    $query = "SELECT * FROM sellernotes WHERE ID=$ID";
                    $select_all = mysqli_query($connection,$query);
                    if($row = mysqli_fetch_assoc($select_all)){
                        $NoteID = $row['ID'];
                        $Id = $row['SellerID'];
                    }else{
                        die("Query Failed" . mysqli_error($connection));
                    }
                    
                    
                ?> 
                <div class="card">
                    <a href="<?php echo"Notes_Details.php?Note=$ID"; ?>"><img src="<?php echo "../Uploads/Members/{$Id}/{$NoteID}/Images/$DisplayPicture"; ?>" class="card-img-top" alt="BOOK1"></a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $Title; ?></h5>
                        <p class="card-text">
                            <img src="images/Search/university.png"><span><?php echo $UniversityName.", ".$Country; ?></span><br>
                            <img src="images/Search/pages.png"><span><?php echo $NumberOfPages; ?> Pages</span><br>
                            <?php if($PublishedDate!=Null){ ?>
                            <img src="images/Search/calendar.png"><span>
                            <?php   echo $PublishedDate; ?>
                            </span><br>
                            <?php
                            }else{
                                echo "<br><br>";    
                            }
                            ?>
                            <?php
                            if($Report_issue==0){
                                echo "<br><br>"; 
                            }else{ ?>
                            <img src="images/Search/flag.png"><span class="flag">
                                <?php echo $Report_issue . " "; ?>users marked this note as
                                inappropriate </span>
                            <?php } ?>
                        <div class="book-rating">
                           
                            <?php
                                
                                
                                $result=0;
                                //Rating Details
                                $query = "SELECT * FROM sellernotesreviews WHERE NoteID=$ID ";
                                $Review_select = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($Review_select)){
                                    $Ratings = $row['Ratings'];
                                    
                                    /*To display stars according to rating (only for 1 review)*/
                                    $total=5;
                                    if(mysqli_num_rows($Review_select)==1 && $Review_Note<2){
                                        if($Ratings==0){
                                            echo " ";
                                        }else if($Ratings!=5){
                                            for($s=1;$s<=$Ratings;$s++){
                                                echo "<img src='images/Search/star.png' alt='Star Ratings' class='img-responsive'>";
                                            }
                                        
                                            $Remain=$total-$Ratings;
                                            for($r=1;$r<=$Remain;$r++){
                                                echo "<img src='images/Search/star-white.png' alt='Star Ratings' class='img-responsive'>";
                                            }
                                        }else{
                                            for($s=1;$s<=$Ratings;$s++){
                                                echo "<img src='images/Search/star.png' alt='Star Ratings' class='img-responsive'>";
                                            }
                                        }
                                    }else if(mysqli_num_rows($Review_select)>1){
                                        $result=$result+$Ratings;
                                    }
                                } 
                                /*To display Avg. stars according to rating (More than 1 review)*/
                                if(mysqli_num_rows($Review_select)>1){
                                    $avg=0;
                                    for($t=1;$t<=$Review_Note;$t++){
                                        $avg = ceil($result/$Review_Note);
                                    }
                                    if($Ratings==0){
                                        echo " ";
                                    }else if($Ratings!=5){
                                        for($s=1;$s<=$avg;$s++){
                                            echo "<img src='images/Search/star.png' alt='Star Ratings' class='img-responsive'>";
                                        }
                                        $Remain=$total-$avg;
                                        for($r=1;$r<=$Remain;$r++){
                                            echo "<img src='images/Search/star-white.png' alt='Star Ratings' class='img-responsive'>";
                                        }
                                    }else{
                                        for($s=1;$s<=$avg;$s++){
                                            echo "<img src='images/Search/star.png' alt='Star Ratings' class='img-responsive'>";
                                        }
                                    }
                                }
                                
                            ?>
                            <span>
                            <?php 
                                if($Review_Note==0){
                                    echo "No Reviews"; 
                                }else{ 
                                    echo $Review_Note . " "; ?>Reviews
                            <?php } ?>
                            </span>
                        </div>
                        </p>
                    </div>
                </div>    
                
                <?php                      
                    }
                ?>
                
            </div>

        </section>
        <div class="row justify-content-center" id="search-pagination">

            <div class="col-md-12 col-sm-12 col-12">

                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                    <?php 
                        //$C=1;
                        //$P = $Page-$C;
                        //$N= $Page+$C;
                    ?>    
                        <li class="page-item">
                            <a class="page-link" href="Search_Notes.php?Page=<?php echo $P; ?>" aria-label="Previous">
                                <span aria-hidden="true">&lt;</span>
                            </a>
                        </li>
                           
                        <?php
                            
                            $Notes_Count= ceil($Notes_Count/9);
                            
                            for($i=1 ; $i<=$Notes_Count ; $i++){
                                if($i == $Page || $Page=="" && $i == 1){
                                    echo "<li class='page-item active' aria-current='page'>
                                            <a class='page-link' id='{$i}' href='Search_Notes.php?Page={$i}'>
                                                {$i}
                                            </a>
                                        </li>";
                                }else{
                                    echo "<li class='page-item' aria-current='page'>
                                            <a class='page-link' id='{$i}' href='Search_Notes.php?Page={$i}'>
                                                {$i}
                                            </a>
                                        </li>";
                                }
                            }
                        
                        ?>
                        
                        <li class="page-item">
                            <a class="page-link" href="Search_Notes.php?Page=<?php echo $N; ?>" aria-label="Previous">
                                <span aria-hidden='true'>&gt;</span>
                            </a>
                        </li>
                        
                    </ul>
                </nav>

            </div>

        </div>
        
        <?php 
            }
        ?>
