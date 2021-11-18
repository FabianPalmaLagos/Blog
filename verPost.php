<?php
require_once('vendor/autoload.php');
require_once('models/Database/Database.php');
require_once('controllers/showRespController.php');
$respuesta = new Resp;

use Illuminate\Database\Capsule\Manager as DB;
$post = DB::table('post')->where('id', '=', $_GET['id'])->get();
$resp = json_decode(json_encode($respuesta->show($_GET['id'])), True);
require_once './vistas/header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-4">
                    <a href="index.php" class="boton btn btn-primary mb-2">
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
                        <div class="col-md-12">
                            <?php if(isset($_SESSION['Respuesta'])): ?>
                                <div class="alert alert-success">
                                    <?= $_SESSION['Respuesta'];?>
                                </div>
                                <?php unset($_SESSION['Respuesta']);?>
                            <?php endif; ?>   
                        </div>
                        <div class="mt-4 mb-4">
                            <label>
                                <h3 class="h3">Respuestas</h3>
                            </label>
                            <a href="respPost.php?id=<?= $post[0]->id?>" class="btn btn-secondary" style="float: right;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                                Agregar comentario
                            </a>
                        </div>
                        <?php if($post[0]->respuestas == 0):?>
                            <div class="alert alert-warning col-md-12">
                                Nadie ha respondido al post. ¡Sé el primero!
                            </div>
                        <?php else: ?>
                            <?php if(!empty($resp)): ?>
                                <?php foreach($resp as $row) :?>       
                                    <div class="container mb-2 shadow" style="border: 0.1rem; border-style: solid; border-radius: 0.5rem;">
                                        <div class="row m-2" >
                                            <div class="col-2" >
                                                <label for="autor"> <strong> <?= $row['autor']?></strong></label>
                                                <label for="fecha"> <?= $row['fecha']?></label>
                                                <br><br><br><br>
                                            </div>
                                            <div class="col-10" >
                                                <?= $row['respuesta']?>
                                            </div>
                                    </div>
                                <?php endforeach;?>
                            <?php endif ?>
                        <?php endif ?>
                        
                    
                </div>
            </div>
        </div>
    </div>
<?php    
require_once './vistas/footer.php';
?>