<DOCTYPE html>

    <html>

    <head>

        <head>
            <!-- Required meta tags always come first -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta http-equiv="x-ua-compatible" content="ie=edge">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
            <link rel="stylesheet" href="styles-main.css">

            <title>
                Health Center Administration
            </title>
        </head>

    </head>

    <body>

        <div class="col-12">
            <img class="head-img" src="img/title14.jpg">
        </div>


        <div class="container-fluid ml-3">
            <div class="row justify-content-between">
				<!-- Side Navigation panel -->
                <div class="col-md-2 bg-main padding-0">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active bg-main text-white" id="patient-tab" data-toggle="pill" href="#patient" role="tab" aria-controls="patient" aria-selected="true">Patients</a>
                        <a class="nav-link  bg-main text-white" id="allot-bed-tab" data-toggle="pill" href="#allot-bed" role="tab" aria-controls="allot-bed" aria-selected="false">Allot-deallot bed</a>
                        <a class="nav-link bg-main text-white" id="current-bed-tab" data-toggle="pill" href="#current-bed" role="tab" aria-controls="current-bed" aria-selected="false">Currently allotted bed</a>
						<a class="nav-link  bg-main text-white" id="positive-tab" data-toggle="pill" href="#positive" role="tab" aria-controls="positive" aria-selected="true">Covid-19 positive patients</a>
                        <a class="nav-link bg-main text-white" id="doctor-tab" data-toggle="pill" href="#doctor" role="tab" aria-controls="doctor" aria-selected="false">Doctors</a>
						<a class="nav-link bg-main text-white ml-5" data-toggle="pill" role="tab" aria-selected="false">&nbsp;&nbsp; <a class="links" style="text-decoration: none;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='#007aff'" href="reset_time.php">&nbsp;&nbsp;  Reset time</a><a style="text-decoration: none;"  onMouseOver="this.style.color='white'" onMouseOut="this.style.color='#007aff'" href="logout.php">&nbsp;&nbsp; Logout</a>
						<a class="nav-link bg-main text-white ml-5" data-toggle="pill" role="tab" aria-selected="false">&nbsp;&nbsp; <a class="links" style="text-decoration: none;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='#007aff'" href="index.php" target="_blank">&nbsp;&nbsp;  Fill a form</a>
                    </div>
                </div>
				
				<!-- Actual content block(s) -->
                <div class="col-md-10 content">
                    <div class="tab-content bg-white" id="v-pills-tabContent">
					
						<!-- Patient tab -->
                        <div class="tab-pane fade show active " id="patient" role="tabpanel" aria-labelledby="patient-tab">
                            <div class="row mt-3 justify-content-center">
								<div class="col-8">
									<!-- search query form -->
									<form role=" form " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
										<div class="form-group row justify-content-start">
											<label for="searchby" class="col-2 col-form-label "><strong>Search by</strong></label>
											<div class="col-3">
												<select class="form-control" name="searchby">
												<option name="ALL" value="ALL">ALL</option>
												<option name="ROLL" value="ROLL">Roll no.</option>
												<option name="NAME" value="NAME">Name</option>
												<option name="DATE" value="DATE">Date</option>
												<option name="TIME" value="TIME">Time slot</option>
												<option name="BRANCH" value="BRANCH">Branch</option>
												<option name="PROG" value="PROG">Programme</option>
												<option name="BATCH" value="BATCH">Batch</option>
											</select>
											</div>
											
											<label for="search" class="col-2 col-form-label "><strong>Search for</strong></label>
											<div class="col-3">
												<input type="text" class="form-control" id="search" name="search">
											</div>
											<div class="col-2">
												<button type="submit" class="btn btn-primary" name="patient-btn" value="patient-btn" >
													<strong>Search</strong>
												</button>
												
											</div>
										</div>
									</form>
								</div>
							</div>
							
							<!-- This block is only activated when "Search" button is pressed. -->
							<?php
								if(isset($_POST['patient-btn'])){
									include 'view_patient.php';
								}
							?>
							
                        </div>
						<!-- Patient complete -->
                        
						<!-- Allot-deallot tab -->
                        <div class="tab-pane fade" id="allot-bed" role="tabpanel" aria-labelledby="allot-bed-tab">
							<div class="row mt-5">
								
								<div class="col-8">
									<form role=" form " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
										<div class="form-group row justify-content-around">
											<input type="text" class="col-md-3 form-control" id="roll" name="roll" placeholder="Roll number" required>
										</div>
										<div class="form-group mt-5 row justify-content-around">
											<button type="submit" class="col-2 btn btn-success" name="bed-allot-btn" value="bed-allot--btn" >
														<strong>Allot</strong>
											</button>
											<button type="submit" class="col-2 btn btn-danger" name="bed-deallot-btn" value="bed-deallot-btn" >
														<strong>Deallot</strong>
											</button>
										</div>
										<div class="row justify-content-center">
											<!-- This block is only activated when "Allot" button is pressed. -->
											<?php
												if(isset($_POST['bed-allot-btn'])){
													include 'allot_bed.php';
												}
											?>
											<!-- This block is only activated when "Deallot" button is pressed. -->
											<?php
												if(isset($_POST['bed-deallot-btn'])){
													include 'deallot_bed.php';
												}
											?>
										</div>
										
								</div>
							
								<div class="col-3">
									<!-- Showing the number of bed currently available -->
									<div class="card">
										<h4 class="card-header bg-main text-white">Total Bed Available</h4>
										<div class="card-body">
											<?php
												echo '<div class="d-none">';
												$conn=mysql_connect('localhost','root','');
												$db=mysql_select_db('dbms_pr');
												echo '</div>';

												$qry="SELECT * FROM BED WHERE VACANCY=1";
												$result=mysql_query($qry);
												$num=mysql_num_rows($result);
												echo "<center>".$num."/5</center>";
												
											?>
										</div>
									</div>		
								</div>
							</div>
						</div>
						<!--Allot-Deallot complete -->
						
						<!-- View current bed tab -->
                        <div class="tab-pane fade" id="current-bed" role="tabpanel" aria-labelledby="current-bed-tab">
						
							<?php
								include 'view_bed.php';	
							?>
						</div>
						
						
						<!-- View doctor tab -->
                        <div class="tab-pane fade" id="doctor" role="tabpanel" aria-labelledby="doctor-tab">
							<?php
								include 'doc.php';	
							?>
						</div>
						
						
						<!-- All covid patient till date tab -->
						<div class="tab-pane fade" id="positive" role="tabpanel" aria-labelledby="positive-tab">
							<?php
								include 'covid_pos.php';	
							?>
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
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>

    </html>