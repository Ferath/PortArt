<?php 
require('../config.php');
sleep(1);
if (isset($_POST)) {
    $email = (string)$_POST['email'];
    $result1 = $link->query(
        'SELECT * FROM users WHERE email = "'.strtolower($email).'"'
    );
 
    if ($result1->num_rows > 0) {
        echo '<div class="alert alert-danger"><strong>Lo sentimos</strong> Correo NO disponible.</div>';
    } else {
        echo '<div class="alert alert-success"><strong>Enhorabuena!</strong> Correo disponible.</div>';
    }
}

