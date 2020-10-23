<div class="row justify-content cuadrohome">
            <div class="col-8 offset-2">
                
<div class="container">
    <div class="row">
    <div class="col-12">
    <h1 class="center-block titulopersonajes text-white">Personajes principales</h1>
    </div>
    </div>
</div>
<div class="container">

<div class="row text-center">
<?php
if(logueado()):
$carpeta=opendir(RUTA_PERSONAJES);

while ($personaje = readdir($carpeta)):
    if($personaje == "." || $personaje == "..")
    
    continue;
    ?>
                         <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="<?= "personajes/$personaje/$personaje.jpg" ?>" alt="Foto de <?= nombre($personaje); ?>" class="img-fluid">
                                <h2 class="card-title"><?= nombre($personaje); ?></h2>
                                <p><?= pegar_descripcion(RUTA_PERSONAJES . "/$personaje/descripcion.txt"); ?></p>
                         
                        </div>
                    </div>
                </div>
                    
                        
    <?php
    endwhile;
else:				
    ?>
<div class="col-8 offset-2 margen">
 <div class="card p-4 colorcuadro">
   <div class="row">
   <div class="col-6 offset-3"><div class="alert alert-danger alert-dismissible" role="alert">
    Para poder ver los personajes es necesario registrarse.
      </div></div>
      </div>
</div>
</div>
      <?php
      endif;
?>
</div>
</div>
</div>
</div>


