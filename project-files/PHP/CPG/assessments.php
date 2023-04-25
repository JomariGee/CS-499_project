<!DOCTYPE html>
<html lang="en">
<!-- Page displays assessments for specific goals -->
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Assessments For Goal: </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="main.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>

        <?php
        // Get a connection for the database
        require_once('mysqli_connect.php');
        $id = $_GET['goalID'];

        // Create a query to retrieve the goal title
        $title_query = "SELECT goalTitle FROM goal WHERE goalID = $id";

        // Execute the query and retrieve the goal title
        if ($title_response = mysqli_query($dbc, $title_query)) {
            $title_row = mysqli_fetch_array($title_response);
            $title = $title_row['goalTitle'];
        }

        ?>
    
        <!-- Hamburger Menu & Title -->
        <div class="header">
            <div class="hamburger-menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <p class="title"><?php  echo $title; ?> Assessments</p>
        </div>

        <!-- Navigation bar -->
        <div class="nav">
            <ul>
                <li><a href="goals.php">Goals</a></li>
                <li><a href="assessment_history.php">Assessment History</a></li>
                <li><a href="create_assessment.php">Create New Assessment</a></li>
            </ul>
        </div>

        <br>

        <!-- Parameters -->
            <div class="ParametersRectangle">
                <p class=" goal">Date</p>
                <p class="last-assessment">Status</p>
                <p class="status">Notes</p>
            </div>

<?php
    // Get a connection for the database
    require_once('mysqli_connect.php');
    $id = $_GET['goalID'];

    // Create a query for the database

    $query = "SELECT 
              ups.stat_updateID AS id, 
              ups.update_date AS Date, 
              ups.goalID AS goalID, 
              g.goalTitle AS Goal, 
              ups.statusID, 
              s.status_desc AS Stat, 
              ups.notes AS Note
          FROM 
              status s 
              RIGHT JOIN (
                  SELECT 
                      su.update_date, 
                      su.goalID AS goalID, 
                      su.statusID, 
                      su.stat_updateID, 
                      su.notes 
                  FROM 
                      status_update su
              ) AS ups ON s.statusID = ups.statusID 
              LEFT JOIN goal g ON ups.goalID = g.goalID
          WHERE 
              ups.goalID = $id";


    // If the query executed properly proceed
    $response = @mysqli_query($dbc, $query);

        
    if($response){
        echo '<table align="center"
        cellspacing="0" cellpadding="20">';
        
        echo '<tbody>';
        
        while($row = mysqli_fetch_array($response)){
            $status= $row['Stat'];
                if ($status == "Not Started")
	                $status_color="GREY";
	        elseif ($status == "Scoped")
		        $status_color="#FDDA0D";
		elseif ($status == "In Progress") 
			$status_color="ORANGE";
		elseif ($status == "Implemented")
			$status_color="GREEN";
                
            echo '<tr>';
            echo '<td>' . $row['Date'] . '</td>';
            echo '<td><font color=' .$status_color. '>' .$status. '</font></td>';
            echo '<td>' . $row['Note'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';

    } else {
        echo "Couldn't issue database query<br />";
        echo mysqli_error($dbc);
    }
    // Close connection to the database
    mysqli_close($dbc);
?>

<br>
    <a href="assessment_history.php">
    <button type="submit" input class="submit-button">Return to Assessment History</button>
    </a>
<br>
	<a href="info.php?goalID=<?php echo $id; ?>">
    		<button type="submit" input class="submit-button">Return to Goal Information</button>
    	</a>

        <!-- Hamburger Menu animation -->
        <script>
            $(document).ready(function() {
                $(".hamburger-menu").click(function() {
                    $(".nav").slideToggle("fast");
                });
            });

            // add a click event listener to the link
            document.getElementById('recommended-action-link').addEventListener('click', function() {
            // show or hide the recommended action depending on its current display status
            var recAction = document.getElementById('recommended-action');
                if (recAction.style.display === 'none') {
                  recAction.style.display = 'block';
                } else {
                  recAction.style.display = 'none';
                }
              });
        </script>
    </body>
</html>
