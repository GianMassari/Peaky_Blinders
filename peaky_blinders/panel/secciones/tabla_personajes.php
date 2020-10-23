<div class="container">
    <div class="row">
    <div class="col-12">
    <h1 class="center-block titulopersonajes text-white my-4" id="personaje">Personajes principales</h1>
    </div>
    </div>
<div class="container margen">
    <div class="row colorcuadro rounded">
        <div class="col-12">
        <?php
        
        mostrarError($_GET);
        ?>

</div>
        <div class="col-12">
            <a href="index.php?seccion=agregar_personaje" class="text-white"><button class="btn btn-primary my-3 btn-lg btn-block">Nuevo Personaje</button></a>
            </div>
         
            <table class="table table-stripeds text-white">
                    <tbody>
                    <?php

                        $carpeta = opendir(RUTA_PERSONAJES);
                           
                    while ($personaje = readdir($carpeta)):
                     if($personaje == "." || $personaje == "..")
                     continue;
                    ?>
                        <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Accion</th>
                        </tr>
                        <tr>
                                <td class="text-white"scope="row"><img src="../personajes/<?= "$personaje/$personaje.jpg"; ?>" alt="<?= nombre($personaje); ?>" width="170" height="220"></td>
                                <td class="text-white"><?= nombre($personaje); ?></td>
                                <td class="text-white"><?= pegar_descripcion(RUTA_PERSONAJES ."/$personaje/descripcion.txt");?></td>
                                <td> <a href="index.php?seccion=agregar_personaje&personaje=<?= $personaje; ?>" class="btn btn-sm btn-warning my-3">Editar</a> 
                                <form action="acciones/borrar_personaje.php" method="post">
                
                                <input type="hidden" value="<?= $personaje; ?>" name="id">
                                        <button type="submit" class="btn btn-sm btn-danger my-3">Borrar</button>
                        </form>
                            </td>
                                </tr>
                        <?php
                    endwhile;
                    closedir($carpeta);
                ?>
                    </tbody>
            </table>
            </div>
    </div>
</div>
</div>