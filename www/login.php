<?php session_start();
$usuario ='';
    
    $msj='';
    if(isset($_POST['usuario'])){
        $usuario=$_POST['usuario'];

        require_once 'controladores/C_Usuarios.php';
        $usuarios=new C_Usuarios();
        $log=$usuarios->loginUsuario(array('login'=>$_POST['usuario'],
                                        'pass'=>$_POST['password']));

        if($log['correcto']=='S'){
            header('Location: index.php');
        }else{
            $msj=$log['msj'].'<br>';
        }
    }//fin de existe el usuario
?>
<!DOCTYPE html>
    <head>
        <script src="js/jquery-3.6.0.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/di21.css">
        <script type="text/javascript">
            //muestro un sms en caso de que usuario ingrese mal sus datos
            function validar(){
                $('.inputRed').removeClass('inputRed');              
                if( $('#usuario').val()=='' ){
                    $('#usuario').addClass('inputRed');
                }
                if($('#password').val()=='' ){
                    $('#password').addClass('inputRed');
                }
                if($('.inputRed').length==0){
                    $('#msj').html('');
                    $('#formulario').submit();
                }else{
                    $('#msj').html('Debe rellenar los campos')
                }

            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8" col-md-6 col-lg-4 col-xl-3s>
                    <div class="form-group">
                        <span id="msj" style="color:blue;"><?=$msj;?></span>
                    </div>
                    <form name="formulario" id="formulario" action="login.php" method="POST">
                        <div class="form-group">
                            <label for="usuario"> Usuario:
                                <input type="text" name="usuario" id="usuario" 
                                    value="<?=$usuario;?>"
                                    class="form-control">    
                            </label> 
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="contraseña"> Contraseña:
                                <input type="password" name="password" id="password" class="form-control">
                            </label>
                            <br>
                        </div>
                        <br>
                        <div>
                            <button type="button" onclick="validar();" name="btnAceptar" id="btnAceptar" class="btn btn-primary btn-center">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>