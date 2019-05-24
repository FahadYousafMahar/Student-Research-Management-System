 <div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
                    <img src="/app/data/images/covers/<?= (!empty($user->coverpic))?$user->coverpic.".jpg":"default.jpg"; ?>" alt="Header photo">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="/timeline/<?= $user->username ?>" class="active">Timeline</a>
									</li>
									<li>
										<a href="/about/<?= $user->username ?>">About</a>
									</li>
									<li>
										<a href="/friends/<?= $user->username ?>">Friends</a>
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="/photos/<?= $user->username ?>">Photos</a>
									</li>
									<li>
										<a href="/videos/<?= $user->username ?>">Videos</a>
									</li>
									<li>
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown more-with-triangle">
												<li>
													<a href="#">Report Profile</a>
												</li>
												<li>
													<a href="#">Block Profile</a>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<div class="control-block-button">
							<a href="/friendrequests/" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
							</a>

							<a href="/messages/" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
							</a>

							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<a href="#" data-toggle="modal" data-target="#update-profile-photo">Update Profile Photo</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Header Photo</a>
									</li>
									<li>
										<a href="/setting">Account Settings</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="top-header-author">
						<a href="/timeline/<?= $user->username ?>" class="author-thumb">
                        <img src="/app/data/images/users/<?= (!empty($user->profilepic))?$user->profilepic.".jpg":"default.jpg"; ?>" alt="author">
						</a>
						<div class="author-content">
							<a href="/timeline/<?= $user->username ?>" class="h4 author-name"><?= ucwords($user->fname)." ".ucwords($user->lname); ?></a>
							<div class="country"><?= ucwords($user->city).", ".ucwords($user->country) ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>