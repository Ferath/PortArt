<?php
    // Se inicializa la sesión
    session_start();
    include 'config.php';

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

    $MostrarFotos="SELECT * FROM imagenes WHERE id_autor=".$_SESSION["id"];
?>

<?php 
    //Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
    if($result = mysqli_query($link, $query)):  
 ?>

<?php 
    //la variable $user contiene el contenido de $result en un array asociativo
    while($user = mysqli_fetch_assoc($result)): 
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/navbar.css" type="text/css">
    <link rel="stylesheet" href="Assets/css/footer.css">
    <link rel="stylesheet" href="Assets/css/perfil.css">
    <link rel="stylesheet" href="Assets/css/sliderPerfil.css">
    <title>Perfil de <?php echo $user['username']; ?></title>
</head>
<body>
    <?php 
        include"includes/navbar.php";
    ?>
    <main>
        <div class="div-pefil">
            <img src="Assets/imgs/perfil/businesswoman.png" class="img-perfil"><br>
            <label id="user_active"><?php echo htmlspecialchars($_SESSION["email"]); ?></label>
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
                            <td width="15%" class="" style='text-align:centar'>
                                <a href="update.php?id=<?php echo $user['id'] ?>" class=''>Editar</a> <a href="delete.php?id=<?php echo $user['id'] ?>" class=''>Eliminar</a>
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
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
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
        <?php 
        //Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
            if($resultado = mysqli_query($link, $MostrarFotos)):  
        ?>

        <?php 
            //la variable $user contiene el contenido de $result en un array asociativo
            while($fila = mysqli_fetch_assoc($resultado)): 
                $id_autor=$fila["id_autor"];
                $contenido=$fila["contenido"];
                $tipo=$fila["tipo"];  
                echo "<img id='imagen' src='data:image/jpg; base64,". base64_encode($contenido)."'>";      
        ?>

        <div class="container-btns">
            <button class="btn-dropdown">Trabajos
                <i class="fa-caret-down"></i>
            </button>
            <div class="container-info">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                    
                        <?php 
                        echo "id del autor es ".$id_autor."<br>";
                        echo "Tipo de imagen es ".$tipo."<br>";
                        
                        ?>
                        <div class="text">Caption Text</div>
                    </div>
                    
                    <div class="mySlides fade">
                        <img src="Assets/imgs/cards/faq.png" style="width:50%">
                        <div class="text">Caption Two</div>
                    </div>
                    
                    <div class="mySlides fade">
                        <img src="Assets/imgs/cards/team.png" style="width:50%">
                        <div class="text">Caption Three</div>
                    </div>                   
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                Subir una imagen: <input name="imagen" id="imagen" type="file"/>
                <input type="submit" name="subir" value="Subir imagen"/>
                </form>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </main>
    <footer class="footer-main">
        <div class="div-footer">
            <h4 class="Contacto" style="cursor: pointer;"><strong style="color: #fa983a; cursor: pointer;">Contacto: </strong> lalolandia@gmail.com</h4>
            <h2>PorArt 2021</h2>
        </div>
    </footer>
    <script src="Assets/js/dropdown.js"></script>
    <script src="Assets/js/slider.js"></script>
</body>
</html>

<?php endwhile; ?>
<?php endif; ?>