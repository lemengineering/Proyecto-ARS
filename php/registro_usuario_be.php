<?php
    include 'conexion_be.php';

    $nombre_completo= $_POST ['nombre_completo'];
    $email = $_POST ['email'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    //$clave= hash('sha512', $clave); // Encriptar clave
    
    $query = "INSERT INTO usuarios(nombre_completo,email,usuario,clave)
    VALUES ('$nombre_completo','$email', '$usuario', '$clave')";
    
    //Verificar que el correo no se repita en la base de datos...
    $consulta_email = "SELECT * FROM usuarios WHERE email= '$email' ";
    $verificar_email = mysqli_query($conexion,$consulta_email);
    
    if(mysqli_num_rows($verificar_email) > 0 ) { 
        
        echo "<script> alert( 'Este correo ya está registrado' ); 
        window.location= '../index.php' </script>
        ";
        exit();
        mysqli_close($conexion);


    }

    //Verificar que el usuario no se repita
    $consulta_usuario = "SELECT * FROM usuarios WHERE usuario= '$usuario' ";
    $verificar_usuario = mysqli_query($conexion,$consulta_usuario);
    
    if(mysqli_num_rows($verificar_usuario) > 0 ) { 
        
        echo "<script> alert( 'Nombre de usuario ya registrado' ); 
        window.location= '../index.php' </script>
        ";
        exit();
        mysqli_close($conexion);


    }
    
    
    
    $ejecutar = mysqli_query($conexion,$query);

    if($ejecutar){
               
        $var = "Usuario creado correctamente";
        echo "<script> alert('".$var."'); 
        window.location= '../index.php' </script>
        ";


    }else {
        $var1 = "Inténtalo de nuevo";
        echo "<script> alert('".$var1."'); 
        window.location= '../index.php' </script>
        ";
    }

    mysqli_close($conexion);

    









?>