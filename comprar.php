<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprar producto</title>
    <style>
        body {
            background-color: white;
            color: black;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .contenedor {
            text-align: center;
        }
        form {
            background-color: #1e1e1e;
            color: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: 20px auto;
        }
        form h2, label {
            text-align: center;
        }
        label, select, button {
            display: block;
            margin: 15px auto;
            width: 100%;
        }
        button {
            background-color: #5a2a82; 
            color: white;
            padding: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .info-producto {
            margin-bottom: 20px;
            font-size: 16px;
        }
        .boton-cancelar {
            margin-top: 20px;
        }
        .boton-cancelar a button {
            background-color: #5a2a82;
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            color: white;
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
    echo $producto->mostrarInformacion();
    $producto->mostrarFormularioPago();
    echo "
        <div class='boton-cancelar'>
            <a href='index.php'>
                <button type='button'>Cancelar y regresar</button>
            </a>
        </div>";
        echo "
    <div class='boton-cancelar'>
    </div>

    <div>
        <button id='verCanvaBtn'>Ver Canva</button>
        <div id='svgContainer' style='display:none; margin-top: 10px;'>
            <svg width='100' height='100' viewBox='0 0 24 24' fill='gold' xmlns='http://www.w3.org/2000/svg'>
                <path d='M12 2L14.09 8.26L21 9.27L16 13.97L17.18 21L12 17.77L6.82 21L8 13.97L3 9.27L9.91 8.26L12 2Z'/>
            </svg>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const btn = document.getElementById('verCanvaBtn');
                const svg = document.getElementById('svgContainer');
                btn.addEventListener('click', function () {
                    svg.style.display = (svg.style.display === 'none') ? 'block' : 'none';
                });
            });
        </script>
    </div>
";

} else {
    echo "<p>Producto no encontrado.</p>";
}

?>
</div>

</body>
</html>

