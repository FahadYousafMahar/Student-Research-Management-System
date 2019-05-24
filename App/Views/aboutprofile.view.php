<!DOCTYPE html>
<?php include 'partials/head.php'; ?>
    <body>
  <?php include 'partials/nav.php'; ?>
<!-- Top Header-Profile -->
<?php include 'partials/topheader.php'; ?>
<!-- ... end Top Header-Profile -->
<?php if (isset($_SESSION['id'])):?>

<div class="container">
	<div class="row">
		<div class="col col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Hobbies and Interests</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<div class="row">
						<div class="col col-lg-6 col-md-6 col-sm-12 col-12">

							
							<!-- W-Personal-Info -->
							
							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">Hobbies:</span>
									<span class="text">I like to ride the bike to work, swimming, and working out. I also like
															reading design magazines, go to museums, and binge watching a good tv show while it’s raining outside.
														</span>
								</li>
								<li>
									<span class="title">Favourite TV Shows:</span>
									<span class="text">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.</span>
								</li>
								<li>
									<span class="title">Favourite Movies:</span>
									<span class="text">Idiocratic, The Scarred Wizard and the Fire Crown,  Crime Squad, Ferrum Man. </span>
								</li>
								<li>
									<span class="title">Favourite Games:</span>
									<span class="text">The First of Us, Assassin’s Squad, Dark Assylum, NMAK16, Last Cause 4, Grand Snatch Auto. </span>
								</li>
							</ul>
							
							<!-- ... end W-Personal-Info -->
						</div>
						<div class="col col-lg-6 col-md-6 col-sm-12 col-12">

							
							<!-- W-Personal-Info -->
							
							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">Favourite Music Bands / Artists:</span>
									<span class="text">Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a Revenge.</span>
								</li>
								<li>
									<span class="title">Favourite Books:</span>
									<span class="text">The Crime of the Century, Egiptian Mythology 101, The Scarred Wizard, Lord of the Wings, Amongst Gods, The Oracle, A Tale of Air and Water.</span>
								</li>
								<li>
									<span class="title">Favourite Writers:</span>
									<span class="text">Martin T. Georgeston, Jhonathan R. Token, Ivana Rowle, Alexandria Platt, Marcus Roth. </span>
								</li>
								<li>
									<span class="title">Other Interests:</span>
									<span class="text">Swimming, Surfing, Scuba Diving, Anime, Photography, Tattoos, Street Art.</span>
								</li>
							</ul>
							
							<!-- ... end W-Personal-Info -->
						</div>
					</div>
				</div>
			</div>
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Education and Employement</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<div class="row">
						<div class="col col-lg-6 col-md-6 col-sm-12 col-12">

							
							<!-- W-Personal-Info -->
							
							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">The New College of Design</span>
									<span class="date">2001 - 2006</span>
									<span class="text">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.</span>
								</li>
								<li>
									<span class="title">Rembrandt Institute</span>
									<span class="date">2008</span>
									<span class="text">Five months Digital Illustration course. Professor: Leonardo Stagg.</span>
								</li>
								<li>
									<span class="title">The Digital College </span>
									<span class="date">2010</span>
									<span class="text">6 months intensive Motion Graphics course. After Effects and Premire. Professor: Donatello Urtle. </span>
								</li>
							</ul>
							
							<!-- ... end W-Personal-Info -->

						</div>
						<div class="col col-lg-6 col-md-6 col-sm-12 col-12">

							
							<!-- W-Personal-Info -->
							
							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">Digital Design Intern</span>
									<span class="date">2006-2008</span>
									<span class="text">Digital Design Intern for the “Multimedz” agency. Was in charge of the communication with the clients.</span>
								</li>
								<li>
									<span class="title">UI/UX Designer</span>
									<span class="date">2008-2013</span>
									<span class="text">UI/UX Designer for the “Daydreams” agency. </span>
								</li>
								<li>
									<span class="title">Senior UI/UX Designer</span>
									<span class="date">2013-Now</span>
									<span class="text">Senior UI/UX Designer for the “Daydreams” agency. I’m in charge of a ten person group, overseeing all the proyects and talking to potential clients.</span>
								</li>
							</ul>
							
							<!-- ... end W-Personal-Info -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col col-xl-4 order-xl-1 col-lg-4 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Personal Info</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">

					
					<!-- W-Personal-Info -->
					
					<ul class="widget w-personal-info">
						<li>
							<span class="title">About Me:</span>
							<span class="text"><?= $user->aboutme ?>
												</span>
						</li>
						<li>
							<span class="title">Birthday:</span>
                            <span class="text"><?=  date("F dS, Y", strtotime($user->birthday));

                             ?></span>
						</li>
						<li>
							<span class="title">Birthplace:</span>
							<span class="text"><?= $about->hometown ?></span>
						</li>
						<li>
							<span class="title">Lives in:</span>
							<span class="text"><?= $user->city.", ".$user->country ?></span>
						</li>
						<li>
							<span class="title">Occupation:</span>
							<span class="text"><?= $about->occupation ?></span>
						</li>
						<li>
							<span class="title">Joined:</span>
							<span class="text"><?= date("F dS, Y",strtotime($user->createdat)) ?></span>
						</li>
						<li>
							<span class="title">Gender:</span>
							<span class="text"><?= $user->gender ?></span>
						</li>
						<li>
							<span class="title">Status:</span>
							<span class="text"><?= $about->status ?></span>
						</li>
						<li>
							<span class="title">Email:</span>
							<a href="#" class="text"><?= $user->email ?></a>
						</li>
						<li>
							<span class="title">Website:</span>
							<a href="#" class="text"><?= $about->website ?></a>
						</li>
						<li>
							<span class="title">Phone Number:</span>
							<span class="text"><?= $about->phone ?></span>
						</li>
						<li>
							<span class="title">Religious Belifs:</span>
							<span class="text"><?= $about->religion ?></span>
						</li>
						<li>
							<span class="title">Political Incline:</span>
							<span class="text"><?= $about->politics ?></span>
						</li>
					</ul>
					
					<!-- ... end W-Personal-Info -->
					<!-- W-Socials -->
					
					<div class="widget w-socials">
						<h6 class="title">Other Social Networks:</h6>
						<a href="https://<?= $about->fbid ?> " target="_blank" class="social-item bg-facebook">
							<i class="fab fa-facebook-f" aria-hidden="true"></i>
							Facebook
						</a>
						<a href="https://<?= $about->twitterid  ?>" target="_blank" class="social-item bg-twitter">
							<i class="fab fa-twitter" aria-hidden="true"></i>
							Twitter
						</a>
					</div>
					
					
					<!-- ... end W-Socials -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php else: ?>
