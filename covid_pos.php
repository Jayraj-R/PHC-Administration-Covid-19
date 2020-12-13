<?php
	echo '<div class="d-none">';
	$conn=mysql_connect('localhost','root','');
	$db=mysql_select_db('dbms_pr');
	echo '</div>';

	$qry="SELECT STUDENT.NAME,BED_LOG.ROLL,BED_LOG.IN_DATE,BED_LOG.OUT_DATE,STUDENT.phone_number FROM STUDENT, BED_LOG WHERE STUDENT.ROLL=BED_LOG.ROLL";
	$result=mysql_query($qry);
	$num=mysql_num_rows($result);
	
	echo '<div class="mt-lg-5 row row-content justify-content-center">
		<div class="col-8"
			<div class="table-responsive">
				<table class="table table-striped" style="overflow-y: scroll; display:block;" height="400"> 
					<thead class="thead-dark">
						<tr>
							<th> Name </th> 
							<th><center> Roll </center></th>
							<th><center> In Date </center></th>
							<th><center> Out Date </center></th>
							<th> Phone number</th>
							
						</tr>
					</thead>
 '; 
	
	if($num>0){
		while($row=mysql_fetch_assoc($result)){
			echo '<tr> 
			<td>'.$row['NAME'].'</td>
			<td>'.$row['ROLL'].'</td>
			<td>'.$row['IN_DATE'].'</td>
			<td>'.$row['OUT_DATE'].'</td>
			<td>'.$row['phone_number'].'</td>
			</tr>';
		}
		
		
	echo "</table></div></div>";
	}
	else echo"SORRY!! NO DATA<br>";
?>