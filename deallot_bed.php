<?php
	echo '<div class="d-none">';										#Bootstrap 'd-none' as mysql_connect is an old syntax.
	$conn=mysql_connect('localhost','root',''); 						#for wampserver/xampserver user
	$db=mysql_select_db('dbms_pr');
	echo '</div>';
	
	#------------------------------------------------- BED: setting the allotted bed and the patient entry NULL ------------------------------------------
	$roll=$_POST['roll'];
	$date=date("Y-m-d");
	$qry="UPDATE BED SET VACANCY=1,IN_DATE=NULL,ROLL=NULL WHERE ROLL='$roll'";
	$result=mysql_query($qry);
	
	#--------------------------------------------------- BED_LOG: updating OUT_DATE of the deallotted patient --------------------------------------------
	if($result){
		$qry="UPDATE BED_LOG SET OUT_DATE='$date' WHERE ROLL='$roll'";
		$result=mysql_query($qry);
		
	}
	
	#----------------------------------------------------------- Given ROLL is not allotted a bed --------------------------------------------------------
	else echo'SORRY!! WRONG ENTRY<br>';
?>