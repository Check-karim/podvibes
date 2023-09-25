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
				<a class="nav-link <?php $page_state == 'home' ? print 'active' : '' ;?>" aria-current="page" href="./">HOME</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php $page_state == 'About' ? print 'active' : '' ;?>" href="./about.php?page_state=About">ABOUT</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php $page_state == 'CONTACT-US' ? print 'active' : '' ;?>" href="./contact-us.php?page_state=CONTACT-US">CONTACT-US</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php $page_state == 'MEMBERSHIP' ? print 'active' : '' ;?>" href="./membership.php?page_state=MEMBERSHIP">MEMBERSHIPS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php $page_state == 'Upload' ? print 'active' : '' ;?>" href="./logincreator.php?page_state=Upload"><?php !$username ?  print("UPLOAD") : print("ARTIST"); ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php $page_state == 'Listen' ? print 'active' : '' ;?>" href="./listen.php?page_state=Listen">LISTEN NOW</a>
			</li>
			<?php if (isset($_COOKIE['listener_username'])) { ?>
			<li class="nav-item">
				<a class="nav-link <?php $page_state == 'My_account' ? print 'active' : '' ;?>" href="./account.php?page_state=My_account">MY ACCOUNT</a>
			</li>
			<?php } ?>
		</ul>
		</div>

		<?php 
			if(!isset($_COOKIE['creator_username'])){
		?>
		<form class="d-flex">

			<a style='color: white;' href='<?php isset($_COOKIE['admin_username']) ? print './admin.php?page_state=dashboard' : print './admin.php?page_state=admin' ?>' 
			class="btn btn-small btn-danger" 
			id='<?php if(isset($_COOKIE['admin_username']) && !isset($_COOKIE['listener_username'])){
				if(isset($_COOKIE['admin_username']) && $_GET['page_state'] == 'dashboard') {
					print 'btn-logout-admin' ;
				}else{ 
					print 'btn-login-admin' ;
				}
			}elseif(!isset($_COOKIE['admin_username']) && isset($_COOKIE['listener_username'])){
				print 'btn-logout-listener';
			}?>'
			type="submit">
			<?php if(isset($_COOKIE['admin_username']) && !isset($_COOKIE['listener_username'])){ 
				if($_GET['page_state'] == 'dashboard'){
					print('Logout Admin');
				}else{
					print('Dashboard Admin');
				}
			}elseif(!isset($_COOKIE['admin_username']) && isset($_COOKIE['listener_username'])){
				print('Logout Listener') ;
			}else{ 
				print('Admin') ;
			} ?> </a>
      	
		</form>
		<?php } ?>
	</div>
</nav>
<!-------------navigation---------->