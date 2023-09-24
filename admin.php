<?php
$body= 'div-block';
require('./components/header.php'); ?>
<?php 
if(isset($_COOKIE['admin_username'])){
    header("Location: ./dashboard.php?page_state=dashboard");
}
?>
<?php require_once('./components/nav.php'); ?>
	<div class="container-fluid">
        <div class="row justify-content-around">
                <div class="col-md-4 p-5 text-center">
                    <div class="card" style="width: 25rem;">
                        <h4 style='color: black;'>ADMIN LOGIN</h4>
                        <form action="" method="POST">
                            <!-- username -->
                            <ul id="msg_error_login_admin"></ul>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" id='admin_login_username' class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="password" id='admin_login_password' class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="card-body">
                                <button class='btn btn-small btn-danger' id='admin_login_submit' type="submit">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
	</div>
<?php require('./components/footer.php'); ?>