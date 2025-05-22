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
$conn = new mysqli('localhost', 'root', '', 'formulariopruebas');
$piezas = $conn->query("SELECT * FROM piezas_pc WHERE stock > 0");

$categorias = [];
while ($pieza = $piezas->fetch_assoc()) {
    $categorias[$pieza['tipo']][] = $pieza;
}
?>

<style>
.arma-tu-pc {
    max-width: 800px;
    margin: 50px auto;
    padding: 30px;
    background-color: #f7f7f7;
    border-radius: 16px;
    box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
    font-family: 'Poppins', sans-serif;
}

.arma-tu-pc h1 {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 30px;
}

.arma-tu-pc h2 {
    margin-top: 20px;
    color: #333;
    font-size: 1.2rem;
}

.arma-tu-pc select {
    width: 100%;
    padding: 10px;
    margin-top: 8px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 12px;
    transition: all 0.3s ease;
    background-color: white;
}

.arma-tu-pc select:hover {
    background-color: #f0e6ff;
    border-color: #b56cff;
    cursor: pointer;
}

.arma-tu-pc input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 12px;
}

.arma-tu-pc button {
    background-color: #b56cff;
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 12px;
    font-size: 1rem;
    transition: 0.3s;
}

.arma-tu-pc button:hover {
    background-color: #8f45cc;
    cursor: pointer;
}

.arma-tu-pc .total {
    font-weight: bold;
    font-size: 1.3rem;
    margin-top: 20px;
    text-align: center;
}
</style>

<div class="arma-tu-pc">
    <h1>Arma tu PC</h1>
    <form action="cotizacion.php" method="POST" id="form-pc">
        <?php foreach ($categorias as $tipo => $piezas): ?>
            <h2><?= htmlspecialchars($tipo) ?></h2>
            <select name="seleccionadas[<?= htmlspecialchars($tipo) ?>]" onchange="calcularTotal()" data-tipo="<?= htmlspecialchars($tipo) ?>">
                <option value="" data-precio="0"> Selecciona <?= htmlspecialchars($tipo) ?> </option>
                <?php foreach ($piezas as $pieza): ?>
                    <option 
                        value="<?= $pieza['id'] ?>" 
                        data-precio="<?= $pieza['precio'] ?>"
                    >
                        <?= $pieza['nombre'] ?> ($<?= $pieza['precio'] ?>) - Stock: <?= $pieza['stock'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php endforeach; ?>

        <div class="total">Precio total: $<span id="total">0.00</span> COP</div>

        <br>
        <input type="text" name="cliente_nombre" placeholder="Tu nombre completo" required>
        <br><br>
        <button type="submit">Enviar Cotización</button>
    </form>
</div>

<script>
function calcularTotal() {
    let total = 0;
    const selects = document.querySelectorAll('select');
    selects.forEach(select => {
        const option = select.options[select.selectedIndex];
        const precio = parseFloat(option.dataset.precio) || 0;
        total += precio;
    });
    document.getElementById('total').innerText = total.toFixed(2);
}


calcularTotal();
</script>




