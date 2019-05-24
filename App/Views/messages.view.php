<!DOCTYPE html>
<?php include 'partials/head.php'; ?>
    <body>
  <?php include 'partials/nav.php'; ?>

<!-- Main Header Account -->
<?php include 'partials/settingheader.php'; ?>
<!-- ... end Main Header Account -->


<!-- Your Account Personal Information -->

<div class="container">
	<div class="row">
<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Chat / Messages</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>

				<div class="row">
					<div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12  padding-r-0">

						
						<!-- Notification List Chat Messages -->
						
						<ul class="notification-list chat-message">
						<?php
								$done = array();
								if (count($messages)) {
									foreach ($friends as $friend) {
									//	if (!in_array($friend->id, $done) ) {
                                        foreach ($messages as $message) {
                                            if ($friend->id == $message->toid || $friend->id == $message->fromid) {
                                           ?>
							<li>
								<div class="author-thumb">
									<img src="/App/Data/images/users/<?= $friend->profilepic.".jpg"; ?>" width ="42" alt="author">
								</div>
								<div class="notification-event">
									<a href="/messages/<?= $friend->username ?>" class="h6 notification-friend"> <?=  ucwords($friend->fname)." ".ucwords($friend->lname) ; ?></a>
									<span class="chat-message-item"><?= (!empty($message->body))? $message->body : "Start a Conversation" ?></span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18"><?=  (!empty($message->createdat))? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $message->createdat, 'Asia/Karachi')->diffForHumans() :" "; ?></time></span>
								</div>
								<span class="notification-icon">
																<svg class="olymp-chat---messages-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
															</span>
						
								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>
						
						<?php
									array_push($done, $friend->id);
									break;
								} 
						}
						if (!in_array($friend->id, $done) ) {		
						?>
						<li>
							<div class="author-thumb">
								<img src="/App/Data/images/users/<?= $friend->profilepic.".jpg"; ?>" width ="42" alt="author">
							</div>
							<div class="notification-event">
								<a href="/messages/<?= $friend->username ?>" class="h6 notification-friend"> <?=  ucwords($friend->fname)." ".ucwords($friend->lname) ; ?></a>
								<span class="chat-message-item"><?=  "Start a Conversation" ?></span>
								<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18"></time></span>
							</div>
							<span class="notification-icon">
								<svg class="olymp-chat---messages-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
							</span>
							<div class="more">
								<svg class="olymp-three-dots-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							</div>
						</li>
														
						<?php

															array_push($done, $friend->id);
															continue;
											  } 
										}
								}
						?>
	

					</div>

					<div class="col col-xl-7 col-lg-6 col-md-12 col-sm-12  padding-l-0">				
						<!-- Chat Field -->
								<?php 

								usort($messages,function($a,$b){
										return $a->createdat <=> $b->createdat;
									   });									
								foreach ($friends as $friend):
									if($friend->id == $chatuserid){
              ?>
							 		<div class="chat-field">
							<div class="ui-block-title">
								<h6 class="title"> <?=  ucwords($friend->fname)." ".ucwords($friend->lname) ; ?> </h6>
								<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
							</div>
							<div class="mCustomScrollbar" data-mcs-theme="dark">
								<ul class="notification-list chat-message chat-message-field milanMessageBox">

                <?php	foreach ($messages as $message): 
                        if ($chatuserid == $message->toid || $chatuserid == $message->fromid) {
													if ($message->fromid == $_SESSION['id']){
														$currentUser = $user;
													}else{
														$currentUser = $friend;
													}
									
									?>

									<li>
										<div class="author-thumb">
											<img src="/app/Data/images/users/<?= $currentUser->profilepic.".jpg" ?>" alt="author" width="42">
										</div>
										<div class="notification-event">
											<a href="#" class="h6 notification-friend"><?=  ucwords($currentUser->fname)." ".ucwords($currentUser->lname); ?></a>
											<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18"><?= Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $message->createdat, 'Asia/Karachi')->diffForHumans(); ?></time></span>
											<span class="chat-message-item"> <?= str_pad($message->body,45,"<pre style=\"height: 0px;\">                                  </pre>"); ?>  </span>
										</div>
									</li>
											<?php
                                } endforeach; ?>
											<?php  
											}?>
											<?php endforeach; ?>
								</ul>
							</div>
						
							<form id="msgReply">
						
								<div class="form-group label-floating is-empty">
									<label class="control-label">Write your reply here...</label>
									<textarea class="form-control" placeholder="" name="body"></textarea>
								</div>
								<input class="d-none" type="text" name="toid" value="<?= $chatuserid ?>">
								<div class="add-options-message">
									<!-- <a href="#" class="options-message">
										<svg class="olymp-computer-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
									</a>
									<a href="#" class="options-message">
										<svg class="olymp-computer-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
									</a> -->
								<!-- 	<div class="options-message smile-block">
										<svg class="olymp-happy-sticker-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-happy-sticker-icon"></use></svg>
						
										<ul class="more-dropdown more-with-triangle triangle-bottom-right">
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat1.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat2.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat3.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat4.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat5.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat6.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat7.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat8.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat9.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat10.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat11.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat12.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat13.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat14.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat15.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat16.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat17.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat18.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat19.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat20.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat21.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat22.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat23.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat24.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat25.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat26.png" alt="icon">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/App/Data/img/icon-chat27.png" alt="icon">
												</a>
											</li>
										</ul>
									</div> -->
						
									<button class="btn btn-primary btn-sm submit-message">Post Reply</button>
								</div>
						
							</form>
						
						</div>
						
						<!-- ... end Chat Field -->





					</div>
				</div>

			</div>

		</div>

        <div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12  responsive-display-none">
			<div class="ui-block">

				
				
				<!-- Your Profile  -->
				
				<?php include 'partials/settingnav.php'; ?>
				
				<!-- ... end Your Profile  -->
				

			</div>
		</div>
	</div>
</div>

<!-- ... end Your Account Personal Information -->


<?php include 'partials/foot.php'; ?>