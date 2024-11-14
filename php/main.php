 <?php
include 'login.php';
$conexion = obtenerConexion();
$query = "SELECT * FROM cliente";
$respuesta = mysqli_query($conexion,$query);
$jdoc= array();

while($row = $respuesta->fetch_assoc()){
    $jdoc[]= $row;
}

if($respuesta->num_rows>0){
    $jdoc = json_encode($jdoc);
}else{
    echo("<script>alert('Algo salio mal')</script>");
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Gestion de invitaciones altima</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/altima/css/style.css">
        <script src="/altima/js/loadClients.js"></script>
        
    </head>
    <body>
        <header>

            <div class="header-text" style="font-size: 50px; margin-bottom: 0; padding-bottom: 0;">ALTIMA</div>
            <div class="header-text" style="font-size: 20px; margin-top: 0; padding-top: 0;">JOYERIA</div>
            
        </header>

        

        <!-- Div principal -->
        <div style="display: flex; margin-top:1.2rem;">
            <!-- Div encargado de contener el apartado para la seleccion de plantilla -->
            <div style="width: 20%; display: flex; flex-direction: column; margin: 0; margin-top:0;  align-items:start;">
             
            <div style="width: 100%; text-align:left; margin-left:10rem; margin-top:12rem;"  ><div class="header-text" style="color:black; font-size:15px; font-weight:bold">SELECCION PLANTILLA</div></div>
            
            <select name="template-selector" id="template" class="send-button hover-bt" style="margin-left:10rem;">
                    <option value="expo22">Expo Joyera 2022</option>
                    <option value="expo23">Expo Joyera 2023</option>
                    <option value="expo24">Expo Joyera 2024</option>
                </select>
                <!-- <a href="https://www.distritojoyero.mx/joyeria/altima/" style="margin: 0; padding:0;" ><img src="/altima/img/logo.png" alt="logotipo altima joyeria" class="top-logo"></a> -->
            </div>
            
            <!-- Div encargado de mostrar la lista de clientes, cargada de la base de datos -->
            <div style="width: 50%; display: flex; flex-direction: column; margin: auto; margin-top:0; align-items: center; ">

            <div style="width: 100%; text-align:center;" ><div class="header-text" style="color:black; font-size:30px">CLIENTES</div></div>

            <div class="client-list" id="client-list">
                <div class="client-info">
                    <div class="client-header" style="text-align:center;background-color:black; color:white;padding-right:1.8rem;" > Nombre</div>
                    <div class="client-phone" style="text-align:center; background-color:black; color:white;">Telefono</div>
                    <div class="client-email" style="text-align:center; padding-right:1rem;background-color:black; color:white;">Correo</div>
                    <div style="background-color:black; align-items:center;display:flex;"><input type="checkbox" id="select-all"></div>
                 </div>   
                <script>
                    setClients(<?= $jdoc; ?>);
                </script>


                </div>
                <button class="send-button hover-bt">ENVIAR</button>
                <!-- <a href="https://www.distritojoyero.mx/joyeria/altima/" style="margin: 0; padding:0;" ><img src="/altima/img/logo.png" alt="logotipo altima joyeria" class="top-logo"></a> -->
            </div>

        </div>
    </body>
</html>
