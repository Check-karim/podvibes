<?php
$body= 'div-block';
require ('./components/header.php'); ?>
<?php require ('./components/nav.php') ?>
<?php require ('./DB/db.php');?>

<div class='div-block'>
    <div class="container">
        <div class="row pb-5">
            <h3 class='home-text'>CREATOR MEMBERSHIP DETAILS</h3>
            <div class="col-md-6 " style='color: black;'>
                <div class="card" style="width: 28rem;">
                    <div class="card-body">
                        <h5 class="card-title">BASIC/FREE MEMBERSHIP</h5>
                        <p class="card-text">
                            <ul>
                                <li>LIMITED UPLOADS</li>
                                <li>0 RWF</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" style='color: black;'>
                <div class="card" style="width: 28rem;">
                    <div class="card-body">
                        <h5 class="card-title">PREMIUM MEMBERSHIP</h5>
                        <p class="card-text">
                            <ul>
                                <li>UNLIMITED UPLOADS</li>
                                <li>25,000 RWF/ MONTH</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pb-5">
            <h3 class='home-text'>LISTENER MEMBERSHIP DETAILS</h3>
            <div class="col-md-6 " style='color: black;'>
                <div class="card" style="width: 28rem;">
                    <div class="card-body">
                        <h5 class="card-title">BASIC/FREE MEMBERSHIP</h5>
                        <p class="card-text">
                            <ul>
                                <li>LIMITED EPISODES</li>
                                <li>0 RWF</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" style='color: black;'>
                <div class="card" style="width: 28rem;">
                    <div class="card-body">
                        <h5 class="card-title">PREMIUM MEMBERSHIP</h5>
                        <p class="card-text">
                            <ul>
                                <li>UNLIMITED EPISODES</li>
                                <li>10,000 RWF/ MONTH</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pb-5 justify-content-around">
            <div class='col-md-6 text-center' style='display: flex; justify-content: space-between;'>
                <p class='pr-3'>TO UPGRADE YOUR MEMBERSHIP CONTACT ADMIN</p>
                <a href="./contact-us.php?page_state=CONTACT-US" 
                style='background-color: #dc3545; color:white;' class='btn btn-small btn-dnager'>
                    CONTACT ADMIN
                </a>
            </div>
        </div>
    </div>
</div>

<?php require('./components/footer.php'); ?>