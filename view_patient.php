<?php
	echo '<div class="d-none">';										#Bootstrap 'd-none' as mysql_connect is an old syntax.
	$conn=mysql_connect('localhost','root',''); 						#for wampserver/xampserver user
	$db=mysql_select_db('dbms_pr');
	echo '</div>';


	#---------------------- Query selecttion as per as the requirement ------------------------------------
	$cat=$_POST['searchby'];
	$search=$_POST['search'];
	if($_POST['searchby']=='ROLL')
		$qry="SELECT * FROM STUDENT WHERE ROLL LIKE '%$search'";
	ELSE IF($_POST['searchby']=='NAME')
		$qry="SELECT * FROM STUDENT WHERE NAME LIKE '%$search%'";
	ELSE IF($_POST['searchby']=='PROG')
		$qry="SELECT * FROM STUDENT WHERE PROG LIKE '$search'";
	ELSE IF($_POST['searchby']=='BRANCH')
		$qry="SELECT * FROM STUDENT WHERE BRANCH LIKE '$search'";
	ELSE IF($_POST['searchby']=='BATCH')
		$qry="SELECT * FROM STUDENT WHERE ROLL LIKE '$search%'";
	ELSE IF($_POST['searchby']=='ALL')
		$qry="SELECT * FROM STUDENT";
	ELSE IF($_POST['searchby']=='DATE')
		$qry="SELECT * FROM ALLOTTED_TIME, STUDENT WHERE STUDENT.ROLL=ALLOTTED_TIME.ROLL AND DATE LIKE '%$search%'";
	ELSE IF($_POST['searchby']=='TIME')
		$qry="SELECT * FROM ALLOTTED_TIME, STUDENT WHERE STUDENT.ROLL=ALLOTTED_TIME.ROLL AND TIMESLOT LIKE '$search%';";

	#----------------------------------- STUDENT: Display --------------------------------------------------
	$result=mysql_query($qry);
	echo '<div class="mt-lg-5 row row-content justify-content-center">
			<div class="col-8"
				<div class="table-responsive">
					<table class="table table-striped" style="overflow-y: scroll; display:block;" height="400"> 
						<thead class="thead-dark">
							<tr>
								<th> Name </th> 
								<th><center> Roll </center></th>
								<th><center> Branch </center></th>
								<th><center> Programme </center></th>
								<th> Hall-Room no.</th> 
								<th> Phone number</th>
								
							</tr>
						</thead>
	 '; 
	while($row = mysql_fetch_assoc($result))
	{
	echo '<tr> 
			<td>'.$row['NAME'].'</td>
			<td><center>'.$row['ROLL'].'</center></td>
			<td><center>'.$row['BRANCH'].'</center></td>
			<td><center>'.$row['PROG'].'</center></td>
			<td>'.$row['ADDRESS'].'</td>
			<td>'.$row['phone_number'].'</td>
		</tr>'; 
	}
	echo "</table></div></div>";
?>