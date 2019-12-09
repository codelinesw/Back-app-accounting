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
        <div class="card text-center p-3 mb-1 bg-white ml-0 border-0  mt-2">
            <div class="card-body">
              <img src="<?php echo path;?>img/portal/svg/002-dog-training.svg" class="card-img-top mb-3"  width="95" height="95" alt="...">
              <h2 class="card-title font-weight-bold text-success" >Benvenido</h2>
               <p class="card-text text-secondary">ya casi haces parte de nosotros solo faltan completar algunos datos</p>
               <div class="alert alert-danger col-md-8" role="alert" style="margin:auto;margin-top: 50px; display: none; text-align: left;">A simple danger alert—check it out!</div>
            </div>
          </div>
         
      </div>
    </div>
     <div class="row container-form-rg">
        <div class="col d-flex justify-content-center">
          <div class="card border-0 col-md-8 mb-5">
            <form action="" method="POST" class="form-to-complete">
              <div class="form-group">
                <label for="exampleInputEmail1">Cedula de cuidadania</label>
                <input type="text" class="form-control" name="value" id="exampleInputvalue" aria-describedby="valueHelp" placeholder="Ingresa tu numero de identificacion">
                <small id="valueHelp" class="form-text text-muted">Este campo es obligatorio, por lo que no debes olvidar diligenciarlo</small>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Fecha de nacimiento</label>
                <input type="date" name="birthdate" class="form-control" id="exampleInputbirthday" aria-describedby="birthdayHelp" placeholder="Ingresa tu fecha de nacimiento">
                <small id="birthdayHelp" class="form-text text-muted">Esta informacion es importante para nosotros ya que desde que ingresas a nuestro portal, ya haces parte de nuestra familia</small>
              </div>
              <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Genero</label>
                    </div>
                    <select name="gender" class="custom-select" id="inputGroupSelect01">
                      <option selected>Ingresa tu genero</option>
                      <option value="M">Masculino</option>
                      <option value="F">Femenino</option>
                      <option value="I">Indefinido</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" name="city" class="form-control" aria-label="Text input with dropdown button" placeholder="Seleciona tu ciudad de ubicacion...">
                   <div class="input-group-append">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"  aria-expanded="true">Ciudad</button>
                      <div class="dropdown-menu float-right w-100">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <a class="dropdown-item" href="#">Separated link</a>
                      </div>
                    </div>
                </div>
              </div>  
              <div class="form-group">
                <label for="exampleInputPassword1">Ingresa el barrio de influencia</label>
                <input type="text" name="neigh" class="form-control" id="exampleInputneighborhood1" placeholder="Ej: Ciudad Jardin">
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                <input type="text" name="number_phone" class="form-control" placeholder="Whatsapp o numero de contacto" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">Telefono movil</span>
                </div>
              </div>
              </div>
              <button type="submit" class="btn btn-success p-2 btn-rgs">Enviar informacion</button>
            </form>
            <div class="container_circle_preloader">
               <div class="child_container_ wx-100">
                 <div class="circle"><div class="child"></div></div>
               </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <script src="<?php echo path;?>js/jquery-3.4.1.min.js"></script>
  <script src="<?php echo path;?>bootstrap-4.3.1/js/bootstrap.js"></script>
  <script src="<?php echo path;?>js/script.min.js"></script>
  <script>
    document.querySelector('.dropdown-toggle').addEventListener('click',e => {
      e.preventDefault();
      console.log("event Handle");
      document.querySelector('.dropdown-menu').classList.toggle('show');
      
    });
  </script>
</body>

</html>