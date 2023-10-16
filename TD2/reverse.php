<?php
function reverse($mot){
    $resul = "";
    for($i = strlen($mot) - 1; $i >= 0; $i--){
        $resul .= $mot[$i];
    }
    return $resul;
    }
?>