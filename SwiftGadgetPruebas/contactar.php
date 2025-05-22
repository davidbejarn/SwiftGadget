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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = $_POST['nombre'];
  $telefono = $_POST['telefono'];
  $email = $_POST['email'];
  $mensaje = $_POST['mensaje'];

  $conn = new mysqli("localhost", "root", "", "formulariopruebas");

  if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
  }

  $stmt = $conn->prepare("INSERT INTO contactos (nombre, telefono, email, mensaje) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $nombre, $telefono, $email, $mensaje);

  if ($stmt->execute()) {
    echo "<script>alert('Mensaje enviado correctamente');</script>";
  } else {
    echo "<script>alert('Error al enviar el mensaje');</script>";
  }

  $stmt->close();
  $conn->close();
}
?>

<section class="contact_section layout_padding">
  <div class="container">
    <h2 class="font-weight-bold">
      Contáctanos
    </h2>
    <div class="row">
      <div class="col-md-8 mr-auto">
        <form action="contactar.php" method="POST">
          <div class="contact_form-container">
            <div>
              <div>
                <input type="text" name="nombre" placeholder="Nombre" required>
              </div>
              <div>
                <input type="text" name="telefono" placeholder="Número de teléfono">
              </div>
              <div>
                <input type="email" name="email" placeholder="Email" required>
              </div>
              <div class="mt-5">
                <input type="text" name="mensaje" placeholder="Mensaje, reclamo o inquietud" required>
              </div>
              <div class="mt-5">
                <button type="submit">
                  Send
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

  





  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <script>
    
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 40.645037,
          lng: -73.880224
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 40.645037,
          lng: -73.880224
        },
        map: map,
        icon: image
      });
    }
  </script>
  
</body>

</html>