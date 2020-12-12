<?php
	$conn=mysql_connect('localhost','root','');
	$db=mysql_select_db('dbms_pr');
	$qry="SELECT NAME,ROLL,S_NO FROM BED,STUDENT WHERE STUDENT.ROLL=BED.ROLL AND BED.VACANCY=0";
	$result=mysql_query($qry);
	$num=mysql_num_rows($result);
	if($num>0){
	while($row=mysql_fetch_assoc($result)){
		echo '<tr> 

<td>'.$row['NAME'].'</td>
<td>'.$row['ROLL'].'</td>
<td>'.'BED NO. '.$row['S_NO'].'</td>
<td>'.$row['IN_DATE'].'</td>
</tr>';
		}
	}
	else echo"NO BED IS ALLOTED YET<br>";
?>