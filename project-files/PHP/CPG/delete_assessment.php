<?php
require_once('mysqli_connect.php');

$assessmentID = $_GET['assessmentID'];

$query = "DELETE FROM status_update WHERE stat_updateID = $assessmentID";

$response = mysqli_query($dbc, $query);

if ($response) {
    header('Location: assessment_history.php');
    exit;
} else {
    echo "Couldn't issue database query<br />";
    echo mysqli_error($dbc);
}

mysqli_close($dbc);

                
?>
