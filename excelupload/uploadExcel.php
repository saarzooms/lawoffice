<?php 
 
include('../db/connection.php');

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
 
// Include Spout library 
require_once 'spout-2.4.3/src/Spout/Autoloader/autoload.php';
 
// check file name is not empty
if (!empty($_FILES['file']['name'])) {
      
    // Get File extension eg. 'xlsx' to check file is excel sheet
    $pathinfo = pathinfo($_FILES["file"]["name"]);
     
    // check file has extension xlsx, xls and also check 
    // file is not empty
   if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls') 
           && $_FILES['file']['size'] > 0 ) {
         
        // Temporary file name
        $inputFileName = $_FILES['file']['tmp_name']; 
    
        // Read excel file by using ReadFactory object.
        $reader = ReaderFactory::create(Type::XLSX);
 
        // Open file
        $reader->open($inputFileName);
        $count = 1;
 
        // Number of sheet in excel file
        foreach ($reader->getSheetIterator() as $sheet) {
             
            // Number of Rows in Excel sheet
            foreach ($sheet->getRowIterator() as $row) {
 
                // It reads data after header. In the my excel sheet, 
                // header is in the first row. 
                if ($count > 1) { 
 
                    // Data of excel sheet
					
                    $data['email'] = $row[0];
                    $data['phone'] = $row[1];
                    $data['business_name'] = $row[2];	
                    $data['contact_name'] = $row[3];
                    $data['address'] = $row[4];
                    $data['facebook_profile'] = $row[5];
                    $data['linkedin_profile'] = $row[6];
                    $data['twitter_handle'] = $row[7];
                    $data['business_hours'] = $row[8];
                    $data['note'] = $row[9];
                    $data['business_type'] = $row[10];
					
                    $s="select id from businesstype_master where businesstype_name='".$row[10]."'";
					$typeid="";
                   foreach ($dbh->query($s) as $r)
				   {
					   $typeid=$r['id'];
				   }
				   
                    $query = "INSERT INTO `trusted_partner`(`email`, `phone`, `business_name`, `contact_name`, `address`, `facebook_profile`, `linkedin_profile`, `business_hours`, `note`, `business_type`, `twitter_handle`) 
					VALUES ('".$row[0]."','".$row[1]."','".$row[2]."','".$row[3]."','".$row[4]."','".$row[5]."','".$row[6]."','".$row[8]."','".$row[9]."','$typeid','".$row[7]."')";

					if($dbh->query($query))
					{
						
						
					}
                    //Here, You can insert data into database. 
                    //var_dump($data);
                     
                }
                $count++;
            }
        }
 
        // Close excel file
        $reader->close();
		header('Location: ../trustedpartner.php?id=1');
						
    } else {
		
       // echo "<script>alert('Please Select Valid Excel File');</script>";
	   header('Location: ../trustedpartner.php?id=0');
		
    }
 
} else {
 
   // echo "<script>alert('Please Select Excel File');</script>";
   header('Location: ../trustedpartner.php?id=0');
}
?>
