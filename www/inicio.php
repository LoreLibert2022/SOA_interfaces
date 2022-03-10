<!DOCTYPE HTML UTF-8>
    <BODY>
        <?php
            echo 'Hola';
            echo '<br>';
            $variable=12;

            $texto="esto es un texto";
            echo $texto;

            //array
            $numeros=array(16, 23, 87);
            $nombres=array('Pedro','Javier','Ivan');

            echo '<pre>';
            print_r($nombres);
            echo '</pre>';
            echo '<br>';
            echo json_encode($nombres);

            $registro=array('nombre'=>'Javier', 
            'apellido' => 'Lasberas', 
            'nacionalidad'=>'Español');
            echo json_encode($registro);
            echo '<br></pre>';
            print_r($registro);
            echo '<br>';

            if(1==1 && $a!=5 && $correcto===true){

            }else{

            }
            //(1==1)?: echo 'true';echo 'false';
            for($i=1; $i<5; $i++){

            }
            while(1==2){

            }
            do{

            }while(1==2);

            switch($b){
                case '10': echo 'es 10';
                    break;
                case '20': echo 'es 20';
                    break;
                default:
                echo 'por defecto';
            }
        //=   += ++ => Incrementar
        ?>
    </BODY>
</HTML>