<?php
require_once('mysqli_connect.php');

// Check if a file was uploaded
if(isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] == UPLOAD_ERR_OK){

    // Open the uploaded file and read its contents
    $file = fopen($_FILES['csv_file']['tmp_name'], 'r');
    $csv_data = [];
    while($row = fgetcsv($file)){
        $csv_data[] = $row;
    }
    fclose($file);

    // Generate an ID for each row and replace the first column value with it
    $id = 1;
    foreach($csv_data as &$row){
        $row[0] = $id++;
    }

    // Connect to the database and insert the data
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', 'your_username', 'your_password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("INSERT INTO goal ('goalID', 'goalTitle', 'status_updateID', 'cost','impact', 'complexity', 'categoryID', 'csf', 'assessment_date') VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    foreach($csv_data as $row){
        $stmt->execute($row);
    }

    // Output a success message
    echo "File uploaded and data inserted successfully.";

}else{
    // Output an error message if no file was uploaded or if there was an error
    echo "Error uploading file: " . ($_FILES['csv_file']['error'] ?? "unknown error");
}

?>