<?php
    require_once('mysqli_connect.php');
    $id = $_GET['goalID'];
    $query =  "DELETE FROM goal WHERE goalID = $id";

    $response = @mysqli_query($dbc, $query);
            
            if($response){
                header('Location:goals.php');
                exit;
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
            
            } else {
                echo "Couldn't issue database query<br />";
                echo mysqli_error($dbc);
            }
                        // Close connection to the database
        mysqli_close($dbc);
                
?>
