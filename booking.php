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

$startdate="";
$enddate="";
$customerid;
if(isset($_POST['submit'])){
    $customerid = $_POST['customer'];
    $rentaltype=$_POST['rental_type'];
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];

echo $customerid;
echo $startdate;
echo $enddate;
}
    


function find_available_cars($startdate, $enddate){   
    global $connection;
	$curr_date = date("Y-m-d");
        $query = "SELECT c.vehicle_id, c.model, c.year, c.daily_rate, c.weekly_rate, c.car_type ";
        $query .="FROM car as c, car_booking as cb ";
        $query .="WHERE c.vehicle_id = cb.car_id AND cb.start_date NOT BETWEEN '{$startdate}' AND '{$enddate}' AND cb.end_date NOT BETWEEN '{$startdate}' AND '{$enddate}' ";
        $query .=" ORDER BY c.car_type";
        echo $query;
        $result = mysqli_query($connection, $query);
        return $result;
        //mysqli_free_result($result);
       // $car_available = mysqli_fetch_assoc($result);
       // return $car_available;
    
    
}

$carlist = find_available_cars($startdate, $enddate);



    //$carlist =[];
    
    /*if(isset($_POST['submit'])){
        $customerid = $_POST['customer'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $rentaltype = $_POST['rental_type'];  
        
         $query = "SELECT c.vehicle_id, c.model, c.year, c.daily_rate, c.weekly_rate, c.car_type ";
        $query .="FROM car as c, car_booking as cb ";
        $query .="WHERE c.vehicle_id = cb.car_id AND cb.start_date NOT BETWEEN '{$startdate}' AND '{$enddate}' AND cb.end_date NOT BETWEEN '{$startdate}' AND '{$enddate}'";
        $query .=" ORDER BY c.car_type";
        $result = mysqli_query($connection, $query);
        print_r($result);
       
        if(!$result){
            echo $query;
            echo "Database query failed";
        }else{
            echo $query;
            echo "Data Showed";
        }
        
        
    }*/

/*if(isset($_POST['search'])){*/
   
//}




    

?>


<html>
    <head>
        <body>
            <h1>Book a car</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="customer">Customer ID</label>
            <input type="text" name="customer"><br>
            
            <label for="rental_type">Rental type</label>
            <select name="rental_type">
                <option>Daily</option>
                <option>Weekly</option>
            </select><br/>
            <label for="startdate">Start Date</label>
            <input type="text" name="startdate" placeholder="YYYY-MM-DD">
            
            <label for="enddate">End Date</label>
            <input type="text" name="enddate" placeholder="YYYY-MM-DD"><br/>
            
            <input type="submit" value="Submit" name="submit">
            <input type="submit" value="Search" name="search">
                   
            
            <table border="2">
                <tr>
                    <th>Vehicle ID</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Daily Rate</th>
                    <th>Weekly Rate</th>
                    <th>Car Type</th>
                    <th></th>
                    
                </tr> 
            <?php while ($carvail = mysqli_fetch_assoc($carlist)){ 
        
    ?>
                <tr>
                    <td><?php echo $carvail['vehicle_id'];?></td>
                    <td><?php echo $carvail['model'];?></td>
                    <td><?php echo $carvail['year'];?></td>
                    <td><?php echo $carvail['daily_rate'];?></td>
                    <td><?php echo $carvail['weekly_rate'];?></td>
                    <td><?php echo $carvail['car_type'];?></td>
                    <td><a href="http://localhost/Car Rental/confirmbooking.php?vehicleid=<?php echo $carvail['vehicle_id'];?>&daily_rate=<?php echo $carvail['daily_rate'];?>&startdate=<?php echo $startdate;?>&enddate=<?php echo $enddate;?>&custid=<?php echo $customerid;?>">Book </a></td>
                    
                </tr>
            
            
            
            <?php }?>
            </table>
            </form>
        </body>
    </head>
</html>
<?php mysqli_free_result($carlist);?>