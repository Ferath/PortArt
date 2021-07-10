<?php
    // Se inicializa la sesión
    session_start();
    include "../includes/config.php";

    // Se comprueba que haya un usuario logeado, sino lo redirige al Login.php
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

	//Cadena de consulta que me devuelve todos los registros de la tabla 'users'
	$query = "SELECT * FROM users WHERE id = ".$_SESSION["id"];
    
    $id_autor='';
    $tipo='';
    $contenido='';

    // QUERY par cargar las imagenes, si es que el usuario ha subido alguna
    $MostrarFotos="SELECT * FROM imagenes WHERE id_autor=".$_SESSION["id"];
    
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
    <link rel="icon" href="../Assets/imgs/logo.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="/Assets/imgs/logo.png" type="image/x-icon"/>  
    <link rel="stylesheet" href="../Assets/css/navbar.css" type="text/css">
    <link rel="stylesheet" href="../Assets/css/footer.css">
    <link rel="stylesheet" href="../Assets/css/perfil.css">
    <title>Perfil de <?php echo $user['username']; ?></title>
</head>
<body>
<header>    
    <a href="indexlogeado.php"><img src="../Assets/imgs/logo.png" alt="" class="logo"></a></img>
    <nav class="menu">
        <ul class="nav_links">
            <li class="item"><a href="indexlogeado.php">Inicio</a></li>
            <li class="item"><a href="diseñologeado.php">Dibujos</a></li>
            <li class="item"><a href="#"><?php echo htmlspecialchars($_SESSION["username"]); ?></a>
            <ul class="desple">
                <li><a class="subItem" href="Perfil.php?id=<?php echo $_SESSION["username"]; ?>">Perfil</a></li>
                <li><a class="subItem" href="../includes/logout.php" id="login">Cerrar Sesión</a></li>
            </ul>
            </li>
            <li class="item"><img src="#" alt=""></li>
        </ul>
    </nav>
</header>
<main>
    <div class="div-pefil">
        <br>
        <?php echo "<img id='imagen' class='img-perfil' src='data:image/jpg; base64,". base64_encode($user['avatar'])."'>"; ?><br>
        <label id="user_active"><?php echo $user['email']; ?></label>
        <form action="../includes/avatar.php" class="" method="POST" enctype="multipart/form-data">
            Cambia tu foto de perfil: <input name="imagen" id="imagen" type="file"/>
            <input type="submit" name="subir" value="Subir imagen"/>
    </form>
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tr>
                    <td width="20%" style="text-align: center"><a href="Perfil.php?id=<?php echo $user['id'] ?>"><?php echo $user['username']; ?></a></td>
                    <td width="15%" class=""><?php echo $user['acercademi']; ?></td>
                    <td width="15%" class="" style='text-align:centar'><a href="../includes/update.php?id=<?php echo $_SESSION["id"] ?>" class=''>Editar</a> <a href="../includes/delete.php?id=<?php echo $_SESSION["id"] ?>" class=''>Eliminar</a>
                    </td>
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
            <a href="CarroCompras.php"> Contratar servicio / prueba </a>
        </div>
    </div>
    <form action="../includes/upload.php" class="" method="POST" enctype="multipart/form-data">
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
<script src="../Assets/js/dropdown.js"></script>
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