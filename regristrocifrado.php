<?php 
require_once('conexion.php');

$user= $_POST['User'];
$hash=password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost'=> 15]);
$correo= $_POST['correo'];

if (!isset($_POST['User'], $_POST['password'],$_POST['correo'])) {

    // si no hay datos muestra error y re direccionar

    header('Location: form_user.html');
}

//$hash=password_hash($contra, PASSWORD_DEFAULT, ['cost'=> 15]);
//o tambieen jala
//$hash=password_hash($_POST['pass'], PASSWORD_DEFAULT, ['cost'=> 15]);
//hash: es el resultado de un algoritmo de cifrado

/*$password: Es la contraseña que deseas hashear.
$hash_algorithm: Es el algoritmo de hash que deseas utilizar. Puedes especificar un algoritmo como PASSWORD_DEFAULT o PASSWORD_BCRYPT, entre otros. PASSWORD_DEFAULT es una constante que utiliza el algoritmo más seguro disponible en la versión de PHP que estés utilizando.
$options (opcional): Un array asociativo de opciones que puedes utilizar para personalizar el proceso de hash, como el costo de la función de hash (para BCRYPT), entre otras.
*/
$sql="INSERT INTO accounts(username,Pato,email) value('$user','$hash','$correo')";

$envio= mysqli_query($Conexion,$sql);

if(!$envio){
    echo '<SCRIPT> alert("tu regristro no se puedo regristar")</SCRIPT>';
    echo ' Error de MySQL:'.mysqli_error($Conexion);
} else {
    echo'Parece que todo va bien';
    header('Location: form_user.html');
}

?>
