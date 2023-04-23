<?php
// NEED TO EXECUTE database_backup.sql WITH SCHEMA "cpg" ! 
// info.php page lindsey uploaded 4/19/23

// Connect to the database
require_once('mysqli_connect.php');
$id = $_GET['goalID'];
if (!$id){
	echo "<script language='javascript'>window.alert('Your Message');window.location='http://localhost/CS499/goals.php';</script>";
}
$sql = "select * from status_update su 
	right join 
	(select g.goalID as GoalID, g.goalTitle as Title, c.category_desc as Cat, 
	g.status_updateID as StatUpdate, g.cost, g.impact, g.complexity 
	from goal g 
	left join category c 
	on g.categoryID=c.categoryID ) 
	AS gc 
	on su.stat_updateID=gc.StatUpdate 
	where gc.goalID=$id";
$response = mysqli_query($dbc, $sql);

if ($response) {
  $row = mysqli_fetch_assoc($response);
	$title = $row['Title'];
	$cat = $row['Cat'];
	$cost = $row['cost'];
	$impact = $row['impact'];
	$complexity = $row['complexity'];
	$status = $row['statusID'];
	
	if ($cost == 0)
		$cost = "$";
	elseif ($cost == 1)
		$cost = "$$";
	elseif ($cost == 2)
		$cost = "$$$";
		
	if ($impact == 0)
		$impact = "Low";
	elseif ($impact == 1)
		$impact = "Medium";
	elseif ($impact == 2)
		$impact = "High";
		
	if ($complexity == 0)
		$complexity = "Low";
	elseif ($complexity == 1)
		$complexity = "Medium";
	elseif ($complexity == 2)
		$complexity = "High";

	if ($status == 1)
		$status = "Not Started";
	elseif ($status == 2)
		$status = "Scoped";
	elseif ($status == 3)
		$status = "In Progress";
	elseif ($status == 4)
		$status = "Implemented";
	
	$sql = "select * from risk r join goal_risk gr on r.riskID=gr.riskID where gr.goalID=$id;";
	$response = @mysqli_query($dbc, $sql);
    $risk="";
	$str='<br>';
    if($response){
        while($row = mysqli_fetch_array($response)){
			$risk.=$str;
			$risk.=$row['risk_desc'];
		}
	}

    // Redirect to the view page
    //header("Location:goals.php");
  }
 else {
  // Log the error to a file or send it to a logging service
  error_log(mysqli_error($dbc));
}

// Close connection to the database
mysqli_close($dbc);
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

        <!-- Navigation bar -->
        <div class="nav">
            <ul>
                <li><a href="goals.php">Goals</a></li>
                <li><a href="info.php">Info</a></li>
                <li><a href="recommended-action.html">Recommended Action</a></li>
                <li><a href="assessments.php">Assessment History</a></li>
            </ul>
        </div>
		
        <!-- Goal -->
		<div class="main">
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
                <p><b>Risks Addressed:</b><?php echo $risk; ?></p>
            </div>
		
		<!-- Hamburger Menu animation -->
        <script>
            $(document).ready(function() {
                $(".hamburger-menu").click(function() {
                    $(".nav").slideToggle("fast");
                });
            });
        </script>

    </body>
</html>