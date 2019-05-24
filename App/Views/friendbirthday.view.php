<!DOCTYPE html>
<?php include 'partials/head.php'; ?>
    <body>
  <?php include 'partials/nav.php'; ?>

<!-- Main Header Account -->
<div class="main-header">
	<div class="content-bg-wrap bg-birthday"></div>
	<div class="container">
		<div class="row">
			<div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
				<div class="main-header-content">
					<h1>Never Miss a Birthday!</h1>
					<p>Welcome to your friends birthdays page! Here you’ll find all your friends birthdays so you’ll never
	 mis one again!</p>
				</div>
			</div>
		</div>
	</div>

	<img class="img-bottom" src="/app/views/img/birthdays-bottom.png" alt="friends">
</div>
<!-- ... end Main Header Account -->


<!-- Your Account Personal Information -->

<div class="container">
	<div class="row">
        <?php for ($i=1; $i <= 12; $i++) { 
            $month = \Carbon\Carbon::createFromDate(0000,$i,01)->englishMonth;
        ?>
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title"><?= $month ?></h6>
                    </div>
                </div>
            </div>
        <?php foreach($friends as $friend): ?>
            <?php if (\Carbon\Carbon::createFromFormat('Y-m-d', $friend->birthday)->englishMonth == $month): ?>

                <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="ui-block">
                        
                        <div class="birthday-item inline-items">
                            <div class="author-thumb">
                                <img src="/app/data/images/users/<?= $friend->profilepic ?>.jpg" alt="author" width="42" >
                            </div>
                            <div class="birthday-author-name">
                                <a href="/timeline/<?= $friend->username ?>" class="h6 author-name"><?= ucwords($friend->fname).' '.ucwords($friend->lname) ?> </a>
                                <div class="birthday-date"><?= \Carbon\Carbon::createFromFormat('Y-m-d', $friend->birthday)->format("jS F, Y"); ?></div>
                            </div>
                            <?php if(\Carbon\Carbon::createFromFormat("Y-m-d", $friend->birthday)->format('m-d') == \Carbon\Carbon::today()->format('d-m')): ?>
                                <a class="btn btn-sm text-white bg-blue">Happy Birthday</a>
                            <?php endif; ?>

                        </div>
                        
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; } ?>

	</div>
</div>

<!-- ... end Your Account Personal Information -->


<?php include 'partials/foot.php'; ?>