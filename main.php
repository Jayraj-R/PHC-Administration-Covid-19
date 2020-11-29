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
            <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
            <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
            <link rel="stylesheet" href="styles-main.css">

            <title>
                PHC Administration
            </title>
        </head>

    </head>

    <body>

        <div class="col-12">
            <img class="head-img" src="img/title14.jpg">
        </div>


        <div class="container-fluid ml-3">
            <div class="row justify-content-between">
                <div class="col-md-2 bg-main padding-0">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active bg-main text-white" id="patient-tab" data-toggle="pill" href="#patient" role="tab" aria-controls="patient" aria-selected="true">Patient</a>
                        <a class="nav-link bg-main text-white" id="feature2-tab" data-toggle="pill" href="#feature2" role="tab" aria-controls="feature2" aria-selected="false">feature2</a>
                        <a class="nav-link bg-main text-white" id="feature3-tab" data-toggle="pill" href="#feature3" role="tab" aria-controls="feature3" aria-selected="false">feature3</a>
                        <a class="nav-link bg-main text-white" id="feature4-tab" data-toggle="pill" href="#feature4" role="tab" aria-controls="feature4" aria-selected="false">feature4</a>
                    </div>
                </div>
                <div class="col-md-10 content">
                    <div class="tab-content bg-white" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="patient" role="tabpanel" aria-labelledby="patient-tab">
                            <div class="row mt-3 justify-content-center">
								<div class="col-8">
									<form role=" form " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
										<div class="form-group row justify-content-start">
											<label for="searchby" class="col-2 col-form-label "><strong>Search by</strong></label>
											<div class="col-3">
												<select class="form-control" name="searchby">
												<option name="ALL" value="ALL">ALL</option>
												<option name="ROLL" value="ROLL">Roll no.</option>
												<option name="NAME" value="NAME">Name</option>
												<option name="DATE" value="DATE">Date</option>
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
												<button type="submit" class="btn btn-primary" name="searchbtn" value="searchbtn" >
													<strong>Search</strong>
												</button>
												
											</div>
										</div>
									</form>
								</div>
							</div>
							
							<?php
								if(isset($_POST['searchbtn'])){
									include 'view_patient.php';
								}
							?>
							
                        </div>
                        
                        <div class="tab-pane fade" id="feature2" role="tabpanel" aria-labelledby="feature2-tab">feature2</div>
                        <div class="tab-pane fade" id="feature3" role="tabpanel" aria-labelledby="feature3-tab">feature3</div>
                        <div class="tab-pane fade" id="feature4" role="tabpanel" aria-labelledby="feature4-tab">feature4</div>
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