<?php

$emailac=$_SESSION["user"]["email"];
$userac=file_get_contents(ruta_user . "/$emailac/user.txt");

?>
<section class="contactofondo">
<div class="container agregar">
    <div class="row">
    <div class="col-12">
    <h1 class="center-block titulopersonajes text-white ">Editar Perfil</h1>
    </div>
    </div>


    <div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card p-3 colorcuadro my-4 ">
        <div class="row">
        <div class="col-12">
        <?php
        mostrarError($_GET);
        ?>
        </div>
        </div>
            <div class="card-body">
            <form action="acciones/editar_perfil.php" method="POST" enctype="multipart/form-data">
            <?php
            ?>

            
            <div class="form-group">
             <label class="text-white" for="nombre">Usuario</label>
             <input type="text" class="form-control" name="user" id="user" placeholder="Nombre del usuario nuevo" value="<?= $userac ?>">
             </div>
             <div class="form-group">
                <label class="text-white" for="descripcion">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email nuevo" value="<?= $_SESSION["user"]["email"];?>">
            </div>
            
            <input type="hidden" value="<?=  $_SESSION["user"]["email"]; ?>" name="userViejo">
            
            
            <button type="submit" class=" btn btn-success btn-block">Guardar</button>
            
            </form>
            
            </div>
                </div>
                     </div>
                        </div>
                            </div>
    
</section>