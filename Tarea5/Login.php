
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
                padding-top: 5%;
                display: flex;
                  background-color:violet;   
                
            }
            h2 {
            color:white;
            font-size: 50px;
            text-align: center;
           margin-bottom: 5px;
        }
        input {
                display:block;
                padding:10px;
                width: 100%;
                margin: 30px 0px;
            }
            form {
               
               border:black 1px solid;
                background-color:violet;
               margin: auto;
               width: 50%;
               padding: 20px;
               max-width: 500px;
            }
            span {
                margin-left: 66%;
            }
        </style>
    </head>
    <body >
        
        <form action="" method="post">
            <h2>Inicio de session</h2>
              <input type="text" placeholder="&#128104;Usuario" name="usuario">
              <input type="password" placeholder="&#128272;Contraseña" name="contra">
              <input class="btn btn-success" type="submit" value="Ingresar">
              <span>Crea cuenta <a href="Registro.php">click aquí</a> </span>
        </form>
    </body>


</html>