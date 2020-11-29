<!DOCTYPE html>

<?php
   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>


<html>

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="style.css">

    <title>
        PHC
    </title>
</head>

<body>
    
        <div class="col-12">
            <img class="head-img" src="img/title14.jpg">
        </div>
<div class="row justify-content-center login-card">
        <div class="col-8 mt-5">
            <div class="card">
                <h3 class="card-header bg-main text-white"><center>Primary Health Center</center></h3>
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#student" role="tab" data-toggle="tab">
                                Student
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="#admin" role="tab" data-toggle="tab">
                                Administration
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane fade show active" id="student">

                            <form class="mt-5 padding-16" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group row">
                                    <label for="roll" class="col-md-2 col-form-label ">Roll no.</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="roll" name="roll" placeholder="Roll number" required>
                                    </div>


                                    <label for="fname" class="col-md-2 col-form-label ">Full Name</label>
                                    <div class="col-md-4">
                                        <input type="fname" class="form-control" id="fname" name="fname" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label for="prog" class="col-md-2 col-form-label ">Programme</label>
                                    <div class="col-md-4">
                                        <select class="form-control" id="prog" name="prog">
                                                <option value="B.Tech">B.Tech</option>
                                                <option value="B.Des" >B.Des</option>
                                                <option value="M.Tech">M.Tech</option>
                                                <option value="B.Des">M.Des</option>
                                            </select>
                                    </div>

                                    <label for="prog" class="col-md-2 col-form-label ">Branch</label>
                                    <div class="col-md-4">
                                        <select class="form-control" id="branch" name="branch">
                                                <option value="CSE">CSE</option>
                                                <option value="ECE">ECE</option>
                                                <option value="MECH">MECH</option>
                                                <option value="Design">Design</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group row mt-5">
                                    <h4><strong>Personal Details</strong></h4>
                                </div>

                                <div class="form-group row">
                                    <label for="age" class="col-md-2 col-form-label ">Age</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="age" name="age" placeholder="Age">
                                    </div>


                                    <label for="gender" class="col-md-2 col-form-label ">Gender</label>
                                    <div class="col-md-4">
                                        <select class="form-control" id="gender" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="wght" class="col-md-2 col-form-label ">Weight</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="wght" name="wght" placeholder="Weight(kg)">
                                    </div>


                                    <label for="hght" class="col-md-2 col-form-label ">Height</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="hght" name="hght" placeholder="Height(cm)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="H-R" class="col-md-2 col-form-label ">Hall no. and Room no.</label>
                                    <div class="col-md-4">
                                        <textarea class="form-control" id="H-R" name="H-R" rows="2" placeholder="Hall-n, Room-X123"></textarea>
                                    </div>



                                    <label for="pno" class="col-md-2 col-form-label ">Phone no.</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="pno" name="pno" placeholder="Phone number">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-8 offset-5 mt-3">
                                        <button type="submit" class="btn btn-primary" value="submit" name="submit">
                                            Check for an appointment
                                        </button>
                                    </div>
                                </div>
                            </form>
							
							<?php
if(isset($_POST['submit'])) 
{ 

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
				$qry="UPDATE TIME SET COUNT='$curr' WHERE S_NO='$sno'";
				$result1=mysql_query($qry);
				
				echo '<div class="row justify-content-center">
			<div class="yellow-box col-8" >
                            <h3 class="mb-0 text-red">
                                <center>You have been registered for Covid-19 test.</center>
                            </h3><br><p class="d-sm-block"><strong>'.$name.'</strong>, you have been registered for the mandatory Covid-19 test. Please report to the campus PHC for your physical test at the given time and date. A mail has been sent to your institute email-id. Kindly wear your mask to the venue.<br> Thank you.</p><p class="d-sm-block">'; 
								echo'<strong><center>Time slot is '.$time.' of '.$day.' '.$other.'</center></strong>';
						echo'</div></div>';
				
				
				$qry="INSERT INTO ALLOTED_TIME(ROLL,TIME_SLOT) VALUES ('$roll','$time')";
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
						
						
						
						$qry="INSERT INTO ALLOTED_TIME(ROLL,TIME_SLOT) VALUES ('$roll','$time')";
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

}
?>
							
							
							
							
							
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="admin">
                    


                                <form class="mt-5 form-signin" role=" form " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <h4 class="form-signin-heading">
                                    </h4>
                                    <div class="form-group row">
                                        <label for="userid" class="offset-md-3 col-md-2 col-form-label  ">User ID</label>

                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="userid" name="userid" placeholder="User ID" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pass" class="offset-md-3 col-md-2 col-form-label ">Password</label>
                                        <div class="col-md-4">
                                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
                                        </div>
                                    </div>
									
									
									<?php
if(isset($_POST['login'])) 
{ 
    if($_POST['userid']&& $_POST['pass']){
				if($_POST['userid']=="pdpmiiitdmj"&&$_POST['pass']==12345){
					header('Location: main.php');
				}
				else echo '<h4 style="color: red; font-size: 0.9em; text-align: center;">Wrong credential(s)</h4>';

			}
			else {
				echo"enter both userID AND password<br>";
			}
}
?>


                                    <div class="form-group row">
                                        <div class="offset-md-5 col-md-10">
										<button type="submit" class="btn btn-primary" name="login" value="login" >
                                            Login
                                        </button>
                                            
                                        </div>
                                    </div>
                                </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	<footer class="footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <p>© Copyright 2020 IIITDM-Jabalpur | <a href="web-team.php">Web Team</a></p>
                </div>
            </div>
        </div>
    </footer>
	
	
	
	
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>