<?php
include('../views/v_header.php');
include_once('../controllers/routes.php');
include_once('../controllers/c_redtubeapi.php');
$controller = new C_redtubeapi();

$categories = $controller -> getCategoriesVideos();
?>

<main role="main">
<div class="container-fluid">
<div class="row">
	<nav class="col-md-2 d-none d-md-block bg-dark sidebar">
	<form action="../controllers/routes.php?action=navlink" method="POST">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link text-light" href="../views/v_findpornstar.php">
                  Find a Pornstar
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">
                  Pictures
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="https://en.wikipedia.org/wiki/Black_hole">
                  Black Hole
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 maintitle">
              <span>Categories</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
			<ul class="nav flex-column mb-2">
			<?php
				$i = 0;
				for ($j = 1; $j <= 15; $j++) {
					$category = $categories->category[$i];
					echo "
					<li class='nav-item'>
						<button name='navlink' value='".$category."' type='submit' class='nav-link btn text-light'>".$category."</button>
					</li>
					";
					$i++;
				}
			?>
            </ul>
          </div>
	</form>
    </nav>
	<div class="col-lg-10 col-sm-12">
		<section class="jumbotron text-center">
			<div class="container">
				<h1 class="jumbotron-heading maintitle">Big Black Hole</h1>
				<p class="lead text-muted">Way cheaper than a hooker</p>
				<p>
					<a href="#" class="btn btn-primary my-2">Main call to action</a>
					<a href="#" class="btn btn-secondary my-2">Secondary action</a>
				</p>
			</div>
		</section>

		<div class="album py-5 bg-light">
			<div class="container">
			<div class="row">
			<?php
				$i = 0;
				for ($j = 1; $j <= 12; $j++) {
					$title = $videos->videos->video[$i]->title;
					$videolink = $videos->videos->video[$i]['url'];
					$duration = $videos->videos->video[$i]['duration'];
					$ratingFloat = $videos->videos->video[$i]['rating'];
					$rating = round($ratingFloat);
					$img = $videos->videos->video[$i]['thumb'];
					echo "
						<div class='col-md-4'>
							<div class='card mb-4 shadow-sm'>
								<a href='".$videolink."'>
									<!-- enlever le lien src=$img pour bosser sinon ca deconcentre -->
									<img class='card-img-top' src='' alt='".$videolink."'>
								</a>
								<div class='card-body'>
									<strong><p class='card-text'>".$title."</p></strong>
									<div class='d-flex justify-content-between align-items-center'>
										<small class='text-muted'>".$duration."</small>
										<small class='text-muted'>".$rating."/5</small>
									</div>
								</div>
							</div>
						</div>
					";
					$i++;
				}
			?>
        
			</div>
			</div>
		</div>
	</div>
</div>
</div>
</main>

<?php
include('../views/v_footer.php');
?>