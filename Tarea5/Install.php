<?php 
$Instalacion=new Instalacion();


class Instalacion{
private $conexion;
function __construct() {
 
 
 if(!empty($_POST)){
     
     if(!file_exists("Datos")){
            mkdir("Datos");
        }
       
        unlink("Datos/conexionfile.json");
       $ft= fopen("Datos/conexionfile.json",'a+');
        fwrite($ft,json_encode($_POST));
       $this->conexion= mysqli_connect($_POST['servidor'],$_POST['usuario'],$_POST['contra']);

$contra=$_POST['contra'];
if(!mysqli_connect_error($this->conexion)){
    mysqli_query($this->conexion,"create database {$_POST['BBDD']}"); 
    
 $this->conexion=mysqli_connect($_POST['servidor'],$_POST['usuario'],$contra,$_POST['BBDD']);   
 
$tabla="create table registro_datos(
id int primary key auto_increment,
 nombre varchar(40),
 RNC varchar(40),
 color varchar(40),
comentario varchar(100),
aportaciones varchar(40),
cant_empleados varchar(40),
letra varchar(1),
tamano varchar(10),
idusuario int,
foreign key (idusuario) references usuario(idusuario)
) ";
$tabla2="create table usuario(
idusuario int primary key auto_increment,
 nombre varchar(40),
 apellido varchar(40),

correo varchar(40),
contra varchar(20)

) ";
mysqli_query($this->conexion,$tabla2);
    mysqli_query($this->conexion,$tabla);

    header("location:Controlador.php");


}
}else{
    header("location:Instalador.php");
}

}
}
