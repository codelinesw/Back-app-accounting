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
    <div class="container-calendar mt-3 d-flex justify-content-center">
      <div class="calendar col-md-9">
        <div class="card border-0">
          <div class="card-header bg-white p-2 border-0">
            <div class="div-row d-flex align-items-center">
              <div class="col">
                <div class="btn-group">
                  <div class="input-group mr-1"><button type="button" class="btn btn-light border btn_prev_month"><i class="fas fa-angle-left"></i></button></div>
                  <div class="input-group"><button type="button" class="btn btn-light border btn_next_month"><i class="fas fa-angle-right"></i></button></div>
                </div>
              </div>
              <div class="col col-8 d-flex justify-content-center align-items-center">
                <h5 class="card-title title-date">Noviembre 2019</h5>
              </div>
              <div class="col">
                <div class="btn-group">
                  <div class="input-group mr-1"><button type="button" class="btn btn-light border">Mes</button></div>
                  <div class="input-group"><button type="button" class="btn btn-light border">Dia</button></div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body w-100">
            <div class="table">
              <div class="container-days-week">
                <div class="days-week">
                  <p class="day_">DOMINGO</p>
                </div>
                <div class="days-week">
                  <p class="day_">LUNES</p>
                </div>
                <div class="days-week">
                  <p class="day_">MARTES</p>
                </div>
                <div class="days-week">
                  <p class="day_">MIERCOLES</p>
                </div>
                <div class="days-week">
                  <p class="day_">JUEVES</p>
                </div>
                <div class="days-week">
                  <p class="day_">VIERNES</p>
                </div>
                <div class="days-week">
                  <p class="day_">SABADO</p>
                </div>
              </div>
              <div class="number-days-container">
                
              </div>
            </div>
          </div>
      </div>
      </div>
    </div>
  </div>
  <script src="<?php echo path;?>js/jquery-3.4.1.min.js"></script>
  <script src="<?php echo path;?>bootstrap-4.3.1/js/bootstrap.js"></script>
  <script src="<?php echo path;?>js/calendar_v1.0.min.js"></script>
  <script>
    // document.querySelector('.dropdown-toggle').addEventListener('click',e => {
    //   e.preventDefault();
    //   console.log("event Handle");
    //   document.querySelector('.dropdown-menu').classList.toggle('show');
      
    // });
  </script>
</body>

</html>