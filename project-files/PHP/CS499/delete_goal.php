<?php
require_once('mysqli_connect.php');
$id = $_GET['goalID'];
$query =  "DELETE FROM goal WHERE goalID = $id";

$response = @mysqli_query($dbc, $query);
        
        if($response){
            echo "Goal deleted successfully";
        
        } else {
            echo "Couldn't issue database query<br />";
            echo mysqli_error($dbc);
        }
                    // Close connection to the database
    mysqli_close($dbc);
                
?>

</form>
<form method = "POST" action ="goals.php">
<input type = "submit" value="goals page"/>
</form>