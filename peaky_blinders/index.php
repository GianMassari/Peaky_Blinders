<!doctype html>

<?php
    require_once("config/configuraciones.php");
    require_once("config/arrays.php");
    require_once("config/funciones.php");

?>

<html lang="es">
<head>
    <title>Peaky Blinders</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilo.css">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif&display=swap" rel="stylesheet">
</head>
<body class="bodycont">
<header>
<img src="img/ciudad.jpg" alt="cidudad" with="2048" height="300" class="img-fluid imgheader">
    <nav class="navbar navbar-expand-sm navbar-dark navegador">
        <a class="navbar-brand" href="index.php">Peaky Blinders</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
         <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?php
                foreach($nav as $seccion):  
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?seccion=<?= $seccion;?>"><?= ucfirst($seccion);?></a>
                </li>
            <?php
                endforeach;
            ?>
            </ul>
        </div>
    
    <ul class="navbar-nav mr-0">
    <?php
        if(logueado()):
            if(!permisoAdmin()):
    ?>
            <li class="nav-item">
                <span class="navbar-text"><?= $_SESSION["user"]["user"]; ?></span>
            </li> 
            
    <?php
    else:
    ?>
    <li class="nav-item">
     <a class="nav-link" href="panel/index.php"><?= $_SESSION["user"]["user"]; ?></a>
    </li> 
     <?php
         endif;
     ?>
      <li class="nav-item">
     <a class="nav-link" href="index.php?seccion=editar_perfil">Editar Perfil</a>
     </li>  
    <li class="nav-item">
        <a class="nav-link" href="acciones/logout.php">Cerrar Sesion</a>
    </li> 
     <?php
         else:
     ?>
    <li class="nav-item">
     <a class="nav-link" href="index.php?seccion=register">Registrarse</a>
     </li> 
     <li class="nav-item">
    <a class="nav-link" href="index.php?seccion=login">Login</a>
     </li> 
     <?php
         endif;
     ?>
    
         </ul>
            </nav>
                </header>
    <main class="fondo">
        <?php
   
            $seccion = $_GET["seccion"] ?? "home";

            if(in_array($seccion, $secciones)):
                require_once("secciones/$seccion.php");

            else:
                require_once("secciones/404.php");
                
            endif;
        ?>
    </main>
  
    <footer>
    <div class="container-fluid navegador justify-content-between text-white fixed-bottom">
            <div class="row">
    <div class="col-lg-9 col-sm-7">
                <p class="textogian textofooter">Gian Marco Massari</p>
            </div>
            <div class="col-lg-3 col-sm-5">
                <p class="copyright">Gian marco massari blank &copy; - 2019</p>
            </div>
            </div>
        </div>
        </footer>
         
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
 
</body>

</html>