<?php
require_once('vendor/autoload.php');
require_once('models/Database/Database.php');
$DateTime = new DateTime();  
$fecha = $DateTime->format("d-m-Y h:i a");
use Illuminate\Database\Capsule\Manager as DB;
$post = DB::table('post')->where('id', '=', $_GET['id'])->get();
require_once './vistas/header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-4">
                    <a href="listPost.php?id=<?=$post[0]->id_tema?>" class="boton btn btn-primary mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg>
                        Volver
                    </a>
                    <div class="card mb-5 shadow">
                        <div class="card-header text-center">
                            <h3><?= $post[0]->titulo ?>
                            </h3> 
                        </div>
                        <div class="card-body">
                            <?= $post[0]->mensaje ?>
                        </div>
                        <div class="card-footer">
                            <div class="autor">
                                <label>
                                    <?= $post[0]->autor ?>
                                </label>
                                <label style="float: right;">
                                    <?= $post[0]->fecha ?>
                                </label>
                            </div>
                        </div>
                    </div>
                        <hr>
                        <div class="mt-4 mb-4">
                            <label>
                                <h3 class="h3">Respuestas</h3>
                            </label>
                        </div>
                        <?php if($post[0]->respuestas = 0):?>
                            <div class="alert alert-warning col-md-12">
                                Por los momentos no hay ninguna respuesta.
                            </div>
                        <?php else: ?>
                        
                        <?php endif ?>
                        <div class="container mb-2  shadow" style="border: 0.1rem; background-color: #E9E7E7; border-style: solid; border-radius: 0.5rem;">
                            <div class="row m-2" >
                                <div class="form-group m-auto mt-2">
                                    <form action="controllers/respController.php" method="post">
                                        <input type="hidden" name="autor" value="@<?= $datos[0]->nombre ?>">
                                        <input type="hidden" name="fecha" value="<?=$fecha?>">
                                        <input type="hidden" name="id_post" value="<?= $post[0]->id ?>">
                                        <textarea rows="8" required class="form-control" name="respuesta" id="respuesta" placeholder="Escribe aquí tus comentarios"></textarea>
                                        <button class="btn btn-secondary mt-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                            Agregar comentario
                                        </button>
                                        <?php $respuestas = $post[0]->respuestas ?>
                                        <?php $respuestas = $respuestas+1 ?>
                                    </form>
                                </div>
                                    
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
<?php    
require_once './vistas/footer.php';
?>