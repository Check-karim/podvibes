<?php 
$body= 'div-block';
require('./components/header.php'); ?>
<?php require_once('./components/nav.php'); ?>
<?php include_once('./DB/db.php');?>
<?php 
if(isset($_COOKIE['listener_username'])){
    header("Location: ./listen.php?page_state=Listen");
}
?>
	<div class="container-fluid home-container">
		<div class="row justify-content-start" style='color: black;'>
            <!--REGISTER  -->
            <?php if (!isset($_GET['login'])){ ?>
                <div class="col-md-6 p-5 text-center">
                    <div class="card" style="width: 25rem;">
                        <h4>LISTENER REGISTER</h4>
                        <form action="" method="POST">
                            <!-- username -->
                            <ul id="msg_error_register_listener"></ul>

                            <div class="mb-3">
                                <div class="form-floating mb-3">
                                    <input type="text" name='username' class="form-control color-red" id="listener_username" placeholder="username">
                                    <label for="listener_username">Username</label>
                                </div>
                            </div>

                            <!-- email -->
                            <div class="mb-3">
                                <div class="form-floating mb-3">
                                    <input type="email" name='email' class="form-control color-red" id="listener_email" placeholder="username">
                                    <label for="listener_email">Email</label>
                                </div>
                            </div>

                            <!-- password -->
                            <div class="mb-3">
                                <div class="form-floating mb-3">
                                    <input type="password" name='password' class="form-control color-red" id="listener_password" placeholder="Password">
                                    <label for="listener_password">Password</label>
                                </div>
                            </div>

                            <div class="card-body">
                                <button class='btn btn-small btn-danger' id='listener_submit' type="submit">REGISTER</button>
                            </div>
                        </form>
                        <div class="forgot">
                            <a href='./loginlistener.php?page_state=Listen&login=true'>
                                Already have an account ? Login.
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            
            <!--LOGIN  -->
            <?php if (isset($_GET['login'])){ ?>
                <div class="col-md-6 p-5 text-center">
                    <div class="card" style="width: 25rem;">
                        <h4>LISTENER LOGIN</h4>
                        <form action="" method="POST">
                            <!-- username -->
                            <ul id="msg_error_login_listener"></ul>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" id='listener_login_username' class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="password" id='listener_login_password' class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="card-body">
                                <button class='btn btn-small btn-danger' id='listener_login_submit' type="submit">LOGIN</button>
                            </div>
                        </form>
                        <div class="forgot">
                            <a href='./loginlistener.php?page_state=Listen'>
                                Don't have an account ? Register.
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>

		</div>
	</div>
<?php require('./components/footer.php'); ?>