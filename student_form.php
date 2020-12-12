<?php

	echo '<div class="d-none">';
$conn=mysql_connect('localhost','root','');
		$db=mysql_select_db('dbms_pr');
echo '</div>';

		//assinging values to variables
		$name=$_POST['fname'];
		$roll=$_POST['roll'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
		$prog=$_POST['prog'];
		$branch=$_POST['branch'];
		$weight=$_POST['wght'];
		$height=$_POST['hght'];
		$address=$_POST['H-R'];
		$phone=$_POST['pno'];
		$email="";
		//echo$name." and ".$roll."<br>";
		//query to add student's data into database
		$qry="INSERT INTO STUDENT(ROLL,NAME,AGE,PROG,BRANCH,HEIGHT,WEIGHT,ADDRESS,PHONE_NUMBER,GENDER) VALUES ('$roll','$name','$age','$prog','$branch','$height','$weight','$address','$phone','$gender')";
		$result=mysql_query($qry);
		if($result){
			$qry="SELECT * FROM TIME WHERE COUNT IS NOT NULL AND COUNT<5";
			//if count of any slot is less than 5
			$result=mysql_query($qry);
			$num = mysql_num_rows($result);
			
			
			
						
						
			if($num>0){
				$row = mysql_fetch_assoc($result);
				$pev=$row['COUNT'];
				$curr=$pev + 1;
				$time=$row['TIME_SLOT'];
				$sno=$row['S_NO'];
				$day=date("d")+ 1;
				$other=date("F Y");
				$full_date=date("Y-m-");
				$inserted_date=$full_date."".$day;
				$qry="UPDATE TIME SET COUNT='$curr' WHERE S_NO='$sno'";
				$result1=mysql_query($qry);
				
				echo '<div class="row justify-content-center">
			<div class="yellow-box col-8" >
                            <h3 class="mb-0 text-red">
                                <center>You have been registered for Covid-19 test.</center>
                            </h3><br><p class="d-sm-block"><strong>'.$name.'</strong>, you have been registered for the mandatory Covid-19 test. Please report to the campus PHC for your physical test at the given time and date. A mail has been sent to your institute email-id. Kindly wear your mask to the venue.<br> Thank you.</p><p class="d-sm-block">'; 
								echo'<strong><center>Time slot is '.$time.' of '.$day.' '.$other.'</center></strong>';
						echo'</div></div>';
				
				
				$qry="INSERT INTO ALLOTTED_TIME(ROLL,TIMESLOT,DATE) VALUES ('$roll','$time','$inserted_date')";
				$result3=mysql_query($qry);
				/*$to = "akamanjangra@gmail.com";
				$subject = "My subject";
				$txt = "NAME: ".$name."<br>Roll Number: ".$roll."<br>time slot alloted is ".$time." of ".$day." ".$other."<br>";
				$headers = "From: fly.01.higher@gmail.com";

				mail($to,$subject,$txt,$headers);*/
			
			}
			else{
				//if count is 5 nd next slot is null
				$qry="SELECT * FROM TIME WHERE COUNT IS NULL LIMIT 1";
				$result=mysql_query($qry);
				$num = mysql_num_rows($result);	
				if($num>0){
					while($row1 = mysql_fetch_assoc($result)){
						$curr=1;
						$time=$row1['TIME_SLOT'];
						$sno=$row1['S_NO'];
						$day=date("d") + 1;
						$other=date("F Y");
						$qry="UPDATE TIME SET COUNT='$curr' WHERE S_NO='$sno'";
						$result1=mysql_query($qry);
						
						
						echo '<div class="row justify-content-center">
			<div class="yellow-box col-8" >
                            <h3 class="mb-0 text-red">
                                <center>You have been registered for Covid-19 test.</center>
                            </h3><br><p class="d-sm-block"><strong>'.$name.'</strong>, you have been registered for the mandatory Covid-19 test. Please report to the campus PHC for your physical test at the given time and date. A mail has been sent to your institute email-id. Kindly wear your mask to the venue.<br> Thank you.</p><p class="d-sm-block">'; 
								echo'<strong><center>Time slot is '.$time.' of '.$day.' '.$other.'</center></strong>';
						echo'</div></div>';
						
						
						
						$qry="INSERT INTO ALLOTTED_TIME(ROLL,TIME_SLOT,TEST_DATE) VALUES ('$roll','$time','$day')";
				$result3=mysql_query($qry);
						/*$to = "akamanjangra@gmail.com";
						$subject = "My subject";
						$txt = "NAME: ".$name."<br>Roll Number: ".$roll."<br>time slot alloted is ".$time." of ".$day." ".$other."<br>";
						$headers = "From: fly.01.higher@gmail.com";

						mail($to,$subject,$txt,$headers);*/
					}
				}
				else {
					$qry="DELETE FROM STUDENT WHERE ROLL='$roll'";
					$result=mysql_query($qry);
					
					echo '<div class="row justify-content-center">
			<div class="yellow-box col-8" >
                            <h3 class="mb-0 text-red">
                                <center>No Time slot left, please try again tommorrow.</center>
                            </h3>
							<br>
                                <p class="d-sm-block"><strong>'.$name.'</strong>, timeslot for tommorow\'s batch has been filled, please try again tommorrow.<br>Thank You.</p><p class="d-sm-block">'; 
						echo'</div></div>';}
					
					
					
			}
		}
		else{
			echo '<div class="row justify-content-center">
			<div class="yellow-box col-8" >
                            <h3 class="mb-0 text-red">
                                <center>Technical error occured...</center>
                            </h3>
							<br>
                                <p class="d-sm-block"><strong><center>'.mysql_error().'</center></strong></p><br>'; 
						echo'</div></div>';
			}



?>