<?php
// Connect to the database
require_once('mysqli_connect.php');

// Use a prepared statement to retrieve data from the database
$stmt = mysqli_prepare($dbc, "SELECT * FROM status_update");
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result) {
    // Open a file for writing
    $filename = 'all_assessments_' . time() . '.csv';
    // Open a file for writing
    $fp = fopen($filename, 'w');
    

    // Write data to the file in CSV format
    if ($result->num_rows > 0) {
        // Write the column headers
        fputcsv($fp, array('stat_updateID', 'statusID', 'goalID', 'update_date','goal_newest', 'notes'));

        // Write each row of data
        while ($row = $result->fetch_assoc()) {
            fputcsv($fp, $row);
        }
    }
    // Close the file
    fclose($fp);
    echo "<script type='text/javascript'>
            alert('Download successful');
            window.location.href = 'assessment_history.php';
          </script>";

    mysqli_stmt_close($stmt);
    mysqli_close($dbc);
} else {
    echo "Couldn't issue database query<br />";
    echo mysqli_error($dbc);
}


?>