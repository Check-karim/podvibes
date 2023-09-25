<?php

session_start();
include('../DB/db.php');

$ok = true;
$messages = array();

$id_user = isset($_POST['id_user']) ? $_POST['id_user'] : '';


if (empty($id_user) ) {
    # code...
    $ok = false;
    $messages[] = "INPUT FIELDS CANT BE EMPTY";
}
else {
        $query2 ="DELETE FROM listener WHERE USERNAME='".$id_user."' ";
        $sqlDelCreator = $conn->query($query2);

        if ($sqlDelCreator) {
            $ok = true;
            $messages[] = "Success on Deleting listener account";
        }else{
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