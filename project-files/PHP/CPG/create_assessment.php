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
            <div class="hamburger-menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <h1 class="title">Create New Assessment</h1>
        </div>

        <!-- Navigation bar -->
        <div class="nav">
            <ul>
                <li><a href="goals.php">Goals</a></li>
                <li><a href="assessment_history.php">Assessment History</a></li>
            </ul>
        </div>
        <br><br>
    <div class ="create-assessment">
        <form class="form-action"action="create_assessment_successful.php" method="post">
            
            <!--Choose Goal-->
            <p>Goal: <br>
                <select id="goalNum" name="goalNum">   
                    <option value="0">--Select Goal--</option>
                    <!-- LOOP FOR EACH GOAL -->
                    <?php
                        // NEED TO UPDATE SO THAT DROPDOWN DOESNT SET ALL STUFF UNCHANGED TO 0!

                        // Connect to the database
                        require_once('mysqli_connect.php');

                        // Retrieve all goals and ids
                        $sql = "SELECT g.goalID, g.goalTitle 
                            FROM goal g;";


                        $response = mysqli_query($dbc, $sql);
                        if($response){
                            while($row = mysqli_fetch_assoc($response)){
                                $title = $row['goalTitle'];
                                $id = $row['goalID']; ?>
                        
                                <option value= "<?php echo $id; ?>"> <?php echo $title;?> </option>
                    <?php	}
                        }else {
                            // Log the error to a file or send it to a logging service
                            error_log(mysqli_error($dbc));
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
                    <?php	}
                        }else {
                            // Log the error to a file or send it to a logging service
                            error_log(mysqli_error($dbc));
                        }
                        // Close connection to the database
                        mysqli_close($dbc);
                    ?>
                </select>
            </p>

            <!--- Date Selection -->
            <div class="date-container">
                <p>Date: 
                <input class="datepicker" type="date" id="assessment_date" name="assessment_date"/></p>
            </div>

            <!-- Notes -->
            <p>Notes:
                <br><input class="input-field-notes" type="text" name="note_desc" size="30" value="" />
            <p>

            <p> 
                <!-- Submit --> 
                <input class="submit-button" type="submit" name="submit" value="Create New Assessment" /> 

                <!-- Back Button-->
                <input class ="submit-button-cancel" value="Cancel" onclick="history.go(-1)"> 
        </form> </p>
    </div>
        <script>
            $(document).ready(function() {
                $(".hamburger-menu").click(function() {
                    $(".nav").slideToggle("fast");
                });
            });
        </script>
    </body>
</html>
