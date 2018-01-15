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
    $vehicle_id;
    $model ="";
    $year ="";
    $daily_rate ="";
    $weekly_rate ="";
    $car_type ="";
    
    function find_all_cars(){
        global $connection;
        $query = "SELECT * FROM car";
        $result = mysqli_query($connection, $query);
        return $result;
    }
    
    $car_list = find_all_cars();

?>


<html>
<head></head>
    <body>
        <h1>List of cars</h1>
        <table border="1">
            <tr>
            <th>Vehicle ID</th>
            <th>Model</th>
            <th>Year</th>
            <th>Daily Rate</th>
            <th>Weekly Rate</th>
            <th>Car Type</th>
            <th></th>
            </tr>
            <?php while ($carlist = mysqli_fetch_assoc($car_list)){?>
            <tr>
                <td><?php echo $carlist['Vehicle_ID'];?></td>
                <td><?php echo $carlist['model'];?></td>
                <td><?php echo $carlist['year'];?></td>
                <td><?php echo $carlist['Daily_rate'];?></td>
                <td><?php echo $carlist['Weekly_rate'];?></td>
                <td><?php echo $carlist['Car_Type'];?></td>
                <td><a href="http://localhost/Car Rental/confirmupdaterent.php?id=<?php echo $carlist['Vehicle_ID'];?>&model=<?php echo $carlist['model'];?>&year=<?php echo $carlist['year'];?>&daily_rate=<?php echo $carlist['Daily_rate'];?>&weekly_rate=<?php echo $carlist['Weekly_rate'];?>&type=<?php echo $carlist['Car_Type'];?>">Edit Rent</a></td>
            </tr>
            <?php }?>
        </table>
    
    </body>
</html>
<?php mysqli_free_result($car_list);?>