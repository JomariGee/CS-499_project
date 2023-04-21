<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Info </title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="main.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
		<style>
			/**************************************************************
                    Entire Page
***************************************************************/
body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .title {
        font-size: 40px;
    }
    /* Header */
        .header {
            width: 100%;
            height: 60px;
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .header h1 {
            margin: 0;
            padding: 0;
        }

    /* Menu */
        /* Hamburger Menu */
            .hamburger-menu {
                position: absolute;
                left: 10px;
                display: flex;
                flex-direction: column;
                cursor: pointer;
                z-index: 1;
            }

            .hamburger-menu div {
                width: 25px;
                height: 3px;
                background-color: #333;
                margin: 5px 0;
            }
        /* Navigation */
        .nav {
            display: none;
            position: absolute;
            top: 60px;
            left: 0;
            background-color: #f1f1f1;
            width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .nav ul {
            list-style: none;        
            padding: 0;
            margin: 0;
        }
        .nav ul li {
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        .nav ul li:hover {
            background-color: #ddd;
            cursor: pointer;
        }
/**************************************************************
                    Page Elements
***************************************************************/
    a {
        text-decoration: none;
    }
        a:visited{
            color: black;
        }
    a i {
        color: black;
    }

    .icon {
        width: 24px;
        height: 24px;
        background-color: #888;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .main {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
        padding-top: 10px;
    }

/**************************************************************
                    Commonalities
***************************************************************/  
/* Parameters Group */ 
    .ParametersGroup {
        width: 1304.80px;
        height: 71px;
        padding-top: 90px;
    }

    .ParametersRectangle {
        width: 1150px;
        height: 71px;
        padding-top: 17px;
        padding-bottom: 23px;
        padding-left: 117px;
        padding-right: 46px;
        background-color: rgba(217, 217, 217, 1);
        border-radius: 7px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }

    .ParametersRectangle p {
        font-size: 29px;
        line-height: 100%;
        text-align: center;
        color: black;
        flex: 1;
    
    }
/**************************************************************
                Goal Page
***************************************************************/
    /* Goal row */
        .goal-data-row {
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            width: 1304.80px;
            gap: 14px;
            padding-top: 40px;
            padding-bottom: 15px;
            border-bottom: 3px solid #ccc;
        }
    
        .goal-data-row p {
            text-align: center;
            font-size: 1.25rem;
        }
    /* Importing & Sorting */
        .rectangle {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 200px;
            height: 100px;
            background-color: #ccc;
            border-radius: 5px;
            margin-right: 20px;
        }
    
            .rectangle h2 {
                margin: 0;
                padding: 0;
            }
    
            .rectangle .icon {
                font-size: 48px;
                margin-bottom: 10px;
            }
            .rectangle .fa {
                font-size: 36px;
                color: #3a3939;
            }
    /* Parameters */
        .goal {
            flex-basis: 30%;
        }

        .last-assessment {
            flex-basis: 15%;
        }

        .status {
            flex-basis: 20%;
        }

        .goal-actions {
            flex-basis: 15%;
        }
    /* Filter */
        .Filter {
            width: 100.17px;
            font-size: 29px;
            line-height: 100%;
            text-align: center;
            color: black;
        }
        .FilterGroup {
            width: 1304.80px;
            height: 68px;
            flex-direction: row;
            padding-top: 10px;
        }
    
        .Filter-DividingLine {
            width: 1304.80px;
            height: 5px;
            background-color: black;
            border-radius: 8px;
        }
    
        .Spacing {
            height: 11.50px;
        } 
    /* PHP Code */
        td {
            align-items: center;
            justify-content: space-between;
            width: 1304.80px;
            gap: 14px;
            padding-top: 10px;
            border-bottom: 3px solid #ccc;
            text-align: center;
            font-size: 1.25rem;
        }
/**************************************************************
                Assessment Page 
***************************************************************/
    .assessment-date {
        flex-basis: 39%;
    }
    .not-started {
        flex-basis: 5%;  /* Might need to be zero */
    }
    .assessment-status {
        flex-basis: 25%;
    }
    .assessment-actions {
        flex-basis: 25%;
    }
    /* User Data */
    .assessment-data-row {
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        width: 1304.80px;
        gap: 14px;
        padding-top: 5px;
        padding-bottom: 5px;
        border-bottom: 3px solid #ccc;
    }

    .assessment-data-row p {
        text-align: center;
        font-size: 1.25rem;
    }

    .action-item {
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        gap: 0.625rem;
        padding-top: 50px;
        
    }

    .action-item .fa {
        font-size: 28px;
    }
		</style>
		<!-- PHP must execute first --> 
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
		
        <!-- Hamburger Menu & Title -->
        <div class="header">
            <div class="hamburger-menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <h1 class="title"><?php echo $title; ?></h1>
        </div>
		
        <!-- Information -->
		<div class="main">

		    <div class="Rectangle45">
                <p>Details</p>
            </div>
			<!-- Navigation Actions --> 
				<div class="previous">
					<a href="info.php?goalID=<?php echo $previous_id ?>">
						<i class="fas fa-arrow-circle-left"></i>Previous Goal
					</a>
				</div>

				<div class="next">
					<a href="recommended-action.php?goalID=<?php echo $id; ?>">
						<i class="fas fa-list-ul"></i>Recommended Action
					</a>
				</div>

				<div class="next">
					<a href="info.php?goalID=<?php echo $next_id ?>">
						Next Goal<i class="fas fa-arrow-circle-right"></i>
					</a>
				</div>

			<!-- Information --> 

				<!-- Title --> 
				<div class="Rectangle45">
					<?php echo $title; ?></p>
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

