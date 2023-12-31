<?php
$body= 'div-block';
require ('./components/header.php'); ?>
<?php require ('./components/nav.php') ?>
<?php require ('./DB/db.php');?>
<link rel="stylesheet" href="./creator/public/assets/css/track.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.7.8/plyr.css" integrity="sha512-yexU9hwne3MaLL2PG+YJDhaySS9NWcj6z7MvUDSoMhwNghPgXgcvYgVhfj4FMYpPh1Of7bt8/RK5A0rQ9fPMOw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php
if(isset($_GET['action'])){
    if($_GET['action'] == 'creator_activate'){
        $id = $_GET['id'];

        $query ="UPDATE creator set MEMBERSHIP='1' where ID='".$id."' ";
        $sqlupdate_creator = $conn->query($query);

        if($sqlupdate_creator){
            echo '<script>console.log("Updated membership")</script>';
            header("Location: ./dashboard.php?page_state=dashboard");
        }else{
            echo '<script>console.log("'.$conn->error.'")</script>';
            header("Location: ./dashboard.php?page_state=dashboard");
        }
    }

    if($_GET['action'] == 'creator_deactivate'){
        $id = $_GET['id'];

        $query ="UPDATE creator set MEMBERSHIP='0' where ID='".$id."' ";
        $sqlupdate_creator = $conn->query($query);

        if($sqlupdate_creator){
            echo '<script>console.log("Updated membership")</script>';
            header("Location: ./dashboard.php?page_state=dashboard");
        }else{
            echo '<script>console.log("'.$conn->error.'")</script>';
            header("Location: ./dashboard.php?page_state=dashboard");
        }
    }

    if($_GET['action'] == 'listener_activate'){
        $id = $_GET['id'];

        $query ="UPDATE listener set MEMBERSHIP='1' where ID='".$id."' ";
        $sqlupdate_creator = $conn->query($query);

        if($sqlupdate_creator){
            echo '<script>console.log("Updated membership")</script>';
            header("Location: ./dashboard.php?page_state=dashboard");
        }else{
            echo '<script>console.log("'.$conn->error.'")</script>';
            header("Location: ./dashboard.php?page_state=dashboard");
        }
    }

    if($_GET['action'] == 'listener_deactivate'){
        $id = $_GET['id'];

        $query ="UPDATE listener set MEMBERSHIP='0' where ID='".$id."' ";
        $sqlupdate_creator = $conn->query($query);

        if($sqlupdate_creator){
            echo '<script>console.log("Updated membership")</script>';
            header("Location: ./dashboard.php?page_state=dashboard");
        }else{
            echo '<script>console.log("'.$conn->error.'")</script>';
            header("Location: ./dashboard.php?page_state=dashboard");
        }
    }
}
?>
<div class='div-block'>
    <div class="container">

        <div class="col-md-12 pb-4">
            <h3 class='home-text'>List of Creator</h3>
            <table id='' class='myTable_player table table-striped pb-4 table-color-white'>
                <thead>
                    <tr>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>MEMBERSHIP</th>
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
                                <td>
                                    <?php 
                                        if($row_getEP['MEMBERSHIP'] == '0'){ ?>
                                            <a style='color: white;' href='./dashboard.php?page_state=dashboard&action=creator_activate&id=<?php print $row_getEP['ID'] ?>'  class='btn btn-small btn-secondary'>
                                                Activate Premium
                                        </a>
                                        <?php
                                        }else{ ?>
                                            <a style='color: white;' href='./dashboard.php?page_state=dashboard&action=creator_deactivate&id=<?php print $row_getEP['ID'] ?>' class='btn btn-small btn-danger'>
                                                Deactivate Premium
                                        </a>
                                        <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                    <?php $i++; }?>
                </tbody>
            </table>
        </div>
        
        <div class="col-md-12 pb-5">
            <h3 class='home-text'>List of Listener</h3>
            <table id='' class='myTable_player table table-striped pb-4 table-color-white'>
                <thead>
                    <tr>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>MEMBERSHIP</th>
                    </tr>
                    </thead>
                    <tbody id=''>
                        <?php
                            $i = 0;
                            $sql_getEP = "SELECT * FROM listener ";
                            $run_getEP= mysqli_query($conn, $sql_getEP);
                            while ($row_getEP = mysqli_fetch_assoc($run_getEP)) {
                                // if(!empty($row_getEP['COVER']) || !empty($row_getEP['TRACK'])){
                        ?>
                            <tr style='color: white;'>
                            <td><?php print($row_getEP['USERNAME']) ?></td>
                                <td><?php print($row_getEP['EMAIL']) ?></td>
                                <td>
                                    <?php 
                                        if($row_getEP['MEMBERSHIP'] == '0'){ ?>
                                            <a style='color: white;' href='./dashboard.php?page_state=dashboard&action=listener_activate&id=<?php print $row_getEP['ID'] ?>'  class='btn btn-small btn-secondary'>
                                                Activate Premium
                                        </a>
                                        <?php
                                        }else{ ?>
                                            <a style='color: white;' href='./dashboard.php?page_state=dashboard&action=listener_deactivate&id=<?php print $row_getEP['ID'] ?>' class='btn btn-small btn-danger'>
                                                Deactivate Premium
                                        </a>
                                        <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                    <?php $i++; }?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>

<?php require('./components/footer.php'); ?>