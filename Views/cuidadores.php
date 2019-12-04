<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio - este sitio esta dedicado para pruebas</title>
</head>
<link rel="stylesheet" href="<?php echo path;?>bootstrap-4.3.1/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo path;?>fontawesome/css/all.css">
<link rel="stylesheet" href="<?php echo path;?>css/styles_.min.css">
<body>
	<header class="main-navigation">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/website-testing/portal/">Evil-Testing</a>
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
  <nav class="navbar navbar-expand-lg navbar-light border">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ordernar por
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <label for="" class="dropdown-item">Realiza un filtro</label>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Mejor calificacion</a>
          <a class="dropdown-item" href="#">Mas cercano</a>
          <a class="dropdown-item" href="#">El mas nuevo</a>
        </div>

      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Filtrar por distancia
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <label for="" class="dropdown-item">Escoje el prestador por distancia</label>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">0.31 Millas</a>
          <a class="dropdown-item" href="#">1 Kilometro</a>
          <a class="dropdown-item" href="#">2 Kilometros</a>
          <a class="dropdown-item" href="#">3 Kilometros</a>
          <a class="dropdown-item" href="#">4 Kilometros</a>
          <a class="dropdown-item" href="#">5 Kilometros</a>
          <a class="dropdown-item" href="#">10 Kilometros</a>
          <a class="dropdown-item" href="#">15 Kilometros</a>
          <a class="dropdown-item" href="#">20 Kilometros</a>
        </div>
        
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hora de recojida
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <label for="" class="dropdown-item">Escoje la hora de recojiga</label>
          <div class="dropdown-divider"></div>
          <div class="input-group col-md-12">
            <input type="time" class="form-control" aria-label="Amount (to the nearest dollar)">
            <div class="input-group-append">
              <span class="input-group-text"><i class="far fa-clock"></i></span>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hora de llegada
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <label for="" class="dropdown-item">Escoje la hora de llegada</label>
          <div class="dropdown-divider"></div>
          <div class="input-group col-md-12">
            <input type="time" class="form-control" aria-label="Amount (to the nearest dollar)">
            <div class="input-group-append">
              <span class="input-group-text"><i class="far fa-clock"></i></span>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Seleccionar por horario
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <label for="" class="dropdown-item">Escoje la fecha de tu servicio</label>
          <div class="dropdown-divider"></div>
          <div class="input-group col-md-12">
            <input type="date" class="form-control" aria-label="Amount (to the nearest dollar)">
            <div class="input-group-append">
              <span class="input-group-text"><i class="far fa-calendar"></i></span>
            </div>
          </div>
        </div>
        
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="A quien buscas..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
  </nav>
	</header>
  <div class="container">
    <div class="row justify-content-start ">
      <div class="form-group row d-flex mt-3 ml-4">
          <label for="inputPassword" class="col-form-label d-flex"><i class="fas fa-shoe-prints mr-2 text-success"></i> <p class="count text-success font-weight-bold" style="position:relative;top:-4px;font-size:20px;">305</p><p class="ml-1 font-weight-normal text-secondary">Cuidadores</p></label>
           <div class="input_group ml-3">
            <button type="button" class="btn btn-outline-secondary"><span class="fas fa-list"></span> Lista</button>
          </div>
          <div class="input_group ml-3">
            <button type="button" class="btn btn-outline-secondary"><span class="fas fa-th"></span> Cuadricula</button>
          </div>
      </div>
    </div>
    <div class="row" id="content-card-render">
      <div class="container-global-preloader mt-5">
          <div class="global-preloader">
              <div class="preloader">
                  <div class="bar bar-one"></div>
                  <div class="bar bar-two"></div>
              </div>
          </div>
        </div>
    </div>
    <div class="row text-center justify-content-center mt-3 mb-4" style="display: none;">
      <button type="button" class="btn btn-lg btn-outline-success">Carga más</button>
    </div>
  </div>
  <script src="<?php echo path;?>js/jquery-3.4.1.min.js"></script> 
  <script src="<?php echo path;?>bootstrap-4.3.1/js/bootstrap.js"></script>	
  <script>
    var pane = document.querySelector('#content-card-render');

    var data = [0,3,6];
    var dom = ""
    var html = data.map((i,index) => {
      let val = parseInt(i.toString()+"00");
      return(`<div class="col-sm-4"><div class="card ml-1 mb-3 rounded shadow card-normal card-active-animation${i}" style="border-top: 5px solid #28a745;"><div class="card-body  justify-content-center text-center"><div><img src="https://pngimage.net/wp-content/uploads/2018/06/user-png-image-5.png" width="92" height="92" class="justify-content-center mb-3" alt=""></div><h7 class="card-title">Cuidador</h7><h5 class="card-title text-success font-weight-bold">Alberto Gomez</h5><p class="card-text text-muted" style="position:relative;top:-7px;font-size: 14px;">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p><a href="#" class="btn btn-outline-success" style="position:relative;top:-10px;">Visitar</a></div></div></div>`);
    }).join(" ");

   setTimeout(function(){
     pane.innerHTML = html;
   },600)
    
  </script>
</body>
</html>