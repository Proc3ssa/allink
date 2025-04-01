<?php
header('Content-type : Application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Origin : *');
header('Access-Control-Allow-Headers: Content-type');

if($_SERVER['REQUEST_METHOD'] != 'POST'){

    echo json_encode(['ok'=> false, 'message'=>'Wrong request method']);
}

else{

    include 'connection.php';
    $data = json_decode(file_get_contents('php://inputs'), true);

    $email = $data['email'];
    $password = $data['password'];

    //fetch data

    $SELECT = "SELECT email, password FROM users WHERE email = '$email'";
    $QUERY = mysqli_query($connection, $SELECT);

    if($QUERY -> num_rows == 0){

        echo json_encode(['ok'=> 'false', 'message' => 'wrong details1']);
    }
    else{

    $RES = mysqli_fetch_assoc($QUERY);

    $hashed = $RES['password'];

    if(password_verify($password, $hashed)){
     echo json_encode(['ok' => true, 'message'=> 'correct details']);
    }
    else{
        echo json_encode(['ok'=> 'false', 'message' => 'wrong details2']);
    }

    }

    
}

?>