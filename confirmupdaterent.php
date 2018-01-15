<?php 
    $dbhost ="localhost";
    $dbuser= "root";
    $dbpass= "";
    $dbname= "car_rental_systems";

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);       
    
    if(mysqli_connect_error()){
        die("Database connection failed".mysqli_connect_error());
    }else{
        echo "Database connected";
    }

?>

<?php 
	$vehicle_id = $_GET['id'];
	$model = $_GET['model'];
	$year = $_GET['year'];
	$daily_rate = $_GET['daily_rate'];
	$weekly_rate = $_GET['weekly_rate'];
	$car_type = $_GET['type'];
	

?>

<?php 
	if(isset($_POST['submit'])){
		$daily = $_POST['daily_rate'];
		$weekly = $_POST['weekly_rate'];
		$vehicle = $_POST['vehicle_id'];
		
		$query = "UPDATE car ";
		$query .= "SET Daily_rate = {$daily}, Weekly_rate = {$weekly}";
		$query .= " WHERE vehicle_id = {$vehicle}";
		
		$result = mysqli_query($connection, $query);
		
		if($result){
			echo "Record updated";
		}else{
			echo $query."<br/>";
			echo $weekly_rate;
			echo "Not updated";
		}
		
	}
?>

<html>
	<head></head>
	<body>
		<h1>Edit Rental</h1>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="vehicle_id">Vehicle ID</label>
		<input type="text" name="vehicle_id"  value="<?php echo $vehicle_id;?>"><br/>
	
	
		<label for="model">Model</label>
		<input type="text" value="<?php echo $model;?>" disabled><br/>
		
		<label for="year">Year</label>
		<input type="text" value="<?php echo $year;?>" disabled><br/>
		
		<label for="daily_rate">Daily Rate</label>
		<input type="text" value="<?php echo $daily_rate;?>" name="daily_rate"><br/>
		
		<label for="weekly_rate">Weekly Rate</label>
		<input type="text" value="<?php echo $weekly_rate;?>" name="weekly_rate"><br/>
		
		<label for="cartype">Car Type</label>
		<input type="text" value="<?php echo $car_type;?>" disabled><br/><br/>
		
		<input type="submit" name="submit" value="Update Rates">
		</form>
	</body>

</html>