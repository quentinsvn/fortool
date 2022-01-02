<?php
// Load the database configuration file
include_once 'dbConfig.php';

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile, 0, ";")) !== FALSE){
                // Get row data
                $result = $db->query("SELECT * FROM utip");
                $row = $result->fetch_assoc();
                //$result10 = $db->query("SELECT * FROM members_last");
                //$row10 = $result10->fetch_assoc();
                $nbr  = $line[0];
                $solde_last = $row['fortcoins'];
                $identifiant  = $line[1];
                $input  = $line[8];
                $output = str_replace(',', '.', $input);
                $fortcoins = $output*6/0.02;
                $euros = $fortcoins*0.02/6;
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM utip WHERE identifiant = '".$line[1]."'";
                $prevResult = $db->query($prevQuery);
                $prevQuery2 = "SELECT id FROM utip WHERE identifiant = '".$line[1]."'";
                $prevResult2 = $db->query($prevQuery2);
                if($prevResult->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                            // Update member data in the database
                            //$db->query($sql10);
                            //$db->query("INSERT INTO members_last (identifiant, euros, fortcoins) VALUES ('".$identifiant."', '".$euros."', '".$fortcoins."')");
                            if($row['fortcoins'] < $fortcoins) {
                                $solde = $fortcoins - $solde_last;
                                $db->query("UPDATE utip SET nbr = '".$nbr."', identifiant = '".$identifiant."', euros = '".$euros."', fortcoins = '".$fortcoins."', solde = '".$solde."', modified = NOW() WHERE identifiant = '".$identifiant."'");
                            }
                            //$db->query("DELETE FROM members_last");
                        
                }
                          
                } else{
                    // Insert member data in the database
                    $db->query("INSERT INTO utip (identifiant, euros, fortcoins) VALUES ('".$identifiant."', '".$euros."', '".$fortcoins."')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: index.php".$qstring);
?>