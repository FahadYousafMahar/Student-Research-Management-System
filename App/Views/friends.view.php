<!DOCTYPE html>
<?php include 'partials/head.php'; ?>
    <body>
  <?php include 'partials/nav.php'; ?>

<!-- Top Header-Profile -->
<?php include 'partials/topheader.php' ?>
<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title"><?= ucwords($user->fname).' '.ucwords($user->lname) ?>’s Friends (<?=  count($friends) ?>)</div>
					<form class="w-search">
						<div class="form-group with-button">
							<input class="form-control" type="text" placeholder="Search Friends...">
							<button>
								<svg class="olymp-magnifying-glass-icon"><use xlink:href="/app/views/svgicons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
							</button>
						</div>
					</form>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/app/views/svgicons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Friends -->

<div class="container">
	<div class="row">
	<?php foreach($friends as $friend): ?>
	<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
			<div class="ui-block">
	<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="/app/data/images/covers/<?= $friend->coverpic ?>.jpg" width="318" height="122" alt="friend">
					</div>
				
					<div class="friend-item-content">
				
						<!-- <div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div> -->
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="/app/data/images/users/<?= $friend->profilepic ?>.jpg" width="92" height="92"  alt="author">
							</div>
							<div class="author-content">
								<a href="/timeline/<?= $friend->username ?>" class="h5 author-name"><?= ucwords($friend->fname).' '.ucwords($friend->lname) ?></a>
								<div class="country"><?= ucwords($friend->city).','.ucwords($friend->country) ?></div>
							</div>
						</div>
				
						<div class="swiper-container">
							<div class="swiper-wrapper">
							<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
									<?= ucwords($friend->aboutme) ?>
									</p>
				
									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6"><?= \Carbon\Carbon::createFromFormat('Y-m-d', $friend->birthday)->format("F Y"); ?></div>
									</div>
								</div>
								<div class="swiper-slide">
									<!-- <div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">52</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">240</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">16</div>
											<div class="title">Videos</div>
										</a>
									</div> -->
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>
				
										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a>
				
									</div>
								</div>
							</div>
				
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
					</div>
				</div>
        <?php endforeach;?>
		
		
				
				<!-- Friend Item -->
				
	</div>
</div>

<!-- ... end Friends -->

<a class="back-to-top" href="#">
	<img src="/app/views/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>
<?php include 'partials/foot.php'; ?>