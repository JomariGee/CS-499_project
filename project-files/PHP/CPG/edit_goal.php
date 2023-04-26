<?php
    // Connect to the database
    require_once('mysqli_connect.php');
    $id = $_GET['goalID'];
    $sql = "SELECT * FROM goal WHERE goalID = $id";
    $response = mysqli_query($dbc, $sql);

    if ($response) {
    $row = mysqli_fetch_assoc($response);
    if (isset($_POST['submit'])) {
        $today = date("Y/m/d");

        // Get the updated values or use existing values if input fields are empty
        $goalTitle = isset($_POST['goalTitle']) && $_POST['goalTitle'] !== '' ? $_POST['goalTitle'] : $row['goalTitle'];
        $category = ($_POST['category']) && $_POST['category'] !== '' ? $_POST['category'] : $row['categoryID'];

        
        $status = ($_POST['status']) && $_POST['status'] !== '' ? $_POST['status'] : $row['statusID'];

        $cost = ($_POST['cost']) && $_POST['cost'] !== '' ? $_POST['cost'] : $row['cost'];
        $complexity =($_POST['complexity']) && $_POST['complexity'] !== '' ? $_POST['complexity'] : $row['complexity'];
        $impact = ($_POST['impact']) && $_POST['impact'] !== '' ? $_POST['impact'] : $row['impact'];
        

        // Update the record in the database
        $sql = "UPDATE goal 
                SET goalTitle='$goalTitle', categoryID='$category', statusID='$status', cost='$cost',   
                        complexity='$complexity', impact='$impact', assessment_date='$today'
                WHERE goalID='$id'";
        mysqli_query($dbc, $sql);

        // Redirect to the view page
        header("Location:goals.php");
    }
    } else {
    // Log the error to a file or send it to a logging service
    error_log(mysqli_error($dbc));
    }

    // Close connection to the database
    mysqli_close($dbc);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Edit Goal</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="main.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>

         <!-- Hamburger Menu & Title -->
         <div class="header">
            <div class="hamburger-menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <h1 class="title">Edit Goal</h1>
        </div>

        <!-- Navigation bar -->
        <div class="nav">
            <ul>
                <li><a href="goals.php">Goals</a></li>
                <li><a href="assessments_history.php">Assessment History</a></li>
                <li><a href="create_assessment.php">Create New Assessment</a></li>
            </ul>
        </div>

        
        <!-- Form --> 
        <form class="form-action" method="post">
            <br><br><br>
            
            <!-- Title --> 
            <div class="input-group">
                <p>Title: </p>
                <input  class="input-field" type="text" name="goalTitle" value="<?php echo $row['goalTitle']; ?>">
            </div>
            
            <!-- Category --> 
            <p> Category: 
                <br>
                <select id="category" name="category" value="<?php echo $row['category']; ?>">               
                <option value="0">--Select Category--</option>
                <option value="1">Account Security</option>
                <option value="2">Device Security</option>
                <option value="3">Data Security</option>
                <option value="4">Governance and Training</option>
                <option value="5">Vulnerability Management</option>
                <option value="6">Supply Chain / Third Party</option>
                <option value="7">Response and Recovery</option>
                <option value="8">Other</option>
                </select>
            </p>
            
            <!-- Status --> 
            <p> Status: 
                <br>
                <select id="status" name="status" value="<?php echo $row['status']; ?>">                   
                <option value="0">--Select Status--</option>
                <option value="1">Not Started</option>
                <option value="2">Scoped</option>
                <option value="3">In Progress</option>
                <option value="4">Implemented</option>
                </select>
            </p>

            <!-- Cost --> 
            <p>Cost: 
                <br>
                <select id="cost" name="cost" value="<?php echo $row['cost']; ?>">
                <option value="0">--Select Cost--</option>
                <option value="1">$</option>
                <option value="2">$$</option>
                <option value="3">$$$</option>
                <option value="4">$$$$</option>
                </select>
            </p>
            
            <!-- Complexity --> 
            <p>Complexity: 
                <br>
                <select id="complexity" name="complexity" value="<?php echo $row['complexity']; ?>">
                <option value="0">--Select Complexity--</option>
                <option value="1">Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>
                </select>
            </p>

            <!-- Impact --> 
            <p>Impact: 
                <br>
                <select id="impact" name="impact" value="<?php echo $row['impact']; ?>">
                <option value="0">--Select Impact--</option>
                <option value="1">Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>
                </select>
            </p>
            
            <br>

            <p> <input class="submit-button" type="submit" name="submit" value="Save Changes">
             
            <!-- Back Button-->
             <form>
            <input class ="submit-button" value="Cancel" onclick="history.go(-1)"> 
            </form> </p>

        </form>
        <script>
            $(document).ready(function() {
                $(".hamburger-menu").click(function() {
                    $(".nav").slideToggle("fast");
                });
            });
        </script>
    </body>
</html>
