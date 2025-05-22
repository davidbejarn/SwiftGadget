<!DOCTYPE html>
<html>

<head>
  
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>SwiftGadget</title>

  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

 
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
 
  <link href="css/style.css" rel="stylesheet" />
  
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area sub_pages">
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.php">
            <img src="images/logo1.png" alt="" /><span>
              SwiftGadget
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="productos.php"> Productos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="servicios.php"> Servicios </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contactar.php">Contactanos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="carrito.php">Carrito</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
            <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
              <a class="nav-link" href="armar.php">
                Arma tu pc
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
  </div>

  <?php
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 'Producto no especificado';
$precio = isset($_GET['precio']) && is_numeric($_GET['precio']) ? floatval($_GET['precio']) : null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Método de pago</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
      text-align: center;
    }

    .pago-container {
      background-color: #151515;
      color: white;
      padding: 40px 20px;
      border-radius: 15px;
      width: 300px;
      margin: 50px auto;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    select, button {
      width: 100%;
      padding: 12px;
      margin-top: 15px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
    }

    button {
      background-color: #ccc;
      cursor: pointer;
    }

    button:hover {
      background-color: #bbb;
    }

    .cancelar-btn {
      background-color: #7d2ae8;
      color: white;
      padding: 12px 24px;
      margin-top: 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
    }

    .cancelar-btn:hover {
      background-color: #6921cc;
    }
  </style>
</head>
<body>

  <p>Estás comprando: <strong><?php echo $nombre; ?></strong></p>
  <p>Precio: <strong>
    <?php 
      echo $precio !== null ? '$' . number_format($precio, 0, ',', '.') : 'Precio no disponible'; 
    ?>
  </strong></p>

  <div class="pago-container">
    <h2>Métodos de pago</h2>
    <label for="metodo">Selecciona uno:</label>
    <select id="metodo" name="metodo">
      <option value="Nequi">Nequi</option>
      <option value="Daviplata">Daviplata</option>
      <option value="PSE">PSE</option>
      <option value="Tarjeta">Tarjeta de crédito</option>
    </select>
    <button type="button">Pagar</button>
  </div>

  <a href="productos.php" class="cancelar-btn">Cancelar y regresar</a>

</body>
</html>


