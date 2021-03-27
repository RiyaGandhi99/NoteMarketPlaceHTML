<!-- Header -->
<?php ob_start(); ?>
<?php include "Header.php"; ?>
<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>
   
    <!-- Email Verification -->
    <table>
       <tbody style="background-color:#fff;width:1366px;height:768px;position: absolute">
            <tr style="left:50px ;background-color:#fff ;width: 640px;height:390px ;position:relative ;margin-top:200px;margin-left: 420px ">
                <td>
                    <img src="images/Homepage/logo.png" alt="Logo" style="margin-top: 200px;margin-left: 420px">
                    <h2 style="font-family: 'Open Sans', sans-seri;font-size: 26px;font-weight: 600;line-height: 30px;color: #6255a5;padding-bottom: 6px;padding-top: 40px;margin-left:420px">Email Verification</h2>
                    <h5 style="font-family: 'Open Sans', sans-serif;font-size: 18px;font-weight: 600;line-height: 22px;color: #333333;padding-bottom: 6px;padding-top: 10px;margin-left: 420px">
                    <?php
                        
                        if(isset($_GET['emailid'])){
                            $EmailID = $_GET['emailid'];
                            
                            $query = "SELECT * FROM users WHERE EmailID='{$EmailID}'";
                            $User_select = mysqli_query($connection,$query);
                            if($row = mysqli_fetch_assoc($User_select)){
                                $FirstName = $row['FirstName'];
                                echo " Dear ".$FirstName;
                            }else {
                                die("Query Failed" . mysqli_error($connection));
                            }
                                
                        }
                        
                    ?>
                    </h5>
                    <p style="font-family: 'Open Sans', sans-serif;font-size: 16px;font-weight: 400;line-height: 20px;color: #333333;padding-bottom: 25px;margin-left: 420px">Thank you for Signup!<br><br>Simply Click below for email verification.</p>
                    <form action="" method="post">    
                        <button type="submit" name="Email_Verification" style="width: 560px;height: 50px;margin-left: 420px;background-color:#6255a5;color:#fff;text-transform:uppercase;border: transparent;font-weight: 600">Verify Email Address</button>
                    </form>
                    
                    <?php
                    
                    if(isset($_POST['Email_Verification'])){
                        $query = "UPDATE users SET IsEmailVerified=1 WHERE EmailID='{$EmailID}'";
                        $Users_update = mysqli_query($connection,$query);  
                        if(!$Users_update){
                           die("Query Failed" . mysqli_error($connection)); 
                        }
                    }
                    ?>
                </td>
            </tr>
       </tbody>
    </table>
    <!-- Email Verification ENDS -->
    
    <!-- JQuery-->
    <script src="js/jquery-min.js"></script>
    
    <!--Bootstrap JS-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--Custom JS-->
    <script src="js/Script.js"></script>

    
</body>

</html>