<?php
// NEED TO UPDATE SO THAT DROPDOWN DOESNT SET ALL STUFF UNCHANGED TO 0!

// Connect to the database
require_once('mysqli_connect.php');

// Get goalID from the url
$id = $_GET['goalID'];
if (!$id){
	echo "<script language='javascript'>window.alert('Error: returning to main page');window.location='goals.php';</script>";
}


			// PREVIOUS AND NEXT:
			// Get current ID from URL parameter
			$current_id = $_GET['goalID'];

			// Retrieve all goal IDs from the database
			$prev_next_sql = "SELECT goalID FROM goal";
			$prev_next_response = mysqli_query($dbc, $prev_next_sql);
			if (!$prev_next_response) {
			    die('Error retrieving goal IDs: ' . mysqli_error($dbc));
			}
			$id_array = array();

			while ($row = mysqli_fetch_assoc($prev_next_response)) {
			    $id_array[] = $row['goalID'];
			}

			// Find the index of the current ID in the array
			$current_index = array_search($current_id, $id_array);

			// Get the previous ID
			$previous_index = $current_index - 1;
			if ($previous_index < 0) {
			    $previous_id = $id_array[count($id_array) - 1]; // Wrap around to last ID if at beginning of array
			} else {
			    $previous_id = $id_array[$previous_index];
			}

			// Get the next ID
			$next_index = $current_index + 1;
			if ($next_index >= count($id_array)) {
			    $next_id = $id_array[0]; // Wrap around to first ID if at end of array
			} else {
			    $next_id = $id_array[$next_index];
			}




			// RECOMMENDED ACTION
			$recAct_sql =  "SELECT recAction_desc, IT_desc, OT_desc FROM recommendedaction
			 WHERE goalID = $id";
			$recAct_response = mysqli_query($dbc, $recAct_sql);
			if ($recAct_response) {
			  $row = mysqli_fetch_assoc($recAct_response);
			  $recommendedaction = $row['recAction_desc'];
			}
			 
			



// PRINT THE INFORMATION
$sql = "SELECT * FROM status_update su 
		RIGHT JOIN (
			SELECT g.goalID AS GoalID, g.goalTitle AS Title, c.category_desc AS Cat, 
			g.status_updateID, g.cost, g.impact, g.complexity, s.status_desc AS StatUpdate
			FROM goal g 
			LEFT JOIN category c ON g.categoryID = c.categoryID 
			LEFT JOIN status s ON g.status_updateID = s.statusID
		) AS gc ON su.stat_updateID = gc.StatUpdate 
		WHERE gc.goalID = $id";


$response = mysqli_query($dbc, $sql);

if ($response) {
  $row = mysqli_fetch_assoc($response);
	$title = $row['Title'];
	$cat = $row['Cat'];
	$cost = $row['cost'];
	$impact = $row['impact'];
	$complexity = $row['complexity'];
	$status = $row['StatUpdate'];
	

	if ($cost == 1)
		$cost = "$";
	elseif ($cost == 2)
		$cost = "$$";
	elseif ($cost == 3)
		$cost = "$$$";
	elseif ($cost == 4)
		$cost = "$$$$";
	
		
		
	if ($impact == 1)
		$impact = "Low";
	elseif ($impact == 2)
		$impact = "Medium";
	elseif ($impact == 3)
		$impact = "High";
	
		
	if ($complexity == 1)
		$complexity = "Low";
	elseif ($complexity == 2)
		$complexity = "Medium";
	elseif ($complexity == 3)
		$complexity = "High";
	
	
	
	$sql = "select * from risk r join goal_risk gr on r.riskID=gr.riskID where gr.goalID=$id;";
	$response = @mysqli_query($dbc, $sql);
    $risk="";       
    if($response){
        while($row = mysqli_fetch_array($response)){
			$risk.=$row['risk_desc'];
		}
	}
  }
 else {
  // Log the error to a file or send it to a logging service
  error_log(mysqli_error($dbc));
}

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Info</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="main.css">
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
            <h1 class="title">Info</h1>
        </div>
		
		
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Info</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="main.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <!-- Hamburger Menu & Title -->


        <!-- Navigation bar -->
        <div class="nav">
            <ul>
                <li><a href="goals.php">Goals</a></li>
                <li><a href="assessments.php">Assessment History</a></li>
            </ul>
        </div>
		
        <!-- Goal -->
		<div class="main">

			<div class="previous">
			  <a href="info.php?goalID=<?php echo $previous_id ?>">
			    <i class="fas fa-arrow-circle-left"></i>Previous Page
			  </a>
			</div>


			<div class="next">
  <a href="recommended-action.php?goalID=<?php echo $id; ?>">
    <i class="fas fa-list-ul"></i>Recommended Action
  </a>
</div>


			<div class="next">
			  <a href="info.php?goalID=<?php echo $next_id ?>">
			    <i class="fas fa-arrow-circle-right"></i>Next Page
			  </a>
			</div>


            <div class="Rectangle45">
                <p><b>Goal:</b> <?php echo $title; ?></p>
            </div>

        <!-- Category -->
            <div class="Rectangle46">
                <p><b>Category:</b> <?php echo $cat; ?></p>
            </div>
			
        <!-- Status -->
            <div class="Rectangle47">
                <p><b>Status: </b><?php echo $status; ?></p>
            </div>
       
		<!-- Cost -->
            <div class="Rectangle48">
                <p><b>Cost:</b> <?php echo $cost; ?></p>
            </div>
        
		<!-- Complexity -->
            <div class="Rectangle49">
                <p><b>Complexity:</b> <?php echo $complexity; ?></p>
            </div>
        
		<!-- Impact -->
            <div class="Rectangle50">
                <p><b>Impact: </b><?php echo $impact; ?></p>
            </div>
		
		<!-- Risks Addressed -->
            <div class="Rectangle51">
                <p><b>Risks Addressed:</b><br><?php echo $risk; ?></p>
            </div>
       
			 
			</div>


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
