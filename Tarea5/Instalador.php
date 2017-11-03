<!DOCTYPE html>
<html>
    <head>
       <meta charset="UTF-8">
           <link href="css/bootstrap.min.css" rel="stylesheet">
           <style>
               body{
                   background-color: beige;
               }
           </style>
    </head>
    <body>
        <header>
            <h1 style="text-align: center;margin-bottom: 4%;font-size:550%;color:orangered "> Instalador de base de datos</h1>
        </header>
    <body>
        <div class="container" style="border:solid #000 3px; padding-top: 4%;background-color:#b8daff ">
            <form action="Install.php" method="post">
            <div class="row" style="margin-left:2%;">
                
                <label>Servidor</label><input  type="text" name="servidor" placeholder=" ej: localhost">
              <label>Usuario</label><input type="text" name="usuario" placeholder=" ej: root">
              <label>Contraseña</label><input type="text" name="contra" placeholder=" ej: mysql">
                <label>Base de datos</label><input type="text" name="BBDD" placeholder=" ej:registro">
                
            </div>
        
            <div>
                <input class="btn btn-success " style="margin-left:88%;margin-top:1%;margin-bottom:1%;" type="submit" value="Continuar">
            </div>
                    </form>
        </div>
        
    </body>        
        
    </body>
</html>

