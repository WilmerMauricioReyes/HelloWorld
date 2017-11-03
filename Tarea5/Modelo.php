<?php

//$Instalacion=new BBDD();
class BBDD{
    private $conexion;
    private $id_actual;
         

  public function __construct(){
      if(file_exists("Datos/id.json")){
          $this->id_actual=file_get_contents("Datos/id.json");
          $this->id_actual=  json_decode($this->id_actual,true);
         
          }
       if(file_exists("Datos/conexionfile.json")){
         // $datos= scandir("Datos/");
          $datos= file_get_contents("Datos/conexionfile.json");
          $datos= json_decode($datos,true);
          
         
       }else{
           header("location:Instalador.php");
       }
          // var_dump($this->id_actual);
        $this->conexion= mysqli_connect($datos['servidor'],$datos['usuario'],$datos['contra'], $datos['BBDD']);
        
       if(mysqli_connect_error($this->conexion)){
           header("Location:Instalador.php");
       }
  }
    public  function getConexion(){
   return  $this->conexion;
     
  }  
    public function eliminar($elim){
    if(isset($elim)){
        
    

       mysqli_query($this->conexion,"delete from registro_datos where id={$elim}");
    }
    }
    public function modificar($edit,&$a,&$datos_edit){
       if( !empty($edit)){
       
if( !empty($edit)){
       
       $resultado=mysqli_query($this->conexion,"select * from registro_datos where id={$edit}");
       
       foreach ($resultado as $n){
          $datos_edit=$n;
       }
      mysqli_query($this->conexion,"delete from registro_datos where id={$edit}"); 
      $a=true;
       }
        
     
       }
    }
    public function leer(){
        if(isset($this->id_actual)){
        $resultado=  mysqli_query($this->conexion,"select * from registro_datos where idusuario={$this->id_actual['idusuario']}");
        return $resultado;
        }else{
            header("location:Login.php");
        }
    }
    public function escribir($datos){
        if(is_array($datos ) && !empty($datos)){
       $nombre=$datos['nombre'];
       $RNC=$datos['RNC'];
       $color=$datos['color'];
       $aportacion=$datos['aportaciones'];
       $comentario=$datos['comentario'];
       $cant_emp=$datos['cant_empleado'];
       $nomenclatura=$datos['letra'];
       $tamano=$datos['tamano'];
       mysqli_query($this->conexion,"insert into registro_datos"
               . " values(null,'{$nombre}','{$RNC}','{$color}','{$comentario}','{$aportacion}',"
               . "'{$cant_emp}','{$nomenclatura}','$tamano',{$this->id_actual['idusuario']}) ");   
 
               }
    }
    
    }
    
    
    
    
    
    
    
    


class archivo {
    
    private $datos_post=array();
    private $archivo_nom;
  private $lee_archivo;  
  public function __construct(){
      $this->crea();
     
  }
    public  function crea(){
        if(!file_exists("Data")){
        mkdir("Data");
        }
    }
  

    public  function leer(){
      $resultado=scandir("data");
      return $resultado;
    }
    public  function modifica($a){
        
         if(isset($_GET['edit'])){
                   $modifica=$_GET['edit'];
                  if(file_exists("Data/$modifica")){
                   $datosMod=  json_decode(file_get_contents("Data/$modifica"),true);
                   $archivo_nom=fopen("Data/$modifica",'a+'); 
                   fclose($archivo_nom);
                  unlink("Data/$modifica");
                  $a=true;
                  }
             }
    }
    public  function eliminar(){
        if(isset($_GET)){
         if(isset($_GET['elim'])){
                $elim=$_GET['elim'];
                if(file_exists("Data/$elim")){
             unlink("Data/$elim");
                }
             }
        }
    }
    public  function  escribir($datos){
        if(!empty($datos)){
            
        
        $this->datos_post=$datos;
            $archivo_nom=time() ."json";
           
          $lee_archivo=  fopen("Data/$archivo_nom",'a+');

        fwrite($lee_archivo,json_encode($this->datos_post));
       
        fclose($lee_archivo);
       }
    }
}

class Instalacion{
  
function __construct() {
 
$datos=$_POST;
 if(!empty($_POST)){
 $conexion= mysqli_connect($_POST['servidor'],$_POST['usuario'],$_POST['contra']);

$contra=$_POST['contra'];
if(!mysqli_connect_error($conexion)){
    mysqli_query($conexion,"create database {$_POST['BBDD']}"); 
 
 $conexion=mysqli_connect($_POST['servidor'],$_POST['usuario'],$contra,$_POST['BBDD']);   
 
$tabla="create table registro_datos(
id int primary key auto_increment,
 nombre varchar(40),
 RNC varchar(40),
 color varchar(40),
comentario varchar(100),
aportaciones varchar(40),
cant_empleados varchar(40),
letra varchar(1),
tamano varchar(10)
) ";
if(!mysqli_connect($conexion)){
    header("location:Controlador.php");
}
mysqli_query($conexion,$tabla);
}
}

}
}
?>