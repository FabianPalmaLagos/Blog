<?php
require_once './vistas/header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php if(isset($_SESSION['usuarioerror'])): ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['usuarioerror'];?>
                    </div>
                    <?php unset($_SESSION['usuarioerror']);?>
                <?php endif; ?>    
                <div class="mt-4">
                    <div class="card shadow ">
                        <div class="card-header">
                            Iniciar Sesión
                        </div>
                        <div class="card-body ">
                            <form action="controllers\loginController.php" method="post">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group d-grid gap-2 mt-4">
                                    <button class="btn btn-success">
                                        Entrar
                                    </button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
<?php    
require_once './vistas/footer.php';
?>