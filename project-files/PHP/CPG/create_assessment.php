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
                <li><a href="assessments.php">Assessment History</a></li>
            </ul>
        </div>
        <br><br><br>


   <form class="form-action"action="assesment_created.php" method="post">
            <br><br><br>

        
            <p>Title of Goal:
                <br><input class="input-field" type="text" name="goalTitle" size="30" value="" />
            <p>

            <!-- Choose Status -->
            <p>Status: <br>
                <select id="status" name="status">                      
                <option value="0">--Select Status--</option>
                <option value="1">Not Started</option>
                <option value="2">Scoped</option>
                <option value="3">In Progress</option>
                <option value="4">Implemented</option>
                </select>
            </p>

            <!--- Date Selection -->
            <p>Date:
            <input type="date" id="assessment_date">
            <p>


            <!-- Notes -->
            <p>Notes:
                <br><input class="input-field" type="text" name="note_desc" size="30" value="" />
            <p>

            <p> <input class="submit-button" type="submit" name="submit" value="Create New Assesment" /> </p>
        </form>
     
   <!-- PHP database code --> 
   
   <?php
            // Get a connection for the database
            require_once('mysqli_connect.php');

            // Close connection to the database
            mysqli_close($dbc);
        ?> 

        <script>
            $(document).ready(function() {
                $(".hamburger-menu").click(function() {
                    $(".nav").slideToggle("fast");
                });
            });
        </script>
    </body>
</html>
