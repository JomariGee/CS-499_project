        
<!-- PHP must be at top --> 
<?php
    //PHP that creates a new assessment

    require_once('mysqli_connect.php');

    //band-aid for warnings 
    error_reporting(E_ERROR | E_PARSE);

    // prepare the data for insertion
    $goalNum;
    $status;
    $assessment_date;  
    $note;
$newest=1;

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
		// find most recent update for goal
		require_once('mysqli_connect.php');

		// UPDATE goal_newest value
		$sql = "SELECT su1.stat_updateID as oldStatUpID, su1.statusID as oldStatID, su1.goalID as suGoal 
			FROM status_update su1 
			LEFT JOIN ( 
				(SELECT su.stat_updateID, su.goalID, su.goal_newest 
					FROM status_update su 
					where su.goalID=$goalNum) 
				as su2 ) 
			on su1.stat_updateID=su2.stat_updateID 
			where su2.goal_newest=1;";

		$response = mysqli_query($dbc, $sql);
			if($response){
				$row = mysqli_fetch_assoc($response);
				$old_newest_update=$row['oldStatUpID'];
				$old_status=$row['oldStatID'];
				
				//Status
				// update old stat_updateID
				if(isset($_POST['status']) && !empty($_POST['status'])){
					$status = $_POST['status'];
				}else{				
					$status=$old_status;
				}
				
				require_once('mysqli_connect.php');
				$query = "UPDATE status_update SET goal_newest = 0 WHERE stat_updateID=$old_newest_update; ";
				if (mysqli_query($dbc, $query)){
					
				}
				
				
			}else {
				// Log the error to a file or send it to a logging service
				error_log(mysqli_error($dbc));
			}
		
		    if(isset($_POST['status']) && !empty($_POST['status'])){
                    $status = $_POST['status'];
                }else{              
                    $status=1;
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
			// insert new update
			require_once('mysqli_connect.php');
            $query = "INSERT INTO status_update (goalID, statusID, update_date, goal_newest, notes) 
						values ($goalNum, $status, '$assessment_date', $newest, '$note'); ";
			mysqli_query($dbc, $query);
			// update goal info		

			require_once('mysqli_connect.php');
            $query = "UPDATE goal SET assessment_date = '$assessment_date', statusID = $status WHERE goalID=$goalNum; ";
			
			if (mysqli_query($dbc, $query)) {
				header('Location:assessment_history.php');
				
			}else {
				echo "Error: " . $query . "<br>" . $conn->error;
			}
			mysqli_close($dbc);
        } else {
            echo '<br /><br /><b>You need to select a goal and status!</b><br /><br />';
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
            <h1 class="title">Create New Assessment</h1>
        </div>


   <form action="create_assessment_successful.php" method="post">

            <!--Choose Goal-->
            <p>Goal: <br>
                <select id="goalNum" name="goalNum">   
                    <option value="0">--Select Goal--</option>
                <!-- LOOP FOR EACH GOAL -->
                    <?php

                        // Retrieve all goals and ids
                        $sql = "SELECT g.goalID, g.goalTitle 
                            FROM goal g;";


                        $response = mysqli_query($dbc, $sql);
                        if($response){
                            while($row = mysqli_fetch_assoc($response)){
                                $title = $row['goalTitle'];
                                $id = $row['goalID']; ?>
                        
                                <option value= "<?php echo $id; ?>"> <?php echo $title;?> </option>
                    <?php   }
                        }else {
                            
                        }
                       
                    ?>
                </select>
            </p>
            

            <!-- Choose Status -->
            <p>Status: <br>
                <select id="status" name="status">                      
                <option value="0">--Select Status--</option>
                    <!-- LOOP FOR EACH Status -->
                    <?php
                
                        $sql = "SELECT s.statusID, s.status_desc 
                            FROM status s;";


                        $response = mysqli_query($dbc, $sql);
                        if($response){
                            while($row = mysqli_fetch_assoc($response)){
                                $stat = $row['status_desc'];
                                $id = $row['statusID']; ?>
                        
                                <option value= "<?php echo $id; ?>"> <?php echo $stat;?> </option>
                    <?php   }
                        }else {
                            
                        }
                        
                    mysqli_close($dbc);
                    ?>
                </select>
            </p>

            <!--- Date Selection -->
            <p>Date:
            <input type="date" id="assessment_date" value="<?php echo date('Y-m-d'); ?>" />
            <p>


            <!-- Notes -->
            <p>Notes:
                <br><input class="input-field" type="text" name="note_desc" size="30" value="" />
            <p>

            <!-- Submit --> 
            <p> <input class="submit-button" type="submit" name="submit" value="Create New Assessment" /> 

            <!-- Back Button-->
            <form>
            <input class ="submit-button" value="Cancel" onclick="history.go(-1)"> 
            </form> </p>
        

     

    </body>
</html>
