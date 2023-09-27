<?php 
$body= 'div-block';
require ('./components/header.php'); ?>
<?php require ('./components/nav.php') ?>
<?php require ('./DB/db.php');
    $ep_title = '';
    $success = NULL;
    $error = NULL;

     if(isset($_GET['action'])){
        if($_GET['action'] == 'update_episode'){
            $id = $_GET['id'];
            $sql = "SELECT * FROM episode WHERE ID='".$id."' ";
            $run_getEP= mysqli_query($conn, $sql);
            while ($row_getEP = mysqli_fetch_assoc($run_getEP)) {
                $ep_title = $row_getEP['TITLE'];
            }
        }
    }
?>

<?php
    if(isset($_POST['publish_ep'])){
        $ep_title = str_replace('.','_',$_POST['ep_title']);
        $ep_cover = rand(1000,10000)."_".str_replace('.','_',str_replace(" ","_",str_replace("&#39;",'_',$_FILES['ep_cover']['name'])));
        $ep_track = rand(1000,10000)."_".str_replace(" ","_",str_replace("&#39;",'_',$_FILES['ep_track']['name']));
        
        // echo 'title'.$ep_title;
        // echo 'ep_cover'.$_FILES['ep_cover']['name'];
        // echo 'ep_cover'.$ep_cover;

        if(!empty($ep_title) && !empty($_FILES['ep_cover']['name']) && !empty($_FILES['ep_track']['name']) ){
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
            
            $sql_count = "SELECT COUNT(track) as count FROM `episode` where USER='".$username."' ";
            $run_count = mysqli_query($conn , $sql_count);
            $row_count = mysqli_fetch_assoc($run_count);

            if( $row_count['count'] < '5'){
                $sql = "INSERT INTO episode (USER,TITLE,COVER,TRACK) ";
                $sql .= "VALUES('".$username."','".$ep_title."','".$ep_cover."','".$ep_track."' ) ";
                
                $result = mysqli_query($conn, $sql);

                if($result){
                    $success =  'Episode Uploaded';
                    // header('Location : ./index.php?page_state=add-episode');
                    // echo 'Uploaded';
                }else{
                    $error = 'Episode Not Uploaded '.$conn->error;
                    // echo 'Not Uploaded '.$conn->error;
                }
            }else{
                $error = 'Episode To Upload have exceeded 
                <a href="../contact-us.php?page_state=CONTACT-US" 
                style="background-color: #dc3545; color:white;" class="btn btn-small btn-dnager">
                    CONTACT ADMIN
                </a> To Upgrade ACCOUNT
                ';
                // echo 'Not Uploaded '.$conn->error;
            }
            
        }else{
            $error = 'Episode Not uploaded Empty Fields';
            // echo 'Not uploaded Empty Fields';
        }

    }

    if(isset($_POST['update_ep'])){
        $ID = $_GET['id'];

        $ep_title = str_replace('.','_',$_POST['ep_title']);


        $ep_cover = empty($_FILES['ep_cover']['name']) ? '' : rand(1000,10000)."_".str_replace('.','_',str_replace(" ","_",str_replace("&#39;",'_',$_FILES['ep_cover']['name'])));
        $ep_track = empty($_FILES['ep_track']['name']) ? '' : rand(1000,10000)."_".str_replace('.','_',str_replace(" ","_",str_replace("&#39;",'_',$_FILES['ep_track']['name'])));
        
        if(!empty($ep_title) && !empty($_FILES['ep_cover']['name']) && !empty($_FILES['ep_track']['name']) ){
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

            $sql = "UPDATE episode SET USER='".$username."',TITLE='".$ep_title."',";
            $sql .= "COVER='".$ep_cover."',TRACK='".$ep_track."' ";
            $sql .= " WHERE ID='".$ID."' ";

            $result = mysqli_query($conn, $sql);

            if($result){
                $success =  'Episode Updated';
                // echo 'Uploaded';
            }else{
                $error = 'Episode Not Updated '.$conn->error;
                // echo 'Not Uploaded '.$conn->error;
            }
        }else{
            $error = 'Episode Not Updated Empty Fields';
            // echo 'Not uploaded Empty Fields';
        }
    }
?>


<div class="container-fluid home-container">
	<div class="row justify-content-around col-gray">
		<div class="col-md-6">
            <form method="post" enctype='multipart/form-data'>
                <div class="row" >
                    <div class="col-md p-5">
                        <h4 class='home-text'>Episode Input Info</h4>
                            <div class="mb-3" style='color: black;'>
                                <div class="form-floating mb-3">
                                    <input required type="text" value='<?php echo $ep_title ?>' name='ep_title' class="form-control color-red" id="ep_title" placeholder="name@example.com">
                                    <label for="ep_title">Episode Title</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <h4 class='home-text'>Upload Cover</h4>
                                <div>
                                    <input required accept="image/png,image/jpeg" class="form-control form-control-lg" name="ep_cover" id="ep_cover" type="file">
                                </div>
                                <div id="selectedBanner"></div>
                            </div>
                            <div class="mb-3">
                                <h4 class='home-text'>Upload Episode</h4>
                                <div>
                                    <input accept="audio/mp3" required class="form-control form-control-lg" name='ep_track' id="ep_track" type="file">
                                    
                                </div>
                            </div>

                            <div class="text-center">
                                <?php
                                    if(isset($_GET['action'])){
                                        if($_GET['action'] == 'update_episode'){
                                            ?>
                                                <button id='update_ep' name='update_ep' class='btn btn-large btn-danger' type="submit">UPDATE</button>
                                                <a href='./index.php?page_state=add-episode' name='' class='btn btn-large btn-primary'>CANCEL</a>
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
                    <?php if(!empty($success)){ ?>
                    <h4 class='home-text'><?php print $success ?></h4>
                   <?php }elseif(!empty($error)){ ?>
                    <h4 class='home-text'><?php print $error ?></h4>
                    <?php } ?>
                </div>
            </form>
        </div>
	</div>
</div>

<?php require ('./components/footer.php'); ?>