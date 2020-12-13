<?php
	echo '<div class="d-none">';
	$conn=mysql_connect('localhost','root','');
	$db=mysql_select_db('dbms_pr');
	echo '</div>';

	$qry="SELECT * FROM BED WHERE VACANCY=1";
	$result=mysql_query($qry);
	$num=mysql_num_rows($result);
	
	if($num>0){
		$roll=$_POST['roll'];
		$in_date=date("Y-m-d");
		$qry="UPDATE BED SET ROLL='$roll', VACANCY=0,IN_DATE='$in_date' WHERE VACANCY=1 LIMIT 1";
		$result=mysql_query($qry);
		$qry="SELECT * FROM BED WHERE ROLL='$roll'";
		$result=mysql_query($qry);
		$row=mysql_fetch_assoc($result);
		

		
		echo '<div class="row justify-content-center" style="margin-left:20px;">
				<div class="yellow-box col" >
								<h3 class="mb-0 text-red">
									<center>Bed has been alloted.</center>
								</h3><br><p class="d-sm-block"><strong>'.$roll.'</strong>, you have been given bed no. '.$row['S_NO'].'</p>'; 
									
			echo'</div></div>';
				
		
		$day=date("d")+1;
		$in_date=date("Y-m-")."".$day;
		$bed_num=$row['S_NO'];
		$qry="INSERT INTO BED_LOG(ROLL,IN_DATE,S_NO) VALUES ('$roll','$in_date','$bed_num')";
		$result=mysql_query($qry);
	}
	else{
		$roll=$_POST['roll'];
		echo '<div class="row justify-content-center">
			<div class="yellow-box col" >
                            <h3 class="mb-0 text-red">
                                <center>No bed available.</center>
                            </h3><br><p class="d-sm-block"><strong>'.$roll.'</strong>, we are sorry no bed is available at the moment.</p>'; 
								
		echo'</div></div>';

		
	}
?>