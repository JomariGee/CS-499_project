<!-- PHP must be at top --> 
<?php
    //PHP that creates a new goal and generates new goal ID

require_once('mysqli_connect.php');
    // prepare the data for insertion
    $goalTitle;
    $category = null;
    $status = 1;
    $cost = null;
    $complexity = null;
    $impact = null;
    $today;  
    $recAction_desc = null;
    $risk_desc = null;
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

        if (empty($_POST['recAct'])) {
            $recAction_desc = null;
        } else {
            $recAction_desc = $_POST['recAct'];
        }




    if(empty($data_missing)){
        
        // INSERT INTO the goal table
        $goal_query = "INSERT INTO goal (goalTitle, categoryID, statusID, cost, complexity, impact, assessment_date) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $goal_stmt = mysqli_prepare($dbc, $goal_query);
        mysqli_stmt_bind_param($goal_stmt, 'sssssss', $goalTitle, $category, $status, $cost, $complexity, $impact, $today);
        mysqli_stmt_execute($goal_stmt);
        $goal_id = mysqli_insert_id($dbc); // get the auto-incremented goal ID
        
        // INSERT INTO the risk table
         if (!empty($_POST['risk'])) {
            $risk_desc = $_POST['risk'];
            $risk_query = "INSERT INTO risk (risk_desc) VALUES (?)";
            $risk_stmt = mysqli_prepare($dbc, $risk_query);
            mysqli_stmt_bind_param($risk_stmt, 's', $risk_desc);
            mysqli_stmt_execute($risk_stmt);
            $risk_id = mysqli_insert_id($dbc);

            $goal_risk_query = "INSERT INTO goal_risk (goalID, riskID) VALUES (?, ?)";
            $goal_risk_stmt_insert = mysqli_prepare($dbc, $goal_risk_query);
            mysqli_stmt_bind_param($goal_risk_stmt_insert, 'ss', $goal_id, $risk_id);
            mysqli_stmt_execute($goal_risk_stmt_insert);
            $goal_risk_id = mysqli_insert_id($dbc);
        }

        
        // INSERT INTO the recommended_action table
        if (!empty($_POST['recAct'])) {
            $recAction_desc = $_POST['recAct'];
            $rec_query = "INSERT INTO recommendedaction (recAction_desc, goalID) VALUES (?, ?)";
            $rec_stmt_insert = mysqli_prepare($dbc, $rec_query);
            mysqli_stmt_bind_param($rec_stmt_insert, 'ss', $recAction_desc, $goal_id);
            mysqli_stmt_execute($rec_stmt_insert);
            $rec_id = mysqli_insert_id($dbc);
        }
        
        mysqli_stmt_close($goal_stmt);

        if (isset($risk_stmt)) {
            mysqli_stmt_close($risk_stmt);
        }

        
        if (isset($rec_stmt_insert)) {
            mysqli_stmt_close($rec_stmt_insert);
        }

        
        header('Location:goals.php');
        exit;
                } else {
                echo '<br /><br /><b>You need to enter the Title!</b><br /><br />';
                echo mysqli_error($dbc);
                mysqli_close($dbc);
            }
        } else {

            echo '<br /><br /><b>You need to enter the Title!</b><br /><br />';

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

            <p>Risks Addressed: <br>
                <input class ="input-field" input type="text" name="risk" size="30" value="" />
            </p>

            <p>Recommended Action: 
                <br><input class ="input-field" input type="text" name="recAct" size="30" value="" />
            </p>

            <!-- Submit --> 
            <p> <input class="submit-button" type="submit" name="submit" value="Create New Goal" /> 

            <!-- Back Button-->
            <form>
            <input class="submit-button-cancel" value="Cancel" onclick="history.go(-1)"> 
            </form> </p>
    </body>
</html>
