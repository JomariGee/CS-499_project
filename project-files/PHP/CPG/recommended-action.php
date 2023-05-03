       <!-- Database Code --> 
            <?php
                // Connect to the database
                require_once('mysqli_connect.php');

                // Get goalID from the url
                $id = $_GET['goalID'];
                if (!$id){
                    echo "<script language='javascript'>window.alert('Error: returning to main page');window.location='goals.php';</script>";
                }


                // PRINT THE INFORMATION
                $sql = "SELECT ra.recAction_desc, ra.OT_desc, ra.IT_desc, r.ref_Title, r.ref_link, g.goalTitle   
			FROM recommendedaction ra 
			LEFT JOIN referenceinstances ri ON ra.goalID = ri.goalID 
			LEFT JOIN ref r ON ri.referencesID = r.referencesID
            LEFT JOIN goal g ON g.goalID=ra.goalID 
			WHERE ra.goalID = $id;
			";
        
                $response = mysqli_query($dbc, $sql);

                if ($response) {
    $row = mysqli_fetch_assoc($response);
    if (!empty($row)) {
        $recAct = $row['recAction_desc'];
        $it_info = $row['IT_desc'];
        $ot_info = $row['OT_desc'];
        $ref_Title = $row['ref_Title'];
        $ref_link = $row['ref_link'];
		$goalTitle = $row['goalTitle'];
    }
    else {
        $recAct = '';
        $it_info = '';
        $ot_info = '';
        $ref_Title = '';
        $ref_link = '';
    }
}
                else {
                    // Log the error to a file or send it to a logging service
                    error_log(mysqli_error($dbc));
                }

            ?>
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
                <h1 class="title" style="font-size: 30px"><?php echo $goalTitle; ?></h1>
            </div>

        <!-- Navigation bar -->
            <div class="nav">
                <ul>
                    <li><a href="goals.php">Goals</a></li>
                    <li><a href="assessment_history.php">Assessment History</a></li>
                    <li><a href="create_assessment.php">Create New Assessment</a></li>
                </ul>
            </div>
			
		<!-- Return button -->

            <div class="return-to-info">
				<a href="info.php?goalID=<?php echo $id; ?>"> Return to Info </a>
			</div>
				<br><h1 style="font-size: 30px"> Recommended Action </h1>
        <div class="main">
            <!--Recommended Action-->
		<div class="Rectangle44-action-recommend">
			<p class="recommended-action">
			&nbsp; &nbsp;&nbsp;<?php echo $recAct; ?> <br><br><br><br>
		<!--</p></div>
					
                <!-- IT info  -->
		<?php 
			if ($it_info){
				echo '
						<b>IT:</b><br>
						&nbsp; &nbsp;&nbsp; '.$it_info.'<br><br><br><br>
				';
			}


                //  OT info
			if ($ot_info){
				echo '
						<b>OT:</b><br>
						&nbsp; &nbsp;&nbsp; '.$ot_info.'<br><br><br><br>
				';
			}
				
			if ($ref_Title){
				echo '
						<center>
							<b>Resources:</b><br>
							<a href="'.$ref_link.'">
							'.$ref_Title.'
							</a></center>
				';
			}
			echo '</p></div>';
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
