<?php 
    //1. Create a database connection

	
	define("DB_SERVER","localhost");
	define("DB_USER","root");
	define("DB_PASSWORD","");
	define("DB_NAME","car_rental_system");
    

    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

    //Test if connection succeeded
    
if(mysqli_connect_errno()){
    die("Database connection failed: " .
        mysqli_connect_error().
            "(".mysqli_connect_errno().")"
       );
}

?>