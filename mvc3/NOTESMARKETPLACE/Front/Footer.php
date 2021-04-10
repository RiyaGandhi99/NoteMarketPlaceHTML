<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>
<?php
    
    $query = "SELECT * FROM system_configuration";
    $Config_Details = mysqli_query($connection,$query);
    if(!$Config_Details){
        die("Query Failed".mysqli_error($connection));
    }
    if(mysqli_num_rows($Config_Details)!=0){
        $query = "SELECT * FROM system_configuration WHERE ID=4";
        $Facebook_Details = mysqli_query($connection,$query);
        if($row = mysqli_fetch_assoc($Facebook_Details)){
            $Facebook_Url= $row['Value'];
        }

        $query = "SELECT * FROM system_configuration WHERE ID=5";
        $Twitter_Details = mysqli_query($connection,$query);
        if($row = mysqli_fetch_assoc($Twitter_Details)){
            $Twitter_Url= $row['Value'];
        }

        $query = "SELECT * FROM system_configuration WHERE ID=6";
        $LinkedIn_Details = mysqli_query($connection,$query);
        if($row = mysqli_fetch_assoc($LinkedIn_Details)){
            $LinkedIn_Url= $row['Value'];
        }
    }
?>
    
      
    <!-- Footer -->
    <footer>

        <div class="container">

            <div class="row">

                <div class="col-md-6 col-sm-6 col-6 text-left footer-left">

                    <p>Copyright &copy; Tatvasoft All rights reserved</p>

                </div>

                <div class="col-md-6 col-sm-6 col-6 text-right footer-right">
                    <ul class="social-list">
                        <li>
                            <a href="<?php if(mysqli_num_rows($Config_Details)!=0){ echo $Facebook_Url; }else{ echo "#"; }?>">
                                <img src="images/Homepage/facebook.png" alt="Facebook Link" class="img-responsive">
                            </a>
                        </li>
                        <li>
                            <a href="<?php if(mysqli_num_rows($Config_Details)!=0){ echo $Twitter_Url; }else{ echo "#"; }?>">
                                <img src="images/Homepage/twitter.png" alt="Twitter Link" class="img-responsive">
                            </a>
                        </li>
                        <li>
                            <a href="<?php if(mysqli_num_rows($Config_Details)!=0){ echo $LinkedIn_Url;}else{ echo "#"; } ?>">
                                <img src="images/Homepage/linkedin.png" alt="LinkedIn Link" class="img-responsive">
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

    </footer>
    <!-- Footer ENDS -->
    


    
    <!-- JQuery-->
    <script src="js/jquery-min.js"></script>
    
    <!--Bootstrap JS-->
    <script src="js/bootstrap/bootstrap.min.js"></script> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
    <!--Custom JS--> 
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <!--Custom JS-->
    <script src="js/Script.js"></script>

    
</body>

</html>