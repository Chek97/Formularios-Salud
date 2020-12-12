<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <?php include_once('../Includes/header.php'); ?>
</head>
<body>
    <div class='container'>
        <div>
            <header>
                <h1>CREAR USUARIO</h1>
            </header>
            <div>
                <form action="../../Controller/Register/RegisterController.php" method="post">
                    <div class='form-group'>
                        <input type="text" name='inp_usuario' class='form-control' placeholder='Usuario'>
                    </div>
                    <div class='form-group'>
                        <input type="text" name='inp_nombre' class='form-control' placeholder='Nombre'>
                    </div>
                    <div class='form-group'>
                        <input type="text" name='inp_apellido' class='form-control' placeholder='Apellido'>
                    </div>
                    <div class='form-group'>
                        <input type="email" name='inp_correo' class='form-control' placeholder='Correo Electronico'>
                    </div>
                    <div class='form-group'>
                        <input type="number" name='inp_telefono' class='form-control' placeholder='Celular'>
                    </div>
                    <div class='form-group'>
                        <input type="password" name='inp_contra' class='form-control' placeholder='Contraseña'>
                    </div>
                    <div class='form-group'>
                        <input type="date" name='inp_fecha' class='form-control' placeholder='Fecha de Nacimiento'>
                    </div>
                    <div class='form-group'>
                        <label for="">Genero</label>
                        <br>
                        <input type="radio" name='inp_genero' value='Masculino'> Masculino
                        <input type="radio" name='inp_genero' value='Femenino'> Femenino
                    </div>
                    <input type="submit" value='Crear Usuario' name='btnCrear' class='btn btn-primary'>
                </form>
            </div>
        </div>
    </div>
    <?php include_once('../Includes/footer.php'); ?>
</body>
</html>