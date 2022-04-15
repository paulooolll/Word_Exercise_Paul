
<form action="user.php" method="post">
中文:
<input type="text" name="chinese"  /> 
<br />
英文:
<input type="text" name="english"  /> 
<br />
確認:
<input type="submit" name="submit" value="login" />
</form>

<?php
$host = "localhost";
$user = "root";
$passwd = "";
$database = "Word_Exercise";

$connect = new mysqli( $host, $user, $passwd );
 
if ( $connect->connect_error )
    die( "連線失敗: ".$connect->connect_error );
echo "連線成功";

// Create database
$sql = "CREATE DATABASE Word_Exercise";
if ($connect->query($sql) === TRUE) {
  echo "Database created successfully";
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
  echo "Table Myworld created successfully";
} else {
  echo "Error creating table: " . $connect->error. "<br>";
}

?>

<?php


	$login_chinese = $_POST['chinese'];
	$login_english = $_POST['english'];

	echo $login_chinese,$login_english ;
	
		
	// INSERT date
	$sql = "INSERT INTO Myworld (chinese, english)"."VALUES"."(".'"'.$login_chinese.'"'.",".'"'.$login_english.'"'.")";
	echo $sql. "<br>" ;
	if ($connect2->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $connect->error;
	}

	$connect2->close();
?>
	