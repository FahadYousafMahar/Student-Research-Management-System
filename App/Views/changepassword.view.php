<!DOCTYPE html>
<?php include 'partials/head.php'; ?>
    <body>
  <?php include 'partials/nav.php'; ?>

<!-- Main Header Account -->

<!-- ... end Main Header Account -->
<?php include 'partials/settingheader.php'; ?>

<!-- Your Account Personal Information -->

<div class="container">
	<div class="row">
	<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Change Password</h6>
				</div>
				<div class="ui-block-content">

					
					<!-- Change Password Form -->
					
					<form class="changePasswordForm">
						<div class="row">
					
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Current Password</label>
									<input required name="currentpassword" class="form-control" placeholder="" type="password" value="">
								<span class="material-input"></span></div>
							</div>
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Your New Password</label>
									<input required name="newpassword"class="form-control" placeholder="" type="password">
								<span class="material-input"></span></div>
							</div>
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Confirm New Password</label>
									<input required name="newconfirmpassword"class="form-control" placeholder="" type="password">
								<span class="material-input"></span></div>
							</div>
					
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<button type="button" class="btn btn-primary btn-lg full-width btnChangePassword">Change Password Now!</button>
							</div>
					
						</div>
					</form>
					
					<!-- ... end Change Password Form -->
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