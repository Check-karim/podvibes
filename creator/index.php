<?php require ('./components/header.php') ?>
<?php require ('./components/nav.php') ?>
<?php require ('./DB/db.php') ?>
<div class="container-fluid home-container">
	<div class="row justify-content-center col-gray">
		<div class="col-md-12">
        <form method="post" enctype='multipart/form-data'>
            <div class="row" >
                <div class="col-md p-5">
                    <h4 class='home-text'>Episode Input Info</h4>
                        <div class="mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" name='ep_title' class="form-control color-red" id="ep_title" placeholder="name@example.com">
                                <label for="ep_title">Episide Title</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <select class="form-select" name='ep_membership' id="ep_membership" aria-label="Floating label select example">
                                    <option value="Silver" selected>Silver</option>
                                    <option value="Gold">Gold</option>
                                    <option value="Classic">Classic</option>
                                    <option value="Premium">Premium</option>
                                </select>
                                <label class='danger' for="ep_membership">Memberships</label>
                            </div>  
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="ep_description" placeholder="Description" id="ep_description" rows="5"></textarea>
                                <label for="ep_description">Description</label>
                            </div>
                        </div>
                </div>
                <div class="col-md p-5">
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
                                <input class="form-control form-control-lg" id="ep_audio" type="file">
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button id='publish_ep' name='publish_ep' class='btn btn-large btn-danger' type="submit">PUBLISH</button>
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
        $ep_membership = $_POST['ep_membership'];
        $ep_description = $_POST['ep_description'];

        $ep_cover = rand(1000,10000)."_".str_replace(' ','_',$_FILES['ep_cover']['name']);
        $tname = $_FILES['ep_cover']['tmp_name'];

        $username = $_COOKIE['creator_username'];
        $upload_dir = "public/assets";
        // $upload_dir = "public/assets/".str_replace(' ','_',$username);

        $root_dir = __DIR__;
        move_uploaded_file($tname, $root_dir.'/'.$upload_dir."/".$ep_cover);

        $sql = "INSERT INTO episode (TITLE,DESCRIPTION,MEMBERSHIP,COVER) ";
        $sql .= "VALUES('".$ep_title."','".$ep_description."','".$ep_membership."','".$ep_cover."' ) ";
        
        if(mysqli_query($conn, $sql)){
            echo '<script>alert("Uploaded")</script>';
        }else{
            echo '<script>alert("Not Uploaded")</script>';
        }

        var_dump($_FILES['ep_cover']['tmp_name']);
    }
?>
<?php require ('./components/footer.php'); ?>