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
            <h1 class="title">Create New Goal</h1>
        </div>

        <!-- Form --> 
        <form action="create_goal_successful.php" method="post">
            
            <!-- Title --> 
            <p>Title: 
                <br><input type="text" name="goalTitle" size="30" value="" />
            </p>

            <!-- Category --> 
            <p>Category: <br>
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
            </p>

            <!-- Status --> 
            <p>Status: <br>
                <select id="status" name="status">                      
                <option value="0">--Select Status--</option>
                <option value="1">Not Started</option>
                <option value="2">Scoped</option>
                <option value="3">In Progress</option>
                <option value="4">Implemented</option>
                </select>
            </p>
            
            <!-- Cost --> 
            <p>Cost: <br>
                <select id="cost" name="cost"> 
                <option value="0">--Select Cost--</option>
                <option value="1">$</option>
                <option value="2">$$</option>
                <option value="3">$$$</option>
                <option value="4">$$$$</option>
                </select>
            </p>
            
            <!-- Complexity --> 
            <p>Complexity: <br>
                <select id="complexity" name="complexity"> 
                <option value="0">--Select Complexity--</option>
                <option value="1">Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>

                </select>
            </p>
            
            <!-- Impact --> 
            <p>Impact: <br>
                <select id="impact" name="impact"> 
                <option value="0">--Select Impact--</option>
                <option value="1">Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>
                </select>
            </p>

            <p><input type="submit" name="submit" value="Create New Goal" /></p>
        </form>

    </body>
</html>
