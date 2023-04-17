<?php
//PHP that creates a new goal and generates new goal ID

// prepare the data for insertion
$goalTitle;
$category;
$status;
$cost;
$complexity;
$impact;
$notes;
$today = date("m/d/y");  

if(isset($_POST['submit'])){
	$data_missing = array();

 	if(empty($_POST['goalTitle'])){
		// Adds name to array
		$data_missing[] = 'goalTitle';
	}else{
		$goalTitle = ($_POST['goalTitle']);
	}

	if(empty($_POST['category'])){
		// Adds name to array
		$data_missing[] = 'category';
	}else{
		$category = ($_POST['category']);
	}

	if(empty($_POST['status'])){
		// Adds name to array
		$data_missing[] = 'status';
 	}else{
		$status = ($_POST['status']);
	}

 	if(empty($_POST['cost'])){
 		// Adds name to array
 		$data_missing[] = 'cost';
 	}else{
		$cost = ($_POST['cost']);
	}

 	if(empty($_POST['complexity'])){
 		// Adds name to array
 		$data_missing[] = 'complexity';
 	}else{
		$complexity = ($_POST['complexity']);
	}

	 if(empty($_POST['impact'])){
	 // Adds name to array
	 $data_missing[] = 'impact';
	 }else{
		$impact = ($_POST['impact']);
	}

	 if(empty($_POST['notes'])){
	 // Adds name to array
	 $data_missing[] = 'notes';
	 }else{
		$notes = ($_POST['notes']);
	 }


	 if(empty($data_missing)){
		 require_once('mysqli_connect.php');
		 $query = "INSERT INTO goal (goalTitle, categoryID, status_updateID, cost, complexity, impact, assessment_date, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		 $stmt = mysqli_prepare($dbc, $query);

		mysqli_stmt_bind_param($stmt, 'ssssssss', $goalTitle, $category, $status, $cost, $complexity, $impact, $today, $notes);
		 mysqli_stmt_execute($stmt);
		 $affected_rows = mysqli_stmt_affected_rows($stmt);
		 if($affected_rows == 1){
 			echo 'Goal Added Successfully!';
 			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
			} else {
			echo 'Error Occurred<br />';
			echo mysqli_error($dbc);
			mysqli_stmt_close($stmt);
		 	mysqli_close($dbc);
		}
	} else {
		 echo '<b>You need to enter the following data:</b><br />';
		 foreach($data_missing as $missing){
		 echo "$missing<br />";
		}
	}
}
?>

</form>
<form method = "POST" action ="goals.php">
<input type = "submit" value="goals page"/>
</form>