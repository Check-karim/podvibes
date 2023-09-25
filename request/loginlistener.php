<?php

session_start();
include('../DB/db.php');

$ok = true;
$messages = array();

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';



if (empty($password) || empty($username)) {
    # code...
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
} else {
    $sqlLogin = $conn->query("SELECT ID FROM listener WHERE PASSWORD='$password' AND USERNAME='$username'");

    if ($sqlLogin->num_rows > 0) {
        $ok = true;
        $messages[] = "SUCCESS";
        setcookie("listener_username", $username, time() + 30 * 24 * 60 * 60, "/");
        $_SESSION['listener_username'] = $username;
    } else {
        $ok = false;
        $messages[] = "WRONG PASSWORD OR USERNAME";
    }
}



echo json_encode(
    array(
        'ok' => $ok,
        'messages' => $messages,
    )
);