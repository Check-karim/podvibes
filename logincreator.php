<?php require('./components/header.php'); ?>
<?php require_once('./components/nav.php'); ?>
<?php include_once('./DB/db.php');?>
<?php 
if(isset($_COOKIE['creator_username'])){
    header("Location: ./creator/index.php?page_state=add-episode");
}
?>
	<div class="container-fluid home-container">
		<div class="row justify-content-start">
            <!--REGISTER  -->
            <?php if (!isset($_GET['login'])){ ?>
                <div class="col-md-8 p-5 text-center">
                    <div class="card" style="width: 25rem;">
                        <h4>CREATOR REGISTER</h4>
                        <form action="" method="POST">
                            <!-- username -->
                            <ul id="msg_error_register_creator"></ul>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" id='creator_username' name='username' class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <!-- email -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="email" id='creator_email' name='email' class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                            </div>
                            <!-- password -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="password" id='creator_password' name='password' class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                            </div>

                            <div class="card-body">
                                <button class='btn btn-small btn-danger' id='creator_submit' type="submit">REGISTER</button>
                            </div>
                        </form>
                        <div class="forgot">
                            <a href='./logincreator.php?page_state=Upload&login=true'>
                                Already have an account ? Login.
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            
            <!--LOGIN  -->
            <?php if (isset($_GET['login'])){ ?>
                <div class="col-md-8 p-5 text-center">
                    <div class="card" style="width: 25rem;">
                        <h4>CREATOR LOGIN</h4>
                        <form action="" method="POST">
                            <!-- username -->
                            <ul id="msg_error_login_creator"></ul>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" id='creator_login_username' class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="password" id='creator_login_password' class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="card-body">
                                <button class='btn btn-small btn-danger' id='creator_login_submit' type="submit">LOGIN</button>
                            </div>
                        </form>
                        <div class="forgot">
                            <a href='./logincreator.php?page_state=Upload'>
                                Don't have an account ? Register.
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>

		</div>
	</div>
<?php require('./components/footer.php'); ?>