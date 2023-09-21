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
    $query1 ="DELETE FROM episode WHERE USER='".$id_user."' ";
    $sqlDelTrack = $conn->query($query1);
    if ($sqlDelTrack) {
        $query2 ="DELETE FROM creator WHERE USERNAME='".$id_user."' ";
        $sqlDelCreator = $conn->query($query2);

        if ($sqlDelCreator) {
            $ok = true;
            $messages[] = "Success on Deleting creator account";
        }else{
            $ok = false;
            $messages[] = "Error with database".$conn->error;
        }
    
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