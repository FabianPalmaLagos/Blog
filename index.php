<?php
require_once './controllers/showTemaController.php';
$tema = new Tema;
$temas = json_decode(json_encode($tema->index()), True);

require_once './vistas/header.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-4">
                    <div class="col-md-12">
                        <?php if(isset($_SESSION['usuario'])): ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['usuario'];?>
                            </div>
                            <?php unset($_SESSION['usuario']);?>
                        <?php endif; ?>   
                    </div>
                    
                    <div class="col-md-12">
                        <?php if (isset($_SESSION['crearTema'])) : ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['crearTema']; ?>
                            </div>
                            <?php unset($_SESSION['crearTema']); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <?php if (isset($_SESSION['editTema'])) : ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['editTema']; ?>
                            </div>
                            <?php unset($_SESSION['editTema']); ?>
                        <?php endif; ?>
                    </div>
                    <div class="card shadow-longer">
                        <div class="card-header text-center">
                            <h3>Temas</h3>
                        </div>
                        <div class="card-body">
                            <a href="agregarTema.php" class="btn btn-secondary mb-3" style="float: right;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                Agregar un nuevo tema
                            </a>
                            <table class="table" style="border-style: solid;">
                                <thead class="table-dark">
                                    <tr>
                                    <th class="text-center" scope="col">Tema</th>
                                    <th class="text-center" scope="col">Posts</th>
                                    <th class="text-center col-2" scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($temas)): ?>
                                        <?php foreach($temas as $row) :?>       
                                            <tr>
                                                <th style="padding: 0.8rem; text-align: center;"><a class="link" href="listPost.php?id=<?= $row['id']?>"><?= $row['nombre']?></a></th>
                                                <td style="padding: 0.8rem; text-align: center;"><?=$row['posts'];?></td>
                                                <td class="text-center"> 
                                                    <a href="editTema.php?id=<?= $row['id']?>" class="btn btn-secondary mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                        </svg>        
                                                    </a>
                                                    <a type="submit" class="btn btn-danger" href="controllers/deleteTemaController.php?id=<?= $row['id'];?>&id=<?= $row['id'];?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                    <?php else: ?>
                                            <tr>
                                                <td>
                                                    <td>
                                                    </td>
                                                </td>
                                            </tr>
                                </tbody>
                            </table>
                                <div class="alert alert-warning col-md-12">
                                    No hay temas, ¡Crea uno!
                                </div>                  
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php    
require_once './vistas/footer.php';
?>