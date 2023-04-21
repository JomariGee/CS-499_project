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
            <h1 class="title">Assessments</h1>
        </div>

        <!-- Navigation bar -->
        <div class="nav">
            <ul>
                <li><a href="goals.php">Goals</a></li>
                <li><a href="assessments.php">Assessment History</a></li>
            </ul>
        </div>
        
        <!-- Importation & New Goal creation -->
      </div class="main">
            <a href="create_assesment.php">
            <div class="rectangle">
                <i class="fa fa-file-circle-plus"></i> 
                <h2>New Assessment</h2>
            </div>
            </a>
        </div>
    
        
        <!-- Information Parameters -->
        <div class="ParametersGroup">
            <div class="ParametersRectangle">
                <p class="assessment-date">Assessment Date</p>
                <p class="assessment-status">Status</p>
                <p class="assessment-actions">Actions</p>
            </div>
        </div>

        <!-- User Data -->
        <div class="assessment-data-row">
            <p class="assessment-date">27-Aug-2019</p>
            <p class="not-started">Not Started</p>
            <div class="action-item">
                <i class="fa fa-binoculars"></i> 
                <p>View</p>
            </div>
            <div class="action-item">
                <i class="fa fa-pen-to-square"></i> 
                <p>Edit</p>
            </div>
            <div class="action-item">
                <i class="fa fa-trash"></i> 
                <p>Remove</p>
            </div>
        </div>
        
        <!-- PHP database code --> 
        <?php
            // Get a connection for the database
            require_once('mysqli_connect.php');

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