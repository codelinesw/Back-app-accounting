<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio - este sitio esta dedicado para pruebas</title>
</head>
<link rel="stylesheet" href="<?php echo path;?>bootstrap-4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo path;?>fontawesome/css/all.css">
<link rel="stylesheet" href="<?php echo path;?>css/styles_.min.css">
<body>
	<header class="main-navigation">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Evil-Testing</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/website-testing/">Inicio<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href=/website-testing/login/>Iniciar Sesiòn<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
	</header>	
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card text-center p-3 mb-3 bg-white ml-0 border-0 col-md-8 mt-3">
            <div class="card-body">
              <img src="<?php echo path;?>img/portal/svg/002-dog-training.svg" class="card-img-top mb-4"  width="95" height="95" alt="...">
              <h2 class="card-title font-weight-bold text-success" >Soy un prestador</h2>
               <p class="card-text text-secondary">Con Evil-Testing tu mascota se sentira en casa, ya no tendras por que procuparte por ella,nosotros cuidamos de ella</p>
            </div>
          </div>
         
      </div>
      <div class="col">
        <div class="alert alert-danger" role="alert" style="margin-top: 50px; display: none;">A simple danger alert—check it out!</div>
        <div class="mainbox col-md-16 mx-auto container-form-rg" style="margin-top: 50px;">
    <div class="card">
      <div class="card-group-item">
        <div class="card-header">
          <h6 class="title">Registrate </h6>
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
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
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
                    <button id="btn-login" href="#" class="btn btn-primary pull-right btn-rg">Registrarme</button>
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-13 control">
                      <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >¿Ya tienes una cuenta? <a href="/website-testing/login/">Iniciar Sesiòn</a>
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
    </div>
  </div>
  <script src="<?php echo path;?>js/jquery-3.4.1.min.js"></script>
  <script src="<?php echo path;?>js/script.min.js"></script>
</body>

</html>