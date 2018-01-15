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
    $vehicleid;
    $model ="";
    $year ="";
    $daily_rate;
    $weekly_rate;
    $car_type ="";
	$owner_id;

    if(isset($_POST['submit'])){
        $vehicleid = $_POST['vehicleid'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $daily_rate = $_POST['dailyrate'];
        $weekly_rate = $_POST['weeklyrate'];
        $car_type = $_POST['cartype'];
		$owner_id = $_POST['owner'];
        
        
        $query = "INSERT INTO car (";
        $query .= "Vehicle_ID, model, year, Daily_rate, Weekly_rate, Car_type, owner_id ) VALUES ( ";
        $query .= "{$vehicleid}, '{$model}', '{$year}', {$daily_rate}, {$weekly_rate}, '{$car_type}',{$owner_id}";
        $query .= ")";
        
        $result = mysqli_query($connection, $query);
        
        if($result){
            echo "New car inserted";
        }else{
            echo $query;
            die("Insert failed".mysqli_error($connection));
        }
    }

    
?>

<html>
    <head></head>
    <body>
        <h1>Add Car</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="vehicleid">Vechicle ID</label>
            <input type="text" name="vehicleid"><br/>
            
            <label for="model">Model</label>
            <input type="text" name="model"><br/>
            
            <label for="year">Year</label>
            <input type="text" name="year"><br/> 

			<label for="owner">Owner ID</label>
            <input type="text" name="owner"><br/> 			
            
            
            <label for="dailyrate">Daily Rate</label>
            <input type="text" name="dailyrate"><br/>
            
            <label for="weeklyrate">Weekly Rate</label>
            <input type="text" name="weeklyrate"><br/>
            
            <label for="cartype">Car Type</label>
            <select name="cartype">
                <option value="SUV">SUV</option>
                <option value="Compact">Compact</option>
                <option value="Truck">Truck</option>
                <option value="Large">Large</option>
                <option value="Medium">Medium</option>
                <option value="Van">Van</option>
            </select>
            
            <input type="submit" value="submit" name="submit">
        
        </form>
    
    
    </body>

</html>