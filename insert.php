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
function print_exam_gain ( $msg )
{
	//global ;
	
	$TEM = '<form action="exam.php" method="post">
			<input type="submit" value="開始測驗" />
			</form>';	
	
	define( 'HTML_gain', $TEM );
	
	
  	echo $msg;
	echo HTML_gain;
}



if ($_POST['chinese']==true)
	print_exam_gain();
	
	


?>