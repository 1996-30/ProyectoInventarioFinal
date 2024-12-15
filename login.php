<!-- Un programa que valide un usuario y contaseña, usuario correcto, contraseña 123 -->

<?php 
session_start();
include 'db.php';


if($_POST){
    $correo = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id_usuario, nombres, usuario, email, clave, id_rol FROM  usuariosweb WHERE email = '$correo'";
    echo $sql;

    $resultado = $conn->query($sql);
    //validamos si viene algun registro si es mayor a 0
    $num = $resultado->num_rows;

    //si es mayor cero existe el usuario
    if($num>0){
        $row = $resultado->fetch_assoc();
        //seleccionamos el password de la base de datos
        $password_bd = $row['clave'];
        //password que queremos cifrar que viene de la interfaz
       // $pass_c = sha1($password);

        if($password==$password_bd){
            
            $_SESSION['message'] = 'Acceso permitido ';
            $_SESSION['message_type'] = 'success';
            $_SESSION['redirect'] = true;

                    $_SESSION['id_usuario'] = $row['id_usuario'];
                    $_SESSION['nombres'] = $row['nombres'];
                    $_SESSION['id_rol'] = $row['id_rol'];
                    $_SESSION['email'] = $row['email'];
                    
                    header("Location: home.php");


        }else{
            $_SESSION['message'] = 'Contraseña Incorrecta';
            $_SESSION['message_type'] = 'danger';
            $_SESSION['redirect'] = false;
           
        }

    }else{
       $_SESSION['message'] = 'Verifique Usuario';
        $_SESSION['message_type'] = 'danger';
        $_SESSION['redirect'] = false;
      
    }
}


$conn->close();


header("Location: index.php");

    
?>