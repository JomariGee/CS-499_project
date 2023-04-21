<!DOCTYPE html>
<html lang="en">
<!-- Page displays all assessments for all goals -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Assessment History </title>
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
            <h1 class="title">Assessment History</h1>
        </div>

        <!-- Navigation bar -->
        <div class="nav">
            <ul>
                <li><a href="goals.php">Goals</a></li>
                <li><a href="assessment_history.php">Assessment History</a></li>
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

        <!-- Parameters -->
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
                        <div class="goal-data-row">';
                        
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

