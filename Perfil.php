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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/navbar.css" type="text/css">
    <link rel="stylesheet" href="Assets/css/footer.css">
    <link rel="stylesheet" href="Assets/css/perfil.css">
    <link rel="stylesheet" href="Assets/css/sliderPerfil.css">
    <title>Perfil</title>
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
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Acerca de mí</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <?php 
                    //Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
                    if($result = mysqli_query($link, $query)):  
                ?>
                    <?php 
                        //la variable $user contiene el contenido de $result en un array asociativo
                        while($user = mysqli_fetch_assoc($result)): 
                    ?>
                        <tr>
                            <td width="20%" style="text-align: center"><a href="Perfil.php?id=<?php echo $user['id'] ?>"><?php echo $user['username']; ?></a></td>
                            <td width="15%" ><?php echo $user['email']; ?></td>
                            <td width="15%" class=""><?php echo $user['phone']; ?></td>
                            <td width="15%" class=""><?php echo $user['acercademi']; ?></td>
                            
                            <td width="15%" class="">
                                <a href="update.php?id=<?php echo $user['id'] ?>" class=''>Editar</a> <a href="delete.php?id=<?php echo $user['id'] ?>" class=''>Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    <?php mysqli_free_result($result); ?>
                <?php endif; ?>
            </table>
	</div>
            </div>
        </div>

        <div class="container-btns">
            <button class="btn-dropdown">Contacto
                <i class="fa-caret-down"></i>
            </button>
            <div class="container-info">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
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

        <div class="container-btns">
            <button class="btn-dropdown">Trabajos
                <i class="fa-caret-down"></i>
            </button>
            <div class="container-info">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="Assets/imgs/cards/diagram.png" style="width:50%">
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

