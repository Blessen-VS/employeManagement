<?php 
 
require('notes.php');
require('Database.php');
require('config.php');
 
if($userList){ 
    $delimiter = ","; 
    $filename = "user-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'FIRST NAME', 'LAST NAME', 'EMAIL', 'STREET ADDRESS', 'ROLE'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $userList){ 
        $lineData = array($row['id'], $row['first_name'], $row['last_name'], $row['email'], $row['street_address'], $row['role']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>