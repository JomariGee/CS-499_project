        
<!-- PHP must be at top --> 
<?php
    //PHP that creates a new goal and generates new goal ID

    // prepare the data for insertion
    $goalNum;
    $status;
    $assessment_date;  
	$note_desc = NULL;

    if(isset($_POST['submit'])){
        // create array
        $data_missing = array();

        // Goal
		// add the Goal Title but make the input required
        if(empty($_POST['goalNum'])){
            // if missing, add to the array
            $data_missing[] = 'goalNum';
        }else{
            $goalNum = ($_POST['goalNum']);
        }

        // with the rest of the options, they are able to be left unchanged

0		//Status
    0    if(isset($_POST['status']) && !empty($_POST['status'])){
 9           $status = $_POST['status'];
 0       }else{
			// NEED TO UPDATE SO THAT DROPDOWN DOESNT SET ALL STUFF UNCHANGED TO 0!

			// Connect to the database
			require_once('mysqli_connect.php');

			// Retrieve all goals and ids
			$sql = "SELECT g.goalID, g.goalTitle 
							FROM goal g;";


						$response = mysqli_query($dbc, $sql);
						if($response){
							while($row = mysqli_fetch_assoc($response)){
								$title = $row['goalTitle'];
								$id = $row['goalID']; ?>
						
								<option value= "<?php echo $id; ?>"> <?php echo $title;?> </option>
					<?php	}
						}else {
							// Log the error to a file or send it to a logging service
							error_log(mysqli_error($dbc));
						}
						// Close connection to the database
						//mysqli_close($dbc);
	 
	 
	 
 0           // instead of null, set the status to same as before assessment
 0           $status = 1;
        }
		
		//Assessment Date
		if(isset($_POST['assessment_date']) && !empty($_POST['assessment_date'])){
 9           $assessment_date = $_POST['assessment_date'];
 0       }else{
 0           // instead of null, set the date to today
 0           $assessment_date = date("m/d/y");
        }

        if(isset($_POST['note_desc']) && !empty($_POST['note_desc'])){
            $note = $_POST['note_desc'];
        }else{
            $note = null;
        }


        if(empty($data_missing)){
            require_once('mysqli_connect.php');
            $query = "INSERT INTO goal (goalTitle, categoryID, status_updateID, cost, complexity, impact, assessment_date) VALUES (?, ?, ?, ?, ?, ?, ?)";

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
                <br><input type="text" name="goalTitle" size="30" value="" />
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

            <!-- Status --> 
            <p>Status: 
                <br>
                <select id="status" name="status">                      
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

            <p> <input type="submit" name="submit" value="Create New Goal" /> </p>
        </form>
    </body>
</html>
