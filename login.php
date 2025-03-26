<?php
header('Content-type : Application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Origin : *');
header('Access-Control-Allow-Headers: Content-type');

if($_SERVER['REQUEST_METHOD'] != 'POST'){

    echo json_encode(['ok'=> false, 'message'=>'Wrong request method']);
}

else{
    $data = json_decode(file_get_contents('php://inputs'), true);
}

?>