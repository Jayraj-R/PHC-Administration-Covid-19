<?php
echo '<div class="d-none">';
$conn=mysql_connect('localhost','root','');
$db=mysql_select_db('dbms_pr');
echo '</div>';

$cat=$_POST['searchby'];
$search=$_POST['search'];
if($_POST['searchby']=='ROLL')
	$qry="SELECT * FROM STUDENT WHERE ROLL LIKE '%$search'";
ELSE IF($_POST['searchby']=='NAME')
	$qry="SELECT * FROM STUDENT WHERE NAME LIKE '%$search%'";
ELSE IF($_POST['searchby']=='PROG')
	$qry="SELECT * FROM STUDENT WHERE PROG ='$search'";
ELSE IF($_POST['searchby']=='BRANCH')
	$qry="SELECT * FROM STUDENT WHERE BRANCH ='$search'";
ELSE IF($_POST['searchby']=='BATCH')
	$qry="SELECT * FROM STUDENT WHERE ROLL LIKE '$search%'";
ELSE IF($_POST['searchby']=='ALL')
	$qry="SELECT * FROM STUDENT";
ELSE IF($_POST['searchby']=='DATE')
	$qry="SELECT * FROM STUDENT";

$result=mysql_query($qry);
echo '<div class="mt-lg-5 row row-content justify-content-center">
		<div class="col-8"
			<div class="table-responsive">
				<table class="table table-striped" style="overflow-y: scroll; display:block;" height="400"> 
					<thead class="thead-dark">
						<tr>
							<th> Name </th> 
							<th> Roll </th>
							<th> Branch </th>
							<th> Programme </th>
							<th> Hall-Room no. </th> 
							<th> Phone number</th>
							
						</tr>
					</thead>
 '; 
while($row = mysql_fetch_assoc($result))
{
echo '<tr> 

<td>'.$row['NAME'].'</td>
<td>'.$row['ROLL'].'</td>
<td>'.$row['BRANCH'].'</td>
<td>'.$row['PROG'].'</td>
<td>'.$row['ADDRESS'].'</td>
<td>'.$row['phone_number'].'</td>


</tr>'; 
}
echo "</table></div></div>";



?>