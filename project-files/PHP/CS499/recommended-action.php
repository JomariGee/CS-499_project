<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recommended Action</title>
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
                <li><a href="info.php">Info</a></li>
                <li><a href="recommended-action.php">Recommended Action</a></li>
                <li><a href="assessments.php">Assessment History</a></li>
            </ul>
        </div>
		
      
        <!-- Goal -->
		<div class="main">
		
            <div class="Rectangle40"> 
                <p>Resources</p>
                </div>
            
                <div class="Rectangle41">
                    <p>Action 1</p>
                </div> 

                <div class="Rectangle42">
                    <p>Action 2</p>
                </div>
                
                <div class="Rectangle43">
                    <p>Action 3</p>
                </div>
                
                <div class="Rectangle52">
                    <p>Recommended Action</p>
                    </div>
                
                <div class="Rectangle44">
                    <p>All unsuccessful logins are logged and sent to an organization’s security team or relevant logging system....</p>
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