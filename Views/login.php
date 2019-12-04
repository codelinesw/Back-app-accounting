<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicia sesiòn</title>
</head>
<link rel="stylesheet" href="<?php echo path;?>bootstrap-4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo path;?>fontawesome/css/all.css">
<link rel="stylesheet" href="<?php echo path;?>css/styles_.min.css">
<body>
	<div class="container">
	<div class="mainbox col-md-6 mx-auto" style="margin-top: 50px;">
		<div class="card">
			<div class="card-group-item">
				<div class="card-header">
					<h6 class="title">Sign in </h6>
				</div>
				<div class="card-body">
					<form id="loginform" class="form-horizontal" role="form">
                            <div style="margin-bottom: 25px" class="input-group">
						      <div class="input-group-prepend">
						        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
						      </div>
						      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
						    </div>
						    <div style="margin-bottom: 25px" class="input-group">
						      <div class="input-group-prepend">
						        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
						      </div>
						      <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
						    </div>
							<div class="form-row" style="margin-bottom: 20px;">
								<div class="col-auto">
									<div class="input-group">
										<button id="btn-login" href="#" class="btn btn-primary pull-right">Login  </button>
									</div>
								</div>
								<div class="col-auto justify-content-end">
									<div class="input-group">
                                      <div class="checkbox justify-content-end">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                            	    </div>
								</div>
							</div>
                                <div class="form-group">
                                    <div class="col-md-13 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! <a href="/website-testing/user_profile_choice/">Sign Up Here</a>
                                        </div>
                                    </div>
                                </div>    
                            </form>
				</div>
				<div class="container_circle_preloader">
		           <div class="child_container_">
		             <div class="circle"><div class="child"></div></div>
		           </div>
        		</div>
			</div>
		</div>
	</div>
		   
    </div>
    
</body>
</html>