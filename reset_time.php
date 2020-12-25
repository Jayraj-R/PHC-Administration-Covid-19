<?php
	echo '<div class="d-none">';										#Bootstrap 'd-none' as mysql_connect is an old syntax.
	$conn=mysql_connect('localhost','root',''); 						#for wampserver/xampserver user
	$db=mysql_select_db('dbms_pr');
	echo '</div>';

	#Reseting timeslots to NULL when they are filled.
	for($i=1;$i<=5;$i++){
		$qry="UPDATE TIME SET COUNT=NULL WHERE S_NO='$i'";
		$result=mysql_query($qry);
	}
	
	header('Location: main.php');
	
?>