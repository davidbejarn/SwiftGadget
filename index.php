<?php


?>

<!DOCTYPE HTML>
<html>
 <head>
   <meta charset="UTF-8">
   <title>Swift Gadget</title>
    <style>
    :root{
        color-scheme: light dark;
    }
    
    </style>
  </head>
    <body>
        <style>
            p {
                font-family: Helvetica;
                font-size: 20px;
                font-weight: bold;
                font-style: italic;
                color:rgb(196, 42, 170);
                background-color:rgb(0, 0, 0);
                border-style: solid;
                border-color:rgb(95, 56, 84);
                border-width: 2px;
                margin: 14px;
                padding: 20px;
                border-radius: 14px;
            }
        </style>
        <header>
            <h1>Bienvenido a SwiftGadget</h1>
            <h2>Tu tienda de tecnología y perifericos</h2>
        </header>
        <div>   
            <p>En nuestra tienda encontrarás lo último en tecnología y periféricos. Ofrecemos 
                una amplia gama de productos, desde teclados y mouses de alto 
                rendimiento hasta audífonos, monitores, sillas gaming y más.</p>
            <section><p>Parafo 3 modelos.</p></section>
        </div>
        <div>
            <ul>
                <li>
                    <div>
                        <table id="lista">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </li>
            </ul>
        </div>
        <div>
        <div>
            <span>
                Ofertas
            </span>
            <h1>Keyboards</h1>
            <p>
                En nuestra seccion encontraras diferentes tipos de teclados diseñados
                para cada tipo de usuario, encontraras tanto teclados mecanicos como de
                membrana. Todos estos diseñados para una mayor comodidad y durabilidad
            </p>
            <div>
                <img src="img/5.png" alt="">
            </div>
            <h1>Mouses</h1>
            <p>
                Encontraras una gran diversidad de Mouses en nuestra seccion, diseñados
                para diferentes tipos de tareas, con sensores avanzados y una gran comodidad
                para cada usuario

            </p>
            <div>
            <img src="img/2.png" alt="">
            </div>
        </div>
        </div>

        <section>
            <div>
                <img src="img/carrito.png" alt="">
                <h3>Carrito</h3>
                <p> Aqui podras agregar al Carrito</p>
            </div>
            <div>
                <img src="img/creditcard.png" alt="">
                <h3>Metodos de pago</h3>
                <p> Observa nuestros metodos de pago disponibles</p>
            </div>
            <div>
                <img src="img/envio.png" alt="">
                <h3>Envios</h3>
                <p>Difentes tipos de envios depediendo la ciudad</p>
            </div>
            
        </section>

        <section>
            <div>
                <img src="img/mecanico2.png" alt="">
                <h3>Promociones</h3>
                <p>Teclado Mecanico</p>
            </div>
            <div>
                <img src="img/audiculares1.png" alt="">
                <h3>Promociones</h3>
                <p>Audiculares blancos</p>
            </div>
            <div>
                <img src="img/mouse2.png" alt="">
                <h3>Promociones</h3>
                <p>Mouse Blanco</p>
            </div>
            <div>
                <img src="img/membr2.png" alt="">
                <h3>Promociones</h3>
                <p>Teclado membrana</p>
            </div>
            <div>
                <img src="img/audiculares2.png" alt="">
                <h3>Promociones</h3>
                <p>Audiculares</p>
            </div>
        </section>

        <main>
    <h2>Productos destacados</h2>

            <div>
                <img src="img/sillag.png" alt="">
                <a href="comprar.php?producto=sillagamer"><h3>Silla gamer</h3></a>
                <p id="demo"></p>
                <script>
                    var pr1 = 600000;
                    var precio = pr1;
                    document.getElementById("demo").innerHTML = "Precio: " + precio;
                </script>
            </div>

            <div>
                <img src="img/desktop.png" alt="">
                <a href="comprar.php?producto=escritorio"><h3>Escritorio</h3></a>
                <p id="demo2"></p>
                <script>
                    var pr2 = 350000;
                    var precio = pr2;
                    document.getElementById("demo2").innerHTML = "Precio: " + precio;
                </script>
            </div>

            <div>
                <img src="img/pcc.png" alt="">
                <a href="comprar.php?producto=gabinete"><h3>Gabinete</h3></a>
                <p id="demo3"></p>
                <script>
                    var pr3 = 300000;
                    var precio = pr3;
                    document.getElementById("demo3").innerHTML = "Precio: " + precio;
                </script>
            </div>
        </main>

        <form method="POST" action="formulario.php">
        <style>
            body {
                background-color: black;
                color: white;
                font-family: Arial, sans-serif;
                padding: 30px;
            }
            form {
                background-color: #1e1e1e;
                padding: 20px;
                border-radius: 10px;
                width: 300px;
            }
            label, select, button {
                display: block;
                margin: 15px 0;
                width: 100%;
            }
            button {
                background-color: magenta;
                color: white;
                padding: 10px;
                border: none;
                border-radius: 8px;
                cursor: pointer;
            }
        </style>
            <h2>Formulario</h2>
            <h3>Rellena este formulario para enviarte futuras promociones!!</h3>

                NOMBRE: <input type="text" name="nombre" required /><br><br>
                EMAIL : <input type="email" name="email" required /><br><br>
                CELULAR: <input type="tel" name="celular" /><br><br>
                HORA: <input type="time" name="hora" /><br><br>
                FECHA: <input type="date" name="fecha" /><br><br> 
                EDAD: <input type="number" name="edad" /><br><br>

                GÉNERO:
                <select name="genero">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select><br><br>
                <input type="checkbox" name="promociones" value="1" />
                    Acepto recibir promociones<br><br>
                
                    <h4>¿Cómo prefieres que te contactemos?</h4>
                    <input type="checkbox" class="checkbox-magenta" id="email" name="preferencias[]" value="email">
                    <label for="email" class="checkbox-label">Email</label><br>

                    <input type="checkbox" class="checkbox-magenta" id="celular" name="preferencias[]" value="celular">
                    <label for="celular" class="checkbox-label">Celular</label><br>

                    <input type="checkbox" class="checkbox-magenta" id="whatsapp" name="preferencias[]" value="whatsapp">
                    <label for="whatsapp" class="checkbox-label">WhatsApp</label><br><br>



                <button type="submit">Enviar</button>

                <style>
                    
                    .checkbox-magenta {
                        display: none;
                    }

                   
                    .checkbox-label {
                        display: inline-block;
                        cursor: pointer;
                        position: relative;
                        padding-left: 30px;
                        margin-right: 15px;
                        user-select: none;
                        font-family: sans-serif;
                    }

                
                    .checkbox-label::before {
                        content: "";
                        position: absolute;
                        left: 0;
                        top: 2px;
                        width: 20px;
                        height: 20px;
                        border: 2px solid magenta;
                        border-radius: 50%; 
                        background-color: white;
                        box-sizing: border-box;
                        transition: 0.2s;
                    }

                    
                    .checkbox-magenta:checked + .checkbox-label::before {
                        background-color: magenta;
                    }
                    </style>
            </form>

        <nav>
            <ul>
                <li><a href="http://localhost:8000/" target="_blank">Inicio</a></li>
                <li><a href="https://github.com/davidbejarn" target="_blank">Servicios</a></li>
                <li><a href="url" target="_blank">Productos</a></li>
                <li><a href="https://wa.link/cfe366" target="_blank">Contacto</a></li>
            </ul>
        </nav>
    </body>
</html>