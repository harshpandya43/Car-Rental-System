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
$vehicle_id = $_GET['vehicleid'];
$startdate = $_GET['startdate'];
$enddate = $_GET['enddate'];
$customerid = $_GET['custid'];
$daily_rate = $_GET['daily_rate'];
//$weekly_rate = $_GET[];



$sdtime = strtotime($startdate);
$edtime = strtotime($enddate);
$datediff = $edtime - $sdtime;
echo "<br/>";

$daydiff = floor($datediff/(60 * 60 *24))+1;

$amount_due = $daydiff * $daily_rate;


$query = "INSERT INTO car_booking(";
$query .=" C_ID, car_id, start_date, end_date, amount_due ) VALUES (";
$query .= " {$customerid}, {$vehicle_id}, '{$startdate}', '{$enddate}', {$amount_due}";
$query .= ")";

$result = mysqli_query($connection, $query);

if($result){
    echo "New booking done of ".$vehicle_id." for ".$customerid;
}else{
    echo $query;
    die("Insert Failed");
}

?>