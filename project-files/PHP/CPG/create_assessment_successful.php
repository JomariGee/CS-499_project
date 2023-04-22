        
<!-- PHP must be at top --> 
<?php
    //PHP that creates a new goal and generates new goal ID

    // prepare the data for insertion
    $goalNum;
    $status;
    $assessment_date;  
	$note;

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

		//Status
        if(isset($_POST['status']) && !empty($_POST['status'])){
            $status = $_POST['status'];
			$newest_status = 1;
			
        }else{				
			// Connect to the database
			require_once('mysqli_connect.php');

			// Retrieve all goals and ids
			$sql = "SELECT g.goalID, su.stat_updateID, su.statusID 
						FROM goal g 
						LEFT JOIN status_update su 
						on g.status_updateID=su.stat_updateID where g.goalID=$goalNum;";

			$response = mysqli_query($dbc, $sql);
			if($response){
				$status = $row['statusID'];
			}
			$newest_status = 0;
        }
		
		//Assessment Date
		if(isset($_POST['assessment_date']) && !empty($_POST['assessment_date'])){
            $assessment_date = $_POST['assessment_date'];
        }else{
            // instead of null, set the date to today
            $assessment_date = date("Y-m-d");
        }

        if(isset($_POST['note_desc']) && !empty($_POST['note_desc'])){
            $note = ($_POST['note_desc']);
			echo $note;
		}

        if(empty($data_missing)){
			require_once('mysqli_connect.php');
            $query = "INSERT INTO status_update (goalID, statusID, update_date) 
						values ($goalNum, $status, '$assessment_date'); ";
			if(!empty($_POST['note_desc'])){
				$sql="INSERT INTO notes (note_desc, goalID) 
						values ('$note', $goalNum);";
				mysqli_query($dbc, $sql);
			}

			
			if (mysqli_query($dbc, $query)) {
				echo "<script language='javascript'>window.alert('New record created successfully');window.location='create_assessment.php';</script>";
			}else {
				echo "Error: " . $query . "<br>" . $conn->error;
			}
			mysqli_close($dbc);
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
        <title> Assessments </title>
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
            <h1 class="title">Create New Assessment</h1>
        </div>

        <!-- Navigation bar --
        <div class="nav">
            <ul>
                <li><a href="goals.php">Goals</a></li>
                <li><a href="assessment_history.php">Assessment History</a></li>
            </ul>
        </div>
        <br><br><br> -->


   <form action="create_assessment_successful.php" method="post">

			<!--Choose Goal-->
			<p>Goal: <br>
                <select id="goalNum" name="goalNum">   
					<option value="0">--Select Goal--</option>
				<!-- LOOP FOR EACH GOAL -->
					<?php
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
					?>
                </select>
            </p>
			

            <!-- Choose Status -->
            <p>Status: <br>
                <select id="status" name="status">                      
                <option value="0">--Select Status--</option>
					<!-- LOOP FOR EACH Status -->
					<?php
						// NEED TO UPDATE SO THAT DROPDOWN DOESNT SET ALL STUFF UNCHANGED TO 0!

						// Connect to the database
						require_once('mysqli_connect.php');

						// Retrieve all goals and ids
						$sql = "SELECT s.statusID, s.status_desc 
							FROM status s;";


						$response = mysqli_query($dbc, $sql);
						if($response){
							while($row = mysqli_fetch_assoc($response)){
								$stat = $row['status_desc'];
								$id = $row['statusID']; ?>
						
								<option value= "<?php echo $id; ?>"> <?php echo $stat;?> </option>
					<?php	}
						}else {
							// Log the error to a file or send it to a logging service
							error_log(mysqli_error($dbc));
						}
						// Close connection to the database
						//mysqli_close($dbc);
					?>
                </select>
            </p>

            <!--- Date Selection -->
            <p>Date:
            <input type="date" id="assessment_date" value="<?php echo date('Y-m-d'); ?>" />
            <p>


            <!-- Notes -->
            <p>Notes:
                <br><type="text" name="note_desc" size="30" value="" />
            <p>

            <p> <input type="submit" name="submit" value="Create New Assessment" /> </p>
        </form>
     
   <!-- PHP database code --> 
   
   <?php
            // Get a connection for the database
            require_once('mysqli_connect.php');

            // Close connection to the database
            mysqli_close($dbc);
        ?> 

    </body>
</html>

