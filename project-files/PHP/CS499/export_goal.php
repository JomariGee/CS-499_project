<?php
    // Connect to the database
    require_once('mysqli_connect.php');
    $id = $_GET['goalID'];

    // Use a prepared statement to retrieve data from the database
    $stmt = mysqli_prepare($dbc, "SELECT * FROM goal WHERE goalID = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        // Open a file for writing
        $filename = 'my_goal_' . time() . '.csv';
        // Open a file for writing
        $fp = fopen($filename, 'w');
        

        // Write data to the file in CSV format
        if ($result->num_rows > 0) {
            // Write the column headers
            fputcsv($fp, array('goalID', 'goalTitle', 'status_updateID', 'cost','impact', 'complexity', 'categoryID', 'csf', 'assessment_date'));

            // Write each row of data
            while ($row = $result->fetch_assoc()) {
                fputcsv($fp, $row);
            }
        }
        // Close the file
        fclose($fp);

        header('Location:goals.php');
        exit;
        mysqli_stmt_close($stmt);
        mysqli_close($dbc);
    } else {
        echo "Couldn't issue database query<br />";
        echo mysqli_error($dbc);
    }
?>
