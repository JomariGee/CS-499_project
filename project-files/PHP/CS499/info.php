<?php
// NEED TO UPDATE SO THAT DROPDOWN DOESNT SET ALL STUFF UNCHANGED TO 0!

// Connect to the database
require_once('mysqli_connect.php');
$id = $_GET['goalID'];
$sql = "select * from status_update su right join 
	(select g.goalID as GoalID, g.goalTitle as Title, c.category_desc as Cat, g.status_updateID, g.cost, g.impact, g.complexity as StatUpdate 
	from goal g left join category c on g.categoryID=c.categoryID) AS gc 
	on su.stat_updateID=gc.StatUpdate where gc.GoalID=$id;";
$response = mysqli_query($dbc, $sql);
/*CREATE TABLE `goal` (
  `goalID` int(11) NOT NULL AUTO_INCREMENT,
  `goalTitle` varchar(255) DEFAULT NULL,
  `status_updateID` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `impact` int(11) DEFAULT NULL,
  `complexity` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `csf` varchar(255) DEFAULT NULL,
  `assessment_date` varchar(50) DEFAULT NULL, 
  PRIMARY KEY (goalID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
*/
if ($response) {
  $row = mysqli_fetch_assoc($response);
	$title = $row['Title'];


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
                <li><a href="goals.html">Goals</a></li>
                <li><a href="info.html">Info</a></li>
                <li><a href="recommended-action.html">Recommended Action</a></li>
                <li><a href="assessments.html">Assessment History</a></li>
            </ul>
        </div>
		
      
        <!-- Goal -->
		<div class="main">
            <div class="Rectangle45">
                <p>Goal:</p>
            </div>
			
		<!-- Category -->
            <div class="Rectangle46">
                <p>Category:</p>
            </div>
			
        <!-- Status -->
            <div class="Rectangle47">
                <p>Status:</p>
            </div>
       
		<!-- Cost -->
            <div class="Rectangle48">
                <p>Cost:</p>
            </div>
        
		<!-- Complexity -->
            <div class="Rectangle49">
                <p>Complexity:</p>
            </div>
        
		<!-- Impact -->
            <div class="Rectangle50">
                <p>Impact:</p>
            </div>
		
		<!-- Risks Addressed -->
            <div class="Rectangle51">
                <p>Risks Addressed:</p>
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