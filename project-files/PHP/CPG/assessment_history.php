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
            <a href="export_assessment.php">
            <div class="rectangle">
                <i class="fa fa-file-export"></i> 
                <h2>Export All</h2>
            </div>
        </a>
            
            <a href="create_assessment.php">
            <div class="rectangle">
                <i class="fa fa-file-circle-plus"></i> 
                <h2>New Assessment</h2>
            </div>
            </a>
        </div>
        
        <br><br>

        <!-- Parameters --
            <div class="ParametersRectangle">
                <p class=" goal">Date</p>
                <p class="last-assessment">Goal</p>
                <p class="status">Status</p>
                <p class="actions">Actions</p>
            </div>-->
                    
        <!-- Information Parameters
            Display: Status, goal, date -->
        <?php
            // Get a connection for the database
            require_once('mysqli_connect.php');


            // Create a query for the database
            $query =   "SELECT ups.stat_updateID as id, ups.update_date as Date, 
                        ups.goalID as goalID, ups.goalTitle as Goal, 
                        ups.statusID, s.status_desc as Stat
                        FROM status s 
                        RIGHT JOIN (( 
                            SELECT su.update_date, su.goalID as goalID, 
                            g.goalTitle, su.statusID, su.stat_updateID 
                            FROM status_update su 
                            LEFT JOIN goal g on su.goalID=g.goalID) 
                            AS ups) 
                        on s.statusID=ups.statusID;";       


            // If the query executed properly proceed
            $response = @mysqli_query($dbc, $query);
            
                                
                    if($response){
                        echo '<table align="center"
                        cellspacing="0" cellpadding="8">';
						
						echo '
						<tr>
							<th bgcolor="#4682B4" style="color:white; font-size:30px" height="75px">Date</th>
							<th bgcolor="#4682B4" style="color:white; font-size:30px" height="75px">Goal</th>
							<th bgcolor="#4682B4" style="color:white; font-size:30px" height="75px">Status</th>
							<th bgcolor="#4682B4" style="color:white; font-size:30px" height="75px"></th>
						  </tr>';
                        
                        while($row = mysqli_fetch_array($response)){
                            $date = $row['Date'];
                            $title = $row["Goal"];
                            $status = $row["Stat"];
                            $id = $row["goalID"];
                            $stat_id = $row["id"];
                

                if ($status == "Not Started")
                    $status_color="GREY";
                elseif ($status == "Scoped")
                    $status_color="#FDDA0D";
                elseif ($status == "In Progress") 
                    $status_color="ORANGE";
                elseif ($status == "Implemented")
                    $status_color="GREEN";

                            echo '<tr><td align="center">' .$date. '</td>
                            <td align="center">' .$title. '</a></td>
                            <td align="center"><font color=' .$status_color. '>' .$status. '</font></td>' . '<td align="center">
                            
                            
                                <div class="action-item">
                                    <a href="edit_assessment.php?assessmentID=' . $stat_id . '">
                                        <i class="fa fa-pen-to-square"></i> 
                                        <p>Edit</p>
                                   </a>
                                </div>

                                
                                &nbsp;&nbsp;&nbsp;

                                <div class="action-item">
                                 <a href="delete_assessment.php?assessmentID=' . $stat_id . '">
                                        <i class="fa fa-trash"></i> 
                                        <p>Remove</p>
                                  </a>  
                                </div>
                    
                                &nbsp;&nbsp;&nbsp;
                                <div class="action-item">
                                <a href="assessments.php?goalID=' .$id. '">
                                    <i class="fa fa-eye"></i> 
                                    <p>View</p>
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
