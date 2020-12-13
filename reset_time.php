<?php
	echo '<div class="d-none">';
	$conn=mysql_connect('localhost','root','');
	$db=mysql_select_db('dbms_pr');
	echo '</div>';


	for($i=1;$i<=5;$i++){
		$qry="UPDATE TIME SET COUNT=NULL WHERE S_NO='$i'";
		$result=mysql_query($qry);
	}
	
	header('Location: main.php');
	
?>