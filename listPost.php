<?php
require_once './controllers/showPostController.php';
require_once './controllers/showTemaController.php';
$tema = new Tema;
$temas = $tema->data($_GET['id']);
$post = new Post;
$posts = json_decode(json_encode($post->index($_GET['id'])), True);
require_once './vistas/header.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-4">
                    <div class="col-md-12">
                        <?php if (isset($_SESSION['crear'])) : ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['crear']; ?>
                            </div>
                            <?php unset($_SESSION['crear']); ?>
                        <?php endif; ?>
                    </div>
                    <a href="index.php" class="boton btn btn-primary mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg>
                        Volver
                    </a>
                    <div class="card shadow-longer">
                        <div class="card-header text-center">
                            <h3>Posts de  <?=$temas[0]->nombre ?></h3>
                        </div>
                        <div class="card-body">
                            <a href="agregarPost.php?id=<?= $_GET['id']?>" class="btn btn-secondary mb-3" style="float: right;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                Agregar un nuevo post
                            </a>
                            <table class="table" style="border-style: solid;">
                                <thead class="table-dark">
                                    <tr>
                                    <th class="text-center" scope="col">Titulo</th>
                                    <th scope="col">Fecha creación</th>
                                    <th scope="col">Escrito por</th>
                                    <th scope="col">Respuestas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($posts)): ?>
                                        <?php foreach($posts as $row) :?>       
                                            <tr>
                                                <th class="text-center" style="padding: 0.8rem;"><a class="link" href="verPost.php?id=<?= $row['id']?>"><?=$row['titulo'];?></a></th>
                                                <td style="padding: 0.8rem;"><?=$row['fecha'];?></td>
                                                <td style="padding: 0.8rem;"><?=$row['autor'];?></td>
                                                <td><?=$row['respuestas'];?></td>
                                            </tr>
                                        <?php endforeach;?> 
                                    <?php else: ?>
                                </tbody>
                            </table>
                                <div class="alert alert-warning col-md-12">
                                    Por el momento no hay ningun post.
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