<?php
$body= 'div-block';
require ('./components/header.php'); ?>
<?php require ('./components/nav.php') ?>
<?php require ('./DB/db.php');
    if(!isset($_COOKIE['listener_username'])){
        header('Location : ./listen.php?page_state=Listen&login=true');
    }
    $username = $_COOKIE['listener_username'];
    $email = '';
    
    $sql = "SELECT * FROM listener WHERE USERNAME='".$username."' ";
    $run_getEP= mysqli_query($conn, $sql);
    while ($row_getEP = mysqli_fetch_assoc($run_getEP)) {
        $email = $row_getEP['EMAIL'];
    }
?>

<div class='div-block'>
    <div class="container-fluid ">
        <div class="row justify-content-center col-gray">
            <div class="col-md-12">
            <form method="post" enctype='multipart/form-data'>
                <div class="row justify-content-around" >
                    <div class="col-md-8 p-5 text-center justify-content-center">
                        <div class="card" style='color: black;'>
                            <h4 >UPDATE ACCOUNT INFORMATION</h4>
                            <form action="" method="POST">
                                <!-- username -->
                                <ul id="msg_error_update_listener"></ul>

                                <div class="mb-3" style="display: none;">
                                    <div class="form-floating mb-3">
                                        <input type="text" name='update_id_listener' value='<?php isset($username) ? print $username : print '' ?>' id="update_id_listener" >
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-floating mb-3">
                                        <input value='<?php isset($username) ? print $username : '' ?>' type="text" name='update_username_listener' class="form-control color-red" id="update_username_listener" placeholder="username">
                                        <label for="update_username_listener">Username</label>
                                    </div>
                                </div>

                                <!-- email -->
                                <div class="mb-3">
                                    <div class="form-floating mb-3">
                                        <input value='<?php isset($email) ? print $email : '' ?>' type="email" name='update_email_listener' class="form-control color-red" id="update_email_listener" placeholder="username">
                                        <label for="update_email_listener">Email</label>
                                    </div>
                                </div>

                                <!-- password -->
                                <div class="mb-3">
                                    <div class="form-floating mb-3">
                                        <input type="password" name='update_password_listener' class="form-control color-red" id="update_password_listener" placeholder="Password">
                                        <label for="update_password_listener">Password</label>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <button class='btn btn-small btn-secondary' id='update_listener_info_btn' type="submit">UPDATE ACCOUNT</button>
                                    <button class='btn btn-small btn-danger' id='del_listener_info_btn' type="submit">DELETE ACCOUNT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<?php require('./components/footer.php'); ?>