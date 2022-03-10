<!DOCTYPE html lang="es">
    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php 
                            foreach($datos as $ind=>$fila){
                                if(isset($fila["subopciones"])){     
                                    echo '
                                    <div class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            '.$fila["Nombre"].'</a>';
                                        echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                                            foreach($fila["subopciones"] as $opcion){
                                                echo '
                                                    <li><a class="dropdown-item" onclick="'.$opcion["comando"].'">'.$opcion["Nombre"].'</a></li>
                                                    <li><hr class="dropdown-divider"></li>';
                                            }
                                        echo '</ul>
                                    </div>';
                                }
                                else {
                                    echo '
                                        <div class="nav-item">
                                        <a class="nav-link" onclick="'.$fila["comando"].'">'.$fila["Nombre"].'</a>
                                        </div>';
                                }
                            }
                        ?>
                </ul>
            </div>
        </div>
    </nav>
</html