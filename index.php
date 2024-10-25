<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        $wyjscie = [];
        $return = 0;
        exec('net use', $wyjscie, $return);
        //echo "return {$return}";
        $mapowany = false;


        foreach($wyjscie as $item){
            if(strpos($item, '10.40.50.2')!== false){
                echo "Dysk jest zmapowany <a href='?akcja=usun'> usuń</a>";
                $mapowany = true;
            }
        }
        if(!$mapowany){
            echo "Dysk jest zmapowany <a href='?akcja=mapuj'>mapuj</a>";
        }

        if(@$_GET['akcja']=='mapuj'){
            exec('net use z: \\\\10.40.50.2\\pliki /user:uczen uczenpti', $wyjscie, $return);
            header("location: ./");
        }
        
        if(@$_GET['akcja']=='usun'){
            exec('net use Z: /delete /y', $wyjscie, $return);
            header("location: ./");
        }
    ?>
</body>
</html>