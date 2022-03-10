<?php session_start();?>
<!DOCTYPE html lang="es">
    <head>
        <link rel="manifest" href="manifest.json">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP MYSQL</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="css/di21.css">
        <!--SCRIPTS-->
        <script src="js/jquery-3.6.0.js"></script>
        <script src="js/index.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </head>
<body>
    <div class="row">&nbsp;
        <header id="cabecera">
            <img class="logo" src="imagenes/reminders.png" style="height:5em;" height="250" width=200></th>
                <h2 id="titulo">Lorena Sandra, LIBERT</h2>
        </header>
    </div>

    <div class="container">  
        <div class="col-lg-2 col-md-2 d-none d-sm-block">
        </div>
        
        <div class="col-lg-2 col-md-2 d-none d-sm-block">
            <?php
                if(isset($_SESSION['id_Usuario'])){
                    //logeados
                    echo '<b>'.$_SESSION['usuario'].'</b></br>';
                    echo '<a href="logout.php">Salir</a>';
                }else{
                    //sin logearse
                    echo '<a href="login.php">Login</a>';
                }
            ?>
        </div>
    </div>
    <div id="capaMenu" class="container">
        <?php
            require_once 'controladores/C_Menus.php';
            $menu=new C_Menus();
            $menu->getMenu();
        ?>
    </div>
    <div id="capaContenido" class="container">      
    </div>

    <script src="js/pwa.js" async></script>
</body>

</html>