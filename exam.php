<?php
include("dblink.php");
?>

<?php


function load_score_fromDB ()
{	
	global $host, $user, $passwd, $database ,$tmpS ;
	$connect = new mysqli( $host, $user, $passwd, $database );
	$connect->query("SET NAMES 'utf8'");

	$doSQL = "SELECT * FROM `myworld` ORDER BY `myworld`.`id` ASC";
	

	$getData = $connect->query( $doSQL );
	
	$i = 0;
	$tmpS = array( );
	if ( $getData->num_rows > 0 ) {
		while ( $row = $getData->fetch_assoc() )
		{
			$tmpS[$i][0] = $row['chinese'];
			$tmpS[$i][1] = $row['english'];
			$i++;
			echo $row['chinese'] . $row["english"]. "<br>";
		}
	}
	else
	{
		echo '沒東西啦';
	}
	return $tmpS;
}


?>

<HTML>
	<BODY>
		
		<BR>
		<HR>
		<B>全部單字</B>
		<BR>
	
<?php
$name = array( "apollo", "vickey", "pig" );
$CC = tosql();
$score = load_score_fromDB();

// $WinS = 0;
// for ( $i=0 ; $i<3 ; $i++ )
// {
	// if ( $WinS < count_score( $score[$i] ) )
	// {
		// $WinS = count_score( $score[$i] );
		// $WinI = $i;
	// }
// }

// echo "<HR>第一名：".$name[$WinI]."<BR>總分：".$WinS."<BR>平均：" , ($WinS/3);
?>

		<HR>
		<FORM action="insert.php" method="post">
			<INPUT type="SUBMIT" value="回主選單"/>
		</FORM>
	</BODY>	
</HTML>