<?php
    // Connect to the database
    require_once('mysqli_connect.php');
    $id = $_GET['assessmentID'];
    $sql = "SELECT * FROM status_update WHERE stat_updateID = $id";
    $response = mysqli_query($dbc, $sql);

    if ($response) {
    $row = mysqli_fetch_assoc($response);
    if (isset($_POST['submit'])) {
		$notes="";
		$notes .=$row['notes'];
		$notes .=$_POST['note'];

        // Get the updated values or use existing values if input fields are empty
        $goalID = isset($_POST['goalID']) && $_POST['goalID'] !== '' ? $_POST['goalID'] : $row['goalID'];

        
        $status = ($_POST['status']) && $_POST['status'] !== '' ? $_POST['status'] : $row['statusID'];
		$update_date = ($_POST['update_date']) && $_POST['update_date'] !== '' ? $_POST['update_date'] : $row['update_date'];
        
        // Update the record in the database
        $sql = "UPDATE status_update 
                SET goalID='$goalID', statusID='$status', update_date='$update_date', notes='$notes'   
                        WHERE stat_updateID='$id'";
        mysqli_query($dbc, $sql);

        // Redirect to the view page
        header("Location:assessment_history.php");
    }
    } else {
    // Log the error to a file or send it to a logging service
    error_log(mysqli_error($dbc));
    }

    // Close connection to the database
    //mysqli_close($dbc);
?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Edit Assessment</title>
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
            <h1 class="title">Edit Assessment</h1>
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
			
			<?php 
			// Connect to the database
			require_once('mysqli_connect.php');
			$id = $_GET['stat_updateID'];
			$sql = "SELECT s1.stat_updateID, s1.status_desc, g.goalTitle 
					FROM goal g 
					right join 
						(SELECT su.stat_updateID, s.status_desc, su.goalID 
						FROM status_update su 
							join status s 
							on su.statusID=s.statusID) 
						as s1 
					on s1.goalID=g.goalID 
					where s1.stat_updateID=1;";
			$response = mysqli_query($dbc, $sql);

			if ($response) {
			$row = mysqli_fetch_assoc($response);
			$title = $row['goalTitle'];
			$stat_desc = $row['status_desc'];
			}else {
                // Log the error to a file or send it to a logging service
                error_log(mysqli_error($dbc));
            }
			
			?>
            
            
			<!--Choose Goal-->
            <p>Goal: <br>
                <select id="goalID" name="goalID">   
                    <option value="0"><?php echo $title; ?></option>
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
                        
                    ?>
                </select>
            </p>
            
            <!-- Status --> 
            <p> Status: 
                <br>
                <select id="status" name="status" value="<?php echo $row['status']; ?>">                   
                <option value="0"><?php echo $stat_desc; ?></option>
                <option value="1">Not Started</option>
                <option value="2">Scoped</option>
                <option value="3">In Progress</option>
                <option value="4">Implemented</option>
                </select>
            </p>

			<div class="date-container">
                <label for="assessment_date">Date:</label>
                <input class="datepicker" type="date" id="assessment_date" value="<?php echo date('Y-m-d'); ?>" />
            </div>

            <!-- Notes -->
            <p>Notes:
                <br><input class="input-field-notes" type="text" name="note" size="30" value="" />
            <p>
            
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
