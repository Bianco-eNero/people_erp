<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>ODOO</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" href="../css/style.css" type="text/css" />
		<link rel="stylesheet" href="../css/arabic.css" type="text/css" />
		<script type="text/javascript" src="../js/code.js"></script>
	</head>
	<body>
		<section class="employees">
			<header class="header">
				<nav class="sections">
					<a href="../menu">
						<figure>
							<i class="fas fa-th"></i>
						</figure>
					</a>
					<a href="">
						<h1>Employees</h1>
					</a>
						<ul>
							<a href=""><li>Employees</li></a>
							<a href=""><li>Departments</li></a>
							<a href=""><li>Configuration</li></a>
						</ul>
				</nav>
				<section class="account">
					<ul>
						<li id="activities"><i class="far fa-clock"></i></li>
						<li id="conversations"><i class="fas fa-comments"></i><i class="circle">1</i></li>
						<li id="customization"><img src="../img/settings-small.png" /><i class="fas fa-caret-down"></i></li>
						<li id="avatar">
								<section class="dropdown" id="avatar-menu">
									<ul>
										<li><a href="">Documentation</a></li>
										<li><a href="">Support</a></li>
										<li><a href="">Shortcuts</a></li>
									</ul>
									<hr />
									<ul>
										<li><a href="">Preferences</a></li>
										<li><a href="">My Odoo.com account</a></li>
										<li><a href="../index.php">Log out</a></li>
									</ul>
								</section>
								<img src="../img/avatar.png" />Hamdi Belal<i class="fas fa-caret-down"></i>
						</li>
					</ul>
				</section>
				<div class="clear"></div>
			</header>
			<main class="main">
				<section class="control">
					<section class="action">
						<h1>Employees</h1>
						<form method="post" action="create">
							<fieldset>
								<input type="submit" name="create" id="create" value="CREATE" class="focus" />
								<input type="submit" name="import" id="import" value="IMPORT" class="no-focus" />
							</fieldset>
						</form>
					</section>
					<section class="navigation">
						<fieldset class="search">
							<input type="text" id="search" placeholder="Search..." />
							<button id="search_go"><i class="fas fa-search-minus"></i></button>
						</fieldset>
						<fieldset class="refine" <?php if($_SESSION['language']=='AR') { ?>style="margin-left:0px <?php } ?> ">
							<span style="font-size: 14px"><?php echo  $row_crud_case['case_code']; ?> </span>  &nbsp
							
<button id="filters"><i class="fas fa-filter"></i>Filters<i class="fas fa-caret-down"></i></button>
							<button id="group-by"><i class="fas fa-bars"></i>Group By<i class="fas fa-caret-down"></i></button>
							<button id="favourites"><i class="fas fa-star"></i>Favourites<i class="fas fa-caret-down"></i></button>
						</fieldset>
						<fieldset class="view">
							 <span class="count">1-1 / 1</span>
							 <span class="directions">
								 <button id="right"><i class="fas fa-chevron-right"></i></button>
								 <button id="left"><i class="fas fa-chevron-left"></i></button>
							</span>
							 <span class="layout">
								 <button class="active" id="thumbnails-large"><i class="fas fa-th-large"></i></button><button id="list"><i class="fas fa-list-ul"></i></button><button id="thumbnails"><i class="fas fa-th"></i></button>
							 </span>
						</fieldset>
						<div class="clear"></div>
					</section>
					<div class="clear"></div>
				</section>
				<section class="body">
						<section class="grid">
							<article class="employee">
								<figure>
									<img src="../img/anonymous.png" />
								</figure>
								<h3>Hamdi Belal</h3>
								<div class="clear"></div>
							</article>
						</section>
				</section>
			</main>
		</section>
	</body>
</html>
