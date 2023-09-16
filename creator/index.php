<?php require ('./components/header.php') ?>
<?php require ('./components/nav.php') ?>
<div class="container-fluid home-container">
	<div class="row justify-content-center col-gray">
		<div class="col-md-12">
            <div class="row" >
                <div class="col-md p-5">
                    <h4 class='home-text'>Episode Input Info</h4>
                    <form action="" method="post">
                        <div class="mb-3">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control color-red" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Episide Title</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected>Silver</option>
                                    <option value="1">Gold</option>
                                    <option value="2">Classic</option>
                                    <option value="3">Premium</option>
                                </select>
                                <label class='danger' for="floatingSelect">Memberships</label>
                            </div>  
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Description" id="floatingTextarea" rows="5"></textarea>
                                <label for="floatingTextarea">Description</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md p-5">
                    <h4 class='home-text'>Upload</h4>
                    <form action="" method="post">
                        <div class="mb-3">
                            <div>
                                <input class="form-control form-control-lg" id="formFileLg" type="file">
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class='btn btn-large btn-danger' type="submit">PUBLISH</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>
<?php require ('./components/footer.php'); ?>