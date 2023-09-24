<?php
$body= 'div-block';
require ('./components/header.php'); ?>
<?php require ('./components/nav.php') ?>
<?php require ('./DB/db.php');?>
<link rel="stylesheet" href="./creator/public/assets/css/track.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.7.8/plyr.css" integrity="sha512-yexU9hwne3MaLL2PG+YJDhaySS9NWcj6z7MvUDSoMhwNghPgXgcvYgVhfj4FMYpPh1Of7bt8/RK5A0rQ9fPMOw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class='div-block'>
    <div class="container">

        <div class="col-md-12 pb-4">
            <h3 class='home-text'>List of Creator</h3>
            <table id='' class='myTable_player table table-striped pb-4 table-color-white'>
                <thead>
                    <tr>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <!-- <th>MEMBERSHIP</th> -->
                    </tr>
                    </thead>
                    <tbody id=''>
                        <?php
                            $i = 0;
                            $sql_getEP = "SELECT * FROM creator ";
                            $run_getEP= mysqli_query($conn, $sql_getEP);
                            while ($row_getEP = mysqli_fetch_assoc($run_getEP)) {
                                // if(!empty($row_getEP['COVER']) || !empty($row_getEP['TRACK'])){
                        ?>
                            <tr style='color: white;'>
                                <td><?php print($row_getEP['USERNAME']) ?></td>
                                <td><?php print($row_getEP['EMAIL']) ?></td>
                            </tr>
                    <?php $i++; }?>
                </tbody>
            </table>
        </div>
        
        <div class="col-md-12 pb-5">
            <h3 class='home-text'>List of Songs</h3>
            <table id='' class='myTable_player table table-striped pb-4 table-color-white'>
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>ARTIST</th>
                    </tr>
                    </thead>
                    <tbody id=''>
                        <?php
                            $i = 0;
                            $sql_getEP = "SELECT * FROM episode ";
                            $run_getEP= mysqli_query($conn, $sql_getEP);
                            while ($row_getEP = mysqli_fetch_assoc($run_getEP)) {
                                // if(!empty($row_getEP['COVER']) || !empty($row_getEP['TRACK'])){
                        ?>
                            <tr style='color: white;'>
                                <td>
                                    <img width='100' height='50' src="./creator/public/assets/cover/<?php print($row_getEP['COVER']) ?>" alt='cover' />
                                </td>
                                <td><?php print($row_getEP['TITLE']) ?></td>
                                <td><?php print($row_getEP['USER']) ?></td>
                            </tr>
                    <?php $i++; }?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>

<?php require('./components/footer.php'); ?>