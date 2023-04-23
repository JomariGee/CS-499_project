        
<!-- PHP must be at top --> 
<?php
    //PHP that creates a new goal and generates new goal ID

    // prepare the data for insertion
    $goalTitle;
    $category = null;
    $status = 1;
    $cost = null;
    $complexity = null;
    $impact = null;
    $today;  

    if(isset($_POST['submit'])){
        // create array
        $data_missing = array();
        $today = date("Y-m-d");
        // add the Goal Title but make the input required
        if(empty($_POST['goalTitle'])){
            // if missing, add to the array
            $data_missing[] = 'goalTitle';
        }else{
            $goalTitle = ($_POST['goalTitle']);
        }

        // with the rest of the options, they are able to be left empty or unchanged
        if(isset($_POST['category']) && !empty($_POST['category'])){
            $category = $_POST['category'];
        }else{
            $category = null;
        }

        if(isset($_POST['cost']) && !empty($_POST['cost'])){
            $cost = $_POST['cost'];
        }else{
            $cost = null;
        }

        if(isset($_POST['complexity']) && !empty($_POST['complexity'])){
            $complexity = $_POST['complexity'];
        }else{
            $complexity = null;
        }

        if(isset($_POST['impact']) && !empty($_POST['impact'])){
            $impact = $_POST['impact'];
        }else{
            $impact = null;
        }



        if(empty($data_missing)){
            require_once('mysqli_connect.php');
            $query = "INSERT INTO goal (goalTitle, categoryID, statusID, cost, complexity, impact, assessment_date) VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($dbc, $query);

            mysqli_stmt_bind_param($stmt, 'sssssss', $goalTitle, $category, $status, $cost, $complexity, $impact, $today);
            mysqli_stmt_execute($stmt);
            $affected_rows = mysqli_stmt_affected_rows($stmt);
            if($affected_rows == 1){
                header('Location:goals.php');
                exit;
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
                } else {
                echo 'Error Occurred<br />';
                echo mysqli_error($dbc);
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
            }
        } else {

            echo '<br /><br /><b>You need to enter the Title!</b><br /><br />';

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Goals</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="main.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>

        <!-- Hamburger Menu & Title -->
        <div class="header">
            <h1 class="title">Create New Goal</h1>
        </div>

        <!-- Form --> 
        <form action="create_goal_successful.php" method="post">
            <!-- Title --> 
            <p>Title: 
                <br><input class ="input-field" input type="text" name="goalTitle" size="30" value="" />
            </p>

            <!-- Category --> 
            <p>Category: 
                <br>
                <select id="category" name="category">                      
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
            
            <!-- Cost --> 
            <p>Cost: 
                <br>
                <select id="cost" name="cost"> 
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
                <select id="complexity" name="complexity"> 
                <option value="0">--Select Complexity--</option>
                <option value="1">Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>

                </select>
            </p>
            
            <!-- Impact --> 
            <p>Impact: 
                <br>
                <select id="impact" name="impact"> 
                <option value="0">--Select Impact--</option>
                <option value="1">Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>
                </select>
            </p>

            <!-- Submit --> 
            <p> <input class="submit-button" type="submit" name="submit" value="Create New Goal" /> 

            <!-- Back Button-->
            <form>
            <input class ="submit-button" value="Cancel" onclick="history.go(-1)"> 
            </form> </p>
    </body>
</html>
