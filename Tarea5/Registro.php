<?php
require_once 'Modelo.php';
$conexion= new BBDD();
$conexion= $conexion->getConexion();
if(!$conexion){
    header("location:Instalador.php");
}
if(!empty($_POST)){
    $a=false;
    //var_dump($_POST['nombre']);
   $datos_insert="Insert into Usuario values(null,'{$_POST['nombre']}','{$_POST['apellido']}','{$_POST['correo']}','{$_POST['contra']}')";
   $datos_consult=  mysqli_query($conexion,"select * from usuario");
   foreach ($datos_consult as $n){
       if($n['correo']==$_POST['correo']){
          $a=true; //echo "Este correo ya existe";
       echo"   <script> alert('Este correo ya existe'); </script>";
   }
   }
   if($a==false){
       mysqli_query($conexion,$datos_insert);
       header("location:Login.php");
   }
  
   //var_dump($a);
    


}


?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap.css" rel="stylesheet">
        <meta charset="utf-8">
        <title>Login</title>
        <style>
            @media(max-width:800px){
                form {
                   width: 80%;
                }
            }
            
           
             
           
           
            body{
         //       background-color: #c6c8ca;
                padding-top: 5%;
                display: flex;
                  background-color:violet;   
                
            }
            h2 {
            color:white;
            font-size: 50px;
            text-align: center;
           margin-bottom: 1px;
        }
        input {
                display:block;
                padding:10px;
                width: 100%;
                margin: 10px 0px;
            }
            form {
               
               border:white 1px solid;
                background-color:violet;
               margin: auto;
               width: 50%;
               padding: 20px;
               max-width: 500px;
            }
            span {
                margin-left: 67%;
            }
        </style>
    </head>
    <body >
        
        <form action="" method="post">
            <h2>Registro de cuenta</h2>
              <input type="text" placeholder="Nombre" name="nombre">
              <input type="text" placeholder="Apellido" name="apellido">
              <input type="email" placeholder="Correo" name="correo">
              <input type="password" placeholder="Contraseña" name="contra">
              <input class="btn btn-success" type="submit" value="Enviar" style="width:20%;margin-left: 80%;">
             
        </form>
    </body>


</html>