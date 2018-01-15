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
    $fname ="";
    $lname ="";
    $cname = "";
    $ctype = "";
    $phone;

    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $cname = $_POST['cname'];
        $ctype = $_POST['ctype'];
        $phone = $_POST['phone'];
        
        $query = "INSERT INTO customer(";
        $query .= " First_initial, Last_name, Company_name, Customer_type, phone_number ) VALUES ( ";
        $query .= "'{$fname}', '{$lname}', '{$cname}', '{$ctype}', {$phone}";
        $query .= ")";
        
        $result = mysqli_query($connection, $query);
        
        
        if($result){
            echo "New customer Added";
        }else{
            echo $query;
            die("Insert failed".mysqli_error($connection));
            
        }
    }
?>
<html>
<head></head>
<body>
    <h1>Add New Customer</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="fname">Fname</label>
        <input type="text" name="fname"><br>
        
        <label for="lname">Lname</label>
        <input type="text" name="lname"></br>
    
        <label for="cname">Company name</label>
        <input type="text" name="cname"></br>
    
        <label for="ctype">Customer type</label>
        <input type="text" name="ctype"></br>
    
        <label for="phone">Phone</label>
        <input type="text" name="phone"></br>

        <input type="submit" value="submit" name="submit">
    
        
               
	</form>
</body>
</html>