<?php
    // Se inicializa la sesión
    session_start();
    include 'config.php';
    // Se comprueba que haya un usuario logeado, sino lo redirige al Login.php
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("location: login.php");
        exit;
    }
    $id_autor='';
    $tipo='';
    $contenido='';
    $MostrarFotos="SELECT * FROM imagenes";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/navbar.css" type="text/css">
    <link rel="stylesheet" href="Assets/css/footer.css">
    <link rel="stylesheet" href="Assets/css/Diseño.css">
    <title>Diseños</title>
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
    <div class="container">
        <div class="titulo">
            <h3>Diseño</h3>
        </div>
        <div class="contenido">
            <div class="side-left">
                <div class="first-side-left">
                    <h4>Tipo de Diseño</h4>
                    <label><input type="checkbox">Afiche</label><br>
                    <label><input type="checkbox">Dibujos</label><br>
                    <label><input type="checkbox">Logos</label><br>
                </div>
                <div class="second-side-left">
                    <h4>Etiquetas</h4>
                    <label><input type="checkbox" name="" id="">Etiquetas</label><br>
                    <label><input type="checkbox" name="" id="">Etiquetas</label><br>
                    <label><input type="checkbox" name="" id="">Etiquetas</label><br>
                    <label><input type="checkbox" name="" id="">Etiquetas</label><br>
                    <label><input type="checkbox" name="" id="">Etiquetas</label>
                </div>
            </div>

            <div class="container">
        <?php 
        //Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
        if($resultado = mysqli_query($link, $MostrarFotos)):  
    
        //la variable $user contiene el contenido de $result en un array asociativo
        while($fila = mysqli_fetch_assoc($resultado)): 
            $id_autor=$fila["id_autor"];
            $contenido=$fila["contenido"];
                      
        ?>
        <div id="cards" class="grid">
        <?php echo "<img id='imagen' style='width:200px' src='data:image/jpg; base64,". base64_encode($contenido)."'>"; ?>
            <?php 
                //Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
                $CargarNombre="SELECT id,username,tarifas FROM users WHERE id = ".$id_autor;
                if($resultado1 = mysqli_query($link, $CargarNombre)):  
            ?>
            <?php 
                //la variable $user contiene el contenido de $result en un array asociativo
                while($fila1 = mysqli_fetch_assoc($resultado1)): 
                $username=$fila1["username"];
                $id=$fila1["id"];
                $tarifas=$fila1["tarifas"];  
            ?>
            <?php endwhile; ?>
            <?php endif; ?> 

        </div>
        <?php 
            endwhile;
            endif; 
        ?> 
    </div>
        </div>
    </div>
    <footer class="footer-main">
        <div class="div-footer">
            <h4 class="Contacto" style="cursor: pointer;"><strong style="color: #fa983a; cursor: pointer;">Contacto: </strong> lalolandia@gmail.com</h4>
            <h2>PorArt 2021</h2>
        </div>
    </footer>
</body>
</html>