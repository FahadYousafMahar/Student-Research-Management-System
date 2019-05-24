<div class="ui-block">
<article class="hentry post">
					
							<div class="post__author author vcard inline-items">
								<img src="/app/data/images/users/<?= (!empty($user->profilepic))?$user->profilepic.".jpg":"default.jpg"; ?>" alt="author">
					
								<div class="author-date">
									<a class="h6 post__author-name fn" href="/timeline"><?=ucwords($user->fname)." ".ucwords($user->lname); ?></a>
									<div class="post__date">
										<time class="published" datetime="<?= Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->createdat, 'Asia/Karachi')->format('D, d M Y @ h:i A') ?>">
										<?= Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->createdat, 'Asia/Karachi')->diffForHumans(); ?>
										</time>
									</div>
								</div>
					
								<div class="more">
									<svg class="olymp-three-dots-icon">
										<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
									</svg>
									<ul class="more-dropdown">
										<li>
											<a href="#">Edit Post</a>
										</li>
										<li>
											<a href="#">Delete Post</a>
										</li>
										<li>
											<a href="#">Turn Off Notifications</a>
										</li>
										<li>
											<a href="#">Select as Featured</a>
										</li>
									</ul>
								</div>
					
							</div>
					
							<p><?= ucwords($post->body) ?>
							</p>
					
							<div class="post-additional-info inline-items">
					
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-heart-icon">
										<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
									</svg>
									<span>8</span>
								</a>
					
								<ul class="friends-harmonic">
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
											<img src="/app/views/img/friend-harmonic11.jpg" alt="friend">
										</a>
									</li>
								</ul>
					
								<div class="names-people-likes">
									<a href="#">Jenny</a>, <a href="#">Robert</a> and
									<br>6 more liked this
								</div>

					<?php  $comments= \Myweb\Core\App::get('database')->query('comments','Comment',"where postid={$post->id}");  ?>
					
								<div class="comments-shared">
									<a class="post-add-icon toggle-comments inline-items">
										<svg class="olymp-speech-balloon-icon">
											<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
										</svg>
										<span><?= count($comments) ?></span>
									</a>
					
									<a class="post-add-icon inline-items">
										<svg class="olymp-share-icon">
											<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
										</svg>
										<span>24</span>
									</a>
								</div>
					
					
							</div>
					
							<div class="control-block-button post-control-button">
					
								<!-- <a href="#" class="btn btn-control featured-post">
									<svg class="olymp-trophy-icon">
										<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-trophy-icon"></use>
									</svg>
								</a>
					 -->
								<a href="#" class="btn btn-control ">
									<svg class="olymp-like-post-icon">
										<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
									</svg>
								</a>
					
								<a class="btn btn-control toggle-comments">
									<svg class="olymp-comments-post-icon">
										<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</a>
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-share-icon">
										<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
									</svg>
								</a>
					
							</div>
					
						</article>
						<!-- Comments -->
						
						<?php
						 foreach($comments as $comment) :  
							$commentuser= \Myweb\Core\App::get('database')->query('user','User',"WHERE {$comment->userid}=id");
							$commentuser=$commentuser[0];
                            ?>
					<ul class="comments-list">
						<li class="comment-item">
							<div class="post__author author vcard inline-items">
								<img src="/App/Data/images/users/<?= $commentuser->profilepic.".jpg"?>" alt="author">
					
								<div class="author-date">
									<a class="h6 post__author-name fn" href="#"><?php  
												
												echo ucwords($commentuser->fname)." ".ucwords($commentuser->lname) ;
									
									?></a>
									<div class="post__date">
										<time class="published" datetime="<?= Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $comment->createdat, 'Asia/Karachi')->format('D, d M Y @ h:i A') ?>">
										<?= Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $comment->createdat, 'Asia/Karachi')->diffForHumans(); ?>
										</time>
									</div>
								</div>
					
								<a href="#" class="more">
									<svg class="olymp-three-dots-icon">
										<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
									</svg>
								</a>
					
							</div>
					
							<p><?=$comment->body ?></p>
					  
							<!-- <a class="post-add-icon inline-items">
								<svg class="olymp-heart-icon">
									<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
								</svg>
								<span>8</span>
							</a> -->
							<a href="#" class="reply">Reply</a>
						</li>
						<?php endforeach; ?>


						<!--
						<li class="comment-item has-children">
							<div class="post__author author vcard inline-items">
								<img src="/app/views/img/avatar5-sm.jpg" alt="author">
					
								<div class="author-date">
									<a class="h6 post__author-name fn" href="#">Green Goo Rock</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											1 hour ago
										</time>
									</div>
								</div>
					
								<a href="#" class="more">
									<svg class="olymp-three-dots-icon">
										<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
									</svg>
								</a>
					
							</div>
					
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugiten, sed quia
								consequuntur magni dolores eos qui ratione voluptatem sequi en lod nesciunt. Neque porro
								quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit en lorem ipsum der.
							</p>
					
							<a class="post-add-icon inline-items">
								<svg class="olymp-heart-icon">
									<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
								</svg>
								<span>5</span>
							</a>
							<a href="#" class="reply">Reply</a>
					
							<ul class="children">
								<li class="comment-item">
									<div class="post__author author vcard inline-items">
										<img src="/app/views/img/avatar8-sm.jpg" alt="author">
					
										<div class="author-date">
											<a class="h6 post__author-name fn" href="#">Diana Jameson</a>
											<div class="post__date">
												<time class="published" datetime="2017-03-24T18:18">
													39 mins ago
												</time>
											</div>
										</div>
					
										<a href="#" class="more">
											<svg class="olymp-three-dots-icon">
												<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
											</svg>
										</a>
					
									</div>
					
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					
									<a class="post-add-icon inline-items">
										<svg class="olymp-heart-icon">
											<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
										</svg>
										<span>2</span>
									</a>
									<a href="#" class="reply">Reply</a>
								</li>
								<li class="comment-item">
									<div class="post__author author vcard inline-items">
										<img src="/app/views/img/avatar2-sm.jpg" alt="author">
					
										<div class="author-date">
											<a class="h6 post__author-name fn" href="#">Nicholas Grisom</a>
											<div class="post__date">
												<time class="published" datetime="2017-03-24T18:18">
													24 mins ago
												</time>
											</div>
										</div>
					
										<a href="#" class="more">
											<svg class="olymp-three-dots-icon">
												<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
											</svg>
										</a>
					
									</div>
					
									<p>Excepteur sint occaecat cupidatat non proident.</p>
					
									<a class="post-add-icon inline-items">
										<svg class="olymp-heart-icon">
											<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
										</svg>
										<span>0</span>
									</a>
									<a href="#" class="reply">Reply</a>
					
								</li>
							</ul>
					
						</li>
					
						<li class="comment-item">
							<div class="post__author author vcard inline-items">
								<img src="/app/views/img/avatar4-sm.jpg" alt="author">
					
								<div class="author-date">
									<a class="h6 post__author-name fn" href="#">Chris Greyson</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											1 hour ago
										</time>
									</div>
								</div>
					
								<a href="#" class="more">
									<svg class="olymp-three-dots-icon">
										<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
									</svg>
								</a>
					
							</div>
					
							<p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
					
							<a class="post-add-icon inline-items">
								<svg class="olymp-heart-icon">
									<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
								</svg>
								<span>7</span>
							</a>
							<a href="#" class="reply">Reply</a>
					
						</li>
						<a href="#" class="more-comments">View more comments <span>+</span></a>
					</ul>
					--->
						<!-- Comment Form -->
						<form class="comment-form inline-items">
					
						<div class="post__author author vcard inline-items">
							<img src="/app/data/images/users/<?= (!empty($user->profilepic))?$user->profilepic.".jpg":"default.jpg"; ?>" alt="author">
					
							<div class="form-group with-icon-right ">
								<textarea class="form-control" name="body" placeholder=" Write a comment !"></textarea>
								<input class="form-control d-none" name="postid" value="<?= $post->id ?>" >
								<div class="add-options-message">
									<a class="post-add-icon submit-comments inline-items">
										<svg class="olymp-speech-balloon-icon">
											<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
										</svg>
										<span>Submit</span>
									</a>
									<!-- <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
										<svg class="olymp-camera-icon">
											<use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
										</svg>
									</a> -->
								</div>
							</div>
						</div>
					</form>
			</div>
					