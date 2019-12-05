<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio - este sitio esta dedicado para pruebas</title>
</head>
<link rel="stylesheet" href="<?php echo path;?>bootstrap-4.3.1/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo path;?>fontawesome/css/all.css">
<link rel="stylesheet" href="<?php echo path;?>css/styles_.min.css">
<body class="bg-light">
	<header class="main-navigation" style="border-bottom: 2px solid #dedede;">
		<nav class="navbar navbar-expand-lg navbar-white bg-white">
  <a class="navbar-brand text-success font-weight-bold" href="#">Evil-Testing</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link btn" href="index.php">Solicitudes <span class="badge badge-dark">4</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="https://pngimage.net/wp-content/uploads/2018/06/user-png-image-5.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="">Jhon Murillo</a>
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
  <div class="container-fluid">
    <div class="row mt-4">
      <div class="col-md-3 mb-4">
          <div class="card rounded shadow" style="height:462px;">
              <div class="card-header rounded-top" style="height: 70px; background: #4FB767;">
                <img src="https://pngimage.net/wp-content/uploads/2018/06/user-png-image-5.png" width="70" height="70" class="d-inline-block align-top ml-0 mt-3" alt="" style="position: absolute;border:3px solid white; border-radius: 50%; left:14px;">
              </div>
              <div class="card-body">
                <div class="input-group">
                  <button type="button" class="btn btn-outline-success btn-sm" style="position: absolute; right:3px; top:-8px;">Seguir</button>
                </div>
                  <div class="h5 mt-3 mb-0 font-weight-bold">Jhon Murillo</div>
                  <div class="h7 text-muted" style="font-size:14px;">@jhondember0424</div>
                  <div class="h7 text-left">Me encanta este oficio, ya que puedo ser quien soy y hacer lo que más amo</div>
              </div>
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                      <div class="h6 text-muted">Seguidores</div>
                      <div class="h5">5.2342</div>
                  </li>
                  <li class="list-group-item">
                      <div class="h6 text-muted">Reputación</div>
                      <div class="h5">6758</div>
                  </li>
                  <li class="list-group-item"><div><span class="far fa-calendar-alt mr-2"></span> Se unió el mayo de 2020</div></li>
              </ul>
          </div>
          <div class="card mt-4 shadow">
              <div class="card-header bg-white">Información adicional</div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item p-2"><a href="#" class="nav-link text-dark"><span class="fas fa-clipboard-list mr-2"></span>Horario laboral</a></li>
                <li class="list-group-item p-2"><a href="#" class="nav-link text-dark"><span class="far fa-images mr-2"></span>Fotos</a></li>
              </ul>
            </div>    
      </div>
      <div class="col">
        <div class="container-calendar mt-0 d-flex justify-content-center">
      <div class="calendar col-md-12">
        <div class="card border-0 bg-white shadow border-radius">
          <div class="card-header bg-white p-2 border-0">
            <div class="div d-flex">
              <div class="col">
                <div class="btn-group">
                  <div class="input-group mr-1"><button type="button" class="btn btn-light border btn_prev_month"><i class="fas fa-angle-left"></i></button></div>
                  <div class="input-group"><button type="button" class="btn btn-light border btn_next_month"><i class="fas fa-angle-right"></i></button></div>
                </div>
              </div>
              <div class="col col-6 d-flex justify-content-center align-items-center">
                <h5 class="card-title title-date">Noviembre 2019</h5>
              </div>
              <div class="col">
                <div class="btn-group">
                  <div class="input-group mr-1"><button type="button" class="btn btn-light border btn-month">Mes</button></div>
                  <div class="input-group"><button type="button" class="btn btn-light border btn-day">Dia</button></div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body w-100">
            <div class="table" style="width: 108%; left:-21px;">
              <div class="container-days-week" style="display: flex;">
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
              <div class="events-days border" style="display: none;">
               <div class="tr border border-top-0 border-left-0 border-right-0">
                 <div class="td time bg-light border border-left-0 border-top-0 border-bottom-0"><span class="time">8am</span></div>
                 <div class="td events"><span class="event_ text-truncate rounded bg-success">Festival de amor y amistad</span><span class="event_ text-truncate rounded bg-success">Festival de blancos y negros</span></div>
               </div>
                <div class="tr border border-top-0 border-left-0 border-right-0">
                 <div class="td time bg-light border border-left-0 border-top-0 border-bottom-0"><span class="time">9am</span></div>
                 <div class="td events"><span class="event_ text-truncate rounded bg-success">Festival de amor y amistad</span><span class="event_ text-truncate rounded bg-success">Festival de blancos y negros</span></div>
               </div>
                <div class="tr border border-top-0 border-left-0 border-right-0">
                 <div class="td time bg-light border border-left-0 border-top-0 border-bottom-0"><span class="time">10am</span></div>
                 <div class="td events"><span class="event_ text-truncate rounded bg-success">Festival de amor y amistad</span><span class="event_ text-truncate rounded bg-success">Festival de blancos y negros</span></div>
               </div>
                <div class="tr border border-top-0 border-left-0 border-right-0">
                 <div class="td time bg-light border border-left-0 border-top-0 border-bottom-0"><span class="time">11am</span></div>
                 <div class="td events"><span class="event_ text-truncate rounded bg-success">Festival de amor y amistad</span><span class="event_ text-truncate rounded bg-success">Festival de blancos y negros</span></div>
               </div>
                <div class="tr border border-top-0 border-left-0 border-right-0">
                 <div class="td time bg-light border border-left-0 border-top-0 border-bottom-0"><span class="time">12am</span></div>
                 <div class="td events"><span class="event_ text-truncate rounded bg-success">Festival de amor y amistad</span><span class="event_ text-truncate rounded bg-success">Festival de blancos y negros</span></div>
               </div>
                <div class="tr border border-top-0 border-left-0 border-right-0">
                 <div class="td time bg-light border border-left-0 border-top-0 border-bottom-0"><span class="time">2pm</span></div>
                 <div class="td events"><span class="event_ text-truncate rounded bg-success">Festival de amor y amistad</span><span class="event_ text-truncate rounded bg-success">Festival de blancos y negros</span></div>
               </div>
                <div class="tr border border-top-0 border-left-0 border-right-0">
                 <div class="td time bg-light border border-left-0 border-top-0 border-bottom-0"><span class="time">3pm</span></div>
                 <div class="td events"><span class="event_ text-truncate rounded bg-success">Festival de amor y amistad</span><span class="event_ text-truncate rounded bg-success">Festival de blancos y negros</span></div>
               </div>
                <div class="tr border border-top-0 border-left-0 border-right-0">
                 <div class="td time bg-light border border-left-0 border-top-0 border-bottom-0"><span class="time">4pm</span></div>
                 <div class="td events"><span class="event_ text-truncate rounded bg-success">Festival de amor y amistad</span><span class="event_ text-truncate rounded bg-success">Festival de blancos y negros</span></div>
               </div>
                <div class="tr border border-top-0 border-left-0 border-right-0">
                 <div class="td time bg-light border border-left-0 border-top-0 border-bottom-0"><span class="time">5pm</span></div>
                 <div class="td events"><span class="event_ text-truncate rounded bg-success">Festival de amor y amistad</span><span class="event_ text-truncate rounded bg-success">Festival de blancos y negros</span></div>
               </div>
               <div class="tr border border-top-0 border-left-0 border-right-0">
                 <div class="td time bg-light border border-left-0 border-top-0 border-bottom-0"><span class="time">6pm</span></div>
                 <div class="td events"><span class="event_ text-truncate rounded bg-success">Festival de amor y amistad</span><span class="event_ text-truncate rounded bg-success">Festival de blancos y negros</span></div>
               </div>
              </div>
            </div>
          </div>
      </div>
      </div>
    </div>
      </div>
      <div class="col d-flex justify-content-center col-md-3">
        <div class="bg-light">
          <div class="card gedf-card">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <div class="card-subtitle mb-2 text-muted"><i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i></div>
                <p class="card-text">Esta ha sido la calificacion,que ha dado los propietarios que han prestado su servicio.</p>
                <button type="button" class="btn btn-success">Calificar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo path;?>js/jquery-3.4.1.min.js"></script> 
  <script src="<?php echo path;?>bootstrap-4.3.1/js/bootstrap.js"></script>
  <script src="<?php echo path;?>js/calendar_v1.0.min.js"></script>	
</body>
</html>