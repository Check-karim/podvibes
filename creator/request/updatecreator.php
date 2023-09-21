<?php

session_start();
include('../DB/db.php');

$ok = true;
$messages = array();

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$membership = isset($_POST['membership']) ? $_POST['membership'] : '';
$id_user = isset($_POST['id_user']) ? $_POST['id_user'] : '';


$sql_e = "SELECT ID FROM creator WHERE USERNAME='$username'";
$res_u = mysqli_query($conn, $sql_e);

$sql_e1 = "SELECT ID FROM creator ";
$res_u1 = mysqli_query($conn, $sql_e1);

if (empty($username) || empty($email) || empty($membership) || empty($id_user) ) {
    # code...
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
} elseif (mysqli_num_rows($res_u) > 0 && $username != $id_user) {
    $ok = false;
    $messages[] = "Username already exist";
}
else {
    $query ="UPDATE `creator` SET USERNAME='" . $username . "',";
    if(!empty($password)){
        $query .= "PASSWORD='" . $password . "',";
    }
    $query .= " EMAIL='" . $email . "',MEMBERSHIP='" . $membership . "' WHERE  USERNAME='".$id_user."' ";
    
    $sqlcreate_user = $conn->query($query);

    if ($sqlcreate_user) {
        $ok = true;
        $messages[] = "Success on Updating creator account";
    
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