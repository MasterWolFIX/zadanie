<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exec</title>
</head>
<body>

<?php

function getDirectorySize($dir) {
    $size = 0;

   
    if (is_dir($dir)) {
        
        $files = scandir($dir);
        foreach ($files as $file) {
          
            if ($file != '.' && $file != '..') {
                $path = $dir . DIRECTORY_SEPARATOR . $file;

                
                if (is_dir($path)) {
                    $size += getDirectorySize($path);
                } else {
                    $size += filesize($path);
                }
            }
        }
    }
    return $size;
}

    $wyjscie = [];
    $rerurn = 0;
    exec('net use', $wyjscie, $rerurn);
    $mapowany = false;




    //echo "return {$return}";
    foreach($wyjscie as $item){
        if(strpos($item, '10.40.50.2')!==false)
        {
            echo 'Dysk jest zmapowany <a href="?akcja=usun">Odmapuj</a>';
            $mapowany = true;

            $directoryPath = 'Z:\\'; 
        $sizeInGB = getDirectorySize($directoryPath);
        echo "Rozmiar zmapowanego katalogu: " . round($sizeInGB, 2);
        }
    }
        
    if(!$mapowany){
        echo 'Mapuj <a href="?akcja=mapuj">dysk</a>';
    }

    if(@$_GET['akcja']=='mapuj'){
        exec('net use Z: \\\\10.40.50.2\\pliki /user:uczen uczenpti', $wyjscie, $rerurn);
        header('Location: ./');

    }
    if(@$_GET['akcja']=='usun'){
        exec('net use Z: /delete', $wyjscie, $rerurn);
        header('Location: ./');

    }
    //print_r($wyjscie);

?>
    
</body>
</html>