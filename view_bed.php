<?php
	echo '<div class="d-none">';										#Bootstrap 'd-none' as mysql_connect is an old syntax.
	$conn=mysql_connect('localhost','root',''); 						#for wampserver/xampserver user
	$db=mysql_select_db('dbms_pr');
	echo '</div>';
	
	#---------------------------- STUDENT,BED : Display student details who occupies beds currently. ----------------------------------------------
	$qry="SELECT STUDENT.NAME,BED.ROLL,STUDENT.BRANCH,STUDENT.`phone_number`,BED.S_NO,BED.IN_DATE FROM BED,STUDENT WHERE STUDENT.ROLL=BED.ROLL AND BED.VACANCY=0  ";
	$result=mysql_query($qry);
	$num=mysql_num_rows($result);
	
	echo '<div class="mt-lg-5 row row-content justify-content-center">
		<div >
			<div class="table-responsive">
				<table class="table table-striped" style="display:block;" height="400"> 
					<thead class="thead-dark">
						<tr>
							<th>Name</th> 
							<th> <center>Roll </center></th>
							<th><center> Branch </center></th>
							<th><center> Phone number </center></th>
							<th> <center>Bed no. </center></th>
							<th><center> Date </center></th>
						</tr>
					</thead>
	'; 
	
	if($num>0){
	while($row=mysql_fetch_assoc($result)){
		echo '<tr> 
		<td >'.$row['NAME'].'</td>
		<td >'.$row['ROLL'].'</td>
		<td >'.$row['BRANCH'].'</td>
		<td >'.$row['phone_number'].'</td>
		<td ><center>'.'B0'.$row['S_NO'].'</center></td>
		<td >'.$row['IN_DATE'].'</td>
		</tr>';
		}
	echo "</table></div></div></div>";
	}
	#when given roll number does not match any roll number in the database.
	else echo"NO BED IS ALLOTED YET<br>";
?>