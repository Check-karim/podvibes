<!-------------navigation---------->

<nav class="navbar origin-navbar sticky-top navbar-expand-lg navbar-dark bg-dark ">
	<div class="container-fluid">
		<a class="navbar-brand" href="../">
			<h1><span class='span-white'>POD</span><span class='span-red'>VIBES</span></h1>
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
			<li class="nav-item">
				<a class="nav-link <?php $_GET['page_state'] == 'add-episode' ? print 'active' : '' ;?>" aria-current="page" href="./index.php?page_state=add-episode"><?php isset($_GET['action']) == 'update_track' ? print("UPDATE EPISODE") : print("ADD EPISODE") ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php $_GET['page_state'] == 'tracks' ? print 'active' : '' ;?>" href="./tracks.php?page_state=tracks">TRACKS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php $_GET['page_state'] == 'account' ? print 'active' : '' ;?>"" href="./account.php?page_state=account">ACCOUNT</a>
			</li>
			<!-- <li class="nav-item">
				<a class="nav-link <?php $_GET['page_state'] == 'Login' ? print 'active' : '' ;?>"" href="./login.php?page_state=Login">FOR YOU</a>
			</li> -->
		</ul>
		<form class="d-flex">
        	<button class="btn btn-small btn-danger" id='btn-logout' type="submit">Logout</button>
      	</form>
		</div>
	</div>
</nav>
<!-------------navigation---------->