<section class="medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-4 col-lg-12 col-md-12 m-auto">
				<div class="logout-content">
					<div class="logout-icon">
						<svg class="svg-inline--fa fa-times fa-w-12" aria-hidden="true" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M323.1 441l53.9-53.9c9.4-9.4 9.4-24.5 0-33.9L279.8 256l97.2-97.2c9.4-9.4 9.4-24.5 0-33.9L323.1 71c-9.4-9.4-24.5-9.4-33.9 0L192 168.2 94.8 71c-9.4-9.4-24.5-9.4-33.9 0L7 124.9c-9.4 9.4-9.4 24.5 0 33.9l97.2 97.2L7 353.2c-9.4 9.4-9.4 24.5 0 33.9L60.9 441c9.4 9.4 24.5 9.4 33.9 0l97.2-97.2 97.2 97.2c9.3 9.3 24.5 9.3 33.9 0z"></path></svg><!-- <i class="fas fa-times"></i> -->
					</div>
					<h6>Do you wanna check <?= ucwords($user->fname." ".$user->lname);?>’s Profile?</h6>
					<p><a href="/login">Login</a> or <a href="/register">Register</a> now to create your own profile
						and have access to connect with the Milan's awesome users!
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<a class="back-to-top" href="#">
	<img src="/app/views/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>
<?php include 'partials/foot.php'; ?>
