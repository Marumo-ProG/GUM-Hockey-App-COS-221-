<?php include "db-api.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Game Results</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}

		.b-example-divider {
			height: 3rem;
			background-color: rgba(0, 0, 0, .1);
			border: solid rgba(0, 0, 0, .15);
			border-width: 1px 0;
			box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
		}

		.b-example-vr {
			flex-shrink: 0;
			width: 1.5rem;
			height: 100vh;
		}

		.bi {
			vertical-align: -.125em;
			fill: currentColor;
		}

		.nav-scroller {
			position: relative;
			z-index: 2;
			height: 2.75rem;
			overflow-y: hidden;
		}

		.nav-scroller .nav {
			display: flex;
			flex-wrap: nowrap;
			padding-bottom: 1rem;
			margin-top: -1px;
			overflow-x: auto;
			text-align: center;
			white-space: nowrap;
			-webkit-overflow-scrolling: touch;
		}
	</style>


	<!-- Custom styles for this template -->
	<link href="dashStyles.css" rel="stylesheet">
	<link href="gameDetStyles.css" rel="stylesheet">
</head>

<body>
	<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">GUM Tournaments</a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search"> -->
		<div class="navbar-nav">
			<div class="nav-item text-nowrap">
				<a class="nav-link px-3" href="index.php">Sign out</a>
			</div>
		</div>
	</header>

	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
				<div class="position-sticky pt-3">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="dashboard.php">
								<span data-feather="home" class="align-text-bottom"></span>
								Dashboard
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="game-Details.php">
								<span data-feather="file" class="align-text-bottom"></span>
								Game Details

							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="tourMan.php">
								<span data-feather="info" class="align-text-bottom"></span>
								Tournament Mangement
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="teamMan.php">
								<span data-feather="users" class="align-text-bottom"></span>
								Players & Teams
							</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="upload.php">
								<span data-feather="upload" class="align-text-bottom"></span>
								Upload Media
							</a>
						</li>
					</ul>

					<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
						<span>Record Game Events</span>
						<a class="link-secondary" href="./recEvents.php" aria-label="Add a new report">
							<span data-feather="plus-circle" class="align-text-bottom"></span>
						</a>
					</h6>
					
				</div>
			</nav>

			<!-- Body -->
			<main>
				<h1>From this month</h1>
				<!-- <div class="d-flex center-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">This month</h1>
      </div> -->
				<hr>
				<div class="container">
					<div class="row">
						<div class="col">
							<?php 
								// rendering the recent games from the db
								$games = $db->getGames();
								while($row = $games->fetch_assoc()){
									$umpire = $db->getUmpire($row["Umpire_licence"]);
									$umpire = $umpire->fetch_assoc();
									$shorts = $db->getShorts();
									$t = $db->getTournaments();
									$tName = '';
									for($i = 0; $i < count($t);$i++ ){
										if($t[$i]["Tournament_ID"] == $row["tournament_id"]){
											$tName = $t[$i]["Tournament_Name"];
											break;
										}
									}
									echo '
								<div class="container-md">
								<!-- code here -->
								<div class="match">
									<div class="match-header">
										<!-- <div class="match-status">Live</div> -->
										<div class="match-tournament"><h4>'.$tName.'</h4></div>
										<div class="match-actions">
											<!-- <button class="btn-icon"><i class="material-icons-outlined">grade</i></button>
										<button class="btn-icon"><i class="material-icons-outlined">add_alert</i></button> -->
										</div>
									</div>
									<div class="match-content">
									
										<div class="column">
											<div class="team team--home">
												<div class="team-logo">

													<img src="imgs/ukFlag.png" />
												</div>
												<h2 class="team-name">'.$row["Team_1"].'</h2>
											</div>
										</div>
										<div class="column">
											<div class="match-details">
												
												<div class="match-date">
													'.$row["Date_of_Match"].'@<strong>17:30</strong>
												</div>
												<div class="match-score">
													<span class="match-score-number match-score-number--leading">'.rand(0,3).'</span>
													<span class="match-score-divider">:</span>
													<span class="match-score-number">'.rand(0,4).'</span>
												</div>
												<div class="match-time-lapsed">
													'.$row["Time_duration"].'
												</div>
												<div class="match-referee">
													Umpire: <strong>'.$umpire["Name"].'</strong>
												</div>
												<div class="match-details">
													
												</div>
											</div>
										</div>
										<div class="column">
											<div class="team team--away">
												<div class="team-logo">

													<img src="imgs/SAflag.png" />
												</div>
												<h2 class="team-name"> '.$row["Team_2"].'</h2>
											</div>
										</div>
									</div>
								</div>

							</div>
							<hr>
								';
								}
								
							?>
						</div>
					</div>
				</div>
			</main>

			<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

			<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
			<!-- <script src="dashboard.js"></script> -->
</body>

</html>