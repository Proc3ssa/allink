<?php
header('Content-type : Application/json');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Origin : *');
header('Access-Control-Allow-Headers: Content-type');

$server_request_method = $_SERVER['REQUEST_METHOD'];

if($server_request_method != 'GET'){

    echo json_encode(['ok'=> false, 'message'=>'Wrong request method']);
}

else{

    include 'connection.php';

   //GET email
   
   if($server_request_method =='GET'){

    $email = $_GET['email'];
    $SELECT = "SELECT email FROM users WHERE email = '$email'";
    $QUERY = mysqli_query($connection, $SELECT);
    if($QUERY -> num_rows !=0){

        echo json_encode(['ok' => true, 'message' => 'Email already exist']);
    }
   }
   else{

    $data = json_decode(file_get_contents('php://inputs'), true);
   

    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
    $hashed = password_hash($password, PASSWORD_BCRYPT);

    //fetch data

    $INSERT = "INSERT INTO users ('name', 'email', 'password', 'token') VALUES($name,$email,$hashed,'')";
    $QUERY = mysqli_query($connection, $SELECT);

    if($QUERY){

        echo json_encode(['ok'=> 'true', 'message' => 'Account has been created']);
    }
    else{

   
        echo json_encode(['ok'=> 'false', 'message' => 'Error creating account']);

    }
}
    
}

?>