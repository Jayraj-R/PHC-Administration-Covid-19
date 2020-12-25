<?php
	echo '<div class="d-none">';										#Bootstrap 'd-none' as mysql_connect is an old syntax.
	$conn=mysql_connect('localhost','root',''); 						#for wampserver/xampserver user
	$db=mysql_select_db('dbms_pr');
	echo '</div>';
	
	#------------------------------------------------------------- DOCTOR : Display ---------------------------------------------------------------------------
	
	$qry="SELECT DOCTOR.NAME,DOCTOR.ID,DOCTOR.PHONE_NUMBER,TIME.TIME_SLOT FROM DOCTOR,DOC_AV,TIME WHERE DOCTOR.ID=DOC_AV.ID AND DOC_AV.TIME_SLOT=TIME.S_NO";
	$result=mysql_query($qry);
	
	#Bootstrap stripped table design
	echo'<br><br><br>';
	echo '<div class="mt-lg-5 row row-content justify-content-center">
		<div >
			<div class="table-responsive">
				<table class="table table-striped" style="display:block;" height="400"> 
					<thead class="thead-dark">
						<tr> 
							<th> <center>ID </center></th>
							<th><center> Name </center></th>
							<th><center> Phone number </center></th>
							<th> <center>Time slot</center></th>
						</tr>
					</thead>
	'; 
	
	
	#------------------------------------------------------ Displaying contents of the table ------------------------------------------------------------------
	while($row=mysql_fetch_assoc($result)){
					echo '<tr> 
			<td>'.$row['ID'].'</td>
			<td>'.$row['NAME'].'</td>
			<td>'.$row['PHONE_NUMBER'].'</td>
			<td>'.$row['TIME_SLOT'].'</td>
			</tr>';
	}
	echo "</table></div></div></div>";

?>