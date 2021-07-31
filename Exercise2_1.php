<?php
$str = 'hello world';
$str = str_replace(' ', '', $str);
$arr = str_split($str);

$rep = array_count_values($arr);

foreach ($rep as $key => $value) {

echo $key . "  =  " . $value . '<br>';

}
?>