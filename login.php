<?php require ('./components/header.php') ?>
<?php require ('./components/nav.php') ?>
    <div class="container">
        <div class="signin-sign-up">
            <form id="loginform" action="" class="sign-in-form">
                <h2 class="title">LOGIN</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" id="username" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" id="password"  required>
                </div>
                <a href="google.com" class="forgot-password">Forgot password</a>
                <input type="submit" value="launch" class="btn" > <br>
      
            </form>          
        </div>
    </div>
<?php require ('./components/footer.php'); ?>