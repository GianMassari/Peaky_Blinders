
<section class="contactofondo">
<div class="container">
    <div class="row">
    <div class="col-12">
    <h1 class="center-block titulo contactotitulo">Contacto</h1>
    </div>
    </div>
</div>
<div class="row">
<div class="col-6 offset-3">
</div>
</div>
<div class="row justify-content-center contactocuadro">

    <div class="col-12 col-lg-6">
        <div class="card p-3 colorcuadro">
        <?php
mostrarError($_GET);
?>
            <div class="card-body">
<form action="acciones/procesar_contacto.php" method="POST">
                    <div class="row">
                    <div class="form-group col-6">
                        <label class="text-white"for="nombre">Nombre</label>
                        <input type="text cuadrotexto" class="form-control" name="nombre" id="nombre"
                            placeholder="Ingrese su nombre">
                    </div>

                    <div class="form-group col-6">
                        <label class="text-white" for="apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido"
                            placeholder="Ingrese su apellido">
                    </div>
                    </div>                  

                    <div class="form-group">
                        <label for="email"class="text-white">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Ingrese su email">
                    </div>
                    <!--aca poner el checkbox-->
                    <div class="form-check">
                    <label class="text-white">¿De que otras series te gustaria recibir informacion?</label>
                   <ul class="lista text-white col-12">
                    <li><input type="checkbox" class="form-check-input" id="exampleCheck1" name="check[]" value="game of thrones">
                    <label class="form-check-label" for="exampleCheck1">Game of Thrones</label></li>
                    <li><input type="checkbox" class="form-check-input" id="exampleCheck2" name="check[]" value="vikings">
                    <label class="form-check-label" for="exampleCheck2">Vikings</label></li>
                    <li><input type="checkbox" class="form-check-input" id="exampleCheck3" name="check[]" value="prison break">
                    <label class="form-check-label" for="exampleCheck3">Prison Break</label></li>
                    <li><input type="checkbox" class="form-check-input" id="exampleCheck4" name="check[]" value="black mirror">
                    <label class="form-check-label" for="exampleCheck4">Black Mirror</label></li>   
                    </ul>
            </div>
                    <div class="form-group">
                    <label for="consulta"class="text-white">Comentario o consulta </label>
                    <br>
                    <textarea name="consulta" id="consulta" rows="3" class="col-12 text-cent text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Enviar</button>

                </form>
            </div>
        </div>

    </div>
</div>
</section>