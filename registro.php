<?php
require_once './vistas/header.php';

?>
<style>
    .ocultar {
        display: none;
    }
    
    .mostrar {
        display: block;
    }
</style>

<script>
        function verificarPasswords() {
 
            var pass1 = document.getElementById('password').value;
            var pass2 = document.getElementById('password2').value; 
            
            if (pass1 != pass2) {
            alert("Las passwords deben de coincidir");
            return false;
            } else {
            alert("Todo esta correcto");
            return a; 
            }
        }
        
</script>
<body>
    <div class="container">
        <div class="row">
        <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <?php if(isset($_SESSION['registro'])): ?>
                    <div class="alert alert-success">
                        <?= $_SESSION['registro'];?>
                    </div>
                    <?php unset($_SESSION['registro']);?>
                    <?php endif; ?>
                    <div id="msg"></div>
        
                    <!-- Mensajes de Verificación -->
                    <div id="error" class="alert alert-danger ocultar" role="alert">
                        Las Contraseñas no coinciden, vuelve a intentar !
                    </div>
                </div>
                <div class="card shadow mt-4">
                    <div class="card-header">
                        Registrar
                    </div>
                    <div class="card-body">
                        <form action="controllers\registroController.php" method="post" onsubmit="verificarPasswords()">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" id="password" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password2">Repetir contraseña</label>
                                <input type="password" name="password2" id="password2" required class="form-control">
                            </div>
                            <div class="form-group d-grid gap-2 mt-4">
                                <button type="submit" id="registro" class="btn btn-success">
                                    Registrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</body>
<?php    
require_once './vistas/footer.php';
?>