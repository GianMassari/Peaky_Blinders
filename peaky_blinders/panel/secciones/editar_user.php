 <?php
$user=$_GET["user"];
?>
<section class="contactofondo">
<div class="container agregar">
    <div class="row">
    <div class="col-12">
    <h1 class="center-block titulopersonajes text-white"id="user">Editar User</h1>
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
            <form action="acciones/editar_user.php" method="POST" enctype="multipart/form-data">
            <?php
               $usuario=pegar_archivo(ruta_user ."/$user/user.txt");
               $permiso=pegar_archivo(ruta_user ."/$user/permiso.txt");
            ?>

            
            <div class="form-group">
             <label class="text-white" for="nombre">Usuario</label>
             <input type="text" class="form-control" name="user" id="user" placeholder="Nombre del usuario nuevo" value="<?= $usuario ?>">
             </div>
             <div class="form-group">
                <label class="text-white" for="descripcion">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email nuevo" value="<?= $user;?>">
               
        
            </div>
            <div class="form-group">
                <label class="text-white" for="descripcion">Permisos (admin,usuario)</label>
                <input type="text" class="form-control" name="permiso" id="permiso" placeholder="Admin o User" value="<?= $permiso ?>">
               
        
            </div>
            
            <input type="hidden" value="<?= $user ?>" name="userViejo">
            
            
            <button type="submit" class=" btn btn-success btn-block">Editar</button>
            
            </form>
            
            </div>
                </div>
                     </div>
                        </div>
                            </div>
    
</section>