<?php

//set conn
$namaserver ="localhost";
$namauser = "root";
$password ="";
$namadb ="postage_records";

//Sambung ke DB
$conn = mysqli_connect($namaserver,$namauser,$password,$namadb);

if(!$conn){
    die("Sambungan Tergendala ".mysqli_connect_error());
    $conn -> close();
}else{
    console_log("Sambungan Berjalan");
}

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '';
    }
    echo $js_code;
}
?>

<?php
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>