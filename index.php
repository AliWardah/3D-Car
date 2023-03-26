<?php

	$error = "";

	// Checking when the form get submitted
	if(isset($_POST["GetProduct"])){

		// Validation for each of the field if it is empty
		if($_POST["Afirstindex"] == ""){
			$error .= '- First index of Matrix A is empty.<br>';
		}

		// Validation for each of the field if contains only integer value
		if(filter_var($_POST["Afirstindex"], FILTER_VALIDATE_INT) === false){
			$error .= '- First index of Matrix A must be an integer.<br>';
		}
		if($_POST["Asecondindex"] == ""){
			$error .= '- Second index of Matrix A is empty.<br>';
		}
		if(filter_var($_POST["Asecondindex"], FILTER_VALIDATE_INT) === false){
			$error .= '- Second index of Matrix A must be an integer.<br>';
		}
		if($_POST["Athirdindex"] == ""){
			$error .= '- Third index of Matrix A is empty.<br>';
		}
		if(filter_var($_POST["Athirdindex"], FILTER_VALIDATE_INT) === false){
			$error .= '- Third index of Matrix A must be an integer.<br>';
		}
		if($_POST["Afourthindex"] == ""){
			$error .= '- Fourth index of Matrix A is empty.<br>';
		}
		if(filter_var($_POST["Afourthindex"], FILTER_VALIDATE_INT) === false){
			$error .= '- Fourth index of Matrix A must be an integer.<br>';
		}
		if($_POST["Bfirstindex"] == ""){
			$error .= '- First index of Matrix B is empty.<br>';
		}
		if(filter_var($_POST["Bfirstindex"], FILTER_VALIDATE_INT) === false){
			$error .= '- First index of Matrix B must be an integer.<br>';
		}
		if($_POST["Bsecondindex"] == ""){
			$error .= '- Second index of Matrix B is empty.<br>';
		}
		if(filter_var($_POST["Bsecondindex"], FILTER_VALIDATE_INT) === false){
			$error .= '- Second index of Matrix B must be an integer.<br>';
		}
		if($_POST["Bthirdindex"] == ""){
			$error .= '- Third index of Matrix B is empty.<br>';
		}
		if(filter_var($_POST["Bthirdindex"], FILTER_VALIDATE_INT) === false){
			$error .= '- Third index of Matrix B must be an integer.<br>';
		}
		if($_POST["Bfourthindex"] == ""){
			$error .= '- Fourth index of Matrix B is empty.<br>';
		}
		if(filter_var($_POST["Bfourthindex"], FILTER_VALIDATE_INT) === false){
			$error .= '- Fourth index of Matrix B must be an integer.<br>';
		}

		// If there is no error with the fields
		if($error == ""){
			// Declaring arrays for Matrix A Values
			$Amatrix = array(array($_POST["Afirstindex"], $_POST["Asecondindex"]),
	              array($_POST["Athirdindex"], $_POST["Afourthindex"]));
			// print_r($Bmatrix);
			// Declaring arrays for Matrix B Values
			$Bmatrix = array(array($_POST["Bfirstindex"], $_POST["Bsecondindex"]),
	              array($_POST["Bthirdindex"], $_POST["Bfourthindex"]));
			// print_r($Bmatrix);


			// Process to multiply the two Matrices A and B
			for ($i = 0; $i < 2; $i++) 
		    { 
		        for ($j = 0; $j < 2; $j++) 
		        { 
		            $res[$i][$j] = 0; 
		            for ($x = 0; $x < 2; $x++) 
		            { 
		                $res[$i][$j] += $Amatrix[$i][$x] * 
		                                $Bmatrix[$x][$j]; 
		            } 
		        } 
		    } 

		    // Displaying matrix A in table form
			echo '<h2 class="bg-primary text-white" style="width: 300px; margin-left: 30px;">Matrix A</h2>';
		    echo '<table class="table table-bordered" style="width: 10%; margin-left: 30px; border: 1px solid #000000;">';
		    for ($i = 0; $i < 2; $i++) 
		    { 
		    	echo '<tr>';
		        for ($j = 0; $j < 2; $j++) 
		        { 
		            echo '<td>'.$Amatrix[$i][$j].'</td>'; 
		        } 
		        echo "</tr>"; 
		    }
		    echo '</table>';

		    // Displaying matrix B in table form
			echo '<h2 class="bg-primary text-white" style="width: 300px; margin-left: 30px;">Matrix B</h2>';
		    echo '<table class="table table-bordered" style="width: 10%; margin-left: 30px; border: 1px solid #000000;">';
		    for ($i = 0; $i < 2; $i++) 
		    { 
		    	echo '<tr>';
		        for ($j = 0; $j < 2; $j++) 
		        { 
		            echo '<td>'.$Bmatrix[$i][$j].'</td>'; 
		        } 
		        echo "</tr>"; 
		    }
		    echo '</table>';

		    // Displaying resultant matrix in table form
			echo '<h2 class="bg-success text-white" style="width: 300px; margin-left: 30px;">Resultant Matrix</h2>';
		    echo '<table class="table table-bordered" style="width: 10%; margin-left: 30px; border: 1px solid #000000;">';
		    for ($i = 0; $i < 2; $i++) 
		    { 
		    	echo '<tr>';
		        for ($j = 0; $j < 2; $j++) 
		        { 
		            echo '<td>'.$res[$i][$j].'</td>'; 
		        } 
		        echo "</tr>"; 
		    }
		    echo '</table>';

		    echo "<br><br>";
		}
	}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Matrices Product</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<form name="MatricesForm" method="post" novalidate>
			<div class="row">
		<?php if($error != "") { ?>
				<div class="col-12">
					<div class="alert alert-danger">
						<p><?php echo $error; ?></p>
					</div>
				</div>
		<?php } ?>
				<div class="col-6">
					<h3>Enter values for Matrix A (2x2)</h3>
					<hr />
					<label><b>First Index</b></label>
					<input type="text" class="form-control" name="Afirstindex" value="<?php if(isset($_POST["Afirstindex"])) { echo $_POST["Afirstindex"]; } ?>" placeholder="First Index of Matrix A" />
					<label><b>Second Index</b></label>
					<input type="text" class="form-control" name="Asecondindex" value="<?php if(isset($_POST["Asecondindex"])) { echo $_POST["Asecondindex"]; } ?>" placeholder="Second Index of Matrix A" />
					<label><b>Third Index</b></label>
					<input type="text" class="form-control" name="Athirdindex" value="<?php if(isset($_POST["Athirdindex"])) { echo $_POST["Athirdindex"]; } ?>" placeholder="Third Index of Matrix A" />
					<label><b>Fourth Index</b></label>
					<input type="text" class="form-control" name="Afourthindex" value="<?php if(isset($_POST["Afourthindex"])) { echo $_POST["Afourthindex"]; } ?>" placeholder="Fourth Index of Matrix A" />
				</div>
				<div class="col-6">
					<h3>Enter values for Matrix B (2x2)</h3>
					<hr />
					<label><b>First Index</b></label>
					<input type="text" class="form-control" name="Bfirstindex" value="<?php if(isset($_POST["Bfirstindex"])) { echo $_POST["Bfirstindex"]; } ?>" placeholder="First Index of Matrix B" />
					<label><b>Second Index</b></label>
					<input type="text" class="form-control" name="Bsecondindex" value="<?php if(isset($_POST["Bsecondindex"])) { echo $_POST["Bsecondindex"]; } ?>" placeholder="Second Index of Matrix B" />
					<label><b>Third Index</b></label>
					<input type="text" class="form-control" name="Bthirdindex" value="<?php if(isset($_POST["Bthirdindex"])) { echo $_POST["Bthirdindex"]; } ?>" placeholder="Third Index of Matrix B" />
					<label><b>Fourth Index</b></label>
					<input type="text" class="form-control" name="Bfourthindex" value="<?php if(isset($_POST["Bfourthindex"])) { echo $_POST["Bfourthindex"]; } ?>" placeholder="Fourth Index of Matrix B" />
				</div>
				<div class="col-12">
					<br>
					<div class="row justify-content-center">
						<button type="submit" name="GetProduct" class="btn btn-primary col-3">Get Product</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
