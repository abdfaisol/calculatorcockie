<?php 
function cekdata($data){
    $allow = true;
    $array = explode(",",$data);
    foreach ($array as $i) {
        if(is_numeric($i)):
        else:
            $allow = false;
        endif;
    }
    return [$allow,$array];
}
function printr($array){
    $printout = "";
    foreach ($array as $key => $value) {
        if(count($array) == 1){
            $printout .= "$value";
        }else{
            if($key == count($array)-1){
            $printout .= "$value";
        }else{
            $printout .= "$value, ";
        }
        }
    }
    return "{".$printout."}";
}
function cek_val_array($n, $array){
    $val = array_key_exists($n, $array);
    if($val == true){
        $array[$n] += 1;
    }else{
        $array[$n] = 1;
    }
    return $array[$n];
}
function modus($data){
    $mode = [];
    $count = [];
    $maxIndex = 0;
    $number = 0;
    for($i = 0; $i < count($data); $i++){
        $number = $data[$i];
        $count[$number] = cek_val_array($number, $count);
        if($count[$number] > $maxIndex){
            $maxIndex = $count[$number];
        }
    }
    foreach ($count as $key => $value) {
        if($value == $maxIndex){
            array_push($mode, $key);
        }
    }
    return printr($mode);
}
function mean($data){
    $mean = array_sum($data) / count($data);
    return $mean;
 }
 ?>