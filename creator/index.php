<?php require ('./components/header.php') ?>
<?php require ('./components/nav.php') ?>
<?php require ('./DB/db.php');
    $ep_title = '';
    // $ep_membership = '';
    // $ep_description = '';

     if(isset($_GET['action'])){
        if($_GET['action'] == 'update_episode'){
            $id = $_GET['id'];
            $sql = "SELECT * FROM episode WHERE ID='".$id."' ";
            $run_getEP= mysqli_query($conn, $sql);
            while ($row_getEP = mysqli_fetch_assoc($run_getEP)) {
                $ep_title = $row_getEP['TITLE'];
                // $ep_description = $row_getEP['DESCRIPTION'];
                // $ep_membership = $row_getEP['MEMBERSHIP'];
            }
        }
    }
   
?>
<div class="container-fluid home-container">
	<div class="row justify-content-center col-gray">
		<div class="col-md-12">
        <form method="post" enctype='multipart/form-data'>
            <div class="row" >
                <div class="col-md p-5">
                    <h4 class='home-text'>Episode Input Info</h4>
                        <div class="mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" value='<?php echo $ep_title ?>' name='ep_title' class="form-control color-red" id="ep_title" placeholder="name@example.com">
                                <label for="ep_title">Episode Title</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h4 class='home-text'>Upload Cover</h4>
                            <div>
                                <input class="form-control form-control-lg" name="ep_cover" id="ep_cover" type="file">
                            </div>
                            <div id="selectedBanner"></div>
                        </div>
                        <div class="mb-3">
                            <h4 class='home-text'>Upload Episode</h4>
                            <div>
                                <input class="form-control form-control-lg" name='ep_track' id="ep_track" type="file">
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <?php
                                if(isset($_GET['action'])){
                                    if($_GET['action'] == 'update_episode'){
                                        ?>
                                            <button id='update_ep' name='update_ep' class='btn btn-large btn-danger' type="submit">UPDATE</button>
                                        <?php
                                    }
                                }else{
                                    ?>
                                        <button id='publish_ep' name='publish_ep' class='btn btn-large btn-danger' type="submit">PUBLISH</button>
                                    <?php
                                }
                            ?>
                        </div>
                </div>
            </div>
        </form>
        </div>
	</div>
</div>
<?php
    if(isset($_POST['publish_ep'])){
        $ep_title = $_POST['ep_title'];
        // $ep_membership = $_POST['ep_membership'];
        // $ep_description = $_POST['ep_description'];

        $ep_cover = rand(1000,10000)."_".str_replace(" ","_",str_replace("&#39;",'_',$_FILES['ep_cover']['name']));
        $ep_track = rand(1000,10000)."_".str_replace(" ","_",str_replace("&#39;",'_',$_FILES['ep_track']['name']));
        
        $tname_cover = $_FILES['ep_cover']['tmp_name'];
        $tname_track = $_FILES['ep_track']['tmp_name'];

        $username = $_COOKIE['creator_username'];

        $upload_dir_cover = "public/assets/cover";
        $upload_dir_track = "public/assets/tracks";

        $root_dir = __DIR__;

            // for cover
            move_uploaded_file($tname_cover, $root_dir.'/'.$upload_dir_cover."/".$ep_cover);
            // for track
            move_uploaded_file($tname_track, $root_dir.'/'.$upload_dir_track."/".$ep_track);
       
        $sql = "INSERT INTO episode (USER,TITLE,COVER,TRACK) ";
        $sql .= "VALUES('".$username."','".$ep_title."','".$ep_description."','".$ep_membership."','".$ep_cover."','".$ep_track."' ) ";
        
        $result = mysqli_query($conn, $sql);

        if($result){
            echo '<script>console.log("Uploaded")</script>';
        }else{
            echo '<script>console.log("Not Uploaded '.$conn->error.'")</script>';
        }

    }

    if(isset($_POST['update_ep'])){
        $ID = $_GET['id'];

        $ep_title = $_POST['ep_title'];
        $ep_membership = $_POST['ep_membership'];
        $ep_description = $_POST['ep_description'];


        $ep_cover = empty($_FILES['ep_cover']['name']) ? '' : rand(1000,10000)."_".str_replace(" ","_",str_replace("&#39;",'_',$_FILES['ep_cover']['name']));
        $ep_track = empty($_FILES['ep_track']['name']) ? '' : rand(1000,10000)."_".str_replace(" ","_",str_replace("&#39;",'_',$_FILES['ep_track']['name']));
        
        $tname_cover = $_FILES['ep_cover']['tmp_name'];
        $tname_track = $_FILES['ep_track']['tmp_name'];

        $username = $_COOKIE['creator_username'];

        $upload_dir_cover = "public/assets/cover";
        $upload_dir_track = "public/assets/tracks";

        $root_dir = __DIR__;

            // for cover
            move_uploaded_file($tname_cover, $root_dir.'/'.$upload_dir_cover."/".$ep_cover);
            // for track
            move_uploaded_file($tname_track, $root_dir.'/'.$upload_dir_track."/".$ep_track);
       
        // $sql = "INSERT INTO episode (USER,TITLE,DESCRIPTION,MEMBERSHIP,COVER,TRACK) ";
        // $sql .= "VALUES('".$username."','".$ep_title."','".$ep_description."','".$ep_membership."','".$ep_cover."','".$ep_track."' ) ";
        var_dump($ep_cover);

        $sql = "UPDATE episode SET USER='".$username."',TITLE='".$ep_title."',DESCRIPTION='".$ep_description."',";
        $sql .= "MEMBERSHIP='".$ep_membership."',COVER='".$ep_cover."',TRACK='".$ep_track."' ";
        $sql .= " WHERE ID='".$ID."' ";

        $result = mysqli_query($conn, $sql);

        if($result){
            echo '<script>console.log("Uploaded")</script>';
        }else{
            echo '<script>console.log("Not Uploaded '.$conn->error.'")</script>';
        }
    }
?>
<?php require ('./components/footer.php'); ?>