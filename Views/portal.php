<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio - este sitio esta dedicado para pruebas</title>
</head>
<link rel="stylesheet" href="<?php echo path;?>bootstrap-4.3.1/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo path;?>fontawesome/css/all.css">
<body>
	<header class="main-navigation border-bottom">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Evil-Testing</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link btn" href="index.php">Solicitudes <span class="badge badge-dark">4</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="https://pngimage.net/wp-content/uploads/2018/06/user-png-image-5.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="">Jhon Murillo</a>
        <div class="dropdown-menu col-md-6" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Mi perfil</a>
          <a class="dropdown-item" href="#">Configuraciones</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Cerrar Sesión</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
	</header>
  <div class="container">
    <div class="row justify-content-center">
       <div class="col col-md-7 mt-5">
         <h3 class="card-title text-center">Bienvenido</h3>
         <p class="text-center text-justify">Hola <b>JHON MURILLO</b> ahora puedes disfrutar de los serviciós que ofrece Evil-Testing, recuerda que tu y tu mascota ahora hacen parte de nuestra familia</p>
       </div>
    </div>
    <div class="row">
        <div class="card-group mt-4">
          <div class="card ml-4 border rounded">
            <div class="card-body">
              <h5 class="card-title text-success">Paseadores</h5>
              <hr class="text-muted">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <a href="#" class="btn btn-outline-success">Visitar</a>
            </div>
            </div>
           <div class="card ml-4 border rounded">
            
            <div class="card-body">
              <h5 class="card-title text-success">Cuidadores</h5>
              <hr class="text-muted">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <a href="/website-testing/cuidadores/" class="btn btn-outline-success">Visitar</a>
            </div>
          </div>
           <div class="card ml-4 border rounded">
            
            <div class="card-body">
              <h5 class="card-title text-success">Tienda de alimentos</h5>
              <hr class="text-muted">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <a href="#" class="btn btn-outline-success">Visitar</a>
            </div>
          </div>
      </div>
    </div>
  </div>
  <script src="<?php echo path;?>js/jquery-3.4.1.min.js"></script> 
  <script src="<?php echo path;?>bootstrap-4.3.1/js/bootstrap.js"></script>	
</body>
</html>