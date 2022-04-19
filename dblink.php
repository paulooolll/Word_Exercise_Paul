<?php
$host = "localhost";
$user = "root";
$passwd = "";
$database = "Word_Exercise";
?>

<?php
function create_DB ()
{
	global $host, $user, $passwd, $database ;
	// Create database
	$connect = new mysqli( $host, $user, $passwd );
	 
	if ( $connect->connect_error )
		die( "連線失敗: ".$connect->connect_error );
	echo "連線成功";
	
	$sql = "CREATE DATABASE Word_Exercise";	
	if ($connect->query($sql) === TRUE) {
	  //echo "Database created successfully";
	} else {
	  echo "Error creating database: " . $connect->error. "<br>"; 
	}
	$connect->close();
	
	$connect2 = new mysqli( $host, $user, $passwd, $database );
	// sql to create table
	$sql = "CREATE TABLE Myworld (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	chinese VARCHAR(30) NOT NULL,
	english VARCHAR(30) NOT NULL,
	reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";

	if ($connect2->query($sql) === TRUE) {
	  //echo "Table Myworld created successfully";
	 
	} else {
	  echo "Error creating table: " . $connect->error. "<br>";
	}
}

function tosql()
{
	global $host, $user, $passwd, $database ;
	$connect = new mysqli( $host, $user, $passwd, $database );
	 
	if ( $connect->connect_error )
		die( "連線失敗: ".$connect->connect_error );
		
	return $connect;
}


?>