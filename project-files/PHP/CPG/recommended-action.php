<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Recommended Action </title>
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
                <h1 class="title">Recommended Action</h1>
            </div>

        <!-- Navigation bar -->
            <div class="nav">
                <ul>
                    <li><a href="goals.php">Goals</a></li>
                    <li><a href="assessments.php">Assessment History</a></li>
                </ul>
            </div>

        <!-- Database Code --> 
            <?php
                // NEED TO UPDATE SO THAT DROPDOWN DOESNT SET ALL STUFF UNCHANGED TO 0!

                // Connect to the database
                require_once('mysqli_connect.php');

                // Get goalID from the url
                $id = $_GET['goalID'];
                if (!$id){
                    echo "<script language='javascript'>window.alert('Error: returning to main page');window.location='goals.php';</script>";
                }


                // PRINT THE INFORMATION
                $sql = "SELECT recAction_desc FROM recommendedaction 
                        WHERE goalID = $id";


                $response = mysqli_query($dbc, $sql);

                if ($response) {
                    $row = mysqli_fetch_assoc($response);
                    if (!empty($row)) {
                        $recAct = $row['recAction_desc'];
                    }
                    else {
                        // handle the case where $row is empty
                    }
                }
                else {
                    // Log the error to a file or send it to a logging service
                    error_log(mysqli_error($dbc));
                }

            ?>

        <div class="main">
		    <!-- Return button -->
                <div class="return-to-info">
                    <a href="info.php?goalID=<?php echo $id; ?>"> Return to Info </a>
                </div>
        
            <!-- Action recommendation  --> 
                <div class="Rectangle44-action-recommend">
                    <p><?php echo $recAct; ?></p>
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