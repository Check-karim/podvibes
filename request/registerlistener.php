<?php

session_start();
include('../DB/db.php');

$ok = true;
$messages = array();

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';


$sql_e = "SELECT ID FROM listener WHERE USERNAME='$username'";
$res_u = mysqli_query($conn, $sql_e);

$sql_e1 = "SELECT ID FROM listeber ";
$res_u1 = mysqli_query($conn, $sql_e1);

if (empty($username) || empty($password) || empty($email)) {
    # code...
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
} elseif (mysqli_num_rows($res_u) > 0) {
    $ok = false;
    $messages[] = "Username already exist";
}
else {
    $query ="INSERT INTO `listener` ( `USERNAME`, `PASSWORD`,`EMAIL`) VALUES('" . $username . "','" . $password . "','" . $email . "') ";
    $sqlcreate_user = $conn->query($query);

    if ($sqlcreate_user) {
        $ok = true;
        $messages[] = "Success on creating listener";
    
    } else {
        $ok = false;
        $messages[] = "Error with database".$conn->error;
    }
}


echo  json_encode(
    array(
        'ok' => $ok,
        'messages' => $messages,
    )
);