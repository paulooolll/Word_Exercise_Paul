<?php
include("insert.php");
include("dblink.php");
?>


<?php
//函式區
function print_error_msg ( $msg )
{
	//global ;
	
	$TMP = '<HTML>
				<BODY>
					<FORM action="insert.php" method="post">
						<INPUT type="SUBMIT" value="back"/>
					</FORM>
				</BODY>
			 <HTML>';	
	
	define( 'HTML_BACKCODE', $TMP );
	
	
  	echo $msg;
	echo HTML_BACKCODE;
}



function insert_data ($login_chinese,$login_english)
{
	global $host, $user, $passwd, $database ;
	// INSERT date
	$sql = "INSERT INTO Myworld (chinese, english)"."VALUES"."(".'"'.$login_chinese.'"'.",".'"'.$login_english.'"'.")";
	//echo $sql. "<br>" ;
	
	$connect2 = new mysqli( $host, $user, $passwd, $database );
	if ($connect2->query($sql) === TRUE) 
	{
	  //echo "New record created successfully";
	} 
	else 
	{
	  //echo "Error: " . $sql . "<br>" . $connect->error;
	  create_DB ();
	  $connect2 = new mysqli( $host, $user, $passwd, $database );
	  $connect2->query($sql);
	}
	$connect2->close();
}

?>



<?php


	$login_chinese = $_POST['chinese'];
	$login_english = $_POST['english'];

	//echo $login_chinese,$login_english ;
	
	if ( $login_chinese == "" )
		print_error_msg( "中文 不能輸入空白!" );	 
	else if ( $login_english == "" )
		print_error_msg( "英文 不能輸入空白!" );
	else 		
		insert_data ($login_chinese,$login_english);
	//else
		//check_user( $login_name, $login_passwd );
	
		
	
?>
	