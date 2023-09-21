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

                            <div class="mb-3">
                                <div class="form-floating mb-3">
                                    <input type="text" name='username' class="form-control color-red" id="creator_username" placeholder="username">
                                    <label for="creator_username">Username</label>
                                </div>
                            </div>

                            <!-- email -->
                            <div class="mb-3">
                                <div class="form-floating mb-3">
                                    <input type="email" name='email' class="form-control color-red" id="creator_email" placeholder="username">
                                    <label for="creator_email">Email</label>
                                </div>
                            </div>

                            <!-- membership -->
                            <div class="mb-3">
                                <div class="form-floating">
                                    <select class="form-select" name='membership' id="ep_membership" aria-label="Floating label select example">
                                        <option value="Silver">Silver</option>
                                        <option value="Gold">Gold</option>
                                        <option value="Classic">Classic</option>
                                        <option value="Premium">Premium</option>
                                    </select>
                                    <label class='danger' for="ep_membership">Memberships</label>
                                </div>  
                            </div>
                            <!-- password -->
                            <div class="mb-3">
                                <div class="form-floating mb-3">
                                    <input type="password" name='password' class="form-control color-red" id="creator_password" placeholder="Password">
                                    <label for="creator_password">Password</label>
                                </div>
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