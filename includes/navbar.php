<!DOCTYPE html>
<html>
<head>
<title>PortArt</title>
</head>
<body>
<header>
    <a href="index.php"><img src="Assets/imgs/logo.png" alt="" class="logo"></a>
    <nav class="menu">
            <ul class="nav_links">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="Diseño.php">Dibujos</a></li>
                <li><a href="Perfil.php?id=<?php echo $_SESSION["username"]; ?>"><?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>
                <li><a href="logout.php" id="login">Cerrar Sesión</a></li>
                <li><img src="#" alt=""></li>
            </ul>
        </img>
    </nav>
</header>
</body>
</html>