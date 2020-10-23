<?php
function mostarcheck($check){
    ?><h3>
    <?php if (empty($check)):
        echo "No desea recibir informacion";
    else:
        echo "Desea recibir informacion sobre:"; ?></h3>
    <ul class="textocheck"><?php foreach($check as $serie){ ?>
    <li>
        <?php echo $serie; ?>
        </li>
    <?php
    }
    endif;?>
    </ul>
    <?php    
}
function nombre($nombre){
    return ucwords(str_replace("_"," ", $nombre));
}

function pegar($variable){
    return $variable;
}
function pegar_descripcion($ruta){
return file_exists($ruta) ? (file_get_contents($ruta)) : "El personaje no tiene descripcion";
}

function tolower($nombre){
    return strtolower(str_replace(" ","_", $nombre));

    if($editar)
        $descripcion = file_exists($ruta_descripcion) ? file_get_contents($ruta_descripcion) : "";
    else
        $descripcion = file_exists($ruta_descripcion) ? nl2br(file_get_contents($ruta_descripcion)) : "Sin descripción";

    return $descripcion;
}

function nueva_descripcion($descripcion,$pjNuevo){
    if($descripcion):
        file_put_contents(RUTA_PERSONAJES . "/$pjNuevo/descripcion.txt", $descripcion);
    elseif(file_exists(RUTA_PERSONAJES . "/$pjNuevo/descripcion.txt")):
        unlink(RUTA_PERSONAJES . "/$pjNuevo/descripcion.txt");
    endif;
}

function check_nombre($id,$pjNuevo){
if($id==$pjNuevo):
    rename(RUTA_PERSONAJES . "/$id", RUTA_PERSONAJES . "/$pjNuevo");
  elseif ($id!=$pjNuevo && !is_dir(RUTA_PERSONAJES . "/$pjNuevo")):
    rename(RUTA_PERSONAJES . "/$id", RUTA_PERSONAJES . "/$pjNuevo");
   else:
    $_SESSION["url"] = [
        "estado" => "error",
        "mensaje" => "existe_personaje_con_mismo_nombre",
    ];   
    header("Location:../index.php?seccion=agregar_personaje&personaje=$id");
       die();
   endif;
}

function logueado(){
    return isset($_SESSION["user"]);
}

function permisoAdmin(){
    return (isset($_SESSION["user"]) && $_SESSION["user"]["permiso"] == "admin");
}

function pegar_archivo($ruta){
return file_exists($ruta) ? (file_get_contents($ruta)) : "El usuario no tiene archivos";
}
function borrar_user($user){
    if(file_exists(ruta_user . "/$user/user.txt") && (file_exists(ruta_user . "/$user/contraseña.txt")) && (file_exists(ruta_user . "/$user/email.txt")) && (file_exists(ruta_user . "/$user/permiso.txt"))) :
        unlink(ruta_user . "/$user/user.txt");
            unlink(ruta_user . "/$user/contraseña.txt");
                unlink(ruta_user . "/$user/email.txt");
                    unlink(ruta_user . "/$user/permiso.txt");
    endif;
}


function mostrarError($variable){
if (isset($_SESSION["url"])):?>
    <div class="alert alert-danger alert-dismissible" role="alert">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p><?php  
echo nombre($_SESSION["url"]["estado"]) . '<br />';
echo nombre($_SESSION["url"]["mensaje"]); ?></p>
</div>

<?php
endif;
unset($_SESSION['url']);
}

function check_email($id,$userNuevo,$ruta){
    if($id==$userNuevo):
        rename(ruta_user . "/$id", ruta_user . "/$userNuevo");
      elseif ($id!=$userNuevo && !is_dir(ruta_user . "/$userNuevo")):
        rename(ruta_user . "/$id", ruta_user . "/$userNuevo");
       else:
        $_SESSION["url"] = [
            "estado" => "error",
            "mensaje" => "existe_usuario_con_mismo_email_o_introdujo_el_mismo_mail",
        ];   
        header("Location:../index.php?seccion=$ruta");
           die();
       endif;
    }
    
