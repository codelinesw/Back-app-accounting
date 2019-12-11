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
        <div class="card text-center p-3 mb-0 bg-white ml-0 border-0  mt-2">
            <div class="card-body">
              <h2 class="card-title font-weight-bold text-success" >Estas a un solo paso...</h2>
               <p class="card-text text-secondary">Selecciona una imagen/foto de perfil</p>
            </div>
          </div>
         
      </div>
    </div>
     <div class="row">
        <div class="col d-flex justify-content-center">
          <div class="card border-0 col-md-4 mb-5">
            <form action="/website-testing/borrower/upload_picture/" method="POST" class="form-load form-picture" enctype="multipart/form-data">  
              <div class="form-group text-center">
                <div class="card rounded col-md- p-5" style="position:relative; margin:auto;border: 3px dotted #dedede;">
                  <img src="<?php echo path;?>img/portal/svg/001-adoption.svg" class="card-img-top mb-4"  width="115" height="115" alt="...">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" name="file_img" class="custom-file-input" id="inputFile">
                    <label class="btn btn-outline-secondary input_file" for="inputFile">Seleccionar tu imagen o foto favorita</label>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-success p-2 load-picture">Guardar</button>
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
  <script>
    var file = ":";
    var form = $('.form-picture');

    document.querySelector('.custom-file-input').addEventListener('change', e => {
      file = e.target.files[0];
    });

    function is_valid_extension(file)
    {
      let file_ = (file != "") ? file : "";

      if(file_ != "")
      {
        let extension_file = file_.split(".");
        extension_file = extension_file[extension_file.length-1];
        let valid_extensions = ['png','jpg','jpeg'];
        if(valid_extensions.includes(extension_file))
        {
          return true;
        }else{
          return false;
        }
      }else{
        return false;
      }
    }
    document.querySelector('.load-picture').addEventListener('click',e => {
      e.preventDefault();
      console.log("event Handle"); 
      if(file == ":"){
         console.log("Your must choose a image before upload your picture");
         file = ":";
      }else{
          var dataForm = new FormData(form[0]);
          file = dataForm.get('file_img');
          if(is_valid_extension(file.name))
          {
            console.log(file);
            if (FileReader) {
              let fr = new FileReader();
              fr.onload = function () {
                  document.querySelector('.card-img-top').src = fr.result;
              }

              fr.readAsDataURL(file);
            }
            $.ajax({
              url: form.attr('action'),
              type:"POST",
              data:dataForm,
              processData: false,
              contentType: false,

              success: function(response){
                console.log(response);
              }

            });
          }else{
            console.log("Formato incorrecto del archivo....");
          }
          
      }
    });
  </script>
</body>

</html>