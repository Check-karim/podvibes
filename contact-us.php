<?php 
$body= 'div-block';
require ('./components/header.php') ?>
<?php require ('./components/nav.php') ?>
<div class="container-fluid home-container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
                <p class='pt-1 fs-2 home-text-shadow'>CONTACT-US</p>
        <form action="" method="post" style='color: black;'>
            <div class="mb-2">
                <div class="form-floating mb-3">
                    <input type="text" name='username' class="form-control color-red" id="contact_email" placeholder="YOUR EMAIL">
                    <label for="contact_email">YOUR EMAIL</label>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-floating mb-3">
                    <input type="text" name='username' class="form-control color-red" id="contact_name" placeholder="YOUR NAME">
                    <label for="contact_name">YOUR NAME</label>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-floating mb-3">
                    <textarea class="form-control color-red" id="contact_msg" placeholder="YOUR NAME"></textarea>
                    <label for="contact_msg">YOUR MESSAGE</label>
                </div>
            </div>

            <div class='mb-3'>
                <button class='btn btn-large btn-danger'> SUBMIT </button>
            </div>
        </form>
            </div>
        
    </div>
</div>
<?php require ('./components/footer.php'); ?>