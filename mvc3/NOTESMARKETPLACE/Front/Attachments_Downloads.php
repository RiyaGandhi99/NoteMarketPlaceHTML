<!-- Database Coonection -->
<?php include "Config/Database-Connection.php"; ?>
<?php


    
    if(isset($_GET['Download'])){
        $ID = $_GET['Download'];
        
        $query = "SELECT * FROM sellernotesattachments WHERE NoteID=$ID";
        $Attachment_select = mysqli_query($connection,$query);
        if(!$Attachment_select){
            die("Query Failed" . mysqli_error($connection));
        }
        $files=[];
        while($row =mysqli_fetch_assoc($Attachment_select)){
            $FilePath = $row['FilePath'];
                
            $Path ="../Uploads/$FilePath";
            array_push($files,$Path);
            $FilePath = $row['FilePath'];
            
        }
        
        
        $query = "SELECT * FROM sellernotes WHERE ID=$ID";
        $Notes_Details = mysqli_query($connection,$query);
        if($row = mysqli_fetch_assoc($Notes_Details)){
            $SellerID = $row['SellerID'];
            $NoteTitle = $row['Title'];
            $IsPaid = $row['IsPaid'];
            $SellingPrice = $row['SellingPrice'];
            $CategoryID = $row['Category'];
        }else{
            die("Query Failed" . mysqli_error($connection));
        }
        
        
        //Category Details
        $query = "SELECT * FROM categories WHERE ID=$CategoryID";
        $Category_select_all = mysqli_query($connection,$query);
        if($row = mysqli_fetch_assoc($Category_select_all)){
            $Category = $row['Name'];
        }else {
            die("Query Failed" . mysqli_error($connection));
        }
           
                session_start();
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    $EmailID = $_SESSION['EmailID'];
                    
                    $query = "SELECT * FROM users WHERE EmailID='{$EmailID}'";
                    $User_select = mysqli_query($connection,$query);
                    if($row =mysqli_fetch_assoc($User_select)){
                        $DownloadID = $row['ID'];
                    }else{
                        die("Query Failed" . mysqli_error($connection));
                    }
                    
                    $query = "SELECT * FROM downloads WHERE NoteID=$ID AND Seller=$SellerID AND Downloader=$DownloadID";
                    $Download_select = mysqli_query($connection,$query);           
                    if(!$Download_select){
                        die("Query Failed" . mysqli_error($connection));
                    }
                    //echo mysqli_num_rows($Download_select);
                    if(mysqli_num_rows($Download_select)==0){
                    
                    
                    $date = date('Y-m-d H:i:s');
        
                    $query = "INSERT INTO downloads(`NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachmentPath`, `IsAttachmentDownloaded`,`AttachmentDownloadedDate`, `IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`) VALUES ($ID,$SellerID,$DownloadID,1,'{$FilePath}',1,'{$date}','{$IsPaid}',$SellingPrice,'{$NoteTitle}','{$Category}')";
        
        
                    $Download_Insert = mysqli_query($connection,$query);
                    if(!$Download_Insert){
                        die("Query Failed" . mysqli_error($connection));
                    }
                }
            }
        
        
        if(mysqli_num_rows($Attachment_select)>1){
            
            /* File Download (Multiple/Single) */
            $Zip_Name="Multiple_File_".date('Y-m-d').".zip";
            $zip = new ZipArchive;
            $zip->open($Zip_Name, ZipArchive::CREATE);
            foreach($files as $File){
                $zip->addFile($File,basename($File));
            }
            $zip->close();
            //echo 'Archive created!';
            header('Content-disposition: attachment; filename='.$Zip_Name);
            header('Content-type: application/zip');
            readfile($Zip_Name);
            
            unlink($Zip_Name);
            
            
        }else{
            header("Content-Type: application/pdf"); 
            header("Content-Disposition: attachment; filename=" .basename("../Uploads/$FilePath"));
            readfile("../Uploads/$FilePath");
        }
    }
       
