<?php
session_start();

// credenciales de acceso a la base datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'tienda_perry_el_orrintorinco';

// conexión a la base de datos
$Conexion = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_error()) {
    // si se encuentra error en la conexión
    exit('Fallo en la conexión de MySQL:' . mysqli_connect_error());
}

// Se valida si se ha enviado información, con la función isset()
if (!$_POST) {
    // si no hay datos muestra error y re direccionar
    //header('Location: Login_que_jale.html');
    echo'pato';
}

// Obtener el ID del usuario usando el nombre de usuario
if ($Result = $Conexion->prepare('SELECT id, Pato FROM accounts WHERE username = ?')) {
    // parámetros de enlace de la cadena s
    $Result->bind_param('s', $_POST['username']);
    $Result->execute();
    $Result->bind_result($id, $Pato); // vincula las variables $id y $Pato a los resultados de la consulta
    $Result->fetch(); // obtiene una fila de resultados
    $Result->close();
} else {
    header('Location: index.html');
}

// Cambiar la contraseña del usuario aaaaaaaaaaaaaaaaaaaaaaaa 
$new_hash = password_hash($_POST['new_password'], PASSWORD_DEFAULT, ['cost' => 15]);
//if ($Update = $Conexion->prepare('UPDATE accounts SET Pato = ? WHERE id = ?')) {
    $Update = $Conexion->prepare('UPDATE accounts SET Pato = ? WHERE id = ?');
    $Update->bind_param('si', $new_hash, $id);
    $Update->execute();
    
    $Update->close();
    echo'pato2.0';
    // redirigir al usuario a la página de éxito
    //header('Location: Login_que_jale.html');
//} else {
    // error al actualizar la contraseña
    //header('Location: Forget_password.php');
//}
//aaaaa waaa

$Conexion->close();
?>
