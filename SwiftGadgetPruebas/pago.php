<!DOCTYPE html>
<html lang="es">
<head>
  
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <title>SwiftGadget - Pago</title>

  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />

 
  <style>
    .pago-container {
      font-family: Arial, sans-serif;
      background-color:rgb(255, 255, 255);
      text-align: center;
      padding: 40px;
    }

    .pago-container .card {
      background-color: #1a1a1a;
      color: #fff;
      padding: 30px;
      border-radius: 10px;
      width: 300px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    .pago-container select,
    .pago-container button {
      width: 100%;
      padding: 10px;
      margin: 15px 0;
      font-size: 16px;
      border-radius: 5px;
      border: none;
    }

    .pago-container button {
      background-color: #ccc;
      color: black;
      cursor: pointer;
    }

    .pago-container .btn-purple {
      background-color: #6f2da8;
      color: white;
      margin: 10px;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 8px;
      display: inline-block;
    }

    .pago-container .btn-purple:hover {
      background-color: #551a8b;
    }

    .pago-container .product-info {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="hero_area sub_pages">
    <!-- Header -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo1.png" alt="" /><span>SwiftGadget</span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav">
                <li class="nav-item active"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="productos.php">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="servicios.php">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="contactar.php">Contáctenos</a></li>
                <li class="nav-item"><a class="nav-link" href="carrito.php">Carrito</a></li>
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
            <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
              <a class="nav-link" href="armar.php">Arma tu pc</a>
            </div>
          </div>
        </nav>
      </div>
    </header>
  </div>

  <?php
    $producto = $_GET['producto'] ?? 'Producto desconocido';
    $precio = $_GET['precio'] ?? '0';

    include('dbpago.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $metodo_pago = $_POST['metodo_pago'];

        $sql = "INSERT INTO pagos (nombre, correo, direccion, telefono, metodo_pago) 
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssss", $nombre, $correo, $direccion, $telefono, $metodo_pago);

        if ($stmt->execute()) {
            echo "Pago registrado exitosamente.";
        } else {
            echo "Error al registrar el pago: " . $stmt->error;
        }

        $stmt->close();
        $conexion->close();
    } else {
        echo "";
    }
  ?>

  <div class="pago-container">
    <div class="product-info">
      <p>Estás comprando: <strong><?php echo htmlspecialchars($producto); ?></strong></p>
      <p>Precio: <strong>$<?php echo number_format($precio, 0, ',', '.'); ?></strong></p>
    </div>

    <div class="card">
      <h2>Métodos de pago</h2>
      <form action="procesar_pago.php" method="post">
        <input type="hidden" name="producto" value="<?php echo htmlspecialchars($producto); ?>">
        <input type="hidden" name="precio" value="<?php echo htmlspecialchars($precio); ?>">

        <label for="metodo">Selecciona uno:</label>
        <select name="metodo" id="metodo" required>
          <option value="Nequi">Nequi</option>
          <option value="Daviplata">Daviplata</option>
          <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
          <option value="PSE">PSE</option>
        </select>

        <button type="submit">Pagar</button>
      </form>
    </div>

    <br>
    <a href="productos.php" class="btn-purple">Cancelar y regresar</a>
  </div>
</body>
</html>
