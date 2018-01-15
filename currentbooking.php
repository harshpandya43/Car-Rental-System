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
$bookingid;
$enddate="";
$startdate="";
$car_id;
$customer_id;
$amount_due;


function find_all_bookings(){
	$date = date("Y-m-d");
	echo $date;
	global $connection;
	$query = "SELECT * FROM car_booking";
	$query .= " WHERE End_Date >='{$date}'";
	$result = mysqli_query($connection, $query);
	echo $query;
	return $result;
}

$booklist = find_all_bookings();


?>

<html>
	<head></head>
	<body>
		<table border="1">
			<tr>
			<th>Booking ID</th>
			<th>Vehicle ID</th>
			<th>Customer ID</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Amount Due</th>
				<th></th>
			</tr>
			<?php while($book_list = mysqli_fetch_assoc($booklist)){ ?>
			<tr>
				
				<td><?php echo $book_list['Booking_ID'];?></td>
				<td><?php echo $book_list['Car_ID'];?></td>
				<td><?php echo $book_list['C_ID'];?></td>
				<td><?php echo $book_list['Start_date'];?></td>
				<td><?php echo $book_list['End_Date'];?></td>
				<td><?php echo $book_list['Amount_Due'];?></td>
				<td><a href="http://localhost/car rental/returncar.php?id=<?php echo $book_list['Booking_ID'];?>&enddate=<?php echo $book_list['End_Date'];?>&amount=<?php echo $book_list['Amount_Due'];?>&startdate=<?php echo $book_list['Start_date'];?>">Return</a></td>
			</tr>
			<?php } ?>
		</table>
	
	</body>
</html>


