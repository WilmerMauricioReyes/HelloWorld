<?php

require_once('Modelo.php');
$BBDD=new BBDD();
$total=0;
$emp_reg=0;
$empresas=0;
$datos_edit=array();
$a=false;

if(isset($_GET['edit'])){
    

$BBDD->modificar($_GET['edit'],$a,$datos_edit);
}
$BBDD->escribir($_POST);
if(isset($_GET['elim'])){
$BBDD->eliminar($_GET['elim']);
}
$result_dir=$BBDD->leer();
 $emp_reg=0;
        $empresas=0;
        $total=0;
 
require_once("Vista.php");

        