<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Goal</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="main.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>
    <style>

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    
        .header {
            width: 100%;
            height: 60px;
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
    
            .header h1 {
                margin: 0;
                padding: 0;
            }
    
        .title {
            font-size: 40px;
        }
    
        
    
        /* Navigation */
        .nav {
            display: none;
            position: absolute;
            top: 60px;
            left: 0;
            background-color: #f1f1f1;
            width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
    
            .nav ul {
                list-style: none;        
                padding: 0;
                margin: 0;
            }
    
            .nav ul li {
                padding: 10px 20px;
                border-bottom: 1px solid #ddd;
            }
    
            .nav ul li:hover {
                background-color: #ddd;
                cursor: pointer;
            }
    
        .main {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            padding-top: 10px;
        }
    
        /* Importing * Sorting */
        .rectangle {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 200px;
            height: 100px;
            background-color: #ccc;
            border-radius: 5px;
            margin-right: 20px;
        }
    
            .rectangle h2 {
                margin: 0;
                padding: 0;
            }
    
            .rectangle .icon {
                font-size: 48px;
                margin-bottom: 10px;
            }
            .rectangle .fa {
                font-size: 36px;
                color: #3a3939;
            }
    
        .icon {
            width: 24px;
            height: 24px;
            background-color: #888;
            border-radius: 50%;
            margin-bottom: 10px;
        }
    
        /* Filter */
        .FilterGroup {
            width: 1304.80px;
            height: 68px;
            flex-direction: row;
            padding-top: 10px;
        }
    
        .Filter-DividingLine {
            width: 1304.80px;
            height: 5px;
            background-color: black;
            border-radius: 8px;
        }
    
        .Spacing {
            height: 11.50px;
        } 
    
        .Filter {
            width: 100.17px;
            font-size: 29px;
            line-height: 100%;
            text-align: center;
            color: black;
        }
    
        /* Parameters Group */ 
        .ParametersGroup {
            width: 1304.80px;
            height: 71px;
            padding-top: 90px;
        }
    
        .ParametersRectangle {
            width: 1150px;
            height: 71px;
            padding-top: 17px;
            padding-bottom: 23px;
            padding-left: 117px;
            padding-right: 46px;
            background-color: rgba(217, 217, 217, 1);
            border-radius: 7px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }
    
        .ParametersRectangle p {
            font-size: 29px;
            line-height: 100%;
            text-align: center;
            color: black;
            flex: 1;
           
        }

            /* Goals Page*/
            .goal {
                flex-basis: 30%;
            }

            .last-assessment {
                flex-basis: 15%;
            }

            .status {
                flex-basis: 20%;
            }

            .goal-actions {
                flex-basis: 15%;
            }
            /* Assessment History Page */
            .assessment-date {
                flex-basis: 45%;
            }
            .not-started {
                flex-basis: 5%;
            }
            .assessment-status {
                flex-basis: 25%;
            }
            .assessment-actions {
                flex-basis: 35%;
            }

    
        /* User Data */
        .data-row {
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            width: 1304.80px;
            gap: 14px;
            padding-top: 40px;
            border-bottom: 3px solid #ccc;
        }
    
        .data-row p {
            text-align: center;
            font-size: 1.25rem;
        }

        .data-row p2 {
            position: relative;
            top: 900px;
            width: 300px;
            text-align: center;
            font-size: 1.25rem;
        }
    
        .action-item {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            gap: 0.625rem;
            padding-top: 50px;
            
        }
            .action-item .fa {
                font-size: 28px;

            }
    </style>

    <body>

        <!-- Hamburger Menu & Title -->
        <div class="header">
            <div class="hamburger-menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <h1 class="title">Edit Goal</h1>
        </div>


    <?php

    ?>
 <form action="http://localhost/CS499/goals.php" method="post">

<p>Title: <br>
<input type="text" name="goalTitle" size="30" value="" />
</p>


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
    
<p>Status: <br>
    <select id="status" name="status">                      
    <option value="0">--Select Status--</option>
    <option value="1">Not Started</option>
    <option value="2">Scoped</option>
    <option value="3">In Progress</option>
    <option value="4">Implemented</option>
    </select>
</p>

<p>Cost: <br>
    <select id="cost" name="cost"> 
    <option value="0">--Select Cost--</option>
    <option value="1">$</option>
    <option value="2">$$</option>
    <option value="3">$$$</option>
    <option value="4">$$$$</option>
    </select>
</p>

<p>Complexity: <br>
    <select id="complexity" name="complexity"> 
    <option value="3">--Select Complexity--</option>
    <option value="0">Low</option>
    <option value="1">Medium</option>
    <option value="2">High</option>

    </select>
</p>

<p>Impact: <br>
    <select id="impact" name="impact"> 
    <option value="3">--Select Impact--</option>
    <option value="0">Low</option>
    <option value="1">Medium</option>
    <option value="2">High</option>
    </select>
</p>

<p>Risks Addressed: <br>
<input type="text" name="csf" size="30" value="" />
</p>

<p>Notes: <br>
<input type="text" name="notes" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Edit Goal" />
</p>
</form>




</body>
</html>