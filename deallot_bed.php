<?php
	echo '<div class="d-none">';
	$conn=mysql_connect('localhost','root','');
	$db=mysql_select_db('dbms_pr');
	echo '</div>';
	
	$roll=$_POST['roll'];
	$date=date("Y-m-d");
	$qry="UPDATE BED SET VACANCY=1,IN_DATE=NULL,ROLL=NULL WHERE ROLL='$roll'";
	$result=mysql_query($qry);
	if($result){
		$qry="UPDATE BED_LOG SET OUT_DATE='$date' WHERE ROLL='$roll'";
		$result=mysql_query($qry);
		
	}
	else echo'SORRY!! WRONG ENTRY<br>';
?>