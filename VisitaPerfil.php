<?php
    // Se inicializa la sesión
    session_start();
    include "includes/config.php";


	//Cadena de consulta que me devuelve todos los registros de la tabla 'users'
	$query = "SELECT * FROM users WHERE id =".$_GET['id'];
    
    $id_autor='';
    $tipo='';
    $contenido='';

    // QUERY par cargar las imagenes, si es que el usuario ha subido alguna
    $MostrarFotos="SELECT * FROM imagenes WHERE id_autor=".$_GET['id'];
    
    //Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query    
    if($result = mysqli_query($link, $query)): 
    while($user = mysqli_fetch_assoc($result)): 
?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" 
      type="image/png" 
      href="../Assets/imgs/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/Assets/imgs/logo.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="/Assets/imgs/logo.png" type="image/x-icon"/>  
    <link rel="stylesheet" href="Assets/css/navbar.css" type="text/css">
    <link rel="stylesheet" href="Assets/css/footer.css">
    <link rel="stylesheet" href="Assets/css/perfil.css">
    <title>Perfil de <?php echo $user['username']; ?></title>
</head>
<body>
    <header> 
            <a href="index.php"><img src="Assets/imgs/logo.png" alt="" class="logo"></a>
            <nav class="menu">
                <ul class="nav_links">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="Diseño.php">Dibujos</a></li>
                    <li><a href="login.php" id="login">Login</a></li>
                    <li><a href="register.php" id="login">Register</a></li>
                    <li><img src="#" alt=""></li>
                </ul>
            </img>
        </nav>
    </header>
    <main>
        <div class="div-pefil">
            <img src="Assets/imgs/perfil/businesswoman.png" class="img-perfil"><br>
            <label id="user_active"><?php echo $user['email']; ?></label>
        </div>
        <div class="container-btns">
            <button class="btn-dropdown">Información
                <i class="fa-caret-down"></i>
            </button>
            <div class="container-info">
                <div id="wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Acerca de mí</th>
                        </tr>
                    </thead>
                    <tr>
                        <td width="20%" style="text-align: center"><p><?php echo $user['username']; ?></a></td>
                        <td width="15%" class=""><?php echo $user['acercademi']; ?></td>
                    </tr>
                </table>
	            </div>
            </div>
        </div>
        <div class="container-btns">
            <button class="btn-dropdown">Contacto
                <i class="fa-caret-down"></i>
            </button>
            <div class="container-info">
                <p>Mi correo es: <?php echo $user['email']; ?><br><?php echo $user['phone']; ?></p>
            <div id="todolist">
            </div>
            </div>
        </div>
        <div class="container-btns">
            <button class="btn-dropdown">Tarifas
                <i class="fa-caret-down"></i>
            </button>
            <div class="container-info">
                <p>Cobro: <?php echo $user['tarifas']; ?></p>
            </div>
        </div>
        <div class="container-btns">
            <button class="btn-dropdown">Reseñas
                <i class="fa-caret-down"></i>
            </button>
            <div class="container-info">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                <a href="logeado/CarroCompras.php"> Contratar servicio / prueba </a>
            </div>
        </div>
        <form action="upload.php" class="" method="POST" enctype="multipart/form-data">
                Subir una imagen: <input name="imagen" id="imagen" type="file"/>
                <input type="submit" name="subir" value="Subir imagen"/>
        </form>
        <?php 
        //Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
            if($resultado = mysqli_query($link, $MostrarFotos)):  
        
            //la variable $user contiene el contenido de $result en un array asociativo
            while($fila = mysqli_fetch_assoc($resultado)): 
                $id_autor=$fila["id_autor"];
                $contenido=$fila["contenido"];
                $tipo=$fila["tipo"];  
        
            // Finaliza el While de arriba
            endwhile; 
        
            // Finaliza el IF de arriba
            endif; 
        ?>
    </main>
    <footer class="footer-main">
        <div class="div-footer">
            <h4 class="Contacto" style="cursor: pointer;"><strong style="color: #fa983a; cursor: pointer;">Contacto: </strong> lalolandia@gmail.com</h4>
            <h2>PorArt 2021</h2>
        </div>
    </footer>
    <script src="Assets/js/dropdown.js"></script>
</body>
</html>

<?php 
    // Finaliza el While de arriba
    endwhile; 
?>
<?php
    // Finaliza el IF de arriba
    endif; 
?>