

<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/query.js"></script>
        <title>Formulario</title>
    </head>
    <body style="background-color:lightsteelblue;" >
        <div style="padding-top:0.4%;padding-bottom:0.3%; border-bottom: whitesmoke 1px solid;">
            
            <span style="margin-left: 78.3%;"> <?php $correo= json_decode(file_get_contents("Datos/id.json"),true);echo $correo['correo']; ?>
                <a  class="btn btn-outline-info"  href="Login.php">Cerrar sesión</a></span>
        </div>
        <div class="container" style="padding-top: 0.5%;"  >
            <div class="row" style="padding-top:0.5%;border:2px black solid;padding-bottom:0.5%;background-color:beige">
                <div class=" col col-sm-5" >
                    <form action="Controlador.php" method="post">
            <div class="form-group input-group" style="margin-bottom:1.4%;">
            <label class="col-lg-5 control-label" for="nombre" style="font-size:1.2em;">Nombre</label>
            <input  value="<?php   if($a){
  echo($datos_edit['nombre']);}else{} ?>"  required class="form-control" type="text" name="nombre" id="nombre"/>
            </div>
            <div class="form-group input-group" style="margin-bottom:1.4%;">
                <label class="col-lg-5 control-label" style="font-size:1.2em;" for="RNC">RNC</label>
                <input value="<?php   if($a){  echo($datos_edit['RNC']);}else{} ?>" required class="form-control" type="text" id="RNC" name="RNC" >
            </div >
          
            <div class="form-group input-group" style="margin-bottom:1.4%;">                                                
                <label class="col-lg-5 control-label" style="font-size:1.2em;" for="color">Color</label>
                <input value="<?php   if($a){  echo($datos_edit['color']);}else{} ?>" required class="form-control" type="color" id="color" name="color">
      </div>
            <div class="form-group input-group" style="margin-bottom:1.4%;">
                <label class="col-lg-5 control-label" style="font-size:1.2em;" for="comentario">Comentario</label>
                <textarea  rows="4"  class="form-control" type="text" id="comentario" name="comentario"><?php   if($a){  echo($datos_edit['comentario']);}else{} ?></textarea>
</div>
            <div class="form-group input-group">
            <label class="col-lg-5 control-label" style="font-size:1.2em;"  for="aportaciones">Aportaciones $</label><input value="<?php   if($a){  echo($datos_edit['aportaciones']);}else{} ?>" required class="form-control" type="number" step="any" name="aportaciones" id="aportaciones">
</div>
            
            <div  >
                <a  href="Controlador.php"class="btn btn-info" style="width:44%;margin-left: 5%;">Nuevo</a>
       
             
         <button class="btn btn-success" style="width:44%;margin-left: 2%;">Guardar</button>

                </div>
       </div>
            <div>
                <div class="form-group input-group" style="margin-top:17%;">
                <span class="col-lg-6 control-label" style="font-size:1.2em;">Cant empleado</span><input value="<?php   if($a){  echo($datos_edit['cant_empleados']);}else{} ?>" required type="number" class="form-control" name="cant_empleado" id="cant_empleado"/>
                </div>
                <div class="form-group input-group ">
                <span class="col-lg-6 control-label" style="font-size:1.2em;">Nomenclatura</span>
                
                <label   style= "width:15%" ><input required type="radio" value="A" name="letra"/>A</label>
                <label style= "width:15%"><input  checked="checked" type="radio" value="B" name="letra"/>B</label>
                <label style= "width:15%"><input  type="radio" value="C"  name="letra"/>C</label>
                <label style= "width:10%"><input  type="radio" value="D" name="letra"/>D</label>
                </div>
                <div>
         <label class="col-lg-6 control-label" style="font-size:1.2em;">Tamaño</label>
         <select name="tamano" id="tamano">
             <option  required>Pequeño</option>
             <option required>Mediano</option>
             <option required>Grande</option>
         </select>
 </div>
            </div>

        </form> 
                </div>
            
    
            <div class="row" style="border:2px black solid;margin-top: 1.5%;background-color: beige">
         <table class="table">
             <thead style="background-color:lightskyblue">
                 <tr >
             <th>Empresa</th>

             <th>RNC</th>
             
             <th>COLOR</th>
             
             <th>Aportación</th>

             <th>Cant Empleados</th>
             <th>Tamaño</th>

             <th>Nomenclatura</th>
             <th>Act</th>
             
         </tr>
             </thead>
             <tbody>
              <?php foreach ($result_dir as $n){
            
        
                  $datos_leidos=$n;
                  
             $total=$total+$datos_leidos['aportaciones'];
             $emp_reg=$emp_reg+$datos_leidos['cant_empleados'];
             $empresas=$empresas+1;
         
             
                
             ?>
         <tr>
             <td><?php echo $datos_leidos['nombre']  ?> </td>
                              
        
             <td><?php echo $datos_leidos['RNC']  ?> </td>
                              
        
             <td><?php echo $datos_leidos['color']  ?> </td>
                              
         
             <td><?php echo $datos_leidos['aportaciones']  ?> </td>
                              
         
             <td><?php echo $datos_leidos['cant_empleados']  ?> </td>
                              
      
             <td><?php echo $datos_leidos['tamano']  ?> </td>
              <td><?php echo $datos_leidos['letra']  ?> </td>
              <td><?php echo "<a  href='Controlador.php?elim={$n['id']}'  class='btn btn-danger' style='margin-right:4%' name='eliminar' id='eliminar'>Elim</a>
                 <a href='Controlador.php?edit={$n['id']}' class='btn btn-warning'>Edit</a>"?></td>
         </tr>
            
    <?php }  ?>
         </tbody>
         </table>
         </div>
            <div style="padding-left: 10%; font-size:1.3em; "  >
        <?php echo " <strong><span style='Padding-right:10%;'>Total recaudado $: $total</span style='Padding-right:10%;'>   <span style='Padding-right:10%;'>Empleados registrados: $emp_reg</span>  <span style='Padding-right:10%;'>Empresas:  $empresas</span> </strong>"; ?>
        </div>
         </div>
        
    </body>
</html>