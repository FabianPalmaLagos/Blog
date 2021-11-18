<?php
require_once './controllers/showTemaController.php';
use Illuminate\Database\Capsule\Manager as DB;
$tema = DB::table('tema')->where('id', '=', $_GET['id'])->get();
require_once './vistas/header.php';
?>
    <div class="container">
        <div class="row">
                <div class="mt-4">
                    <a href="index.php" class="boton btn btn-primary mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg>
                        Volver
                    </a>
                </div>
                <div class="card mb-5 shadow">
                    <div class="form-group">
                        <form action="controllers/editTemaController.php" method="post">
                            <div class="card-header">
                                <label for="nombre"><h3>Editar Tema</h3></label>
                                <input type="text" name="nombre" value="<?=$tema[0]->nombre?>" class="form-control mb-2" required>
                            </div>
                                <input type="hidden" name="id" value="<?= $tema[0]->id?>">
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-secondary mt-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>  
                                    Editar tema
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php    
require_once './vistas/footer.php';
?>