<?php
function my_ser($arr) {
    $res = "";
    foreach($arr as $k => $v) {
        $res .= $k . ": " . $v . "\n";
    }
    return $res;
}

$filename = "formdata.txt";
file_put_contents($filename, "DATA:\n");
#file_put_contents($filename, my_ser($_POST));
file_put_contents($filename, serialize($_POST));

