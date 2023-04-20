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
    <style>

        body {
            
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    
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
    
        .title {
            font-size: 40px;
        }
    
        /* Menu */
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
        a {
            text-decoration: none;
        }
            a:visited{
                color: #303030;
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
    
        .main {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            padding-top: 10px;
        }
    
        /* Importing * Sorting */
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
    
        .icon {
            width: 24px;
            height: 24px;
            background-color: #888;
            border-radius: 50%;
            margin-bottom: 10px;
        }
    
        /* Filter */
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
    
        .Filter {
            width: 100.17px;
            font-size: 29px;
            line-height: 100%;
            text-align: center;
            color: black;
        }
    
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

            /* Goals Page*/
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
            /* Assessment History Page */
            .assessment-date {
                flex-basis: 45%;
            }
            .not-started {
                flex-basis: 5%;
            }
            .assessment-status {
                flex-basis: 25%;
            }
            .assessment-actions {
                flex-basis: 35%;
            }

    
        /* User Data */
        .data-row {
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            width: 1304.80px;
            gap: 14px;
            padding-top: 40px;
            border-bottom: 3px solid #ccc;
        }
    
        .data-row p {
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
    
    </style>
    <body>


        <!-- Hamburger Menu & Title -->
        <div class="header">
            <div class="hamburger-menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <h1 class="title">Goal</h1>
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

        <!-- Importation & New Goal creation -->
        <div class="main">
            <div class="rectangle">
                <i class="fa fa-file-import"></i> 
                <h2>Import</h2>
            </div>
            <a href="create_goal.php">
            <div class="rectangle">
                
                <i class="fa fa-file-circle-plus"></i> 
                <h2>New Goals</h2>
                

            </div>
            </a>
        </div>
    
        <!-- Filters -->
        <div class="FilterGroup">
            <div class="Spacing"></div>
            <div class="Filter-DividingLine"></div>
            <div class="Spacing"></div>
            <p class="Filter">Filters:</p>
            <div class="Spacing"></div>
            <div class="Filter-DividingLine"></div>
        </div>

        <div class="ParametersGroup">
            <div class="ParametersRectangle">
                <p class=" goal">Goal</p>
                <p class="last-assessment">Last Assessment</p>
                <p class="status">Status</p>
                <p class="actions">Actions</p>
            </div>
        </div>
                    


        
        <!-- Information Parameters -->
        <?php
        // Get a connection for the database
        require_once('mysqli_connect.php');


        // Create a query for the database
        $query =   "SELECT goal.goalTitle AS Goal,
                    goal.assessment_date AS LastAssessment,
                    goal.goalID AS GoalID,
                    status.status_desc AS Status
                    FROM goal 
                    INNER JOIN status ON goal.status_updateID=status.statusID";


        // If the query executed properly proceed
        $response = @mysqli_query($dbc, $query);
        
                            
                if($response){
                    echo '<table align="center"
                    cellspacing="0" cellpadding="8">
                    <div class="data-row">';
                    
                    while($row = mysqli_fetch_array($response)){
                        $id = $row['GoalID'];
						$title = $row["Goal"];
						$last = $row["LastAssessment"];
						$status = $row["Status"];


                        echo '<tr><td align="center"><a href="info.php?goalID=' .$id. '">' .$title. '</a></td>
						<td align="center">' .$last. '</td>
						<td align="center">' .$status. '</td>' . '<td align="center">
                        
                            <div class="action-item">
                                <a href="edit_goal.php?goalID=' . $id . '">
                                    <i class="fa fa-pen-to-square"></i> 
                                    <p>Edit</p>
                                </a>
                            </div>

                            
                            &nbsp;&nbsp;&nbsp;

                            <div class="action-item">
                                <a href="delete_goal.php?goalID=' . $id . '">
                                    <i class="fa fa-trash"></i> 
                                    <p>Remove</p>
                                </a>
                            </div>
                
                            &nbsp;&nbsp;&nbsp;
                            <div class="action-item">
                            <a href="export_goal.php?goalID=' . $id . '">
                                <i class="fa fa-download"></i> 
                                <p>Export</p>
                                </a>
                            </div>
                            
                           
                            </td>
                            </tr>
                        ' ;
                        echo '</tr>';
                        
                    }echo '</div></table>'
                    ;
                

                } else {
                    echo "Couldn't issue database query<br />";
                    echo mysqli_error($dbc);
                }
                    // Close connection to the database
                    mysqli_close($dbc);
                ?>

            </div>
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

