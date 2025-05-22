<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprar producto</title>
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
          <a class="navbar-brand" href="index.html">
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
                  <a class="nav-link" href="contactar.php">Contactenos</a>
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

    <style>
  section.pago-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    font-family: Arial, sans-serif;
    gap: 20px;
    text-align: center;
  }

  .info-producto {
    font-size: 16px;
  }
  .formulario-pago select,
.formulario-pago button {
  border-radius: 8px; 
  padding: 10px;
  border: none;
  outline: none;
  font-size: 16px;
}

.formulario-pago button:hover {
  background-color: #6c3aa3;
  color: white;
  cursor: pointer;
}


  .formulario-pago form {
    background-color: #1e1e1e;
    color: white;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
  }

  .formulario-pago label,
  .formulario-pago select,
  .formulario-pago button {
    display: block;
    margin: 15px auto;
    width: 100%;
  }

  .acciones {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: center;
  }

  .acciones button {
    background-color: #5a2a82;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
  }
</style>

</head>
<body>

<div class="contenedor">

<?php

class Producto {
    protected string $nombre;
    protected int $precio;

    public function __construct($nombre, $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function mostrarInformacion() {
        return "<div class='info-producto'>Estás comprando: <strong>{$this->nombre}</strong><br>Precio: <strong>$" . number_format($this->precio) . "</strong></div>";
    }
}

class Compra extends Producto {
    public function mostrarFormularioPago() {
        echo "<form method='POST'>";
        echo "<h2>Métodos de pago</h2>";
        echo "<label for='metodo'>Selecciona uno:</label>";
        echo "<select name='metodo' id='metodo'>
                <option value='nequi'>Nequi</option>
                <option value='tarjeta'>Tarjeta de crédito</option>
                <option value='pse'>PSE</option>
              </select>";
        echo "<button type='submit'>Pagar</button>";
        echo "</form>";
    }
}

$productos = [
    "mouse" => new Compra("Mouse Logitech G502", 170000),
    "audiculares" => new Compra("Audiculares LG", 95000),
    "gabinete" => new Compra("Gabinete Cougar Semitorre FV270", 420000)
];

$productoSeleccionado = $_GET['producto'] ?? '';

if (array_key_exists($productoSeleccionado, $productos)) {
    $producto = $productos[$productoSeleccionado];
    echo "<section class='pago-container'>";
echo "  <div class='info-producto'>";
echo $producto->mostrarInformacion();
echo "  </div>";

echo "  <div class='formulario-pago'>";
$producto->mostrarFormularioPago();
echo "  </div>";

echo "  <div class='acciones'>";
echo "    <a href='index.php'><button type='button'>Cancelar y regresar</button></a>";
echo "    <button id='verCanvaBtn'>Ver Canva</button>";
echo "  </div>";

echo "  <div id='svgContainer' style='display:none; margin-top: 10px;'>
        <svg width='100' height='100' viewBox='0 0 24 24' fill='gold' xmlns='http://www.w3.org/2000/svg'>
            <path d='M12 2L14.09 8.26L21 9.27L16 13.97L17.18 21L12 17.77L6.82 21L8 13.97L3 9.27L9.91 8.26L12 2Z'/>
        </svg>
      </div>";
echo "</section>";

}
?>
</div>
<canvas id="miCanvas" width="300" height="300"></canvas>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const verCanvaBtn = document.getElementById("verCanvaBtn");
    const svgContainer = document.getElementById("svgContainer");

    if (verCanvaBtn && svgContainer) {
      verCanvaBtn.addEventListener("click", function () {
        svgContainer.style.display = "block";
      });
    }
  });
</script>



<div class="contenedor">
     <section class="fruit_section">
    <div class="container">
      <h2 class="custom_heading">Productos destacados</h2>
      <p class="custom_heading-text">
        periféricos, componentes y accesorios.
      </p>
      <div class="row layout_padding2">
        <div class="col-md-8">
          <div class="fruit_detail-box">
            <h3>
              Mouse Logitech G502
            </h3>
            <p class="mt-4 mb-5">
              Utiliza cable, Posee rueda de desplazamiento, Con luces para mejorar la experiencia de uso y con sensor óptico.
            </p>
            <div>
            <a href="comprar.php?producto=mouse" class="custom_dark-btn">Comprar ahora</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <div class="fruit_img-box d-flex justify-content-center align-items-center">
            <img src="images/2.png" alt="" class="" width="250px" />
          </div>
        </div>
      </div>
      <div class="row layout_padding2">
        <div class="col-md-8">
          <div class="fruit_detail-box">
            <h3>
              Audiculares LG
            </h3>
            <p class="mt-4 mb-5">
              Sonido inmersivo, control en línea sin esfuerzo y diseño humanizado
            </p>
            <div>
            <a href="comprar.php?producto=audiculares" class="custom_dark-btn">Comprar ahora</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <div class="fruit_img-box d-flex justify-content-center ">
            <img src="images/audiculares2.png" alt="" class="" width="100px" />
          </div>
        </div>
      </div>
      <div class="row layout_padding2-top layout_padding-bottom">
        <div class="col-md-8">
          <div class="fruit_detail-box">
            <h3>
              Gabinete Cougar Semitorre Fv270
            </h3>
            <p class="mt-4 mb-5">
              El perímetro panorámico de vidrio templado y curvado amplifica la transparencia y el brillo para una visión épica, entrada de aire adicional a través del frontal elevado y
              gestión de cables inversa elimina el desorden.
            </p>
            <div>
            <a href="comprar.php?producto=gabinete" class="custom_dark-btn">Comprar ahora</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <div class="fruit_img-box d-flex justify-content-center align-items-center">
            <img src="images/pcc.png" alt="" class="" width="250px" />
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

</body>
</html>

