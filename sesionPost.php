<?php
require_once './controllers/showPostController.php';
$post = new Post;
$posts = json_decode(json_encode($post->show($_GET['id'])), True);
require_once './vistas/header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <?php if(isset($_SESSION['edit'])): ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['edit'];?>
                        </div>
                        <?php unset($_SESSION['edit']);?>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['delete'])): ?>
                        <div class="alert alert-warning">
                            <?= $_SESSION['delete'];?>
                        </div>
                        <?php unset($_SESSION['delete']);?>
                    <?php endif; ?>    
            </div>
            <div class="col-md-12">
                <div class="mt-4">
                        <a href="index.php" class="boton btn btn-primary mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                            </svg>
                            Volver
                        </a>
                    <div class="card shadow">
                        <div class="card-header text-center">
                            <h3>Mis posts</h3>
                        </div>
                        <div class="card-body">
                            <table class="table" style="border-style: solid;">
                                <thead class="table-dark" >
                                    <tr>
                                    <th class="text-center" scope="col">Titulo</th>
                                    <th scope="col">Fecha creación</th>
                                    <th scope="col">Respuestas</th>
                                    <th class="col-2" scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody >
                                        <?php if(!empty($posts)): ?>
                                            <?php foreach($posts as $row) :?>       
                                                <tr>
                                                    <th class="text-center" style="padding: 0.8rem;"><a class="link" href="verPost.php?id=<?= $row['id']?>"><?=$row['titulo'];?></a></th>
                                                    
                                                    <td style="padding: 0.8rem;"><?=$row['fecha'];?></td>
                                                    <td style="padding: 0.8rem;"><?=$row['respuestas'];?></td>
                                                    <td> 
                                                        <a href="editPost.php?id=<?= $row['id']?>" class="btn btn-secondary mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                            </svg>        
                                                        </a>
                                                        <a type="submit" class="btn btn-danger" href="controllers/deletePostController.php?id=<?= $row['id'];?>&id_autor=<?= $row['id_autor'];?>">
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
                                                                <div class="alert alert-warning col-md-12">
                                                                    No has escrito ningun post. ¡¿Qué esperas?!
                                                                </div>
                                                            </td>
                                                        </td>
                                                    </tr>
                                        <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php    
require_once './vistas/footer.php';
?>