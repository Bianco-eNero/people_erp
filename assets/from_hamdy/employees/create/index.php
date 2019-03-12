<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>ODOO</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" href="../../css/style.css" type="text/css" />
		<link rel="stylesheet" href="../../css/arabic.css" type="text/css" />
		<script type="text/javascript" src="../../js/code.js"></script>
	</head>
	<body>
		<section class="employees">
			<header class="header">
				<nav class="sections">
					<a href="../../menu">
						<figure>
							<i class="fas fa-th"></i>
						</figure>
					</a>
					<a href="../">
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
						<li id="customization"><img src="../../img/settings-small.png" /><i class="fas fa-caret-down"></i></li>
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
										<li><a href="../../index.php">Log out</a></li>
									</ul>
								</section>
								<img src="../../img/avatar.png" />Hamdi Belal<i class="fas fa-caret-down"></i>
						</li>
					</ul>
				</section>
				<div class="clear"></div>
			</header>
			<main class="main">
				<section class="control">
					<section class="action">
						<h1><span class="root">Employees</span> <span class="slash">/</span> <span class="">New</span></h1>
						<fieldset>
							<input type="button" id="create" value="NEW" class="focus" />
							<input type="button" id="import" value="DISCARD" class="no-focus" />
						</fieldset>
					</section>
					<div class="clear"></div>
				</section>
				<section class="body">
					<section class="employee-create">
						<header>
							<button id="active"><i class="fas fa-archive"></i>Active</button>
							<div class="clear"></div>
						</header>
						<section class="title">
							<figure>
								<img src="../../img/placeholder.png" />
							</figure>
							<fieldset>
								<label for="name">Name</label><br />
								<input type="text" id="name" placeholder="Employee's Name" /><br />
								<input type="text" id="part-time" placeholder="e.g. Part Time" /><i class="fas fa-caret-down"></i>
							</fieldset>
							<div class="clear"></div>
						</section>
						<section class="information">
							<header>
								<h2 class="active">Work Information</h2><h2>Private Information</h2><h2>HR Settings</h2>
							</header>
							<main>
								<section class="left">
									<h3>Contact Information</h3>
									<fieldset>

										<label for="work-address">Work Address</label><input type="text" id="work-address" value="Bianco" /><i class="fas fa-caret-down"></i><button  id="work-address-btn"><i class="fa fa-external-link-alt"></i></button><br />

										<label for="work-address">Work Location</label><input type="text" id="work-address" value="" /></button><br />

										<label for="work-email">Work Email</label><input type="text" id="work-email" value="" /></button><br />

										<label for="work-mobile">Work Mobile</label><input type="text" id="work-mobile" value="" /></button><br />

										<label for="work-phone">Work Phone</label><input type="text" id="work-phone" value="" /></button>

									</fieldset>
								</section>
								<section class="right">
									<h3>Position</h3>
									<fieldset>

										<label for="department">Department</label><input type="text" id="department" value="" /><i class="fas fa-caret-down"></i><br />

										<label for="job-position">Job Position</label><input type="text" id="job-position" value="" /><i class="fas fa-caret-down"></i></button><br />

										<label for="job-title">Job Title</label><input type="text" id="job-title" value="" /><i class="fas fa-caret-down"></i></button><br />

										<label for="manager">Manager</label><input type="text" id="manager" value="" /><i class="fas fa-caret-down"></i></button><br />

										<label for="coach">Coach</label><input type="text" id="coach" value="" /><i class="fas fa-caret-down"></i></button>

									</fieldset>
								</section>
								<section class="other">
									<fieldset>
										<textarea id="other-info" placeholder="Other Information ..."></textarea>
									</fieldset>
								</section>
							</main>
						</section>
					</section>
				</section>
			</main>
		</section>
	</body>
</html>
