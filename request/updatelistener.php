<?php

session_start();
include('../DB/db.php');

$ok = true;
$messages = array();

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$id_user = isset($_POST['id_user']) ? $_POST['id_user'] : '';


$sql_e = "SELECT ID FROM listener WHERE USERNAME='$username'";
$res_u = mysqli_query($conn, $sql_e);

$sql_e1 = "SELECT ID FROM listener ";
$res_u1 = mysqli_query($conn, $sql_e1);

if (empty($username) || empty($email) || empty($id_user) ) {
    # code...
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
} elseif (mysqli_num_rows($res_u) > 0 && $username != $id_user) {
    $ok = false;
    $messages[] = "Username already exist";
}
else {
    $query ="UPDATE `listener` SET USERNAME='" . $username . "',";
    if(!empty($password)){
        $query .= "PASSWORD='" . $password . "',";
    }
    $query .= " EMAIL='" . $email . "' WHERE  USERNAME='".$id_user."' ";
    
    $sqlcreate_user = $conn->query($query);

    if ($sqlcreate_user) {
        $ok = true;
        $messages[] = "Success on Updating listener account";
        setcookie("listener_username", $username, time() + 30 * 24 * 60 * 60, "/");
        $_SESSION['listener_username'] = $username;
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