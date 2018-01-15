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
$vehicleid = $_GET['id'];
$startdate = $_GET['startdate'];
$enddate = $_GET['enddate'];
$amount = $_GET['amount'];


?>

<?php 
	if(isset($_POST['submit'])){
		$vid = $_POST['vehicle_id'];
		$endd = $_POST['enddate'];
		$amt = $_POST['amount'];
		
		$query = "UPDATE car_booking";
		$query .= " SET End_Date = '{$endd}' AND Amount_Due = {$amt} WHERE  Car_ID = {$vid}";
		
		$result = mysqli_query($connection, $query);
		if($result){
			echo "Record updated";
		}else{
			echo $query;
			echo "Not updated";
		}
		
		
	}
?>

<html>
	<head></head>
	<body>
		<h1>Enter new End Date</h1>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="vehicleid">Vehicle ID</label>
		<input type="text" name="vehicle_id" value="<?php echo $vehicleid; ?>">
		
		<label for="enddate">End Date</label>
		<input type="text" name="enddate" value="<?php echo $enddate; ?>">
		
		<label for="amount">Amount</label>
		<input type="text" name="amount" value="<?php echo $amount;?>">
		
		<input type="submit" name="submit" value="Return">
		</form>
		
	</body>

</html>