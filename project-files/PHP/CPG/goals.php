<!-- 

Need to do:
    - date filter after figuring it out
    - import (maybe)

After date filter is done need to decide where to 
store create date vs assessment date with the goals.

 -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Goals </title>
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
            <h1 class="title">Goal</h1>
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

            <form class="filter-form">
                <p class="Filter"><br>Filter:</p>

                <div class="filter-form-column">
                    <select id="category" name="category">                      
                        <option value="0">--Select Category--</option>
                        <option value="1">Account Security</option>
                        <option value="2">Device Security</option>
                        <option value="3">Data Security</option>
                        <option value="4">Governance and Training</option>
                        <option value="5">Vulnerability Management</option>
                        <option value="6">Supply Chain / Third Party</option>
                        <option value="7">Response and Recovery</option>
                        <option value="8">Other</option>
                    </select>
                    &nbsp;
                    
                    <select id="status" name="status">                      
                        <option value="0">--Select Status--</option>
                        <option value="1">Not Started</option>
                        <option value="2">Scoped</option>
                        <option value="3">In Progress</option>
                        <option value="4">Implemented</option>
                    </select>
                    &nbsp;

                    <select id="cost" name="cost"> 
                        <option value="0">--Select Cost--</option>
                        <option value="1">$</option>
                        <option value="2">$$</option>
                        <option value="3">$$$</option>
                        <option value="4">$$$$</option>
                    </select>
                </div>


                <div class="filter-form-column">
                    <select id="complexity" name="complexity"> 
                        <option value="0">--Select Complexity--</option>
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>
                    </select>
                    &nbsp;

                    <select id="impact" name="impact"> 
                        <option value="0">--Select Impact--</option>
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>
                    </select>
                    &nbsp;
                    
                    <select id="date" name="date"> 
                        <option value="0">--Select Date--</option>
                        <option value="1">Last 3 Months</option>
                        <option value="2">Last 6 Months</option>
                        <option value="3">Last Year</option>
                        <option value="4">Over a Year</option>
                    </select>
                </div>

            <p class="Filter">
                <br><button type="submit" input class="submit-button">Apply Filter</button>
            </p>
        </form>

            <div class="Spacing"></div>
            <div class="Filter-DividingLine"></div>
            <div class="Spacing"></div>

        </div>

        <!-- Parameters -->
            <div class="ParametersRectangle">
                <p class=" goal">Goal</p>
                <p class="last-assessment">Last Assessment</p>
                <p class="status">Status</p>
                <p class="actions">Actions</p>
            </div>
        
                    
        <!-- Information Parameters -->
        <?php
            // Get a connection for the database
            require_once('mysqli_connect.php');

            $category = isset($_GET['category']) ? intval($_GET['category']) : 0;
            $status = isset($_GET['status']) ? intval($_GET['status']) : 0;
            $cost = isset($_GET['cost']) ? intval($_GET['cost']) : 0;
            $complexity = isset($_GET['complexity']) ? intval($_GET['complexity']) : 0;
            $impact = isset($_GET['impact']) ? intval($_GET['impact']) : 0;
            $date = isset($_GET['date']) ? intval($_GET['date']) : 0;


            // Create a query for the database
            $query =   "SELECT goal.goalTitle AS Goal,
                        goal.assessment_date AS LastAssessment,
                        goal.goalID AS GoalID,
                        status.status_desc AS Status
                        FROM goal 
                        INNER JOIN status ON goal.status_updateID=status.statusID";

            if ($category !== 0) {
                  $query .= " AND goal.categoryID=$category";
            }
            if ($status !== 0) {
                $query .= " AND goal.status_updateID=$status";
            }
            if ($cost !== 0) {
                $query .= " AND goal.cost=$cost";
            }
            if ($complexity !== 0) {
                $query .= " AND goal.complexity=$complexity";
            }
            if ($impact !== 0) {
                $query .= " AND goal.impact=$impact";
            }


            // If the query executed properly proceed
            $response = @mysqli_query($dbc, $query);
            
                                
                    if($response){
                        echo '<table align="center"
                        cellspacing="0" cellpadding="0">
                        ';
                        
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
