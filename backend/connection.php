<?php
$connection = new mysqli('localhost', 'root', "*126*mysql#", 'allink');
if($connection -> connect_error){
    echo json_encode(['ok' => false, 'message' => 'database connection erro']);
    die('database error');
}
?>