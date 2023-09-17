<!-------------navigation---------->
<?php
	session_start();
	$username = NULL;
	if(isset($_COOKIE['creator_username'])){
		$username = $_COOKIE['creator_username'];
	}
	$page_state = '';
	if(isset($_GET['page_state'])){
		$page_state = $_GET['page_state'];
	}
?>
<nav class="navbar origin-navbar sticky-top navbar-expand-lg navbar-dark bg-dark ">
	<div class="container-fluid">
		<a class="navbar-brand" href="./">
			<h1><span class='span-white'>POD</span><span class='span-red'>VIBES</span></h1>
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
			<li class="nav-item">
				<a class="nav-link <?php $page_state == '' ? print 'active' : '' ;?>" aria-current="page" href="./">HOME</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php $page_state == 'About' ? print 'active' : '' ;?>" href="./about.php?page_state=About">ABOUT</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php $page_state == 'Upload' ? print 'active' : '' ;?>" href="./logincreator.php?page_state=Upload"><?php !$username ?  print("UPLOAD") : print("CREATOR"); ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php $page_state == 'Listen' ? print 'active' : '' ;?>" href="./login.php?page_state=Listen">LISTEN NOW</a>
			</li>
		</ul>
		</div>
	</div>
</nav>
<!-------------navigation---------->