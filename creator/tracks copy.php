<?php require ('./components/header.php') ?>
<?php require ('./components/nav.php') ?>
<?php require ('./DB/db.php');
    $username = $_COOKIE['creator_username'];
?>
<div class='div-block'>
    <div class="container">
        <div class="row">
            <div class="col p-5">
            <table class='myTable_player table table-striped table-color-white'>
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Membership</th>
                        <th>DELETE</th>
                        <th>UPDATE</th>
                        <th>PLAY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql_getEP = "SELECT * FROM episode WHERE USER='".$username."' ";
                        $run_getEP= mysqli_query($conn, $sql_getEP);
                        while ($row_getEP = mysqli_fetch_assoc($run_getEP)) {
                    ?>
                        <tr class='table-color-white'>
                            <td>
                                <img width='200' height='100' src="./public/assets/cover/<?php print($row_getEP['COVER']) ?>" alt='cover' />
                            </td>
                            <td><?php print($row_getEP['TITLE']) ?></td>
                            <td><?php print($row_getEP['DESCRIPTION']) ?></td>
                            <td><?php print($row_getEP['MEMBERSHIP']) ?></td>
                            <td><a href='./index.php?page_state=add-episode&id=<?php echo $row_getEP['ID'] ?>&action=update_episode' class="btn btn-danger btn-small">DELETE</a></td>
                            <td><a href='./index.php?page_state=add-episode&id=<?php echo $row_getEP['ID'] ?>&action=update_episode' class="btn btn-warning btn-small">UPDATE</a></td>
                            <td><a href='./index.php?page_state=add-episode&id=<?php echo $row_getEP['ID'] ?>&action=update_episode' class="btn btn-secondary btn-small">PLAY</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<?php require ('./components/footer.php'); ?>