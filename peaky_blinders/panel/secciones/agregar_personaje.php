<?php

$titulo="Agregar Personaje";
$botonn = "agregar personaje";
$action = "agregar_personaje";

if(isset($_GET["personaje"])):
$titulo="Editar Personaje";
$botonn = "Editar personaje";
$action = "editar_personaje";
$personaje=$_GET["personaje"];

if (empty($personaje) || !is_dir(RUTA_PERSONAJES . "/$personaje")):
    header("Location:index.php?seccion=tabla_personajes");
    $_SESSION["url"] = [
        "estado" => "Error",
        "mensaje" => "personaje_inexistente",
      ];
    die();
endif;

endif;

?>

<div class="container agregar">
    <div class="row">
    <div class="col-12">
    <h1 class="center-block titulopersonajes text-white" id="personajes"><? $titulo; ?></h1>
    </div>
    </div>


    <div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card p-3 colorcuadro my-4">
        <div class="row">
        <div class="col-12">
        <?php
        mostrarError($_GET);
        ?>
        </div>
        </div>
            <div class="card-body">
            <form action="acciones/<?= $action; ?>.php" method="POST" enctype="multipart/form-data">
            <?php
                if (isset($personaje)):
            ?>

            <input type="hidden" value="<? $personaje; ?>" name="id";>

              <?php
            endif;
            ?>
            <div class="form-group">
             <label class="text-white" for="nombre">Nombre</label>
             <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Personaje nuevo" value="<?= isset($personaje) ? nombre($personaje) : ""; ?>">
             
             </div>
             <div class="form-group">
                
                <label class="text-white" for="descripcion">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="6"><?= isset($personaje) ? pegar_descripcion(RUTA_PERSONAJES ."/$personaje/descripcion.txt",true):"";?></textarea>
        
            </div>
    
            <div class="form-group">
                              
                 <label class="text-white" for="imagen">Imagen</label>
                 <input type="file" accept="image/jpeg" class="form-control-file btn-info" name="imagen" id="imagen" aria-describedby="imagenHelp">
                 <p id="imagenHelp" class="form-text text-muted formato">El formato de la imagen tiene que ser <b class="text-danger">JPG</b></p>
                            
            </div>
            <?php
            
            if(isset($personaje)):
        
            ?>
             <input type="hidden" value="<?= $personaje; ?>" name="id">
   
            
            <div class="row mb-4">
                <div class="col-6 offset-3">
                    <img src="<?= "../personajes/$personaje/$personaje.jpg" ?>" alt="<?= nombre($personaje); ?>" class="img-fluid">
                 </div>
            </div>
            <?php
           
        endif;
   ?>
            
            <button type="submit" class=" btn btn-success btn-block"><?= $botonn; ?></button>
            
            </form>
            
            </div>
                </div>
                     </div>
                        </div>
                            </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    