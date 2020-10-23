
<div class="container">
    <div class="row">
    <div class="col-12">
    <h1 class="center-block titulopersonajes text-white my-4" id="usuarioVER">Usuarios</h1>
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
            
            <a href="index.php?seccion=agregar_user" class="text-white"><button class="btn btn-primary my-3 btn-lg btn-block">Nuevo Usuario</button></a>
            </div>
            <table class="table table-stripeds text-white">
                    <tbody>
                    <?php

                        $carpeta = opendir(ruta_user);
                           
                    while ($user = readdir($carpeta)):
                     if($user == "." || $user == "..")
                     continue;
                    ?>
                        <tr>
                        <th>Usuario</th>
                        <th>Mail</th>
                        <th>Permisos</th>
                        </tr>
                        <tr>
                                
                                <td class="text-white"><?= pegar_archivo(ruta_user ."/$user/user.txt"); ?></td>
                                <td class="text-white"><?= $user?></td>
                                <td class="text-white"><?= pegar_archivo(ruta_user ."/$user/permiso.txt"); ?></td>
                                <td> <a href="index.php?seccion=editar_user&user=<?= $user; ?>" class="btn btn-sm btn-warning">Editar</a> 
                                <form action="acciones/borrar_user.php" method="post">
                                <input type="hidden" value="<?= $user; ?>" name="id">
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