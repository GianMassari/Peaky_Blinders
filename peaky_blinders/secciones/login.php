<?php
    if(logueado()):
        header("Location: index.php");
    endif;
?>
<section class="contactofondo">
<div class="container">
    <div class="row">
    <div class="col-12">
    <h1 class="center-block titulo contactotitulo">Iniciar Sesion</h1>
    </div>
    </div>
</div>
<div class="row justify-content-center contactocuadro pt-5 pb-5">
    
<div class="col-4">
    <div class="card p-4 colorcuadro">
     <div class="row">
        <div class="col-12">
        <?php
        mostrarError($_GET);
        ?>
</div>
</div>
            <div class="card-body">
<form action="acciones/login.php" method="POST">
                    <div class="row">
                    <div class="form-group col-12">
                        <label for="email"class="text-white">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Ingrese su email">
                    </div>
                    
                    <div class="form-group col-12 ">
                      <label for="password" class="text-white">Contraseña</label>
                      <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Ingrese su contraseña">
                    </div>
                   
                   <div class="form-group col-6 offset-3">
                    <button type="submit" class="btn mt-4 btn-primary btn-lg btn-block">Iniciar Sesion</button>
                    </div>
                    
                    </div>
                    </div>   
                     </div>
                </form>
       
    </div>
</div>
</section>