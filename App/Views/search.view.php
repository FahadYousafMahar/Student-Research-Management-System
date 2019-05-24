<!DOCTYPE html>
<?php include 'partials/head.php'; ?>
    <body>
  <?php include 'partials/nav.php'; ?>

<!-- ... end Top Header-Profile -->
<div class="container">
	<div class="row">

		<!-- Main Content -->

		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<div class="h6 title">Showing <?= count($searched) ?> Results for: “<span class="c-primary"><?=ucwords($_GET['username'])?></span>”</div>
				</div>
			</div>

			<div id="search-items-grid">
      <?php foreach( $searched as $found ): ?>
				<div class="ui-block">

					<!-- Search Result -->
					
					<article class="hentry post searches-item">
					
						<div class="post__author author vcard inline-items">
							<img height="42" src="/app/data/images/users/<?= $found->profilepic ?>.jpg" alt="author">
					
							<div class="author-date">
                <a class="h6 post__author-name fn" href="/about/<?= $found->username ?>"><?= ucwords($found->fname).' ' .ucwords($found->lname) ?></a>
								<div class="country"><?= ucwords($found->city) ?>,<?= ucwords($found->country) ?></div>
							</div>
					
							<span class="notification-icon">
								<a href="/friendrequest/<?= $found->username ?>" class="accept-request">
									<span class="icon-add without-text">
										<svg class="olymp-happy-face-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
									</span>
								</a>
					
								<a href="/messages/<?= $found->username ?>" class="accept-request chat-message">
									<svg class="olymp-chat---messages-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
								</a>
							</span>
					
						</div>
					
						<p class="user-description">
							<span class="title">About Me:</span> <?= $found->aboutme ?>
							<!-- <span class="title">Favourite TV Shows:</span> Breaking Good, RedDevil, People of Interest, The... -->
						</p>
					
						<!-- <div class="post-block-photo js-zoom-gallery">
							<a href="/app/views/img/post-photo3.jpg" class="col col-3-width"><img src="/app/views/img/post-photo3.jpg" alt="photo"></a>
							<a href="/app/views/img/post-photo4.jpg" class="col col-3-width"><img src="/app/views/img/post-photo4.jpg" alt="photo"></a>
							<a href="/app/views/img/post-photo5.jpg" class="more-photos col-3-width">
								<img src="/app/views/img/post-photo5.jpg" alt="photo">
								<span class="h2">+352</span>
							</a>
						</div> -->
					
						<!-- <div class="post-additional-info">
					
							<ul class="friends-harmonic">
								<li>
									<a href="#">
										<img src="/app/views/img/friend-harmonic9.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/app/views/img/friend-harmonic10.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/app/views/img/friend-harmonic7.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/app/views/img/friend-harmonic8.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/app/views/img/friend-harmonic11.jpg" alt="friend">
									</a>
								</li>
							</ul>
							<div class="names-people-likes">
								You and Marina have
								<a href="#">4 Friends in Common</a>
							</div>
					
							<div class="friend-count">
								<a href="#" class="friend-count-item">
									<div class="h6">189</div>
									<div class="title">Friends</div>
								</a>
								<a href="#" class="friend-count-item">
									<div class="h6">254</div>
									<div class="title">Photos</div>
								</a>
								<a href="#" class="friend-count-item">
									<div class="h6">16</div>
									<div class="title">Videos</div>
								</a>
							</div>
					
						</div> -->
					
					</article>
          </div>

					<!-- ... end Search Result -->
        <?php endforeach; ?>
			</div>

			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="search-items-to-load.html" data-container="search-items-grid">
				<svg class="olymp-three-dots-icon">
					<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
				</svg>
			</a>
    	</div>

		<!-- ... end Main Content -->


		<!-- Left Sidebar -->

		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
			<div class="ui-block">

				<!-- W-Build-Fav -->
				
				<div class="widget w-build-fav">
				
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				
					<div class="widget-thumb">
						<img src="/app/views/img/build-fav.png" alt="notebook">
					</div>
				
					<div class="content">
						<span>Make Some Friends</span>
						<a class="h4 title">More Friends !<br> More Life ! </a>
						<p><a  class="bold">click Friend Request button</a> to start new adventures! </p>
					</div>
				</div>
				
				<!-- ... end W-Build-Fav -->
				

			</div>
		</div>

		<!-- ... end Left Sidebar -->


		<!-- Right Sidebar -->

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">

			<div class="ui-block">

				
				<!-- W-Action -->
				
				<div class="widget w-action">
				
					<img src="/app/views/img/logo.png" alt="Milan">
					<div class="content">
						<h4 class="title">MILAN</h4>
						<span>THE BEST SOCIAL NETWORK ON EARTH!</span>
					</div>
				</div>
				
				<!-- ... end W-Action -->
			</div>
		</div>

		<!-- ... end Right Sidebar -->

	</div>
</div>

<a class="back-to-top" href="#">
	<img src="/app/views/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>
<?php include 'partials/foot.php'; ?>
