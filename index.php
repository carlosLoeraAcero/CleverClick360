<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/styles.css">
    <title>CRUD</title>
</head>
<body>
    <header>
        <a href="./index.php">Crear Usuario</a>
        <a href="./registros.html">Registro de Usuarios</a>
    </header>
    <div class="container mt-4 mb-4">
        <h1 class="text-center">CleverClick360</h1>
        <div class="row justify-content-center">
            <div class="col-10 col-md-6">
                <form id="form-crear">
                    <input type="text" class="input-style mb-4 form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                    <input type="text" class="input-style mb-4 form-control" id="correo" name="correo" placeholder="Correo" required>
                    <input type="text" class="input-style mb-4 form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary form-control">Borrar</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary form-control">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
      ></script>
      <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"
      ></script>
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/create.js"></script>
</body>
</html>