?>


<?php
    
        if(isset($_GET['DownloadPaid'])){
            $ID = $_GET['DownloadPaid'];
            
            $query = "SELECT * FROM sellernotesattachments WHERE NoteID=$ID";
            $Attachment_select = mysqli_query($connection,$query);
            if($row =mysqli_fetch_assoc($Attachment_select)){
                $FilePath = $row['FilePath'];
            }
            if(!$Attachment_select){
                die("Query Failed" . mysqli_error($connection));
            }

            $query = "SELECT * FROM sellernotes WHERE ID=$ID";
            $Notes_Details = mysqli_query($connection,$query);
            if($row = mysqli_fetch_assoc($Notes_Details)){
                $SellerID = $row['SellerID'];
                $NoteTitle = $row['Title'];
                $SellingPrice = $row['SellingPrice'];
                $CategoryID = $row['Category'];
            }else{
                die("Query Failed" . mysqli_error($connection));
            }

                
                $query = "SELECT * FROM categories WHERE ID=$CategoryID";
                $Category_select = mysqli_query($connection,$query);
                if($row =mysqli_fetch_assoc($Category_select)){
                    $Category = $row['Name'];
                }else{
                    die("Query Failed" . mysqli_error($connection));
                }
                
                
                session_start();
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    $EmailID = $_SESSION['EmailID'];
                    
                    $query = "SELECT * FROM users WHERE EmailID='{$EmailID}'";
                    $User_select = mysqli_query($connection,$query);
                    if($row =mysqli_fetch_assoc($User_select)){
                        $DownloadID = $row['ID'];
                        $Name = $row['FirstName'];
                    }else{
                        die("Query Failed" . mysqli_error($connection));
                    }
                    
                    
                    $query = "SELECT * FROM downloads WHERE NoteID=$ID AND Seller=$SellerID AND Downloader=$DownloadID";
                    $Download_select = mysqli_query($connection,$query);
                    if(!$Download_select){
                        die("Query Failed" . mysqli_error($connection));
                    }
                    
                    if(mysqli_num_rows($Download_select)==0){
                        
                        

                        $query = "INSERT INTO `downloads`(`NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachmentPath`, `IsAttachmentDownloaded`, `IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`) VALUES ($ID,$SellerID,$DownloadID,0,'{$FilePath}',0,1,{$SellingPrice},'{$NoteTitle}','{$Category}')";


                        $Download_Insert = mysqli_query($connection,$query);
                        if(!$Download_Insert){
                            die("Query Failed" . mysqli_error($connection));
                        }else{
                            $query = "SELECT * FROM users WHERE ID=$SellerID";
                            $User_select = mysqli_query($connection,$query);
                            if($row =mysqli_fetch_assoc($User_select)){
                                $EmailID = $row['EmailID'];
                                $FirstName = $row['FirstName'];
                                $LastName = $row['LastName'];
                            }else{
                                die("Query Failed" . mysqli_error($connection));
                            }

                            /* Mail to user to verifty email first.*/
                            $to = $EmailID;

                            $header = "MIME_Version:1.0" . "\r\n";
                            $header .= "Content-type: text/html; charset=iso-8859-1"."\r\n";
                            $header .= 'From: gogoproject2020@gmail.com';
                            
                            $subject = $Name ." wants to purchase your notes";
                            
                            $comments = "Hello <br>
                            <h4>".$FirstName." ".$LastName.",</h4> <br>";
                            $comments .= "<p>We would like to inform you that,". $Name ." wants to purchase your notes. Please see Buyer Requests tab and allow download access to Buyer if you have received the payment from him.</p><br><br>";
                            
                            $comments .= "<br><br> Regards, <br> Notes Marketplace";
                            
                            if(!mail($to,$subject,$comments,$header)){
                                die("Mail not sent" . mysqli_error($connection));
                            }
                        }
                        
                    }
                 
                }
                header("Location: Notes_Details.php?Note=$ID");
            }
    
    
    
    ?>
