<?php
 
if($_POST) {
    $name = "";
    $email = "";
    $message = "";
     
    if(isset($_POST['name'])) {
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
     
     
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
     
    if(mail($recipient,$message, $headers)) {
        echo "<p>Gracias contactaremos, $name. Contestaremos en 48 horas.</p>";
    } else {
        echo '<p>Correo electronico no recibido.</p>';
    }
     
} else {
    echo '<p>Algo ha ido mal.</p>';
}
 
?>