<?php
	echo '<div class="d-none">';										#Bootstrap 'd-none' as mysql_connect is an old syntax.
	$conn=mysql_connect('localhost','root',''); 						#for wampserver/xampserver user
	$db=mysql_select_db('dbms_pr');
	echo '</div>';

	$qry="SELECT * FROM BED WHERE VACANCY=1"; 							#BED table: VACANCY=1 => Bed is available.
	$result=mysql_query($qry);
	$num=mysql_num_rows($result);
	
	#-------------------------------------------- Atleast one bed is available ---------------------------------------------
	
	if($num>0){ 														
		$roll=$_POST['roll'];
		$in_date=date("Y-m-d");
		$qry="UPDATE BED SET ROLL='$roll', VACANCY=0,IN_DATE='$in_date' WHERE VACANCY=1 LIMIT 1";
		$result=mysql_query($qry);
		$qry="SELECT * FROM BED WHERE ROLL='$roll'";
		$result=mysql_query($qry);
		$row=mysql_fetch_assoc($result);
		

		#Confirmation message design.
		echo '<div class="row justify-content-center" style="margin-left:20px;">
				<div class="yellow-box col" >
								<h3 class="mb-0 text-red">
									<center>Bed has been alloted.</center>
								</h3><br><p class="d-sm-block"><strong>'.$roll.'</strong>, you have been given bed no. '.$row['S_NO'].'</p>'; 
									
			echo'</div></div>';
				
		
		#----------------------------------------- Updating BED_LOG: adding the newly allotted bed details ------------------------------------
		$day=date("d");
		$in_date=date("Y-m-")."".$day;
		$bed_num=$row['S_NO'];
		$qry="INSERT INTO BED_LOG(ROLL,IN_DATE,S_NO) VALUES ('$roll','$in_date','$bed_num')";
		$result=mysql_query($qry);
	}
	
	#----------------------------------------------- No bed is available -----------------------------------------------------------------------
	
	else{  																
		$roll=$_POST['roll'];
		
		#Confirmation message design.
		echo '<div class="row justify-content-center">
			<div class="yellow-box col" >
                            <h3 class="mb-0 text-red">
                                <center>No bed available.</center>
                            </h3><br><p class="d-sm-block"><strong>'.$roll.'</strong>, we are sorry no bed is available at the moment.</p>'; 
								
		echo'</div></div>';
	}
?>