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
